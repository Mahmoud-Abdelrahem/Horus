<?php
include 'shared/head.php';
include 'shared/header.php';
include 'shared/asside.php';
include '../app/config.php';
include '../app/functions.php';

$selectOne = "SELECT * from admin_rule";
$sOne = mysqli_query($conn, $selectOne);



if (isset($_GET['update'])) {
    $id = $_GET['update'];
    $select = "SELECT * FROM admin_data where id = $id";
    $s = mysqli_query($conn, $select);
    $row = mysqli_fetch_assoc($s);

    if (isset($_POST['edit'])) {
        $fullname = $_POST['name'];
        $email = $_POST['email'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $rule = $_POST['rule'];

        $update = "UPDATE admins SET full_name = '$fullname' , email = '$email' , name = '$username' , password = '$password' , ruleID = $rule  where id = $id";
        $u = mysqli_query($conn, $update);
        path("Admin/listAdmin.php");
    }
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
                <li class="breadcrumb-item active">Add Admin</li>
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
                                <label for="yourName" class="form-label">Full Name</label>
                                <input type="text" name="name" class="form-control" id="yourName" required value="<?= $row['full_name'] ?>">
                                <div class="invalid-feedback">Please, enter your name!</div>
                            </div>

                            <div class="col-12">
                                <label for="yourEmail" class="form-label">Your Email</label>
                                <input type="email" name="email" class="form-control" id="yourEmail" required value="<?= $row['email'] ?>">
                                <div class="invalid-feedback">Please enter a valid Email adddress!</div>
                            </div>

                            <div class="col-12">
                                <label for="yourUsername" class="form-label">Username</label>
                                <div class="input-group has-validation">
                                    <span class="input-group-text" id="inputGroupPrepend">@</span>
                                    <input type="text" name="username" class="form-control" id="yourUsername" required value="<?= $row['user_name'] ?>">
                                    <div class="invalid-feedback">Please choose a username.</div>
                                </div>
                            </div>

                            <div class="col-12">
                                <label for="yourPassword" class="form-label">Password</label>
                                <input type="password" name="password" class="form-control" id="yourPassword" required value="<?= $row['password'] ?>">
                                <div class="invalid-feedback">Please enter your password!</div>
                            </div>

                            <div class="col-12">
                                <label for="" class="form-label">Rule</label>

                                <select id="" name="rule" required class="form-control">
                                    <?php foreach ($sOne as $data) : ?>
                                        <option value="<?= $data['id'] ?>"> <?= $data['description'] ?> </option>
                                    <?php endforeach ?>
                                </select>
                                <div class="invalid-feedback">Please Select the Rule !</div>
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
include 'shared/footer.php';
include 'shared/script.php';

?>