<?php
include 'app/config.php';
include 'app/functions.php';
include 'shared/head.php';
session_start();

$select = "SELECT * FROM users";
$s =  mysqli_query($conn, $select);
$row = mysqli_fetch_assoc($s);
$numRows = mysqli_num_rows($s);

if (isset($_SESSION['users'])) {
    $id = $_SESSION['users']['id'];
    if (isset($_SESSION['users'])) {
        if (isset($_POST['lang'])) {
            if ($row['langID'] == 1) {
                $update = "UPDATE users set `langID` = 2  where id = $id";
                mysqli_query($conn, $update);
            } else {
                $update = "UPDATE users set `langID` = 1 where id = $id ";
                mysqli_query($conn, $update);
            }
        }
    } else {
        path("login.php");
    }
}

if (isset($_POST['signout'])) {
    session_unset();
    session_destroy();
    path('login.php');
}

?>

<!-- Start loading page -->
<div class="loading-spiner">
    <span class="loader"></span>
</div>
<!-- End loading page -->


<!-- mode and translate  with login users-->
<?php if (isset($_SESSION['users'])) : ?>
    <div class="slide-text">
        <div class="row">
            <div class="col-lg-2 ">
                <span class="moon ">
                    <a onclick="myFunction()"><i class="fa-solid fa-moon moon-dark" id="btnMode"></i></a>
                </span>
            </div>
            <div class="col-lg-2">
                <span class="trans">

                    <form action="" method="post" enctype="multipart/form-data">
                        <button name="lang" id="translate"> <i class="fa-solid fa-globe"></i></button>
                    </form>

                </span>
            </div>
        </div>

    </div>
<?php endif; ?>
<!-- End mode and translate with login users -->


<?php if (isset($_SESSION['users'])) : ?>
    <?php if ($row['langID'] == 1) : ?>
        <!-- start main english -->
        <main class="English" id="En">
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
                                        <a class="nav-link  animate__animated animate__bounceInUp " data-wow-delay="1s" aria-current="page" href="#">Home</a>
                                    </li>
                                    <li class="nav-item nav-after">
                                        <a class="nav-link animate__animated animate__bounceInDown" data-wow-delay="1s" href="#about">About us</a>
                                    </li>
                                    <li class="nav-item nav-after">
                                        <a class="nav-link animate__animated animate__bounceInUp " data-wow-delay="1s" href="#team">Team</a>
                                    </li>
                                    <li class="nav-item nav-after">
                                        <a class="nav-link animate__animated animate__bounceInDown" data-wow-delay="1s" href="#services">Services</a>
                                    </li>
                                    <li class="nav-item ">
                                        <a class="nav-link animate__animated animate__bounceInUp active" data-wow-delay="1s" href="booking.php">Booking</a>
                                    </li>
                                    <li class="nav-item nav-after">
                                        <a class="nav-link  animate__animated animate__bounceInDown" data-wow-delay="1s" href="contact.php">Contact</a>
                                    </li>
                                </ul>
                                <?php if (isset($_SESSION['users'])) : ?>
                                    <form class="d-flex m-auto header-login" method="post" role="search">
                                        <button name="signout" href="/Horus/login.php" class="Btn margin-response m-auto animate__animated animate__lightSpeedInRight" data-wow-delay="1s">Logout </button>
                                    </form>
                                <?php else : ?>
                                    <form class="d-flex m-auto header-login" role="search">
                                        <a href="/Horus/login.php" class="Btn margin-response m-auto animate__animated animate__lightSpeedInRight" data-wow-delay="1s"> Login</a>
                                    </form>
                                <?php endif; ?>
                            </div>
                        </div>
                    </nav>
                </div>
            </header>
            <!-- end header -->

            <!-- start section booking -->
            <section class="booking">
                <div class="overlay-booking"></div>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8 booking-content">
                            <div class="info text-center animate__animated animate__jackInTheBox" data-wow-delay="1s">
                                <h1>Book A Bus</h1>
                            </div>
                        </div>
                        <div class="col-lg-8 col-md-12 p-4  info-form">
                            <form action="">
                                <div class="form-group">
                                    <div class="col-lg-6 col-md-6 form-group-content animate__animated animate__zoomInRight" data-wow-delay="1.5s">
                                        <input type="text" class="form-control" placeholder="Enter Your name">
                                    </div>
                                    <div class="col-lg-6 col-md-6 form-group-content animate__animated animate__zoomInLeft" data-wow-delay="1.5s">
                                        <input type="email" class="form-control" placeholder="Enter Your Email">
                                    </div>
                                    <div class="col-lg-12 col-md-12 form-group-content animate__animated animate__bounceIn" data-wow-delay="1.5s">
                                        <input type="number" class="form-control" placeholder="Phone Number">
                                    </div>
                                    <div class="col-lg-6 col-md-6 form-group-content mt-3 animate__animated animate__slideInLeft" data-wow-delay="1.5s">
                                        <label for="" class="">Picup Location</label>
                                        <select name="" id="" class="form-control form-select">
                                            <option value="">sohag university</option>
                                            <option value="">tahta</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-6 col-md-6 mt-3 form-group-content animate__animated animate__slideInRight" data-wow-delay="1.5s">
                                        <label for="">Destination</label>
                                        <select name="" id="" class="form-control form-select">
                                            <option value="">sohag university</option>
                                            <option value="">tahta</option>
                                        </select>
                                    </div>

                                    <div class="col-lg-6 col-md-6 mt-2 form-group-content animate__animated animate__bounceInUp" data-wow-delay="1s">
                                        <label for="">Picup Date</label>
                                        <input type="date" class="form-control" placeholder="Phone Number">
                                    </div>
                                    <div class="col-lg-6 col-md-6 mt-2 form-group-content animate__animated animate__bounceInDown" data-wow-delay="1s">
                                        <label for="">Picup Time</label>
                                        <input type="time" class="form-control" placeholder="Phone Number">
                                    </div>
                                    <div class="col-lg-12 col-md-12 mt-2 form-group-content animate__animated animate__zoomIn" data-wow-delay=".5s">
                                        <button class="booking-btn">Book now</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
            <!-- end section booking -->
        </main>
        <!-- end  main englsh -->

    <?php else : ?>
        <!-- start Arabic  -->
        <main class="Arabic" id="Ar">


            <!-- start Header -->
            <header>
                <div class="Navbar p-3">
                    <nav class="navbar navbar-expand-lg ">
                        <div class="container-fluid">
                            <a class="navbar-brand hours animate__animated animate__bounceInLeft" data-wow-delay="1s" href="#">HORUS
                            </a>
                            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse " id="navbarNav">
                                <ul class="navbar-nav m-auto">
                                    <li class="nav-item active_ar active_ar6">
                                        <a class="nav-link  animate__animated animate__bounceInDown" data-wow-delay="1s" href="contact.php">الاتصال بنا</a>
                                    </li>
                                    <li class="nav-item active_ar active_ar5 ">
                                        <a class="nav-link animate__animated animate__bounceInUp " data-wow-delay="1s" href="booking.php">الحجز</a>
                                    </li>
                                    <li class="nav-item active_ar active_ar4">
                                        <a class="nav-link animate__animated animate__bounceInDown" data-wow-delay="1s" href="#services_Ar">الخدمات</a>
                                    </li>
                                    <li class="nav-item active_ar active_ar3">
                                        <a class="nav-link animate__animated animate__bounceInUp " data-wow-delay="1s" href="#team_Ar">الفريق</a>
                                    </li>
                                    <li class="nav-item active_ar active_ar2 ">
                                        <a class="nav-link animate__animated animate__bounceInDown" data-wow-delay="1s" href="#aboutus">من نحن</a>
                                    </li>
                                    <li class="nav-item active_ar active_ar1">
                                        <a class="nav-link  animate__animated animate__bounceInUp " data-wow-delay="1s" aria-current="page" href="index.php">الصفحة الرئيسية
                                        </a>
                                    </li>
                                </ul>

                                <?php if (isset($_SESSION['admins'])) : ?>
                                    <form class="d-flex m-auto header-login" method="post" role="search">
                                        <button name="signout" href="/Horus/login.php" class="Btn margin-response m-auto animate__animated animate__lightSpeedInRight" data-wow-delay="1s">تسجيل الخروج</button>
                                    </form>
                                <?php else : ?>
                                    <form class="d-flex m-auto header-login" role="search">
                                        <a href="/Horus/login.php" class="Btn margin-response m-auto animate__animated animate__lightSpeedInRight" data-wow-delay="1s">تسجيل الدخول</a>
                                    </form>
                                <?php endif; ?>
                            </div>
                        </div>
                    </nav>
                </div>
            </header>
            <!-- end header -->

            <!-- start section booking -->
            <section class="booking">
                <div class="overlay-booking"></div>
                <div class="container py-5">
                    <div class="row justify-content-center">
                        <div class="col-lg-8 booking-content">
                            <div class="info text-center animate__animated animate__jackInTheBox" data-wow-delay="1s">
                                <h1>حجز حافلة</h1>
                            </div>
                        </div>
                        <div class="col-lg-8 col-md-12 p-4  info-form">
                            <form action="">
                                <div class="form-group">
                                    <div class="col-lg-6 col-md-6 form-group-content animate__animated animate__zoomInRight" data-wow-delay="1.5s">
                                        <input type="text" class="form-control" placeholder="أدخل اسمك">
                                    </div>
                                    <div class="col-lg-6 col-md-6 form-group-content animate__animated animate__zoomInLeft" data-wow-delay="1.5s">
                                        <input type="email" class="form-control" placeholder="أدخل بريدك الإلكتروني">
                                    </div>


                                    <div class="col-lg-12 col-md-12 form-group-content animate__animated animate__bounceIn" data-wow-delay="1.5s">
                                        <input type="number" class="form-control" placeholder="رقم الهاتف">
                                    </div>
                                    <div class="col-lg-6 col-md-6 form-group-content mt-3 animate__animated animate__slideInLeft" data-wow-delay="1.5s">
                                        <label for="" class="">موقع الاستلام</label>
                                        <select name="" id="" class="form-control form-select">
                                            <option value="">جامعة سوهاج</option>
                                            <option value="">طهطا</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-6 col-md-6 mt-3 form-group-content animate__animated animate__slideInRight" data-wow-delay="1.5s">
                                        <label for="">الوجهة</label>
                                        <select name="" id="" class="form-control form-select">
                                            <option value="">جامعة سوهاج</option>
                                            <option value="">طهطا</option>
                                        </select>
                                    </div>


                                    <div class="col-lg-6 col-md-6 mt-2 form-group-content animate__animated animate__bounceInUp" data-wow-delay="1s">
                                        <label for="">تاريخ الاستلام</label>
                                        <input type="date" class="form-control" placeholder="رقم الهاتف">
                                    </div>
                                    <div class="col-lg-6 col-md-6 mt-2 form-group-content animate__animated animate__bounceInDown" data-wow-delay="1s">
                                        <label for="">وقت الاستلام</label>
                                        <input type="time" class="form-control" placeholder="رقم الهاتف">
                                    </div>
                                    <div class="col-lg-12 col-md-12 mt-2 form-group-content animate__animated animate__zoomIn" data-wow-delay=".5s">
                                        <button class="booking-btn">حجز الآن</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
            <!-- انتهاء قسم الحجز -->

        </main>
    <?php endif; ?>
<?php else : ?>
    <!-- mode and translate -->
    <div class="slide-text">
        <div class="row">
            <div class="col-lg-2 ">
                <span class="moon ">
                    <a onclick="myFunction()"><i class="fa-solid fa-moon moon-dark" id="btnMode"></i></a>
                </span>
            </div>
            <div class="col-lg-2">
                <span class="trans">
                    <a onclick="State()"> <i class="fa-solid fa-globe"></i></a>
                </span>
            </div>
        </div>

    </div>
    <!-- End mode and translate -->

    <!-- start main english -->
    <main class="English state" id="En">
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
                                    <a class="nav-link  animate__animated animate__bounceInUp " data-wow-delay="1s" aria-current="page" href="index.php">Home</a>
                                </li>
                                <li class="nav-item nav-after">
                                    <a class="nav-link animate__animated animate__bounceInDown" data-wow-delay="1s" href="index.php#about">About us</a>
                                </li>
                                <li class="nav-item nav-after">
                                    <a class="nav-link animate__animated animate__bounceInUp " data-wow-delay="1s" href="index.php#team">Team</a>
                                </li>
                                <li class="nav-item nav-after">
                                    <a class="nav-link animate__animated animate__bounceInDown" data-wow-delay="1s" href="index.php#services">Services</a>
                                </li>
                                <li class="nav-item ">
                                    <a class="nav-link animate__animated animate__bounceInUp active" data-wow-delay="1s" href="booking.php">Booking</a>
                                </li>
                                <li class="nav-item nav-after">
                                    <a class="nav-link  animate__animated animate__bounceInDown" data-wow-delay="1s" href="contact.php">Contact</a>
                                </li>
                            </ul>
                            <?php if (isset($_SESSION['users'])) : ?>
                                <form class="d-flex m-auto header-login" method="post" role="search">
                                    <button name="signout" href="/Horus/login.php" class="Btn margin-response m-auto animate__animated animate__lightSpeedInRight" data-wow-delay="1s">Logout </button>
                                </form>
                            <?php else : ?>
                                <form class="d-flex m-auto header-login" role="search">
                                    <a href="/Horus/login.php" class="Btn margin-response m-auto animate__animated animate__lightSpeedInRight" data-wow-delay="1s">Login </a>
                                </form>
                            <?php endif; ?>
                        </div>
                    </div>
                </nav>
            </div>
        </header>
        <!-- end header -->

        <!-- start section booking -->
        <section class="booking">
            <div class="overlay-booking"></div>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8 booking-content">
                        <div class="info text-center animate__animated animate__jackInTheBox" data-wow-delay="1s">
                            <h1>Book A Bus</h1>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-12 p-4  info-form">
                        <form action="">
                            <div class="form-group">
                                <div class="col-lg-6 col-md-6 form-group-content animate__animated animate__zoomInRight" data-wow-delay="1.5s">
                                    <input type="text" class="form-control" placeholder="Enter Your name">
                                </div>
                                <div class="col-lg-6 col-md-6 form-group-content animate__animated animate__zoomInLeft" data-wow-delay="1.5s">
                                    <input type="email" class="form-control" placeholder="Enter Your Email">
                                </div>
                                <div class="col-lg-12 col-md-12 form-group-content animate__animated animate__bounceIn" data-wow-delay="1.5s">
                                    <input type="number" class="form-control" placeholder="Phone Number">
                                </div>
                                <div class="col-lg-6 col-md-6 form-group-content mt-3 animate__animated animate__slideInLeft" data-wow-delay="1.5s">
                                    <label for="" class="">Picup Location</label>
                                    <select name="" id="" class="form-control form-select">
                                        <option value="">sohag university</option>
                                        <option value="">tahta</option>
                                    </select>
                                </div>
                                <div class="col-lg-6 col-md-6 mt-3 form-group-content animate__animated animate__slideInRight" data-wow-delay="1.5s">
                                    <label for="">Destination</label>
                                    <select name="" id="" class="form-control form-select">
                                        <option value="">sohag university</option>
                                        <option value="">tahta</option>
                                    </select>
                                </div>

                                <div class="col-lg-6 col-md-6 mt-2 form-group-content animate__animated animate__bounceInUp" data-wow-delay="1s">
                                    <label for="">Picup Date</label>
                                    <input type="date" class="form-control" placeholder="Phone Number">
                                </div>
                                <div class="col-lg-6 col-md-6 mt-2 form-group-content animate__animated animate__bounceInDown" data-wow-delay="1s">
                                    <label for="">Picup Time</label>
                                    <input type="time" class="form-control" placeholder="Phone Number">
                                </div>
                                <div class="col-lg-12 col-md-12 mt-2 form-group-content animate__animated animate__zoomIn" data-wow-delay=".5s">
                                    <button class="booking-btn">Search <i class="fa-solid fa-magnifying-glass"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <!-- end section booking -->
    </main>
    <!-- end  main englsh -->



    <!-- start Arabic  -->
    <main class="Arabic" id="Ar">


        <!-- start Header -->
        <header>
            <div class="Navbar p-3">
                <nav class="navbar navbar-expand-lg ">
                    <div class="container-fluid">
                        <a class="navbar-brand hours animate__animated animate__bounceInLeft" data-wow-delay="1s" href="#">HORUS
                        </a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse " id="navbarNav">
                            <ul class="navbar-nav m-auto">
                                <li class="nav-item active_ar active_ar6">
                                    <a class="nav-link  animate__animated animate__bounceInDown" data-wow-delay="1s" href="contact.php">الاتصال بنا</a>
                                </li>
                                <li class="nav-item active_ar active_ar5 active">
                                    <a class="nav-link animate__animated animate__bounceInUp " data-wow-delay="1s" href="booking.php">الحجز</a>
                                </li>
                                <li class="nav-item active_ar active_ar4">
                                    <a class="nav-link animate__animated animate__bounceInDown" data-wow-delay="1s" href="index.php#services_Ar">الخدمات</a>
                                </li>
                                <li class="nav-item active_ar active_ar3">
                                    <a class="nav-link animate__animated animate__bounceInUp " data-wow-delay="1s" href="index.php#team_Ar">الفريق</a>
                                </li>
                                <li class="nav-item active_ar active_ar2 ">
                                    <a class="nav-link animate__animated animate__bounceInDown" data-wow-delay="1s" href="index.php#aboutus">من نحن</a>
                                </li>
                                <li class="nav-item active_ar active_ar6">
                                    <a class="nav-link  animate__animated animate__bounceInUp " data-wow-delay="1s" aria-current="page" href="index.php">الصفحة الرئيسية
                                    </a>
                                </li>
                            </ul>

                            <?php if (isset($_SESSION['admins'])) : ?>
                                <form class="d-flex m-auto header-login" method="post" role="search">
                                    <button name="signout" href="/Horus/login.php" class="Btn margin-response m-auto animate__animated animate__lightSpeedInRight" data-wow-delay="1s">تسجيل الخروج</button>
                                </form>
                            <?php else : ?>
                                <form class="d-flex m-auto header-login" role="search">
                                    <a href="/Horus/login.php" class="Btn margin-response m-auto animate__animated animate__lightSpeedInRight" data-wow-delay="1s">تسجيل الدخول</a>
                                </form>
                            <?php endif; ?>
                        </div>
                    </div>
                </nav>
            </div>
        </header>
        <!-- end header -->

        <!-- start section booking -->
        <section class="booking">
            <div class="overlay-booking"></div>
            <div class="container py-5">
                <div class="row justify-content-center">
                    <div class="col-lg-8 booking-content">
                        <div class="info text-center animate__animated animate__jackInTheBox" data-wow-delay="1s">
                            <h1>حجز حافلة</h1>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-12 p-4  info-form">
                        <form action="">
                            <div class="form-group">
                                <div class="col-lg-6 col-md-6 form-group-content animate__animated animate__zoomInRight" data-wow-delay="1.5s">
                                    <input type="text" class="form-control" placeholder="أدخل اسمك">
                                </div>
                                <div class="col-lg-6 col-md-6 form-group-content animate__animated animate__zoomInLeft" data-wow-delay="1.5s">
                                    <input type="email" class="form-control" placeholder="أدخل بريدك الإلكتروني">
                                </div>


                                <div class="col-lg-12 col-md-12 form-group-content animate__animated animate__bounceIn" data-wow-delay="1.5s">
                                    <input type="number" class="form-control" placeholder="رقم الهاتف">
                                </div>
                                <div class="col-lg-6 col-md-6 form-group-content mt-3 animate__animated animate__slideInLeft" data-wow-delay="1.5s">
                                    <label for="" class="">موقع الاستلام</label>
                                    <select name="" id="" class="form-control form-select">
                                        <option value="">جامعة سوهاج</option>
                                        <option value="">طهطا</option>
                                    </select>
                                </div>
                                <div class="col-lg-6 col-md-6 mt-3 form-group-content animate__animated animate__slideInRight" data-wow-delay="1.5s">
                                    <label for="">الوجهة</label>
                                    <select name="" id="" class="form-control form-select">
                                        <option value="">جامعة سوهاج</option>
                                        <option value="">طهطا</option>
                                    </select>
                                </div>


                                <div class="col-lg-6 col-md-6 mt-2 form-group-content animate__animated animate__bounceInUp" data-wow-delay="1s">
                                    <label for="">تاريخ الاستلام</label>
                                    <input type="date" class="form-control" placeholder="رقم الهاتف">
                                </div>
                                <div class="col-lg-6 col-md-6 mt-2 form-group-content animate__animated animate__bounceInDown" data-wow-delay="1s">
                                    <label for="">وقت الاستلام</label>
                                    <input type="time" class="form-control" placeholder="رقم الهاتف">
                                </div>
                                <div class="col-lg-12 col-md-12 mt-2 form-group-content animate__animated animate__zoomIn" data-wow-delay=".5s">
                                    <button class="booking-btn"><i class="fa-solid fa-magnifying-glass"></i> بحث </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <!-- انتهاء قسم الحجز -->

    </main>
    <a href="#"><button class="to-up" id="top"><i class="fa-solid fa-chevron-up"></i></button></a>
<?php endif; ?>

<?php
include 'shared/script.php';
?>