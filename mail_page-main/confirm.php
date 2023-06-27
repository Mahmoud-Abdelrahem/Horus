<?php
include '../app/config.php';
include '../app/functions.php';
session_start();

print_r($_SESSION['confirmed']);

$email = $_SESSION['searched_email']['target_email'];
$pass_erroer = [];
if (isset($_POST['confirm'])) {
    $pass = $_POST['pass'];
    $conf_pass = $_POST['conf_pass'];

    if ($pass != $conf_pass) {
        $pass_error[] = "Password and Confirm Password do not match";
    } else if (stringValidation($pass, 8)) {
        $pass_error[] = "Password must be more than 8 characters";
    } else {
        $update = "UPDATE users SET password = '$pass' , confirmpass = '$conf_pass' where email = '$email' ";
        $u = mysqli_query($conn, $update);
        path("login.php");
    }
}

auth_code();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirm Password </title>
    <!-- style file  -->
    <!-- style file  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">


    <link rel="stylesheet" href="css/all.min.css">

    <!-- googal fonts  -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Crete+Round:ital@1&family=Open+Sans:ital,wght@0,400;0,500;0,700;0,800;1,300;1,500;1,700&display=swap" rel="stylesheet">
    <!-- bootsrap -->
    <link rel="stylesheet" href="vendor/bootstrap/bootstrap.css">
    <!-- icon file -->
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/style.css">

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


    <main class="English state" id="En">

        <!-- start forget password page  -->
        <section class="froget_page">
            <main>
                <div class="continar">
                    <div class="main_content">


                        <form method="post">

                            <div class="form-group row col-lg-12">
                                <P>Enter Your New Password</P>

                                <div>
                                    <input type="password" class="form-control" id="inputEmail3" placeholder="Enter New  Password" name="pass">
                                    <input type="password" class="form-control" id="inputEmail3" placeholder="Confirm New Password" name="conf_pass">
                                </div>

                                <?php if (!empty($pass_error)) : ?>
                                    <?php foreach ($pass_error as $error) : ?>
                                        <div class="alert alert-danger bg-transparent border-0 text-capitalize">
                                            <h5> <?= $error ?></h5>
                                        </div>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </div>


                            <div class="form-group row col-lg-12">
                                <div>
                                    <button type="submit" class="btn btn-primary" name="confirm">Confirm</button>
                                </div>
                            </div>

                        </form>



                    </div>
                </div>
            </main>
        </section>
        <!-- end forget password page  -->
    </main>


    <main class="Arabic" id="Ar">

        <!-- start forget password page  -->
        <section class="froget_page">
            <main>
                <div class="continar">
                    <div class="main_content">


                        <form method="post">

                            <div class="form-group row col-lg-12">
                                <P>ادخل كلمة المرور الجديدة</P>

                                <div>
                                    <input type="password" class="form-control" id="inputEmail3" placeholder="أدخل كلمة المرور الجديدة" name="pass">
                                    <input type="password" class="form-control" id="inputEmail3" placeholder="أدخل تأكيد كلمة المرور الجديدة" name="conf_pass">
                                </div>

                                <?php if (!empty($pass_error)) : ?>
                                    <?php foreach ($pass_error as $error) : ?>
                                        <div class="alert alert-danger bg-transparent border-0 text-capitalize">
                                            <h5> <?= $error ?></h5>
                                        </div>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </div>


                            <div class="form-group row col-lg-12">
                                <div>
                                    <button type="submit" class="btn btn-primary" name="confirm">تأكيد</button>
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