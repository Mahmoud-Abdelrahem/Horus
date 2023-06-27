<?php
include '../app/config.php';
include '../app/functions.php';

include '../Admin/shared/head.php';
include '../Admin/shared/asside.php';
include '../Admin/shared/header.php';



$select = "SELECT * FROM seats";
$s = mysqli_query($conn, $select);


if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $delete = "DELETE FROM seats where id = $id";
    mysqli_query($conn, $delete);
    path("bus/seat.php");
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
        <h1> Seats Booked</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/Horus/Admin/index.php">Home</a></li>
                <li class="breadcrumb-item active">List Seats</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->


    <div class="row">
        <!-- Recent Sales -->
        <div class="col-12">
            <div class="card recent-sales overflow-auto">



                <div class="card-body text-capitalize">
                    <h5 class="card-title">Recent Sales <span>| Today</span></h5>

                    <table class="table table-borderless datatable   ">
                        <thead class="text-center">
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Bus ID</th>
                                <th scope="col">Username</th>
                                <th scope="col">Pickup</th>
                                <th scope="col">Destination</th>
                                <th scope="col">Bus Number</th>
                                <th scope="col">Seat Booked</th>
                                <th scope="col">Start Time</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php foreach ($s as $data) : ?>
                                <tr>

                                    <td><?= $data['id'] ?></td>
                                    <td><?= $data['bus_check'] ?></td>
                                    <td><?= $data['user_name'] ?></td>
                                    <td><?= $data['pickup'] ?></td>
                                    <td><?= $data['destination'] ?></td>
                                    <td><?= $data['bus_num'] ?></td>
                                    <td><?= $data['seat_booked'] ?></td>
                                    <td><?= $data['start_time'] ?></td>
                                    <td>
                                        <div class="status d-flex  justify-content-center">
                                            <a href="/Horus/bus/seat.php?delete=<?= $data['id'] ?>" class="delete">
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