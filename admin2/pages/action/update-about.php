<?php
session_start();
## Database configuration
include('../../controller/common-controller.php');
$conn = _connectodb();
$heading = safe_value($conn,$_POST['heading']);
$description = safe_value($conn,$_POST['description']);
    $update_action = "UPDATE about SET heading='$heading',description='$description' ";
    $result = mysqli_query($conn, $update_action);
    if (isset($_FILES['image']['name']) && $_FILES['image']['name'] != '') {

        $extn = explode('.', $_FILES["image"]["name"]);
      
        $image   = 'about-us' . "." . $extn[1];
        $upath = "../../media/about/" . $image;
        move_uploaded_file($_FILES["image"]["tmp_name"], $upath);
        $update = "UPDATE about SET image='$image' ";
        $result = mysqli_query($conn, $update);
    }
    
    $_SESSION["Updateabout"]="About Updated !";
    header("location:../about.php");
