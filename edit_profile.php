<?php

include 'app/config.php';
include 'app/functions.php';
include 'shared/head.php';

$id = $_SESSION['users']['id'];
$edit_error = [];
$select = "SELECT * FROM users where id = $id";
$s = mysqli_query($conn, $select);
$row = mysqli_fetch_assoc($s);

if (isset($_POST['update'])) {
    $name = $_POST['name'];
    $phone = $_POST['phone'];

    if ($name == '' || $phone == '') {
        $edit_error[] = 'phone and name can not be empty';
    } else if (stringValidation($name, 10)) {
        $emailErorr[] = "Name Must Be More Than 8 Characters";
    }
    if (empty($edit_error)) {
        $update = "UPDATE users set name = '$name' , phone = $phone where id = $id";
        $u = mysqli_query($conn, $update);
        path("profile.php");
    }
}



if (isset($_POST['lang'])) {
    if ($row['langID'] == 1) {
        $update = "UPDATE users set `langID` = 2  where id = $id";
        mysqli_query($conn, $update);
        path('edit_profile.php');
    } else {
        $update = "UPDATE users set `langID` = 1 where id = $id ";
        mysqli_query($conn, $update);
        path("edit_profile.php");
    }
}

if (isset($_POST['mode'])) {
    if ($row['modeID'] == 1) {
        $update = "UPDATE users set `modeID` = 2  where id = $id";
        mysqli_query($conn, $update);
        path('edit_profile.php');
    } else {
        $update = "UPDATE users set `modeID` = 1 where id = $id ";
        mysqli_query($conn, $update);
        path("edit_profile.php");
    }
}





auth(2)

?>



<!-- Start loading page -->
<div class="loading-spiner">
    <span class="loader"></span>
</div>
<!-- End loading page -->


<!-- mode and translate  with login users-->
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
                            <?php if (isset($_SESSION['users'])) : ?>
                                <form class="d-flex m-auto header-login" method="post" role="search">
                                    <button name="signout" href="/Horus/login.php" class="Btn margin-response m-auto animate__animated animate__lightSpeedInRight" data-wow-delay="1s">Logout </button>
                                </form>
                                <a href="/Horus/Admin/login.php" class=" nav-link nav-profile d-flex align-items-center pe-2 animate__animated animate__lightSpeedInRight" data-wow-delay="1s">
                                    <img src="Admin/assets/img/software-engineer.png" style="width: 30px;" alt="">
                                    <span class="d-none d-md-block ps-2" style="color: #e45927;">Staf Only</span>

                                </a>
                                <a class="nav-link nav-profile d-flex align-items-center pe-0" href="/Horus/profile.php">
                                    <img src="assets/images/Abod.jpg" style="width: 30px;" alt="">
                                    <span class="d-none d-md-block ps-2" style="color: #e45927;"><?= $row['name'] ?></span>
                                </a><!-- End Profile Iamge Icon -->
                            <?php else : ?>
                                <form class="d-flex m-auto header-login" role="search">
                                    <a href="/Horus/login.php" class="Btn margin-response m-auto animate__animated animate__lightSpeedInRight" data-wow-delay="1s"> Login</a>
                                </form>
                                <a href="/Horus/Admin/login.php" class=" margin-response m-auto animate__animated animate__lightSpeedInRight" data-wow-delay="1s"> <img src="Admin/assets/img/software-engineer.png" style="width: 30px;" alt=""></a>
                            <?php endif; ?>
                        </div>
                    </div>
                </nav>
            </div>
        </header>
        <!-- end header -->

        <div class="container">

            <div class="pagetitle">
                <h1>Profile</h1>

            </div><!-- End Page Title -->

            <section class="section profile">
                <div class="row justify-content-center p-2">
                    <div class="col-xl-8">

                        <div class="card">
                            <div class="card-body pt-3">

                                <div class="tab-content pt-2">

                                    <div class="tab-pane fade show active profile-overview" id="profile-overview">
                                        <form class="row g-0 needs-validation" method="post" novalidate>
                                            <div class="col-12">
                                                <label for="yourName" class="label">Full Name</label>
                                                <input type="text" name="name" class="form-control w-100" id="yourName" required value="<?= $row['name'] ?>">
                                                <div class="invalid-feedback">Please, enter your name!</div>
                                            </div>

                                            <div class="col-12">
                                                <label for="yourEmail" class="label">Your Phone</label>
                                                <input type="number" name="phone" class="form-control w-100" id="yourEmail" required value="<?= $row['phone'] ?>">
                                                <div class="invalid-feedback">Please enter a valid Email adddress!</div>
                                            </div>

                                            <div class="col-12 mt-3">
                                                <button class="btn w-100" name="update" type="submit">Update</button>
                                            </div>

                                        </form>

                                    </div>

                                </div><!-- End Bordered Tabs -->

                            </div>
                        </div>

                    </div>
                </div>
            </section>
        </div>

    </main><!-- End #main -->
<?php else : ?>

    <main class="Arabic" style="direction: rtl;" id="Ar">

        <header>
            <div class="Navbar p-3">
                <nav class="navbar navbar-expand-lg ">
                    <div class="container-fluid">
                        <a class="navbar-brand hours animate__animated animate__bounceInLeft" data-wow-delay="1s" href="#">حورس</a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse " id="navbarNav">
                            <ul class="navbar-nav m-auto">
                                <li class="nav-item">
                                    <a class="nav-link  animate__animated animate__bounceInUp active" data-wow-delay="1s" aria-current="page" href="/Horus/index.php">الرئيسية</a>
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
                                <li class="nav-item nav-after">
                                    <a class="nav-link  animate__animated animate__bounceInDown" data-wow-delay="1s" href="/Horus/contact.php">تواصل معنا</a>
                                </li>
                            </ul>
                            <?php if (isset($_SESSION['users'])) : ?>
                                <form class="d-flex m-auto header-login" method="post" role="search">
                                    <button name="signout" href="/Horus/login.php" class="Btn margin-response m-auto animate__animated animate__lightSpeedInRight" data-wow-delay="1s">تسجيل الخروج </button>
                                </form>
                                <a href="/Horus/Admin/login.php" class=" nav-link nav-profile d-flex align-items-center pe-2 animate__animated animate__lightSpeedInRight" data-wow-delay="1s">
                                    <img src="Admin/assets/img/software-engineer.png" style="width: 30px;" alt="">
                                    <span class="d-none d-md-block ps-2" style="color: #e45927;">للموظفين فقط</span>

                                </a>
                                <a class="nav-link nav-profile d-flex align-items-center pe-0" href="/Horus/profile.php">
                                    <img src="assets/images/Abod.jpg" style="width: 30px;" alt="">
                                    <span class="d-none d-md-block ps-2" style="color: #e45927;"><?= $row['name'] ?></span>
                                </a><!-- نهاية صورة الملف الشخصي -->
                            <?php else : ?>
                                <form class="d-flex m-auto header-login" role="search">
                                    <a href="/Horus/login.php" class="Btn margin-response m-auto animate__animated animate__lightSpeedInRight" data-wow-delay="1s"> تسجيل الدخول</a>
                                </form>
                                <a href="/Horus/Admin/login.php" class=" margin-response m-auto animate__animated animate__lightSpeedInRight" data-wow-delay="1s"> <img src="Admin/assets/img/software-engineer.png" style="width: 30px;" alt=""></a>
                            <?php endif; ?>
                        </div>
                    </div>
                </nav>
            </div>
        </header>
        <!-- نهاية الهيدر -->

        <div class="container">
            <div class="pagetitle">
                <h1> تعديل الملف الشخصي</h1>
            </div><!-- نهاية عنوان الصفحة -->

            <section class="section profile">
                <div class="row justify-content-center p-2">
                    <div class="col-xl-8">
                        <div class="card">
                            <div class="card-body pt-3">

                                <div class="tab-content pt-2">

                                    <div class="tab-pane fade show active profile-overview" id="profile-overview">
                                        <form class="row g-0 needs-validation" method="post" novalidate>
                                            <div class="col-12">
                                                <label for="yourName" class="label">الاسم الكامل</label>
                                                <input type="text" name="name" class="form-control w-100" id="yourName" required value="<?= $row['name'] ?>">
                                                <div class="invalid-feedback">يرجى إدخال اسمك!</div>
                                            </div>

                                            <div class="col-12">
                                                <label for="yourEmail" class="label">رقم الهاتف</label>
                                                <input type="number" name="phone" class="form-control w-100" id="yourEmail" required value="<?= $row['phone'] ?>">
                                                <div class="invalid-feedback">يرجى إدخال عنوان بريد إلكتروني صحيح!</div>
                                            </div>

                                            <div class="col-12 mt-3">
                                                <button class="btn w-100" name="update" type="submit">تحديث</button>
                                            </div>

                                        </form>

                                    </div>

                                </div><!-- نهاية علامات التبويب المُحددة -->

                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </main>
<?php endif; ?>




<?php
include 'shared/script.php';

?>