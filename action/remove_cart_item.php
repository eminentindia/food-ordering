
<?php
session_start();
include('../admin/controller/common-controller.php');
$conn = _connectodb();
setTimeZone();
include('../function.inc.php');
include('../smtp/PHPMailerAutoload.php');
$getsetting = getsetting($conn);
$getsetting = json_decode($getsetting, true);
foreach ($getsetting as $getsinglesetting) {
    extract($getsinglesetting);
}
include('../admin/controller/constant.inc.php');
// Function to add items to the cart

if (isset($_POST['key'])) {
    $key = $_POST['key'];
    
    // Check if the cart and item with the given key exist
    if (isset($_SESSION['cart']) && isset($_SESSION['cart'][$key])) {
        // Remove the item from the cart
        unset($_SESSION['cart'][$key]);
    }
}