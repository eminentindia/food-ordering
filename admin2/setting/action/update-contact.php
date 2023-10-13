<?php
session_start();
## Database configuration
include('../../controller/common-controller.php');


$conn = _connectodb();

$response = array();
$site_address = safe_value($conn,$_POST['site_address']);
$site_phone = safe_value($conn,$_POST['site_phone']);
$site_email = safe_value($conn,$_POST['site_email']);
$opening_hours = safe_value($conn,$_POST['opening_hours']);
$tagline = safe_value($conn,$_POST['tagline']);

$update_action = "UPDATE setting SET site_address='$site_address',site_phone='$site_phone',site_email='$site_email',opening_hours='$opening_hours',tagline='$tagline' ";

$result = mysqli_query($conn, $update_action);

$response['success'] = true;
echo json_encode($response);
?>