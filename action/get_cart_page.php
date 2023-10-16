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
$cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
if (count($cart) > 0) {
?>
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-8 col-lg-8 main-col">
                <form method="post" class="cart style2 ">
                <div class="table-responsive" id="mycartpagediv">
                    <table class="table table-bordered">
                        <thead class="">
                            <tr>
                                <th class="text-center" width="150px">Product</th>
                                <th class="text-center">Price</th>
                                <th class="text-center">Quantity</th>
                                <th class="text-center">Total</th>
                                <th class="action">&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            $cartArr = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
                            // print_r($cartArr);
                            $totalPrice = 0;
                            foreach ($cartArr as $key => $cart) {
                                $total = $cart['price'] * $cart['quantity'];
                                $totalPrice += $total;

                                if ($cart['attribute'] != '') {
                                    $attributeshow = '<span style="line-height: inherit;" class="ml-2 badge badge-success  badge-sm">' . $cart['attribute'] . '</span>';
                                } else {
                                    $attributeshow = '';
                                }

                            ?>
                                <tr class="cart__row border-bottom line1 cart-flex border-top position-relative <?php echo 'attr_' . $key . '' ?>" <?php echo 'id="attr_' . $key . '"' ?>>
                                    <?php
                                    echo '<div class="loader loader_' . $key . '"  style="display:none">
                                            <div class="loader-content">
                                                <div class="loader-spinner"></div>
                                            </div>
                                            </div>';
                                    ?>
                                    <td class="cart__image-wrapper cart-flex-item cartpageimgtext text-center">
                                        <img class="cart__image" src="<?php echo PRODUCT_IMAGE_SITE_PATH . $cart['dish_image'] ?>" alt="<?php echo  $cart['dish_name'] ?>">
                                        <div class="list-view-item__title">
                                            <?php echo $cart['dish_name'] . $attributeshow ?>
                                        </div>
                                    </td>
                                   
                                    <td class="text-center">
                                        <span class="money"> <i class="fa fa-inr" aria-hidden="true"></i> <?php echo $cart['price'] ?></span>
                                    </td>
                                    <td class="text-center">
                                        <?php
                                        echo '<div class="cartquantity-controls smallControl text-center justify-content-center" style="padding: 0;">
                                                <button class="c cartquantity-decrementpage">-</button>
                                                <input type="text" class=" cartquantity-inputpage" data-productKey="' . $key . '" data-productId="' . $cart['dishID'] . '" data-productSku="' . $cart['sku'] . '" name="quantity_' . $cart['dishID'] . $cart['sku'] . '" value="' . $cart['quantity'] . '">
                                                <button class=" cartquantity-incrementpage">+</button>
                                                </div>';
                                        ?>
                                    </td>
                                    <td>
                                        <div class="text-center"><span class="money"><i class="fa fa-inr" aria-hidden="true"></i> <?php echo $total; ?></span></div>
                                    </td>
                                    <td class="text-center"><a href="javascript:void(0)" onclick="removeCartItempage('<?php echo $key ?>')" class="btn text-center btn--secondary cart__remove" title="Remove tem"><i class="icon icon anm anm-times-l"></i></a></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="5" class="text-left"><a href="<?php echo SITE_PATH; ?>" class="btn--link cart-continue"><i class="icon icon-arrow-circle-left"></i> Continue shopping</a></td>
                              
                            </tr>
                        </tfoot>
                    </table>
                </div>
                    <hr>
            </div>
            <div class="col-12 col-sm-12 col-md-4 col-lg-4 cart__footer">

                <div class="solid-border">
                    <div class="row">
                        <span class="col-12 col-sm-6 cart__subtotal-title"><strong>Subtotal</strong></span>
                        <span class="col-12 col-sm-6 cart__subtotal-title cart__subtotal text-right"><span class="money"><i class="fa fa-inr" aria-hidden="true"></i> <?php echo $totalPrice; ?></span></span>
                    </div>
                    <div class="cart__shipping">Shipping &amp; taxes calculated at checkout</div>

                    <a href="checkout"> <button type="button" id="cartCheckout" class="btn  btn--small-wide checkout btn-success">Checkout</button></a>

                    <div class="paymnet-img"><img src="images/payment-img.jpg" alt="Payment"></div>
                </div>

            </div>
        </div>
    </div>
    </form>
<?php } else {
?>

    <div class="container" style="display: flex;
  justify-content: center;margin-bottom: 100px;
    padding-top: 30px;">
        <div class="row">
            <div class="col-md-12">
                <div class="card-title text-center">
                    <img src="images/empty-cart.png" alt="" width="250px">
                    <h4 style=" margin-top:25px; font-size: 25px;">Hey, it feels so light!</h4>
                    <h6 style="color: #7c7c7c; font-size: 16px;">There is nothing in your bag. Let's add some items.</h6>
                    <a href="dishes"><button class="btn btn-theme btn-secondary" style=" margin-top:30px; ">BROWSE DISH</button></a>
                </div>


            </div>
        </div>
    </div>


<?php }
?>