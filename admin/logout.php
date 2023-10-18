<?php
// Starting session
	session_start();
	$session=session_id();
	require_once('controller/common-controller.php');
	$sql="DELETE FROM user_online WHERE session='$session'";
	$result = $conn->query($sql);	
	session_unset(); 
	session_destroy();
	header("location:index.php");
?>