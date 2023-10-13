<?php
session_start();
## Database configuration
include('../../controller/common-controller.php');


$conn = _connectodb();

$q = safe_value($conn,$_POST['q']);

$a = safe_value($conn,$_POST['a']);
$display_priority = safe_value($conn,$_POST['display_priority']);



$ID = $_POST['ID'];
    $update_action = "UPDATE faq SET q='$q',a='$a', display_priority='$display_priority' WHERE faq_id ='$ID' ";
    $result = mysqli_query($conn, $update_action);
    $_SESSION["Updatefaq"]="FAQ Updated Successfuly";
    header("location:../view-faq.php");

    ?>