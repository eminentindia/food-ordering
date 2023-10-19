<?php
$page_title = "Sales";
include('connect/head.php'); ?>
<?php include('connect/menu-nav.php');
?><?php

if (!checkAdminDeveloperSession()) {
	echo '<script>window.location.href="dashboard.php"</script>';
}
?>
<style>

</style>
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <div class=" container-xxl " id="kt_content_container">
        <div class="card card-xl-stretch mb-xl-8">
            <form method="post">
                <div class="card-header  borderBottom1">
                    <div class="card-title">
                        <div class="d-flex align-items-center themeColor text-upper position-relative my-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="black">
                                <rect x="2" y="2" width="9" height="9" rx="2" fill="black"></rect>
                                <rect opacity="0.3" x="13" y="2" width="9" height="9" rx="2" fill="black"></rect>
                                <rect opacity="0.3" x="13" y="13" width="9" height="9" rx="2" fill="black"></rect>
                                <rect opacity="0.3" x="2" y="13" width="9" height="9" rx="2" fill="black"></rect>
                            </svg>&nbsp; List Of <?php echo $page_title; ?>
                        </div>
                    </div>
                    <div class="card-toolbar">

                    </div>
                </div>
                <div class="card-body p-4">
                    <div class="row d-flex gap-3 px-5">
                        <?php
                        $current_year = date('Y');
                        $dataPoints2 = array();

                        for ($month = 1; $month <= 12; $month++) {
                            $start_date = date('Y-m-01', strtotime("$current_year-$month-01"));
                            $end_date = date('Y-m-t', strtotime("$current_year-$month-01"));
                            $query = "SELECT COUNT(DISTINCT order_details.order_id) AS total_orders,
                            SUM(order_details.price * order_details.qty) AS total_price
                     FROM order_details
                     JOIN orders ON orders.ID = order_details.order_id
                     WHERE orders.order_added_on BETWEEN '$start_date' AND '$end_date'
                     AND orders.paymentstatus = 'captured'";

                            $result = mysqli_query($conn, $query);
                            if ($result) {
                                $row = mysqli_fetch_assoc($result);
                                $month_name = date('F', strtotime("$current_year-$month-01"));

                                if ($row['total_price'] > 0) {
                                    // Create a card for the result
                                    echo '<div class="card w-auto " style="box-shadow: 0 0 20px rgb(59 128 55 / 15%);">';
                                    echo '<div class="card-body p-3 px-5">';
                                    echo '<h5 class="card-title">' . $month_name . '</h5>';


                                    $query2 = "SELECT 
    SUM(CASE WHEN payment_type = 'cod' THEN 1 ELSE 0 END) AS cod_count,
    SUM(CASE WHEN payment_type = 'online' THEN 1 ELSE 0 END) AS online_count
    FROM orders 
    WHERE order_added_on BETWEEN '$start_date' AND '$end_date'
    AND paymentstatus = 'captured'";

                                    $result2 = mysqli_query($conn, $query2);

                                    if ($result2) {

                                        $query3 = "SELECT 
    *
    FROM orders 
    WHERE order_added_on BETWEEN '$start_date' AND '$end_date'
    AND paymentstatus = 'captured'";

                                        $result3 = mysqli_query($conn, $query3);

                                        $row_count = mysqli_num_rows($result3);

                                        $row2 = mysqli_fetch_assoc($result2);
                                        // Retrieve the counts
                                        $cod_count = $row2['cod_count'];
                                        $online_count = $row2['online_count'];

                                        // Now you can use $cod_count and $online_count as needed.
                                        echo "<div class='d-flex align-items-center justify-content-between my-3'><p class='card-text mb-0 '>CASH ON DELIVERY   </p> <p class='mb-0 fs-3 text-success'>$cod_count</p></div>";
                                        echo "<div class='d-flex align-items-center justify-content-between my-3'><p class='card-text mb-0'>ONLINE  </p><p class='mb-0 fs-3 text-success'> $online_count</p></div>";
                                    }
                                    echo '<div style=" display: flex;gap: 10px;border: 1px solid #37c45f;padding: 3px;padding-top:0;margin-bottom: 0;padding-right: 0;box-shadow: 0 0.1rem 1rem 0.25rem rgb(38 151 20 / 5%);font-size: .8rem;border-right: 0;
                                "><p class="card-text pb-0 mb-0" style="    color: #2b9d29 !important;">Total Orders <span style="    background: #f3fff0;padding: 10px;border: 1px solid;" class="fs-4"> ' . $row_count . '</span></p>';
                                    if ($row['total_price'] > 0) {
                                        echo '<p class="card-text pb-0 mb-0" style="    color: #2b9d29 !important;">Total Sale  <span style="    background: #f3fff0;padding: 10px;border: 1px solid;" class="fs-4"> <i class="fas fa-rupee-sign"></i> ' . $row['total_price'] . ' </span></p>';
                                    }
                                    echo '</div>';

                                    echo '</div>';
                                    echo '</div>';
                                    $dataPoints2[] = $row;
                                }
                            } else {
                                echo "Error executing the query: " . mysqli_error($conn);
                            }
                        }
                        ?>

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
            </form>
        </div>
    </div>
    <?php include('connect/copyrights.php'); ?>
    <?php include('connect/footer-script.php'); ?>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>

    <script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
    <script>
        window.onload = function() {
            var chart = new CanvasJS.Chart("chartContainer", {
                animationEnabled: true,
                theme: "light2",
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
            theme: "light2",
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

    <?php include('connect/footer-end.php'); ?>