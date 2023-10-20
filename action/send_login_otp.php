
<?php
session_start();
include('../admin/controller/common-controller.php');
include('../function.inc.php');
$conn = _connectodb();
setTimeZone();

$phone = safe_value($conn, $_POST['phone']);
header('Content-Type: application/json');
if (isset($_POST['phone']) !== '') {
    try {
        $phoneNumber = mysqli_real_escape_string($conn, $_POST['phone']);
        $formattedPhoneNumber = substr_replace($phoneNumber, "*******", 0, -4);
        function generateOTP()
        {
            $min = 100000; // Minimum value for the OTP (inclusive)
            $max = 999999; // Maximum value for the OTP (inclusive)
            $otp = random_int($min, $max);
            return strval($otp); // Convert the OTP to a string and return
        }
        // Usage:
        $otp = generateOTP();
        // Check for errors
        $_SESSION['cod_otp'] = $otp;
        include('vendor\cod_otp.php');
        $htmlOutput = '<div class="position-relative" style="    box-shadow: 0px 0px 20px 7px #1a9f0e1c;">
                <div class="card p-2 text-center" style="padding: 30px !important;margin-bottom: 10px; margin-top: 0px;">
                    <h6>Please enter the one-time password <br> to verify your account</h6>
                    <div> <span>A code has been sent to</span> <small>' . $formattedPhoneNumber . '</small> </div>
                    <div id="otp" class="inputs d-flex flex-row justify-content-center mt-2"> <input class=" text-center form-control rounded" type="number" id="first" maxlength="1" /> <input class=" text-center form-control rounded" type="number" id="second" maxlength="1" /> <input class=" text-center form-control rounded" type="number" id="third" maxlength="1" /> <input class=" text-center form-control rounded" type="number" id="fourth" maxlength="1" /> <input class=" text-center form-control rounded" type="number" id="fifth" maxlength="1" /> <input class=" text-center form-control rounded" type="number" id="sixth" maxlength="1" /> </div>
                    <div class="mt-4"> <button type="button" class="btn btn-success px-4 validatethis">Continue</button> </div>
                </div>
               
            </div>';
        $response = array(
            'status' => 'success',
            'html' => $htmlOutput,
            'otp' => $otp
        );
        $jsonResponse = json_encode($response);
        echo $jsonResponse;
    } catch (\Throwable $th) {
        $response = array(
            'status' => 'failed',
            'html' => 'Something Went Wrong !!',
        );
        // Convert the response array to JSON
        $jsonResponse = json_encode($response);
        echo $jsonResponse;
    }
} else {
    $response = array(
        'status' => 'failed',
        'html' => 'Something Went Wrong !!',
    );
    // Convert the response array to JSON
    $jsonResponse = json_encode($response);
    echo $jsonResponse;
}


?>