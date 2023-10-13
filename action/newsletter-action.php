
<?php
session_start();
include('../admin/controller/common-controller.php');
include('../smtp/PHPMailerAutoload.php');
include('../function.inc.php');

$conn = _connectodb();
setTimeZone();
$getsetting = getsetting($conn);
$getsetting = json_decode($getsetting, true);
foreach ($getsetting as $getsinglesetting) {
    extract($getsinglesetting);
}
include('../admin/controller/constant.inc.php');
$added_on = date("Y-m-d");
$email = safe_value($conn, $_POST['newsletter_email']);
$selectemail = "SELECT * FROM subscription WHERE email = '$email'";
$execute = mysqli_query($conn, $selectemail);
if ($execute->num_rows == 1) {
    $response['regexist_email'] = true;
} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $response['reginvalid_email'] = true;
} else {
    $sql = "INSERT into subscription (
        email,
        added_on
        )
        VALUES (
        '$email',
        '$added_on'
        )";
    $result  = mysqli_query($conn, $sql);
    if ($result) {
       
        $response['success'] = true;
    }
}
echo json_encode($response);

?>