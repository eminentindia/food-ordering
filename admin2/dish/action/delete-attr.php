<?php
session_start();
## Database configuration
include('../../controller/common-controller.php');
$conn = _connectodb();
if (isset($_POST['dish_details_id']) && $_POST['dish_details_id'] > 0) {
    $dish_details_id = $_POST['dish_details_id'];
    mysqli_query($conn, "delete from dish_details where ID='$dish_details_id'");
    echo "delete from dish_details where ID='$dish_details_id'";
    // header('Location:update-dish.php');
}
?>