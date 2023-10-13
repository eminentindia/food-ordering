
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
$dishID = $_POST['productId'];
$productSku = $_POST['productSku'];
$qtyChange = (int)$_POST['quantity'];

if ($qtyChange == 0) {
    $qtyChange = 1;
    die();
}

// Check if the cart exists in the session
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}

$found = false;

foreach ($_SESSION['cart'] as &$item) {
    if ($item['dishID'] == $dishID && $item['sku'] == $productSku) {
        $item['quantity'] += $qtyChange; // Update quantity
        $found = true;
        break;
    }
}

if (!$found) {
    // If the product isn't in the cart, you might want to add it here.
    // Create a new cart item and add it to the cart array.
    $newItem = array(
        'dishID' => $dishID,
        'productSku' => $productSku,
        'quantity' => $qtyChange
    );
    $_SESSION['cart'][] = $newItem;
}

echo 'success';
