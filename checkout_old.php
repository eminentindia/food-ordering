<?php
include('includes/header.php'); ?>

<?php include('smtp/PHPMailerAutoload.php'); ?>
<?php
$cartErr = '';
if (isset($_POST['finalcheckout'])) {
    if ($cart_min_price != '') {
        if ($totalPrice >= $cart_min_price) {
            $cname = safe_value($conn, $_POST['name']);
            $cemail = safe_value($conn, $_POST['email']);
            $cphone = safe_value($conn, $_POST['phone']);
            $caddress = safe_value($conn, $_POST['address']);
            $cappartment = safe_value($conn, $_POST['appartment']);
            $cpostcode = safe_value($conn, $_POST['postcode']);
            $city = safe_value($conn, $_POST['city']);
            $cpayment_type = safe_value($conn, $_POST['payment_type']);
            if (isset($_SESSION['COUPON_CODE']) && isset($_SESSION['FINAL_PRICE'])) {
                $coupon_code = safe_value($conn, $_SESSION['COUPON_CODE']);
                $final_price = safe_value($conn, $_SESSION['FINAL_PRICE']);
            } else {
                $coupon_code = '';
                $final_price = $totalPrice;
            }

            $added_on = date('Y-m-d h:i:s');
            $sql = "insert into orders(user_id,name,email,phone,address,appartment,postcode,city,total_price,coupon_code,final_price,payment_type,order_status,payment_status,added_on) values('" . $_SESSION['ATECHFOOD_USER_ID'] . "','$cname','$cemail','$cphone','$caddress','$cappartment','$cpostcode','$city','$totalPrice','$coupon_code','$final_price','$cpayment_type','1','pending','$added_on')";
            mysqli_query($conn, $sql);

            $insert_id = mysqli_insert_id($conn);
            $_SESSION['ORDER_ID'] = $insert_id;
            foreach ($cartArr as $key => $val) {
                mysqli_query($conn, "insert into order_details(order_id,dish_details_id,price,qty) values('$insert_id','$key','" . $val['price'] . "','" . $val['qty'] . "')");
            }

            $email = $_SESSION['email'];
            if ($cpayment_type == 'cod') {
                $emailHTML = orderemail($conn, $insert_id);
                send_email($email, $emailHTML, 'Order Placed', $smtp_email, $smtp_password);
                emptyCart();
                header('Location:success');
            } else if ($cpayment_type == 'wallet') {
                managewallet($_SESSION['ATECHFOOD_USER_ID'], $final_price, 'out', 'Order ID-' . $insert_id);
                mysqli_query($conn, "update  orders set payment_status='success' where ID='$insert_id'");
                $emailHTML = orderemail($conn, $insert_id);

                send_email($email, $emailHTML, 'Order Placed', $smtp_email, $smtp_password);
                emptyCart();
                header('Location:success');
            } else if ($cpayment_type == 'online') {
                //payment gateway

                $paytm_oid = "ATECHFOOD" . $_SESSION['ATECHFOOD_USER_ID'] . '_' . $insert_id;
                $html = '<form method="post" action="PaytmKit/pgRedirect.php" name="frmPayment" style="display:none;">
                        <input id="ORDER_ID" tabindex="1" maxlength="20" size="20"
                                    name="ORDER_ID" autocomplete="off"
                                    value="' . $paytm_oid . '">
                                <input id="CUST_ID" tabindex="2" maxlength="12" size="12" name="CUST_ID" autocomplete="off" value="' . $_SESSION['ATECHFOOD_USER_ID'] . '"><input id="INDUSTRY_TYPE_ID" tabindex="4" maxlength="12" size="12" name="INDUSTRY_TYPE_ID" autocomplete="off" value="Retail"><input id="CHANNEL_ID" tabindex="4" maxlength="12" size="12" name="CHANNEL_ID" autocomplete="off" value="WEB"><input title="TXN_AMOUNT" tabindex="10" type="text" name="TXN_AMOUNT" value="' . $final_price . '"><input value="CheckOut" type="submit"	onclick=""></td></form><script type="text/javascript">document.frmPayment.submit();
                    
                </script>';
                echo $html;
            }
        } else {
            $cartErr = 'yes';
        }
    }
}

?>
<?php
if ($website_close == '1') {
    echo '<script>window.location.href="' . SITE_PATH . '";</script>';
}
?>
<?php
if (count($cartArr) > 0) {
} else {
    echo '<script>window.location.href="' . SITE_PATH . '";</script>';
}
?>

<body class="page-template belle">
    <?php include('includes/navbar.php') ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
    <style>
        .error {
            color: #ff5a5a;
        }

        /* //for coupon bydefault  */
        .coupon-card {
            background: radial-gradient(circle at 10% 20%, rgb(14 47 6) 0%, rgb(99 213 123) 90%);
            color: #fff;
            text-align: center;
            padding: 10px;
            border-radius: 15px;
            box-shadow: 0 10px 10px 0 rgba(0, 0, 0, 0.15);
            position: relative;

        }

        .logo {
            width: 80px;
            border-radius: 8px;
            margin-bottom: 20px;

        }

        .coupon-card h3 {
            font-size: 18px;
            font-weight: 400;
            line-height: 20px;
            border-radius: 10px;

        }

        .coupon-card p {
            font-size: 15px;
            color: #FFC107;

        }

        .coupon-row {
            display: flex;
            align-items: center;
            margin: 15px auto;
            width: fit-content;

        }

        #cpnCode {
            border: 1px dashed #fff;
            padding: 10px 20px;
            border-right: 0;

        }

        #cpnBtn {
            border: 1px solid #fff;
            background: #fff;
            padding: 10px 20px;
            color: #7158fe;
            cursor: pointer;
        }

        .circle1,
        .circle2 {
            background: #a9ffbbc9;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            position: absolute;
            top: 50%;
            transform: translateY(-50%);

        }

        .circle3 {
            background: #f8f8f8a3;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            position: absolute;
            top: 0;
            transform: translateY(-50%);

        }

        .circle4 {
            background: #f8f8f8e0;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            position: absolute;
            bottom: -40px;
            transform: translateY(-50%);
        }

        .circle1 {
            left: -25px;
        }

        .circle2 {
            right: -25px;
        }

        .circle3 {
            left: -25px;
        }

        .circle4 {
            right: -25px;
        }

        /* coupon end  */
    </style>
    <div id="page-content">
        <div class="container-fluid mt-5">
            <div class="row billing-fields">
                <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 sm-margin-30px-bottom">
                    <?php
                    if (isset($_SESSION['ATECHFOOD_USER_ID']) == 0) {
                    ?>
                        <div class="customer-box returning-customer">
                            <h3><i class="icon anm anm-user-al"></i> Returning customer? <a href="#customer-login" id="customer" class=" text-decoration-underline " data-toggle="collapse">Click here to login</a></h3>
                            <div id="customer-login" class="collapse customer-content">
                                <div class="customer-info">

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
                    <form method="POST" enctype="multipart/form-data" id="checkoutFrm">
                        <div class="create-ac-content bg-light-gray padding-20px-all">

                            <fieldset>
                                <h2 class="login-title mb-3">Billing details</h2>
                                <div class="row">
                                    <div class="form-group col-md-6 col-lg-6 col-xl-6 required">
                                        <label for="input-firstname">First Name <span class="required-f">*</span></label>
                                        <input name="name" required id="name" readonly type="text" value="<?php if (isset($_SESSION['name'])) {
                                                                                                                echo  $_SESSION['name'];
                                                                                                            } ?>">
                                    </div>
                                    <div class="form-group col-md-6 col-lg-6 col-xl-6 required">
                                        <label for="input-email">E-Mail <span class="required-f">*</span></label>
                                        <input name="email" required type="email" readonly id="email" value="<?php if (isset($_SESSION['email'])) {
                                                                                                                    echo  $_SESSION['email'];
                                                                                                                } ?>">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6 col-lg-6 col-xl-6 required">
                                        <label for="input-telephone">Phone <span class="required-f">*</span></label>
                                        <input name="phone" id="phone" type="tel" required>
                                    </div>
                                    <div class="form-group col-md-6 col-lg-6 col-xl-6 required">
                                        <label for="input-address-1">Address <span class="required-f">*</span></label>
                                        <input id="address" name="address" type="text" required>
                                    </div>

                                </div>
                            </fieldset>

                            <fieldset>
                                <div class="row">


                                    <div class="form-group col-md-6 col-lg-6 col-xl-6">
                                        <label for="input-address-2">Apartment <span class="required-f">*</span></label>
                                        <input name="appartment" required id="appartment" type="text">
                                    </div>
                                    <div class="form-group col-md-6 col-lg-6 col-xl-6 required">
                                        <label for="input-postcode">Post Code <span class="required-f">*</span></label>
                                        <input name="postcode" required id="postcode" type="text">
                                    </div>
                                </div>
                                <div class="row">

                                    <div class="form-group col-md-6 col-lg-6 col-xl-6 required">
                                        <label for="input-city">City <span class="required-f">*</span></label>
                                        <input name="city" required id="city" type="text">
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                </div>

                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                    <div class="customer-box customer-coupon">
                        <h3 class="font-15 xs-font-13" style="background-color: #42cd7d; color:white"><i class="icon anm anm-gift-l"></i> Have a coupon? <a href="#have-coupon" class=" text-decoration-underline" data-toggle="collapse">Click here to enter your code</a></h3>
                        <div id="have-coupon" class="collapse coupon-checkout-content">
                            <div class="discount-coupon">
                                <div id="coupon" class="coupon-dec tab-pane active">
                                    <div class="position-relative" style="background: #f2f2f29e;padding: 30px 20px;">
                                        <div class="circle3"></div>
                                        <div class="circle4"></div>
                                        <label class="required get" for="coupon-code" style="    font-weight: 500;font-size: 16px;">Coupon</label>
                                        <input id="couponcode" name="couponcode" type="text" class="mb-3">
                                        <button class="coupon-btn btn shadow-none btn-success btn-sm badge" type="button" onclick="applycoupon()">Apply</button>
                                    </div>
                                    <p id="couponerror" class="mt-3 errmsg"></p>
                                    <p id="couponsuccess" class="mt-3 successmsg"></p>
                                    <div class="coupon-card mt-3">
                                        <h3>Rakshabandhan Discount 20% OFF</h3>
                                        <di class="coupon-row">
                                            <span id="cpnCode">NEW</span>
                                            <span id="cpnBtn">Copy Code</span>
                                        </di>
                                        <p>Valid Till: 20Dec, 2021</p>
                                        <div class="circle1"></div>
                                        <div class="circle2"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="your-order-payment">
                        <div class="your-order">
                            <h2 class="order-title mb-4">Your Order</h2>

                            <div class="table-responsive-sm order-table">
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
                                        foreach ($cartArr as $key => $cart) {

                                            $total = $cart['price'] * $cart['qty'];

                                        ?>
                                            <tr>
                                                <td class="text-left">
                                                    <img class="mr-3" src="<?php echo PRODUCT_IMAGE_SITE_PATH . $cart['image'] ?>" style="width: 50px;">
                                                    <?php echo $cart['dish'] ?>
                                                </td>
                                                <td>Rs. <?php echo $cart['price'] ?></td>

                                                <td><?php echo $cart['qty'] ?></td>
                                                <td>Rs. <?php echo $total; ?></td>

                                            </tr>
                                        <?php } ?>
                                    </tbody>

                                    <tfoot class="font-weight-600">

                                        <tr>
                                            <td colspan="3" class="text-right">Total</td>
                                            <td>Rs. <?php echo $totalPrice; ?></td>

                                        </tr>
                                        <tr style="background: #e7ffb8;" class="shopping-cart-total">
                                            <td colspan="3" class="text-right ">

                                                <h4>Coupon Code</h4>

                                            </td>
                                            <td> - <span class="coupon_code_str"></span></td>

                                        </tr>
                                        <tr style="background: #e7ffb8;" class="shopping-cart-total">
                                            <td colspan="3" class="text-right">

                                                <h4>Final Price</h4>

                                            </td>
                                            <td><span class="final_price"></span></td>

                                        </tr>



                                    </tfoot>
                                </table>
                            </div>
                        </div>

                        <hr />

                        <div class="your-payment">
                            <h2 class="payment-title mb-3">payment method</h2>
                            <div class="payment-method">
                                <div class="payment-accordion">
                                    <div id="accordion" class="payment-section">
                                        <style>
                                            .radio-box {

                                                margin: 5px;
                                                display: inline-block;
                                                border-radius: 5px;
                                                background-color: #fff;
                                                position: relative;
                                                cursor: pointer;
                                                transition: background-color 0.3s;
                                                cursor: pointer;
                                                user-select: none;
                                            }

                                            .radio-box input[type="radio"] {
                                                position: absolute;
                                                top: 0;
                                                left: 0;
                                                cursor: pointer;
                                                user-select: none;
                                                opacity: 0;
                                                z-index: 1;
                                            }
                                            .radio-box label {
                                                position: relative;
                                                z-index: 2;
                                                cursor: pointer;
                                                vertical-align: middle;
                                                padding: 10px;
                                                border: 1px solid rgb(211 211 211) ;
                                            }
                                            .radio-box input[type="radio"]:checked+label {
                                                background: radial-gradient(circle at 10% 20%, rgb(253 125 22) 0%, rgb(255 195 53) 90%);
                                                cursor: pointer;
                                                color: #fff;
                                                transform: scale(1.1);
                                                transition: transform .4s ease-in-out;
                                            }

                                            .radio-box input[type="radio"]:checked~.radio-bg {
                                                animation: bgScale 0.5s ease-in-out;
                                            }

                                            @keyframes bgScale {
                                                0% {
                                                    transform: scale(0);
                                                }

                                                100% {
                                                    transform: scale(1);
                                                }
                                            }

                                            .radio-bg {
                                                position: absolute;
                                                top: 0;
                                                cursor: pointer;
                                                left: 0;
                                                width: 100%;
                                                height: 100%;
                                                background: radial-gradient(circle at 10% 20%, rgb(253 125 22) 0%, rgb(255 195 53) 90%);
                                                transform-origin: center;
                                                z-index: 0;
                                            }
                                        </style>
                                        <p style="font-size: 15px;">
                                        <div class="radio-box">
                                            <input type="radio" id="cod" name="payment_type" value="cod">
                                            <label for="cod">Cash On Delivery</label>
                                        </div>
                                        <div class="radio-box">
                                            <input type="radio" id="online" name="payment_type" value="online" class="mt-3" checked>
                                            <label for="online">Online</label>
                                        </div>
                                        <?php
                                        if (isset($_SESSION['ATECHFOOD_USER'])) {
                                            $is_dis = '';
                                            $low_msg = '';

                                            if ($getuserwalletamt <= $totalPrice) {
                                                $is_dis = 'disabled="disabled"';
                                                $low_msg = '(Low Wallet Money)';
                                            }
                                        ?>
                                            <div class="radio-box">
                                                <input type="radio" id="wallet" name="payment_type" value="wallet" class="mt-3" <?php echo $is_dis ?>>
                                                <label for="wallet">Wallet  <span style="color:#fb5151;font-size:12px;"> <?php echo $low_msg; ?> </span></label>
                                               
                                            </div>
                                        <?php
                                        }
                                        ?>

                                        <img src="images/payment-img.jpg" alt="Payment">
                                    </div>

                                    <div class="order-button-payment">

                                        <?php if (isset($_SESSION['name'])) {
                                        ?>
                                            <input type="submit" name="finalcheckout" value="Place Order" class="btn w-100 shadow-none btn-success">

                                        <?php } else {
                                        ?>

                                            <input type="button" value="Place Order" class="btn shadow-none btn-success" id="loginfirst"> <span id="loginfirsthtml"></span>
                                        <?php
                                        }
                                        ?>

                                    </div>


                                </div><?php
                                        if ($cartErr == 'yes') {
                                            echo '<p style="margin-top: 15px;
                                        border: 2px dashed #ffe130;
                                        color: #644704;
                                        padding: 5px 15px;
                                        border-radius: 5px;
                                        background: #fff6c0;">' . $cart_min_price_msg . '</p>';
                                        }
                                        ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>
    <!--End Body Content-->
    <?php include('includes/footer.php');  ?>
    <?php include('includes/scripts.php');  ?>
    <script>
        $("#loginfirst").click(function(e) {
            e.preventDefault();
            $("#loginfirsthtml").html("Please Login to Continue...");
        });
    </script>
    <script>
        $("#invalidemail").hide();
        $("#invalidemail").hide();
        $("#errorpassword").hide();
        $("#loginsuccess").hide();
        $('#loginnow').click(function(e) {
            e.preventDefault();
            var loginemail = document.getElementById("loginemail").value;
            var loginpassword = document.getElementById("loginpassword").value;
            if (loginemail == '') {
                $("#invalidemail").html("Please Enter Your Email");
                $("#invalidemail").show();
                $("#email").focus();
                $("#invalidemail").delay(4000).fadeOut("slow");
                return false;
            } else if (loginpassword == '') {
                $("#errorpassword").html("Please Enter Password");
                $("#errorpassword").show();
                $("#password").focus();
                $("#errorpassword").delay(4000).fadeOut("slow");
                return false;
            } else {
                document.getElementById("loginnow").innerHTML = "Please Wait..";
                $.ajax({
                    type: "post",
                    url: "action/login-action.php",
                    data: 'email=' + loginemail + '&password=' + loginpassword,
                    success: function(response) {
                        document.getElementById("loginnow").innerHTML = "Login";
                        var response = JSON.parse(response);
                        if (response.invalidemail == true) {
                            $("#invalidemail").html("Please Enter Valid Email");
                            $("#invalidemail").show();
                            $("#loginemail").focus();
                            $("#invalidemail").delay(4000).fadeOut("slow");
                            return false;
                        } else if (response.emailnotfound == true) {
                            $("#invalidemail").html("Email Not Found !");
                            $("#invalidemail").show();
                            $("#loginemail").focus();
                            $("#invalidemail").delay(3000).fadeOut("slow");
                            return false;
                        } else if (response.passwordincorrect == true) {
                            $("#errorpassword").html("Please Enter Correct Password!");
                            $("#errorpassword").show();
                            $("#errorpassword").focus();
                            $("#errorpassword").delay(3000).fadeOut("slow");
                            return false;
                        } else if (response.notactive == true) {
                            $("#invalidemail").html(
                                "Your Email is not active. Please check your email to activate your account !"
                            );
                            $("#invalidemail").show();
                            $("#invalidemail").delay(9000).fadeOut("slow");
                            return false;
                        } else if (response.success == true) {
                            $('#loginform')[0].reset();
                            window.location.reload();
                        }
                    }
                });
            }

        });
    </script>
    <script>
        $('.shopping-cart-total').hide();
        $('#couponerror').hide();
        $('#couponsuccess').hide();

        function applycoupon() {
            var couponcode = $('#couponcode').val();
            if (couponcode == '') {
                $('#couponerror').html('Please Enter Coupon Code');
                $('#couponerror').show();

            } else {
                $.ajax({
                    type: "post",
                    url: "action/check-coupon.php",
                    data: 'couponcode=' + couponcode,
                    success: function(response) {
                        var response = JSON.parse(response);
                        if (response.status == 'success') {
                            jQuery('.shopping-cart-total').show();
                            $("#couponsuccess").html(response.msg);
                            jQuery('.final_price').html('Rs. ' + response.coupon_code_apply);
                            jQuery('.coupon_code_str').html(' Rs. ' + response.value);
                            $('.coupon-btn').html('UPDATE')
                            $('#couponsuccess').show();
                        }
                        if (response.status == 'percent') {
                            jQuery('.shopping-cart-total').show();
                            $("#couponsuccess").html(response.msg);
                            jQuery('.final_price').html(' Rs. ' + response.coupon_code_apply);
                            jQuery('.coupon_code_str').html(response.value + '%');

                            $('#couponsuccess').show();
                        }
                        if (response.status == 'error') {
                            $("#couponerror").html(response.msg);
                            $("#couponerror").delay(4000).fadeOut("slow");
                            $('#couponerror').show();

                        }
                    }
                });
            }
        }
    </script>




    <script>
        $(document).ready(function() {
            $('#checkoutFrm').validate({
                rules: {
                    name: {
                        required: true
                    },
                    email: {
                        required: true,
                        email: true
                    },
                    phone: {
                        required: true,
                        rangelength: [10, 12],
                        number: true
                    },
                    address: {
                        required: true,
                    },
                    appartment: {
                        required: true,

                    },
                    postcode: {
                        required: true,
                        number: true
                    },
                    city: {
                        required: true,
                    }
                },
            });

        });
    </script>

    <script>
        //automatic coupon
        var cpnBtn = document.getElementById("cpnBtn");
        var cpnCode = document.getElementById("cpnCode");

        cpnBtn.onclick = function() {
            navigator.clipboard.writeText(cpnCode.innerHTML);
            cpnBtn.innerHTML = "COPIED";
            setTimeout(function() {
                cpnBtn.innerHTML = "COPY CODE";
            }, 3000);
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