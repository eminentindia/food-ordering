<?php
include('../controller/common-controller.php');
include('session.php');

$getsetting = getsetting($conn);
$getsetting = json_decode($getsetting, true);
foreach ($getsetting as $getsinglesetting) {
    extract($getsinglesetting);
}

include('../controller/constant.inc.php');
include('../../function.inc.php');
$output = [];
if (isset($_GET['show']) and $_GET['show'] == md5('admin')) {
    $sql = "select * from admin INNER JOIN admin_info ON admin.admin_empid=admin_info.emp_id";
    $result = $conn->query($sql);
    $count = mysqli_num_rows($result);
    $data = array();
    if ($result->num_rows > 0) {
        $i = 1;
        while ($row = $result->fetch_assoc()) {
            $rowData = array(
                $i++,
                $row['emp_id'] . '-' . $row['admin_name'],
                $row['admin_password'],
                $row['admin_password'],
                $row['admin_password'],
                $row['admin_password'],
                $row['admin_id'],
            );
            $data[] = $rowData;
        }
    }
    $output = array(
        "data" => $data
    );
    $outputJson = json_encode($output);
    echo $outputJson;
}
if (isset($_GET['show']) and $_GET['show'] == md5('users')) {

    $sql = "select * from users GROUP BY mobile";
    $result = $conn->query($sql);
    $count = mysqli_num_rows($result);
    $data = array();
    if ($result->num_rows > 0) {
        $i = 1;
        while ($row = $result->fetch_assoc()) {

            $rowData = array(
                $i++,
                $row['name'],
                $row['email'],
                $row['mobile'],
                $row['address'] . ' ' . $row['appartment'] . ' ' . $row['city'] . ', ' . $row['postcode'],
                $row['ID'],
            );
            $data[] = $rowData;
        }
    }

    $output = array(
        "data" => $data
    );
    $outputJson = json_encode($output);
    echo $outputJson;
}


if (isset($_GET['show']) and $_GET['show'] == md5('category')) {

    $sql = "select * from category ";
    $result = $conn->query($sql);
    $count = mysqli_num_rows($result);
    $data = array();
    if ($result->num_rows > 0) {
        $i = 1;
        while ($row = $result->fetch_assoc()) {
            $date = $row['added_on'];
            $date = str_replace('-', '/', $date);
            $image = $row['image'];
            $rowData = [
                $i++,
                $row['category'],
                $row['order_number'],
                '<img src="media/category/' . $row['image'] . '" width="80px" alt="" onclick="dish(\'' . $image . '\')">',
                date('d-M-Y', strtotime($date)),
                $row['status'],
                $row['ID'],
            ];


            $data[] = $rowData;
        }
    }

    $output = array(
        "data" => $data
    );
    $outputJson = json_encode($output);
    echo $outputJson;
}
if (isset($_GET['show']) and $_GET['show'] == md5('subscription')) {
    $sql = "select * from subscription ";
    $result = $conn->query($sql);
    $count = mysqli_num_rows($result);
    $data = array();
    if ($result->num_rows > 0) {
        $i = 1;
        while ($row = $result->fetch_assoc()) {

            $date1 = $row['added_on'];
            $addd = formatDate($date1);
            $rowData = [
                $i++,
                $row['email'],
                $addd,
                $row['status'],
                $row['ID'],
            ];
            $data[] = $rowData;
        }
    }
    $output = array(
        "data" => $data
    );
    $outputJson = json_encode($output);
    echo $outputJson;
}

if (isset($_GET['show']) and $_GET['show'] == md5('coupon')) {
    $sql = "select * from coupon ";
    $result = $conn->query($sql);
    $count = mysqli_num_rows($result);
    $data = array();
    if ($result->num_rows > 0) {
        $i = 1;
        while ($row = $result->fetch_assoc()) {
            $date = $row['expired_on'];
            $d = formatDate($date);

            $date1 = $row['added_on'];
            $addd = formatDate($date1);
            $rowData = [
                $i++,
                $row['coupon_code'],
                $row['coupon_type'],
                $row['coupon_value'],
                $row['cart_min_value'],
                $d,
                $addd,
                $row['status'],
                $row['ID'],
            ];
            $data[] = $rowData;
        }
    }
    $output = array(
        "data" => $data
    );
    $outputJson = json_encode($output);
    echo $outputJson;
}
if (isset($_GET['show']) and $_GET['show'] == 'order') {

    if (checkSuperAdminSession()) {
        $filter = " ";
    } else {
        $filter = "AND orders.store='" . $_SESSION['store'] . "'";
    }

    $sql = "Select * from  orders JOIN order_status  ON orders.order_status=order_status.order_status_id WHERE orders.order_status='1' and orders.paymentstatus!='' $filter ORDER BY order_added_on DESC";
    $result = $conn->query($sql);
    $count = mysqli_num_rows($result);
    $data = array();
    if ($result->num_rows > 0) {
        $i = 1;
        while ($order = $result->fetch_assoc()) {
            $ID = $order['ID'];
            $rowData = [];
            $rowData[] = $i++;

            $rowData[] = '<a href="order-detail.php?id=' . $ID . '">' . $order['order_id'] . ' &nbsp; <i class="fas fa-eye"></i></a>';
            $rowData[] = $order['name'] . '<br>' . $order['email'] . '<br>' . $order['phone'];
            $date = str_replace('-', '/', $order['order_added_on']);
            $rowData[] = formatDateTime($date);
            $date = str_replace('-', '/', $order['delievery_date']);
            $rowData[] = date('d-M-Y', strtotime($date)) . ' (' . $order['delievery_time'] . ')';
            $rowData[] = $order['delieverytype'];

            if ($_SESSION['store'] == 0 || $_SESSION['store'] == 100) {
                $storeBadge = ($order['store'] == 1) ? '<span class="badge rounded-pill bg-primary text-uppercase">Arunachal</span>' : '<span class="badge rounded-pill bg-primary text-uppercase">DCM</span>';
                $rowData[] = $storeBadge;
            }

            if ($order['status'] == 'complete') {
                $ss = 'bg-success';
            } else {
                $ss = 'bg-warning';
            }
            $rowData[] =  '<span class="badge rounded-pill  ' . $ss . ' text-uppercase">' . $order['status'] . '</span>';

            if ($order['paymentstatus'] == 'authorized' || $order['paymentstatus'] == 'captured') {
                $rowData[] = '<span class="badge rounded-pill bg-success text-uppercase">' . $order['paymentstatus'] . '</span>';
            } else {
                $rowData[] = '<span class="badge rounded-pill bg-danger text-uppercase">' . $order['paymentstatus'] . '</span>';
            }

            if ($order['payment_type'] == 'cod') {
                $rowData[] = ' <span class="badge rounded-pill bg-secondary text-uppercase" style="background:#d760eb !important">' . $order['payment_type'] . '</span>';
            } else {
                $rowData[] = ' <span class="badge rounded-pill bg-secondary text-uppercase" style="background:#d760eb !important">Online</span>';
            }

            if ($order['otp_validate'] == 1) {
                $rowData[] = '<span class="cursor-pointer text-success" title="UPDATE ON: ' . $order['updated_on'] . '"><i class="fas fa-check-circle"></i></span>';
            } else {
                $rowData[] = '<span class="cursor-pointer text-danger" title="UPDATE ON: ' . $order['updated_on'] . '"><i class="fas fa-times-circle"></i></span>';
            }

            $rowData[] =   $order['status'];
            $rowData[] =  $order['paymentstatus'];

            $data[] = $rowData;
        }
    }

    $output = array(
        "data" => $data
    );
    $outputJson = json_encode($output);
    echo $outputJson;
}



if (isset($_GET['show']) and $_GET['show'] == 'cancel') {
    if (checkSuperAdminSession()) {
        $filter = " ";
    } else {
        $filter = "AND orders.store='" . $_SESSION['store'] . "'";
    }
    $sql = "Select * from  orders JOIN order_status  ON orders.order_status=order_status.order_status_id WHERE orders.order_status='4' $filter ORDER BY order_added_on DESC";
    $result = $conn->query($sql);
    $count = mysqli_num_rows($result);
    $data = array();
    if ($result->num_rows > 0) {
        $i = 1;
        while ($order = $result->fetch_assoc()) {
            $ID = $order['ID'];
            $rowData = [];
            $rowData[] = $i++;

            $rowData[] = '<a href="order-detail.php?id=' . $ID . '">' . $order['order_id'] . ' &nbsp; <i class="fas fa-eye"></i></a>';
            $rowData[] = $order['name'] . '<br>' . $order['email'] . '<br>' . $order['phone'];
            $date = str_replace('-', '/', $order['order_added_on']);
            $rowData[] = formatDateTime($date);
            $date = str_replace('-', '/', $order['delievery_date']);
            $rowData[] = date('d-M-Y', strtotime($date)) . ' (' . $order['delievery_time'] . ')';
            $rowData[] = $order['delieverytype'];

            if ($_SESSION['store'] == 0 || $_SESSION['store'] == 100) {
                $storeBadge = ($order['store'] == 1) ? '<span class="badge rounded-pill bg-primary text-uppercase">Arunachal</span>' : '<span class="badge rounded-pill bg-primary text-uppercase">DCM</span>';
                $rowData[] = $storeBadge;
            }

            if ($order['status'] == 'complete') {
                $ss = 'bg-success';
            } else {
                $ss = 'bg-warning';
            }
            $rowData[] =  '<span class="badge rounded-pill  ' . $ss . ' text-uppercase">' . $order['status'] . '</span>';

            if ($order['paymentstatus'] == 'authorized' || $order['paymentstatus'] == 'captured') {
                $rowData[] = '<span class="badge rounded-pill bg-success text-uppercase">' . $order['paymentstatus'] . '</span>';
            } else {
                $rowData[] = '<span class="badge rounded-pill bg-danger text-uppercase">' . $order['paymentstatus'] . '</span>';
            }

            if ($order['payment_type'] == 'cod') {
                $rowData[] = ' <span class="badge rounded-pill bg-secondary text-uppercase" style="background:#d760eb !important">' . $order['payment_type'] . '</span>';
            } else {
                $rowData[] = ' <span class="badge rounded-pill bg-secondary text-uppercase" style="background:#d760eb !important">Online</span>';
            }

            if ($order['otp_validate'] == 1) {
                $rowData[] = '<span class="cursor-pointer text-success" title="UPDATE ON: ' . $order['updated_on'] . '"><i class="fas fa-check-circle"></i></span>';
            } else {
                $rowData[] = '<span class="cursor-pointer text-danger" title="UPDATE ON: ' . $order['updated_on'] . '"><i class="fas fa-times-circle"></i></span>';
            }

            $rowData[] =   $order['status'];
            $rowData[] =  $order['paymentstatus'];

            $data[] = $rowData;
        }
    }

    $output = array(
        "data" => $data
    );
    $outputJson = json_encode($output);
    echo $outputJson;
}



if (isset($_GET['show']) and $_GET['show'] == 'complete') {
    if (checkSuperAdminSession()) {
        $filter = " ";
    } else {
        $filter = "AND orders.store='" . $_SESSION['store'] . "'";
    }
    $sql = "Select * from  orders JOIN order_status  ON orders.order_status=order_status.order_status_id WHERE orders.order_status='2' AND paymentstatus='captured' $filter ORDER BY order_added_on DESC";
    $result = $conn->query($sql);
    $count = mysqli_num_rows($result);
    $data = array();
    if ($result->num_rows > 0) {
        $i = 1;
        while ($order = $result->fetch_assoc()) {
            $ID = $order['ID'];
            $rowData = [];
            $rowData[] = $i++;

            $rowData[] = '<a href="order-detail.php?id=' . $ID . '">' . $order['order_id'] . ' &nbsp; <i class="fas fa-eye"></i></a>';
            $rowData[] = $order['name'] . '<br>' . $order['email'] . '<br>' . $order['phone'];
            $date = str_replace('-', '/', $order['order_added_on']);
            $rowData[] = formatDateTime($date);
            $date = str_replace('-', '/', $order['delievery_date']);
            $rowData[] = date('d-M-Y', strtotime($date)) . ' (' . $order['delievery_time'] . ')';
            $rowData[] = $order['delieverytype'];

            if ($_SESSION['store'] == 0 || $_SESSION['store'] == 100) {
                $storeBadge = ($order['store'] == 1) ? '<span class="badge rounded-pill bg-primary text-uppercase">Arunachal</span>' : '<span class="badge rounded-pill bg-primary text-uppercase">DCM</span>';
                $rowData[] = $storeBadge;
            }

            if ($order['status'] == 'complete') {
                $ss = 'bg-success';
            } else {
                $ss = 'bg-warning';
            }
            $rowData[] =  '<span class="badge rounded-pill  ' . $ss . ' text-uppercase">' . $order['status'] . '</span>';

            if ($order['paymentstatus'] == 'authorized' || $order['paymentstatus'] == 'captured') {
                $rowData[] = '<span class="badge rounded-pill bg-success text-uppercase">' . $order['paymentstatus'] . '</span>';
            } else {
                $rowData[] = '<span class="badge rounded-pill bg-danger text-uppercase">' . $order['paymentstatus'] . '</span>';
            }

            if ($order['payment_type'] == 'cod') {
                $rowData[] = ' <span class="badge rounded-pill bg-secondary text-uppercase" style="background:#d760eb !important">' . $order['payment_type'] . '</span>';
            } else {
                $rowData[] = ' <span class="badge rounded-pill bg-secondary text-uppercase" style="background:#d760eb !important">Online</span>';
            }

            if ($order['otp_validate'] == 1) {
                $rowData[] = '<span class="cursor-pointer text-success" title="UPDATE ON: ' . $order['updated_on'] . '"><i class="fas fa-check-circle"></i></span>';
            } else {
                $rowData[] = '<span class="cursor-pointer text-danger" title="UPDATE ON: ' . $order['updated_on'] . '"><i class="fas fa-times-circle"></i></span>';
            }

            $rowData[] =   $order['status'];
            $rowData[] =  $order['paymentstatus'];

            $data[] = $rowData;
        }
    }

    $output = array(
        "data" => $data
    );
    $outputJson = json_encode($output);
    echo $outputJson;
}



if (isset($_GET['show']) and $_GET['show'] == md5('feedback')) {

    $did = $_GET['dish_id'];
    $sql = "SELECT DISTINCT * FROM orders  LEFT JOIN order_details ON orders.ID = order_details.order_id INNER JOIN dish ON dish.ID=order_details.dish_order_id  RIGHT JOIN users ON users.ID=orders.user_id  WHERE dish.ID=$did AND orders.feedback IS NOT NULL GROUP BY order_details.order_id ";
    $result = $conn->query($sql);
    $count = mysqli_num_rows($result);
    $data = array();
    if ($result->num_rows > 0) {
        $i = 1;
        while ($row = $result->fetch_assoc()) {
            $ID  = $row['ID'];
            $iconMapping = [
                1 => 'fa-angry text-danger',      // Rating 1 corresponds to "Angry" emotion
                2 => 'fa-sad text-danger',        // Rating 2 corresponds to "Sad" emotion
                3 => 'fa-meh text-warning',        // Rating 3 corresponds to "Meh" or neutral emotion
                4 => 'fa-smile text-primary',      // Rating 4 corresponds to "Smile" emotion
                5 => 'fa-heart text-primary'       // Rating 5 corresponds to "Heart" or love emotion
            ];
            $feedbackIcon = $row['feedback_icon'];
            $rowData = [
                $i++,
                $row['feedback'],
                '<span class="d-flex align-items-end gap-2">' . $feedbackIcon . ' <i style="font-size:15px" class="fas ' . $iconMapping[$feedbackIcon] . '"></i></span>',
                $row['name'] . '</br>' . $row['email'] . '</br>' . $row['phone'],
                formatDateTime($row['feedback_added_on']),
            ];
            $data[] = $rowData;
        }
    }
    $output = array(
        "data" => $data
    );
    $outputJson = json_encode($output);
    echo $outputJson;
}












if (isset($_GET['show']) && $_GET['show'] == md5('dish')) {
    $getdish = getdish($conn);
    $getdish = json_decode($getdish, true);

    $data = array();
    $i = 1;

    foreach ($getdish as $row) {
        $ID = $row['ID'];
        $status = $row['status'];
        $type = $row['type'];
        $is_popular = $row['is_popular'];
        $dish = $row['dish'];
        $is_available = $row['is_available'];
        $image = $row['image'];


        $cat_name_by_id = cat_name_by_id($row['category_id']);
        $Cname = $cat_name_by_id['category'];

        if ($type == 'non-veg') {
            $ico = '<div style="display: flex;     align-items: center;justify-content:center;flex-direction: column;font-size: 8px;"><span class="text-center">Non-Veg</span><img src="' . SITE_PATH . 'images/non-veg.png" width="30px" alt="" ></div>';
        } else {
            $ico = '<div style="display: flex;     align-items: center;justify-content:center;flex-direction: column;font-size: 8px;"><span class="text-center">Veg</span> <img src="' . SITE_PATH . 'images/veg.png" width="30px" alt="" ></div>';
        }
        $rowData = [
            $i++,
            $Cname,
            $ico,
            $dish,
            '<img src="../admin/media/dish/' . $image . '" width="80px" alt="" onclick="dish(\'' . $image . '\')">',
            $status,
            $is_popular,
            $is_available,
            '<a target="blank" href="feedback.php?dish_id=' . $row['ID'] . '"><button type="button" class="btn btn-sm btn-primary">VIEW <i class="fa fa-comments" aria-hidden="true"></i></button></a>',
            $ID,

        ];



        $data[] = $rowData;
    }

    $output = array(
        "data" => $data
    );

    $outputJson = json_encode($output);
    echo $outputJson;
}





if (isset($_GET['show']) and $_GET['show'] == md5('festivals')) {
    $sql = "select * from festivals ";
    $result = $conn->query($sql);
    $count = mysqli_num_rows($result);
    $data = array();
    if ($result->num_rows > 0) {
        $i = 1;
        while ($row = $result->fetch_assoc()) {
            $rowData = [
                $i++,
                $row['festival_name'],
                '<img src="../admin/media/festive/' . $row['festival_banner'] . '" width="80px" alt="" onclick="dish(\'' . $row['festival_banner'] . '\')">',
                $row['festival_status'],
                $row['timing'],
                $row['redirect_page'],
                $row['festival_id'],
            ];
            $data[] = $rowData;
        }
    }
    $output = array(
        "data" => $data
    );
    $outputJson = json_encode($output);
    echo $outputJson;
}