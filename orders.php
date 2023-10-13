<?php include('includes/header.php');  ?>
<?php
$conn = _connectodb();
if (!isset($_SESSION['ATECHFOOD_USER']) && !isset($_SESSION['ATECHFOOD_USER_ID'])) {
    echo '<script>window.location.href="' . SITE_PATH . '";</script>';
} else {
    $uid = $_SESSION['ATECHFOOD_USER_ID'];
    $getorder = getOrderByUserId($conn, $_SESSION['ATECHFOOD_USER_ID']);
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
</style>

<body class="contact-template page-template belle">
    <?php include('includes/navbar.php') ?>

    <div id="page-content">
        <!--Page Title-->
        <div class="bredcrumbWrap">
            <div class="container breadcrumbs">
                <a href="<?= SITE_PATH ?>" title="Home">Home</a><span aria-hidden="true">›</span><span>Orders</span>
            </div>
        </div>

        <?php
        if (count($getorder) > 0) {
        ?>
            <div class="container">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 main-col">
                        <form action="#">
                            <div class="wishlist-table table-content table-responsive">
                                <table class="table table-bordered ">
                                    <thead>
                                        <tr>
                                            <th> <strong>Order ID</strong></th>
                                            <th> <strong>Dish</strong></th>
                                            <th> <strong>Order Status</strong></th>
                                            <th> <strong>Added On</strong></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i = 1;
                                        foreach ($getorder as $order) {
                                            // echo '<pre>';
                                            // print_r($order);
                                            $ID  = $order['order_id'];
                                            $order_id  = $order['order_id'];
                                            $name  = $order['name'];
                                            $invoice_order_id = $order['invoice_order_id'];
                                            $slug = $order['slug'];
                                            $attriname = '';
                                            if ($order['attributeID'] != '') {
                                                $attrID = $order['attributeID'];
                                                $selattr = "SELECT * FROM dish_details WHERE dish_detail_id='$attrID'";
                                                $sql1attr = mysqli_query($conn, $selattr);
                                                $sql2Attr = mysqli_fetch_assoc($sql1attr);
                                                $attri = $sql2Attr['attribute']; // Assign the attribute value

                                                // Check if $attri is not empty before appending badges
                                                if (!empty($attri)) {
                                                    $attributes = explode(',', $attri); // Assuming attributes are comma-separated
                                                    foreach ($attributes as $attribute) {
                                                        // Append Bootstrap 5 badge elements to $attri
                                                        $attriname .= ' <span class="badge badge-success ml-3 p-2">' . $attribute . '</span>';
                                                    }
                                                }
                                            }
                                        ?>
                                            <tr>
                                                <td style="    width: 120px;"> <a style="color: var(--mainbtn);" href="order-details?id=<?php echo $ID  ?>"><?php echo $invoice_order_id ?></a>
                                                    <a href="<?php echo SITE_PATH ?>download-invoice?id=<?php echo $ID ?>"><i class="fa fa-file-pdf-o" aria-hidden="true" style="float: right;color: #ff5400; margin-top: 3px;" title="Download Invoice"></i></a>
                                                </td>
                                                <td style="width: 120px;"> <a href="<?php echo SITE_PATH ?>dish/<?php echo $slug; ?>"><?php echo $name . $attriname ?></a>
                                                </td>

                                                <td><?php
                                                    if ($order['status'] == 'complete') {
                                                        echo "<span class='badge badge-pill badge-success p-2' style='font-weight:bold'> " . ucwords($order['status']) . "</span>";
                                                    } else {
                                                        echo "<span class='badge badge-pill badge-warning p-2'>" . ucwords($order['status']) . "</span>";
                                                    }
                                                    ?></td>

                                                <td><?php $date = $order['order_added_on'];
                                                    echo formatDateTime($date);
                                                    ?>
                                                </td>


                                            </tr>
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        <?php } else {
        ?>

            <div class="container" style="display: flex;
  justify-content: center;margin-bottom: 100px;
    padding-top: 30px;">
                <div class="row">
                    <div class="col-md-12">

                        <div class="card-title text-center">
                            <img src="images/empty-cart.png" alt="" width="250px">
                            <h4 style=" margin-top:25px; font-size: 25px;">Opps !</h4>
                            <h6 style="color: #7c7c7c; font-size: 16px;">There is nothing in order. Let's order now.</h6>
                            <a href="dishes"><button class="btn btn-theme btn-success" style=" margin-top:30px; ">BROWSE DISH</button></a>
                        </div>


                    </div>
                </div>
            </div>


        <?php }
        ?>
    </div>

    </div>
    <!--End Body 

   

        <?php include('includes/footer.php');  ?>
        <?php include('includes/scripts.php');  ?>

</body>

</html>