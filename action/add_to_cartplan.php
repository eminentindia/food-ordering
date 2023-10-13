
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
// Check if the 'attributesData' is set in the POST data
$dishID = $_POST['dishID'];
$attributeID = $_POST['attributeID'];
$totalPrice = $_POST['totalPrice'];
$quantity = $_POST['quantity'];
$tiffin = $_POST['tiffin'];
$selectedPrice = $_POST['selectedPrice'];
if ($selectedPrice < 0 or $selectedPrice == 'NaN') {
    echo json_encode(['message' => 'Please Choose Atleast One !']);
    die();
} else {
    $dishID = mysqli_real_escape_string($conn, $_POST['dishID']);
    $attributeID = mysqli_real_escape_string($conn, $_POST['attributeID']);
    $totalPrice = $_POST['totalPrice'];
    $quantity = $_POST['quantity'];
    $selectedPrice = $_POST['selectedPrice'];
    $tiffin = $_POST['tiffin'];
    // Fetch dish information
    $query = "SELECT * FROM monthly_plan WHERE ID='$dishID'";
    $result = mysqli_query($conn, $query);
    $dishassoc = mysqli_fetch_assoc($result);
    if (!$dishassoc) {
        echo json_encode(['error' => 'Dish not found']);
        exit;
    }
    $dish_name = $dishassoc['dish'];
    $dish_image = $dishassoc['image'];
    $type = $dishassoc['type'];
    if (empty($attributeID)) {
        $attribute = '';
        $price = $dishassoc['selling_price'];
        $sku = $dishassoc['main_sku'];
    } else {
        
    }
    // Check if the cart session variable exists, if not, create it as an empty array
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }
    // Intialize a flag to check if the item exists
    $itemExists = false;
    foreach ($_SESSION['cart'] as $key => $item) {
        if ($item['dishID'] == $dishID && $item['attributeID'] == $attributeID && $item['tiffin'] == $tiffin) {
            // Update the existing item in the cart
            $_SESSION['cart'][$key]['totalPrice'] = $totalPrice;
            $_SESSION['cart'][$key]['quantity'] += $quantity; // Update quantity
            $_SESSION['cart'][$key]['selectedPrice'] = $selectedPrice;
            $itemExists = true;
            break;
        }
    }
    if (!$itemExists) {
        // Create an array to hold the product information
        $product = [
            'dishID' => $dishID,
            'dish_name' => $dish_name,
            'dish_image' => $dish_image,
            'type' => $type,
            'attribute' => $attribute,
            'price' => $price,
            'sku' => $sku,
            'attributeID' => $attributeID,
            'totalPrice' => $totalPrice,
            'quantity' => $quantity,
            'tiffin' => $tiffin,
        ];
        // Add the product to the cart session
        $_SESSION['cart'][] = $product;
    }
    echo json_encode(['message' => 'Product added to cart successfully']);
}
