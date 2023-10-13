<?php

include('../../controller/common-controller.php');
$conn = _connectodb();

$response = array();


if (isset($_POST['PhotoId']) &&  $_POST['Image']) {
    $PhotoId = $_POST['PhotoId'];
    $Image = $_POST['Image'];
    $sql = "Delete from images where image_id = '$PhotoId'";
    $result = mysqli_query($conn, $sql);
    $image = "../../media/dish/" . $Image;
    unlink($image);
    $response['error'] = false;
    $response['message'] = "Photo Deleted";
} else {
    $response['error'] = true;
    $response['message'] = "There is some technical error, kindly try after some time !";
}
echo json_encode($response);
