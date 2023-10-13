

<?php
session_start();
include('../admin/controller/common-controller.php');
include('../function.inc.php');
include('../smtp/PHPMailerAutoload.php');
$conn = _connectodb();
setTimeZone();
$getsetting = getsetting($conn);
$getsetting = json_decode($getsetting, true);
foreach ($getsetting as $getsinglesetting) {
    extract($getsinglesetting);
}
echo $totalcartcount = getTotalCartCount();