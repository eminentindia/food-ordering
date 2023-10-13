<?php

include('../../controller/common-controller.php');
$conn = _connectodb();

if (isset($_POST['delete_btn_set'])) {
    $del = safe_value($conn, $_POST['delete_id']);
    $delimg = safe_value($conn, $_POST['delete_image']);
    mysqli_query($conn, "delete from dish where ID='$del'");

    mysqli_query($conn, "delete from images where dish_id='$del'");
    mysqli_query($conn, "delete from dish_details where dish_id='$del'");
    $aa = "select * from images where dish_id='$del'";
    $bb = mysqli_query($conn, $aa);
    while ($row = mysqli_fetch_assoc($bb)) {
        $galleryimg = $row['image'];
        $path = "../../media/dish/" . $galleryimg;
        unlink($path);
    }

    $path = "../../media/dish/" . $delimg;
    unlink($path);
}

if (isset($_POST['checkbox'][0])) {
    foreach ($_POST['checkbox'] as $list) {
        $id = mysqli_real_escape_string($conn, $list);
        mysqli_query($conn, "delete from dish where ID = '$id'");
        $path = "../../media/dish/" . $id;
        unlink($path);
    }
}
