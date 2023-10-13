<?php
session_start();
## Database configuration
include('../../controller/common-controller.php');
$conn = _connectodb();
$response = array();
$cart_min_price = safe_value($conn,$_POST['cart_min_price']);
$website_path = safe_value($conn,$_POST['website_path']);
$cart_min_price_msg = safe_value($conn,$_POST['cart_min_price_msg']);
$website_close = safe_value($conn,$_POST['website_close']);
$website_close_msg = safe_value($conn,$_POST['website_close_msg']);
$wallet_amount = safe_value($conn,$_POST['wallet_amount']);
$referral_amount = safe_value($conn,$_POST['referral_amount']);
$ID = $_POST['ID'];
$update_action = "UPDATE setting SET website_path='$website_path',cart_min_price='$cart_min_price',cart_min_price_msg='$cart_min_price_msg', website_close='$website_close',website_close_msg='$website_close_msg',wallet_amount='$wallet_amount',referral_amount='$referral_amount' WHERE setting_id ='$ID' ";
$result = mysqli_query($conn, $update_action);
$response['success'] = true;
echo json_encode($response);
?>