<?php
include('includes/header.php'); ?>

<?php include('smtp/PHPMailerAutoload.php'); ?>
<?php

$user_data = getUserDetailsByid();

?>
<?php
if ($website_close == '1') {
    echo '<script>window.location.href="' . SITE_PATH . '";</script>';
}
?>
<?php
$cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
if (count($cart) > 0) {
} else {
    echo '<script>window.location.href="' . SITE_PATH . 'cart";</script>';
}
?>

<body class="page-template belle">
    <?php include('includes/navbar.php') ?>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.rtl.min.css" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
    <link rel="stylesheet" href="css/checkout.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

    <div id="page-content" class="checkoutPage">
        <?php
        if (isset($_SESSION['ATECHFOOD_USER'])) {
        ?>
            <div class="container-fluid mt-1">
                <div class="row billing-fields">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 sm-margin-30px-bottom">
                        <form class="checkout__form" method="GET" id="checkmain" action="razorpay/pay.php">
                            <div class="row ">
                                <div class="col-lg-8 col-lg-8 borderpadding bor py-4 px-4">
                                    <?php
                                    if (isset($_SESSION['ATECHFOOD_USER_ID']) == 0) {
                                    ?>
                                        <div class="customer-box returning-customer">
                                            <h3><i class="icon anm anm-user-al"></i> Returning customer? <a href="#customer-login" id="customer" class=" text-decoration-underline " data-toggle="collapse">Click here to login</a></h3>
                                            <div id="customer-login" class="collapse customer-content">
                                                <div class="customer-info" style="padding: 20px;background: #f9f9f9;border: 1px solid lightgray;">
                                                    <form method="post" id="loginform" class="contact-form">
                                                        <div class="row">
                                                            <div class="form-group col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                                                <label for="exampleInputEmail1">Email address <span class="required-f">*</span></label>
                                                                <input type="text" class="no-margin" name="email" placeholder="Email" id="loginemail">
                                                                <p id="invalidemail" class="errmsg"></p>

                                                            </div>
                                                            <div class="form-group col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                                                <label for="exampleInputPassword1">Password <span class="required-f">*</span></label>
                                                                <input type="password" name="password" placeholder="Password" id="loginpassword">
                                                                <p id="errorpassword" class="errmsg"></p>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="form-check width-100 margin-20px-bottom">
                                                                    <a href="<?= SITE_PATH ?>register" class="float-right ml-3">Create Account</a>
                                                                    <a href="<?= SITE_PATH ?>forgot-password" class="float-right">Forgot your password?</a>
                                                                </div>
                                                                <button type="button" class="btn btn-warning mt-3 shadow-none" id="loginnow">Login</button>
                                                                <p id="loginsuccess" class="successmsg mb-3"></p>

                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    <?php }
                                    ?>
                                    <div class=" mb-2 bshadow" style="box-shadow: none !important;">
                                        <div class="selecttype">
                                            <div class="typeoption">
                                                <input value="Delivery" id="free" name="delieverytype" type="radio" checked>
                                                <label for="free">
                                                    <div class="delieverytype-info">
                                                        <span class="plan-name text-uppercase text-center">Delivery <img src="<?php echo SITE_PATH ?>images/fast-delivery.png" alt="delivery"></span>
                                                    </div>
                                                </label>
                                            </div>
                                            <div class="typeoption">
                                                <input value="Takeaway" id="monthly" name="delieverytype" type="radio">
                                                <label for="monthly">
                                                    <div class="delieverytype-info">
                                                        <span class="plan-name text-uppercase text-center">Take-away <img src="<?php echo SITE_PATH ?>images/take-away.png" alt="Take Away"></span>
                                                    </div>
                                                </label>
                                            </div>
                                            <div class="typeoption">
                                                <input value="Dinein" id="annual" name="delieverytype" type="radio">
                                                <label for="annual">
                                                    <div class="delieverytype-info">
                                                        <span class="plan-name text-uppercase text-center"> Dine-in <img src="<?php echo SITE_PATH ?>images/dinner-table.png" alt="Dine-in" class="ml-1"></span>
                                                    </div>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="checkout__order pb-0 row" style="background: #fd7d16c9;">
                                            <div class="col-md-6" id="preorderdiv">
                                                <div class="checkout__form__input">
                                                    <p id="changeName" class="text-uppercase mycheckoutlabel">Delivery <span style="color: white !important;">Date</span> <span style="color: white !important;">*</span></p>
                                                    <input style="height: inherit;font-size: 1rem;" type="text" name="delievery_date" required placeholder="Enter Delivery Date" id="delievery_date" class="form-control">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="checkout__form__input">
                                                    <p class="text-uppercase mycheckoutlabel">Time <span style="color: white !important;">Slot</span> <span style="color: white !important;">*</span> <?php
                                                                                                                                                                                                        if (isset($_SESSION['time_slot_error'])) {
                                                                                                                                                                                                            echo '<span class="text-warning">' . $_SESSION['time_slot_error'] . '</span>';
                                                                                                                                                                                                        }
                                                                                                                                                                                                        ?></p>
                                                    <select name="time_slot" placeholder="Enter Delievery Date" id="time_slot" class="form-control" required style="background-color: #fff;height: inherit !important">
                                                        <option value="" selected>Select Time Slot</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <?php
                                    $ORDERID = 'FOOD_' . strtoupper(substr(md5(uniqid(mt_rand(), true)), 0, 5));
                                    ?>
                                    <input type="hidden" name="ORDERID" value="<?php echo $ORDERID ?>">
                                    <div class="checkout__order pb-0 row">
                                        <div class="mb-3 mt-3 choosestore" style="width:100%;padding-bottom: 0 !IMPORTANT;margin-bottom: 0 !important;">
                                            <h2 class="text-uppercase mycheckoutlabel" for="" style="margin-bottom: 10px;
                                                        font-weight: 500;
                                                        letter-spacing: 1px;
                                                    ">Choose <span>Outlet</span></h2>

                                            <div class="d-block">
                                                <div class="align-items-baseline" style="display: flex;gap: 7px;border: 1px dashed #5b9a5b;padding: 5px;margin-bottom: 10px;background: #e4ffc5;">
                                                    <label style="user-select: none; cursor:pointer;margin-bottom:0;font-size:14px;gap:8px" class="d-flex align-items-center">
                                                        <div class="heart-container" title="Like">
                                                            <input name="store" type="checkbox" class="checkbox" onclick="onlyOne1(this)" value="1" id="">
                                                            <div class="svg-container">
                                                                <svg viewBox="0 0 24 24" class="svg-outline" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M17.5,1.917a6.4,6.4,0,0,0-5.5,3.3,6.4,6.4,0,0,0-5.5-3.3A6.8,6.8,0,0,0,0,8.967c0,4.547,4.786,9.513,8.8,12.88a4.974,4.974,0,0,0,6.4,0C19.214,18.48,24,13.514,24,8.967A6.8,6.8,0,0,0,17.5,1.917Zm-3.585,18.4a2.973,2.973,0,0,1-3.83,0C4.947,16.006,2,11.87,2,8.967a4.8,4.8,0,0,1,4.5-5.05A4.8,4.8,0,0,1,11,8.967a1,1,0,0,0,2,0,4.8,4.8,0,0,1,4.5-5.05A4.8,4.8,0,0,1,22,8.967C22,11.87,19.053,16.006,13.915,20.313Z">
                                                                    </path>
                                                                </svg>
                                                                <svg viewBox="0 0 24 24" class="svg-filled" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M17.5,1.917a6.4,6.4,0,0,0-5.5,3.3,6.4,6.4,0,0,0-5.5-3.3A6.8,6.8,0,0,0,0,8.967c0,4.547,4.786,9.513,8.8,12.88a4.974,4.974,0,0,0,6.4,0C19.214,18.48,24,13.514,24,8.967A6.8,6.8,0,0,0,17.5,1.917Z">
                                                                    </path>
                                                                </svg>
                                                                <svg class="svg-celebrate" width="100" height="100" xmlns="http://www.w3.org/2000/svg">
                                                                    <polygon points="10,10 20,20"></polygon>
                                                                    <polygon points="10,50 20,50"></polygon>
                                                                    <polygon points="20,80 30,70"></polygon>
                                                                    <polygon points="90,10 80,20"></polygon>
                                                                    <polygon points="90,50 80,50"></polygon>
                                                                    <polygon points="80,80 70,70"></polygon>
                                                                </svg>
                                                            </div>
                                                        </div>

                                                        &nbsp; 07A, Ground Floor, Arunachal Building, Barakhamba Road, Connaught Place


                                                    </label>
                                                </div>
                                                <div class="align-items-baseline" style="display: flex;gap: 7px;border: 1px dashed #FF9800;padding: 5px;margin-bottom: 10px;background: #ffe3b9;">
                                                    <label style="user-select: none; cursor:pointer;margin-bottom:0;font-size:14px;gap:8px" class="d-flex align-items-center">
                                                        <div class="heart-container" title="Like">
                                                            <input name="store" type="checkbox" class="pt-2 checkbox" onclick="onlyOne1(this)" value="2" id="">
                                                            <div class="svg-container">
                                                                <svg viewBox="0 0 24 24" class="svg-outline" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M17.5,1.917a6.4,6.4,0,0,0-5.5,3.3,6.4,6.4,0,0,0-5.5-3.3A6.8,6.8,0,0,0,0,8.967c0,4.547,4.786,9.513,8.8,12.88a4.974,4.974,0,0,0,6.4,0C19.214,18.48,24,13.514,24,8.967A6.8,6.8,0,0,0,17.5,1.917Zm-3.585,18.4a2.973,2.973,0,0,1-3.83,0C4.947,16.006,2,11.87,2,8.967a4.8,4.8,0,0,1,4.5-5.05A4.8,4.8,0,0,1,11,8.967a1,1,0,0,0,2,0,4.8,4.8,0,0,1,4.5-5.05A4.8,4.8,0,0,1,22,8.967C22,11.87,19.053,16.006,13.915,20.313Z">
                                                                    </path>
                                                                </svg>
                                                                <svg viewBox="0 0 24 24" class="svg-filled" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M17.5,1.917a6.4,6.4,0,0,0-5.5,3.3,6.4,6.4,0,0,0-5.5-3.3A6.8,6.8,0,0,0,0,8.967c0,4.547,4.786,9.513,8.8,12.88a4.974,4.974,0,0,0,6.4,0C19.214,18.48,24,13.514,24,8.967A6.8,6.8,0,0,0,17.5,1.917Z">
                                                                    </path>
                                                                </svg>
                                                                <svg class="svg-celebrate" width="100" height="100" xmlns="http://www.w3.org/2000/svg">
                                                                    <polygon points="10,10 20,20"></polygon>
                                                                    <polygon points="10,50 20,50"></polygon>
                                                                    <polygon points="20,80 30,70"></polygon>
                                                                    <polygon points="90,10 80,20"></polygon>
                                                                    <polygon points="90,50 80,50"></polygon>
                                                                    <polygon points="80,80 70,70"></polygon>
                                                                </svg>
                                                            </div>
                                                        </div>
                                                        &nbsp; Ground Floor, DCM Building, Barakhamba Road, Connaught Place
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="checkout__order pb-0 row">
                                        <h5 class="mb-0 mycheckoutlabel text-uppercase">Billing & <span>Shipping</span></h5>
                                        <div class="col-12">
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6 col-sm-6">
                                                    <div class="checkout__form__input">
                                                        <p>Full Name <span>*</span></p>
                                                        <input type="text" name="fname" placeholder="Enter Your Full Name" id="fname" value="<?php echo $user_data['name'] ?>">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-6">

                                                    <div class="checkout__form__input">
                                                        <p>Town/City <span>*</span></p>
                                                        <input type="text" name="city" value="Delhi" id="Delhi" readonly>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-lg-12" id="showsindelievery">
                                            <div class="checkout__form__input">
                                                <p>Address <span class="text-danger text-uppercase"> (WE DELIVER ONLY AT BARAKHAMBA ROAD, KG MARG & Connaught Place)</span> </p>
                                                <input type="text" name="address" placeholder="Street Address" value="<?php echo $user_data['address'] ?>">
                                                <input type="text" class="mt-2" name="apartment" value="<?php echo $user_data['appartment'] ?>" placeholder="Apartment, suite etc ( optional )">
                                            </div>

                                            <div class="checkout__form__input">
                                                <p>Postcode/Zip <span>*</span></p>
                                                <input type="text" name="zip" id="zip" value="<?php echo $user_data['postcode'] ?>">
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6 col-sm-6">
                                                    <div class="checkout__form__input">
                                                        <p>Phone <span>*</span></p>
                                                        <input type="text" name="phone" placeholder="Enter Your Phone No." id="phone" value="<?php echo $user_data['mobile'] ?>">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-6">
                                                    <div class="checkout__form__input">
                                                        <p>Email <span>*</span></p>
                                                        <input type="email" name="email" placeholder="Enter Your Email" id="cus_email" value="<?php echo $user_data['email'] ?>">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 ">
                                    <div class="customer-box customer-coupon">
                                        <h3 class="font-15 xs-font-13" style="background-color: #42cd7d; color:white"><i class="icon anm anm-gift-l"></i> Have a coupon? <a href="#have-coupon" class=" text-decoration-underline" data-toggle="collapse">Click here to enter your code</a></h3>
                                        <div id="have-coupon" class="collapse coupon-checkout-content">
                                            <div class="discount-coupon">
                                                <div id="coupon" class="coupon-dec tab-pane active">
                                                    <div class="position-relative" style="background: #f2f2f29e;padding: 30px 20px;">
                                                        <div class="circle3"></div>
                                                        <div class="circle4"></div>
                                                        <label class="required get" for="coupon-code" style="    font-weight: 500;font-size: 16px;">Coupon</label>
                                                        <div class="couponinput-container">
                                                            <input required="" placeholder="Please Enter Coupon Code" id="couponcode" name="couponcode" type="text">
                                                            <button class="couponappy-btn" type="button" onclick="applycoupon()">
                                                                APPLY
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="your-order-payment">
                                        <div class="your-order">
                                            <h2 class="order-title mb-4">Your <span>Order</span></h2>

                                            <div class="table-responsive-sm order-table myorder-table">
                                                <table class="bg-white table table-bordered table-hover text-center">
                                                    <thead>
                                                        <tr>
                                                            <th class="text-left">Product </th>
                                                            <th>Price</th>
                                                            <th>Qty</th>
                                                            <th>Subtotal</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $ftotal = 0;
                                                        $cartArr = isset($_SESSION['cart']) ? $_SESSION['cart'] : array();

                                                        foreach ($cartArr as $key => $cart) {
                                                            $total = $cart['price'] * $cart['quantity'];
                                                            $ftotal += $total;
                                                            if ($cart['attribute'] != '') {
                                                                $attributeshow = '<span style="line-height: inherit;" class="ml-2 badge badge-success  badge-sm">' . $cart['attribute'] . '</span>';
                                                            } else {
                                                                $attributeshow = '';
                                                            }
                                                            $tiffin = !empty($cart['tiffin']) ? '<span class="imagetoptiffin">' . $cart['tiffin'] . '</span>' : '';
                                                        ?>
                                                            <tr>
                                                                <td class="text-left">
                                                                    <div class="d-flex align-items-center" style="width: 200px;">
                                                                        <img class="mr-3" src="<?php echo PRODUCT_IMAGE_SITE_PATH . $cart['dish_image'] ?>" style="width: 30px;">
                                                                        <div style="    display: flex;align-items: center;flex-wrap: wrap;justify-content: start;" class="font10check">
                                                                            <?php echo $cart['dish_name'] . $attributeshow ?>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td>Rs. <?php echo $cart['price'] ?></td>
                                                                <td><?php echo $cart['quantity'] ?></td>
                                                                <td>Rs. <?php echo $total; ?></td>
                                                            </tr>
                                                        <?php } ?>
                                                    </tbody>

                                                    <tfoot class="font-weight-600" style="color: var(--mainbtn); font-weight: bold;">
                                                        <tr>
                                                            <td colspan="3" class="text-right">Total (Inclusive Taxes) </td>
                                                            <td>Rs. <?php echo $ftotal; ?></td>
                                                        </tr>
                                                        <tr style="background: #e7ffb8; display:none" class="shopping-cart-total">
                                                            <td colspan="3" class="text-right ">
                                                                <h4>Coupon Code</h4>
                                                            </td>
                                                            <td> - <span class="coupon_code_str"></span></td>
                                                        </tr>
                                                        <tr style="background: #e7ffb8; display:none" class="shopping-cart-total">
                                                            <td colspan="3" class="text-right">
                                                                <h4>Final Price</h4>
                                                            </td>
                                                            <td><span class="final_price"></span></td>
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                            </div>

                                            <div class="table-responsive-sm order-table myorder-table2">
                                                <?php
                                                $ftotal = 0;
                                                $cartArr = isset($_SESSION['cart']) ? $_SESSION['cart'] : array();

                                                foreach ($cartArr as $key => $cart) {
                                                    $total = $cart['price'] * $cart['quantity'];
                                                    $ftotal += $total;
                                                    if ($cart['attribute'] != '') {
                                                        $attributeshow = '<span style="line-height: inherit;" class="ml-2 badge badge-success  badge-sm">' . $cart['attribute'] . '</span>';
                                                    } else {
                                                        $attributeshow = '';
                                                    }
                                                    $tiffin = !empty($cart['tiffin']) ? '<span class="imagetoptiffin">' . $cart['tiffin'] . '</span>' : '';
                                                ?>
                                                    <div class="mobcartshowdiv">
                                                        <div class="">
                                                            <div class="d-flex align-items-center">
                                                                <img class="mr-1" src="<?php echo PRODUCT_IMAGE_SITE_PATH . $cart['dish_image'] ?>" style="width: 30px;">
                                                                <div style="    display: flex;align-items: center;flex-wrap: wrap;justify-content: start;font-size: 12px;" class="font10check">
                                                                    <?php echo $cart['dish_name'] . $attributeshow ?>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="" style="font-size:10px">Rs. <?php echo $cart['price'] ?> X <?php echo $cart['quantity'] ?> = Rs. <?php echo $total; ?></div>

                                                    </div>
                                                <?php } ?>
                                                </tbody>

                                                <tfoot class="font-weight-600" style="color: var(--mainbtn); font-weight: bold;">
                                                    <div class="mobcarttotaldiv">
                                                        <span colspan="3" class="text-right">Total (Inclusive Taxes) </span>
                                                        <span>Rs. <?php echo $ftotal; ?></span>
                                                    </div>
                                                    <div style="background: #e7ffb8; display:none" class="shopping-cart-total">
                                                        <span colspan="3" class="text-right ">
                                                            <h4>Coupon Code</h4>
                                                        </span>
                                                        <span> - <span class="coupon_code_str"></span></span>
                                                    </div>
                                                    <div style="background: #e7ffb8; display:none" class="shopping-cart-total">
                                                        <span colspan="3" class="text-right">
                                                            <h4>Final Price</h4>
                                                        </span>
                                                        <span><span class="final_price"></span></span>
                                                    </div>
                                                </tfoot>
                                                </table>
                                            </div>


                                        </div>
                                        <div class="your-payment">
                                            <h2 class="payment-title mb-3">payment <span>method</span></h2>
                                            <div class="payment-method">
                                                <div class="payment-accordion">
                                                    <div id="accordion" class="payment-section">
                                                        <p style="font-size: 15px;">
                                                        <div class="radio-box">
                                                            <input type="radio" id="cod" name="payment_type" value="cod">
                                                            <label for="cod" id="codpayment"> <img src="<?php echo SITE_PATH ?>images/cash-on-delivery.png" alt="Cash On Delivery"></label>
                                                        </div>
                                                        <div class="radio-box">
                                                            <input type="radio" id="online" name="payment_type" value="online" class="mt-3" checked>
                                                            <label for="online" id="onlinepayment"> <img src="<?php echo SITE_PATH ?>images/mobile-shopping.png" alt="Online Payment"></label>
                                                        </div>

                                                        <img src="images/payment-img.jpg" alt="Payment">
                                                        <div class="checkout__order__widget" style="margin-top: 20px; border: 1px solid #80808069; padding: 10px; background: #eeeeee;">
                                                            <div class="">

                                                                <div class="checkbox-wrapper-12">
                                                                    <div class="cbx">
                                                                        <input type="checkbox" name="terms" id="terms" style="margin-bottom: 0 !important;">
                                                                        <label for="terms"></label>
                                                                        <svg width="15" height="14" viewBox="0 0 15 14" fill="none">
                                                                            <path d="M2 8.36364L6.23077 12L13 2"></path>
                                                                        </svg>
                                                                    </div>

                                                                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1">
                                                                        <defs>
                                                                            <filter id="goo-12">
                                                                                <feGaussianBlur in="SourceGraphic" stdDeviation="4" result="blur"></feGaussianBlur>
                                                                                <feColorMatrix in="blur" mode="matrix" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 22 -7" result="goo-12"></feColorMatrix>
                                                                                <feBlend in="SourceGraphic" in2="goo-12"></feBlend>
                                                                            </filter>
                                                                        </defs>
                                                                    </svg>

                                                                    <span class=""> I have read and agree to the website <a href="https://foodieez.co.in/terms-conditions/" class="woocommerce-terms-and-conditions-link" target="_blank">T & C</a></span>&nbsp;<abbr class="required" title="required">
                                                                </div>


                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="order-button-payment">
                                                        <?php if (isset($_SESSION['ATECHFOOD_USER_ID'])) {
                                                        ?>
                                                            <button type="submit" name="finalcheckout" value="Place Order" class="btn w-100 shadow-none btn-success finalcheckout">Place Order</button>

                                                        <?php } else {
                                                        ?>
                                                            <input type="button" value="Place Order" class="btn shadow-none btn-success" id="loginfirst"> <span id="loginfirsthtml"></span>
                                                        <?php
                                                        }
                                                        ?>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        <?php } else {
        ?>
            <div class="page section-header text-center p-0 m-0">
                <div class="page-title">
                    <div class="wrapper">
                        <h1 class="page-width"><span>Continue with</span> mobile number</h1>
                    </div>
                </div>
            </div>
            <div class="container-fluid py-4" style="background: url(images/illustrations/hero-header-bg.png);
    background-size: cover;
    background-position: revert;
    background-repeat: no-repeat;">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-6 col-lg-4 main-col offset-md-4" style="padding: 20px; background: #f9f9f9;box-shadow: 0px 0px 20px rgb(0 0 0 / 11%);border: 1px solid #dbdada;
    -webkit-box-shadow: 0px 0px 20px rgb(0 0 0 / 11%);">
                        <div class="mb-4">
                            <form method="post" id="loginformwithmobile" class="contact-form">
                                <div class="row">
                                    <div class="col-12 col-sm-12 col-md-12 col-lg-12">

                                        <div class="phone-input">
                                            <div class="flag-icon">
                                                <img src="<?php echo SITE_PATH ?>images/india.png" alt="Indian Flag">
                                                <span>+91 </span>
                                            </div>
                                            <input required type="tel" name="phone" placeholder="Enter Your Mobile No." id="loginmobile" autocorrect="off" autocapitalize="off" autofocus="on" style="margin-bottom: 0  !important;">
                                        </div>
                                        <div id="otpBOX">
                                        </div>
                                        <div id="invalidotp">
                                        </div>
                                    </div>
                                </div>
                                <div class="error_field"></div>
                                <input type="hidden" name="type" value="login">
                                <div class="row">
                                    <div class="text-center col-12 col-sm-12 col-md-12 col-lg-12">
                                        <div id="form_msg"></div>
                                        <button type="submit" class="btn btn-block btn-success mb-3 text-center shadow-none w-100" id="sendotp">Send OTP</button>
                                    </div>
                                </div>

                                <div class="prFeatures">
                                    <div class="row mb-0 pb-0">
                                        <div class="col-4 col-sm-4 col-md-4 col-lg-4 nowrap no-wrap feature">
                                            <img src="<?php echo SITE_PATH ?>images/credit-card.png" alt="Safe Payment" title="Safe Payment" />
                                            <div class="details">
                                                <h3>Safe Payment</h3>
                                            </div>
                                        </div>
                                        <div class="col-4 col-sm-4 col-md-4 col-lg-4 nowrap no-wrap feature">
                                            <img src="<?php echo SITE_PATH ?>images/worldwide.png" alt="Worldwide Delivery" title="Worldwide Delivery" />
                                            <div class="details">
                                                <h3>Fast Delivery</h3>
                                            </div>
                                        </div>
                                        <div class="col-4 col-sm-4 col-md-4 col-lg-4 nowrap no-wrap feature">
                                            <img src="<?php echo SITE_PATH ?>images/phone-call.png" alt="Hotline" title="Hotline" style="width:35px" />
                                            <div class="details">
                                                <h3>Hotline</h3> <?php echo $site_phone ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        <?php }
        ?>
        <!--End Body Content-->
        <?php include('includes/footer.php');  ?>
        <?php include('includes/scripts.php');  ?>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
        <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/AlertifyJS/1.13.1/alertify.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
        <script src="js/checkout.js"></script>
        <script>
            function applycoupon() {
                var couponcode = $("#couponcode").val();
                if (couponcode == "") {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Please Enter Coupon Code',
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 4000,
                        background: '#ff9999',
                    });
                } else {
                    $.ajax({
                        type: "post",
                        url: "action/check-coupon.php",
                        data: "couponcode=" + couponcode,
                        success: function(response) {
                            var response = JSON.parse(response);
                            if (response.status == "success") {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Success',
                                    text: response.msg,
                                    toast: true,
                                    position: 'top-end',
                                    showConfirmButton: false,
                                    timer: 4000,
                                    background: '#99ff99',
                                });
                                jQuery(".shopping-cart-total").show();
                                $("#couponsuccess").html(response.msg);
                                jQuery(".final_price").html("Rs. " + response.coupon_code_apply);
                                jQuery(".coupon_code_str").html(" Rs. " + response.value);
                                $(".coupon-btn").html("UPDATE");
                                $("#couponsuccess").show();
                            } else if (response.status == "percent") {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Success',
                                    text: response.msg,
                                    toast: true,
                                    position: 'top-end',
                                    showConfirmButton: false,
                                    timer: 4000,
                                    background: '#99ff99',
                                });
                                jQuery(".shopping-cart-total").show();
                                $("#couponsuccess").html(response.msg);
                                jQuery(".final_price").html(" Rs. " + response.coupon_code_apply);
                                jQuery(".coupon_code_str").html(response.value + "%");
                                $("#couponsuccess").show();
                            } else if (response.status == "error") {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: response.msg,
                                    toast: true,
                                    position: 'top-end',
                                    showConfirmButton: false,
                                    timer: 4000,
                                    background: '#ff9999',
                                });
                                $("#couponerror").delay(4000).fadeOut("slow");
                                $("#couponerror").show();
                            }
                        },
                    });
                }
            }
            $(document).ready(function() {
                $("#loginformwithmobile").validate({
                    rules: {
                        phone: {
                            required: true,
                            rangelength: [10, 10],
                            number: true,
                        },
                    },
                    highlight: function(element) {
                        $(element).addClass("error");
                    },
                    unhighlight: function(element) {
                        $(element).removeClass("error");
                    },
                    errorPlacement: function(error, element) {
                        // Do not show any error messages
                    },
                    submitHandler: function(form) {
                        var loginmobile = $("#loginmobile").val();
                        $('#sendotp').attr("disabled", true);
                        $('#sendotp').html("Please Wait...");
                        $.ajax({
                            type: "POST",
                            url: "action/send_login_otp.php",
                            data: {
                                phone: loginmobile
                            },
                            success: function(response) {
                                if (response.status === "success") {
                                    $("#loginmobile").attr("disabled", true);
                                    $('#sendotp').attr("disabled", false);
                                    $('#sendotp').html("Send OTP");
                                    $("#otpBOX").html(response.html);
                                    $('#sendotp').hide();
                                    OTPInput();
                                    initializeResendButton();


                                } else {
                                    $("#otpBOX").html(response.html);
                                    OTPInput();
                                    initializeResendButton();
                                }
                            }
                        });
                    },
                });
            });

            function OTPInput() {
                const inputs = document.querySelectorAll("#otp > *[id]");

                for (let i = 0; i < inputs.length; i++) {
                    inputs[i].addEventListener("input", function(event) {
                        const inputValue = event.data;
                        if (event.inputType === "deleteContentBackward" || event.key === "Backspace") {
                            if (inputValue === null || inputValue === "") {
                                if (i !== 0) {
                                    inputs[i - 1].value = "";
                                    inputs[i - 1].focus();
                                }
                            }
                        } else {
                            if (i === inputs.length - 1 && inputValue !== null && inputValue !== "") {
                                return true;
                            } else if (/^[0-9a-zA-Z]$/.test(inputValue)) {
                                inputs[i].value = inputValue;
                                if (i !== inputs.length - 1) inputs[i + 1].focus();
                            }
                        }
                    });

                    // Handle the Backspace key press separately
                    inputs[i].addEventListener("keydown", function(event) {
                        if (event.key === "Backspace" && i !== 0 && inputs[i].value === "") {
                            inputs[i - 1].value = "";
                            inputs[i - 1].focus();
                        }
                    });
                }
            }

            function initializeResendButton() {
                var count = 1;
                var resendButton = document.getElementById("ResendOTP");
                var countdown = 10;
                var resendTimer;

                function startTimer() {
                    resendButton.setAttribute("disabled", "disabled");
                    resendButton.innerHTML = "Resend (" + count + "/3)";

                    countdown = 10;
                    resendTimer = setInterval(function() {
                        countdown--;

                        if (countdown >= 0) {
                            var seconds = countdown;
                            resendButton.innerHTML =
                                "Resend (" + (seconds < 10 ? "0" : "") + seconds + ")";
                        } else {
                            clearInterval(resendTimer);
                            if (count < 3) {
                                resendButton.removeAttribute("disabled");
                                resendButton.innerHTML = "Resend";
                            } else {
                                resendButton.remove();
                            }
                        }
                    }, 1000);
                }

                resendButton.addEventListener("click", function() {
                    if (!resendButton.hasAttribute("disabled")) {
                        count++;
                        if (count <= 3) {
                            startTimer();
                            //box show (hit again)
                        }
                    }
                });
                startTimer();
            }
            $(document).on("click", ".validatethis", function(e) {
                var loginmobile = $("#loginmobile").val();
                e.preventDefault();
                const inputs = document.querySelectorAll("#otp input");
                const numbers = [];
                inputs.forEach(function(input) {
                    const value = parseInt(input.value);
                    if (!isNaN(value)) {
                        numbers.push(value);
                    }
                });
                const numberString = numbers.join("");

                $('.validatethis').prop("disabled", true).html("Please Wait...");
                $.ajax({
                    type: "post",
                    url: "action/validate_otp.php",
                    data: {
                        numbers: numberString,
                        loginmobile: loginmobile
                    },
                    success: function(response) {
                        if (response.trim() == "success") {
                            var success_html =
                                '<div class="alert alert-success d-flex align-items-center" role="alert"><div>OTP VALIDATED SUCCESSFULLY !! Redirecting...</div></div>';
                            $("#otpBOX").html(success_html);
                            setTimeout(function() {
                                location.reload();
                            }, 1000);
                        } else {
                            var fail_html =
                                '<div class="alert alert-warning d-flex align-items-center" role="alert"><div>INVALID OTP !!</div></div>';
                            $("#invalidotp").html(fail_html);
                        }
                    },
                    complete: function() {
                        $('.validatethis').prop("disabled", false).html("Continue");
                    }
                });

            });
        </script>
        <script>
            $(document).ready(function() {
                $("#checkmain").validate({
                    rules: {
                        fname: {
                            required: true,
                        },
                        phone: {
                            required: true,
                            rangelength: [10, 12],
                            number: true,
                        },
                        zip: {
                            required: true,
                            number: true,
                        },
                        address: {
                            required: true,
                        },
                        city: {
                            required: true,
                        },
                        email: {
                            required: true,
                            email: true,
                        },
                        time_slot: {
                            required: true,
                        },
                        delievery_date: {
                            required: true,
                        },
                    },
                    highlight: function(element) {
                        $(element).addClass("error");
                    },
                    unhighlight: function(element) {
                        $(element).removeClass("error");
                    },
                    errorPlacement: function(error, element) {
                        // Do not show any error messages
                    },
                    submitHandler: function(form) {
                        var zip = $("#zip").val();
                        var Delhi = $("#Delhi").val();
                        var inputValue1 = $('input[name="delieverytype"]:checked').val();
                        if ($('input[name="store"]:checked').length == 0) {
                            showError('Please Choose your Nearest store !!');
                            $('input[name="store"]').focus();
                            return false;
                        }

                        if (zip !== "110001" && inputValue1 == "Delivery") {
                            showError('We Only Deliver in 110001, BARAKHAMBA ROAD, KG MARG & CONNAUGHT PLACE');
                            $("#zip").focus();
                            return false;
                        }

                        if (Delhi !== "Delhi") {
                            showError('We only deliver in Delhi');
                            $("#Delhi").focus();
                            return false;
                        }

                        if ($('input[name="terms"]:checked').length == 0) {
                            showError('Please Accept Terms and Conditions !!');
                            $('input[name="terms"]').focus();
                            return false;
                        }

                        var paymenttype = $('input[name="payment_type"]:checked').val();
                        if (paymenttype !== '') {
                            $(".finalcheckout").prop("disabled", true).html('<div style="width: 1rem !important; height: 1rem !important;" class="spinner-grow" role="status"><span class="sr-only">Loading...</span></div> Processing...');
                            if (paymenttype == "online") {
                                $(".maincheckout").attr("value", "Processing...");
                                $(".maincheckout").attr("disabled", true);
                                form.submit();
                                $(".maincheckout").attr("disabled", false);
                            } else if (paymenttype == "cod") {
                                $.post(SITE_PATH + "action/check_order.php", $("#checkmain").serialize())
                                    .done(function(response) {
                                        window.location.href = SITE_PATH + "success?ORDER_ID=" + response + "";
                                    })
                                    .fail(function() {
                                        showError('Something Went Wrong. Please Try Again');
                                    })
                                    .always(function() {
                                        $(".finalcheckout").prop("disabled", false).html("Checkout");
                                    });
                            } else {
                                showError('Please Choose Payment Mode');
                            }
                            return false;
                        } else {
                            showError('Please Choose Payment Mode');
                            return false;
                        }



                    },
                });
            });

            function showError(message) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: message,
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 4000,
                    background: '#ff9999',
                });
            }
        </script>
        <?php
        if (isset($_SESSION['COUPON_CODE'])) {
            unset($_SESSION['COUPON_CODE']);
            unset($_SESSION['FINAL_PRICE']);
        }
        ?>
</body>

</html>