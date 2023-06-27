<?php
include "app/config.php";
include "app/functions.php";
include 'shared/head.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'mail_page-main/phpmailer/src/Exception.php';
require 'mail_page-main/phpmailer/src/PHPMailer.php';
require 'mail_page-main/phpmailer/src/SMTP.php';

// make variables empty
$emailError = [];
$emailError2 = [];
$name = "";
$email = "";
$phone = null;




if (isset($_POST['signup'])) {

    $name = filterValidation($_POST['name']);
    $phone = $_POST['phone'];
    $email = filterValidation($_POST['email']);
    $pass = filterValidation($_POST['pass']);
    $confirmPass = filterValidation($_POST['confirm']);


    $select = "SELECT * FROM users ";
    $s = mysqli_query($conn, $select);
    $row = mysqli_fetch_assoc($s);


    if ($email == "" || $pass == "" || $phone == '' || $name == '' || $confirmPass == "") {
        $emailErorr[] = "Email Or Password Can Not Be Empty";
        $emailErorr2[] = 'لا يمكن ان يكون اسم المستخدم وكلمة المرور فارغين';
    } else if (stringValidation($name, 4)) {
        $emailErorr[] = "please enter valid name more than 4 characters";
        $emailErorr2[] = 'ادخل اسم لا يقل عن اربع حروف';
    }
    //  else if (validationPhone($phone)) {
    //     $emailErorr[] = "Wrong Phone Number";
    //     $emailErorr2[] = 'هذا الرقم غير صحيح';
    // }
    else if ($pass != $confirmPass) {
        $emailErorr[] = "Password and Confirm Password do not match";
        $emailErorr2[] = 'كلمة المرور وتاكيد كلمة المرور غير متشابهين';
    } else if (stringValidation($pass, 8)) {
        $emailErorr[] = "Password must be more than 8 characters";
        $emailErorr2[] = 'كلمة المرور يجب ان تكون اكثر من 8 احرف';
    }
    foreach ($s as $data) {
        if ($data['email'] == $email) {
            $emailErorr[] = "Email is not available";
            $emailErorr2[] = "هذا الايميل موجود سابقاً";
        }
    }

    if (empty($emailErorr) && empty($emailErorr2)) {
        $random_code = time();
        $_SESSION['registerd'] = [
            "target_email" => $email,
            "code" => $random_code,
            "name" => $name,
            "phone" => $phone,
            "pass" => $pass,
            "confirm_pass"=> $confirmPass
        ];

        try {
            $mail = new PHPMailer(true);

            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'horustransport500@gmail.com';
            $mail->Password   = 'qwipukhfhzytwkap';

            // Disable SSL certificate verification
            $mail->SMTPOptions = array(
                'ssl' => array(
                    'verify_peer'       => false,
                    'verify_peer_name'  => false,
                    'allow_self_signed' => true
                )
            );
            $mail->SMTPSecure = 'ssl';
            $mail->Port       = 465;

            $mail->setFrom('horustransport500@gmail.com');
            //horustransport500@gmail.com --> Hours2018 
            $mail->addAddress($_POST["email"]);
            $mail->isHTML(true);
            $mail->Subject = 'Confirmation Code';
            $mail->Body    = "<h1> This is Your Confirmation Code For Your Horus Email ، Do not Share This With Any One: <br><br> </h1> <h2>$random_code</h2>" ;

            $mail->send();

            echo "
            <script>
            document.location.href='mail_page-main/activation.php';
            </script>
        ";
        } catch (Exception $e) {
            echo "Mailer Error: " . $e->getMessage();
        }



    }
}


?>


<!DOCTYPE html>
<html lang="en">




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
                <form method="post" class="needs-validation" novalidate>

                    <div class="field email">
                        <div class="input-area">
                            <input class="emailInput" type="text" placeholder="Enter your username" name="name" required value="<?= $name ?>">
                            <i class="icon fa-solid fa-user"></i>
                            <i class="error error-icon fa-solid fa-circle-exclamation"></i>
                            <div class="invalid-feedback">Please, enter your name!</div>
                        </div>

                    </div>

                    <div class="field email">
                        <div class="input-area">
                            <input class="emailInput" type="number" placeholder="Enter your mobile phone" name="phone" value="<?= $phone ?>" required>
                            <i class="icon fa-solid fa-phone"></i>
                            <i class="error error-icon fa-solid fa-circle-exclamation"></i>
                            <div class="invalid-feedback">Wrong Phone Number</div>

                        </div>
                    </div>
                    <div class="field email">
                        <div class="input-area">
                            <input type="email" name="email" class="emailInput" id="yourEmail" placeholder="Enter your Email Address" value="<?= $email ?>" required>
                            <i class="icon fa-solid fa-envelope"></i>
                            <i class="error error-icon fa-solid fa-circle-exclamation"></i>
                            <div class="invalid-feedback">Please enter a valid Email adddress!</div>
                        </div>

                    </div>
                    <div class="field password">
                        <div class="input-area">
                            <input class="passInput" type="password" placeholder="enter your password" name="pass" required>
                            <i class="icon fa-solid fa-lock"></i>
                            <i class="error error-icon fa-solid fa-circle-exclamation"></i>
                            <div class="invalid-feedback">Password is required</div>
                        </div>
                    </div>
                    <div class="field password">
                        <div class="input-area">
                            <input class="passInput" type="password" placeholder="Confirm your password" name="confirm" required>
                            <i class="icon fa-solid fa-lock"></i>
                            <i class="error error-icon fa-solid fa-circle-exclamation"></i>
                            <div class="invalid-feedback">Confirm Password is required</div>
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

                    <button class=" btn w-100 mt-3 btn-sign" name="signup">sign up</button>

                    <div class="signupLink">
                        Have an Account ? <a href="/Horus/login.php">Login</a>
                    </div>
                </form>

            </div>
        </div>
    </section>
    <!--end login-->
</main>
<!-- End main English -->


<!-- start main Arabic -->
<main class="Arabic " id="Ar">

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
            <div class="right-side animate__animated animate__bounceInRight" data-wow-delay=".5s">
                <header>نموذج التسجيل</header>
                <form method="post" enctype="multipart/form-data" class=" needs-validation" novalidate>

                    <div class="field email">
                        <div class="input-area">
                            <input class="emailInput" type="text" placeholder="أدخل اسم المستخدم الخاص بك" name="name" required value="<?= $name ?>">
                            <i class="icon fa-solid fa-user"></i>
                            <i class="error error-icon fa-solid fa-circle-exclamation"></i>
                            <div class="invalid-feedback">يجب ادخال الاسم</div>

                        </div>
                    </div>
                    <div class="field email">
                        <div class="input-area">
                            <input class="emailInput" type="text" placeholder="أدخل رقم هاتفك المحمول" name="phone" required value="<?= $phone ?>">
                            <i class="icon fa-solid fa-phone"></i>
                            <i class="error error-icon fa-solid fa-circle-exclamation"></i>
                            <div class="invalid-feedback">خطأ في رقم الهاتف</div>
                        </div>
                    </div>
                    <div class="field email">
                        <div class="input-area">
                            <input class="emailInput" type="text" placeholder="أدخل عنوان بريدك الإلكتروني" name="email" required value="<?= $email ?>">
                            <i class="icon fa-solid fa-envelope"></i>
                            <i class="error error-icon fa-solid fa-circle-exclamation"></i>
                            <div class="invalid-feedback">هذا الايميل غير صحيح</div>

                        </div>
                    </div>
                    <div class="field password">
                        <div class="input-area">
                            <input class="passInput" type="password" placeholder="أدخل كلمة المرور" name="pass" required>
                            <i class="icon fa-solid fa-lock"></i>
                            <i class="error error-icon fa-solid fa-circle-exclamation"></i>
                            <div class="invalid-feedback">يجب ادخال كلمة سر مناسبة</div>
                        </div>
                    </div>
                    <div class="field password">
                        <div class="input-area">
                            <input class="passInput" type="password" placeholder="تأكيد كلمة المرور" name="confirm" required>
                            <i class="icon fa-solid fa-lock"></i>
                            <i class="error error-icon fa-solid fa-circle-exclamation"></i>
                            <div class="invalid-feedback">يجب ادخال تاكيد كلمة السر</div>

                        </div>
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

                    <button class="btn btn-sign w-100 mt-3" name="signup">تسجيل</button>

                    <div class="signupLink mt-3">
                        لديك حساب بالفعل ؟ <a href="/Horus/login.php">تسجيل الدخول</a>
                    </div>
                </form>

            </div>
        </div>
    </section>

</main>
<!-- End main Arabic -->


<?php
include 'shared/script.php'
?>