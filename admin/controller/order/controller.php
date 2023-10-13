<?php
include('../../controller/common-controller.php');
include('../../connect/session.php');
$getsetting = getsetting($conn);
$getsetting = json_decode($getsetting, true);
foreach ($getsetting as $getsinglesetting) {
    extract($getsinglesetting);
}
include('../../controller/constant.inc.php');
$response = array();




if (isset($_POST['param']) &&  decryptpost($conn, $_POST['param']) === 'get_order_html') {
    try {
        $id = decryptpost($conn, $_POST['id']);

        $selectkro = selectkro($conn, 'orders', ' WHERE ID="' . $id . '"');
        $selectkro = json_decode($selectkro, true);
        foreach ($selectkro as $singleselectkro) {
            extract($singleselectkro);
        }
        $html = ' 
        <div class="row mb-5">
        <input type="hidden" value="' . $id . '" name="ID" />
            <div class="col-md-3 fv-row fv-plugins-icon-container">
                <label class="required fs-5 fw-semibold mb-2 text-capitalize">order</label>
                <input type="text" class="form-control form-control-solid" placeholder="order" value="' . $order . '" name="order">
            </div>
          
            <div class="col-md-3 fv-row fv-plugins-icon-container">
                <label class="required fs-5 fw-semibold mb-2 text-capitalize">Display Priority</label>
                <input type="text" class="form-control form-control-solid" placeholder="Display Priority" value="' . $order_number . '" name="order_number">
            </div>

            <div class="col-md-6 fv-row fv-plugins-icon-container">
            <label class="required fs-5 fw-semibold mb-2 text-capitalize">Image</label>
                <div class="d-flex align-items-center gap-3"><img src="media/order/' . $image . '" width="80px" alt="" onclick="order(' . $image . ')">
                <input type="file" class="form-control" name="image" id="image"></div>
            </div>
        </div>
        </div>
       
        ';
        $response['status'] = 'success';
        $response['message'] = $html;
    } catch (\Throwable $th) {
        include('../../notfound.html');
        $html2 = ob_get_clean();
        $response['status'] = 'success';
        $response['message'] = $html2;
    }
}
if (isset($_POST['param']) &&  decryptpost($conn, $_POST['param']) === 'delete_data') {
    try {
        $id = $_POST['id'];

        $deletekro = deletekro($conn, 'orders', 'WHERE ID="' . $id . '"');
        if ($deletekro) {
            $response['status'] = 'success';
            $response['message'] = 'SUCCESS !!';
        } else {
            $response['status'] = 'error';
            $response['message'] = 'FAILED TO DELETE !!';
        }
    } catch (\Throwable $th) {
        $response['status'] = 'error';
        $response['message'] = 'FAILED TO DELETE !!';
    }
}
if (isset($_POST['param']) &&  decryptpost($conn, $_POST['param']) === 'order_active') {
    $status =  $_POST['isChecked'];
    $id = decryptpost($conn, $_POST['id']);

    if ($status == 'true') {
        $statusValue = '0';
    }
    if ($status == 'false') {
        $statusValue = '1';
    }
    $columnsToUpdate = array(
        'status' => $statusValue,
    );
    $conditionColumn = 'ID'; // Adjust this to your actual condition column
    $conditionValue = $id;

    $response = updatekro($conn, 'orders', $columnsToUpdate, $conditionColumn, $conditionValue);
}


if (isset($_POST['param']) &&  decryptpost($conn, $_POST['param']) === 'updatestatus_data') {
    $status =  $_POST['isChecked'];
    $order_status = mysqli_real_escape_string($conn, $_POST['order_status']);
    $id = mysqli_real_escape_string($conn, $_POST['order_ID']);
    $user_email = mysqli_real_escape_string($conn, $_POST['user_email']);
    $UID = mysqli_real_escape_string($conn, $_POST['UID']);
    if ($order_status == '2') {
        $delievered_on = date("Y-m-d h:i:s");
        $columnsToUpdate = array(
            'paymentstatus' => 'captured',
            'order_status' => $order_status,
            'delievered_on' => $delievered_on,
        );
        $conditionColumn = 'ID'; // Adjust this to your actual condition column
        $conditionValue = $id;
        $response = updatekro($conn, 'orders', $columnsToUpdate, $conditionColumn, $conditionValue);
        $row = mysqli_fetch_assoc(mysqli_query($conn, "select count(*) as total_order from orders where user_id='$UID'"));
        $total_order = $row['total_order'];
        if ($total_order == 1) {
            $res = mysqli_query($conn, "select * from users where ID='$UID'");
            if (mysqli_num_rows($res) > 0) {
                $row1 = mysqli_fetch_assoc($res);
                $email = $row1['email'];
                $mobile = $row1['mobile'];
            }
        }
        // $html = send_complete_order_email($conn, $id);
        // send_email($user_email, $html, 'Order Delivered !', $smtp_email, $smtp_password);
    }

    if ($order_status == '3') {
        $columnsToUpdate = array(
            'order_status' => $order_status,
        );
        $conditionColumn = 'ID'; // Adjust this to your actual condition column
        $conditionValue = $id;
        $response = updatekro($conn, 'orders', $columnsToUpdate, $conditionColumn, $conditionValue);
        // $html = send_ontheway_order_email($conn, $id);
        // send_email($user_email, $html, 'Your Order is On The Way', $smtp_email, $smtp_password);
    }
    if ($order_status == '4') {
        $order_cancelAt = date("Y-m-d h:i:s");
        $columnsToUpdate = array(
            'paymentstatus' => 'cancel',
            'order_status' => $order_status,
            'order_cancelBy' => 'admin',
            'order_cancelAt' => '$order_cancelAt'
        );
        $conditionColumn = 'ID'; // Adjust this to your actual condition column
        $conditionValue = $id;
        $response = updatekro($conn, 'orders', $columnsToUpdate, $conditionColumn, $conditionValue);
        // $html = send_cancel_order_email($conn, $id);
        // send_email($user_email, $html, 'Order Cancel !', $smtp_email, $smtp_password);
    }

}



if (isset($_POST['param']) &&  decryptpost($conn, $_POST['param']) === 'add_order') {
    $order = decryptpost($conn, $_POST['orders']);
    $slug = str_replace(' ', '-', strtolower($order));
    $order_number = decryptpost($conn, $_POST['order_number']);
    $extn = explode('.', $_FILES["image"]["name"]);
    $str = str_replace(' ', '-', strtolower($order));
    $image   = $str . "." . $extn[1];
    $upath = "../../media/order/" . $image;
    move_uploaded_file($_FILES["image"]["tmp_name"], $upath);


    $order_order_id = generateUniqueNumber(10);
    $dataToInsert = array(
        'orders' => $order,
        'slug' => $slug,
        'order_number' => $order_number,
        'image' => $image,
    );
    $response = addkro($conn, 'orders', $dataToInsert);
}


if (isset($_POST['param']) &&  decryptpost($conn, $_POST['param']) === 'update_order') {
    $order = decryptpost($conn, $_POST['orders']);
    $ID = decryptpost($conn, $_POST['ID']);
    $order_number = decryptpost($conn, $_POST['order_number']);
    $slug = str_replace(' ', '-', strtolower($order));
    $columnsToUpdate = array(
        'orders' => $order,
        'slug' => $slug,
        'order_number' => $order_number,
    );
    $conditionColumn = 'ID'; // Adjust this to your actual condition column
    $conditionValue = $ID;
    $response = updatekro($conn, 'orders', $columnsToUpdate, $conditionColumn, $conditionValue);


    if (isset($_FILES['image']['name']) && $_FILES['image']['name'] != '') {

        $logoExistsInDatabase = checkImageExistsInDatabase($conn, 'orders', 'image');
        if ($logoExistsInDatabase) {
            $old_img = getImageNameInDatabase($conn, 'orders', 'image');
            unlink('../../media/order/' . $old_img); // Remove the old file
        }

        $extn = explode('.', $_FILES["image"]["name"]);
        $str = str_replace(' ', '-', strtolower($order));
        $image   = $str . "." . $extn[1];
        $upath = "../../media/order/" . $image;
        move_uploaded_file($_FILES["image"]["tmp_name"], $upath);
        $columnsToUpdate = array(
            'image' => $image,
        );
        $conditionColumn = 'ID'; // Adjust this to your actual condition column
        $conditionValue = $ID;
        $response = updatekro($conn, 'orders', $columnsToUpdate, $conditionColumn, $conditionValue);
    }
}

if (isset($_POST['param']) &&  decryptpost($conn, $_POST['param']) === 'change_order_type') {
    try {
        if (developer()) {
            $orderType = decryptpost($conn, $_POST['orderType']);
            $order_order_id = decryptpost($conn, $_POST['order_order_id']);
            $columnsToUpdate = array(
                'order_order_type' => $orderType,
            );
            $conditionColumn = 'order_order_id'; // Adjust this to your actual condition column
            $conditionValue = $order_order_id;
            $response = updatekro($conn, 'orders', $columnsToUpdate, $conditionColumn, $conditionValue);
        } else {
            $response['status'] = 'error';
            $response['message'] = 'UNKNOWN REQUEST !!';
        }
    } catch (\Throwable $th) {
        $response['status'] = 'error';
        $response['message'] = 'FAILED TO UPDATE !!';
    }
}

// Sending the JSON response
header('Content-Type: application/json');
echo json_encode($response);
