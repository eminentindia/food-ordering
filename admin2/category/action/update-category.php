<?php
session_start();
## Database configuration
include('../../controller/common-controller.php');


$conn = _connectodb();

$category = safe_value($conn,$_POST['category']);

$order_number = safe_value($conn,$_POST['order_number']);

$slug = str_replace(' ', '-', strtolower($category));

$ID = $_POST['ID'];



if ($ID == '') {
    $sql = "select * from category where category='$category'";
} else {
    $sql = "select * from category where category='$category' and ID!='$ID'";
}
if (mysqli_num_rows(mysqli_query($conn, $sql)) > 0) {
    $_SESSION["categoryexist"]="Category Already Exist ";
          header("location:../update-category.php?category_id=$ID");
}

else{
    $update_action = "UPDATE category SET category='$category',slug='$slug', order_number='$order_number' WHERE ID ='$ID' ";
    $result = mysqli_query($conn, $update_action);
    $_SESSION["UpdateCategory"]="Category Updated Successfuly";
    
    header("location:../view-category.php");
}


if (isset($_FILES['image']['name']) && $_FILES['image']['name'] != '') {

    $extn = explode('.', $_FILES["image"]["name"]);
    $str = str_replace(' ', '-', strtolower($category));
    $image   = $str . "." . $extn[1];
    $upath = "../../media/category/" . $image;
    
    move_uploaded_file($_FILES["image"]["tmp_name"], $upath);

    $update_story = "UPDATE category SET image='$image' WHERE ID ='$ID' ";


    $result_story     = mysqli_query($conn, $update_story);
}




?>