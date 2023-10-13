
<?php
session_start();
include('../admin/controller/common-controller.php');
include('../function.inc.php');
$conn = _connectodb();
setTimeZone();

$uid = $_SESSION['ATECHFOOD_USER_ID'];


$response = array();
if (isset($_POST['profile']) == 'profile') {
    $name = safe_value($conn, $_POST['name']);

    $_SESSION['name'] = $name;

    $profile = safe_value($conn, $_POST['profile']);

    $address = safe_value($conn, $_POST['address']);
    $appartment = safe_value($conn, $_POST['appartment']);
    $postcode = safe_value($conn, $_POST['postcode']);
    $city = safe_value($conn, $_POST['city']);


    $sql = "update users set name='$name',  address='$address', appartment='$appartment', postcode='$postcode' , city='$city' where ID='$uid'";
    $result  = mysqli_query($conn, $sql);
    $response['success'] = true;
    echo json_encode($response);
}




?>