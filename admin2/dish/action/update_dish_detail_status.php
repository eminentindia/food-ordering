
<?php
session_start();
## Database configuration
include('../../controller/common-controller.php');


$conn = _connectodb();
setTimeZone();
if (isset($_GET['action']) && $_GET['action'] == 'active' && isset($_GET['ID']) && !empty($_GET['ID'])) {
    $query = "UPDATE dish_details SET status=0 WHERE ID=" . $_GET['ID'] . "";
    $result = mysqli_query($conn, $query);
    echo '<script>window.history.go(-1);</script>';
}
if (isset($_GET['action']) && $_GET['action'] == 'deactive' && isset($_GET['ID']) && !empty($_GET['ID'])) {
    $query = "UPDATE dish_details SET status=1 WHERE ID=" . $_GET['ID'] . "";
    $result = mysqli_query($conn, $query);
 echo '<script>window.history.go(-1);</script>';

   
}
?>