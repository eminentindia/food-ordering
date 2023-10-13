<?php
session_start();
## Database configuration
include('../../controller/common-controller.php');
$conn = _connectodb();
setTimeZone();
$added_on = date("Y-m-d");
// print_r($_POST);
// die();
$name = safe_value($conn, $_POST['registername']);
$email = safe_value($conn, $_POST['registeremail']);
$registerpassword = safe_value($conn, $_POST['registerpassword']);
$role = safe_value($conn, $_POST['role']);
$added_by = $_SESSION['ADMIN_EMAIL'];

$password = password_hash($registerpassword, PASSWORD_BCRYPT);
$sql = "INSERT into admin (
        admin_username,
        admin_email,
        admin_password,
		role,
		added_by,
		added_on
        )
        VALUES (
        '$name',
        '$email',
        '$password',
		'$role',
		'$added_by',
        '$added_on'
        )";
// echo $sql;
$result	= mysqli_query($conn, $sql);
$_SESSION["addadmin"] = "Admin Added Successfuly";
header("location:../view-admin.php");
