<?php
session_start();
## Database configuration
include('../../controller/common-controller.php');

$conn = _connectodb();
setTimeZone();
$q = safe_value($conn,$_POST['q']);
$a = safe_value($conn,$_POST['a']);
$display_priority = safe_value($conn,$_POST['display_priority']);


$sel = "select * from faq where display_priority='$display_priority'";
if (mysqli_num_rows(mysqli_query($conn, $sel)) > 0) {
		  $_SESSION["display_priorityExist"]="Display Priority Already Exist";
		  header("location:../add-faq.php");
} 

else{
	$sql = "INSERT into faq (
		q,
		a,
		display_priority
		)
		VALUES (
		'$q',
		'$a',
		'$display_priority'
		)";
$result	= mysqli_query($conn, $sql);


$_SESSION["Addfaq"]="FAQ Added !";
header("location:../view-faq.php");

}
