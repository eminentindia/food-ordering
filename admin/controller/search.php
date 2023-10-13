<?php
include('../controller/common-controller.php');
include('../connect/session.php');
$getsetting = getsetting($conn);
$getsetting = json_decode($getsetting, true);
foreach ($getsetting as $getsinglesetting) {
    extract($getsinglesetting);
}
$response = array();
$directory = '../../';
$searchElement = '<div data-kt-search-element="main">';

$searchTerm = isset($_GET['q']) ? $_GET['q'] : '';

$phpFiles = glob($directory . '/*.php');


foreach ($phpFiles as $phpFile) {
    $content = file_get_contents($phpFile);
    if (strpos($content, $searchElement) !== false && stripos($content, $searchTerm) !== false) {
        $response[] = $phpFile;
    }
}

// Sending the JSON response
header('Content-Type: application/json');
echo json_encode($response);
