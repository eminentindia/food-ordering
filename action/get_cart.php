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

// Fetch and display cart items
// Initialize the cart variable
$cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
// Calculate the total quantity of items in the cart
$totalQty = 0;
foreach ($cart as $item) {
    $totalQty += $item['quantity'];
}
// Initialize the total variable
$total = 0;
$getactivecategory = getactivecategory($conn);
$getactivecategory = json_decode($getactivecategory, true);

$html = '';

$html .= '<nav id="main-nav">
    <a class="cart-button" href="#">
        <span class="bag-count">' . $totalQty . '</span>
        <span> <img src="img/bag-icon.png" alt="foodieez menu"></span>
    </a>
</nav>
<aside id="sidebar-cart">
    <main>
        <div>
            <a href="#" class="close-button"><span class="close-icon1">X</span></a>
            <h2>Shopping Cart</h2>
        </div>';
if (empty($cart)) {
    $html .= "<div class='getcartdiv'>Browse Category</h6>";
    foreach ($getactivecategory as $slidecategory) {
        $ID = $slidecategory['ID'];
        $image = $slidecategory['image'];
        $category = $slidecategory['category'];
        $slug = $slidecategory['slug'];
        // Create a URL for the category page
        $categoryUrl = SITE_PATH . 'category/' . $slug;
        // Construct the HTML for each category item
        $html .= '
                <a href="' . $categoryUrl . '" class="collection-grid-item__link cartdflex">
                    <img
                        data-src="' . SITE_PATH . 'admin/media/category/' . $image . '"
                        src="' . SITE_PATH . 'admin/media/category/' . $image . '"
                        alt="' . $category . '"
                        class="blur-up lazyload" width="30" height="30" style="
                            width: 35px;"
                    />
                    <div class="collection-grid-item__title-wrapper">
                        <h3 class="collection-grid-item__title btn btn--secondary no-border">' . $category . '</h3>
                    </div>
                </a>
           ';
    }
    $html .= "</div>";
}

$html .= '<ul class="products">';

// Check if there are items in the cart
if (!empty($cart)) {
    $total = 0; // Initialize the total
    // Iterate through the cart items
    foreach ($cart as $key => $item) {
        // Calculate the total price for each item
        $itemTotal = $item['price'] * $item['quantity'];
        $total += $itemTotal;

        if($item['attribute']!=''){
            $attributeshow='<span style="line-height: inherit;" class="ml-2 badge badge-success  badge-sm">'.$item['attribute'].'</span>';

        }
        else{
            $attributeshow='';
        }
        // Define variables for optional elements
        $tiffin = !empty($item['tiffin']) ? '<span class="imagetoptiffin">' . $item['tiffin'] . '</span>' : '';
        // Add HTML for displaying cart items
        $html .= '
            <li class="item sidecartitem" id="attr_' . $key . '">
                <div class="loader" id="loader_' . $key . '" style="display:none">
                    <div class="loader-content">
                        <div class="loader-spinner"></div>
                    </div>
                </div>
                <div class="product-image">
                    <img src="' . SITE_PATH . 'admin/media/dish/' . $item['dish_image'] . '" alt="' . $item['dish_name'] . '">
                    ' . $tiffin . '
                </div>
                <div class="product-details">
                    <div class="product-name">' . $item['dish_name'] . $attributeshow. '  </div>
                    <div class="bottomdiv">
                        <div class="product-price">Price: <i class="fa fa-inr" aria-hidden="true"></i>' . $item['price'] . ' X ' . $item['quantity'] . '</div>
                        <div class="item-total">Total: <i class="fa fa-inr" aria-hidden="true"></i>' . $itemTotal . '</div>
                        <div class="cartquantity-controls smallControl" style="padding: 0;">
                            <!-- Quantity increment and decrement elements -->
                            <button class="cartquantity-decrement">-</button>
                            <input type="text" class="cartquantity-input" data-productKey="' . $key . '" data-productId="' . $item['dishID'] . '" data-productSku="' . $item['sku'] . '" name="quantity_' . $item['dishID'] . $item['sku'] . '" value="' . $item['quantity'] . '">
                            <button class="cartquantity-increment">+</button>
                        </div>
                    </div>
                </div>
                <button class="btn-delete" onclick="removeCartItem(' . $key . ')">X</button>
            </li>';
    }

    // Add the subtotal if there are items in the cart
    $html .= '
        </ul>';
    $html .= '<div class="totals">
            <div class="subtotal">
                <span class="label text-white">Subtotal:</span>
                <span class="product-price text-white" id="totalPrice">
                    <span class="money" id="stotal"><i class="fa fa-inr" aria-hidden="true"></i>' . $total . '</span>
                </span>
            </div>
        </div>';
} else {
    // Display a message if the cart is empty
    $html .= '<li style="border: 1px dashed #ffffff;background: #ffb700;padding: 20px;color: white;font-size: 1rem;">No Item In cart !</li>';
}

// Output the generated HTML
echo $html;
