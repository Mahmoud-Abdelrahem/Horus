<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hours</title>
    <link
        href="https://fonts.googleapis.com/css2?family=Clicker+Script&family=Inter:wght@400;700;800&family=Jost:wght@100;300;400;500;600&family=Kumbh+Sans:wght@400;700&family=Nanum+Gothic:wght@400;700;800&family=Overpass:wght@400;700&family=Plus+Jakarta+Sans:wght@200;300;400;600&family=Poppins:wght@400;500;600&family=Rajdhani:wght@300;400;500;600;700&family=Space+Grotesk:wght@400;600;700&display=swap"
        rel="stylesheet">
    <!-- cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- css Files -->


    <link rel="stylesheet" href="assets/vendor/bootstrap/bootstrap.css">
    <link rel="stylesheet" href="assets/vendor/owl carousel/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/vendor/owl carousel/owl.theme.default.min.css">
    <link rel="stylesheet" href="assets/vendor/wow/animate.min.css">
    <link rel="stylesheet" href="assets/vendor/light box/lightbox.min.css">
    <link rel="stylesheet" href="assets/css/normalize.css">
    <link rel="stylesheet" href="assets/css/main.css">

</head>

<body>

    <!-- Start loading page -->
    <div class="loading-spiner">
        <span class="loader"></span>
    </div>
    <!-- End loading page -->

    <!-- mode and translate -->
    <div class="slide-text">
        <div class="row">
            <div class="col-lg-2 ">
                <span class="moon">
                    <a href=""><i class="fa-solid fa-moon"></i></a>
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

    <!-- start header -->
    <main class="English state" id="En">
        <header>
            <div class="Navbar p-3">
                <nav class="navbar navbar-expand-lg ">
                    <div class="container-fluid">
                        <a class="navbar-brand hours animate__animated animate__bounceInLeft" href="#">HORUS</a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                            aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse " id="navbarNav">
                            <ul class="navbar-nav m-auto">
                                <li class="nav-item nav-after">
                                    <a class="nav-link   animate__animated animate__bounceInDown" aria-current="page"
                                        href="index.html">Home</a>
                                </li>
                                <li class="nav-item nav-after">
                                    <a class="nav-link animate__animated animate__bounceInUp"
                                        href="index.html#about">About
                                        us</a>
                                </li>
                                <li class="nav-item nav-after">
                                    <a class="nav-link animate__animated animate__bounceInDown"
                                        href="index.html#team">Team</a>
                                </li>
                                <li class="nav-item nav-after">
                                    <a class="nav-link animate__animated animate__bounceInUp"
                                        href="index.html#services">Services</a>
                                </li>
                                <li class="nav-item nav-after active">
                                    <a class="nav-link animate__animated animate__bounceInDown"
                                        href="booking.html">Booking</a>
                                </li>
                                <li class="nav-item nav-after">
                                    <a class="nav-link animate__animated animate__bounceInUp"
                                        href="contact.html">Contact</a>
                                </li>
                            </ul>
                            <form class="d-flex m-auto" role="search">
                                <a href="login.html"
                                    class="Btn margin-response m-auto animate__animated animate__lightSpeedInRight">Login</a>
                            </form>
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
                            <h1>Book A Bus</h1>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-12 p-4  info-form">
                        <form action="">
                            <div class="form-group">
                                <div class="col-lg-6 col-md-6 form-group-content animate__animated animate__zoomInRight"
                                    data-wow-delay="1.5s">
                                    <input type="text" class="form-control" placeholder="Enter Your name">
                                </div>
                                <div class="col-lg-6 col-md-6 form-group-content animate__animated animate__zoomInLeft"
                                    data-wow-delay="1.5s">
                                    <input type="email" class="form-control" placeholder="Enter Your Email">
                                </div>
                                <div class="col-lg-12 col-md-12 form-group-content animate__animated animate__bounceIn"
                                    data-wow-delay="1.5s">
                                    <input type="number" class="form-control" placeholder="Phone Number">
                                </div>
                                <div class="col-lg-6 col-md-6 form-group-content mt-3 animate__animated animate__slideInLeft"
                                    data-wow-delay="1.5s">
                                    <label for="" class="">Picup Location</label>
                                    <select name="" id="" class="form-control form-select">
                                        <option value="">sohag university</option>
                                        <option value="">tahta</option>
                                    </select>
                                </div>
                                <div class="col-lg-6 col-md-6 mt-3 form-group-content animate__animated animate__slideInRight"
                                    data-wow-delay="1.5s">
                                    <label for="">Destination</label>
                                    <select name="" id="" class="form-control form-select">
                                        <option value="">sohag university</option>
                                        <option value="">tahta</option>
                                    </select>
                                </div>

                                <div class="col-lg-6 col-md-6 mt-2 form-group-content animate__animated animate__bounceInUp"
                                    data-wow-delay="1s">
                                    <label for="">Picup Date</label>
                                    <input type="date" class="form-control" placeholder="Phone Number">
                                </div>
                                <div class="col-lg-6 col-md-6 mt-2 form-group-content animate__animated animate__bounceInDown"
                                    data-wow-delay="1s">
                                    <label for="">Picup Time</label>
                                    <input type="time" class="form-control" placeholder="Phone Number">
                                </div>
                                <div class="col-lg-12 col-md-12 mt-2 form-group-content animate__animated animate__zoomIn"
                                    data-wow-delay=".5s">
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
   


    <!-- start Arabic  -->
    <main class="Arabic" id="Ar">


        <header>
            <div class="Navbar p-3">
                <nav class="navbar navbar-expand-lg ">
                    <div class="container-fluid">
                        <a class="navbar-brand hours animate__animated animate__bounceInLeft" href="#">حورس</a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                            aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse " id="navbarNav">
                            <ul class="navbar-nav m-auto">
                                <li class="nav-item nav-after">
                                    <a class="nav-link   animate__animated animate__bounceInDown" aria-current="page"
                                        href="index.html">الرئيسية</a>
                                </li>
                                <li class="nav-item nav-after">
                                    <a class="nav-link animate__animated animate__bounceInUp" href="index.html#about">من
                                        نحن</a>
                                </li>
                                <li class="nav-item nav-after">
                                    <a class="nav-link animate__animated animate__bounceInDown"
                                        href="index.html#team">الفريق</a>
                                </li>
                                <li class="nav-item nav-after">
                                    <a class="nav-link animate__animated animate__bounceInUp"
                                        href="index.html#services">الخدمات</a>
                                </li>
                                <li class="nav-item nav-after active">
                                    <a class="nav-link animate__animated animate__bounceInDown"
                                        href="booking.html">الحجز</a>
                                </li>
                                <li class="nav-item nav-after">
                                    <a class="nav-link animate__animated animate__bounceInUp" href="contact.html">اتصل
                                        بنا</a>
                                </li>
                            </ul>
                            <form class="d-flex m-auto" role="search">
                                <a href="login.html"
                                    class="Btn margin-response m-auto animate__animated animate__lightSpeedInRight">تسجيل
                                    الدخول</a>
                            </form>
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
                                <div class="col-lg-6 col-md-6 form-group-content animate__animated animate__zoomInRight"
                                    data-wow-delay="1.5s">
                                    <input type="text" class="form-control" placeholder="أدخل اسمك">
                                </div>
                                <div class="col-lg-6 col-md-6 form-group-content animate__animated animate__zoomInLeft"
                                    data-wow-delay="1.5s">
                                    <input type="email" class="form-control" placeholder="أدخل بريدك الإلكتروني">
                                </div>


                                <div class="col-lg-12 col-md-12 form-group-content animate__animated animate__bounceIn"
                                    data-wow-delay="1.5s">
                                    <input type="number" class="form-control" placeholder="رقم الهاتف">
                                </div>
                                <div class="col-lg-6 col-md-6 form-group-content mt-3 animate__animated animate__slideInLeft"
                                    data-wow-delay="1.5s">
                                    <label for="" class="">موقع الاستلام</label>
                                    <select name="" id="" class="form-control form-select">
                                        <option value="">جامعة سوهاج</option>
                                        <option value="">طهطا</option>
                                    </select>
                                </div>
                                <div class="col-lg-6 col-md-6 mt-3 form-group-content animate__animated animate__slideInRight"
                                    data-wow-delay="1.5s">
                                    <label for="">الوجهة</label>
                                    <select name="" id="" class="form-control form-select">
                                        <option value="">جامعة سوهاج</option>
                                        <option value="">طهطا</option>
                                    </select>
                                </div>


                                <div class="col-lg-6 col-md-6 mt-2 form-group-content animate__animated animate__bounceInUp"
                                    data-wow-delay="1s">
                                    <label for="">تاريخ الاستلام</label>
                                    <input type="date" class="form-control" placeholder="رقم الهاتف">
                                </div>
                                <div class="col-lg-6 col-md-6 mt-2 form-group-content animate__animated animate__bounceInDown"
                                    data-wow-delay="1s">
                                    <label for="">وقت الاستلام</label>
                                    <input type="time" class="form-control" placeholder="رقم الهاتف">
                                </div>
                                <div class="col-lg-12 col-md-12 mt-2 form-group-content animate__animated animate__zoomIn"
                                    data-wow-delay=".5s">
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
    <a href="#"><button class="to-up" id="top"><i class="fa-solid fa-chevron-up"></i></button></a>

    <!-- end Arabic -->
    <!-- js files -->
    <script src="assets/vendor/jQuery/jquery-3.6.1.min.js"></script>
    <script src="assets/vendor/owl carousel/owl.carousel.min.js"></script>
    <script src="assets/vendor/bootstrap/bootstrap.js"></script>
    <script src="assets/vendor/wow/wow.min.js"></script>
    <script src="assets/vendor/light box/lightbox.min.js"></script>
    <script src="assets/js/main.js"></script>
</body>

</html>
