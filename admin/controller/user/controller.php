<?php
include('../../controller/common-controller.php');
include('../../connect/session.php');
$getsetting = getsetting($link);
$getsetting = json_decode($getsetting, true);
foreach ($getsetting as $getsinglesetting) {
    extract($getsinglesetting);
}
$response = array();




if (isset($_POST['param']) &&  decryptpost($link, $_POST['param']) === 'get_user_html') {
    try {
        $id = decryptpost($link, $_POST['id']);

        $selectkro = selectkro($link, 'admin', 'JOIN admin_info ON admin.admin_user_id=admin_info.user_id WHERE admin.admin_user_id="' . $id . '"');
        $selectkro = json_decode($selectkro, true);
        foreach ($selectkro as $singleselectkro) {
            extract($singleselectkro);
        }
        $html = ' 
        <div class="row mb-5">
        <input type="hidden" value="' . $admin_user_id . '" name="admin_user_id" />
            <div class="col-md-3 fv-row fv-plugins-icon-container">
                <label class="required fs-5 fw-semibold mb-2 text-capitalize">Full name</label>
                <input type="text" class="form-control form-control-solid" placeholder="Full Name" value="' . $admin_name . '" name="admin_name">
            </div>
            <div class="col-md-3 fv-row fv-plugins-icon-container">
                <label class="required fs-5 fw-semibold mb-2 text-capitalize">Mobile</label>
                <input type="text" class="form-control form-control-solid" placeholder="Mobile Number" value="' . $admin_mobile . '" name="admin_mobile">
            </div>
            <div class="col-md-3 fv-row fv-plugins-icon-container">
                <label class="required fs-5 fw-semibold mb-2 text-capitalize">Email</label>
                <input type="text" class="form-control form-control-solid" placeholder="Email" value="' . $admin_email . '" name="admin_email">
            </div>
            <div class="col-md-3 fv-row fv-plugins-icon-container">
            <label class="fs-5 fw-semibold mb-2">DOB</label>
            <input class="form-control form-control-solid" type="date" placeholder=""  value="' . $dob . '"  name="dob">
        </div>
        </div>
        <div class="d-flex flex-column mb-5 fv-row fv-plugins-icon-container">
            <label class="required fs-5 fw-semibold mb-2 text-capitalize">Current Address</label>
            <input class="form-control form-control-solid" placeholder="Current Address" value="' . $current_address . '" name="current_address">
        </div>
        <div class="d-flex flex-column mb-5 fv-row fv-plugins-icon-container">
            <label class="required fs-5 fw-semibold mb-2 text-capitalize">Permanent Address</label>
            <input class="form-control form-control-solid" placeholder="Permanent Address" value="' . $permanent_address . '" name="permanent_address">
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
if (isset($_POST['param']) &&  decryptpost($link, $_POST['param']) === 'delete_data') {
    try {
        $id = $_POST['id'];
         
        $deletekro = deletekro($link, 'admin', 'WHERE admin_user_id="' . $id . '"');
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
if (isset($_POST['param']) &&  decryptpost($link, $_POST['param']) === 'user_active') {
    $status =  $_POST['isChecked'];
    $id = decryptpost($link, $_POST['id']);
  
    if ($status == 'true') {
        $statusValue = 'Inactive';
    }
    if ($status == 'false') {
        $statusValue = 'Active';
    }
    $columnsToUpdate = array(
        'admin_status' => $statusValue,
    );
    $conditionColumn = 'admin_user_id'; // Adjust this to your actual condition column
    $conditionValue = $id;

    $response = updatekro($link, 'admin', $columnsToUpdate, $conditionColumn, $conditionValue);
}
if (isset($_POST['param']) &&  decryptpost($link, $_POST['param']) === 'add_user') {
    $admin_name = decryptpost($link, $_POST['admin_name']);
    $admin_mobile = decryptpost($link, $_POST['admin_mobile']);
    $admin_email = decryptpost($link, $_POST['admin_email']);
    $dob = decryptpost($link, $_POST['dob']);
    $current_address = decryptpost($link, $_POST['current_address']);
    $permanent_address = decryptpost($link, $_POST['permanent_address']);
    $admin_user_type = decryptpost($link, $_POST['admin_user_type']);


    $admin_user_id = generateUniqueNumber(10);
    $dataToInsert = array(
        'admin_name' => $admin_name,
        'admin_mobile' => $admin_mobile,
        'admin_email' => $admin_email,
        'admin_user_type' => $admin_user_type,
        'admin_user_id' => $admin_user_id
    );
    $response = addkro($link, 'admin', $dataToInsert);
    if ($response['status'] == 'success') {
        //insert admin_info
        $dataToInsert = array(
            'dob' => $dob,
            'current_address' => $current_address,
            'permanent_address' => $permanent_address,
            'user_id' => $admin_user_id,
        );
        $response = addkro($link, 'admin_info', $dataToInsert);
    }
}
if (isset($_POST['param']) &&  decryptpost($link, $_POST['param']) === 'update_user') {
    $admin_name = decryptpost($link, $_POST['admin_name']);
    $admin_mobile = decryptpost($link, $_POST['admin_mobile']);
    $admin_email = decryptpost($link, $_POST['admin_email']);
    $dob = decryptpost($link, $_POST['dob']);
    $current_address = decryptpost($link, $_POST['current_address']);
    $permanent_address = decryptpost($link, $_POST['permanent_address']);
    $admin_user_id = decryptpost($link, $_POST['admin_user_id']);
    $columnsToUpdate = array(
        'admin_name' => $admin_name,
        'admin_mobile' => $admin_mobile,
        'admin_email' => $admin_email,
    );
    $conditionColumn = 'admin_user_id'; // Adjust this to your actual condition column
    $conditionValue = $admin_user_id;
    $response = updatekro($link, 'admin', $columnsToUpdate, $conditionColumn, $conditionValue);
    if ($response['status'] == 'success') {
        //update admin_info
        $columnsToUpdate = array(
            'dob' => $dob,
            'current_address' => $current_address,
            'permanent_address' => $permanent_address,
        );
        $conditionColumn = 'user_id'; // Adjust this to your actual condition column
        $conditionValue = $admin_user_id;
        $response = updatekro($link, 'admin_info', $columnsToUpdate, $conditionColumn, $conditionValue);
    }
}

if (isset($_POST['param']) &&  decryptpost($link, $_POST['param']) === 'change_user_type') {
    try {
        if (developer()) {
            $userType = decryptpost($link, $_POST['userType']);
            $admin_user_id = decryptpost($link, $_POST['admin_user_id']);
            $columnsToUpdate = array(
                'admin_user_type' => $userType,
            );
            $conditionColumn = 'admin_user_id'; // Adjust this to your actual condition column
            $conditionValue = $admin_user_id;
            $response = updatekro($link, 'admin', $columnsToUpdate, $conditionColumn, $conditionValue);
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
