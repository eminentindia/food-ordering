<?php
include('../controller/common-controller.php');
include('../connect/session.php');
$getsetting = getsetting($conn);
$getsetting = json_decode($getsetting, true);
foreach ($getsetting as $getsinglesetting) {
    extract($getsinglesetting);
}
$response = array();
if (isset($_POST['get_logo'])) {
    $response['status'] = 'html';
    $response['message'] = '<img src="' . $logo . '" alt="' . $portal_name . '" class="img-thumbnail" loading="lazy" width="80px">';
}

if (isset($_POST['get_fav'])) {
    $response['status'] = 'html';
    $response['message'] = '<img src="' . $fav . '" alt="' . $portal_name . '" class="img-thumbnail" loading="lazy" width="80px">';
}
// Sending the JSON response
header('Content-Type: application/json');
echo json_encode($response);
