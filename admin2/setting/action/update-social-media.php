<?php
session_start();
## Database configuration
include('../../controller/common-controller.php');


$conn = _connectodb();

$response = array();
$instagram = safe_value($conn,$_POST['instagram']);
$facebook = safe_value($conn,$_POST['facebook']);
$twitter = safe_value($conn,$_POST['twitter']);
$youtube = safe_value($conn,$_POST['youtube']);

$update_action = "UPDATE setting SET instagram='$instagram',facebook='$facebook',twitter='$twitter',youtube='$youtube' ";

$result = mysqli_query($conn, $update_action);

$response['success'] = true;
echo json_encode($response);
?>