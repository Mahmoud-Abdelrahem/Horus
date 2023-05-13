<?php 
include 'app/config.php';
include 'app/functions.php';
session_start();

$select = "SELECT * FROM users";
$s =  mysqli_query($conn, $select);
$row = mysqli_fetch_assoc($s);
$numRows = mysqli_num_rows($s);
$id = $_SESSION['admins']['id'];

if(isset($_POST['lang'])){
    if($row['langID'] == 1){
        $update = "UPDATE users set `langID` = 2  where id = $id";
         mysqli_query($conn,$update);
    }else{
        $update = "UPDATE users set `langID` = 1 where id = $id ";
        mysqli_query($conn,$update);
    }
}

if(isset($_POST['signout'])){
    session_unset();
    session_destroy();
    path('login.php');
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="assets/images/logo.jpeg" type="image/x-icon">
    <title>Hours</title>
    <link href="https://fonts.googleapis.com/css2?family=Assistant:wght@400;600;700&family=IBM+Plex+Sans+Arabic:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Clicker+Script&family=Inter:wght@400;700;800&family=Jost:wght@100;300;400;500;600&family=Kumbh+Sans:wght@400;700&family=Nanum+Gothic:wght@400;700;800&family=Overpass:wght@400;700&family=Plus+Jakarta+Sans:wght@200;300;400;600&family=Poppins:wght@400;500;600&family=Rajdhani:wght@300;400;500;600;700&family=Space+Grotesk:wght@400;600;700&display=swap" rel="stylesheet">
    <!-- cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- css Files -->


    <link rel="stylesheet" href="assets/vendor/bootstrap/bootstrap.css">
    <link rel="stylesheet" href="assets/vendor/wow/animate.min.css">
    <link rel="stylesheet" href="assets/vendor/light box/lightbox.min.css">
    <link rel="stylesheet" href="assets/css/normalize.css">
    <link rel="stylesheet" href="assets/css/main.css">
</head>

<body class="dark">

    <!-- Start loading page -->
    <div class="loading-spiner">
        <span class="loader"></span>
    </div>
    <!-- End loading page -->

   
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
                    
                        <form action="" method="post" enctype="multipart/form-data">
                            <button name="lang"> <i class="fa-solid fa-globe"></i></button>
                        </form>
                   
                </span>
            </div>
        </div>

    </div>
    <!-- End mode and translate -->

    <!-- start main English -->
    <?php if($row['langID'] == 1 ) : ?>
    <main class="English " id="En">

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
                                    <a class="nav-link  animate__animated animate__bounceInUp active" data-wow-delay="1s" aria-current="page" href="#">Home</a>
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
                                <li class="nav-item nav-after">
                                    <a class="nav-link animate__animated animate__bounceInUp " data-wow-delay="1s" href="booking.html">Booking</a>
                                </li>
                                <li class="nav-item nav-after">
                                    <a class="nav-link  animate__animated animate__bounceInDown" data-wow-delay="1s" href="contact.html">Contact</a>
                                </li>
                            </ul>
                            <form class="d-flex m-auto header-login" role="search">
                                <a href="login.php" class="Btn margin-response m-auto animate__animated animate__lightSpeedInRight" data-wow-delay="1s">Login</a>
                            </form>
                        </div>
                    </div>
                </nav>
            </div>
        </header>
        <!-- end header -->


        <!-- start section home -->
        <section class="home p-70">
            <div class="overlay"></div>
            <div class="container home-container p-5">
                <div class="home-hours animate__animated animate__bounceIn " data-wow-delay=".5s">
                    <h1>H O R U S</h1>
                </div>

                <div class="row justify-content-center">
                    <div class="home-text mt-5 ">
                        <h2 class="animate__animated animate__zoomIn " data-wow-delay=".5s">HORUS</h2>
                        <p class="animate__animated animate__rotateInUpRight " data-wow-delay=".5s">For Safety Travel
                        </p>
                        <a href="#about"><button class="Btn animate__animated animate__rotateInUpRight " data-wow-delay="1s">Get
                                Started</button></a>
                    </div>

                </div>


            </div>
        </section>
        <!-- End section home -->

        <!-- start section about us -->
        <section class="aboutus " id="about">
            <div class="info  ">
                <div class="row text-center">


                    <div class="col-lg-6 col-sm-12 col-md-12  left_side " data-wow-delay="1s">
                        <div class="first_line animate__animated animate__bounceIn" data-wow-delay=".5s">
                            <h1>What is </h1>
                        </div>
                        <div class="sec_line animate__animated animate__fadeInLeftBig">
                            <h1> Horus?</h1>
                        </div>
                    </div>



                    <div class="col-lg-6  col-sm-12 col-md-12 right_side">
                        <div class="first_pargrah col-lg-10  Right col-sm-12 col-md-12 animate__animated animate__flash " data-wow-delay=".5s">
                            <p>system will help passengers to book tickets for means of transportation via the Internet.
                                Where the
                                system includes the departure times of the flight, the arrival of the flight, the number
                                of
                                available
                                seats and the destination of the flight

                            </p>
                        </div>
                        <div class="sec_pargrah col-lg-10  col-sm-12 col-md-12  Right animate__animated animate__flash " data-wow-delay=".5s">
                            <P>With the crowding of means of transportation, moving from one place to another has become
                                more difficult
                                for passengers, for many reasons, including that the passenger does not want to wait
                                long to
                                move to the
                                place he wants.
                                This project will make it easier for many passengers to move in a faster time and with
                                less
                                effort and not
                                to wait for long periods of time
                            </P>
                        </div>
                    </div>



                </div>
            </div>
        </section>
        <!-- end section about us -->

        <!-- Strat Services  -->
        <section class="recent-work p-70" id="services">
            <div class="recent-text">
                <h2 class="text-center main-after">SERVICES</h2>
            </div>
            <div class="container mt-5">

                <div class="row">
                    <div class="col-lg-4 col-md-6 mt-3">
                        <div class="cool-bag animate__animated animate__backInUp">
                            <div class="cool-bag-parent-overlay">
                                <div class="cool-bag-overlay">
                                    <div class="overlay-btn">
                                        <span>
                                            <a href="booking.html"><i class="fa-solid fa-credit-card"></i></a>
                                        </span>
                                        <span>
                                            <a href="./assets/images/22.jpg" data-lightbox="bus">
                                                <i class="fa-solid fa-plus"></i>
                                            </a>
                                        </span>

                                    </div>
                                </div>
                                <img class="scale" src="assets/images/22.jpg" alt="not found">
                            </div>
                            <div class="body ">
                                <p class="text=center mt-2"> We offer you the best drivers until you arrive safely </p>
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 mt-3">
                        <div class="cool-bag animate__animated animate__backInDown" data-wow-delay=".5s">
                            <div class="cool-bag-parent-overlay">
                                <div class="cool-bag-overlay">
                                    <div class="overlay-btn">
                                        <span>
                                            <a href="booking.html"><i class="fa-solid fa-credit-card"></i></a>
                                        </span>
                                        <span>
                                            <a href="./assets/images/girl.jpg" data-lightbox="bus">
                                                <i class="fa-solid fa-plus"></i>
                                            </a>
                                        </span>

                                    </div>
                                </div>
                                <img class="scale" src="assets/images/girl.jpg" alt="not found">
                            </div>
                            <div class="body">
                                <p class="text=center mt-2"> Comfortable seats so you can sleep well during the trip
                                </p>
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 mt-3">
                        <div class="cool-bag animate__animated animate__backInUp" data-wow-delay=".5s">
                            <div class="cool-bag-parent-overlay">
                                <div class="cool-bag-overlay">
                                    <div class="overlay-btn">
                                        <span>
                                            <a href="booking.html"><i class="fa-solid fa-credit-card"></i></a>
                                        </span>
                                        <span>
                                            <a href="./assets/images/booking.jpg" data-lightbox="bus">
                                                <i class="fa-solid fa-plus"></i>
                                            </a>
                                        </span>
                                    </div>
                                </div>
                                <div class="img_box">
                                    <img class="scale" src="assets/images/booking.jpg" alt="not found">

                                </div>
                            </div>
                            <div class="body">
                                <p class="text=center mt-2"> We have the best types of buses, and they have free Wi-Fi
                                </p>
                            </div>

                        </div>
                    </div>
                </div>

            </div>

        </section>
        <!-- end Services -->


        <!-- start section team -->
        <section class="team p-70" id="team">
            <h2 class="text-center" data-wow-delay=".5s">TEAM</h2>
            <div class="load">
                <div class="one"></div>
                <div class="two"></div>
                <div class="three"></div>
            </div>



            <div class="container">

                <div class="row">
                    <div class="col-lg-4 col-md-6  animate__animated animate__lightSpeedInLeft" data-wow-delay=".5s">
                        <div class="card_one card">


                            <div class="content">
                                <div class="img_box">
                                    <a href="./assets/images/Abod.jpg" data-lightbox="image">
                                        <img src="assets/images/Abod.jpg" alt="Abdalrahman nasser gad">
                                    </a>
                                </div>



                                <div class="info_box">
                                    <h2>Abdalrahman nasser gad</h2>
                                    <h3>Front End Devolper</h3>
                                </div>



                                <div class="social-links mt-3">
                                    <a href="#" class="twitter"><i class="fa-brands fa-twitter"></i></a>
                                    <a href="#" class="facebook"><i class="fa-brands fa-facebook"></i></a>
                                    <a href="#" class="linkedin"><i class="fa-brands fa-linkedin"></i></a>
                                </div>

                            </div>
                        </div>
                    </div>


                    <div class="col-lg-4 col-md-6 animate__animated animate__lightSpeedInRight " data-wow-delay=".5s">
                        <div class="card_two  card">


                            <div class="content">


                                <div class="img_box">
                                    <a href="./assets/images/Mahmoud.jpg" data-lightbox="image">
                                        <img src="assets/images/Mahmoud.jpg" alt="Mahmoud Abdelrahem Fawzy">
                                    </a>
                                </div>



                                <div class="info_box ">
                                    <h2>Mahmoud Abdelrahem Fawzy</h2>
                                    <h3>Back End Devolper</h3>
                                </div>



                                <div class="social-links mt-3">
                                    <a href="#" class="twitter"><i class="fa-brands fa-twitter"></i></a>
                                    <a href="#" class="facebook"><i class="fa-brands fa-facebook"></i></a>
                                    <a href="#" class="linkedin"><i class="fa-brands fa-linkedin"></i></a>
                                </div>

                            </div>
                        </div>

                    </div>



                    <div class="col-lg-4 col-md-6  animate__animated animate__bounceInLeft" data-wow-delay=".5s">
                        <div class="card_three card">


                            <div class="content">
                                <div class="img_box">
                                    <a href="assets/images/Hasnaa.jpg" data-lightbox="image">
                                        <img src="assets/images/Hasnaa.jpg" alt="Hasnaa Mohammed Hefny">
                                    </a>
                                </div>


                                <div class="info_box">
                                    <h2>Hasnaa Mohammed Hofny</h2>
                                    <h3>Front End Devolper</h3>
                                </div>



                                <div class="social-links mt-3">
                                    <a href="#" class="twitter"><i class="fa-brands fa-twitter"></i></a>
                                    <a href="#" class="facebook"><i class="fa-brands fa-facebook"></i></a>
                                    <a href="#" class="linkedin"><i class="fa-brands fa-linkedin"></i></a>
                                </div>
                            </div>

                        </div>
                    </div>




                    <div class="col-lg-4 col-md-6 offset-2 mt-4 animate__animated animate__bounceInRight " data-wow-delay=".5s">
                        <div class="card_four  card">


                            <div class="content">
                                <div class="img_box">
                                    <a href="assets/images/Mariam.jpg" data-lightbox="image">
                                        <img src="assets/images/Mariam.jpg" alt="Mariam Nabil Shokry">
                                    </a>
                                </div>



                                <div class="info_box">
                                    <h2>Mariam Nabil Shokry</h2>
                                    <h3>Front End Devolper</h3>
                                </div>



                                <div class="social-links mt-3">
                                    <a href="#" class="twitter"><i class="fa-brands fa-twitter"></i></a>
                                    <a href="#" class="facebook"><i class="fa-brands fa-facebook"></i></a>
                                    <a href="#" class="linkedin"><i class="fa-brands fa-linkedin"></i></a>
                                </div>
                            </div>

                        </div>
                    </div>




                    <div class="col-lg-4  col-md-6 response-center mt-4 animate__animated animate__bounceInLeft " data-wow-delay=".5s">
                        <div class="card_five  card">


                            <div class="content">
                                <div class="img_box">
                                    <a href="assets/images/Mostafa.jpg" data-lightbox="image">
                                        <img src="assets/images/Mostafa.jpg" alt="Mostafa Mahmoud Badawy">
                                    </a>
                                </div>


                                <div class="info_box">
                                    <h2>Mostafa Mahmoud Badawy</h2>
                                    <h3>Back End Devolper</h3>
                                </div>



                                <div class="social-links mt-3">
                                    <a href="#" class="twitter"><i class="fa-brands fa-twitter"></i></a>
                                    <a href="#" class="facebook"><i class="fa-brands fa-facebook"></i></a>
                                    <a href="#" class="linkedin"><i class="fa-brands fa-linkedin"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </section>
        <!-- End section team -->

        <!-- start footer -->
        <footer id="footer">
            <div class="footer-top">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-3 col-md-6">
                            <div class="footer-info">
                                <h3>Hours<span>.</span></h3>
                                <p>
                                    A108 Adam Street <br>
                                    NY 535022, USA<br><br>
                                    <strong>Phone:</strong> +1 5589 55488 55<br>
                                    <strong>Email:</strong> info@example.com<br>
                                </p>
                                <div class="social-links mt-3">
                                    <a href="#" class="twitter"><i class="fa-brands fa-twitter"></i></a>
                                    <a href="#" class="facebook"><i class="fa-brands fa-facebook"></i></a>
                                    <a href="#" class="linkedin"><i class="fa-brands fa-linkedin"></i></a>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-2 col-md-6 footer-links">
                            <h4>Useful Links</h4>
                            <ul>
                                <li><i class="fa-solid fa-chevron-right"></i><a href="#">Home</a></li>
                                <li><i class="fa-solid fa-chevron-right"></i><a href="contact.html">Contact us</a></li>
                                <li><i class="fa-solid fa-chevron-right"></i><a href="#services">Services</a></li>
                                <li><i class="fa-solid fa-chevron-right"></i><a href="#about">About Horus</a></li>
                                <li><i class="fa-solid fa-chevron-right"></i><a href="#">Privacy policy</a></li>
                            </ul>
                        </div>

                        <div class="col-lg-3 col-md-6 footer-links">
                            <h4>Our Services</h4>
                            <ul>
                                <li><i class="fa-solid fa-chevron-right"></i><a href="booking.html">Booking</a></li>
                                <li><i class="fa-solid fa-chevron-right"></i><a href="#">Safety Transport</a></li>
                            </ul>
                        </div>

                        <div class="col-lg-4 col-md-6 footer-newsletter">
                            <h4>Our Newsletter</h4>
                            <p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna</p>
                            <form action="" method="post">
                                <input type="email" name="email"><input type="submit" value="Subscribe">
                            </form>

                        </div>

                    </div>
                </div>
            </div>

            <div class="container">
                <div class="copyright">
                    &copy; Copyright <strong><span>HOURS</span></strong>. All Rights Reserved
                </div>
                <div class="credits">
                    Designed by <a href="https://bootstrapmade.com/">Tag | Team</a>
                </div>
            </div>
        </footer>
        <!-- end footer -->
    </main>
    <?php else : ?>
    <!-- End main English -->

    <!-- start main Arabic -->
    <main class="Arabic" id="Ar">
        <!-- Start Header -->
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
                                    <a class="nav-link  animate__animated animate__bounceInDown" data-wow-delay="1s" href="contact.html">الاتصال بنا</a>
                                </li>
                                <li class="nav-item active_ar active_ar5 ">
                                    <a class="nav-link animate__animated animate__bounceInUp " data-wow-delay="1s" href="booking.html">الحجز</a>
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
                                    <a class="nav-link  animate__animated animate__bounceInUp " data-wow-delay="1s" aria-current="page" href="#">الصفحة الرئيسية
                                    </a>
                                </li>
                            </ul>

                            <?php if(isset($_SESSION['admins'])): ?>
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
        <!-- End Header -->

        <!-- start home -->
        <section class="home p-70">
            <div class="overlay"></div>
            <div class="container home-container p-5">
                <div class="home-hours animate__animated animate__bounceIn " data-wow-delay=".5s">
                    <h1>حورس</h1>
                </div>

                <div class="row justify-content-center">
                    <div class="home-text mt-5 ">
                        <h2 class="animate__animated animate__zoomIn " data-wow-delay=".5s">حورس</h2>
                        <p class="animate__animated animate__rotateInUpRight " data-wow-delay=".5s">للسفر الآمن</p>
                        <a href="#aboutus">
                            <button class="Btn animate__animated animate__rotateInUpRight " data-wow-delay="1s">
                                ابدأ
                            </button>
                        </a>
                    </div>
                </div>
            </div>
        </section>
        <!-- End home -->

        <!-- strat about us  -->
        <section class="aboutus " id="aboutus">
            <div class="info  ">
                <div class="row text-center">


                    <div class="col-lg-6 col-sm-12 col-md-12  left_side " data-wow-delay="1s">
                        <div class="first_line animate__animated animate__bounceIn" data-wow-delay=".5s">
                            <h1>ما هو </h1>
                        </div>
                        <div class="sec_line animate__animated animate__fadeInLeftBig">
                            <h1> حورس ؟</h1>
                        </div>
                    </div>



                    <div class="col-lg-6  col-sm-12 col-md-12 right_side">
                        <div class="first_pargrah col-lg-10  Right col-sm-12 col-md-12 animate__animated animate__flash " data-wow-delay=".5s">
                            <p>سيساعد النظام المسافرين على حجز تذاكر وسائل النقل عبر الإنترنت. حيث يشمل النظام مواعيد
                                المغادرة
                                والوصول للرحلات، عدد المقاعد المتاحة ووجهة الرحلة.
                            </p>
                        </div>
                        <div class="sec_pargrah col-lg-10  col-sm-12 col-md-12  Right animate__animated animate__flash " data-wow-delay=".5s">
                            <P>مع ازدحام وسائل النقل، أصبح الانتقال من مكان إلى آخر أصعب على المسافرين لأسباب عدة، بما
                                في ذلك عدم
                                رغبة المسافر في الانتظار طويلاً للانتقال إلى المكان الذي يريده. سيجعل هذا المشروع الأمر
                                أسهل للعديد من
                                المسافرين في الانتقال في وقت أسرع وبجهد أقل وعدم انتظار فترات طويلة.
                            </P>
                        </div>
                    </div>




                </div>
            </div>
        </section>
        <!-- End About us -->

        <!-- start section recent work (Services) -->
        <section class="recent-work p-70" id="services_Ar">
            <div class="recent-text">
                <h2 class="text-center main-after">خدماتنا</h2>
            </div>
            <div class="container mt-5">

                <div class="row">
                    <div class="col-lg-4 col-md-6 mt-3">
                        <div class="cool-bag animate__animated animate__backInUp">
                            <div class="cool-bag-parent-overlay">
                                <div class="cool-bag-overlay">
                                    <div class="overlay-btn">
                                        <span>
                                            <a href="booking.html"><i class="fa-solid fa-credit-card"></i></a>
                                        </span>
                                        <span>
                                            <a href="./assets/images/22.jpg" data-lightbox="bus">
                                                <i class="fa-solid fa-plus"></i>
                                            </a>
                                        </span>

                                    </div>
                                </div>
                                <img class="scale" src="assets/images/22.jpg" alt="not found">
                            </div>
                            <div class="body ">
                                <p class="text=center mt-2"> نقدم لك أفضل السائقين حتى تصل بأمان </p>
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 mt-3">
                        <div class="cool-bag animate__animated animate__backInDown" data-wow-delay=".5s">
                            <div class="cool-bag-parent-overlay">
                                <div class="cool-bag-overlay">
                                    <div class="overlay-btn">
                                        <span>
                                            <a href="booking.html"><i class="fa-solid fa-credit-card"></i></a>
                                        </span>
                                        <span>
                                            <a href="./assets/images/girl.jpg" data-lightbox="bus">
                                                <i class="fa-solid fa-plus"></i>
                                            </a>
                                        </span>

                                    </div>
                                </div>
                                <img class="scale" src="assets/images/girl.jpg" alt="not found">
                            </div>
                            <div class="body">
                                <p class="text=center mt-2"> مقاعد مريحة حتى تتمكن من النوم بشكل جيد خلال الرحلة</p>
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 mt-3">
                        <div class="cool-bag animate__animated animate__backInUp" data-wow-delay=".5s">
                            <div class="cool-bag-parent-overlay">
                                <div class="cool-bag-overlay">
                                    <div class="overlay-btn">
                                        <span>
                                            <a href="booking.html"><i class="fa-solid fa-credit-card"></i></a>
                                        </span>
                                        <span>
                                            <a href="./assets/images/booking.jpg" data-lightbox="bus">
                                                <i class="fa-solid fa-plus"></i>
                                            </a>
                                        </span>
                                    </div>
                                </div>
                                <div class="img_box">
                                    <img class="scale" src="assets/images/booking.jpg" alt="not found">

                                </div>
                            </div>
                            <div class="body">
                                <p class="text=center mt-2"> لدينا أفضل أنواع الحافلات، وتتوفر فيها خدمة الواي فاي
                                    المجانية
                                </p>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </section>
        <!-- End Section recent work (services) -->

        <!-- start Team -->
        <section class="team p-70" id="team_Ar">
            <h2 class="text-center" data-wow-delay=".5s">الفريق</h2>
            <div class="load">
                <div class="one"></div>
                <div class="two"></div>
                <div class="three"></div>
            </div>

            <div class="container">

                <div class="row">
                    <div class="col-lg-4 col-md-6  animate__animated animate__lightSpeedInLeft" data-wow-delay=".5s">
                        <div class="card_one card">


                            <div class="content">
                                <div class="img_box">
                                    <a href="./assets/images/Abod.jpg" data-lightbox="image">
                                        <img src="assets/images/Abod.jpg" alt="عبد الرحمن ناصر جاد">
                                    </a>
                                </div>



                                <div class="info_box">
                                    <h2>عبد الرحمن ناصر جاد</h2>
                                    <h3>مطور واجهة المستخدم</h3>
                                </div>



                                <div class="social-links mt-3">
                                    <a href="#" class="twitter"><i class="fa-brands fa-twitter"></i></a>
                                    <a href="#" class="facebook"><i class="fa-brands fa-facebook"></i></a>
                                    <a href="#" class="linkedin"><i class="fa-brands fa-linkedin"></i></a>
                                </div>

                            </div>
                        </div>
                    </div>


                    <div class="col-lg-4 col-md-6 animate__animated animate__lightSpeedInRight " data-wow-delay=".5s">
                        <div class="card_two  card">


                            <div class="content">


                                <div class="img_box">
                                    <a href="./assets/images/Mahmoud.jpg" data-lightbox="image">
                                        <img src="assets/images/Mahmoud.jpg" alt="محمود عبد الرحيم فوزي">
                                    </a>
                                </div>



                                <div class="info_box ">
                                    <h2>محمود عبد الرحيم فوزي</h2>
                                    <h3>مطور خلفية المستخدم</h3>
                                </div>



                                <div class="social-links mt-3">
                                    <a href="#" class="twitter"><i class="fa-brands fa-twitter"></i></a>
                                    <a href="#" class="facebook"><i class="fa-brands fa-facebook"></i></a>
                                    <a href="#" class="linkedin"><i class="fa-brands fa-linkedin"></i></a>
                                </div>

                            </div>
                        </div>

                    </div>



                    <div class="col-lg-4 col-md-6  animate__animated animate__bounceInLeft" data-wow-delay=".5s">
                        <div class="card_three card">


                            <div class="content">
                                <div class="img_box">
                                    <a href="assets/images/Hasnaa.jpg" data-lightbox="image">
                                        <img src="assets/images/Hasnaa.jpg" alt="حسناء محمد حفني">
                                    </a>
                                </div>


                                <div class="info_box">
                                    <h2>حسناء محمد حفني</h2>
                                    <h3>مطور واجهة المستخدم</h3>
                                </div>


                                <div class="social-links mt-3">
                                    <a href="#" class="twitter"><i class="fa-brands fa-twitter"></i></a>
                                    <a href="#" class="facebook"><i class="fa-brands fa-facebook"></i></a>
                                    <a href="#" class="linkedin"><i class="fa-brands fa-linkedin"></i></a>
                                </div>
                            </div>

                        </div>
                    </div>




                    <div class="col-lg-4 col-md-6 offset-2 mt-4 animate__animated animate__bounceInRight " data-wow-delay=".5s">
                        <div class="card_four  card">


                            <div class="content">
                                <div class="img_box">
                                    <a href="assets/images/Mariam.jpg" data-lightbox="image">
                                        <img src="assets/images/Mariam.jpg" alt="مريم نبيل شكري">
                                    </a>
                                </div>



                                <div class="info_box">
                                    <h2>مريم نبيل شكري</h2>
                                    <h3>مطور واجهة المستخدم</h3>
                                </div>



                                <div class="social-links mt-3">
                                    <a href="#" class="twitter"><i class="fa-brands fa-twitter"></i></a>
                                    <a href="#" class="facebook"><i class="fa-brands fa-facebook"></i></a>
                                    <a href="#" class="linkedin"><i class="fa-brands fa-linkedin"></i></a>
                                </div>
                            </div>

                        </div>
                    </div>




                    <div class="col-lg-4  col-md-6 response-center mt-4 animate__animated animate__bounceInLeft " data-wow-delay=".5s">
                        <div class="card_five  card">


                            <div class="content">
                                <div class="img_box">
                                    <a href="assets/images/Mostafa.jpg" data-lightbox="image">
                                        <img src="assets/images/Mostafa.jpg" alt="مصطفى محمود بدوي">
                                    </a>
                                </div>


                                <div class="info_box">
                                    <h2>مصطفى محمود بدوي</h2>
                                    <h3>مطور خلفية المستخدم</h3>
                                </div>



                                <div class="social-links mt-3">
                                    <a href="#" class="twitter"><i class="fa-brands fa-twitter"></i></a>
                                    <a href="#" class="facebook"><i class="fa-brands fa-facebook"></i></a>
                                    <a href="#" class="linkedin"><i class="fa-brands fa-linkedin"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </section>
        <!-- End Team -->


        <!-- strat Footer -->
        <footer id="footer">
            <div class="footer-top">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-4 col-md-6">
                            <div class="footer-info">
                                <h3>حورس</h3>
                                <p>
                                    شارع آدم A108<br>
                                    نيويورك 535022، الولايات المتحدة الأمريكية<br><br>
                                    <strong>الهاتف:</strong> +1 5589 55488 55<br>
                                    البريد الالكتروني :<strong> info@example.com </strong>
                                </p>
                                <div class="social-links mt-3">
                                    <a href="#" class="twitter"><i class="fa-brands fa-twitter"></i></a>
                                    <a href="#" class="facebook"><i class="fa-brands fa-facebook"></i></a>
                                    <a href="#" class="linkedin"><i class="fa-brands fa-linkedin"></i></a>
                                </div>
                            </div>
                        </div>


                        <div class="col-lg-3 col-md-6 footer-links">
                            <h4>روابط مفيدة</h4>
                            <ul>
                                <li><i class="fa-solid fa-chevron-left"></i><a href="#">الرئيسية</a></li>
                                <li><i class="fa-solid fa-chevron-left"></i><a href="contact.html">اتصل بنا</a></li>
                                <li><i class="fa-solid fa-chevron-left"></i><a href="#services">الخدمات</a></li>
                                <li><i class="fa-solid fa-chevron-left"></i><a href="#about">حول حورس </a></li>
                                <li><i class="fa-solid fa-chevron-left"></i><a href="#">سياسة الخصوصية</a></li>
                            </ul>
                        </div>


                        <div class="col-lg-2 col-md-6 footer-links">
                            <h4>خدماتنا</h4>
                            <ul>
                                <li><i class="fa-solid fa-chevron-left"></i><a href="booking.html">الحجز</a></li>
                                <li><i class="fa-solid fa-chevron-left"></i><a href="#">نقل آمن</a></li>
                            </ul>
                        </div>


                        <div class="col-lg-3 col-md-6 footer-newsletter">

                            <h4>نشرتنا الإخبارية</h4>
                            <p>تامين من الذي لا يقرأ نصوصًا عديدة، وبعضهم مذنبون في عدم قراءة نصوصنا. سجّل بريدك
                                الإلكتروني لتصلك أحدث الأخبار
                            </p>
                            <form action="" method="post">
                                <input type="submit" value="اشتراك">
                                <input type="email" name="email">
                            </form>


                        </div>












                    </div>
                </div>
            </div>

            <div class="container">
                <div class="copyright">
                    &copy; حقوق النشر <strong><span>حورس</span></strong> . جميع الحقوق محفوظة</div>
                <div class="credits">
                    تصميم <a href="https://abdulrahman-nasser.github.io/Portfolio/" target="_blank">Tag | Team</a>

                </div>
            </div>
        </footer>
        <!-- End Footer -->


    </main>

    <?php endif; ?>
    <!-- End main Arabic -->

    <a href=" #"><button class="to-up" id="top"><i class="fa-solid fa-chevron-up"></i></button></a>

    <!-- js files -->
    <script src="assets/vendor/jQuery/jquery-3.6.1.min.js"></script>
    <script src="assets/vendor/bootstrap/bootstrap.js"></script>
    <script src="assets/vendor/wow/wow.min.js"></script>
    <script src="assets/vendor/light box/lightbox.min.js"></script>
    <script src="assets/js/main.js"></script>
</body>

</html>