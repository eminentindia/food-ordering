<?php
session_start();
include('controller/common-controller.php');
$conn = _connectodb();

$email = safe_value($conn, $_POST['loginemail']);
$password = safe_value($conn, $_POST['loginpassword']);

$response = array();
if (!empty($email) || !empty($password)) {
    $select = "SELECT * FROM admin WHERE admin_email = '$email'";
    $execute = mysqli_query($conn, $select);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $response['invalidemail'] = true;
    }
    else if (mysqli_num_rows($execute) == 1) {
        while ($row = mysqli_fetch_assoc($execute)) {
            if (password_verify($password, $row['admin_password'])) {
                $_SESSION['ADMIN_LOGIN_ID'] = $row['id'];
                $_SESSION['ADMIN_EMAIL'] = $row['admin_email'];
                $_SESSION['ADMIN_NAME'] = $row['admin_username'];
                $_SESSION['ADMIN_ROLE'] = $row['role'];
                $_SESSION['STORE'] = $row['store'];
                $response['success'] = $row['store'];
            } else {
                $response['passwordincorrect'] = true;
            }
        }
        
    } else {
        $response['emailnotfound'] = true;
    }
} 
echo json_encode($response);
?>