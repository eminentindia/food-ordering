
<?php
session_start();
include "../admin/controller/common-controller.php";
include "../function.inc.php";
$conn = _connectodb();
setTimeZone();

if (isset($_POST["numbers"])) {
    $referral_code = bin2hex(random_bytes(6));
    $token = bin2hex(random_bytes(15));
    $numbers = mysqli_real_escape_string($conn, $_POST["numbers"]);
    $loginmobile = mysqli_real_escape_string($conn, $_POST["loginmobile"]);
    $cod_otp = $_SESSION["cod_otp"];
    if ($numbers === $cod_otp) {
        $sel = "SELECT * FROM users WHERE mobile='$loginmobile'";
        $result = mysqli_query($conn, $sel);
        if (mysqli_num_rows($result) > 0) {
            $q = mysqli_fetch_assoc($result);
            $uid = $q["ID"];
        } else {
            $ins = "INSERT INTO users (
        name,
        mobile,
        referral_code,
        referral_from,
        token,
        status
        )
        VALUES (
        'guest',
        '$loginmobile',
        '$referral_code',
        '',
        '$token',
        'active'
        )";
            mysqli_query($conn, $ins);
            $uid = mysqli_insert_id($conn);
        }

        if ($uid) {
            $_SESSION["ATECHFOOD_USER_ID"] = $uid;
            $_SESSION["ATECHFOOD_USER"] = "yes";
            $_SESSION["name"] = "guest";
            $_SESSION["ATECHFOOD_USER_MOBILE"] = $loginmobile;
            echo "success";
        }
    } else {
        echo "fail";
    }
}

