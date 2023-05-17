<?php
include 'app/config.php';
include 'app/functions.php';
include 'shared/head.php';

$select2 = "SELECT * FROM places";
$plac = mysqli_query($conn, $select2);





if (isset($_SESSION['users'])) {
    
    
    $select = "SELECT * FROM users where id =$id";
    $s =  mysqli_query($conn, $select);
    $row = mysqli_fetch_assoc($s);
    $numRows = mysqli_num_rows($s);
    $id = $_SESSION['users']['id'];
    
   
    
    
    // make variables empty
    $emailError = [];
    $emailError2 = [];
    
    if (isset($_POST['search'])) {
        auth(1, 2);
        
        $pic = $_POST['picupLocation'];
        $des = $_POST['destination'];
        $_SESSION['bus'] = [
            'pickup' => $pic,
            'destination' => $des
            
        ];
        path('search.php');
        // path('index.php');
    }

    if (isset($_SESSION['users'])) {
        if (isset($_POST['lang'])) {
            if ($row['langID'] == 1) {
                $update = "UPDATE users set `langID` = 2  where id = $id";
                mysqli_query($conn, $update);
                path('booking.php');
            } else {
                $update = "UPDATE users set `langID` = 1 where id = $id ";
                mysqli_query($conn, $update);
                path('booking.php');
            }
        }


        if (isset($_POST['mode'])) {
            if ($row['modeID'] == 1) {
                $update = "UPDATE users set `modeID` = 2  where id = $id";
                mysqli_query($conn, $update);
                path('booking.php');
            } else {
                $update = "UPDATE users set `modeID` = 1 where id = $id ";
                mysqli_query($conn, $update);
                path("booking.php");
            }
        }
    } else {
        path("login.php");
    }
} else if (isset($_POST['search'])) {
    auth(1, 2);
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
<!-- End mode and translate with login users -->


<?php if (isset($_SESSION['users'])) : ?>
    <?php if ($row['langID'] == 2) : ?>
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
                                <h1>Search For Bus</h1>
                            </div>
                        </div>
                        <div class="col-lg-8 col-md-12 p-4  info-form">
                            <form action="" method="post">
                                <div class="form-group">

                                    <div class="col-lg-6 col-md-6 form-group-content mt-3 animate__animated animate__slideInLeft" data-wow-delay="1.5s">
                                        <label for="" class="">Picup Location</label>
                                        <select name="picupLocation" id="" class="form-control form-select">
                                            <?php foreach ($plac as $data) : ?>
                                                <option value="<?= $data['places'] ?>"><?= $data['places'] ?></option>
                                            <?php endforeach; ?>

                                        </select>
                                    </div>
                                    <div class="col-lg-6 col-md-6 mt-3 form-group-content animate__animated animate__slideInRight" data-wow-delay="1.5s">
                                        <label for="">Destination</label>
                                        <select name="destination" id="" class="form-control form-select">
                                            <?php foreach ($plac as $data) : ?>
                                                <option value="<?= $data['places'] ?>"><?= $data['places'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>


                                    <div class="col-lg-12 col-md-12 mt-2 form-group-content animate__animated animate__zoomIn" data-wow-delay=".5s">
                                        <button class="booking-btn" name="search">Search <i class="fa-solid fa-magnifying-glass"></i></button>
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
                                    <li class="nav-item active_ar active_ar5 active ">
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

                                <?php if (isset($_SESSION['users'])) : ?>
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
                            <form action="" method="post">
                                <div class="form-group">

                                    <div class="col-lg-6 col-md-6 mt-3 form-group-content animate__animated animate__slideInRight" data-wow-delay="1.5s">
                                        <label for="">الى</label>
                                        <select name="destination" id="" class="form-control form-select">
                                            <?php foreach ($plac as $data) : ?>
                                                <option value="<?= $data['places'] ?>"><?= $data['places_ar'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>

                                    <div class="col-lg-6 col-md-6 form-group-content mt-3 animate__animated animate__slideInLeft" data-wow-delay="1.5s">
                                        <label for="" class="">من</label>
                                        <select name="picupLocation" id="" class="form-control form-select">
                                            <?php foreach ($plac as $data) : ?>
                                                <option value="<?= $data['places'] ?>"><?= $data['places_ar'] ?></option>
                                            <?php endforeach; ?>

                                        </select>
                                    </div>



                                    <div class="col-lg-12 col-md-12 mt-2 form-group-content animate__animated animate__zoomIn" data-wow-delay=".5s">
                                        <button class="booking-btn" name="search"> <i class="fa-solid fa-magnifying-glass"></i> بحث </button>
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
                            <h1>Search For Bus</h1>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-12 p-4  info-form">
                        <form action="" method="post">
                            <div class="form-group">

                                <div class="col-lg-6 col-md-6 form-group-content mt-3 animate__animated animate__slideInLeft" data-wow-delay="1.5s">
                                    <label for="" class="">Picup Location</label>
                                    <select name="picupLocation" id="" class="form-control form-select">
                                        <?php foreach ($plac as $data) : ?>
                                            <option value="<?= $data['picupLocation'] ?>"><?= $data['picupLocation'] ?></option>
                                        <?php endforeach; ?>

                                    </select>
                                </div>
                                <div class="col-lg-6 col-md-6 mt-3 form-group-content animate__animated animate__slideInRight" data-wow-delay="1.5s">
                                    <label for="">Destination</label>
                                    <select name="destination" id="" class="form-control form-select">
                                        <?php foreach ($plac as $data) : ?>
                                            <option value="<?= $data['destination'] ?>"><?= $data['destination'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>


                                <div class="col-lg-12 col-md-12 mt-2 form-group-content animate__animated animate__zoomIn" data-wow-delay=".5s">
                                    <button class="booking-btn" name="search">Search </button>
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
                                <li class="nav-item active_ar active_ar5 active ">
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

                            <?php if (isset($_SESSION['users'])) : ?>
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
                            <h1> بحث عن حافلة</h1>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-12 p-4  info-form">
                        <form action="" method="post">
                            <div class="form-group">


                                <div class="col-lg-6 col-md-6 mt-3 form-group-content animate__animated animate__slideInRight" data-wow-delay="1.5s">
                                    <label for="">الى</label>
                                    <select name="destination" id="" class="form-control form-select">
                                        <?php foreach ($plac as $data) : ?>
                                            <option value="<?= $data['places_ar'] ?>"><?= $data['places_ar'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <div class="col-lg-6 col-md-6 form-group-content mt-3 animate__animated animate__slideInLeft" data-wow-delay="1.5s">
                                    <label for="" class="">من</label>
                                    <select name="picupLocation" id="" class="form-control form-select">
                                        <?php foreach ($plac as $data) : ?>
                                            <option value="<?= $data['places_ar'] ?>"><?= $data['places_ar'] ?></option>
                                        <?php endforeach; ?>

                                    </select>
                                </div>



                                <div class="col-lg-12 col-md-12 mt-2 form-group-content animate__animated animate__zoomIn" data-wow-delay=".5s">
                                    <button class="booking-btn" name="search">بحث </button>
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