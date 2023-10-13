<?php

include('../../controller/common-controller.php');
$conn = _connectodb();

if(isset($_POST['delete_btn_set']))
{
    $del=safe_value($conn,$_POST['delete_id']);
    mysqli_query($conn, "delete from faq where faq_id='$del'");
}

?>

