<?php
session_start();
## Database configuration
include('../../controller/common-controller.php');


$conn = _connectodb();


$alt = $_POST['alt'];
if (isset($_FILES['image']['name']) && $_FILES['image']['name'] != '') {

    $old_img = $_POST['old_img'];


    $extn = explode('.', $_FILES["image"]["name"]);
    $rand = rand(1111, 9999);
    $image   = $alt . "." . $extn[1];
    $upath = "../../media/gallery/" . $image;


     $path = "../../media/gallery/" . $old_img;
     unlink($path);

    move_uploaded_file($_FILES["image"]["tmp_name"], $upath);
    $update_story = "UPDATE gallery SET image='$image' ";
    echo $update_story;
    $result_story     = mysqli_query($conn, $update_story);
    $_SESSION['success_gallery'] = " <script>Swal.fire(
        '',
        'gallery Updated !',
        'success'
    )</script>";
    header("location:../gallery.php");
} else {
    $update_story = "UPDATE gallery SET alt='$alt' ";
    $result_story     = mysqli_query($conn, $update_story);
    $_SESSION['success_gallery'] = " <script>Swal.fire(
        '',
        'gallery Updated !',
        'success'
    )</script>";
    header("location:../gallery.php");
}

?>