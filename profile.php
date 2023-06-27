<?php

include 'app/config.php';
include 'app/functions.php';
include 'shared/head.php';


if (isset($_SESSION['users'])) {
  $id = $_SESSION['users']['id'];
  $select = "SELECT * FROM users where id = $id";
  $s =  mysqli_query($conn, $select);
  $row = mysqli_fetch_assoc($s);

  if (isset($_POST['lang'])) {
    if ($row['langID'] == 1) {
      $update = "UPDATE users set `langID` = 2  where id = $id";
      mysqli_query($conn, $update);
      path('profile.php');
    } else {
      $update = "UPDATE users set `langID` = 1 where id = $id ";
      mysqli_query($conn, $update);
      path("profile.php");
    }
  }

  if (isset($_POST['mode'])) {
    if ($row['modeID'] == 1) {
      $update = "UPDATE users set `modeID` = 2  where id = $id";
      mysqli_query($conn, $update);
      path('profile.php');
    } else {
      $update = "UPDATE users set `modeID` = 1 where id = $id ";
      mysqli_query($conn, $update);
      path("profile.php");
    }
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
                  <img src="assets/images/person.png" style="width: 30px;" alt="">
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
        <div class="row justify-content-center">
          <div class="col-xl-4 mt-2">

            <div class="card">
              <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

                <img src="assets/images/person.png" alt="Profile" class="">
                <h2></h2>
                <div class="social-links mt-2">
                  <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                  <a href="" target="_blank" class="facebook"><i class="bi bi-facebook"></i></a>
                  <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                  <a href="" target="_blank" class="linkedin"><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
            </div>

          </div>

          <div class="col-xl-8 mt-4">

            <div class="card">
              <div class="card-body pt-3">

                <div class="tab-content pt-2">

                  <div class="tab-pane fade show active profile-overview" id="profile-overview">

                    <h5 class="card-title">Profile Details</h5>

                    <div class="row">
                      <div class="col-lg-3 col-md-4 label ">Full Name</div>
                      <div class="col-lg-9 col-md-8 text"><?= $row['name'] ?></div>
                    </div>

                    <div class="row">
                      <div class="col-lg-3 col-md-4 label">Phone</div>
                      <div class="col-lg-9 col-md-8 text"><?= $row['phone'] ?></div>
                    </div>

                    <div class="row">
                      <div class="col-lg-3 col-md-4 label">Email</div>
                      <div class="col-lg-9 col-md-8 text"><?= $row['email'] ?></div>
                    </div>

                    <div class="row justify-content-center  ">
                      <div class="col-lg-3 col-md-4 mt-3">
                        <a href="/Horus/edit_profile.php">Edit Profile</a>
                      </div>
                    </div>

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
                  <img src="assets/images/person.png" style="width: 30px;" alt="">
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
        <h1>الملف الشخصي</h1>

      </div><!-- نهاية عنوان الصفحة -->

      <section class="section profile">
        <div class="row justify-content-center">
          <div class="col-xl-4 mt-2">

            <div class="card">
              <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

                <img src="assets/images/person.png" alt="Profile" class="">
                <h2></h2>
                <div class="social-links mt-2">
                  <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                  <a href="" target="_blank" class="facebook"><i class="bi bi-facebook"></i></a>
                  <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                  <a href="" target="_blank" class="linkedin"><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
            </div>

          </div>

          <div class="col-xl-8 mt-4">

            <div class="card">
              <div class="card-body pt-3">

                <div class="tab-content pt-2">

                  <div class="tab-pane fade show active profile-overview" id="profile-overview">

                    <h5 class="card-title">تفاصيل الملف الشخصي</h5>

                    <div class="row">
                      <div class="col-lg-3 col-md-4 label ">الاسم الكامل</div>
                      <div class="col-lg-9 col-md-8 text"><?= $row['name']?></div>
                    </div>

                    <div class="row">
                      <div class="col-lg-3 col-md-4 label">الهاتف</div>
                      <div class="col-lg-9 col-md-8 text"><?= $row['phone'] ?></div>
                    </div>

                    <div class="row">
                      <div class="col-lg-3 col-md-4 label">البريد الإلكتروني</div>
                      <div class="col-lg-9 col-md-8 text"><?= $row['email'] ?></div>
                    </div>

                    <div class="row justify-content-center  ">
                      <div class="col-lg-3 col-md-4 mt-3">
                        <a href="/Horus/edit_profile.php">تعديل الملف الشخصي</a>
                      </div>
                    </div>

                  </div>




                  <div class="tab-pane fade pt-3" id="profile-change-password">
                    <!-- نموذج تغيير كلمة المرور -->
                    <form>

                      <div class="row mb-3">
                        <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">كلمة المرور الحالية</label>
                        <div class="col-md-8 col-lg-9">
                          <input name="password" type="password" class="form-control" id="currentPassword">
                        </div>
                      </div>

                      <div class="row mb-3">
                        <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">كلمة المرور الجديدة</label>
                        <div class="col-md-8 col-lg-9">
                          <input name="newpassword" type="password" class="form-control" id="newPassword">
                        </div>
                      </div>

                      <div class="row mb-3">
                        <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">إعادة إدخال كلمة المرور الجديدة</label>
                        <div class="col-md-8 col-lg-9">
                          <input name="renewpassword" type="password" class="form-control" id="renewPassword">
                        </div>
                      </div>

                      <div class="text-center">
                        <button type="submit" class="btn btn-primary">تغيير كلمة المرور</button>
                      </div>
                    </form><!-- نهاية نموذج تغيير كلمة المرور -->

                  </div>

                </div><!-- نهاية علامات التبويب المحددة بالحدود -->

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