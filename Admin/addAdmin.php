<?php
include 'shared/head.php';
// include 'shared/header.php';
include 'shared/asside.php';
include '../app/config.php';
include '../app/functions.php';

$select = "SELECT * FROM admin_rule";
$s = mysqli_query($conn, $select);
$row = mysqli_fetch_assoc($s);


$selectOne = "SELECT * FROM admins";
$sOne = mysqli_query($conn, $selectOne);
$rowOne = mysqli_fetch_assoc($sOne);
$numRows = mysqli_num_rows($sOne);

$email = "";
$username = "";
$fullname = "" ;

$emailErorr = [];

if (isset($_POST['add'])) {
  $fullname = filterValidation($_POST['name']);
  $username = filterValidation($_POST['username']);
  $email = filterValidation($_POST['email']);
  $password = filterValidation($_POST['password']);
  $rule = $_POST['rule'];
  // print_r($rule);


  if ($email == "" || $password == "" || $name == '' || $username  == '') {
    $emailErorr[] = "Email Or Password Can Not Be Empty";
  } else if (stringValidation($fullname, 8)) {
    $emailErorr[] = "please enter valid name more than 8 characters";
  } else if (stringValidation($password, 8)) {
    $emailErorr[] = "Password must be more than 8 characters";
  }
  foreach ($sOne as $data) {
    if ($data['name'] == $username) {
      $emailErorr[] = "User Name is not available";
    }
  }

  if (empty($emailErorr)) {
    $insert = " INSERT INTO admins VALUES (null , '$username' , '$email' , '$name' , '$password' , $rule)";
 
    $i = mysqli_query($conn , $insert);
    path('Admin/listAdmin.php');
  }
}


if ($_SESSION['admin-data']['ruleID'] != 1) {
  auth_admin(1, 2);
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
                <input type="text" name="name" class="form-control" id="yourName" required value="<?= $fullname ?>">
                <div class="invalid-feedback">Please, enter your name!</div>
              </div>

              <div class="col-12">
                <label for="yourEmail" class="form-label">Your Email</label>
                <input type="email" name="email" class="form-control" id="yourEmail" required value="<?= $email ?>">
                <div class="invalid-feedback">Please enter a valid Email adddress!</div>
              </div>

              <div class="col-12">
                <label for="yourUsername" class="form-label">Username</label>
                <div class="input-group has-validation">
                  <span class="input-group-text" id="inputGroupPrepend">@</span>
                  <input type="text" name="username" class="form-control" id="yourUsername" required value="<?= $username ?>">
                  <div class="invalid-feedback">Please choose a username.</div>
                </div>
              </div>

        

              <div class="col-12">
                <label for="yourPassword" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="yourPassword" required value="<?= $password ?>">
                <div class="invalid-feedback">Please enter your password!</div>
              </div>

              <div class="col-12">
                <label for="" class="form-label">Rule</label>

                <select id="" name="rule" required class="form-control">
                  <?php foreach ($s as $data) : ?>
                    <option value="<?= $data['id'] ?>"> <?= $data['description'] ?> </option>
                  <?php endforeach ?>
                </select>
                <div class="invalid-feedback">Please Select the Rule !</div>
              </div>

              <div class="col-12">
                <div class="form-check">
                  <input class="form-check-input" name="terms" type="checkbox" value="" id="acceptTerms" required>
                  <label class="form-check-label" for="acceptTerms">I agree and accept the <a href="#">terms and conditions</a></label>
                  <div class="invalid-feedback">You must agree before submitting.</div>
                </div>
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
                <button class="btn btn-primary w-100" name="add" type="submit">Add Admin</button>
              </div>
              <div class="col-12">
                <p class="small mb-0">Already have an account? <a href="pages-login.html">Log in</a></p>
              </div>
            </form>

          </div>
        </div>

      </div>
    </div>
  </section>

</main><!-- End #main -->




<?php
include 'shared/footer.php';
include 'shared/script.php';

?>