<?php
session_start();

## Database configuration
include('../../controller/common-controller.php');


$conn = _connectodb();
setTimeZone();
error_reporting(0);
$added_on = date("Y-m-d");
$coupon_code = safe_value($conn,$_POST['coupon_code']);
$coupon_value = safe_value($conn,$_POST['coupon_value']);
$cart_min_value = safe_value($conn,$_POST['cart_min_value']);
$coupon_type = safe_value($conn,$_POST['coupon_type']);

 $expired_on = safe_value($conn,$_POST['expired_on']);

$ID = $_POST['ID'];

if ($ID == '') {
    $sql = "select * from coupon where coupon='$coupon'";
} else {
    $sql = "select * from coupon where coupon='$coupon' and ID!='$ID'";
}
if (mysqli_num_rows(mysqli_query($conn, $sql)) > 0) {
    $_SESSION["couponexist"]="Coupon Already Exist ";
          header("location:../update-coupon.php?coupon_id=$ID");
}

else{
    $update_action = "UPDATE coupon SET coupon_code='$coupon_code',coupon_value='$coupon_value',cart_min_value='$cart_min_value',coupon_type='$coupon_type',expired_on='$expired_on' WHERE ID ='$ID' ";
    $result = mysqli_query($conn, $update_action);
    $_SESSION["Updatecoupon"]="coupon Updated Successfuly";
    
    header("location:../view-coupon.php");
}
