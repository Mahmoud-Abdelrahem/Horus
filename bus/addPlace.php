<?php
include '../Admin/shared/head.php';
include '../Admin/shared/header.php';
include '../Admin/shared/asside.php';
include '../app/config.php';
include '../app/functions.php';

$select = "SELECT * FROM places";
$s = mysqli_query($conn, $select);
$row = mysqli_fetch_assoc($s);
$numRow = mysqli_num_rows($s);



$inputError = [];
$place_ar = "";
$place_en = "";

if (isset($_POST['add'])) {
    $place_en = filterValidation($_POST['place_en']);
    $place_ar = filterValidation($_POST['place_ar']);



    if ($place_en == "" || $place_ar == "") {
        $emailErorr[] = "Place can not be empty";
    } else if (!preg_match('/^\p{Arabic}+$/u', $place_ar)) {
        $inputError[] = "من فضلك ادخل مكان الانطلاق باللغة العربيه";
    }
    foreach ($s as $data) {
        if ($data['places'] == $place_en || $data['places_ar'] == $place_ar) {
            $emailErorr[] = "This place already exist ";
        }
    }

    if (empty($inputError)) {
        $insert = " INSERT INTO places VALUES (null , '$place_en' , '$place_ar')";
        $i = mysqli_query($conn, $insert);
        path('bus/listPlaces.php');
        $_SESSION['place'] = [
            'place_en' => $places_en,
            'place_ar' => $place_ar
        ];
    }
}




?>



<!-- Start loading page -->
<div class="loading-spiner">
    <span class="loader"></span>
</div>
<!-- End loading page -->





<main id="main" class="main">

    <div class="pagetitle">
        <h1>New Place</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/Horus/Admin/index.php">Home</a></li>
                <li class="breadcrumb-item active">Add New Place</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->



    <section class="section profile">
        <div class="row justify-content-center">


            <div class="col-xl-9">

                <div class="card">
                    <div class="card-body pt-3">
                        <!-- Bordered Tabs -->


                        <form class="row g-3 needs-validation" method="post" novalidate>




                            <div class="col-12">
                                <label for="yourUsername" class="form-label">Place In English</label>
                                <div class="input-group has-validation">
                                    <input type="text" name="place_en" class="form-control" id="yourUsername" required value="<?= $place_en ?>">
                                    <div class="invalid-feedback">Can not be empty.</div>
                                </div>
                            </div>

                            <div class="col-12">
                                <label for="yourPassword" class="form-label">Place In Arabic</label>
                                <input type="text" name="place_ar" class="form-control" id="yourPassword" required value="<?= $place_ar ?>">
                                <div class="invalid-feedback">Can not be empty</div>

                                
                            <?php if (!empty($inputError)) : ?>
                                <div class="alert alert-dismissible text-danger">
                                    <ul>
                                        <?php foreach ($inputError as $error) : ?>
                                            <li><?= $error ?></li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                            <?php endif; ?>
                            </div>



                            <div class="col-12">
                                <button class="btn btn-primary w-100" name="add" type="submit">Add New Place</button>
                            </div>

                        </form>

                    </div>
                </div>

            </div>
        </div>
    </section>

</main><!-- End #main -->




<?php
include '../Admin/shared/footer.php';
include '../Admin/shared/script.php';

?>