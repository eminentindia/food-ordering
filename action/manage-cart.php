
<?php
session_start();
include('../admin/controller/common-controller.php');
include('../function.inc.php');
$conn = _connectodb();
setTimeZone();
$added_on = date("Y-m-d h:i:s");

$attr = safe_value($conn, $_POST['attr']);
$type = safe_value($conn, $_POST['type']);

if ($type == 'add') {
    $qty = safe_value($conn, $_POST['qty']);
    // when user login 
    if (isset($_SESSION['ATECHFOOD_USER_ID'])) {
        $uid = $_SESSION['ATECHFOOD_USER_ID'];
        manageUserCart($uid, $qty, $attr);
        // define in function.inc
    }
    // when user not log in 
    else {
        $_SESSION['cart'][$attr]['qty'] = $qty;
    }
    $getUserFullCart = getUserFullCart();
    $totalPrice = 0;
    foreach ($getUserFullCart as $list) {
        $totalPrice = $totalPrice + ($list['qty'] * $list['price']);
    }
    $getDishDetail = getDishDetailById($attr);
    $price = $getDishDetail['price'];
    $dish = $getDishDetail['dish'];
    $image = $getDishDetail['image'];
    $dishatr = $getDishDetail['attribute'];
    $totaldish = count(getUserFullCart());
    $response = array('totalcartcount' => $totaldish, 'totalPrice' => $totalPrice, 'price' => $price, 'dish' => $dish, 'image' => $image, 'attribute' => $dishatr);

    echo json_encode($response);
}


if ($type == 'delete') {
    removeDishFromCartByid($attr);
    $getUserFullCart = getUserFullCart();
    $totalDish = count($getUserFullCart);
    $totalPrice = 0;
    foreach ($getUserFullCart as $list) {
        $totalPrice = $totalPrice + ($list['qty'] * $list['price']);
    }
    $response = array('totalCartDish' => $totalDish, 'totalPrice' => $totalPrice);
    echo json_encode($response);
}



?>