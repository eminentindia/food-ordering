<?php
session_start();
## Database configuration
include('../../controller/common-controller.php');
$conn = _connectodb();

$oldlogo=$_POST['oldlogo'];
$extn = explode('.', $_FILES["logo"]["name"]);
// $rand = rand(1111, 9999);
// $str = str_replace(' ', '-', strtolower($dish));
$logo   = 'logo'."." . $extn[1];
 
$opath="../../../images/logo/".$oldlogo;
unlink($opath);

$path = "../../../images/logo/" . $logo;
move_uploaded_file($_FILES["logo"]["tmp_name"], $path);
$update_action = "UPDATE setting SET logo='$logo'";
$result = mysqli_query($conn, $update_action);
// 
// header('Location:../settings.php');

?>