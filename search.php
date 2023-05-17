<?php

include 'app/config.php';
include 'app/functions.php';
include 'shared/head.php';



if (isset($_SESSION['users'])) {

    // search code

    $picupLocation = $_SESSION['bus']['pickup'];
    $destination = $_SESSION['bus']['destination'];
    $select = "SELECT * FROM directions where pickup = '$picupLocation' and destination = '$destination'";
    $s = mysqli_query($conn, $select);
    $searchBool = false;




    // mode dark and translate
    $id = $_SESSION['users']['id'];
    $selectOne = "SELECT * FROM users where id = $id";
    $sOne =  mysqli_query($conn, $selectOne);
    $row = mysqli_fetch_assoc($sOne);

    if (isset($_POST['lang'])) {
        if ($row['langID'] == 1) {
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
        if ($row['modeID'] == 1) {
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




<?php if ($row['langID'] == 2) : ?>
    <main class="English search" id="En">

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
                                    <a class="nav-link animate__animated animate__bounceInUp " data-wow-delay="1s" href="booking.php">Booking</a>
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

                                        <p>Start Time : <span><?= $data['start_time'] ?></span> AM</p>
                                    </div>

                                    <div class="buy">
                                        <button>Book Now</button>
                                        <div class="payment">
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

        </div>

        <!-- end Search trips  -->


        <script src="vendor/bootstrap/bootstrap.bundle.js"></script>
    </main>
<?php else : ?>
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
    <!-- End Header -->

    <main class="Arabic search search_ar" id="Ar">

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
            <div class="row">

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
                                        <p>وقت الانطلاق: <span><?= $data['start_time'] ?></span> صباحًا</p>
                                    </div>
                                    <div class="buy">
                                        <button>احجز الآن</button>
                                        <div class="payment">
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
        </div>

    </main>

<?php endif; ?>
<?php
include 'shared/script.php';
?>