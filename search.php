<?php

include 'app/config.php';
include 'app/functions.php';
include 'shared/head.php';

$searchError = [];
$searchError2 = [];

if (isset($_SESSION['users'])) {

    // search code
    $picupLocation = $_SESSION['bus']['pickup'];
    $destination = $_SESSION['bus']['destination'];
    $select = "SELECT * FROM search_bus  where pickup = '$picupLocation' and destination = '$destination'";
    $s = mysqli_query($conn, $select);
    $row = mysqli_fetch_assoc($s);


    if (isset($_GET['bus_info'])) {
        $id1 = $_GET['bus_info'];
        $selectTwo = "SELECT * FROM search_bus where id = $id1";
        $sTwo = mysqli_query($conn, $selectTwo);
        $rowTwo = mysqli_fetch_assoc($sTwo);
        $_SESSION['okay']['ok']=false;


        $_SESSION['ready'] = [
            "id" => $id1,
            "bus_num" => $rowTwo['bus_number'],
            "start_time" => $rowTwo['start_time'],
            "pickup" => $rowTwo['pickup'],
            "destination" => $rowTwo['destination'],
            "salary"=>$rowTwo['salary']
        ];
        path("Seat.php");
    }



    if (empty($row)) {
        $searchError[] = "There is no bus on this direction";
        $searchError2[] = "لا يوجد حافلة في هذا الاتجاه";
    }



    // mode dark and translate
    $id = $_SESSION['users']['id'];
    $selectOne = "SELECT * FROM users where id = $id";
    $sOne =  mysqli_query($conn, $selectOne);
    $rowOne = mysqli_fetch_assoc($sOne);

    if (isset($_POST['lang'])) {
        if ($rowOne['langID'] == 1) {
            $update = "UPDATE users set `langID` = 2  where id = $id";
            mysqli_query($conn, $update);
            path('search.php');
        } else {
            $update = "UPDATE users set `langID` = 1 where id = $id ";
            mysqli_query($conn, $update);
            path("search.php");
        }
    }

    if (isset($_POST['mode'])) {
        if ($rowOne['modeID'] == 1) {
            $update = "UPDATE users set `modeID` = 2  where id = $id";
            mysqli_query($conn, $update);
            path('search.php');
        } else {
            $update = "UPDATE users set `modeID` = 1 where id = $id ";
            mysqli_query($conn, $update);
            path("search.php");
        }
    }
}


if (isset($_POST['signout'])) {
    session_unset();
    session_destroy();
    path('login.php');
}

auth(2);
?>




<!-- Start loading page -->
<div class="loading-spiner">
    <span class="loader"></span>
</div>
<!-- End loading page -->


<?php if (isset($_SESSION['users'])) : ?>
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
<?php endif; ?>




<?php if ($rowOne['langID'] == 2) : ?>
    <main class="English search" id="En" style="text-transform: capitalize ;">

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
              <?php if (isset($_SESSION['users'])) : ?>
                <form class="d-flex m-auto header-login" method="post" role="search">
                  <button name="signout" href="/Horus/login.php" class="Btn margin-response m-auto animate__animated animate__lightSpeedInRight" data-wow-delay="1s">Logout </button>
                </form>
                <a href="/Horus/Admin/login.php" class=" nav-link nav-profile d-flex align-items-center pe-2 animate__animated animate__lightSpeedInRight" data-wow-delay="1s">
                  <img src="Admin/assets/img/software-engineer.png" style="width: 30px;" alt="">
                  <span class="d-none d-md-block ps-2" style="color: #e45927;">Staf Only</span>

                </a>
                <a class="nav-link nav-profile d-flex align-items-center pe-0" href="/Horus/profile.php">
                  <img src="assets/images/Abod.jpg" style="width: 30px;" alt="">
                  <span class="d-none d-md-block ps-2" style="color: #e45927;"><?= $rowOne['name'] ?></span>
                </a><!-- End Profile Iamge Icon -->
              <?php else : ?>
                <form class="d-flex m-auto header-login" role="search">
                  <a href="/Horus/login.php" class="Btn margin-response m-auto animate__animated animate__lightSpeedInRight" data-wow-delay="1s"> Login</a>
                </form>
                <a href="/Horus/Admin/login.php" class=" margin-response m-auto animate__animated animate__lightSpeedInRight" data-wow-delay="1s"> <img src="Admin/assets/img/software-engineer.png" style="width: 30px;" alt=""></a>
              <?php endif; ?>
            </div>
          </div>
        </nav>
      </div>
    </header>
    <!-- end header -->

        <section class="landing-parent">
            <!--start landing  -->
            <div class="landing">
                <div class="text">
                    <h2>Horus</h2>
                    <p>Horus with you anywhere</p>
                </div>

            </div>
            <!--end landing  -->
        </section>


        <div class="container p-70">

            <?php if (empty($searchError) && empty($searchError2)) : ?>

                <div class="row ">
                    <?php foreach ($s as $data) : ?>
                        <div class="col-lg-6">


                            <div class="card">
                                <img src="assets/images/card.jpg" class="card-img-top" alt="not found">
                                <div class="card-body">
                                    <div class="text">

                                        <h2>From <?= $data['pickup'] ?> To <?= $data['destination'] ?></h2>
                                        <P>Bus Number :<span> <?= $data['bus_number'] ?> </span></P>

                                        <P>price :<span> <?= $data['salary'] ?> L.E</span></P>

                                        <div class="date">

                                            <p>Start Time : <span><?= $data['start_time'] ?></span></p>
                                        </div>

                                        <div class="buy my-3">
                                            <form method="post">
                                                <a href="?bus_info=<?= $data['id'] ?>" class="book_btn">Book Now</a>
                                            </form>
                                            <div class="payment text-center my-3">
                                                <img src="assets/images/pay.webp" alt="pay">
                                                <img src="assets/images/visa.jpg" alt="pay">
                                                <img src="assets/images/fa.webp" alt="pay">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php else : ?>
                <div class="row  justify-content-center">

                    <div class="col-lg-8">


                        <div class="card">
                            <div class="card-body">
                                <div class="alert alert-dark text-center text-danger mt-3">
                                    <ul>
                                        <?php foreach ($searchError as $error) : ?>
                                            <li><?= $error ?></li>
                                        <?php endforeach; ?>
                                        <li class="p-2"><a href="/Horus/booking.php" class="text-primary mt-3">Edit Search</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            <?php endif; ?>

        </div>

        <!-- end Search trips  -->


        <script src="vendor/bootstrap/bootstrap.bundle.js"></script>
    </main>
<?php else : ?>


    <main class="Arabic search search_ar" style="direction:rtl;" id="Ar">
    <header>
      <div class="Navbar p-3">
        <nav class="navbar navbar-expand-lg ">
          <div class="container-fluid">
            <a class="navbar-brand hours animate__animated animate__bounceInLeft" data-wow-delay="1s" href="#">حورس</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse " id="navbarNav">
              <ul class="navbar-nav m-auto">
                <li class="nav-item nav-after">
                  <a class="nav-link animate__animated animate__bounceInUp " data-wow-delay="1s" aria-current="page" href="/Horus/index.php">الرئيسية</a>
                </li>
                <li class="nav-item nav-after">
                  <a class="nav-link animate__animated animate__bounceInDown" data-wow-delay="1s" href="/Horus/index.php#about">من نحن</a>
                </li>
                <li class="nav-item nav-after">
                  <a class="nav-link animate__animated animate__bounceInUp " data-wow-delay="1s" href="/Horus/index.php#team">فريق العمل</a>
                </li>
                <li class="nav-item nav-after">
                  <a class="nav-link animate__animated animate__bounceInDown" data-wow-delay="1s" href="/Horus/index.php#services">الخدمات</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link animate__animated animate__bounceInUp active " data-wow-delay="1s" href="/Horus/booking.php">الحجز</a>
                </li>
                <li class="nav-item nav-after">
                  <a class="nav-link  animate__animated animate__bounceInDown" data-wow-delay="1s" href="/Horus/contact.php">تواصل معنا</a>
                </li>
              </ul>
              <?php if (isset($_SESSION['users'])) : ?>
                <form class="d-flex m-auto header-login" method="post" role="search">
                  <button name="signout" href="/Horus/login.php" class="Btn margin-response m-auto animate__animated animate__lightSpeedInRight" data-wow-delay="1s">تسجيل الخروج </button>
                </form>
                <a href="/Horus/Admin/login.php" class=" nav-link nav-profile d-flex align-items-center pe-2 animate__animated animate__lightSpeedInRight" data-wow-delay="1s">
                  <img src="Admin/assets/img/software-engineer.png" style="width: 30px;" alt="">
                  <span class="d-none d-md-block ps-2" style="color: #e45927;">للموظفين فقط</span>

                </a>
                <a class="nav-link nav-profile d-flex align-items-center pe-0" href="/Horus/profile.php">
                  <img src="assets/images/person.png" style="width: 30px;" alt="">
                  <span class="d-none d-md-block ps-2" style="color: #e45927;"><?= $rowOne['name'] ?></span>
                </a><!-- نهاية صورة الملف الشخصي -->
              <?php else : ?>
                <form class="d-flex m-auto header-login" role="search">
                  <a href="/Horus/login.php" class="Btn margin-response m-auto animate__animated animate__lightSpeedInRight" data-wow-delay="1s"> تسجيل الدخول</a>
                </form>
                <a href="/Horus/Admin/login.php" class=" margin-response m-auto animate__animated animate__lightSpeedInRight" data-wow-delay="1s"> <img src="Admin/assets/img/software-engineer.png" style="width: 30px;" alt=""></a>
              <?php endif; ?>
            </div>
          </div>
        </nav>
      </div>
    </header>
    <!-- نهاية الهيدر -->

        <section class="landing-parent text-center">
            <!--start landing  -->
            <div class="landing">
                <div class="text">
                    <h2>حورس</h2>
                    <p style="font-size: 38px;">معاك دائما في كل مكان</p>
                </div>

            </div>
            <!--end landing  -->
        </section>

        <div class="container">

            <?php if (empty($searchError) && empty($searchError2)) : ?>
                <div class="row mb-3">

                    <?php foreach ($s as $data) : ?>
                        <div class="col-lg-6">
                            <div class="card">
                                <img src="assets/images/card.jpg" class="card-img-top" alt="not found">
                                <div class="card-body">
                                    <div class="text">
                                        <h2>من <?= $data['pickup_ar'] ?> إلى <?= $data['destination_ar'] ?></h2>
                                        <P>رقم الحافلة:<span> <?= $data['bus_number'] ?> </span></P>
                                        <P>السعر: <span><?= $data['salary_ar'] ?> ج.م</span></P>
                                        <div class="date">
                                            <p>وقت الانطلاق: <span><?= $data['start_time'] ?></span> </p>
                                        </div>
                                        <div class="buy my-3">
                                            <form method="post">
                                                <a href="?bus_info=<?= $data['id'] ?>" class="book_btn">احجز الأن</a>
                                            </form>
                                            <div class="payment my-3 text-center">
                                                <img src="assets/images/pay.webp" alt="pay">
                                                <img src="assets/images/visa.jpg" alt="pay">
                                                <img src="assets/images/fa.webp" alt="pay">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php else : ?>

                <div class="row  justify-content-center">
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="alert alert-dark text-center text-danger mt-3">
                                    <ul>
                                        <?php foreach ($searchError2 as $error) : ?>
                                            <li><?= $error ?></li>
                                        <?php endforeach; ?>
                                        <li class="p-2"><a href="/Horus/booking.php" class="text-primary mt-3">تعديل البحث </a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    <?php endif ?>
    </div>

    </main>

<?php endif; ?>
<?php
include 'shared/script.php';
?>