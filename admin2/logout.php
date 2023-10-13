
<?php
session_start();
include('controller/common-controller.php');
$conn = _connectodb();
include('setting/controller/setting-controller.php');
$getsetting = getsetting($conn);
$getsetting = json_decode($getsetting, true);
foreach ($getsetting as $getsinglesetting) {
    extract($getsinglesetting);
    // print_r($getsetting);
}
include('controller/constant.inc.php');
unset($_SESSION['ADMIN_LOGIN_ID']);
unset($_SESSION['ADMIN_EMAIL']);
unset($_SESSION['ADMIN_NAME']);
echo '<script>window.location.href="'.ADMIN_SITE_PATH.'";</script>';
?>