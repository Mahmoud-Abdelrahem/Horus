<?php
include '../Admin/shared/head.php';
include '../Admin/shared/header.php';
include '../Admin/shared/asside.php';
include '../app/config.php';
include '../app/functions.php';

$selectOne = "SELECT * FROM new_bus";
$sOne = mysqli_query($conn, $selectOne);
$rowOne = mysqli_fetch_assoc($sOne);

$emailErorr = [];
$busNumber = null;
$pickup = "";
$destination = "";

if (isset($_GET['update'])) {

    $id = $_GET['update'];
    $select = "SELECT * FROM main_directions where id = $id ";
    $s = mysqli_query($conn, $select);
    $row = mysqli_fetch_assoc($s);

    if (isset($_POST['edit'])) {

        $busNumber = $_POST['bus_num'];
        $start_time = $_POST['start_time'];
        $busId = $_POST['direction'];

        // select pickup and destination
        $selectTwo = "SELECT * from new_bus where busID = $busId";
        $sTwo = mysqli_query($conn, $selectTwo);
        $rowTwo = mysqli_fetch_assoc($sTwo);
        $pickup = $rowTwo['pick_location'];
        $destination = $rowTwo['destination'];

       if(empty($emailErorr)){
            $update = "UPDATE `main_directions` SET `bus_number`= $busNumber,`pickup`='$pickup',`destination`='$destination',`start_time`= '$start_time' ,`busID`= $busId  where id = $id";
            $u = mysqli_query($conn, $update);
            path('bus/listBus.php');
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
                                <label for="" class="form-label">Bus Number</label>
                                <div class="input-group has-validation">
                                    <input type="number" name="bus_num" class="form-control" id="yourUsername" required value="<?= $row['bus_number'] ?>">
                                    <div class="invalid-feedback">Can not be empty.</div>
                                </div>
                            </div>



                            <div class="col-12">
                                <label for="yourUsername" class="form-label"> Start Time </label>
                                <div class="input-group has-validation">
                                    <input type="time" name="start_time" class="form-control" id="yourUsername" required value="<?= $row['start_time'] ?>">
                                    <div class="invalid-feedback">Can not be empty.</div>
                                </div>
                            </div>

                            <div class="col-12">
                                <label for="yourUsername" class="form-label"> Select Bus Direction </label>
                                <select name="direction" id="" class="p-2 form-control" style="text-transform: capitalize;">
                                    <?php foreach ($sOne as $data) : ?>
                                        <option value="<?= $data['busID'] ?>"> <?= $data['pick_location'] ?> || <?= $data['destination'] ?> </option>
                                    <?php endforeach; ?>
                                </select>

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