<?php 
 
// Product Details 
// Minimum amount is $0.50 US 
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$username = $_SESSION['confirm_booking']['user_name'];
$id_bus = $_SESSION['confirm_booking']['bus_check'];
$bus_number = $_SESSION['confirm_booking']['bus_num'];
$pickup = $_SESSION['confirm_booking']['pickup'];
$destination = $_SESSION['confirm_booking']['destination'];
$salary = $_SESSION['confirm_booking']['salary'];
$start_time = $_SESSION['confirm_booking']['start_time'];
$id_seat = $_SESSION['confirm_booking']['seat_booked'];

$itemName = "Ticket From $pickup To $destination " ; 
$itemPrice = $salary *100;  
$currency = "EGP";  

// print_r($itemName);
// print_r($itemPrice);
// print_r($currency);
/* Stripe API configuration 
 * Remember to switch to your live publishable and secret key in production! 
 * See your keys here: https://dashboard.stripe.com/account/apikeys 
 */ 
define('STRIPE_API_KEY', 'sk_test_51NLaQvE0W0knjkX5iyM3qJuyd3ds73B2eWCC5MQKOjRioYx9vQP42FDCamhFeJUpZ56FCAR681HfKeGedUMJgqtg00cufK3nUb'); 
define('STRIPE_PUBLISHABLE_KEY', 'pk_test_51NLaQvE0W0knjkX5SRZovNta1nkUmvmu36AFxG9UaedcrJUDXsBxGfhZgDBtj28ZMg7w4aMAMfm0GS7rCmqUdB0f00qzy5kBGw'); 
  
// Database configuration  
define('DB_HOST', 'localhost');  
define('DB_USERNAME', 'root');  
define('DB_PASSWORD', '');  
define('DB_NAME', 'horus-project');
?>