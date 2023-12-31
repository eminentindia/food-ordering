<?php
session_start();
include('../../admin/controller/common-controller.php');

include('../../function.inc.php');
$conn = _connectodb();
setTimeZone();
include('../../smtp/PHPMailerAutoload.php');
include('../../admin/setting/controller/setting-controller.php');
$getsetting = getsetting($conn);
$getsetting = json_decode($getsetting, true);
foreach ($getsetting as $getsinglesetting) {
    extract($getsinglesetting);
}
include('../../admin/controller/constant.inc.php');
$response = array();

if (isset($_POST['order_status'])) {
    $order_status = safe_value($conn, $_POST['order_status']);
    $id = safe_value($conn, $_POST['order_ID']);
    $user_email = safe_value($conn, $_POST['user_email']);
    $UID = safe_value($conn, $_POST['UID']);

    if ($order_status == '2') {
        $delievered_on = date("Y-m-d h:i:s");
        mysqli_query($conn, "update orders set payment_status='success',order_status='$order_status' delievered_on='$delievered_on' where ID='$id'");
        $row = mysqli_fetch_assoc(mysqli_query($conn, "select count(*) as total_order from orders where user_id='$UID'"));
        $total_order = $row['total_order'];
        if ($total_order == 1) {
            $res = mysqli_query($conn, "select * from users where ID='$UID'");
            if (mysqli_num_rows($res) > 0) {
                $row1 = mysqli_fetch_assoc($res);
                $email = $row1['email'];
                $referral_from = $row1['referral_from'];
                $pay = mysqli_fetch_assoc(mysqli_query($conn, "select ID from users where referral_code='$referral_from'"));
                $uid = $pay['ID'];
                $msg1 = 'Referral Amount from ' . $email;
                $mW =   managewallet($uid, $referral_amount, 'in', $msg1);
                mysqli_query($conn, "update users set referral_from='null' where ID='$UID'");
            }
        }
        $html = send_complete_order_email($conn, $id);
        send_email($user_email, $html, 'Order Delivered !', $smtp_email, $smtp_password);
    }

    if ($order_status == '3') {
        mysqli_query($conn, "update orders set payment_status='pending', order_status='$order_status' where ID='$id'");
        $html = send_ontheway_order_email($conn, $id);
        send_email($user_email, $html, 'Your Order is On The Way', $smtp_email, $smtp_password);
    }
    // if ($order_status == '4') {
    //     mysqli_query($conn, "update orders set payment_status='pending', order_status='$order_status',order_cancelBy='admin',order_cancelAt='$order_cancelAt' where ID='$id'");
    //     $html = send_cancel_order_email($conn, $id);
    //     send_email($user_email, $html, 'Order Cancel !', $smtp_email, $smtp_password);
    // }
    $response['success'] = true;
}
echo json_encode($response);
