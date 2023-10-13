<?php
date_default_timezone_set("Asia/Calcutta");

session_start();
$session = session_id();
$time = time();
$time_check = $time - 1800;
$timeout_duration = 1800;
$sql = "DELETE FROM user_online WHERE time<$time_check";
$result = $conn->query($sql);
if (isset($_SESSION['LAST_ACTIVITY']) && ($time - $_SESSION['LAST_ACTIVITY']) > $timeout_duration) {
    session_unset();
    session_destroy();
    header("location:index.php?problem=Session Timeout Please Login Again");
} elseif (isset($_SESSION['ADMIN_LOGIN_ID']) and $_SESSION['admin_name'] != "") {
    $sql = "SELECT * FROM user_online WHERE session='$session'";
    $result = $conn->query($sql);
    $count = mysqli_num_rows($result);
    $name = $_SESSION['admin_name'];
    $userID = $_SESSION['ADMIN_LOGIN_ID'];
    if ($count == "0") {
        $sql = "INSERT INTO user_online (session, time, name,userID) VALUES('$session', '$time', '$name','$userID')";
        $result = $conn->query($sql);
    } else {
        $sql = "UPDATE user_online SET time='$time', name='$name',userID='$userID' WHERE session = '$session'";
        $result = $conn->query($sql);
    }
    $_SESSION['LAST_ACTIVITY'] = $time;
} else {
    echo "<meta http-equiv='refresh' content='0; url=index.php'>.";
    die();
}
