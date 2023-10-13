<?php
session_start();
include('../../connection.php');
include('../../functions.php');



if (isset($_POST['hr_Ack'])) {
    $hr_Ack = mysqli_real_escape_string($link, $_POST['hr_Ack']);
    if ($hr_Ack != '') {
        $name = $_SESSION['admin_name'];
        $today = date('Y-m-d');
        $sql = "UPDATE attendence SET hr_acknowledgement='$hr_Ack' WHERE id='" . $_POST['id'] . "'";
        mysqli_query($link, $sql);
        echo 'done';
    } else {
        echo 'fail';
    }
} 

if (isset($_POST['review'])) {
    $review = mysqli_real_escape_string($link, $_POST['review']);
    if ($review != '') {
        $name = $_SESSION['admin_name'];
        $today = date('Y-m-d');
        $sql = "UPDATE attendence SET review='$review' WHERE id='" . $_POST['id'] . "'";
        mysqli_query($link, $sql);
        echo 'done';
    } else {
        echo 'fail';
    }
} 