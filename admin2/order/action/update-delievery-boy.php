<?php
session_start();
include('../../controller/common-controller.php');
$conn = _connectodb();

$response = array();

if(isset($_POST['delivery_boy'])){
    $delivery_boy = safe_value($conn,$_POST['delivery_boy']);
    $order_ID = safe_value($conn,$_POST['order_ID']);

    mysqli_query($conn,"update orders set delievery_boy_id='$delivery_boy' where ID='$order_ID'");
    
    $response['success'] = true;
}

echo json_encode($response);
?>