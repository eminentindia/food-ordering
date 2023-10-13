<?php
session_start();
include('function.inc.php');
unset($_SESSION['ATECHFOOD_USER']);
unset($_SESSION['ATECHFOOD_USER_ID']);
unset($_SESSION['email']);
unset($_SESSION['name']);
header('Location: '.$_SERVER['HTTP_REFERER']);  

?>
