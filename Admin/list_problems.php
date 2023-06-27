<?php
include 'shared/head.php';
include 'shared/header.php';
include 'shared/asside.php';
include '../app/config.php';
include '../app/functions.php';

$select = "SELECT * FROM admin_rule";
$s = mysqli_query($conn, $select);
$row = mysqli_fetch_assoc($s);

$selectTwo = "SELECT * FROM contacts_problem";
$sTwo = mysqli_query($conn, $selectTwo);




if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    $delete = "DELETE FROM admins where id = $id";
    unlink("upload/") . $sPhoto['image_name'];
    mysqli_query($conn, $delete);
    path("Admin/listAdmin.php");
}

if ($_SESSION['admin-data']['ruleID'] != 1) {
    auth_admin();
}

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
        <div class="col-12">
            <div class="card recent-sales overflow-auto">



                <div class="card-body">
                    <h5 class="card-title">Recent Sales <span>| Today</span></h5>

                    <table class="table table-borderless datatable ">
                        <thead class="text-center">
                            <tr>
                                <th scope="col">id</th>
                                <th scope="col">Name</th>
                                <th scope="col" colspan="1">Email</th>
                                <th scope="col">Phone</th>
                                <th scope="col">messages</th>
                                <th scope="col">Action</th>


                            </tr>
                        </thead>
                        <tbody>

                            <?php foreach ($sTwo as $data) : ?>
                                <tr>

                                    <td><?= $data['id'] ?></td>
                                    <td><?= $data['name'] ?></td>
                                    <td><?= $data['email'] ?></td>
                                    <td><?= $data['phone'] ?></td>
                                    <td><?= $data['problem'] ?></td>
            
                                    <td>
                                        <div class="status d-flex  justify-content-center">
                                            <a href="/Horus/Admin/editAdmin.php?update= <?= $data['id'] ?>" class="edit">
                                                <i class="fa-regular fa-pen-to-square"></i>
                                                <span>Edit</span>
                                                <div class="overlay"></div>
                                            </a>
                                            <a href="/Horus/Admin/listAdmin.php?delete=<?= $data['id'] ?>" class="delete" >
                                                <i class="fa-solid fa-trash"></i>
                                                <span>delete</span>
                                            
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




<?php
include 'shared/footer.php';
include 'shared/script.php';

?>