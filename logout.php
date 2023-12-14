<?php
session_start();
include('function.inc.php');
unset($_SESSION['ATECHFOOD_USER']);
unset($_SESSION['ATECHFOOD_USER_ID']);
unset($_SESSION['email']);
unset($_SESSION['name']);

setcookie("ATECHFOOD_USER_ID", "", time() - 3600, "/");
setcookie("ATECHFOOD_USER", "", time() - 3600, "/");
setcookie("name", "", time() - 3600, "/");
setcookie("ATECHFOOD_USER_MOBILE", "", time() - 3600, "/");

header('Location: '.$_SERVER['HTTP_REFERER']);  

?>
