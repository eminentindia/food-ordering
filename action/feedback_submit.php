
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
// Function to add items to the cart
if (isset($_POST['rating']) && isset($_POST['feedback']) && isset($_POST['order_id'])) {
    $rating = $_POST['rating'];
    $feedback = $_POST['feedback'];
    $order_id = $_POST['order_id'];
    // Check if both rating and feedback are not null
    if ($rating !== null && $feedback !== null && $order_id !== null) {
        // Your processing here...
        $updatedTime = date('Y-m-d H:i:s'); // Get the current date and time in the desired format
        $up = "UPDATE orders SET feedback_added_on='$updatedTime', feedback_icon='$rating', feedback='$feedback' WHERE ID='$order_id'";
        
        $w = mysqli_query($conn, $up);
        // For example, if you want to send a success response as JSON:
        $response = array(
            "status" => "success",
            "message" => "Feedback submitted successfully"
        );

        echo json_encode($response);
    } else {
        $response = array(
            "status" => "error",
            "message" => "Rating or feedback is null"
        );

        echo json_encode($response);
    }
} else {
    $response = array(
        "status" => "error",
        "message" => "Rating or feedback is not set in POST data"
    );

    echo json_encode($response);
}
