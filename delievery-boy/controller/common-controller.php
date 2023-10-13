<?php 
$servername = "localhost";$dbusername ="root";$password = "";
$dbname = "food_ordering";
error_reporting(E_ALL);
function _connectodb()
{
	global $dbname;
	global $servername;
	global $dbusername;
	global $password;
	$connect = new mysqli($servername,$dbusername,$password,$dbname);
	if($connect->connect_error) 
	{
		print_r("Connection Error: " . $connect->connect_error);
		return false;
	}
	else
	{
		return $connect;
	}
}
function setTimeZone()
{
	date_default_timezone_set('Asia/Kolkata');
}

function safe_value($conn,$str){
	if($str!=''){
		$str=trim($str);
		return mysqli_real_escape_string($conn,$str);
	}
}

define('SERVER_PATH',$_SERVER['DOCUMENT_ROOT'].'/ecom2/admin/');
define('SITE_PATH','http://localhost/food-ordering/');
define('ADMIN_SITE_PATH','http://localhost/food-ordering/admin/');

define('PRODUCT_IMAGE_SERVER_PATH',SERVER_PATH.'images');
define('PRODUCT_IMAGE_SITE_PATH',SITE_PATH.'admin/media/dish/');




?>