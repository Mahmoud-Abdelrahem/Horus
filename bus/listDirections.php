<?php
include '../app/config.php';
include '../app/functions.php';

include '../Admin/shared/head.php';
include '../Admin/shared/asside.php';
include '../Admin/shared/header.php';



$select = "SELECT * FROM main_direction_1";
$s = mysqli_query($conn, $select);


if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $delete = "DELETE FROM main_direction_1 where id = $id";
    mysqli_query($conn, $delete);
    path("bus/listDirections.php");
}

auth_admin(2);



?>

<!-- Start loading page -->
<div class="loading-spiner">
    <span class="loader"></span>
</div>
<!-- End loading page -->


<main id="main" class="main">

    <div class="pagetitle">
        <h1>Admin</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/Horus/Admin/index.php">Home</a></li>
                <li class="breadcrumb-item active">List Admin</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->


    <div class="row">
        <!-- Recent Sales -->
        <div class="col-12 text-center">
            <div class="card recent-sales overflow-auto">



                <div class="card-body text-capitalize">
                    <h5 class="card-title">Recent Sales <span>| Today</span></h5>

                    <table class="table table-borderless datatable   ">
                        <thead class="text-center">
                            <tr>
                                <th scope="col">id</th>
                                <th scope="col">Pickup Location</th>
                                <th scope="col">Destination</th>
                                <th scope="col">Pickup Arabic</th>
                                <th scope="col">Destination Arabic</th>
                                <th scope="col">Salary</th>
                                <th scope="col">Salary Arabic</th>
                                <th scope="col">Action</th>


                            </tr>
                        </thead>
                        <tbody>

                            <?php foreach ($s as $data) : ?>
                                <tr>

                                    <td><?= $data['id'] ?></td>
                                    <td><?= $data['pick_location'] ?></td>
                                    <td><?= $data['destination'] ?></td>
                                    <td><?= $data['pick_ar'] ?></td>
                                    <td><?= $data['destination_ar'] ?></td>
                                    <td><?= $data['salary'] ?></td>
                                    <td><?= $data['salary_ar'] ?></td>
                                    <td>
                                        <div class="status d-flex  justify-content-center">
                                            <a href="/Horus/bus/updateDirection.php?update= <?= $data['id'] ?>" class="edit">
                                                <i class="bi bi-pencil"></i>
                                                <!-- <span>Edit</span> -->
                                                <div class="overlay"></div>
                                            </a>
                                            <a href="?delete=<?= $data['id'] ?>" class="delete">
                                                <i class="bi bi-trash"></i>
                                                <!-- <span>delete</span> -->

                                            </a>

                                        </div>
                                    </td>

                                </tr>
                            <?php endforeach; ?>

                        </tbody>
                    </table>

                </div>

            </div>
        </div><!-- End Recent Sales -->
    </div>

</main><!-- End #main -->



<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>





<?php
include '../Admin/shared/footer.php';
include '../Admin/shared/script.php';


?>