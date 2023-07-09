<?php
require_once 'config.php';
include '../app/functions.php';
require_once 'dbConnect.php';





$bus_number = $_SESSION['confirm_booking']['bus_num'];
$start_time = $_SESSION['confirm_booking']['start_time'];
$id_seat = $_SESSION['confirm_booking']['seat_booked'];

$host = "localhost";
$name = "root";
$password = '';
$db1 = "horus-project";

$conn = mysqli_connect("$host", "$name", "$password", "$db1");

if (isset($_SESSION['users'])) {
    $id = $_SESSION['users']['id'];
    $select = "SELECT * FROM users where id = $id";
    $s =  mysqli_query($conn, $select);
    $row = mysqli_fetch_assoc($s);

}

// Include the configuration file 
$payment_ref_id = $statusMsg = '';
$status = 'error';





// Check whether the payment ID is not empty 
if (!empty($_GET['pid'])) {
    $payment_txn_id  = base64_decode($_GET['pid']);

    // Fetch transaction data from the database 
    $sqlQ = "SELECT id,txn_id,paid_amount,paid_amount_currency,payment_status,customer_name,customer_email FROM transactions WHERE txn_id = ?";
    $stmt = $db->prepare($sqlQ);
    $stmt->bind_param("s", $payment_txn_id);
    $stmt->execute();
    $stmt->store_result();


    if ($stmt->num_rows > 0) {
        // Get transaction details 
        $stmt->bind_result($payment_ref_id, $txn_id, $paid_amount, $paid_amount_currency, $payment_status, $customer_name, $customer_email);
        $stmt->fetch();
        $status = 'success';
        $statusMsg = 'Your Payment has been Successful!';
    } else {
        $statusMsg = "Transaction has been failed!";
    }
} else {
    header("Location: payment-status.php");
    exit;
}



$ok = $_SESSION['okay']['ok'];

if ($ok == true) {

    $username = $_SESSION['confirm_booking']['user_name'];
    $id_bus = $_SESSION['confirm_booking']['bus_check'];
    $bus_number = $_SESSION['confirm_booking']['bus_num'];
    $pickup = $_SESSION['confirm_booking']['pickup'];
    $destination = $_SESSION['confirm_booking']['destination'];
    $salary = $_SESSION['confirm_booking']['salary'];
    $start_time = $_SESSION['confirm_booking']['start_time'];
    $id_seat = $_SESSION['confirm_booking']['seat_booked'];


    $insert1 = "INSERT INTO seats VALUES (null, $id_bus ,'$username','$pickup' , '$destination' , $bus_number , $id_seat ,'$start_time') ";
    $i1 = mysqli_query($conn, $insert1);

    $_SESSION['okay']['ok'] = false;
}



if (isset($_POST['signout'])) {
    session_unset();
    session_destroy();
    path('login.php');
}

auth(2);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="/Horus/assets/images/logo.jpeg" type="image/x-icon">
    <title>Hours | حورس</title>
    <link href="https://fonts.googleapis.com/css2?family=Clicker+Script&family=Inter:wght@400;700;800&family=Jost:wght@100;300;400;500;600&family=Kumbh+Sans:wght@400;700&family=Nanum+Gothic:wght@400;700;800&family=Overpass:wght@400;700&family=Plus+Jakarta+Sans:wght@200;300;400;600&family=Poppins:wght@400;500;600&family=Rajdhani:wght@300;400;500;600;700&family=Space+Grotesk:wght@400;600;700&display=swap" rel="stylesheet">
    <!-- cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">


        <?php if ($row['modeID'] == 1) : ?>
            <link rel="stylesheet" href="/Horus/payment/css/main.css">
        <?php else : ?>
            <link rel="stylesheet" href="/Horus/payment/css/light.css">
        <?php endif; ?>
    

    <link rel="stylesheet" href="bootstrap/bootstrap.css">
    <link rel="stylesheet" href="bootstrap-icons/bootstrap-icons.css">
</head>

<body>


    <!-- Start loading page -->
    <div class="loading-spiner">
        <span class="loader"></span>
    </div>
    <!-- End loading page -->



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
                <li class="nav-item ">
                  <a class="nav-link animate__animated animate__bounceInUp active" data-wow-delay="1s" href="/Horus/booking.php">Booking</a>
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
                  <img src="/Horus/Admin/assets/img/software-engineer.png" style="width: 30px;" alt="">
                  <span class="d-none d-md-block ps-2" style="color: #e45927;">Staf Only</span>

                </a>
                <a class="nav-link nav-profile d-flex align-items-center pe-0" href="/Horus/profile.php">
                  <img src="/Horus/assets/images/person.png" style="width: 30px;" alt="">
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

    <section class="payment p-5">


        <div class="overlay"></div>

        <div class="info text-center animate__animated animate__jackInTheBox" data-wow-delay="1s">
            <h1>Your Ticket</h1>
        </div>
        <div class="container col-lg-6">

            <div class="card  mb-3">
                <div class="row g-0">
                    <div class="col-md-3">
                        <img src="../assets/images/booking.jpg" class="img-fluid rounded-start" style="height: 200px;" alt="not found">
                    </div>
                    <div class="col-md-9">
                        <div class="card-body">
                            <?php if (!empty($payment_ref_id)) { ?>
                                <h6 class="<?php echo $status; ?> card-title"><?php echo $statusMsg; ?></h6>
                                <span><b class="text">Name:</b> <?php echo $customer_name; ?></span>
                                <br>
                                <span><b class="text">Email:</b> <?php echo $customer_email; ?></span>
                                <br>
                                <span><b class="text">Ticket:</b> <?php echo $itemName; ?></span>
                                <span><b class="text">Price:</b> <?php echo $itemPrice / 100 . ' ' . $currency; ?></span>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <span><b class="text">Bus Number:</b> <?php echo $bus_number; ?></span>
                                    </div>
                                    <div class="col-lg-6">
                                        <span><b class="text">Seat Number:</b> <?php echo $id_seat; ?></span>
                                    </div>
                                    <div class="col-lg-6">
                                        <span><b class="text">Start Time:</b> <?php echo $start_time; ?></span>
                                    </div>
                                    <div class="col-lg-12 text-center">
                                        <span><b class="text"> Please Take screenshot !</b></span>
                                    </div>
                                </div>

                            <?php } else { ?>
                                <h1 class="error">Your Payment been failed!</h1>
                                <p class="error"><?php echo $statusMsg; ?></p>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>



    <script src="jQuery/jquery-3.6.1.min.js"></script>
    <script src="bootstrap/bootstrap.bundle.js"></script>
    <script src="js/main.js"></script>

</body>

</html>