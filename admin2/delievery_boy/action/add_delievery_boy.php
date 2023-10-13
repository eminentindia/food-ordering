<?php
session_start();
## Database configuration
include('../../controller/common-controller.php');

$conn = _connectodb();
setTimeZone();
$added_on = date("Y-m-d");
$name = safe_value($conn, $_POST['name']);
$mobile = safe_value($conn, $_POST['mobile']);
$password = safe_value($conn, $_POST['password']);

$password = password_hash($password, PASSWORD_BCRYPT);

$extn = explode('.', $_FILES["image"]["name"]);
$rand = rand('1111', '9999');
$image   = $rand . "." . $extn[1];
$upath = "../../media/delievery_boy/" . $image;
move_uploaded_file($_FILES["image"]["tmp_name"], $upath);
$sql = "INSERT into delievery_boy (
		name,
		mobile,
		image,password,
		status,
		added_on
		)
		VALUES (
		'$name',
		'$mobile',
		'$image',
		'$password',
		'1',
		'$added_on'
		)";
$result	= mysqli_query($conn, $sql);
$_SESSION["success"] = "Delievery Boy Added Successfuly";
header("location:../view_delievery_boy.php");
