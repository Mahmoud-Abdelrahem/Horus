<?php

session_start();
if (isset($_SESSION['users'])) {
    $id = $_SESSION['users']['id'];

    $selectOne = "SELECT * FROM users where id =$id";
    $sOne =  mysqli_query($conn, $selectOne);
    $row = mysqli_fetch_assoc($sOne);
}


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
    <!-- css Files -->
    <link rel="stylesheet" href="/Horus/assets/vendor/bootstrap/bootstrap.css">
    <link href="/Horus/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="/Horus/assets/css/all.min.css">
    <link rel="stylesheet" href="/Horus/assets/vendor/wow/animate.min.css">
    <link rel="stylesheet" href="/Horus/assets/vendor/light box/lightbox.min.css">
    <link rel="stylesheet" href="/Horus/assets/css/normalize.css">

    <?php if (isset($_SESSION['users'])) : ?>
        <?php if ($row['modeID'] == 1) : ?>
            <link rel="stylesheet" href="/Horus/assets/css/dark.css">
        <?php else : ?>
            <link rel="stylesheet" href="/Horus/assets/css/light.css">
        <?php endif; ?>
    <?php else : ?>
        <link rel="stylesheet" href="/Horus/assets/css/main.css">
    <?php endif; ?>


   
</head>

<body class="dark">