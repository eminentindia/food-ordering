<?php
include('../../controller/common-controller.php');
include('../../connect/session.php');
$getsetting = getsetting($conn);
$getsetting = json_decode($getsetting, true);
foreach ($getsetting as $getsinglesetting) {
    extract($getsinglesetting);
}
$response = array();




if (isset($_POST['param']) &&  decryptpost($conn, $_POST['param']) === 'get_subscription_html') {
    try {
        $id = decryptpost($conn, $_POST['id']);

        $selectkro = selectkro($conn, 'subscription', ' WHERE ID="' . $id . '"');
        $selectkro = json_decode($selectkro, true);
        foreach ($selectkro as $singleselectkro) {
            extract($singleselectkro);
        }

        if ($subscription_type == 'P') {
            $ct = 'checked';
        } else  if ($subscription_type == 'F') {
            $ct = 'checked';
        } else {
            $ct = '';
        }
        $html = '
        <div class="row mb-5">
            <input type="hidden" value="' . $id . '" name="ID" />
            <div class="form-group row mb-3">
                <label for="code" class="col-sm-3 control-label col-form-label">subscription Code</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control form-control-solid" name="subscription_code" id="subscription_code" value="' . $subscription_code . '" required>
                </div>
            </div>
        
            <div class="form-group row mb-3">
                <label for="fname" class="col-sm-3 control-label col-form-label">Type</label>
                <div class="col-sm-9" style="display: flex; gap: 10px; align-items: center;">
                    <div class="form-check">
                        <label class="form-check-label mb-0" for="customControlValidation1">
                            <input type="radio" class="form-check-input" name="subscription_type" id="customControlValidation1" required value="P" ' . ($subscription_type == 'P' ? 'checked' : '') . '>
                            Percent
                        </label>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label mb-0" for="customControlValidation2">
                            <input type="radio" class="form-check-input" name="subscription_type" id="customControlValidation2" required value="F" ' . ($subscription_type == 'F' ? 'checked' : '') . '>
                            Number
                        </label>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <div class="form-group row mb-3">
            <label for="min_value" class="col-sm-3 control-label col-form-label">subscription Value</label>
            <div class="col-sm-9">
                <input type="text" class="form-control form-control-solid" name="subscription_value" id="subscription_value" value="' . $subscription_value . '" required>
            </div>
        </div>
        <div class="form-group row mb-3">
            <label for="min_value" class="col-sm-3 control-label col-form-label">Cart Min Value</label>
            <div class="col-sm-9">
                <input type="number" class="form-control form-control-solid" name="cart_min_value" id="cart_min_value" value="' . $cart_min_value . '" required>
            </div>
        </div>
        <div class="form-group row mb-3">
            <label for="expired_on" class="col-sm-3 control-label col-form-label">Expired On</label>
            <div class="col-sm-9">
                <div class="input-group">
                    <input required type="date" class="form-control form-control-solid" value="' . $expired_on . '" placeholder="yyyy-mm-dd" name="expired_on" id="expired_on" />
                </div>
            </div>
        </div>

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

        $deletekro = deletekro($conn, 'subscription', 'WHERE ID="' . $id . '"');
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
if (isset($_POST['param']) &&  decryptpost($conn, $_POST['param']) === 'subscription_active') {
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

    $response = updatekro($conn, 'subscription', $columnsToUpdate, $conditionColumn, $conditionValue);
}
if (isset($_POST['param']) &&  decryptpost($conn, $_POST['param']) === 'add_subscription') {


    $added_on = date("Y-m-d");
    $subscription_code = decryptpost($conn, $_POST['subscription_code']);
    $subscription_value = decryptpost($conn, $_POST['subscription_value']);
    $cart_min_value = decryptpost($conn, $_POST['cart_min_value']);
    $subscription_type = decryptpost($conn, $_POST['subscription_type']);
    $expired_on = decryptpost($conn, $_POST['expired_on']);

    $dataToInsert = array(
        'subscription_code' => $subscription_code,
        'subscription_value' => $subscription_value,
        'cart_min_value' => $cart_min_value,
        'subscription_type' => $subscription_type,
        'expired_on' => $expired_on,
        'status' => '1',
        'added_on' => $added_on
    );
    $response = addkro($conn, 'subscription', $dataToInsert);
}


if (isset($_POST['param']) &&  decryptpost($conn, $_POST['param']) === 'update_subscription') {

    $ID = decryptpost($conn, $_POST['ID']);
    $added_on = date("Y-m-d");
    $subscription_code = decryptpost($conn, $_POST['subscription_code']);
    $subscription_value = decryptpost($conn, $_POST['subscription_value']);
    $cart_min_value = decryptpost($conn, $_POST['cart_min_value']);
    $subscription_type = decryptpost($conn, $_POST['subscription_type']);
    $expired_on = decryptpost($conn, $_POST['expired_on']);

    $columnsToUpdate = array(
        'subscription_code' => $subscription_code,
        'subscription_value' => $subscription_value,
        'cart_min_value' => $cart_min_value,
        'subscription_type' => $subscription_type,
        'expired_on' => $expired_on,
        'status' => '1',
        'added_on' => $added_on
    );
    $conditionColumn = 'ID'; // Adjust this to your actual condition column
    $conditionValue = $ID;
    $response = updatekro($conn, 'subscription', $columnsToUpdate, $conditionColumn, $conditionValue);


    if (isset($_FILES['image']['name']) && $_FILES['image']['name'] != '') {

        $logoExistsInDatabase = checkImageExistsInDatabase($conn, 'subscription', 'image');
        if ($logoExistsInDatabase) {
            $old_img = getImageNameInDatabase($conn, 'subscription', 'image');
            unlink('../../media/subscription/' . $old_img); // Remove the old file
        }

        $extn = explode('.', $_FILES["image"]["name"]);
        $str = str_replace(' ', '-', strtolower($subscription));
        $image   = $str . "." . $extn[1];
        $upath = "../../media/subscription/" . $image;
        move_uploaded_file($_FILES["image"]["tmp_name"], $upath);
        $columnsToUpdate = array(
            'image' => $image,
        );
        $conditionColumn = 'ID'; // Adjust this to your actual condition column
        $conditionValue = $ID;
        $response = updatekro($conn, 'subscription', $columnsToUpdate, $conditionColumn, $conditionValue);
    }
}


// Sending the JSON response
header('Content-Type: application/json');
echo json_encode($response);
