
<?php
session_start();
include('../admin/controller/common-controller.php');
$conn = _connectodb();
setTimeZone();
include('../function.inc.php');
include('../smtp/PHPMailerAutoload.php');
$getsetting = getsetting($conn);
$getsetting = json_decode($getsetting, true);
foreach ($getsetting as $getsinglesetting) {
    extract($getsinglesetting);
}
include('../admin/controller/constant.inc.php');

if(isset($_POST['ID']) && isset($_POST['user_email'])!=='')
{
    $response = array();
    $ID = safe_value($conn, $_POST['ID']);
    $user_email = safe_value($conn, $_POST['user_email']);
    $order_cancelAt=date('Y-m-d h:i:s');
    mysqli_query($conn,"update orders set paymentstatus='cancelled',order_status='4',order_cancelBy='user',order_cancelAt='$order_cancelAt' where ID='$ID' AND order_status='1' AND user_id='".$_SESSION['ATECHFOOD_USER_ID']."'");
    // $html = send_cancel_order_email($conn, $ID);
    // send_email($user_email, $html, 'Order Cancel !', $smtp_email, $smtp_password);
    $response['success'] = true;
    
}

echo json_encode($response);

?>