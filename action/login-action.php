
<?php
session_start();
include('../admin/controller/common-controller.php');
include('../function.inc.php');
$conn = _connectodb();
setTimeZone();


$email = safe_value($conn, $_POST['email']);
$password = safe_value($conn, $_POST['password']);
$response = array();
if (!empty($email) || !empty($password)) {

    $select = "SELECT * FROM users WHERE email = '$email' AND status='active'";
    $select2 = "SELECT * FROM users WHERE email = '$email' AND status='inactive'";
    $execute = mysqli_query($conn, $select);
    $execute2 = mysqli_query($conn, $select2);

    
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $response['invalidemail'] = true;
    } 
    elseif(mysqli_num_rows($execute2) == 1)
    {
        $response['notactive'] = true;
    }

   else if (mysqli_num_rows($execute) == 1) {
        while ($row = mysqli_fetch_assoc($execute)) {
            if (password_verify($password, $row['password'])) {
                $_SESSION['ATECHFOOD_USER'] = 'yes';
                $_SESSION['ATECHFOOD_USER_ID'] = $row['ID'];
                $_SESSION['email'] = $row['email'];
                $_SESSION['name'] = $row['name'];
                $_SESSION['ATECHFOOD_USER_MOBILE'] = $row['mobile'];
                $response['success'] = true;
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