<?php
session_start();
include('controller/common-controller.php');
$conn = _connectodb();


$name = safe_value($conn, $_POST['registername']);
$email = safe_value($conn, $_POST['registeremail']);
$registerpassword = safe_value($conn, $_POST['registerpassword']);

$password = password_hash($registerpassword, PASSWORD_BCRYPT);

$response = array();
$selectemail = "SELECT * FROM admin WHERE admin_email = '$email'";
$execute = mysqli_query($conn, $selectemail);
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $response['reginvalid_email'] = true;
} else if ($execute->num_rows == 1) {
    $response['regexist_email'] = true;
}  else {
    $sql = "INSERT into admin (
        admin_username,
        admin_email,
        admin_password
        )
        VALUES (
        '$name',
        '$email',
        '$password'
        )";
      

    $result  = mysqli_query($conn, $sql);
    $response['regsuccess'] = true;
}
echo json_encode($response);

?>
