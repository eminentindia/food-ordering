<?php
session_start();
## Database configuration
include('../../controller/common-controller.php');


$conn = _connectodb();

$response = array();
$smtp_email = safe_value($conn,$_POST['smtp_email']);
$smtp_password = safe_value($conn,$_POST['smtp_password']);

$update_action = "UPDATE setting SET smtp_email='$smtp_email',smtp_password='$smtp_password'";

$result = mysqli_query($conn, $update_action);

$response['success'] = true;
echo json_encode($response);
?>