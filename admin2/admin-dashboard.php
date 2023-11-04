<?php
include('controller/common-controller.php');
$conn = _connectodb();
setTimeZone();
include('category/controller/category-controller.php');
include('coupon/controller/coupon-controller.php');
include('dish/controller/dish-controller.php');
include('order/controller/order-controller.php');
include('users/controller/users-controller.php');
include('subscription/controller/subscription-controller.php');
include('../function.inc.php');
include('setting/controller/setting-controller.php');
$getsetting = getsetting($conn);
$getsetting = json_decode($getsetting, true);
foreach ($getsetting as $getsinglesetting) {
    extract($getsinglesetting);
    // print_r($getsetting);
}


include('controller/constant.inc.php');
$getcategory = getcategory($conn);
$getcategory = json_decode($getcategory, true);
$getcoupon = getcoupon($conn);
$getcoupon = json_decode($getcoupon, true);
$getdish = getdish($conn);
$getdish = json_decode($getdish, true);
$getorder = getorder($conn);
$getorder = json_decode($getorder, true);
$getusers = getusers($conn);
$getusers = json_decode($getusers, true);
$getsubscription = getsubscription($conn);
$getsubscription = json_decode($getsubscription, true);
?>

<?php require("includes/top.php"); ?>
<?php include('includes/header.php'); ?>
<?php include('includes/sidebar.php'); ?>
<style>
    a.canvasjs-chart-credit {
        display: none;
    }

    .bg-warning {
        background-image: linear-gradient(to right, #455a21 0%, #8eac5a 100%);
    }
</style>
<div class="page-wrapper">
    <!-- Bread crumb and right sidebar toggle -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Dashboard</h4>
                <div class="ms-auto text-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Dashboard
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <!-- End Bread crumb and right sidebar toggle -->

    <div class="container-fluid">
        <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
            <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
            </symbol>
            <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
                <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z" />
            </symbol>
            <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
                <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
            </symbol>
        </svg>

        <div class="row">
            <div class="col-6" style="background: white;border: 1px solid #dbdbdb; padding: 0; -webkit-box-shadow: -1px 10px 5px -7px rgb(0 0 0 / 10%); -moz-box-shadow: -1px 10px 5px -7px rgb(0 0 0 / 10%); box-shadow: -1px 10px 5px -7px rgb(0 0 0 / 10%);">
                <!--begin::Item-->
                <div class="d-flex align-items-center bg-light-info rounded p-5 changedash" style="border-bottom: 1px solid #d3d3d3ab;padding-bottom: 20px !important;margin-bottom: 20px;     padding-top: 20px !important;   background: #a6dd79;">
                    <!--begin::Icon-->
                    <span class="svg-icon svg-icon-info me-5">
                        <!--begin::Svg Icon | path: icons/duotune/abstract/abs027.svg-->
                        <span class="svg-icon svg-icon-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <path opacity="0.3" d="M21.25 18.525L13.05 21.825C12.35 22.125 11.65 22.125 10.95 21.825L2.75 18.525C1.75 18.125 1.75 16.725 2.75 16.325L4.04999 15.825L10.25 18.325C10.85 18.525 11.45 18.625 12.05 18.625C12.65 18.625 13.25 18.525 13.85 18.325L20.05 15.825L21.35 16.325C22.35 16.725 22.35 18.125 21.25 18.525ZM13.05 16.425L21.25 13.125C22.25 12.725 22.25 11.325 21.25 10.925L13.05 7.62502C12.35 7.32502 11.65 7.32502 10.95 7.62502L2.75 10.925C1.75 11.325 1.75 12.725 2.75 13.125L10.95 16.425C11.65 16.725 12.45 16.725 13.05 16.425Z" fill="black"></path>
                                <path d="M11.05 11.025L2.84998 7.725C1.84998 7.325 1.84998 5.925 2.84998 5.525L11.05 2.225C11.75 1.925 12.45 1.925 13.15 2.225L21.35 5.525C22.35 5.925 22.35 7.325 21.35 7.725L13.05 11.025C12.45 11.325 11.65 11.325 11.05 11.025Z" fill="black"></path>
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                    </span>
                    <div class="flex-grow-1 me-2">
                        <span class="fw-bolder text-white text-hover-info fs-6">DCM Building</span>
                    </div>
                    <div class="d-flex flex-column">
                        <?php
                        $sel = "select * from orders where store='2' and otp_validate='0' and  ( paymentstatus='authorized' || paymentstatus='captured' ) ||  ( paymentstatus='created' and payment_type='cod' and store='2' ) ";
                        $res = mysqli_query($conn, $sel);
                        $count = mysqli_num_rows($res);

                        $sel2 = "select * from orders where store='2' and otp_validate='1'";
                        $res2 = mysqli_query($conn, $sel2);
                        $count2 = mysqli_num_rows($res2);

                        $dcm = array(
                            array("label" => "Completed Orders", "y" => $count2),
                            array("label" => "Pending Orders", "y" => $count)
                        )

                        ?>
                        <span class="fw-bolder text-green py-1"><span style="font-size: 1.4rem;"><?php echo $count ?></span> Pending Orders</span>
                        <span class="fw-bolder text-green py-1"><span style="font-size: 1.4rem;"><?php echo $count2 ?></span> Completed Orders</span>


                    </div>
                </div>
                <div id="dcmcontainer" style="height: 370px; width: 100%;"></div>
            </div>
            <div class="col-6" style="background: white;border: 1px solid #dbdbdb;padding: 0;-webkit-box-shadow: -1px 10px 5px -7px rgb(0 0 0 / 10%);-moz-box-shadow: -1px 10px 5px -7px rgb(0 0 0 / 10%);box-shadow: -1px 10px 5px -7px rgb(0 0 0 / 10%);">
                <div class="d-flex align-items-center bg-light-success rounded p-5 changedash" style="border-bottom: 1px solid #d3d3d3ab; padding-bottom: 20px !important;    padding-top: 20px !important;  margin-bottom: 20px;    background: #98cae5;">
                    <span class="svg-icon svg-icon-success me-5">
                        <span class="svg-icon svg-icon-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <path opacity="0.3" d="M21.25 18.525L13.05 21.825C12.35 22.125 11.65 22.125 10.95 21.825L2.75 18.525C1.75 18.125 1.75 16.725 2.75 16.325L4.04999 15.825L10.25 18.325C10.85 18.525 11.45 18.625 12.05 18.625C12.65 18.625 13.25 18.525 13.85 18.325L20.05 15.825L21.35 16.325C22.35 16.725 22.35 18.125 21.25 18.525ZM13.05 16.425L21.25 13.125C22.25 12.725 22.25 11.325 21.25 10.925L13.05 7.62502C12.35 7.32502 11.65 7.32502 10.95 7.62502L2.75 10.925C1.75 11.325 1.75 12.725 2.75 13.125L10.95 16.425C11.65 16.725 12.45 16.725 13.05 16.425Z" fill="black"></path>
                                <path d="M11.05 11.025L2.84998 7.725C1.84998 7.325 1.84998 5.925 2.84998 5.525L11.05 2.225C11.75 1.925 12.45 1.925 13.15 2.225L21.35 5.525C22.35 5.925 22.35 7.325 21.35 7.725L13.05 11.025C12.45 11.325 11.65 11.325 11.05 11.025Z" fill="black"></path>
                            </svg>
                        </span>
                    </span>
                    <div class="flex-grow-1 me-2">
                        <span class="fw-bolder text-white text-hover-primary fs-6">Arunachal Building</span>
                    </div>
                    <div class="d-flex flex-column">
                        <?php
                        $sel = "select * from orders where store='1' and otp_validate='0' and  ( paymentstatus='authorized' || paymentstatus='captured' ) ||  ( paymentstatus='created' and payment_type='cod' and store='1' ) ";
                        $res = mysqli_query($conn, $sel);
                        $count = mysqli_num_rows($res);
                        $sel2 = "select * from orders where store='1' and otp_validate='1' ";
                        $res2 = mysqli_query($conn, $sel2);
                        $count2 = mysqli_num_rows($res2);
                        $cp = array(
                            array("label" => "Completed Orders", "y" => $count2),
                            array("label" => "Pending Orders", "y" => $count)
                        )
                        ?>
                        <span class="fw-bolder text-green py-1"><span style="font-size: 1.4rem;"><?php echo $count ?> </span>Pending Orders</span>
                        <span class="fw-bolder text-green py-1"><span style="font-size: 1.4rem;"><?php echo $count2 ?></span> Completed Orders</span>
                    </div>
                </div>
                <div id="cpcontainer" style="height: 370px; width: 100%;"></div>
            </div>

            <?php
            // --------------------------monthly report --------------------------------
            $dataPoints = array();
            $current_year = date('Y');
            $query = "SELECT MONTH(timestamps) AS month, SUM(qty) AS total_qty, SUM(price*qty) AS total_price 
                FROM order_details JOIN orders ON orders.ID=order_details.order_id
                WHERE YEAR(timestamps) = '$current_year' AND orders.paymentstatus='captured'
                GROUP BY MONTH(timestamps)";
            $result_set = $conn->query($query);
            while ($row = $result_set->fetch_assoc()) {
                $month = $row["month"];
                $total_qty = $row["total_qty"] ?: 0;
                $total_price = $row["total_price"] ?: 0;
                $label = date("M", mktime(0, 0, 0, $month, 1));
                $dataPoints[] = array("y" => $total_price, "label" => $label);
            }
            $month_names = array("Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec");
            foreach ($month_names as $month_name) {
                $found = false;
                foreach ($dataPoints as $dataPoint) {
                    if ($dataPoint["label"] == $month_name) {
                        $found = true;
                        break;
                    }
                }
                if (!$found) {
                    $dataPoints[] = array("y" => 0, "label" => $month_name);
                }
            }
            usort($dataPoints, function ($a, $b) {
                return date_parse($a["label"])["month"] - date_parse($b["label"])["month"];
            });
            ?>
            <?php
            //daily sale 
            //------------------PER DAY SALE-----------------------------------
            $current_year = date('Y');
            $start_date = date('Y-m-d', strtotime("January 1st $current_year"));
            $end_date = date('Y-m-d', strtotime("December 31st $current_year"));
            $dataPoints2 = array();
            $current_date = $start_date;
            while ($current_date <= $end_date) {
                $query = "SELECT SUM(qty) AS total_qty, SUM(price*qty) AS total_price
              FROM order_details JOIN orders ON orders.ID=order_details.order_id
              WHERE DATE(timestamps) = '$current_date'  AND orders.paymentstatus='captured'";
                $result_set = $conn->query($query);
                $row = $result_set->fetch_assoc();
                $total_qty = $row["total_qty"] ?: 0;
                $total_price = $row["total_price"] ?: 0;
                $label = date("j M Y", strtotime($current_date));
                $dataPoints2[] = array("y" => $total_price, "label" => $label);
                $current_date = date("Y-m-d", strtotime($current_date . " +1 day"));
            }
            $current_date = $start_date;
            while ($current_date <= $end_date) {
                $found = false;
                foreach ($dataPoints2 as $dataPoint) {
                    if ($dataPoint["label"] == date("j M Y", strtotime($current_date))) {
                        $found = true;
                        break;
                    }
                }
                if (!$found) {
                    $dataPoints2[] = array("y" => 0, "label" => date("j M Y", strtotime($current_date)));
                }
                $current_date = date("Y-m-d", strtotime($current_date . " +1 day"));
            }
            usort($dataPoints2, function ($a, $b) {
                return strtotime($a["label"]) - strtotime($b["label"]);
            });
            ?>
        </div>


        <div id="chartContainer" class="mt-8" style="height: 370px; width: 100%;"></div>
        <div id="chartContainer2" style="height: 370px; width: 100%;margin-top:35px"></div>

    </div>
    <div class="row">
        <!-- Column -->
        <div class="container pt-5 pb-2">
            <div class="row align-items-stretch">
               <div class="c-dashboardInfo col-lg-3 col-md-6">
                    <div class="wrap">
                        <a href="<?= ADMIN_SITE_PATH ?>order/today-order.php">
                            <h4 class="heading heading5 hind-font medium-font-weight c-dashboardInfo__title">Today Orders</h4><span class="hind-font caption-12 c-dashboardInfo__count">
                                <?php
$start_date          = date('Y-m-d') . ' 00-00-00';
$end_date            = date('Y-m-d') . ' 23-59-59';
$getDashboard_orders = getDashboard_orders($conn, $start_date, $end_date);
//   print_r($getDashboard_orders);
if ($getDashboard_orders != '') {
    echo sizeof($getDashboard_orders);
} else {
    echo '0';
}
?></span>
                    </div></a>
                </div>
                <div class="c-dashboardInfo col-lg-3 col-md-6">
                    <div class="wrap">
                        <h4 class="heading heading5 hind-font medium-font-weight c-dashboardInfo__title">Order's Complete Today</h4><span class="hind-font caption-12 c-dashboardInfo__count"><?php

$start_date          = date('Y-m-d') . ' 00-00-00';
$end_date            = date('Y-m-d') . ' 23-59-59';
$getDashboard_orders = getDashboardtodaycompleteOrders($conn, $start_date, $end_date);
//   print_r($getDashboard_orders);
if ($getDashboard_orders != '') {
    echo sizeof($getDashboard_orders);
} else {
    echo '0';
}
?></span>
                    </div>
                </div>
                <div class="c-dashboardInfo col-lg-3 col-md-6">
                    <div class="wrap">
                        <a href="<?= ADMIN_SITE_PATH ?>order/pending-order.php">
                            <h4 class="heading heading5 hind-font medium-font-weight c-dashboardInfo__title"> Pending Orders</h4><span class="hind-font caption-12 c-dashboardInfo__count"><?php

$start_date          = date('Y-m-d') . ' 00-00-00';
$end_date            = date('Y-m-d') . ' 23-59-59';
$getDashboard_orders = getDashboardpendingOrders($conn);
//   print_r($getDashboard_orders);
if ($getDashboard_orders != '') {
    echo sizeof($getDashboard_orders);
} else {
    echo '0';
}
?></span>
                    </div></a>
                </div>
                <div class="c-dashboardInfo col-lg-3 col-md-6">
                    <div class="wrap">
                        <h4 class="heading heading5 hind-font medium-font-weight c-dashboardInfo__title">Order Cancelled Today</h4><span class="hind-font caption-12 c-dashboardInfo__count"><?php

$start_date          = date('Y-m-d') . ' 00-00-00';
$end_date            = date('Y-m-d') . ' 23-59-59';
$getDashboard_orders = getDashboardcancelpendingOrders($conn, $start_date, $end_date);
//   print_r($getDashboard_orders);
if ($getDashboard_orders != '') {
    echo sizeof($getDashboard_orders);
} else {
    echo '0';
}
?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row align-items-stretch">
        <div class="c-dashboardInfo col-lg-12 col-md-12">
            <div class="wrap">
                <?php
                $mostsalesql_result = mysqli_query($conn, "SELECT count(order_details.dish_order_id) as dish_count, dish.dish, dish.image FROM order_details, dish_details, dish WHERE order_details.dish_order_id=dish_details.dish_detail_id AND dish_details.dish_id=dish.id GROUP BY order_details.dish_order_id ORDER BY count(order_details.dish_order_id) DESC LIMIT 1");

                if ($mostsalesql_result && mysqli_num_rows($mostsalesql_result) > 0) {
                    $mostsalesql = mysqli_fetch_assoc($mostsalesql_result);
                ?>
                    <div class="row">
                        <div class="col-md-5"><img src="<?php echo PRODUCT_IMAGE_SITE_PATH . $mostsalesql['image'] ?>" alt="" class="img-fluid"></div>
                        <div class="col-md-7">
                            <h2 class="text-center mt-2">Most Sale Dish</h2>
                            <h4 class="pt-3"><?php echo $mostsalesql['dish']; ?></h4>
                            <br>
                            <h6 class="dishtimes"><?php echo $mostsalesql['dish_count']; ?> Times</h6>
                        </div>
                    </div>
                <?php
                } else {
                    // Handle the case where no results were returned
                    echo '    <h2 class="text-center mt-2">Most Sale Dish</h2>';
                    echo "No Dish found.";
                }
                ?>

            </div>
        </div>

        <div class="col-md-4 col-lg-4- col-6">
            <a href="<?php echo ADMIN_SITE_PATH ?>category/view-category.php">
                <div class="card card-hover">
                    <div class="box bg-warning ">
                        <h1 class="font-light text-white"><i class="fas fa-list-ul"></i></h1>
                        <h5 class="text-white text-center  adjust-dash">Category</h5>
                        <span class="badge rounded-pill counter f-20"><?php echo count($getcategory); ?></span>

                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-4 col-lg-4- col-6">
            <a href="<?php echo ADMIN_SITE_PATH ?>coupon/view-coupon.php">
                <div class="card card-hover">
                    <div class="box bg-warning ">
                        <h1 class="font-light text-white"><i class="fas fa-ticket-alt"></i></h1>
                        <h5 class="text-white text-center  adjust-dash">Coupon</h5>
                        <span class="badge rounded-pill counter f-20"><?php echo count($getcoupon); ?></span>

                    </div>
                </div>
            </a>
        </div>

        <div class="col-md-4 col-lg-4- col-6">
            <a href="<?php echo ADMIN_SITE_PATH ?>dish/view-dish.php">
                <div class="card card-hover">
                    <div class="box bg-warning ">
                        <h1 class="font-light text-white"><i class="fas fa-utensils"></i></h1>
                        <h5 class="text-white text-center  adjust-dash">Dishes</h5>
                        <span class="badge rounded-pill counter f-20"><?php echo count($getdish); ?></span>

                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-4 col-lg-4- col-6">
            <a href="<?php echo ADMIN_SITE_PATH ?>order/today-order.php">
                <div class="card card-hover">
                    <div class="box bg-warning ">
                        <h1 class="font-light text-white"><i class="far fa-bell"></i></h1>
                        <h5 class="text-white text-center  adjust-dash">Orders</h5>
                        <span class="badge rounded-pill counter f-20"><?php echo count($getorder); ?></span>

                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-4 col-lg-4- col-6">
            <a href="<?php echo ADMIN_SITE_PATH ?>users/users.php">
                <div class="card card-hover">
                    <div class="box bg-warning ">
                        <h1 class="font-light text-white"><i class="far fa-user"></i></h1>
                        <h5 class="text-white text-center  adjust-dash">Users</h5>
                        <span class="badge rounded-pill counter f-20"><?php echo count($getusers); ?></span>

                    </div>
                </div>
            </a>
        </div>

        <div class="col-md-4 col-lg-4- col-6">
            <a href="<?php echo ADMIN_SITE_PATH ?>subscription/subscriptions.php">
                <div class="card card-hover">
                    <div class="box bg-warning ">
                        <h1 class="font-light text-white"><i class="far fa-user"></i></h1>
                        <h5 class="text-white text-center  adjust-dash">Subscription</h5>
                        <span class="badge rounded-pill counter f-20"><?php echo count($getsubscription); ?></span>

                    </div>
                </div>
            </a>
        </div>
    </div>




</div>
<!-- -------------Content Here------------- -->

<!-- Lorem ipsum dolor sit amet, consectetur adipisicing elit. Modi distinctio doloremque soluta facere
    reiciendis fugit odio aperiam quam culpa non mollitia, maxime quos pariatur est voluptatibus atque!
    Assumenda nostrum, a ab architecto reprehenderit, laborum alias tenetur maxime officia suscipit ex.
    Quidem delectus pariatur nam sapiente adipisci sed reprehenderit aspernatur eius. -->
<!-- ------------------------------------------------>
</div>


<?php include('includes/footer.php'); ?>
<script src="js/waypoints.js"></script>
<script src="js/counterup.js"></script>
<script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
<script>
    window.onload = function() {
        var chart = new CanvasJS.Chart("chartContainer", {
            animationEnabled: true,
            theme: "light1",
            title: {
                text: "Monthly Sales"
            },
            axisY: {
                title: "Sales (INR)"
            },
            zoomEnabled: true,
            dataPointMinWidth: 50,
            data: [{
                type: "column",
                yValueFormatString: "#,##0.## Rupee",
                dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
            }]
        });
        chart.render();
    }
</script>
<script>
    var chart = new CanvasJS.Chart("chartContainer2", {
        animationEnabled: true,
        theme: "light1",
        title: {
            text: "Sales by Day for <?php echo $current_year; ?>"
        },
        axisY: {
            title: "Sales (INR)"
        },
        zoomEnabled: true,
        data: [{
            type: "column",
            yValueFormatString: "#,##0.## Rupee",
            dataPoints: <?php echo json_encode($dataPoints2, JSON_NUMERIC_CHECK); ?>
        }]
    });
    // Render the chart
    chart.render();
</script>
<script>
    var chart = new CanvasJS.Chart("dcmcontainer", {
        animationEnabled: true,
        theme: "light1",
        colorSet: ["#FF5733", "#FFC300", "#DAF7A6", "#C70039", "#900C3F"], // array of custom colors
        data: [{
            type: "pie",
            indexLabel: "{label} ({y})",
            startAngle: 90,
            showInLegend: true,
            legendText: "{label} : {y}",
            dataPoints: <?php echo json_encode($dcm, JSON_NUMERIC_CHECK); ?>
        }]
    });
    chart.render();


    var chart2 = new CanvasJS.Chart("cpcontainer", {
        animationEnabled: true,
        theme: "light1",
        colorSet: ["#FF5733", "#FFC300", "#DAF7A6", "#C70039", "#900C3F"], // array of custom colors
        data: [{
            type: "pie",
            indexLabel: "{label} ({y})",
            startAngle: 90,
            showInLegend: true,
            legendText: "{label} : {y}",
            dataPoints: <?php echo json_encode($cp, JSON_NUMERIC_CHECK); ?>
        }]
    });

    chart2.render();
</script>
<script>
    (function($) {
        "use strict";
        $('.counter').counterUp({
            delay: 10,
            time: 1000
        });
    })(jQuery);
</script>