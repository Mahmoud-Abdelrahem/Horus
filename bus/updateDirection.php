<?php
include '../Admin/shared/head.php';
include '../Admin/shared/header.php';
include '../Admin/shared/asside.php';
include '../app/config.php';
include '../app/functions.php';




$inputError = [];
$pickup = '';
$pickup_ar = '';
$destination = '';
$destination_ar = '';
$salary = null;
$salary_ar = '';

if (isset($_GET['update'])) {
    $id = $_GET['update'];
    $select = "SELECT * FROM main_direction_1 where id = $id";
    $s = mysqli_query($conn, $select);
    $row = mysqli_fetch_assoc($s);

    if (isset($_POST['edit'])) {
        $pickup = filterValidation($_POST['pickup']);
        $pickup_ar = filterValidation($_POST['pickup_ar']);
        $destination = filterValidation($_POST['destination']);
        $destination_ar = filterValidation($_POST['destination_ar']);
        $salary = $_POST['salary'];
        $salary_ar = $_POST['salary_ar'];
     

        if (!preg_match('/^\p{Arabic}+$/u', $pickup_ar)  ) {
            $inputError[] = "من فضلك ادخل مكان الانطلاق باللغة العربيه";
        } else if (!preg_match('/^\p{Arabic}+$/u', $destination_ar)) {
            $inputError2[] = "من فضلك ادخل مكان الوصول باللغة العربيه";
        }

        if (empty($inputError) && empty($inputError2)) {
            $update = " UPDATE  main_direction_1  SET pick_location ='$pickup' , destination =  '$destination' , pick_ar = '$pickup_ar' , destination_ar = '$destination_ar' , salary = $salary , salary_ar = '$salary_ar' where id = $id";
            $u = mysqli_query($conn, $update);
            path('bus/listDirections.php');
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
        <h1>New Bus</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/Horus/Admin/index.php">Home</a></li>
                <li class="breadcrumb-item active">Add New Bus</li>
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
                                    <input type="text" name="pickup" class="form-control" id="yourUsername" required value="<?= $row['pick_location'] ?>">
                                    <div class="invalid-feedback">Can not be empty.</div>
                                </div>
                            </div>
                            <div class="col-12">
                                <label for="yourUsername" class="form-label">Pick Up Location in Arabic</label>
                                <div class="input-group has-validation">
                                    <input type="text" name="pickup_ar" class="form-control" id="ar" required value="<?= $row['pick_ar'] ?>">
                                    <div class="invalid-feedback">Can not be empty. and must be in arabic</div>
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
                                    <input type="text" name="destination" class="form-control" id="yourUsername" required value="<?= $row['destination'] ?>">
                                    <div class="invalid-feedback">Can not be empty.</div>
                                </div>
                            </div>

                            <div class="col-12">
                                <label for="yourPassword" class="form-label">Destination in Arabic</label>
                                <input type="text" name="destination_ar" class="form-control" id="ar" required value="<?= $row['destination_ar'] ?>">
                                <div class="invalid-feedback">Can not be empty</div>

                                <?php if (!empty($inputError2)) : ?>
                                    <div class="alert alert-dismissible text-danger">
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
                                <input type="number" name="salary" class="form-control" id="yourPassword" required value="<?= $row['salary'] ?>">
                                <div class="invalid-feedback">Can not be empty</div>
                            </div>
                            <div class="col-12">
                                <label for="yourPassword" class="form-label">Salary in Arabic</label>
                                <input type="text" name="salary_ar"  class="form-control" id="salary_ar" required value="<?= $row['salary_ar'] ?>">
                                <div class="invalid-feedback">Can not be empty</div>

                            </div>


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

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>





<?php
include '../Admin/shared/footer.php';
include '../Admin/shared/script.php';

?>