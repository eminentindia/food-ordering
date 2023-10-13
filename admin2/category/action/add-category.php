<?php
session_start();
## Database configuration
include('../../controller/common-controller.php');

$conn = _connectodb();
setTimeZone();
$added_on = date("Y-m-d");
$category = safe_value($conn,$_POST['category']);
$slug = str_replace(' ', '-', strtolower($category));

$order_number = safe_value($conn,$_POST['order_number']);
$extn = explode('.', $_FILES["image"]["name"]);
$str = str_replace(' ', '-', strtolower($category));
$image   = $str . "." . $extn[1];
$upath = "../../media/category/" . $image;

move_uploaded_file($_FILES["image"]["tmp_name"], $upath);

$sel = "select * from category where category='$category'";
if (mysqli_num_rows(mysqli_query($conn, $sel)) > 0) {
		  $_SESSION["categoryexist"]="Category $category Already Exist";
		  header("location:../add-category.php");
} 
else{
	$sql = "INSERT into category (
		category,
		slug,
		order_number,
		image,
		status,
		added_on
		)
		VALUES (
		'$category',
		'$slug',
		'$order_number',
		'$image',
		'1',
		'$added_on'
		)";
$result	= mysqli_query($conn, $sql);


$_SESSION["AddCategory"]="Category Added Successfuly";
header("location:../view-category.php");

}
