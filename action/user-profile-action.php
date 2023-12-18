
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
    setcookie("name", encryptData($name), $expiration_time, "/");
    setcookie("ATECHFOOD_USER_MOBILE", encryptData($loginmobile), $expiration_time, "/");
    $response['success'] = true;
    echo json_encode($response);
}
?>