<?php
// Include configuration file
require_once './config.php';
include '../app/functions.php';
include '../app/config.php';

// session_start();

if (isset($_SESSION['users'])) {
    $id_user = $_SESSION['users']['id'];
    $select_lang = "SELECT * FROM users where id = $id_user";
    $s_lang = mysqli_query($conn, $select_lang);
    $row_lang = mysqli_fetch_assoc($s_lang);

    if (isset($_POST['lang'])) {
        if ($row_lang['langID'] == 1) {
            $update = "UPDATE users set `langID` = 2  where id = $id_user";
            mysqli_query($conn, $update);
            path('payment/pay.php');
        } else {
            $update = "UPDATE users set `langID` = 1 where id = $id_user ";
            mysqli_query($conn, $update);
            path("payment/pay.php");
        }
    }

    if (isset($_POST['mode'])) {
        if ($row_lang['modeID'] == 1) {
            $update = "UPDATE users set `modeID` = 2  where id = $id_user";
            mysqli_query($conn, $update);
            path('payment/pay.php');
        } else {
            $update = "UPDATE users set `modeID` = 1 where id = $id_user ";
            mysqli_query($conn, $update);
            path("payment/pay.php");
        }
    }
}

$username = $_SESSION['confirm_booking']['user_name'];
$id = $_SESSION['users']['id'];

$select = "SELECT * FROM users where id = $id";
$i = mysqli_query($conn, $select);
$row = mysqli_fetch_assoc($i);

if (isset($_POST['signout'])) {
    session_unset();
    session_destroy();
    path('login.php');
}

auth(2)

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Payment</title>
  <!-- cdn -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

  <?php if ($row_lang['modeID'] == 1): ?>
    <link rel="stylesheet" href="css/main.css">
  <?php else: ?>
    <link rel="stylesheet" href="css/light.css">
    <?php endif;?>
  <link rel="stylesheet" href="bootstrap/bootstrap.css">
  <link rel="stylesheet" href="bootstrap-icons/bootstrap-icons.css">

  <script src="https://js.stripe.com/v3/"></script>
  <script src="js/checkout.js" STRIPE_PUBLISHABLE_KEY="<?php echo STRIPE_PUBLISHABLE_KEY; ?>" defer></script>


</head>

<body class="dark">

  <!-- Start loading page -->
  <div class="loading-spiner">
    <span class="loader"></span>
  </div>
  <!-- End loading page -->



  <!-- mode and translate  with login users-->
<?php if (isset($_SESSION['users'])): ?>
    <div class="slide-text">
      <div class="row">
        <div class="col-lg-2 ">
          <span class="moon ">
            <form method="post" enctype="multipart/form-data">
              <button name="mode" id="translate"><i class="fa-solid fa-moon moon-dark"></i></button>

            </form>
          </span>
        </div>
        <div class="col-lg-2">
          <span class="trans">

            <form method="post" enctype="multipart/form-data">
              <button name="lang" id="translate"> <i class="fa-solid fa-globe"></i></button>
            </form>

          </span>
        </div>
      </div>

    </div>
<?php endif;?>
  <!-- End mode and translate with login users -->
<?php if ($row_lang['langID'] == 2): ?>
    <main class="English" id="En">

      <!-- start header -->
      <header>
            <div class="Navbar p-3">
              <nav class="navbar navbar-expand-lg ">
                <div class="container-fluid">
                  <a class="navbar-brand hours animate__animated animate__bounceInLeft" data-wow-delay="1s" href="#">HORUS</a>
                  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button>
                  <div class="collapse navbar-collapse " id="navbarNav">
                    <ul class="navbar-nav m-auto">
                      <li class="nav-item nav-after">
                        <a class="nav-link  animate__animated animate__bounceInUp " data-wow-delay="1s" aria-current="page" href="/Horus/index.php">Home</a>
                      </li>
                      <li class="nav-item nav-after">
                        <a class="nav-link animate__animated animate__bounceInDown" data-wow-delay="1s" href="/Horus/index.php#about">About us</a>
                      </li>
                      <li class="nav-item nav-after">
                        <a class="nav-link animate__animated animate__bounceInUp " data-wow-delay="1s" href="/Horus/index.php#team">Team</a>
                      </li>
                      <li class="nav-item nav-after">
                        <a class="nav-link animate__animated animate__bounceInDown" data-wow-delay="1s" href="/Horus/index.php#services">Services</a>
                      </li>
                      <li class="nav-item ">
                        <a class="nav-link animate__animated animate__bounceInUp active" data-wow-delay="1s" href="/Horus/booking.php">Booking</a>
                      </li>
                      <li class="nav-item nav-after">
                        <a class="nav-link  animate__animated animate__bounceInDown" data-wow-delay="1s" href="/Horus/contact.php">Contact</a>
                      </li>
                    </ul>
                    <?php if (isset($_SESSION['users'])): ?>
                      <form class="d-flex m-auto header-login" method="post" role="search">
                        <button name="signout" href="/Horus/login.php" class="Btn margin-response m-auto animate__animated animate__lightSpeedInRight" data-wow-delay="1s">Logout </button>
                      </form>
                      <a href="/Horus/Admin/login.php" class=" nav-link nav-profile d-flex align-items-center pe-2 animate__animated animate__lightSpeedInRight" data-wow-delay="1s">
                        <img src="/Horus/Admin/assets/img/software-engineer.png" style="width: 30px;" alt="">
                        <span class="d-none d-md-block ps-2" style="color: #e45927;">Staf Only</span>

                      </a>
                      <a class="nav-link nav-profile d-flex align-items-center pe-0" href="/Horus/profile.php">
                        <img src="/Horus/assets/images/person.png" style="width: 30px;" alt="">
                        <span class="d-none d-md-block ps-2" style="color: #e45927;"><?=$row['name']?></span>
                      </a><!-- End Profile Iamge Icon -->
                    <?php else: ?>
                      <form class="d-flex m-auto header-login" role="search">
                        <a href="/Horus/login.php" class="Btn margin-response m-auto animate__animated animate__lightSpeedInRight" data-wow-delay="1s"> Login</a>
                      </form>
                      <a href="/Horus/Admin/login.php" class=" margin-response m-auto animate__animated animate__lightSpeedInRight" data-wow-delay="1s"> <img src="Admin/assets/img/software-engineer.png" style="width: 30px;" alt=""></a>
                    <?php endif;?>
                  </div>
                </div>
              </nav>
            </div>
    </header>
    <!-- end header -->

    <section class="payment p-5">
    <div class="overlay"></div>
    <div class="container col-md-6">
      <div class="panel">

        <div class="panel-body">
          <!-- Display status message -->
          <div id="paymentResponse" class="hidden"></div>

          <!-- Display a payment form -->
          <form id="paymentFrm" class="hidden">
            <!-- paymentFrm -->
            <div class="form-group ">
              <label>Name</label>
              <input type="text" id="name" class="form-control" placeholder="Enter name" required="" autofocus="">
            </div>
            <div class="form-group mt-3">
              <label>Email</label>
              <input type="email" id="email" class="form-control" placeholder="Enter email" value="<?=$username?>" required="">
            </div>

            <div id="paymentElement" class="mt-3" style="color: white;">

            </div>

            <!-- Form submit button -->
            <div class="btn-confirm text-center">
              <button id="submitBtn" class="pay_btn mt-3 text-center" name="pay">
                <span id="buttonText">Pay Now</span>

              </button>
              <div class="spinner hidden" id="spinner"></div>

            </div>
          </form>

          <!-- Display processing notification -->
          <div id="frmProcess" class="hidden">

          </div>


        </div>
      </div>
    </div>
  </section>

</main>
<?php else: ?>
  <main class="Arabic" id="Ar">
  <header style="direction:rtl;" >
      <div class="Navbar p-3">
        <nav class="navbar navbar-expand-lg ">
          <div class="container-fluid">
            <a class="navbar-brand hours animate__animated animate__bounceInLeft" data-wow-delay="1s" href="#">حورس</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse " id="navbarNav">
              <ul class="navbar-nav m-auto">
                <li class="nav-item">
                  <a class="nav-link  animate__animated animate__bounceInUp active" data-wow-delay="1s" aria-current="page" href="/Horus/index.php">الرئيسية</a>
                </li>
                <li class="nav-item nav-after">
                  <a href ="#aboutus" class="nav-link animate__animated animate__bounceInDown" data-wow-delay="1s" href="/Horus/index.php#about">من نحن</a>
                </li>
                <li  class="nav-item nav-after">
                  <a href="#team_Ar" class="nav-link animate__animated animate__bounceInUp " data-wow-delay="1s" href="/Horus/index.php#team">فريق العمل</a>
                </li>
                <li class="nav-item nav-after">
                  <a href="#services_Ar" class="nav-link animate__animated animate__bounceInDown" data-wow-delay="1s" href="/Horus/index.php#services">الخدمات</a>
                </li>
                <li class="nav-item nav-after">
                  <a class="nav-link animate__animated animate__bounceInUp " data-wow-delay="1s" href="/Horus/booking.php">الحجز</a>
                </li>
                <li class="nav-item nav-after">
                  <a class="nav-link  animate__animated animate__bounceInDown" data-wow-delay="1s" href="/Horus/contact.php">تواصل معنا</a>
                </li>
              </ul>
              <?php if (isset($_SESSION['users'])): ?>
                <form class="d-flex m-auto header-login" method="post" role="search">
                  <button name="signout" href="/Horus/login.php" class="Btn margin-response m-auto animate__animated animate__lightSpeedInRight" data-wow-delay="1s">تسجيل الخروج </button>
                </form>
                <a href="/Horus/Admin/login.php" class=" nav-link nav-profile d-flex align-items-center pe-2 animate__animated animate__lightSpeedInRight" data-wow-delay="1s">
                  <img src="../Admin/assets/img/software-engineer.png" style="width: 30px;" alt="">
                  <span class="d-none d-md-block ps-2" style="color: #e45927;">للموظفين فقط</span>

                </a>
                <a class="nav-link nav-profile d-flex align-items-center pe-0" href="/Horus/profile.php">
                  <img src="../assets/images/person.png" style="width: 30px;" alt="">
                  <span class="d-none d-md-block ps-2" style="color: #e45927;"><?=$row['name']?></span>
                </a><!-- نهاية صورة الملف الشخصي -->
              <?php else: ?>
                <form class="d-flex m-auto header-login" role="search">
                  <a href="/Horus/login.php" class="Btn margin-response m-auto animate__animated animate__lightSpeedInRight" data-wow-delay="1s"> تسجيل الدخول</a>
                </form>
                <a href="/Horus/Admin/login.php" class=" margin-response m-auto animate__animated animate__lightSpeedInRight" data-wow-delay="1s"> <img src="Admin/assets/img/software-engineer.png" style="width: 30px;" alt=""></a>
              <?php endif;?>
            </div>
          </div>
        </nav>
      </div>
    </header>
    <!-- نهاية الهيدر -->


    <section class="payment p-5">
    <div class="overlay"></div>
    <div class="container col-md-6">
        <div class="panel">

            <div class="panel-body">
                <!-- Display status message -->
                <div id="paymentResponse" class="hidden"></div>

                <!-- Display a payment form -->
                <form id="paymentFrm" class="hidden" style="direction: rtl;">
                    <!-- paymentFrm -->
                    <div class="form-group ">
                        <label>الاسم</label>
                        <input type="text" id="name" class="form-control" placeholder="أدخل الاسم" required="" autofocus="">
                    </div>
                    <div class="form-group mt-3">
                        <label>البريد الإلكتروني</label>
                        <input type="email" id="email" class="form-control" placeholder="أدخل البريد الإلكتروني" value="<?=$username?>" required="">
                    </div>

                    <div id="paymentElement" class="mt-3" style="color: white;">

                    </div>

                    <!-- Form submit button -->
                    <div class="btn-confirm text-center">
                        <button id="submitBtn" class="pay_btn mt-3 text-center" name="pay">
                            <span id="buttonText">ادفع الآن</span>
                        </button>
                        <div class="spinner hidden" id="spinner"></div>

                    </div>
                </form>

                <!-- Display processing notification -->
                <div id="frmProcess" class="hidden">

                </div>


            </div>
        </div>
    </div>
</section>

  </main>
<?php endif;?>


  <script src="jQuery/jquery-3.6.1.min.js"></script>
  <script src="bootstrap/bootstrap.bundle.js"></script>
  <script src="js/main.js"></script>



</body>

</html>