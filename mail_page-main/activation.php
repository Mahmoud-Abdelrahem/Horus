<?php
include '../app/config.php';
include '../app/functions.php';

session_start();

$confirm_code = $_SESSION['registerd']['code'];
$name= $_SESSION['registerd']['name'];
$phone= $_SESSION['registerd']['phone'];
$email=$_SESSION['registerd']['target_email'];
$pass=$_SESSION['registerd']['pass'];
$confirmPass=$_SESSION['registerd']['confirm_pass'];

$code_error = [];
$code_error_ar = [];



if (isset($_POST['send'])) {
    $confirm = $_POST['code'];

    if ($confirm == $confirm_code) {
        $insert = "INSERT INTO `users` VALUES (null,'$name',$phone,'$email','$pass','$confirmPass', 1 , 1 , 1)";
        $i = mysqli_query($conn, $insert);
        path('login.php');
    } else {
        $code_error[] = "Incorrect Activation Code";
        $code_error_ar[] = "خطأ في رمز التفعيل";
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Code</title>
    <!-- style file  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

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

<body class="dark" style="text-transform: capitalize;">


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

    <!-- start english -->
    <main class="English state" id="En">

        <!-- start forget password page  -->
        <section class="froget_page">
            <main>
                <div class="continar">
                    <div class="main_content">


                        <form method="post">

                            <div class="form-group row col-lg-12">
                                <p>We send verification code</p>
                                <div>
                                    <input type="number" name="code" class="form-control" id="inputEmail3" maxlength="10" placeholder="Enter Verification Code">
                                </div>


                                <?php if (!empty($code_error)) : ?>
                                    <?php foreach ($code_error as $error) : ?>
                                        <div class="alert alert-danger bg-transparent border-0 text-capitalize">
                                            <h5> <?= $error ?></h5>
                                        </div>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </div>


                            <div class="form-group row col-lg-12">
                                <div>
                                    <button type="submit" name="send" class="btn btn-primary">continue</button>
                                </div>
                            </div>

                        </form>



                    </div>
                </div>
            </main>
        </section>

        <!-- end forget password page  -->
    </main>
    <!-- end English -->


    <main class="Arabic" id="Ar">

        <!-- start forget password page  -->
        <section class="froget_page">
            <main>
                <div class="continar">
                    <div class="main_content">


                        <form method="post">

                            <div class="form-group row col-lg-12">
                                <p>برجاء ادخال كود التفعيل</p>
                                <div>
                                    <input type="number" name="code" class="form-control" id="inputEmail3" maxlength="10" placeholder="ادخل رمز التفعيل">
                                </div>


                                <?php if (!empty($code_error_ar)) : ?>
                                    <?php foreach ($code_error_ar as $error) : ?>
                                        <div class="alert alert-danger bg-transparent border-0 text-capitalize">
                                            <h5> <?= $error ?></h5>
                                        </div>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </div>


                            <div class="form-group row col-lg-12">
                                <div>
                                    <button type="submit" name="send" class="btn btn-primary">ارسال</button>
                                </div>
                            </div>

                        </form>



                    </div>
                </div>
            </main>
        </section>

        <!-- end forget password page  -->
    </main>


    <script src="jQuery/jquery-3.6.1.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>