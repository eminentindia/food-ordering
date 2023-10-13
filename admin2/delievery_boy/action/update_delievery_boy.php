<?php
session_start();
## Database configuration
include('../../controller/common-controller.php');


$conn = _connectodb();
$name = safe_value($conn, $_POST['name']);
$mobile = safe_value($conn, $_POST['mobile']);

$ID = $_POST['ID'];


if (isset($_FILES['image']['name']) && $_FILES['image']['name'] != '') {

    $extn = explode('.', $_FILES["image"]["name"]);
    $rand = rand(1111, 9999);

    $str = str_replace(' ', '-', strtolower($name));
    $image   = $str . $rand . "." . $extn[1];


    $extn = explode('.', $_FILES["image"]["name"]);
    $rand = rand('1111', '9999');
    $image   = $rand . "." . $extn[1];
    $upath = "../../media/delievery_boy/" . $image;
    
    move_uploaded_file($_FILES["image"]["tmp_name"], $upath);
    

    $update_story = "UPDATE delievery_boy SET image='$image' WHERE ID ='$ID' ";


    $result_story     = mysqli_query($conn, $update_story);
}



    $update_action = "UPDATE delievery_boy SET name='$name', mobile='$mobile' WHERE ID ='$ID' ";
    echo $update_action;
    $result = mysqli_query($conn, $update_action);
    $_SESSION["Updatedelievery_boy"]="Delievery Boy Updated Successfuly";
    
     header("location:../view_delievery_boy.php");

     ?>