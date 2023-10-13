<?php
session_start();
## Database configuration
include('../../controller/common-controller.php');


$conn = _connectodb();
setTimeZone();

$type = safe_value($conn,$_POST['type']);

$ID = $_POST['ID'];
if (isset($_FILES['image']['name'])&& $_FILES['image']['name']!='') {

    $extn = explode('.', $_FILES["image"]["name"]);
    $rand=rand(1111,9999);
    $image   ='banner' . $rand . "." . $extn[1];
  
	$upath="../../media/banners/".$image;

	move_uploaded_file($_FILES["image"]["tmp_name"],$upath);
	
	 $update_story="UPDATE login_banner SET image='$image' WHERE ID ='$ID' ";

     
	$result_story 	= mysqli_query($conn, $update_story);
}

    $update_action = "UPDATE login_banner SET type='$type' WHERE ID ='$ID' ";

    // echo $update_action;
    // die();
    $result = mysqli_query($conn, $update_action);
    $_SESSION["Updatelogin_banner"]="Banner Updated Successfuly";
    
    // echo $update_action;
    // die();

    header("location:../view_login_banner.php");

?>