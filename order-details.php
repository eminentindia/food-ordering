<?php include('includes/header.php');  ?>

<?php
$uid = $_SESSION['ATECHFOOD_USER_ID'];
$conn = _connectodb();
$getorder = getorder($conn);
$orderID = safe_value($conn, $_GET['id']);
$getsingleorder = getsingleorderBYuser($conn, $orderID);
$getsingleorder = json_decode($getsingleorder, true);

if (count($getsingleorder) == '' || count($getsingleorder) == 0) {
    echo '<script>window.location.href="' . SITE_PATH . 'orders.php";</script>';
}

if (!isset($_SESSION['ATECHFOOD_USER']) && !isset($_SESSION['ATECHFOOD_USER_ID'])) {
    echo '<script>window.location.href="' . SITE_PATH . 'index.php";</script>';
}
?>
<style>
    .table {
        font-size: 12px !important;
    }

    .wishlist-table .table-bordered,
    .wishlist-table .table-bordered td,
    .wishlist-table .table-bordered th {
        vertical-align: middle;
        white-space: nowrap;
        border: 1px solid #678f2329;
    }


    .order-tracking {
        text-align: center;
        /* width: 33.33%; remove cmnt if need takeaway */
        width: 50%;

        position: relative;
        display: block;
    }

    .order-tracking .is-complete {
        display: block;
        position: relative;
        border-radius: 50%;
        height: 30px;
        width: 30px;
        border: 0px solid #AFAFAF;
        background-color: #f7be16;
        margin: 0 auto;
        transition: background 0.25s linear;
        -webkit-transition: background 0.25s linear;
        z-index: 2;
    }

    .order-tracking .is-complete:after {
        display: block;
        position: absolute;
        content: '';
        height: 14px;
        width: 7px;
        top: -2px;
        bottom: 0;
        left: 5px;
        margin: auto 0;
        border: 0px solid #AFAFAF;
        border-width: 0px 2px 2px 0;
        transform: rotate(45deg);
        opacity: 0;
    }

    .order-tracking.completed .is-complete {
        border-color: #678f23;
        border-width: 0px;
        background-color: #678f23;
    }

    .order-tracking.completed .is-complete:after {
        border-color: #fff;
        border-width: 0px 3px 3px 0;
        width: 7px;
        left: 11px;
        opacity: 1;
    }

    .order-tracking p {
        color: #A4A4A4;
        font-size: 16px;
        margin-top: 8px;
        margin-bottom: 0;
        line-height: 20px;
    }

    .order-tracking p span {
        font-size: 10px;
        color: grey;
        line-height: normal;
        display: block;
    }

    .order-tracking.completed p {
        color: #4d4d4d;
        font-size: 12px;
    }

    .order-tracking::before {
        content: '';
        display: block;
        height: 3px;
        width: calc(100% - 40px);
        background-color: #f7be16;
        top: 13px;
        position: absolute;
        left: calc(-50% + 20px);
        z-index: 0;
    }

    .order-tracking:first-child:before {
        display: none;
    }

    .order-tracking.completed:before {
        background-color: #678f23;
    }

    .order-tracking .is-completecancel {
        display: block;
        position: relative;
        border-radius: 50%;
        height: 30px;
        width: 30px;
        border: 0px solid #AFAFAF;
        background-color: #f24343;
        margin: 0 auto;
        transition: background 0.25s linear;
        -webkit-transition: background 0.25s linear;
        z-index: 2;
    }

    .order-tracking.cancel:before {
        background-color: #f24343;
    }

    .table td,
    .table th {
        padding: .75rem;
        vertical-align: unset;
        border-top: 0;
    }

    .lds-dual-ring.hidden {
        display: none;
    }

    .lds-dual-ring {
        display: inline-block;
        width: 80px;
        height: 80px;
    }

    .lds-dual-ring:after {
        content: " ";
        display: block;
        width: 64px;
        height: 64px;
        margin: 5% auto;
        border-radius: 50%;
        border: 6px solid #fff;
        border-color: #ffffff transparent #ffffff transparent;
        position: absolute;
        animation: lds-dual-ring .3s linear infinite;
        top: 40%;
        left: 50%;
        margin-left: -25px;
    }

    @keyframes lds-dual-ring {
        0% {
            transform: rotate(0deg);
        }

        100% {
            transform: rotate(360deg);
        }
    }


    .overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100vh;
        background: rgb(255 163 95 / 80%);
        z-index: 999;
        opacity: 1;
        overflow: hidden;
        transition: all 0.5s;
    }

    button.btn.btn-green.btn-sm.badge.badge-success.p-2.btn-sm.badge-sm {
        font-size: 10px;
    }
</style>

<body class="contact-template page-template belle">
    <?php include('includes/navbar.php') ?>

    <div id="page-content">
        <!--Page Title-->
        <div class="bredcrumbWrap">
            <div class="container breadcrumbs">
                <a href="<?= SITE_PATH ?>" title="Home">Home</a>
                <a href="<?= SITE_PATH ?>orders" title="Orders"><span aria-hidden="true"> › </span>Orders</a>
                <span aria-hidden="true"> › </span>Order Details</a>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-5 col-lg-5 main-col" style="background: #e9ffc4;font-size: 1rem;    margin-bottom: 20px;
    padding-bottom: 20px;">
                    <?php
                    foreach ($getsingleorder as $order) {
                        extract($order);
                        $date = formatDateTime($order['order_added_on']);
                        $delivery_date = formatDateTime($order['delievery_date']);
                        $couponcode = $order['coupon_code'];
                        $delievery_time = $order['delievery_time'];


                    ?>
                        <p class="p-2 mt-5"> <strong>Payment Type:</strong> <?php echo strtoupper($order['payment_type']) ?></p>
                        <p class="p-2"> <strong>Payment Status:</strong> <?php echo ucwords($order['paymentstatus']) ?></p>
                        <p class="p-2"> <strong>Order Status:</strong> <span id="efwe"><?php echo ucwords($order['status']) ?></span></p>
                        <p class="p-2"> <strong>Order Date:</strong> <?php echo $date ?></p>
                        <p class="p-2"> <strong>Delivery Date:</strong> <?php echo $delivery_date ?></p>
                        <p class="p-2"> <strong>Delivery Time:</strong> <?php echo $delievery_time ?></p>

                        <?php if ($order['paymentstatus'] != 'captured' && $order['order_status'] == '1') { ?>
                            <!-- <form id="cancelOrder" method="post">
                                <input type="hidden" name="ID" value="<?php echo $order['ID']; ?>">
                                <input type="hidden" name="user_email" value="<?php echo $order['email']; ?>">
                                <button class="btn btn-danger mb-4" id="CancelorderBtn" type="button">Cancel Order</button>
                            </form>
                            <p id="cancelordersuccess" style="margin-left: 8px;color: #d0a117;font-size: 15px;margin-bottom: 20px"></p> -->
                        <?php } ?>



                    <?php } ?>
                </div>
                <div class="col-12 col-sm-12 col-md-7 col-lg-7 main-col" style="border: 2px dashed #e9ffc4;">
                    <div class="table-responsive">
                        <table class="table table-striped">

                            <tr>
                                <th></th>
                                <th>Dish</th>
                                <th>Price</th>
                                <th>Qty</th>
                                <th>Total</th>
                                <?php if ($order['order_status'] == '4') { ?>
                                    <th>Order Again</th>
                                <?php } ?>
                            </tr>
                            <?php
                            $getorderdetails = getorderdetails($conn, $order['ID']);
                            $total = 0;
                            foreach ($getorderdetails as $orderattr) {
                                // echo '<pre>';
                                // print_r($orderattr);

                                $price = $orderattr['price'];
                                $quantity = $orderattr['qty'];
                                $total += $quantity * $price;

                                $dish_order_id = $orderattr['dish_order_id'];
                                $sel = "SELECT * FROM dish WHERE ID='$dish_order_id'";
                                $sql1 = mysqli_query($conn, $sel);
                                $sql2 = mysqli_fetch_assoc($sql1);
                                $myimg = $sql2['image'];
                                //get attributes
                                $attriname = '';
                                if ($orderattr['attributeID'] != '') {
                                    $attrID = $orderattr['attributeID'];
                                    $selattr = "SELECT * FROM dish_details WHERE dish_detail_id='$attrID'";
                                    $sql1attr = mysqli_query($conn, $selattr);
                                    $sql2Attr = mysqli_fetch_assoc($sql1attr);
                                    $attri = $sql2Attr['attribute']; // Assign the attribute value

                                    // Check if $attri is not empty before appending badges
                                    if (!empty($attri)) {
                                        $attributes = explode(',', $attri); // Assuming attributes are comma-separated
                                        foreach ($attributes as $attribute) {
                                            // Append Bootstrap 5 badge elements to $attri
                                            $attriname .= ' <span class="badge badge-success  p-2">' . $attribute . '</span>';
                                        }
                                    }
                                }
                            ?>
                                <tr>
                                    <td>
                                        <div style="width: 80px; height: 50px; overflow: hidden; ">
                                            <img style="box-shadow: 0 0 20px #00000021;" class="rounded img-thumbnail" src="<?php echo SITE_PATH ?>admin/media/dish/<?php echo $myimg ?>" alt="<?php echo $orderattr['name'] ?>">
                                        </div>

                                    </td>
                                    <td><?php echo $orderattr['name'] ?><?php if ($attriname != '') {
                                                                        ?>
                                        <?php echo $attriname ?>
                                    <?php  } ?>
                                    </td>
                                    <td><?php echo $orderattr['price'] ?></td>
                                    <td><?php echo $orderattr['qty'] ?></td>
                                    <td><?php echo $orderattr['price'] * $orderattr['qty'] ?></td>

                                    <?php if ($order['order_status'] == '4') { ?>
                                        <!-- Use when the page reloads -->
                                        <td>
                                            <a href="<?php echo SITE_PATH ?>dish/<?php echo $sql2['slug'] ?>">
                                                <button class="btn btn-green btn-sm badge badge-success p-2 btn-sm badge-sm">Order Again</button>
                                            </a>
                                        </td>
                                    <?php } ?>
                                </tr>
                            <?php
                            }
                            ?>

                            <?php if ($couponcode != '') {
                                $res = mysqli_query($conn, "select * from coupon where coupon_code='$couponcode' and status='1'");
                                $check = mysqli_num_rows($res);
                                if ($check > 0) {
                                    $row = mysqli_fetch_assoc($res);
                                    $cart_min_value = $row['cart_min_value'];
                                    $coupon_type = $row['coupon_type'];
                                    $coupon_value = $row['coupon_value'];
                                    $expired_on = strtotime($row['expired_on']);
                                    $cur_time = strtotime(date('Y-m-d'));


                                    // echo $getcartTotalPrice;
                                    if ($total > $cart_min_value) {
                                        if ($cur_time > $expired_on) {
                                            $coupon_code_apply = 0;
                                            $camt = 0;
                                        } else {
                                            $coupon_code_apply = 0;
                                            $camt = 0;
                                            if ($coupon_type == 'F') {
                                                $coupon_code_apply = $total - $coupon_value;
                                                $camt = 'Rs. ' . $coupon_value;
                                            }
                                            if ($coupon_type == 'P') {
                                                $coupon_code_apply = $total - ($coupon_value / 100) * $total;
                                                $camt = $coupon_value . '%';
                                            }
                                        }
                                    } else {
                                        $coupon_code_apply = $total;
                                        $camt = 0;
                                    }
                                }
                            ?>
                                <?php
                                if ($camt > 0) {
                                ?>
                                    <tr>
                                        <div style="border: 2px dashed #ffe493;padding: 15px 20px;margin-top: 20px;background: #fff6db;">
                                            <p> Coupon Applied: <strong><?php echo $couponcode ?> ( <?php echo $camt ?> )</strong></p>
                                            <p>Final Price: <strong>Rs. <?php echo $coupon_code_apply ?></strong></p>
                                        </div>
                                    </tr>
                                <?php }
                                ?>
                            <?php } ?>
                        </table>
                    </div>
                    <div class="row justify-content-between mt-4 mb-4">
                        <?php
                        if ($order['order_status'] == '3') {
                            $ontheway = "completed";
                        } else {
                            $ontheway = "";
                        }
                        if ($order['order_status'] == '2') {
                            $complete = "completed";
                            $ontheway = "completed";
                        } else {
                            $complete = "";
                        }
                        if ($order['order_status'] == '4') {
                            $hide = "style='display:none';";
                            $hide = "";
                        } else {
                            $hide = "";
                        }
                        ?>
                        <div class="order-tracking completed" <?php echo $hide ?>>
                            <span class="is-complete"></span>
                            <p>Ordered<br><span><?php echo   formatDateTime($order['order_added_on'])  ?></span></p>
                        </div>
                        <!-- <div class="order-tracking <?php echo $ontheway; ?>" <?php echo $hide ?>>
                            <span class="is-complete"></span>
                            <p>On the Way<br></p>
                        </div> -->

                        <div class="order-tracking <?php echo $complete; ?>" <?php echo $hide ?>>
                            <span class="is-complete"></span>
                            <p>Delivered <?php if ($order['delievered_on'] != '') {
                                            ?>
                                    <br><span style="color: var(--mainbtn);"><?php echo   formatDateTime($order['delievered_on'])  ?></span>
                                <?php } ?>
                            </p>
                        </div>
                    </div>


                    <!-- //rating feedback   -->
                    <style>
                        .rating-wrapper {
                            margin: 20px auto;
                            background: #fff;
                            padding: 1em;
                            border-radius: 3px;
                            box-shadow: 0px 5px 15px rgb(96 125 33 / 17%);
                        }

                        .rating-wrapper .rating-label {
                            text-align: center;
                            font-weight: 700;
                            display: block;
                        }

                        .rating-wrapper .ratingItemList {
                            max-width: 300px;
                            margin: auto;
                            display: flex;
                            justify-content: space-between;
                            padding: 1em 0;
                        }

                        .rating-wrapper input.rating {
                            display: none;
                        }

                        .rating-wrapper label.rating {
                            padding: 5px 3px;
                            font-size: 32px;
                            opacity: 0.7;
                            filter: grayscale(1);
                            cursor: pointer;
                        }



                        .rating-wrapper label.rating:hover {
                            filter: grayscale(0.84);
                            transform: scale(1.1);
                            transition: 100ms ease;
                        }

                        .rating-wrapper input.rating:checked+label.rating {
                            filter: grayscale(0);
                            opacity: 1;
                            transform: scale(1.1);
                        }

                        .feedback {
                            width: 100%;
                            display: none;
                        }

                        .feedback textarea,
                        .feedback input {
                            max-width: 300px;
                            width: 100%;
                            display: block;
                            margin: 0.5em auto;
                            padding: 0.5em;
                            border: 1px solid #d2d3d8;
                            border-radius: 3px;
                        }

                        .feedback textarea:focus,
                        .feedback input:focus,
                        .feedback textarea:active,
                        .feedback input:active {
                            border-color: #3870c4;
                            box-shadow: 0px 0px 1px 1px #3870c4;
                            transition: 100ms;
                        }

                        .feedback textarea {
                            height: 100px;
                        }

                        .feedback button {
                            margin: 1em auto;
                            display: table;
                            text-align: center;
                        }

                        .disputelab_logo {
                            width: 140px;
                            position: absolute;
                            top: 1em;
                            left: 50%;
                            margin-left: -70px;
                        }

                        .makecenter {
                            text-align: center;
                            margin: 0 auto;
                            display: flex;
                            font-family: 'Kalam', cursive;
                            justify-content: center;
                            letter-spacing: 1px;
                            font-size: 1.2rem;
                            color: #5e7e1a;
                        }
                    </style>
                    <link rel="stylesheet" href="https://afeld.github.io/emoji-css/emoji.css">
                    <form class="rating-wrapper" id="feedbackform">
                        <label class="rating-label">
                            <h2>Feedback</h2>
                            <div class="ratingItemList">
                                <?php for ($i = 1; $i <= 5; $i++) { ?>
                                    <input class="rating rating-<?php echo $i; ?>" id="rating-<?php echo $i; ?>-2" type="radio" value="<?php echo $i; ?>" name="rating" <?php if ($feedback_icon == $i) {
                                                                                                                                                                            echo 'checked';
                                                                                                                                                                        } ?> />
                                    <label class="rating rating-<?php echo $i; ?>" for="rating-<?php echo $i; ?>-2"><i class="em em-<?php echo ($i == 1) ? 'angry' : (($i == 2) ? 'disappointed' : (($i == 3) ? 'expressionless' : (($i == 4) ? 'grinning' : 'star-struck'))); ?>"></i></label>
                                <?php } ?>
                            </div>

                        </label>

                        <?php if ($feedback == NULL) {
                        ?>

                            <div class="feedback">
                                <textarea placeholder="What can we do to improve?" class="form-control" style="max-width: 100%; font-weight: 700; border-color: #597101 !Important; outline: 0 !Important; box-shadow: none; border-radius: 0 !Important;"></textarea>
                                <button class="submit btn btn-success">Send Your Feedback</button>
                            </div>
                        <?php } else {
                            echo '<span class="makecenter">' . $feedback . '</span>';
                        } ?>

                    </form>
                    <!-- rate end  -->
                </div>
            </div>
        </div>
    </div>
    <div id="loader" class="lds-dual-ring hidden overlay"></div>

    <?php include('includes/footer.php');  ?>
    <?php include('includes/scripts.php');  ?>
    <!-- //feedback start  -->


    <script>
        $('#feedbackform').submit(function(e) {
            e.preventDefault();
            var rating = $('.rating:checked').val();
            var feedback = $('.feedback textarea').val();

            if (rating >= 1 && feedback.length > 3) {
                $.ajax({
                    type: "POST",
                    url: SITE_PATH + "action/feedback_submit.php",
                    data: {
                        rating: rating, // Assuming rating and feedback are variables
                        feedback: feedback,
                        order_id: <?php echo $_GET['id'] ?>
                    },
                    dataType: "json", // Specify the expected data type as JSON
                    success: function(response) {
                        // Check the status field in the JSON response
                        if (response.status === "success") {
                            showSweetAlert('success', response.message, '', {
                                popup: 'swal-success-bg',
                                icon: 'swal-success-icon'
                            });

                            setTimeout(() => {
                                window.location.reload()
                            }, 500);
                        } else {
                            showSweetAlert('error', response.message, '', {
                                popup: 'swal-error-bg',
                                icon: 'swal-error-icon'
                            });
                        }
                    },
                    error: function(xhr, status, error) {
                        // Handle any AJAX errors here
                        console.error(xhr.responseText);
                    }
                });

            } else {
                alert('Please provide valid feedback and rating.');
            }
        });
        // Enable or disable button by validation
        function feedback_validate(val) {
            if (val <= 0 || $('.feedback textarea').val().length <= 3) {
                $('button.submit').hide();
            } else {
                $('button.submit').show();
            }
        }

        // Display feedback after rating 
        $('.rating').on('click', function() {
            var rating = this['value'];
            $('.feedback').css('display', "block");
            feedback_validate(rating);
        });

        // Run enable button function based on input
        $('.feedback textarea').keyup(function() {
            if ($('.feedback textarea').val().length > 3) {
                feedback_validate($('.rating:checked').val());
            } else {
                $('button.submit').hide();
            }
        });

        // Hide button on load
        $(document).ready(function() {
            $('button.submit').hide();
        });
    </script>


    <!-- f end  -->
    <script>
        $("#order-again").hide();
        // $("#CancelorderBtn").click(function(e) {
        //     e.preventDefault();
        //     $.ajax({
        //         type: "post",
        //         url: "action/cancel-order.php",
        //         data: $("#cancelOrder").serialize(),
        //         beforeSend: function() {
        //             $('#loader').removeClass('hidden')
        //         },
        //         success: function(response) {
        //             var response = JSON.parse(response);
        //             if (response.success == true) {
        //                 $("#cancelordersuccess").html("Order Cancelled !");
        //                 $("#cancelordersuccess").show();
        //                 $("#cancelordersuccess").focus();
        //                 $("#CancelorderBtn").hide();
        //                 $("#order-again").show();
        //                 return false;
        //             }
        //         },
        //         complete: function() {
        //             $('#loader').addClass('hidden');

        //         },
        //     });
        // });
    </script>
</body>

</html>