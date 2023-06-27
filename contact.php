<?php

include 'app/config.php';
include 'app/functions.php';
include 'shared/head.php';


if (isset($_SESSION['users'])) {
    $id = $_SESSION['users']['id'];
    $selectTwo = "SELECT * FROM users where id = $id";
    $sTwo = mysqli_query($conn, $selectTwo);
    $rowTwo = mysqli_fetch_assoc($sTwo);

    if (isset($_POST['lang'])) {
        if ($row['langID'] == 1) {
            $update = "UPDATE users set `langID` = 2  where id = $id";
            mysqli_query($conn, $update);
            path('contact.php');
        } else {
            $update = "UPDATE users set `langID` = 1 where id = $id ";
            mysqli_query($conn, $update);
            path("contact.php");
        }
    }

    if (isset($_POST['mode'])) {
        if ($row['modeID'] == 1) {
            $update = "UPDATE users set `modeID` = 2  where id = $id";
            mysqli_query($conn, $update);
            path('contact.php');
        } else {
            $update = "UPDATE users set `modeID` = 1 where id = $id ";
            mysqli_query($conn, $update);
            path("contact.php");
        }
    }
    $select = "SELECT * FROM users where id = $id";
    $s = mysqli_query($conn, $select);
    $row = mysqli_fetch_assoc($s);
    

    $emailError = [];
    $emailError2 = [];
    $email = $_SESSION["users"]['email'];
    $phone = null;
 

    if (isset($_POST['send'])) {

        $name = filterValidation($_POST['name']);
        $phone = $_POST['phone'];
        $email = filterValidation($_POST['email']);
        $massage = $_POST['massage'];

        if ($email == "" || $phone == '' || $name == '') {
            $emailErorr[] = "Email Or Password Can Not Be Empty";
            $emailErorr2[] = 'لا يمكن ان يكون اسم المستخدم وكلمة المرور فارغين';
        } elseif (stringValidation($name, 4)) {
            $emailErorr[] = "please enter valid name more than 4 characters";
            $emailErorr2[] = 'ادخل اسم لا يقل عن اربع حروف';
        }

        if (empty($emailErorr) && empty($emailErorr2)) {
            $insert = "INSERT INTO contacts_problem VALUES (null , '$name' , '$email' , $phone , '$massage')  ";
            $i = mysqli_query($conn, $insert);
    
        }
    
    }
}
// make variables empty


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



<?php if (isset($_SESSION['users'])): ?>
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
                        <li class="nav-item nav-after">
                        <a class="nav-link animate__animated animate__bounceInUp " data-wow-delay="1s" href="/Horus/booking.php">Booking</a>
                        </li>
                        <li class="nav-item ">
                        <a class="nav-link  animate__animated animate__bounceInDown active" data-wow-delay="1s" href="/Horus/contact.php">Contact</a>
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

            <!-- start section contact -->
            <section class="contact-section ">
                <div class="contact-bg">
                    <h3 class=" animate__animated animate__bounceIn" data-wow-delay="1s">Get in touch with us ..</h3>
                    <h2 class="animate__animated animate__swing" data-wow-delay="1s">contact us</h2>
                    <p class="bg-txt">Horus Buses Company is characterized by providing leading and reliable transportation services, as it aims to meet the needs of its customers in the best possible way. Horus includes a modern fleet of buses equipped with modern technologies, including security systems and electronic facilities, which makes transportation trips safer and more comfortable for travelers. In addition, the company relies on a specialized and highly trained team to provide high-quality services and excellence in excellent performance. The Horus team aims to improve the travel experience.

                    </p>
                </div>
                <div class="contact-body">
                    <div class="contact-info">
                        <div class="box-info animate__animated animate__bounceInUp">
                            <span><i class="fa-regular fa-clock"></i></span>
                            <span class="info-title">Phone No.</span>
                            <span class="info-txt">+20 0111111568</span>
                        </div>
                        <div class="box-info  animate__animated animate__bounceInUp" data-wow-delay=".5s">
                            <span><i class="fa-regular fa-location-dot"></i></span>
                            <span class="info-title">About US</span>
                            <span class="info-txt">Sohag University st , Sohag</span>
                        </div>
                        <div class="box-info  animate__animated animate__bounceInUp" data-wow-delay="1s">
                            <span><i class="fa-regular fa-envelope"></i></span>
                            <span class="info-title">E-mail</span>
                            <span class="info-txt">HorusTransport500@gmail.com</span>
                        </div>
                        <div class="box-info special  animate__animated animate__bounceInUp" data-wow-delay="1.5s">
                            <span><i class="fa-regular fa-clock"></i></span>
                            <span class="info-title">Open At</span>
                            <span class="info-txt">7AM : 10PM</span>
                        </div>
                    </div>
                    <div class="contact-form">
                        <form class="" method="post">
                            <input type="text"  name="name" value="<?=$row['name']?>" placeholder="Enter Your Name" class="form-control m-auto mt-3 animate__animated animate__lightSpeedInRight">
                            <input type="email"  name="email" value="<?=$row['email']?>" placeholder="e-mail" class="form-control m-auto mt-3 animate__animated animate__lightSpeedInRight" required>
                            <input type="text" placeholder="phone" value="<?=$row['phone']?>" name="phone" class="form-control m-auto mt-3 animate__animated animate__lightSpeedInLeft" required>
                            <textarea rows="5" name="massage" placeholder="Do you have a problem ?" class="form-control m-auto mt-3 animate__animated animate__jackInTheBox" required></textarea>

                            <button type="submit"  name="send" class="send-btn mt-4">Send Problem</button>
                        </form>

                    </div>
                </div>
                <div class="map">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3568.652484820755!2d31.70987668548699!3d26.563429781434955!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x144f5fc3674af889%3A0xbcc2999eeb62a694!2z2YXZiNmC2YEg2KjYp9i12KfYqiDYrdmI2LHYsyDZhNmG2YLZhCDYp9mE2LHZg9in2KhfSG9ydXMgYnVzIHN0b3AgdG8gdHJhbnNwb3J0IHBhc3NlbmdlcnM!5e0!3m2!1sar!2seg!4v1678104400463!5m2!1sar!2seg" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>

            </section>

            <!-- end section contact -->

            <!-- footer -->
            <footer id="footer">
                <div class="footer-top">
                    <div class="container">
                        <div class="row">

                            <div class="col-lg-3 col-md-6">
                                <div class="footer-info">
                                    <h3>Hours<span>.</span></h3>
                                    <p>
                                        A108 Sohag Street <br>
                                        NY 535022, USA<br><br>
                                        <strong>Phone:</strong> 0111111568<br>
                                        <strong>Email:</strong> HorusTransport500@gmail.com<br>
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
                                    <li><i class="fa-solid fa-chevron-right"></i><a href="index.html">Home</a></li>
                                    <li><i class="fa-solid fa-chevron-right"></i><a href="#">Contact us</a></li>
                                    <li><i class="fa-solid fa-chevron-right"></i><a href="index.html#services">Services</a>
                                    </li>
                                    <li><i class="fa-solid fa-chevron-right"></i><a href="index.html#about">About Horus</a>
                                    </li>
                                    <li><i class="fa-solid fa-chevron-right"></i><a href="#">Privacy policy</a></li>
                                </ul>
                            </div>

                            <div class="col-lg-3 col-md-6 footer-links">
                                <h4>Our Services</h4>
                                <ul>
                                    <li><i class="fa-solid fa-chevron-right"></i><a href="booking.html">Booking</a></li>
                                    <li><i class="fa-solid fa-chevron-right"></i><a href="booking.html">Safety Transport</a>
                                    </li>
                                </ul>
                            </div>

                            <div class="col-lg-4 col-md-6 footer-newsletter">
                                <h4>Our Newsletter</h4>
                                <p>Choosing Horus to transport you is your perfect choice for an unforgettable travel experience.</p>
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
            <!-- End footer -->

        </main>
    <?php else: ?>

        <!-- start main Arabic -->
        <main class="Arabic"  id="Ar">

            <header style="direction:rtl;">
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
                            <a class="nav-link  animate__animated animate__bounceInUp " data-wow-delay="1s" aria-current="page" href="/Horus/index.php">الرئيسية</a>
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
                            <li class="nav-item nav-after">
                            <a class="nav-link animate__animated animate__bounceInUp " data-wow-delay="1s" href="/Horus/booking.php">الحجز</a>
                            </li>
                            <li class="nav-item ">
                            <a class="nav-link  animate__animated animate__bounceInDown active" data-wow-delay="1s" href="/Horus/contact.php">تواصل معنا</a>
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

            <!-- start section contact -->
            <section class="contact-section ">
                <div class="contact-bg">
                    <h3 class=" animate__animated animate__bounceIn" data-wow-delay="1s">.. ابق علي تواصل معنا</h3>
                    <h2 class="animate__animated animate__swing" data-wow-delay="1s">اتصل بنا</h2>
                    <p class="bg-txt"> تتميز شركة حورس للحافلات بتقديم خدمات النقل الرائدة والموثوقة، حيث تهدف إلى تلبية
                        احتياجات عملائها بأفضل الطرق الممكنة. تضم شركة حورس أسطولًا حديثًا من الحافلات المجهزة بأحدث
                        التقنيات، بما في ذلك أنظمة الأمان والمراقبة الإلكترونية، مما يجعل رحلات النقل أكثر أمانًا وراحة
                        للمسافرين. بالإضافة إلى ذلك، تعتمد الشركة على فريق عمل متخصص ومدرب على أعلى مستوى لتقديم خدمات عالية
                        الجودة والتميز في الأداء يسعى فريق حورس إلى تحسين تجربة السفر للعملاء عن طريق توفير الراحة والسلامة
                        والجودة في جميع خدماتها

                    </p>
                </div>
                <div class="contact-body">
                    <div class="contact-info">
                        <div class="box-info animate__animated animate__bounceInUp">
                            <span><i class="fa-regular fa-clock"></i></span>
                            <span class="info-title">رقم الهاتف.</span>
                            <span class="info-txt">+20 0111111568</span>
                        </div>
                        <div class="box-info  animate__animated animate__bounceInUp" data-wow-delay=".5s">
                            <span><i class="fa-regular fa-location-dot"></i></span>
                            <span class="info-title">ماذا عنا</span>
                            <span class="info-txt">الشرق , سوهاج </span>
                        </div>
                        <div class="box-info  animate__animated animate__bounceInUp" data-wow-delay="1s">
                            <span><i class="fa-regular fa-envelope"></i></span>
                            <span class="info-title">البريد الالكتروني</span>
                            <span class="info-txt">HorusTransport500@gmail.com</span>
                        </div>
                        <div class="box-info special  animate__animated animate__bounceInUp" data-wow-delay="1.5s">
                            <span><i class="fa-regular fa-clock"></i></span>
                            <span class="info-title">موعد بدأ العمل</span>
                            <span class="info-txt">7AM : 10PM</span>
                        </div>
                    </div>
                    <div class="contact-form">
                        <form class="" method="post">

                            <input type="text" name="name" value="<?=$row['name']?>" placeholder="الاسم الاول" class="form-control m-auto mt-3 animate__animated animate__lightSpeedInRight">
                            <input type="email" name="email"  value="<?=$row['email']?>" placeholder="البريد الالكتروني" class="form-control m-auto mt-3 animate__animated animate__lightSpeedInRight">
                            <input type="number" name="phone" value="<?=$row['phone']?>"placeholder="رقم الهاتف" class="form-control m-auto mt-3 animate__animated animate__lightSpeedInLeft">

                            <textarea rows="5" name="message"   placeholder="هل لديك شكوي ؟" class="form-control m-auto mt-3 animate__animated animate__jackInTheBox"></textarea>
                            <button type="submit" value="ارسال" name="send" class="send-btn mt-4">ارسال المشكلة </Button>
                        </form>

                    </div>
                </div>
                <div class="map">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3568.652484820755!2d31.70987668548699!3d26.563429781434955!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x144f5fc3674af889%3A0xbcc2999eeb62a694!2z2YXZiNmC2YEg2KjYp9i12KfYqiDYrdmI2LHYsyDZhNmG2YLZhCDYp9mE2LHZg9in2KhfSG9ydXMgYnVzIHN0b3AgdG8gdHJhbnNwb3J0IHBhc3NlbmdlcnM!5e0!3m2!1sar!2seg!4v1678104400463!5m2!1sar!2seg" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>

            </section>

            <!-- end section contact -->

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
                                        <strong>الهاتف:</strong> +1 01111111568<br>
                                        البريد الالكتروني :<strong> HorusTransport500@gmail.com </strong>
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

        <!-- end main Arabic -->
    <?php endif;?>
<?php else: ?>
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

    <!-- start main English -->
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
                    <span class="d-md-block ps-2" style="color: red;">Staf Only</span>

                    </a>

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



        <!-- start section contact -->
        <section class="contact-section ">
            <div class="contact-bg">
                <h3 class=" animate__animated animate__bounceIn" data-wow-delay="1s">get in touch with us ..</h3>
                <h2 class="animate__animated animate__swing" data-wow-delay="1s">contact us</h2>
                <p class="bg-txt">LHorus Buses Company is characterized by providing leading and reliable transportation services, as it aims to meet the needs of its customers in the best possible way. Horus includes a modern fleet of buses equipped with modern technologies, including security systems and electronic facilities, which makes transportation trips safer and more comfortable for travelers. In addition, the company relies on a specialized and highly trained team to provide high-quality services and excellence in excellent performance. The Horus team aims to improve the travel experience.

                </p>
            </div>
            <div class="contact-body">
                <div class="contact-info">
                    <div class="box-info animate__animated animate__bounceInUp">
                        <span><i class="fa-regular fa-clock"></i></span>
                        <span class="info-title">Phone No.</span>
                        <span class="info-txt">+20 01208275570</span>
                    </div>
                    <div class="box-info  animate__animated animate__bounceInUp" data-wow-delay=".5s">
                        <span><i class="fa-regular fa-location-dot"></i></span>
                        <span class="info-title">About US</span>
                        <span class="info-txt">Elgomohria st , sohag</span>
                    </div>
                    <div class="box-info  animate__animated animate__bounceInUp" data-wow-delay="1s">
                        <span><i class="fa-regular fa-envelope"></i></span>
                        <span class="info-title">E-mail</span>
                        <span class="info-txt">mariamnabil23@gmail.com</span>
                    </div>
                    <div class="box-info special  animate__animated animate__bounceInUp" data-wow-delay="1.5s">
                        <span><i class="fa-regular fa-clock"></i></span>
                        <span class="info-title">Open At</span>
                        <span class="info-txt">7AM : 10PM</span>
                    </div>
                </div>
                <div class="contact-form">
                    <form class="">

                        <input type="text" placeholder="first name" class="form-control m-auto mt-3 animate__animated animate__lightSpeedInRight">
                        <input type="text" placeholder="last name" class="form-control m-auto mt-3 animate__animated animate__lightSpeedInLeft">

                        <input type="email" placeholder="e-mail" class="form-control m-auto mt-3 animate__animated animate__lightSpeedInRight">
                        <input type="text" placeholder="phone" class="form-control m-auto mt-3 animate__animated animate__lightSpeedInLeft">

                        <textarea rows="5" placeholder="Do you have a problem ?" class="form-control m-auto mt-3 animate__animated animate__jackInTheBox"></textarea>
                        <input type="submit" value="send" class="send-btn mt-4">
                    </form>

                </div>
            </div>
            <div class="map">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3568.652484820755!2d31.70987668548699!3d26.563429781434955!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x144f5fc3674af889%3A0xbcc2999eeb62a694!2z2YXZiNmC2YEg2KjYp9i12KfYqiDYrdmI2LHYsyDZhNmG2YLZhCDYp9mE2LHZg9in2KhfSG9ydXMgYnVzIHN0b3AgdG8gdHJhbnNwb3J0IHBhc3NlbmdlcnM!5e0!3m2!1sar!2seg!4v1678104400463!5m2!1sar!2seg" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>

        </section>
        <!-- end section contact -->



        <!-- footer -->
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
                                    <strong>Phone:</strong> <a href="tel:0114710314">01154710314</a><br>
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
                                <li><i class="fa-solid fa-chevron-right"></i><a href="index.html">Home</a></li>
                                <li><i class="fa-solid fa-chevron-right"></i><a href="#">Contact us</a></li>
                                <li><i class="fa-solid fa-chevron-right"></i><a href="index.html#services">Services</a>
                                </li>
                                <li><i class="fa-solid fa-chevron-right"></i><a href="index.html#about">About Horus</a>
                                </li>
                                <li><i class="fa-solid fa-chevron-right"></i><a href="#">Privacy policy</a></li>
                            </ul>
                        </div>

                        <div class="col-lg-3 col-md-6 footer-links">
                            <h4>Our Services</h4>
                            <ul>
                                <li><i class="fa-solid fa-chevron-right"></i><a href="booking.html">Booking</a></li>
                                <li><i class="fa-solid fa-chevron-right"></i><a href="booking.html">Safety Transport</a>
                                </li>
                            </ul>
                        </div>

                        <div class="col-lg-4 col-md-6 footer-newsletter">
                            <h4>Our Newsletter</h4>
                            <p>Choosing Horus to transport you is your perfect choice for an unforgettable travel experience.</p>
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
        <!-- footer -->

    </main>
    <!-- end of main english -->

    <!-- start main Arabic -->
    <main class="Arabic state" id="Ar">

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
                                <li class="nav-item active_ar active_ar1 contact-nav">
                                    <a class="nav-link  animate__animated animate__bounceInDown" data-wow-delay="1s" href="contact.php">الاتصال بنا</a>
                                </li>
                                <li class="nav-item active_ar active_ar5 ">
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

                            <?php if (isset($_SESSION['admins'])): ?>
                                <form class="d-flex m-auto header-login" method="post" role="search">
                                    <button name="signout" href="/Horus/login.php" class="Btn margin-response m-auto animate__animated animate__lightSpeedInRight" data-wow-delay="1s">تسجيل الخروج</button>
                                </form>
                            <?php else: ?>
                                <form class="d-flex m-auto header-login" role="search">
                                    <a href="/Horus/login.php" class="Btn margin-response m-auto animate__animated animate__lightSpeedInRight" data-wow-delay="1s">تسجيل الدخول</a>
                                </form>
                            <?php endif;?>
                        </div>
                    </div>
                </nav>
            </div>
        </header>
        <!-- End Header -->



        <!-- start section contact -->
        <section class="contact-section ">
            <div class="contact-bg">
                <h3 class=" animate__animated animate__bounceIn" data-wow-delay="1s">ابق على تواصل معنا..</h3>
                <h2 class="animate__animated animate__swing" data-wow-delay="1s">اتصل بنا</h2>
                <p class="bg-txt"> تتميز شركة حورس للحافلات بتقديم خدمات النقل الرائدة والموثوقة، حيث تهدف إلى تلبية
                    احتياجات عملائها بأفضل الطرق الممكنة. تضم شركة حورس أسطولًا حديثًا من الحافلات المجهزة بأحدث
                    التقنيات، بما في ذلك أنظمة الأمان والمراقبة الإلكترونية، مما يجعل رحلات النقل أكثر أمانًا وراحة
                    للمسافرين. بالإضافة إلى ذلك، تعتمد الشركة على فريق عمل متخصص ومدرب على أعلى مستوى لتقديم خدمات عالية
                    الجودة والتميز في الأداء يسعى فريق حورس إلى تحسين تجربة السفر للعملاء عن طريق توفير الراحة والسلامة
                    والجودة في جميع خدماتها

                </p>
            </div>

            <div class="contact-body">
                <div class="contact-info">
                    <div class="box-info animate__animated animate__bounceInUp">
                        <span><i class="fa-regular fa-clock"></i></span>
                        <span class="info-title">رقم الهاتف.</span>
                        <span class="info-txt">+20 01208275570</span>
                    </div>
                    <div class="box-info  animate__animated animate__bounceInUp" data-wow-delay=".5s">
                        <span><i class="fa-regular fa-location-dot"></i></span>
                        <span class="info-title">ماذا عنا</span>
                        <span class="info-txt">الشرق , سوهاج </span>
                    </div>
                    <div class="box-info  animate__animated animate__bounceInUp" data-wow-delay="1s">
                        <span><i class="fa-regular fa-envelope"></i></span>
                        <span class="info-title">البريد الالكتروني</span>
                        <span class="info-txt">mariamnabil23@gmail.com</span>
                    </div>
                    <div class="box-info special  animate__animated animate__bounceInUp" data-wow-delay="1.5s">
                        <span><i class="fa-regular fa-clock"></i></span>
                        <span class="info-title">موعد بدأ العمل</span>
                        <span class="info-txt">7AM : 10PM</span>
                    </div>
                </div>
                <div class="contact-form">
                    <form class="">

                        <input type="text" placeholder="الاسم الاول" class="form-control m-auto mt-3 animate__animated animate__lightSpeedInRight">
                        <input type="text" placeholder="الاسم الاخير" class="form-control m-auto mt-3 animate__animated animate__lightSpeedInLeft">

                        <input type="email" placeholder="البريد الالكتروني" class="form-control m-auto mt-3 animate__animated animate__lightSpeedInRight">
                        <input type="text" placeholder="رقم الهاتف" class="form-control m-auto mt-3 animate__animated animate__lightSpeedInLeft">

                        <textarea rows="5" placeholder="هل لديك شكوي ؟  " class="form-control m-auto mt-3 animate__animated animate__jackInTheBox"></textarea>
                        <input type="submit" value="ارسال" class="send-btn mt-4">
                    </form>

                </div>
            </div>
            <div class="map">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3568.652484820755!2d31.70987668548699!3d26.563429781434955!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x144f5fc3674af889%3A0xbcc2999eeb62a694!2z2YXZiNmC2YEg2KjYp9i12KfYqiDYrdmI2LHYsyDZhNmG2YLZhCDYp9mE2LHZg9in2KhfSG9ydXMgYnVzIHN0b3AgdG8gdHJhbnNwb3J0IHBhc3NlbmdlcnM!5e0!3m2!1sar!2seg!4v1678104400463!5m2!1sar!2seg" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>

        </section>
        <!-- end section contact -->


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

    <!-- end main Arabic -->

<?php endif;?>




<a href="#"><button class="to-up" id="top"><i class="fa-solid fa-chevron-up"></i></button></a>


<?php
include 'shared/script.php';
?>