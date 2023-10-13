<?php
session_start();
## Database configuration
include('../../controller/common-controller.php');
$conn = _connectodb();

$oldfav=$_POST['oldfav'];
$extn = explode('.', $_FILES["fav"]["name"]);
$rand = rand(1111, 9999);
$str = str_replace(' ', '-', strtolower($dish));
$fav   = 'fav'."." . $extn[1];
 
$opath="../../images/".$oldfav;
unlink($opath);

$path = "../../images/" . $fav;
move_uploaded_file($_FILES["fav"]["tmp_name"], $path);
$update_action = "UPDATE setting SET fav='$fav'";
$result = mysqli_query($conn, $update_action);

header('Location:../settings.php');

?>