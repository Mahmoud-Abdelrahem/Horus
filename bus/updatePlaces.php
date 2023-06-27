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

$emailErorr = [];
$place_ar = "";
$place_en = "";

if (isset($_GET['update'])) {

    $id = $_GET['update'];
    $selectOne = "SELECT * FROM places where id = $id";
    $sOne = mysqli_query($conn, $selectOne);
    $rowOne = mysqli_fetch_assoc($sOne);

    if (isset($_POST['edit'])) {

        $place_ar = filterValidation($_POST['place_ar']);
        $place_en = filterValidation($_POST['place_en']);



        if (empty($emailErorr)) {
            $update = " UPDATE places SET `places` = '$place_en' , places_ar ='$place_ar' where id = $id";
            $u = mysqli_query($conn, $update);
            path('bus/listPlaces.php');
        }
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
                                    <input type="text" name="place_en" class="form-control" id="yourUsername" required value="<?= $row['places'] ?>">
                                    <div class="invalid-feedback">Can not be empty.</div>
                                </div>
                            </div>

                            <div class="col-12">
                                <label for="yourPassword" class="form-label">Place In Arabic</label>
                                <input type="text" name="place_ar" class="form-control" id="yourPassword" required value="<?= $row['places_ar'] ?>">
                                <div class="invalid-feedback">Can not be empty</div>
                            </div>


                            <?php if (!empty($emailErorr)) : ?>
                                <div class="alert alert-dismissible text-danger  mt-3">
                                    <ul>
                                        <?php foreach ($emailErorr as $error) : ?>
                                            <li><?= $error ?></li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                            <?php endif; ?>

                            <div class="col-12">
                                <button class="btn btn-warning w-100" name="edit" type="submit">Update</button>
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