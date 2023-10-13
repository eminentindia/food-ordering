<?php
session_start();
include('controller/common-controller.php');
$conn = _connectodb();

$mobile = safe_value($conn, $_POST['loginmobile']);
$password = safe_value($conn, $_POST['loginpassword']);

$response = array();
if (!empty($mobile) || !empty($password)) {
    $select = "SELECT * FROM delievery_boy WHERE mobile = '$mobile'";
    $execute = mysqli_query($conn, $select);
   if (mysqli_num_rows($execute) == 1) {
        while ($row = mysqli_fetch_assoc($execute)) {
            if (password_verify($password, $row['password'])) {
                $_SESSION['DELIEVERY_BOY_LOGIN_ID'] = $row['ID'];
                $_SESSION['DELIEVERY_BOY_NAME'] = $row['name'];
                $_SESSION['DELIEVERY_BOY_MOBILE'] = $row['mobile'];
                $_SESSION['DELIEVERY_BOY_PIC'] = $row['image'];
                $response['success'] = true;
            } else {
                $response['passwordincorrect'] = true;
            }
        }
        
    } else {
        $response['mobilenotfound'] = true;
    }
} 
echo json_encode($response);
