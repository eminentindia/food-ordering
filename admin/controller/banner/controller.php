<?php
include('../../controller/common-controller.php');
include('../../connect/session.php');
$getsetting = getsetting($conn);
$getsetting = json_decode($getsetting, true);
foreach ($getsetting as $getsinglesetting) {
    extract($getsinglesetting);
}
include('../../controller/constant.inc.php');
$response = array();

if (isset($_POST['alt_attr'])) {
    $altArr = $_POST['alt_attr'];
    $banner_linkArr= $_POST['banner_link'];
    foreach ($altArr as $key => $val) {
        $attribute = mysqli_real_escape_string($conn, $val);
        $banner_link = $banner_linkArr[$key];
        $extn = pathinfo($_FILES["image_attr"]["name"][$key], PATHINFO_EXTENSION);
        $rand = rand(111, 999);
        $image =  $attribute . $rand . "." . $extn;
        // Insert data into the database using prepared statements
        $stmt = mysqli_prepare($conn, "INSERT INTO banner (image, alt, banner_link) VALUES (?, ?, ?)");
        mysqli_stmt_bind_param($stmt, "sss", $image, $attribute, $banner_link);

        if (mysqli_stmt_execute($stmt)) {
            $path = "../../media/banner/" . $image;
            if (move_uploaded_file($_FILES["image_attr"]["tmp_name"][$key], $path)) {
                echo '<script>window.location.href = "' . SITE_PATH . 'admin/banner.php";</script>';
            } else {
                echo '<script>window.location.href = "' . SITE_PATH . 'admin/banner.php";</script>';
            }
        } else {
            echo '<script>window.location.href = "../banner.php";</script>';
        }
    }
}


if (isset($_POST['PhotoId']) &&  $_POST['Image']) {
    $PhotoId = $_POST['PhotoId'];
    $Image = $_POST['Image'];
    $sql = "DELETE from banner where ID = '$PhotoId'";
    $result = mysqli_query($conn, $sql);
    $image = "../../media/banner/" . $Image;
    unlink($image);
    $response['status'] = 'success';
    $response['message'] = 'Banner Deleted !!';
    // Sending the JSON response
    header('Content-Type: application/json');
    echo json_encode($response);
}
