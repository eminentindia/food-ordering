
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
            $username = $q["name"];
            $_SESSION["ATECHFOOD_USER_ID"] = $uid;
            $_SESSION["ATECHFOOD_USER"] = "yes";
            $_SESSION["name"] = $username;
            $_SESSION["ATECHFOOD_USER_MOBILE"] = $loginmobile;
            echo "success";
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
            $_SESSION["ATECHFOOD_USER_ID"] = $uid;
            $_SESSION["ATECHFOOD_USER"] = "yes";
            $_SESSION["name"] = "guest";
            $_SESSION["ATECHFOOD_USER_MOBILE"] = $loginmobile;
            echo "success";
        }
    } else {
        echo "fail";
    }
    function encryptData($data)
    {
        $key = "woefjiow394ru3049jfweiofnio2orj2309ufjw0ejiiowehrf9230ufjwe9u30f9jwio";
        $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-256-cbc'));
        $encrypted = openssl_encrypt($data, 'aes-256-cbc', $key, 0, $iv);
        return base64_encode($iv . $encrypted);
    }
    function decryptData($data)
    {
        $key = "woefjiow394ru3049jfweiofnio2orj2309ufjw0ejiiowehrf9230ufjwe9u30f9jwio";
        $data = base64_decode($data);
        $iv = substr($data, 0, openssl_cipher_iv_length('aes-256-cbc'));
        $encrypted = substr($data, openssl_cipher_iv_length('aes-256-cbc'));
        return openssl_decrypt($encrypted, 'aes-256-cbc', $key, 0, $iv);
    }
    $expiration_time = time() + 7 * 24 * 60 * 60;
    setcookie("ATECHFOOD_USER_ID", encryptData($uid), $expiration_time, "/");
    setcookie("ATECHFOOD_USER", encryptData("yes"), $expiration_time, "/");
    setcookie("name", encryptData($_SESSION["name"]), $expiration_time, "/");
    setcookie("ATECHFOOD_USER_MOBILE", encryptData($loginmobile), $expiration_time, "/");
}
