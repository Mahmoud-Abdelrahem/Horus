<?php
include 'shared/head.php';
include '../app/config.php';
include '../app/functions.php';

if (isset($_POST['login'])) {
  $name = $_POST['username'];
  $pass = $_POST['password'];
  $select = "SELECT * FROM admins WHERE name = '$name' and password = '$pass'";
  $s = mysqli_query($conn, $select);
  $row = mysqli_fetch_assoc($s);
  $numRows = mysqli_num_rows($s);

  if ($numRows == 1) {
    $_SESSION['admin-data'] = [
      "userName" => $name,
      "fullName" => $row['full_name'],
      "id" => $row['id'],
      'ruleID' => $row['ruleID'],
    ];
    $_SESSION['image'] = [
      "image_name" => $row['image_name'],
    ];
  

    pathAdmin("Admin/index.php");
  } else {
    $emailErorr[] = 'Wrong password or username';
  }
}


?>

<!-- Start loading page -->
<div class="loading-spiner">
  <span class="loader"></span>
</div>
<!-- End loading page -->



<main>
  <div class="container">

    <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

            <div class="d-flex justify-content-center py-4">
              <a href="" class="logo d-flex align-items-center w-auto">
                <img src="assets/img/software-engineer.png" alt="">
                <span class="d-none d-lg-block">ADMIN | PANEL</span>
              </a>
            </div><!-- End Logo -->

            <div class="card mb-3">

              <div class="card-body">

                <div class="pt-4 pb-2">
                  <h5 class="card-title text-center pb-0 fs-4">Login to Your Account</h5>
                  <p class="text-center small">Enter your username & password to login</p>
                </div>

                <form class="row g-3 needs-validation" method="post" novalidate>

                  <div class="col-12">
                    <label for="yourUsername" class="form-label">Username</label>
                    <div class="input-group has-validation">
                      <span class="input-group-text" id="inputGroupPrepend">@</span>
                      <input type="text" name="username" class="form-control" id="yourUsername" required>
                      <div class="invalid-feedback">Please enter your username.</div>
                    </div>
                  </div>

                  <div class="col-12">
                    <label for="yourPassword" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="yourPassword" required>
                    <div class="invalid-feedback">Please enter your password!</div>
                  </div>

                  <?php if (!empty($emailErorr)) : ?>
                    <div class="alert alert-black text-danger mt-3">
                      <ul>
                        <?php foreach ($emailErorr as $error) : ?>
                          <li><?= $error ?></li>
                        <?php endforeach; ?>
                      </ul>
                    </div>
                  <?php endif; ?>

                  <div class="col-12">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" name="remember" value="true" id="rememberMe">
                      <label class="form-check-label" for="rememberMe">Remember me</label>
                    </div>
                  </div>
                  <div class="col-12">
                    <button class="btn btn-primary w-100" type="submit" name="login">Login</button>
                  </div>

                </form>

              </div>
            </div>

            <div class="credits">

              Designed by <a href="https://abdulrahman-nasser.github.io/Portfolio/">Tag | Team</a>
            </div>

          </div>
        </div>
      </div>

    </section>

  </div>
</main><!-- End #main -->


<?php
include 'shared/script.php';

?>