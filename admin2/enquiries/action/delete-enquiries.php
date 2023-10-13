<?php
include('../../controller/common-controller.php');
$conn = _connectodb();
if(isset($_POST['delete_btn_set']))
{
    $del=safe_value($conn,$_POST['delete_id']);
    $delete_attachment=safe_value($conn,$_POST['delete_attachment']);
    mysqli_query($conn, "delete from enquiries where ID='$del'");
    $path='../../media/enquiries/'.$delete_attachment;
    unlink($path);
}

?>

