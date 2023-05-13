<?php

include 'app/config.php';
include 'app/functions.php';
session_start();

$select = "SELECT * FROM users";
$s =  mysqli_query($conn, $select);
$row = mysqli_fetch_assoc($s);
$numRows = mysqli_num_rows($s);
$emailErorr = [];
$emailErorr2 = [];
$emailErorr3 = [];


if (isset($_POST['login'])) {
    $email = filterValidation($_POST['email']);
    $pass = filterValidation($_POST['pass']);


    if ($email == "" || $pass == "") {
        $emailErorr[] = "Email Or Password Can Not Be Empty";
        $emailErorr2[] = 'لا يمكن ان يكون اسم المستخدم وكلمة المرور فارغين';
    } elseif ($row['email'] != $email || $row['password'] != $pass) {
        $emailErorr[] = 'Wrong password or email';
        $emailErorr2[] = 'حطأ في اسم المستخدم او كلمة المرور';
    } else {
        $_SESSION['admins'] = [
            "email" => $email,
            "langID" => $row['langID'],
            "id" => $row['id']
        ];
        path("index.php");
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="assets/images/Make up Artist Logo.png" type="image/x-icon">
    <title>Hours</title>

    <link href="https://fonts.googleapis.com/css2?family=Clicker+Script&family=Inter:wght@400;700;800&family=Jost:wght@100;300;400;500;600&family=Kumbh+Sans:wght@400;700&family=Nanum+Gothic:wght@400;700;800&family=Overpass:wght@400;700&family=Plus+Jakarta+Sans:wght@200;300;400;600&family=Poppins:wght@400;500;600&family=Rajdhani:wght@300;400;500;600;700&family=Space+Grotesk:wght@400;600;700&display=swap" rel="stylesheet">
    <!-- cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <!-- css files -->
    <link rel="stylesheet" href="assets/vendor/WOW/animate.min.css">
    <link rel="stylesheet" href="assets/vendor/bootstrap/bootstrap.css">
    <link rel="stylesheet" href="assets/css/all.min.css">
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
                    
                <a onclick="State()" name="lang"> <i class="fa-solid fa-globe"></i></a>

                   
                </span>
            </div>
        </div>

    </div>
    <!-- End mode and translate -->

 
    <main class="English state" id="En">
        <!--start login-->
        <section class="login ">

            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="left-side">
                            <div class="content-box">
                                <div class="text-box animate__animated animate__bounceInLeft    ">
                                    <h1>book your ticket online for <span class="animate__animated animate__fadeInDownBig" data-wow-delay="1s">travel</span></h1>
                                    <p>Easy, Safe, Reliable Ticketing.</p>
                                    <a href="https://twitter.com/horus_trans" target="_blank"><i class="fa-brands fa-twitter"></i></a>
                                    <a href="https://www.facebook.com/horustrans?mibextid=LQQJ4d" target="_blank"><i class="fa-brands fa-facebook"></i></a>
                                    <a class="linkedin"><i class="fa-brands fa-linkedin"></i></a>
                                    <a href="https://www.instagram.com/horusbus/?fbclid=IwAR1gw_2HUcOoXrBkgnAF57B9StR0aOijqeN57KmZoIGgQYcFncdWquJv1tE" target="_blank"><i class="fa-brands fa-instagram"></i></a>

                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 mt-5">
                        <div class="right-side animate__animated animate__bounceInRight" data-wow-delay=".5s">
                            <header>login form</header>
                            <form method="post" enctype="multipart/form-data">
                                <div class="field email">
                                    <div class="input-area">
                                        <input class="emailInput" type="text" placeholder="enter your email" name="email">
                                        <i class="icon fa-solid fa-envelope"></i>
                                        <i class="error error-icon fa-solid fa-circle-exclamation"></i>
                                    </div>

                                </div>

                                <div class="field password">
                                    <div class="input-area">
                                        <input class="passInput" type="password" placeholder="enter your password" name="pass">
                                        <i class="icon fa-solid fa-lock"></i>
                                        <i class="error error-icon fa-solid fa-circle-exclamation"></i>
                                    </div>

                                </div>
                                <?php if (!empty($emailErorr)) : ?>
                                    <div class="alert alert-danger mt-3">
                                        <ul>
                                            <?php foreach ($emailErorr as $error) : ?>
                                                <li><?= $error ?></li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </div>
                                <?php endif; ?>
                                <div class="forgetLink">
                                    <a href="#">forget password ?</a>
                                </div>
                                <button class="form-control btn w-100" name="login">Login</button>
                            </form>
                            <div class="signupLink">
                                not yet member ? <a href="/Horus/register.php">sign up now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>
    </main>
 




    <!-- End main English -->

    <!-- start main Arabic -->
    <main class="Arabic" id="Ar">

        <!-- بدء تسجيل الدخول -->
        <section class="login ">

            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="left-side">
                            <div class="content-box">
                                <div class="text-box animate__animated animate__bounceInLeft">
                                    <h1>احجز تذكرتك عبر الإنترنت <span class="animate__animated animate__fadeInDownBig" data-wow-delay="1s">للتنقل</span></h1>
                                    <p>حجز التذاكر بسهولة وأمان وموثوقية.</p>
                                    <a href="https://twitter.com/horus_trans" target="_blank"><i class="fa-brands fa-twitter"></i></a>
                                    <a href="https://www.facebook.com/horustrans?mibextid=LQQJ4d" target="_blank"><i class="fa-brands fa-facebook"></i></a>
                                    <a class="linkedin"><i class="fa-brands fa-linkedin"></i></a>
                                    <a href="https://www.instagram.com/horusbus/?fbclid=IwAR1gw_2HUcOoXrBkgnAF57B9StR0aOijqeN57KmZoIGgQYcFncdWquJv1tE" target="_blank"><i class="fa-brands fa-instagram"></i></a>

                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 mt-5">
                        <div class="right-side animate__animated animate__bounceInRight" data-wow-delay=".5s">
                            <header>نموذج تسجيل الدخول</header>
                            <form method="post" enctype="multipart/form-data">
                                <div class="field email">
                                    <div class="input-area">
                                        <input class="emailInput" type="text" placeholder="أدخل بريدك الإلكتروني" name="email">
                                        <i class="icon fa-solid fa-envelope"></i>
                                        <i class="error error-icon fa-solid fa-circle-exclamation"></i>
                                    </div>


                                </div>

                                <div class="field password">
                                    <div class="input-area">
                                        <input class="passInput" type="password" placeholder="ادخل كلمة المرور" name="pass">
                                        <i class="icon fa-solid fa-lock"></i>
                                        <i class="error error-icon fa-solid fa-circle-exclamation"></i>
                                    </div>
                                    <div class="error error-txt">كلمة السر لا يمكن ان تكون فارغة</div>
                                </div>

                                <?php if (!empty($emailErorr2)) : ?>
                                    <div class="alert alert-danger mt-3">
                                        <ul>
                                            <?php foreach ($emailErorr2 as $error) : ?>
                                                <li><?= $error ?></li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </div>
                                <?php endif; ?>
                                <div class="forgetLink">
                                    <a href="#">هل نسيت كلمة المرور ؟</a>
                                </div>
                                <button class="btn btn-sign w-100" name="login">تسجيل الدخول</button>
                            </form>
                            <div class="signupLink">
                                لست مشترك بعد ؟ <a href="/Horus/register.php">أحصل على ايميل الان </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>
    </main>
   



    <!--End  main Arabic -->
    <!--end login-->


    <script src="assets/vendor/jQuery/jquery-3.6.1.min.js"></script>
    <script src="assets/vendor/bootstrap/bootstrap.js"></script>
    <script src="assets/vendor/WOW/wow.min.js"></script>
    <script src="assets/js/main.js"></script>
</body>

</html>