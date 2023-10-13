
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
require 'vendor/autoload.php';

use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;

$added_on = date("Y-m-d h:i:s");
$name = safe_value($conn, $_POST['name']);
$email = safe_value($conn, $_POST['email']);
$subject = safe_value($conn, $_POST['subject']);
$message = safe_value($conn, $_POST['message']);
$response = array();
$sql = "INSERT into contact (
        name,
        email,
        subject,
        message,
        added_on
        )
        VALUES (
        '$name',
        '$email',
        '$subject',
        '$message',
        '$added_on'
        )";
$result = mysqli_query($conn, $sql);
$html = '<table border="0" cellpadding="0" cellspacing="0" width="100%" style="table-layout:fixed;background-color:#f9f9f9" id="bodyTable">
<tbody>
        <tr>
                <td style="padding-right:10px;padding-left:10px;" align="center" valign="top" id="bodyCell">
                        <table border="0" cellpadding="0" cellspacing="0" width="100%" class="wrapperWebview" style="max-width:600px">
                                <tbody>
                                        <tr>
                                                <td align="center" valign="top">
                                                        <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                                                <tbody>
                                                                        
                                                                </tbody>
                                                        </table>
                                                </td>
                                        </tr>
                                </tbody>
                        </table>
                        <table border="0" cellpadding="0" cellspacing="0" width="100%" class="wrapperBody" style="max-width:600px">
                                <tbody>
                                        <tr>
                                                <td align="center" valign="top">
                                                        <table border="0" cellpadding="0" cellspacing="0" width="100%" class="tableCard" style="background-color:#fff;border-color:#e5e5e5;border-style:solid;border-width:0 1px 1px 1px;">
                                                                <tbody>
                                                                        <tr>
                                                                                <td style="background-color:#fd7d16;font-size:1px;line-height:3px;margin-bottom:40px" class="topBorder" height="3">&nbsp;</td>
                                                                        </tr>
                                                                
                                                                        <tr>
                                                                                <td style="padding-left:20px;padding-right:20px" align="center" valign="top" class="containtTable ui-sortable">
                                                                                        <table border="0" cellpadding="0" cellspacing="0" width="100%" class="tableDescription" style="">
                                                                                                <tbody>
                                                                                                        <tr>
                                                                                                                <td style="padding-bottom: 20px;" align="center" valign="top" class="description">
                                                                                                                        <p class="text" style="color:#666;font-size:14px;font-weight:400;font-style:normal;letter-spacing:normal;line-height:22px;text-transform:none;text-align:center;padding:0;margin-top:30px">
                                                                                                                        Contact Form Submitted By ' . $name . ' <br> Email : ' . $email . '<br>  Subject : ' . $subject . '<br> Message : ' . $message . '</p>
                                                                                                                </td>
                                                                                                        </tr>
                                                                                                </tbody>
                                                                                        </table>
                                                                                
                </td>
        </tr>
</tbody>
</table>';
$client = new Client([
        'base_uri' => "https://yrg6nd.api.infobip.com/",
        'headers' => [
                'Authorization' => "App 637182ab24357b4396c3763ab0761a8f-385dae8c-4f11-4958-9903-be9e1c5abef9",
                'Content-Type' => 'multipart/form-data',
                'Accept' => 'application/json',
        ]
]);

$response = $client->request(
        'POST',
        'email/2/send',
        [
                RequestOptions::MULTIPART => [
                        ['name' => 'from', 'contents' => "FD_Order@foodieez.co.in"],
                        ['name' => 'to', 'contents' => $site_email],
                        ['name' => 'subject', 'contents' => 'Foodieez Enquiry !!'],
                        ['name' => 'html', 'contents' => $html],
                ],
        ]
);



echo 'done';
?>