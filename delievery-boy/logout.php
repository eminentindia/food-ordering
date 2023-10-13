
<?php
session_start();
include('controller/common-controller.php');
unset($_SESSION['DELIEVERY_BOY_LOGIN_ID']);
unset($_SESSION['DELIEVERY_BOY_MOBILE']);
echo '<script>window.location.href="'.SITE_PATH.'delievery-boy/index.php";</script>';
?>