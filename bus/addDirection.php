<?php
include '../Admin/shared/head.php';
include '../Admin/shared/header.php';
include '../Admin/shared/asside.php';
include '../app/config.php';
include '../app/functions.php';


$select = "SELECT * FROM main_direction_1";
$s = mysqli_query($conn, $select);



$inputError = [];
$inputError2 = [];
$inputError3 = [];
$pickup = '';
$pickup_ar = '';
$destination = '';
$destination_ar = '';
$salary = null;
$salary_ar = '';

if (isset($_POST['add'])) {
    $pickup = filterValidation($_POST['pickup']);
    $pickup_ar = filterValidation($_POST['pickup_ar']);
    $destination = filterValidation($_POST['destination']);
    $destination_ar = filterValidation($_POST['destination_ar']);
    $salary = $_POST['salary'];
    $salary_ar = $_POST['salary_ar'];



    // validation
    if (!preg_match('/^\p{Arabic}+$/u', $pickup_ar)) {
        $inputError[] = "من فضلك ادخل مكان الانطلاق باللغة العربيه";
    } else if (!preg_match('/^\p{Arabic}+$/u', $destination_ar)) {
        $inputError2[] = "من فضلك ادخل مكان الوصول باللغة العربيه";
    }
    foreach ($s as $data) {
        if ($data['destination'] == $destination && $data['destination_ar'] == $destination_ar) {
            $inputError3[] = "This Direction already exist ";
        }
    }

    // insert into database
    if (empty($inputError) && empty($inputError2) && empty($inputError3)) {
        $insert = " INSERT INTO main_direction_1 VALUES (null , '$pickup' , '$destination' , '$pickup_ar' , '$destination_ar' , $salary , '$salary_ar')";
        $i = mysqli_query($conn, $insert);
        path('bus/listDirections.php');
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
        <h1>New Direction</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/Horus/Admin/index.php">Home</a></li>
                <li class="breadcrumb-item active">Add New Direction</li>
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
                                <label for="" class="form-label">Picup Location</label>
                                <div class="input-group has-validation">
                                    <input type="text" name="pickup" class="form-control" id="yourUsername" required value="<?= $pickup ?>">
                                    <div class="invalid-feedback">Can not be empty.</div>
                                </div>
                            </div>
                            <div class="col-12">
                                <label for="yourUsername" class="form-label">Pick Up Location in Arabic</label>
                                <div class="input-group has-validation">
                                    <input type="text" name="pickup_ar" class="form-control" id="yourUsername" required value="<?= $pickup_ar ?>">
                                    <div class="invalid-feedback">Can not be empty.</div>
                                </div>

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
                                <label for="yourUsername" class="form-label">Destination </label>
                                <div class="input-group has-validation">
                                    <input type="text" name="destination" class="form-control" id="yourUsername" required value="<?= $destination ?>">
                                    <div class="invalid-feedback">Can not be empty.</div>
                                </div>
                            </div>

                            <div class="col-12">
                                <label for="yourPassword" class="form-label">Destination in Arabic</label>
                                <input type="text" name="destination_ar" class="form-control" id="yourPassword" required value="<?= $destination_ar ?>">
                                <div class="invalid-feedback">Can not be empty</div>

                                <?php if (!empty($inputError2)) : ?>
                                    <div class="alert alert-dismissible text-danger  ">
                                        <ul>
                                            <?php foreach ($inputError2 as $error) : ?>
                                                <li><?= $error ?></li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </div>
                                <?php endif; ?>

                            </div>
                            <div class="col-12">
                                <label for="yourPassword" class="form-label">Salary</label>
                                <input type="number" name="salary" class="form-control" id="yourPassword" required value="<?= $salary ?>">
                                <div class="invalid-feedback">Can not be empty</div>
                            </div>
                            <div class="col-12">
                                <label for="yourPassword" class="form-label">Salary in Arabic</label>
                                <input type="text" name="salary_ar" class="form-control" id="yourPassword" required value="<?= $salary_ar ?>">
                                <div class="invalid-feedback">Can not be empty</div>
                            </div>

                            <?php if (!empty($inputError3)) : ?>
                                    <div class="alert alert-dismissible text-danger">
                                        <ul>
                                            <?php foreach ($inputError3 as $error) : ?>
                                                <li><?= $error ?></li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </div>
                                <?php endif; ?>
                            

                            <div class="col-12">
                                <button class="btn btn-primary w-100" name="add" type="submit">Add New Direction</button>
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