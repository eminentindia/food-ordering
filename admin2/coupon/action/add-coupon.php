<?php
session_start();
## Database configuration
include('../../controller/common-controller.php');

$conn = _connectodb();
setTimeZone();
$added_on = date("Y-m-d");
$coupon_code = safe_value($conn,$_POST['coupon_code']);
$coupon_value = safe_value($conn,$_POST['coupon_value']);
$cart_min_value = safe_value($conn,$_POST['cart_min_value']);
$coupon_type = safe_value($conn,$_POST['coupon_type']);
$expired_on = safe_value($conn,$_POST['expired_on']);

$sel = "select * from coupon where coupon_code='$coupon_code'";
if (mysqli_num_rows(mysqli_query($conn, $sel)) > 0) {
		  $_SESSION["couponexist"]="Coupon Code $code Already Exist";
		  header("location:../add-coupon.php");
} 

else{
	$sql = "INSERT into coupon (
		coupon_code,
		coupon_value,
		cart_min_value,
		coupon_type,
		expired_on,
		status,
		added_on
		)
		VALUES (
		'$coupon_code',
		'$coupon_value',
		'$cart_min_value',
		'$coupon_type',
		'$expired_on',
		'1',
		'$added_on'
		)";
		// echo $sql;
$result	= mysqli_query($conn, $sql);


$_SESSION["Addcoupon"]="Coupon Added Successfuly";
header("location:../view-coupon.php");

}
