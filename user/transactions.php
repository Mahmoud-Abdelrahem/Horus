<?php
include '../app/config.php';
include '../app/functions.php';

include '../Admin/shared/head.php';
include '../Admin/shared/asside.php';
include '../Admin/shared/header.php';



$selectTwo = "SELECT * FROM transactions";
$sTwo = mysqli_query($conn, $selectTwo);


if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $delete = "DELETE FROM users where id = $id";
    mysqli_query($conn, $delete);
    path("user/transactions.php");
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
        <h1>Transactions</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/Horus/Admin/index.php">Home</a></li>
                <li class="breadcrumb-item active">List Transactions</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->


    <div class="row">
        <!-- Recent Sales -->
        <div class="col-12">
            <div class="card recent-sales overflow-auto">



                <div class="card-body">
                    <h5 class="card-title">Recent Sales <span>| Today</span></h5>

                    <table class="table table-borderless datatable ">
                        <thead class="text-center">
                            <tr>
                                <th scope="col">id</th>
                                <th scope="col">Customer Name</th>
                                <th scope="col">Customer Email</th>
                                <th scope="col">Item Name</th>
                                <th scope="col">Item Price</th>
                                <th scope="col">Item Price Currency</th>
                                <th scope="col">Paid Amount</th>
                                <th scope="col">Paid Amount Currency</th>
                                <th scope="col">TXN ID</th>
                                <th scope="col">Payment Status</th>
                                <th scope="col">Created Time</th>
                                <th scope="col">Modified Time</th>
                                <th scope="col">Action</th>


                            </tr>
                        </thead>
                        <tbody>

                            <?php foreach ($sTwo as $data) : ?>
                                <tr>

                                    <td><?= $data['id'] ?></td>
                                    <td><?= $data['customer_name'] ?></td>
                                    <td><?= $data['customer_email'] ?></td>
                                    <td><?= $data['item_name'] ?></td>
                                    <td><?= $data['item_price']/100 ?></td>
                                    <td><?= $data['item_price_currency'] ?></td>
                                    <td><?= $data['paid_amount']/100 ?></td>
                                    <td><?= $data['paid_amount_currency'] ?></td>
                                    <td><?= $data['txn_id'] ?></td>
                                    <td><?= $data['payment_status'] ?></td>
                                    <td><?= $data['created'] ?></td>
                                    <td><?= $data['modified'] ?></td>
                                    <td>
                                        <div class="status d-flex  justify-content-center">
                                        
                                            <a href="/Horus/user/listUser.php?delete=<?= $data['id'] ?>" class="delete">
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