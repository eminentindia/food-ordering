
<?php
session_start();
include('../admin/controller/common-controller.php');
include('../smtp/PHPMailerAutoload.php');
include('../function.inc.php');
$conn = _connectodb();
setTimeZone();

$added_on = date("Y-m-d h:i:s");
$name = safe_value($conn, $_POST['name']);
$email = safe_value($conn, $_POST['email']);
$mobile = safe_value($conn, $_POST['mobile']);
$getpassword = safe_value($conn, $_POST['password']);
$password = password_hash($getpassword, PASSWORD_BCRYPT);
$token = bin2hex(random_bytes(15));

$referral_code = bin2hex(random_bytes(6));
$response = array();
if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $selectemail = "SELECT * FROM users WHERE email = '$email'";
    $executeEmail = mysqli_query($conn, $selectemail);

    // Check if the email exists
    if ($executeEmail->num_rows == 1) {
        $response['regexist_email'] = true;
    } else { // Assuming a 10-digit phone number

        $pattern = '/^\d{10}$/'; // This pattern assumes a 10-digit phone number

        if (preg_match($pattern, $mobile)) {
            $selectphone = "SELECT * FROM users WHERE mobile = '$mobile'";
            $executePhone = mysqli_query($conn, $selectphone);
            if ($executePhone->num_rows == 1) {
                $response['regexist_phone'] = true;
            } else {
                // referral code 
                if (isset($_SESSION['referral_from']) && $_SESSION['referral_from'] != '') {
                    $referral_from = $_SESSION['referral_from'];
                } else {
                    $referral_from = '';
                }
                $sql = "INSERT into users (
                    name,
                    email,
                    password,
                    mobile,
                    referral_code,
                    referral_from,
                    token,
                    status,
                    added_on
                    )
                    VALUES (
                    '$name',
                    '$email',
                    '$password',
                    '$mobile',
                    '$referral_code',
                    '$referral_from',
                    '$token',
                    'inactive',
                    '$added_on'
                    )";
                // echo $sql;
                // die();



                $result  = mysqli_query($conn, $sql);
                $uid = mysqli_insert_id($conn);
                unset($_SESSION['referral_from']);
                if ($result) {
                    //add amount to user wallet while register
                    include('../admin/setting/controller/setting-controller.php');
                    $getsetting = getsetting($conn);
                    $getsetting = json_decode($getsetting, true);
                    foreach ($getsetting as $getsinglesetting) {
                        extract($getsinglesetting);
                    }
                    include('../admin/controller/constant.inc.php');
                    // managewallet($uid, $wallet_amount, 'in', 'New Register');
                    // $email = safe_value($conn, $_POST['email']);
                    // $subject = "Registration !";
                    // $html = '<!DOCTYPE html>
                    // <html>
                    // <head>
                    //     <title></title>
                    //     <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                    //     <meta name="viewport" content="width=device-width, initial-scale=1">
                    //     <meta http-equiv="X-UA-Compatible" content="IE=edge" />
                    //     <style type="text/css">
                    //         @media screen {
                    //             @font-face {
                    //                 font-family: "Lato";
                    //                 font-style: normal;
                    //                 font-weight: 400;
                    //                 src: local("Lato Regular"), local("Lato-Regular"), url(https://fonts.gstatic.com/s/lato/v11/qIIYRU-oROkIk8vfvxw6QvesZW2xOQ-xsNqO47m55DA.woff) format("woff");
                    //             }

                    //             @font-face {
                    //                 font-family: "Lato";
                    //                 font-style: normal;
                    //                 font-weight: 700;
                    //                 src: local("Lato Bold"), local("Lato-Bold"), url(https://fonts.gstatic.com/s/lato/v11/qdgUG4U09HnJwhYI-uK18wLUuEpTyoUstqEm5AMlJo4.woff) format("woff");
                    //             }

                    //             @font-face {
                    //                 font-family: "Lato";
                    //                 font-style: italic;
                    //                 font-weight: 400;
                    //                 src: local("Lato Italic"), local("Lato-Italic"), url(https://fonts.gstatic.com/s/lato/v11/RYyZNoeFgb0l7W3Vu1aSWOvvDin1pK8aKteLpeZ5c0A.woff) format("woff");
                    //             }

                    //             @font-face {
                    //              font-family: "Lato";
                    //                 font-style: italic;
                    //                 font-weight: 700;
                    //                 src: local("Lato Bold Italic"), local("Lato-BoldItalic"), url(https://fonts.gstatic.com/s/lato/v11/HkF_qI1x_noxlxhrhMQYELO3LdcAZYWl9Si6vvxL-qU.woff) format("woff");
                    //             }
                    //         }

                    //         /* CLIENT-SPECIFIC STYLES */
                    //         body,
                    //         table,
                    //         td,
                    //         a {
                    //             -webkit-text-size-adjust: 100%;
                    //             -ms-text-size-adjust: 100%;
                    //         }

                    //         table,
                    //         td {
                    //             mso-table-lspace: 0pt;
                    //             mso-table-rspace: 0pt;
                    //         }

                    //         img {
                    //             -ms-interpolation-mode: bicubic;
                    //         }

                    //         /* RESET STYLES */
                    //         img {
                    //             border: 0;
                    //             height: auto;
                    //             line-height: 100%;
                    //             outline: none;
                    //             text-decoration: none;
                    //         }

                    //         table {
                    //             border-collapse: collapse !important;
                    //         }

                    //         body {
                    //             height: 100% !important;
                    //             margin: 0 !important;
                    //             padding: 0 !important;
                    //             width: 100% !important;
                    //         }

                    //         /* iOS BLUE LINKS */
                    //         a[x-apple-data-detectors] {
                    //             color: inherit !important;
                    //             text-decoration: none !important;
                    //             font-size: inherit !important;
                    //             font-family: inherit !important;
                    //             font-weight: inherit !important;
                    //             line-height: inherit !important;
                    //         }

                    //         /* MOBILE STYLES */
                    //         @media screen and (max-width:600px) {
                    //             h1 {
                    //                 font-size: 32px !important;
                    //                 line-height: 32px !important;
                    //             }
                    //         }

                    //         /* ANDROID CENTER FIX */
                    //         div[style*="margin: 16px 0;"] {
                    //             margin: 0 !important;
                    //         }
                    //     </style>
                    // </head>

                    // <body style="background-color: #f4f4f4; margin: 0 !important; padding: 0 !important;">

                    //     <table border="0" cellpadding="0" cellspacing="0" width="100%">
                    //         <!-- LOGO -->
                    //         <tr>
                    //             <td bgcolor="#FE7155" align="center">
                    //                 <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
                    //                     <tr>
                    //                         <td align="center" valign="top" style="padding: 40px 10px 40px 10px;"> </td>
                    //                     </tr>
                    //                 </table>
                    //             </td>
                    //         </tr>
                    //         <tr>
                    //             <td bgcolor="#FE7155" align="center" style="padding: 0px 10px 0px 10px;">
                    //                 <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
                    //                     <tr>
                    //                         <td bgcolor="#ffffff" align="center" valign="top" style="padding: 40px 20px 20px 20px; border-radius: 4px 4px 0px 0px; color: #111111; font-family: "Lato", Helvetica, Arial, sans-serif; font-size: 48px; font-weight: 400; letter-spacing: 4px; line-height: 48px;">
                    //                             <h1 style="font-size: 30px;
                    //                             font-weight: 400;
                    //                             color: #383838; margin: 2;">ACCOUNT ACTIVATION ! </h1> <img src="https://www.atechseva.com/demo-projects/ecom/img/ecom-logo.png" width="200" style="display: block; border: 0px;" />
                    //                         </td>
                    //                     </tr>
                    //                 </table>
                    //             </td>
                    //         </tr>
                    //         <tr>
                    //             <td bgcolor="#f4f4f4" align="center" style="padding: 0px 10px 0px 10px;">
                    //                 <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
                    //                     <tr>
                    //                         <td bgcolor="#ffffff" align="left" style=" color: #666666; font-family: "Lato", Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;  padding: 0 50px;">
                    //                             <p style="margin: 0; padding: 20px 30px !important;
                    //                             text-align: center !important;">Hi ' . $name . '! We Are excited to have you get started. First, you need to confirm your account. Just press the button below.</p>
                    //                         </td>
                    //                     </tr>
                    //                     <tr>
                    //                         <td bgcolor="#ffffff" align="left">
                    //                             <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    //                                 <tr>
                    //                                     <td bgcolor="#ffffff" align="center" style="padding: 20px 30px 60px 30px;">
                    //                                         <table border="0" cellspacing="0" cellpadding="0">
                    //                                             <tr>
                    //                                                 <td align="center" style="border-radius: 3px;" bgcolor="#FE7155"><a href="http://localhost/food-ordering/email-verify.php?token=' . $token . '" target="_blank" style="font-size: 20px; font-family: Helvetica, Arial, sans-serif; color: #ffffff; text-decoration: none; color: #ffffff; text-decoration: none; padding: 15px 25px; border-radius: 2px; border: 1px solid #FE7155; display: inline-block;">Confirm Account</a></td>
                    //                                             </tr>
                    //                                         </table>
                    //                                     </td>
                    //                                 </tr>
                    //                             </table>
                    //                         </td>
                    //                     </tr>

                    //                 </table>
                    //             </td>
                    //         </tr>

                    //     </table>
                    // </body>
                    // </html>';
                    // send_email($email, $html, $subject, $smtp_email, $smtp_password);
                    $response['regsuccess'] = true;
                } else {
                    $response['regfail'] = true;
                }
            }
        } else {
            $response['invalid_phone'] = true;
        }
    }
}

// Check if the phone number is valid


echo json_encode($response);

?>