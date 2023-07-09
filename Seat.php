<?php

include 'app/config.php';
include 'app/functions.php';
include 'shared/head.php';

if (isset($_SESSION['users'])) {
    $id = $_SESSION['users']['id'];
    $select = "SELECT * FROM users where id = $id";
    $s = mysqli_query($conn, $select);
    $row = mysqli_fetch_assoc($s);

    if (isset($_POST['lang'])) {
        if ($row['langID'] == 1) {
            $update = "UPDATE users set `langID` = 2  where id = $id";
            mysqli_query($conn, $update);
            path('Seat.php');
        } else {
            $update = "UPDATE users set `langID` = 1 where id = $id ";
            mysqli_query($conn, $update);
            path("Seat.php");
        }
    }

    if (isset($_POST['mode'])) {
        if ($row['modeID'] == 1) {
            $update = "UPDATE users set `modeID` = 2  where id = $id";
            mysqli_query($conn, $update);
            path('Seat.php');
        } else {
            $update = "UPDATE users set `modeID` = 1 where id = $id ";
            mysqli_query($conn, $update);
            path("Seat.php");
        }
    }
}

$error_booking = [];
$error_booking_ar = [];
$id_bus = $_SESSION['ready']['id'];
$bus_number = $_SESSION['ready']['bus_num'];
$pickup = $_SESSION['ready']['pickup'];
$destination = $_SESSION['ready']['destination'];
$salary = $_SESSION['ready']['salary'];
$start_time = $_SESSION['ready']['start_time'];
$username = $_SESSION['users']['email'];
$select1 = "SELECT * FROM seat_num ";
$s1 = mysqli_query($conn, $select1);

$current_hour = date('H');
$current_minute = date('i');
$current_sec = date("s");
$time_part1 = explode(':', $start_time);
$hour1 = $time_part1[0];
$min1 = $time_part1[1];
$sec = $time_part1[2];

// delete booking by time after 1 minute
if ($current_hour == $hour1 && $current_minute == $min1) {
    $delete_booking = "DELETE FROM seats WHERE start_time  = '$current_hour:$current_minute:00' AND bus_check = $id_bus ";
    $d = mysqli_query($conn, $delete_booking);

    $error_booking[] = "their is an update wait 1 minute";
    $error_booking_ar[] = "يوجد تحديث في النظام انتظر دقيقة واحدة";

}

if (isset($_GET['confirm'])) {
    $id_seat = $_GET['confirm'];

    $select2 = "SELECT * FROM seats";
    $s2 = mysqli_query($conn, $select2);
    $row2 = mysqli_fetch_assoc($s2);
    $exist = false;
    foreach ($s2 as $data) {
        if ($data['seat_booked'] == $id_seat && $data["bus_num"] == $id_bus) {

            path("Seat.php");
            $exist = true;
        }
    }
    if ($exist == false) {

        $_SESSION['confirm_booking'] = [
            'bus_check' => $id_bus,
            'user_name' => $username,
            'pickup' => $pickup,
            'destination' => $destination,
            'bus_num' => $bus_number,
            'seat_booked' => $id_seat,
            'start_time' => $start_time,
            'salary' => $salary,
        ];

        path("payment/pay.php");
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
                        <button name="lang" id="translate"> <i class="bi bi-translate"></i></button>
                    </form>

                </span>
            </div>
        </div>

    </div>
<?php endif;?>
<!-- End mode and translate with login users -->



<?php if ($row['langID'] == 2): ?>
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
                <li class="nav-item">
                  <a class="nav-link  animate__animated animate__bounceInUp active" data-wow-delay="1s" aria-current="page" href="/Horus/index.php">Home</a>
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
                <li class="nav-item nav-after">
                  <a class="nav-link animate__animated animate__bounceInUp " data-wow-delay="1s" href="/Horus/booking.php">Booking</a>
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
                  <img src="Admin/assets/img/software-engineer.png" style="width: 30px;" alt="">
                  <span class="d-none d-md-block ps-2" style="color: #e45927;">Staf Only</span>

                </a>
                <a class="nav-link nav-profile d-flex align-items-center pe-0" href="/Horus/profile.php">
                  <img src="assets/images/person.png" style="width: 30px;" alt="">
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

        <!-- section seat -->
        <section class="seat p-5">
            <div class="container">
                <div class="col-lg-9 m-auto text-center">
                    <div class="seat-info p-3">

                        <?php if (!empty($error_booking)): ?>
                            <?php foreach ($error_booking as $error): ?>
                                <div class="alert alert-danger text-capitalize">
                                    <h5> <?=$error?></h5>
                                </div>
                            <?php endforeach;?>
                        <?php endif;?>

                        <div class="seat-status justify-content-center d-flex">


                            <div class="seat-text col-md-4">
                                <span class="text-dark text1"> Available <i class="bi bi-person "></i></span>
                            </div>
                            <div class="seat-text col-md-4">
                                <span class="text-danger main_text"> Booked <i class="bi bi-person text-danger "></i></span>
                            </div>
                        </div>

                        <form action="" method="get">
                            <div class="row mt-3">
                                <?php foreach ($s1 as $data): ?>
                                    <?php
$seat_booked = $data['id'];
$select3 = "SELECT * FROM seats where bus_check = $id_bus and seat_booked = $seat_booked ";
$s3 = mysqli_query($conn, $select3);
$row3 = mysqli_fetch_assoc($s3);

?>
                                    <div class="col-lg-3 col-md-6">
                                        <div class="seat-status">

                                            <div class="seat-text-2 col-md-6 mt-3">
                                                <div class="text-span-seat p-0">
                                                    <span>
                                                        <?php if (empty($row3) && empty($error_booking)): ?>
                                                            <a href="?confirm= <?=$data['id']?>" class="text-dark booked_parent">
                                                                <svg viewBox="0 0 31 35" xmlns="http://www.w3.org/2000/svg" class="">
                                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M25.7941 30.323H28.7353V29.7265H25.7941V30.323ZM5.20588 17.4991L5.20588 27.9372H2.26471L2.26471 17.4991C2.26471 17.3345 2.39647 17.2009 2.55882 17.2009H4.91176C5.07412 17.2009 5.20588 17.3345 5.20588 17.4991ZM6.97059 21.9964L6.97059 17.4991C6.97059 16.4493 6.20235 15.5779 5.20588 15.433L5.20588 4.97345C5.20588 3.49363 6.39353 2.28938 7.85294 2.28938L23.1471 2.28938C24.6065 2.28938 25.7941 3.49363 25.7941 4.97345L25.7941 15.433C24.7976 15.5779 24.0294 16.4493 24.0294 17.4991V21.9964C23.9312 21.9803 23.8335 21.9726 23.7353 21.9726L7.26471 21.9726C7.16647 21.9726 7.06882 21.9803 6.97059 21.9964ZM6.97059 24.0602C6.97059 23.8955 7.10235 23.7619 7.26471 23.7619L23.7353 23.7619C23.8976 23.7619 24.0294 23.8955 24.0294 24.0602V30.323L6.97059 30.323L6.97059 24.0602ZM25.7941 17.4991C25.7941 17.3345 25.9259 17.2009 26.0882 17.2009H28.4412C28.6035 17.2009 28.7353 17.3345 28.7353 17.4991L28.7353 27.9372H25.7941L25.7941 17.4991ZM2.26471 30.323H5.20588V29.7265H2.26471V30.323ZM9.32353 32.7088L21.6765 32.7088V32.1124H9.32353V32.7088ZM28.4412 15.4115H27.5588L27.5588 4.97345C27.5588 2.50649 25.58 0.5 23.1471 0.5L7.85294 0.5C5.42 0.5 3.44118 2.50649 3.44118 4.97345L3.44118 15.4115H2.55882C1.42353 15.4115 0.5 16.3479 0.5 17.4991L0.5 31.2177C0.5 31.711 0.895882 32.1124 1.38235 32.1124H7.55941L7.56353 34.5L23.4459 34.5L23.4418 32.1124H29.6176C30.1041 32.1124 30.5 31.711 30.5 31.2177L30.5 17.4991C30.5 16.3479 29.5765 15.4115 28.4412 15.4115Z"></path>
                                                                </svg>
                                                                <h5><?=$data['id']?></h5>
                                                            </a>
                                                        <?php else: ?>
                                                            <a href="# <?=$data['id']?>" class="text-danger ">
                                                                <svg viewBox="0 0 31 35" xmlns="http://www.w3.org/2000/svg" class="booked">
                                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M25.7941 30.323H28.7353V29.7265H25.7941V30.323ZM5.20588 17.4991L5.20588 27.9372H2.26471L2.26471 17.4991C2.26471 17.3345 2.39647 17.2009 2.55882 17.2009H4.91176C5.07412 17.2009 5.20588 17.3345 5.20588 17.4991ZM6.97059 21.9964L6.97059 17.4991C6.97059 16.4493 6.20235 15.5779 5.20588 15.433L5.20588 4.97345C5.20588 3.49363 6.39353 2.28938 7.85294 2.28938L23.1471 2.28938C24.6065 2.28938 25.7941 3.49363 25.7941 4.97345L25.7941 15.433C24.7976 15.5779 24.0294 16.4493 24.0294 17.4991V21.9964C23.9312 21.9803 23.8335 21.9726 23.7353 21.9726L7.26471 21.9726C7.16647 21.9726 7.06882 21.9803 6.97059 21.9964ZM6.97059 24.0602C6.97059 23.8955 7.10235 23.7619 7.26471 23.7619L23.7353 23.7619C23.8976 23.7619 24.0294 23.8955 24.0294 24.0602V30.323L6.97059 30.323L6.97059 24.0602ZM25.7941 17.4991C25.7941 17.3345 25.9259 17.2009 26.0882 17.2009H28.4412C28.6035 17.2009 28.7353 17.3345 28.7353 17.4991L28.7353 27.9372H25.7941L25.7941 17.4991ZM2.26471 30.323H5.20588V29.7265H2.26471V30.323ZM9.32353 32.7088L21.6765 32.7088V32.1124H9.32353V32.7088ZM28.4412 15.4115H27.5588L27.5588 4.97345C27.5588 2.50649 25.58 0.5 23.1471 0.5L7.85294 0.5C5.42 0.5 3.44118 2.50649 3.44118 4.97345L3.44118 15.4115H2.55882C1.42353 15.4115 0.5 16.3479 0.5 17.4991L0.5 31.2177C0.5 31.711 0.895882 32.1124 1.38235 32.1124H7.55941L7.56353 34.5L23.4459 34.5L23.4418 32.1124H29.6176C30.1041 32.1124 30.5 31.711 30.5 31.2177L30.5 17.4991C30.5 16.3479 29.5765 15.4115 28.4412 15.4115Z"></path>
                                                                </svg>
                                                                <h5><?=$data['id']?></h5>
                                                            </a>
                                                        <?php endif;?>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                <?php endforeach;?>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </section>
        <!-- end section seat -->
    </main>
<?php else: ?>

    <main class="Arabic" id="Ar">

        <!-- Start Header -->
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
                  <img src="Admin/assets/img/software-engineer.png" style="width: 30px;" alt="">
                  <span class="d-none d-md-block ps-2" style="color: #e45927;">للموظفين فقط</span>

                </a>
                <a class="nav-link nav-profile d-flex align-items-center pe-0" href="/Horus/profile.php">
                  <img src="assets/images/person.png" style="width: 30px;" alt="">
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

        <!-- section seat -->
        <section class="seat p-5">
            <div class="container">
                <div class="col-lg-9 m-auto text-center">
                    <div class="seat-info p-3">
                        <?php if (!empty($error_booking_ar)): ?>
                            <?php foreach ($error_booking_ar as $error): ?>
                                <div class="alert alert-danger text-capitalize">
                                    <h5> <?=$error?></h5>
                                </div>
                            <?php endforeach;?>
                        <?php endif;?>

                        <div class="seat-status justify-content-center d-flex">

                            <div class="seat-text col-md-4 light">
                                <span class="text1"> متاح <i class="bi bi-person"></i></span>
                            </div>
                            <div class="seat-text col-md-4">
                                <span class="text-danger main_text"> محجوز <i class="bi bi-person text-danger "></i></span>
                            </div>
                        </div>

                        <form action="" method="get">
                            <div class="row mt-3">
                                <?php foreach ($s1 as $data): ?>
                                    <?php
$seat_booked = $data['id'];
$select3 = "SELECT * FRom seats where bus_check = $id_bus and seat_booked = $seat_booked";
$s3 = mysqli_query($conn, $select3);
$row3 = mysqli_fetch_assoc($s3);
?>
                                    <div class="col-lg-3 col-md-6">
                                        <div class="seat-status">

                                            <div class="seat-text-2 col-md-6 mt-3">
                                                <div class="text-span-seat p-0">
                                                    <span>
                                                        <?php if (empty($row3)): ?>
                                                            <a href="?confirm= <?=$data['id']?>" class="booked_parent">
                                                                <svg viewBox="0 0 31 35" xmlns="http://www.w3.org/2000/svg" class="">
                                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M25.7941 30.323H28.7353V29.7265H25.7941V30.323ZM5.20588 17.4991L5.20588 27.9372H2.26471L2.26471 17.4991C2.26471 17.3345 2.39647 17.2009 2.55882 17.2009H4.91176C5.07412 17.2009 5.20588 17.3345 5.20588 17.4991ZM6.97059 21.9964L6.97059 17.4991C6.97059 16.4493 6.20235 15.5779 5.20588 15.433L5.20588 4.97345C5.20588 3.49363 6.39353 2.28938 7.85294 2.28938L23.1471 2.28938C24.6065 2.28938 25.7941 3.49363 25.7941 4.97345L25.7941 15.433C24.7976 15.5779 24.0294 16.4493 24.0294 17.4991V21.9964C23.9312 21.9803 23.8335 21.9726 23.7353 21.9726L7.26471 21.9726C7.16647 21.9726 7.06882 21.9803 6.97059 21.9964ZM6.97059 24.0602C6.97059 23.8955 7.10235 23.7619 7.26471 23.7619L23.7353 23.7619C23.8976 23.7619 24.0294 23.8955 24.0294 24.0602V30.323L6.97059 30.323L6.97059 24.0602ZM25.7941 17.4991C25.7941 17.3345 25.9259 17.2009 26.0882 17.2009H28.4412C28.6035 17.2009 28.7353 17.3345 28.7353 17.4991L28.7353 27.9372H25.7941L25.7941 17.4991ZM2.26471 30.323H5.20588V29.7265H2.26471V30.323ZM9.32353 32.7088L21.6765 32.7088V32.1124H9.32353V32.7088ZM28.4412 15.4115H27.5588L27.5588 4.97345C27.5588 2.50649 25.58 0.5 23.1471 0.5L7.85294 0.5C5.42 0.5 3.44118 2.50649 3.44118 4.97345L3.44118 15.4115H2.55882C1.42353 15.4115 0.5 16.3479 0.5 17.4991L0.5 31.2177C0.5 31.711 0.895882 32.1124 1.38235 32.1124H7.55941L7.56353 34.5L23.4459 34.5L23.4418 32.1124H29.6176C30.1041 32.1124 30.5 31.711 30.5 31.2177L30.5 17.4991C30.5 16.3479 29.5765 15.4115 28.4412 15.4115Z"></path>
                                                                </svg>
                                                                <h5><?=$data['id']?></h5>
                                                            </a>
                                                        <?php else: ?>
                                                            <a href="# <?=$data['id']?>" class="text-danger">
                                                                <svg viewBox="0 0 31 35" xmlns="http://www.w3.org/2000/svg" class="booked">
                                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M25.7941 30.323H28.7353V29.7265H25.7941V30.323ZM5.20588 17.4991L5.20588 27.9372H2.26471L2.26471 17.4991C2.26471 17.3345 2.39647 17.2009 2.55882 17.2009H4.91176C5.07412 17.2009 5.20588 17.3345 5.20588 17.4991ZM6.97059 21.9964L6.97059 17.4991C6.97059 16.4493 6.20235 15.5779 5.20588 15.433L5.20588 4.97345C5.20588 3.49363 6.39353 2.28938 7.85294 2.28938L23.1471 2.28938C24.6065 2.28938 25.7941 3.49363 25.7941 4.97345L25.7941 15.433C24.7976 15.5779 24.0294 16.4493 24.0294 17.4991V21.9964C23.9312 21.9803 23.8335 21.9726 23.7353 21.9726L7.26471 21.9726C7.16647 21.9726 7.06882 21.9803 6.97059 21.9964ZM6.97059 24.0602C6.97059 23.8955 7.10235 23.7619 7.26471 23.7619L23.7353 23.7619C23.8976 23.7619 24.0294 23.8955 24.0294 24.0602V30.323L6.97059 30.323L6.97059 24.0602ZM25.7941 17.4991C25.7941 17.3345 25.9259 17.2009 26.0882 17.2009H28.4412C28.6035 17.2009 28.7353 17.3345 28.7353 17.4991L28.7353 27.9372H25.7941L25.7941 17.4991ZM2.26471 30.323H5.20588V29.7265H2.26471V30.323ZM9.32353 32.7088L21.6765 32.7088V32.1124H9.32353V32.7088ZM28.4412 15.4115H27.5588L27.5588 4.97345C27.5588 2.50649 25.58 0.5 23.1471 0.5L7.85294 0.5C5.42 0.5 3.44118 2.50649 3.44118 4.97345L3.44118 15.4115H2.55882C1.42353 15.4115 0.5 16.3479 0.5 17.4991L0.5 31.2177C0.5 31.711 0.895882 32.1124 1.38235 32.1124H7.55941L7.56353 34.5L23.4459 34.5L23.4418 32.1124H29.6176C30.1041 32.1124 30.5 31.711 30.5 31.2177L30.5 17.4991C30.5 16.3479 29.5765 15.4115 28.4412 15.4115Z"></path>
                                                                </svg>
                                                                <h5><?=$data['id']?></h5>
                                                            </a>
                                                        <?php endif;?>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                <?php endforeach;?>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </section>
        <!-- end section seat -->
    </main>

<?php endif;?>



<?php
include 'shared/script.php';
?>