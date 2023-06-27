<?php
include '../app/config.php';
include '../app/functions.php';
include '../Admin/shared/head.php';
include '../Admin/shared/asside.php';
include '../Admin/shared/header.php';



// select usesrs for valditation
$select = "SELECT * FROM users ";
$s = mysqli_query($conn, $select);
$row = mysqli_fetch_assoc($s);

// make variables empty
$emailError = [];
$emailError2 = [];
$name = "";
$email = "";
$phone = null;




if (isset($_GET['update'])) {
    $id = $_GET['update'];
    $select = "SELECT * FROM users where id = $id";
    $s = mysqli_query($conn, $select);
    $row = mysqli_fetch_assoc($s);




    if (isset($_POST['edit'])) {




        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $password = filterValidation($_POST['password']);
        $confirmpass = filterValidation($_POST['confirm']);


        if ($email == "" || $password == "" || $phone == '' || $name == '' || $confirmpass == "") {
            $emailErorr[] = "Email Or Password Can Not Be Empty";
        } else if (stringValidation($name, 4)) {
            $emailErorr[] = "please enter valid name more than 4 characters";
        } else if ($password != $confirmpass) {
            $emailErorr[] = "Password and Confirm Password do not match";
        } else if (stringValidation($password, 8)) {
            $emailErorr[] = "Password must be more than 8 characters";
        }


        if (empty($emailErorr)) {
            $update = "UPDATE users SET `name` = '$name' ,phone = $phone ,  email = '$email'  , password = '$password' , confirmpass = '$confirmpass'  where id = $id";
            $u = mysqli_query($conn, $update);
            path("user/listUser.php");
        }
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
        <h1>User</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/Horus/Admin/index.php">Home</a></li>
                <li class="breadcrumb-item active">Add User</li>
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
                                <label for="yourName" class="form-label">Name</label>
                                <input type="text" name="name" class="form-control" id="yourName" required value="<?= $row['name'] ?>">
                                <div class="invalid-feedback">Please, enter your name!</div>
                            </div>
                            <div class="col-12">
                                <label for="yourName" class="form-label">Phone</label>
                                <input type="text" name="phone" class="form-control" id="yourName" required value="<?= $row['phone'] ?>">
                                <div class="invalid-feedback">Please, enter your Phone!</div>
                            </div>


                            <div class="col-12">
                                <label for="yourEmail" class="form-label">Email</label>
                                <input type="email" name="email" class="form-control" id="yourEmail" required value="<?= $row['email'] ?>">
                                <div class="invalid-feedback">Please enter a valid Email adddress!</div>
                            </div>

                            <div class="col-12">
                                <label for="yourPassword" class="form-label">Password</label>
                                <input type="password" name="password" class="form-control" id="yourPassword" required value="<?= $row['password'] ?>">
                                <div class="invalid-feedback">Please enter your password!</div>
                            </div>
                            <div class="col-12">
                                <label for="yourPassword" class="form-label">Confirm Password</label>
                                <input type="password" name="confirm" class="form-control" id="yourPassword" required value="<?= $row['confirmpass'] ?>">
                                <div class="invalid-feedback">Please enter your Confirm password!</div>
                            </div>

                            <?php if (!empty($emailErorr)) : ?>
                                <div class="alert alert-danger mt-3">
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



<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>


<?php
include '../Admin/shared/footer.php';
include '../Admin/shared/script.php';
?>