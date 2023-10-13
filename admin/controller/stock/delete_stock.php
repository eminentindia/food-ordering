<?php
session_start();
require_once('../../connect/connection.php');
require_once('../../connect/functions.php');
$getsetting = getsetting($link);
$getsetting = json_decode($getsetting, true);
foreach ($getsetting as $getsinglesetting) {
    extract($getsinglesetting);
}
$response = array();
try {
    if (isset($_POST['id']) != '') {
        $id = mysqli_real_escape_string($link, $_POST['id']);
        $deletekro = deletekro($link, 'admin', 'WHERE admin_id="' . $id . '"');
        if ($deletekro) {
            $response['status'] = 'success';
            $response['message'] = 'SUCCESS !!';
        } else {
            $response['status'] = 'success';
            $response['message'] = 'FAILED TO DELETE !!';
        }
    }
    else{
        $response['status'] = 'success';
        $response['message'] = 'UNKNOWN REQUEST !!';
    }
} catch (\Throwable $th) {
    $response['status'] = 'success';
    $response['message'] = 'FAILED TO DELETE !!';
}

header('Content-Type: application/json');
echo json_encode($response);
