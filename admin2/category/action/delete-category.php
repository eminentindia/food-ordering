<?php

include('../../controller/common-controller.php');
$conn = _connectodb();

if(isset($_POST['delete_btn_set']))
{
    $del=safe_value($conn,$_POST['delete_id']);
    $delimg=safe_value($conn,$_POST['delete_image']);
    mysqli_query($conn, "delete from category where ID='$del'");
    $path="../../media/category/".$delimg;
    unlink($path);
}

?>

