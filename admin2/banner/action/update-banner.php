<?php
session_start();
## Database configuration
include('../../controller/common-controller.php');
$conn = _connectodb();
$altArr = $_POST['alt_attr'];
foreach ($altArr as $key => $val) {
    $attribute = $val;
    $extn = explode('.', $_FILES["image_attr"]["name"][$key]);
    $rand = rand(111, 999);
    $image   = $attribute . "." . $extn[1];
    // echo '<pre>';
    // print_r($_POST);
    // echo $image;
    // die();
    mysqli_query($conn, "insert into banner(image,alt) values('$image','$attribute')");
    $path = "../../media/banner/" . $image;
    move_uploaded_file($_FILES["image_attr"]["tmp_name"][$key], $path);
}
echo '<script>window.location.href = "../banner.php";</script>';
?>