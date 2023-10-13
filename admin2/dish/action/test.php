<?php

include('../../controller/common-controller.php');
$conn = _connectodb();

    // $del = safe_value($conn, $_POST['delete_id']);
    // $delimg = safe_value($conn, $_POST['delete_image']);
    // mysqli_query($conn, "delete from dish where ID='$del'");

    mysqli_query($conn, "delete from images where dish_id='9'");
    $aa = "select * from images where dish_id='9'";
    $bb = mysqli_query($conn, $aa);
    while ($row = mysqli_fetch_assoc($bb)) {

     $galleryimg = $row['image'];
     $path = "../../media/dish/" . $galleryimg;
     unlink($path);
    }




    // $path = "../../media/dish/" . $delimg;
    // unlink($path);


    ?>