<?php
include 'shared/head.php';
include 'shared/header.php';
include 'shared/asside.php';
include '../app/config.php';
include '../app/functions.php';

$id = $_SESSION['admin-data']['id'];
$select = "SELECT * From admins where id = $id";
$s = mysqli_query($conn, $select);
$row = mysqli_fetch_assoc($s);


if (isset($_POST['edit'])) {

  $fullName =  $_POST['fullName'];
  $email = $_POST['email'];


  // imgae code
  if (!empty($_FILES['file']['name'])) {
    $image_name = rand() . rand() . $_FILES['file']['name'];
    $tmp_name = $_FILES['file']['tmp_name'];
    $location = 'upload/' . $image_name;
    move_uploaded_file($tmp_name, $location);
    unlink("upload/" . $row['image_name']);
  } else {
    $image_name = $row['image_name'];
  }
  $_SESSION['image'] = [
    "image_name" => $image_name,
  ];


  $update = "UPDATE admins SET full_name = '$fullName' , phone = $phone , email = '$email' ,image_name = '$image_name' , address = '$address' , twitter = '$twitter' , facebook = '$facebook' , instagram = '$instagram' , linkedin = '$linkedin' where id = $id ";
  $u = mysqli_query($conn, $update);
  testMessage("DONE", $u);
  path("Admin/editProfile.php");
}

?>



<!-- Start loading page -->
<div class="loading-spiner">
  <span class="loader"></span>
</div>
<!-- End loading page -->



<main id="main" class="main">



  <section class="section profile">
    <div class="row">


      <div class="col-xl-12">

        <div class="card">
          <div class="card-body pt-3">
            <!-- Bordered Tabs -->

            <!-- Profile Edit Form -->
            <form method="post" enctype="multipart/form-data">
            

              <div class="row mb-3">
                <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Full Name</label>
                <div class="col-md-8 col-lg-9">
                  <input name="fullName" type="text" class="form-control" id="fullName" value="<?= $row['full_name'] ?>">
                </div>
              </div>

           

              <div class="row mb-3">
                <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                <div class="col-md-8 col-lg-9">
                  <input name="email" type="email" class="form-control" id="Email" value="<?= $row['email'] ?>">
                </div>
              </div>

              

              <div class="text-center">
                <button type="submit" name="edit" class="btn btn-primary">Save Changes</button>
              </div>
            </form><!-- End Profile Edit Form -->


          </div>
        </div>

      </div>
    </div>
  </section>

</main><!-- End #main -->




<?php
include 'shared/footer.php';
include 'shared/script.php';

?>