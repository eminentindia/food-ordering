<?php
session_start();
## Database configuration
include('../../controller/common-controller.php');


$conn = _connectodb();

$order = safe_value($conn,$_POST['order']);

$order_number = safe_value($conn,$_POST['order_number']);

$slug = str_replace(' ', '-', strtolower($order));

$ID = $_POST['ID'];



if ($ID == '') {
    $sql = "select * from order where order='$order'";
} else {
    $sql = "select * from order where order='$order' and ID!='$ID'";
}
if (mysqli_num_rows(mysqli_query($conn, $sql)) > 0) {
    $_SESSION["orderexist"]="order Already Exist ";
          header("location:../update-order.php?order_id=$ID");
}

else{
    $update_action = "UPDATE order SET order='$order',slug='$slug', order_number='$order_number' WHERE ID ='$ID' ";
    $result = mysqli_query($conn, $update_action);
    $_SESSION["Updateorder"]="order Updated Successfuly";
    
    header("location:../view-order.php");
}


if (isset($_FILES['image']['name']) && $_FILES['image']['name'] != '') {

    $extn = explode('.', $_FILES["image"]["name"]);
    $str = str_replace(' ', '-', strtolower($order));
    $image   = $str . "." . $extn[1];
    $upath = "../../media/order/" . $image;
    
    move_uploaded_file($_FILES["image"]["tmp_name"], $upath);

    $update_story = "UPDATE order SET image='$image' WHERE ID ='$ID' ";


    $result_story     = mysqli_query($conn, $update_story);
}




?>