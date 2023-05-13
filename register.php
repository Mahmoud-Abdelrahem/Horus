<?php
include "configDB/config.php";




if (isset($_POST['signup'])) {
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $confirmPass = $_POST['confirm'];

    $insert = "INSERT INTO `users` VALUES (null , '$name',$phone, '$email' , '$pass' , '$confirmPass' )";
    $i = mysqli_query($conn, $insert);
    header("location: /Horus/login.php");
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="assets/images/logo.jpeg" type="image/x-icon">
    <title>Register | انشاء ايميل</title>
    <link href="https://fonts.googleapis.com/css2?family=Assistant:wght@400;600;700&family=IBM+Plex+Sans+Arabic:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Clicker+Script&family=Inter:wght@400;700;800&family=Jost:wght@100;300;400;500;600&family=Kumbh+Sans:wght@400;700&family=Nanum+Gothic:wght@400;700;800&family=Overpass:wght@400;700&family=Plus+Jakarta+Sans:wght@200;300;400;600&family=Poppins:wght@400;500;600&family=Rajdhani:wght@300;400;500;600;700&family=Space+Grotesk:wght@400;600;700&display=swap" rel="stylesheet">
    <!-- cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- css Files -->


    <link rel="stylesheet" href="assets/vendor/bootstrap/bootstrap.css">
    <link rel="stylesheet" href="assets/vendor/wow/animate.min.css">
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
                    <a onclick="State()"> <i class="fa-solid fa-globe"></i></a>
                </span>
            </div>
        </div>

    </div>
    <!-- End mode and translate -->

    <!-- start main English -->
    <main class="English state" id="En">
        <!--start login-->
        <section class="register">
            <div class="overlay-register"></div>
            <div class="container">

                <!-- start left side -->
                <div class="left-side animate__animated animate__bounceInLeft ">
                    <div class="content-box">
                        <div class="text-box">
                            <h1>book your ticket online for <span>travel</span></h1>
                            <p>Easy, Safe, Reliable Ticketing.</p>
                        </div>
                        <div class="list-box">
                            <ul>
                                <li><a><i class="fa-brands fa-twitter"></i></a></li>
                                <li><a><i class="fa-brands fa-facebook"></i></a></li>
                                <li><a><i class="fa-brands fa-linkedin"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- start right side -->
                <div class="right-side animate__animated animate__bounceInRight" data-wow-delay=".5s">
                    <header>registration form</header>
                    <form method="post" enctype="multipart/form-data">

                        <div class="field email">
                            <div class="input-area">
                                <input class="emailInput" type="text" placeholder="Enter your username" name="name">
                                <i class="icon fa-solid fa-user"></i>
                                <i class="error error-icon fa-solid fa-circle-exclamation"></i>
                            </div>
                            <div class="error error-txt">username can't be blank</div>
                        </div>
                        <div class="field email">
                            <div class="input-area">
                                <input class="emailInput" type="text" placeholder="Enter your mobile phone" name="phone">
                                <i class="icon fa-solid fa-phone"></i>
                                <i class="error error-icon fa-solid fa-circle-exclamation"></i>
                            </div>
                            <div class="error error-txt">mobile phone be blank</div>
                        </div>
                        <div class="field email">
                            <div class="input-area">
                                <input class="emailInput" type="text" placeholder="enter your email" name="email">
                                <i class="icon fa-solid fa-envelope"></i>
                                <i class="error error-icon fa-solid fa-circle-exclamation"></i>
                            </div>
                            <div class="error error-txt">email can't be blank</div>
                        </div>
                        <div class="field password">
                            <div class="input-area">
                                <input class="passInput" type="password" placeholder="enter your password" name="pass">
                                <i class="icon fa-solid fa-lock"></i>
                                <i class="error error-icon fa-solid fa-circle-exclamation"></i>
                            </div>
                            <div class="error error-txt">password can't be blank</div>
                        </div>
                        <div class="field password">
                            <div class="input-area">
                                <input class="passInput" type="password" placeholder="Confirm your password" name="confirm">
                                <i class="icon fa-solid fa-lock"></i>
                                <i class="error error-icon fa-solid fa-circle-exclamation"></i>
                            </div>
                            <div class="error error-txt">password can't be blank</div>
                        </div>

                        <button class="form-control btn w-100 mt-3" name="signup">sign up</button>
                    </form>

                </div>
            </div>
        </section>
        <!--end login-->
    </main>
    <!-- End main English -->


    <!-- start main Arabic -->
    <main class="Arabic" id="Ar">

        <section class="register">
            <div class="overlay-register"></div>
            <div class="container">

                <!-- البدء في الجانب الأيسر -->
                <div class="left-side animate__animated animate__bounceInLeft ">
                    <div class="content-box">
                        <div class="text-box">
                            <h1>احجز تذكرتك عبر الإنترنت <span>للسفر</span></h1>
                            <p>حجز التذاكر بطريقة سهلة وآمنة وموثوقة.</p>
                        </div>
                        <div class="list-box">
                            <ul>
                                <li><a><i class="fa-brands fa-twitter"></i></a></li>
                                <li><a><i class="fa-brands fa-facebook"></i></a></li>
                                <li><a><i class="fa-brands fa-linkedin"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- البدء في الجانب الأيمن -->
                <div class="right-side animate__animated animate__bounceInRight" data-wow-delay=".5s" >
                    <header>نموذج التسجيل</header>
                    <form  method="post" enctype="multipart/form-data">

                        <div class="field email">
                            <div class="input-area">
                                <input class="emailInput" type="text" placeholder="أدخل اسم المستخدم الخاص بك" name="name">
                                <i class="icon fa-solid fa-user"></i>
                                <i class="error error-icon fa-solid fa-circle-exclamation"></i>
                            </div>
                            <div class="error error-txt">لا يمكن أن يكون اسم المستخدم فارغًا</div>
                        </div>
                        <div class="field email">
                            <div class="input-area">
                                <input class="emailInput" type="text" placeholder="أدخل رقم هاتفك المحمول" name="phone">
                                <i class="icon fa-solid fa-phone"></i>
                                <i class="error error-icon fa-solid fa-circle-exclamation"></i>
                            </div>
                            <div class="error error-txt">لا يمكن أن يكون رقم الجوال فارغًا</div>
                        </div>
                        <div class="field email">
                            <div class="input-area">
                                <input class="emailInput" type="text" placeholder="أدخل عنوان بريدك الإلكتروني" name="email">
                                <i class="icon fa-solid fa-envelope"></i>
                                <i class="error error-icon fa-solid fa-circle-exclamation"></i>
                            </div>
                            <div class="error error-txt">لا يمكن أن يكون البريد الإلكتروني فارغًا</div>
                        </div>
                        <div class="field password">
                            <div class="input-area">
                                <input class="passInput" type="password" placeholder="أدخل كلمة المرور" name="pass">
                                <i class="icon fa-solid fa-lock"></i>
                                <i class="error error-icon fa-solid fa-circle-exclamation"></i>
                            </div>
                            <div class="error error-txt">لا يمكن أن تكون كلمة المرور فارغةً</div>
                        </div>
                        <div class="field password">
                            <div class="input-area">
                                <input class="passInput" type="password" placeholder="تأكيد كلمة المرور" name="confirm">
                                <i class="icon fa-solid fa-lock"></i>
                                <i class="error error-icon fa-solid fa-circle-exclamation"></i>
                            </div>
                            <div class="error error-txt">لا يمكن أن تكون كلمة المرور فارغةً</div>
                        </div>

                        <button class="btn btn-sign w-100 mt-3" name="signup">تسجيل</button>
                    </form>

                </div>
            </div>
        </section>

    </main>
    <!-- End main Arabic -->


    <!-- js files -->
    <script src="assets/vendor/jQuery/jquery-3.6.1.min.js"></script>
    <script src="assets/vendor/bootstrap/bootstrap.js"></script>
    <script src="assets/vendor/wow/wow.min.js"></script>
    <script src="assets/js/main.js"></script>
</body>

</html>