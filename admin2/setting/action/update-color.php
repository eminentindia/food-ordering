<?php
session_start();
## Database configuration
include('../../controller/common-controller.php');


$conn = _connectodb();

$response = array();
$themecolor = safe_value($conn,$_POST['themecolor']);
$mainbtn = safe_value($conn,$_POST['mainbtn']);
$secondarybtn = safe_value($conn,$_POST['secondarybtn']);
$mobilenav = safe_value($conn,$_POST['mobilenav']);
$mobilenavtxt = safe_value($conn,$_POST['mobilenavtxt']);
$mobilenavlight = safe_value($conn,$_POST['mobilenavlight']);

$update_action = "UPDATE setting SET themecolor='$themecolor',mainbtn='$mainbtn',secondarybtn='$secondarybtn',mobilenav='$mobilenav',mobilenavtxt='$mobilenavtxt',mobilenavlight='$mobilenavlight' ";

$result = mysqli_query($conn, $update_action);

$response['success'] = true;
echo json_encode($response);
?>