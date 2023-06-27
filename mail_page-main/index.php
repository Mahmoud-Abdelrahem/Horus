<?php
include '../app/config.php';
include '../app/functions.php';
$email_error = [];
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';



if (isset($_POST['search_email'])) {
    $email = $_POST['email'];
    $select = "SELECT * FROM users where email = '$email'";
    $s = mysqli_query($conn, $select);
    $row = mysqli_fetch_assoc($s);

    if ($email == '') {
        $email_error[] = "can not be empty";
    } elseif (empty($row)) {
        $email_error[] = "incorrect Email";
    } else {

        $random_code = time();
        $_SESSION['searched_email'] = [
            "target_email" => $email,
            "code" => $random_code
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
            $mail->Body    = "This is Your Confirmation Code For Your Horus Email ، Do not Share This With Any One: <br><br> " . $random_code;

            $mail->send();

            echo "
            <script>
            document.location.href='Vertify_Code.php';
            </script>
        ";
        } catch (Exception $e) {
            echo "Mailer Error: " . $e->getMessage();
        }



        path("mail_page-main/Vertify_Code.php");
    }
}

?>





<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forget Password Page</title>
    <!-- style file  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- render all elemant normally -->

    <!-- icon file -->

    <!-- googal fonts  -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Crete+Round:ital@1&family=Open+Sans:ital,wght@0,400;0,500;0,700;0,800;1,300;1,500;1,700&display=swap" rel="stylesheet">
    <!-- bootsrap -->
    <link rel="stylesheet" href="vendor/bootstrap/bootstrap.css">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/style.css">

</head>

<body class="" style="text-transform: capitalize;">


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


    <!-- start forget password page  -->
    <main class="English state" id="En">
        <section class="froget_page">
            <main>
                <div class="continar">
                    <div class="main_content">


                        <form method="post">

                            <div class="form-group row col-lg-12">

                                <p>Enter Your Email Address For Searching</p>
                                <div>
                                    <input type="text" class="form-control" name="email" id="inputEmail3" placeholder="Enter Your Email">
                                </div>
                                <?php if (!empty($email_error)) : ?>
                                    <?php foreach ($email_error as $error) : ?>
                                        <div class="alert alert-danger bg-transparent border-0 text-capitalize">
                                            <h5> <?= $error ?></h5>
                                        </div>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </div>


                            <div class="form-group row col-lg-12">
                                <div>
                                    <button type="submit" name="search_email" class="btn btn-primary">Search</button>
                                    <button type="submit" name="cancel" class="btn btn-primary">Cancel</button>
                                </div>
                            </div>

                        </form>



                    </div>
                </div>
            </main>
        </section>
    </main>
    <!-- end forget password page  -->

    <main class="Arabic" id="Ar" style="direction: rtl;">
        <section class="froget_page">
            <main>
                <div class="continar">
                    <div class="main_content">
                        <form method="post">

                            <div class="form-group row col-lg-12">

                                <p>أدخل عنوان بريدك الإلكتروني للبحث</p>
                                <div>
                                    <input type="text" class="form-control" name="email" id="inputEmail3" placeholder="أدخل بريدك الإلكتروني">
                                </div>
                                <?php if (!empty($email_error)) : ?>
                                    <?php foreach ($email_error as $error) : ?>
                                        <div class="alert alert-danger bg-transparent border-0 text-capitalize">
                                            <h5> <?= $error ?></h5>
                                        </div>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </div>


                            <div class="row form-group col-lg-12">
                                <div>
                                    <button type="submit" name="search_email" class="btn btn-primary">بحث</button>
                                    <button type="submit" name="cancel" class="btn btn-primary">إلغاء</button>
                                </div>
                            </div>

                        </form>



                    </div>
                </div>
            </main>
            </div>
            </div>
    </main>
    </section>
    </main>

    <script src="jQuery/jquery-3.6.1.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>