<?php
include('../../controller/common-controller.php');
include('../../connect/session.php');
$getsetting = getsetting($conn);
$getsetting = json_decode($getsetting, true);
foreach ($getsetting as $getsinglesetting) {
    extract($getsinglesetting);
}
$response = array();




if (isset($_POST['param']) &&  decryptpost($conn, $_POST['param']) === 'get_coupon_html') {
    try {
        $id = decryptpost($conn, $_POST['id']);

        $selectkro = selectkro($conn, 'coupon', ' WHERE ID="' . $id . '"');
        $selectkro = json_decode($selectkro, true);
        foreach ($selectkro as $singleselectkro) {
            extract($singleselectkro);
        }

        if ($coupon_type == 'P') {
            $ct = 'checked';
        } else  if ($coupon_type == 'F') {
            $ct = 'checked';
        } else {
            $ct = '';
        }
        $html = '
        <div class="row mb-5">
            <input type="hidden" value="' . $id . '" name="ID" />
            <div class="form-group row mb-3">
                <label for="code" class="col-sm-3 control-label col-form-label">Coupon Code</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control form-control-solid" name="coupon_code" id="coupon_code" value="' . $coupon_code . '" required>
                </div>
            </div>
        
            <div class="form-group row mb-3">
                <label for="fname" class="col-sm-3 control-label col-form-label">Type</label>
                <div class="col-sm-9" style="display: flex; gap: 10px; align-items: center;">
                    <div class="form-check">
                        <label class="form-check-label mb-0" for="customControlValidation1">
                            <input type="radio" class="form-check-input" name="coupon_type" id="customControlValidation1" required value="P" ' . ($coupon_type == 'P' ? 'checked' : '') . '>
                            Percent
                        </label>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label mb-0" for="customControlValidation2">
                            <input type="radio" class="form-check-input" name="coupon_type" id="customControlValidation2" required value="F" ' . ($coupon_type == 'F' ? 'checked' : '') . '>
                            Number
                        </label>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <div class="form-group row mb-3">
            <label for="min_value" class="col-sm-3 control-label col-form-label">Coupon Value</label>
            <div class="col-sm-9">
                <input type="text" class="form-control form-control-solid" name="coupon_value" id="coupon_value" value="' . $coupon_value . '" required>
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

        $deletekro = deletekro($conn, 'coupon', 'WHERE ID="' . $id . '"');
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
if (isset($_POST['param']) &&  decryptpost($conn, $_POST['param']) === 'coupon_active') {
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

    $response = updatekro($conn, 'coupon', $columnsToUpdate, $conditionColumn, $conditionValue);
}
if (isset($_POST['param']) &&  decryptpost($conn, $_POST['param']) === 'add_coupon') {


    $added_on = date("Y-m-d");
    $coupon_code = decryptpost($conn, $_POST['coupon_code']);
    $coupon_value = decryptpost($conn, $_POST['coupon_value']);
    $cart_min_value = decryptpost($conn, $_POST['cart_min_value']);
    $coupon_type = decryptpost($conn, $_POST['coupon_type']);
    $expired_on = decryptpost($conn, $_POST['expired_on']);

    $dataToInsert = array(
        'coupon_code' => $coupon_code,
        'coupon_value' => $coupon_value,
        'cart_min_value' => $cart_min_value,
        'coupon_type' => $coupon_type,
        'expired_on' => $expired_on,
        'status' => '1',
        'added_on' => $added_on
    );
    $response = addkro($conn, 'coupon', $dataToInsert);
}


if (isset($_POST['param']) &&  decryptpost($conn, $_POST['param']) === 'update_coupon') {

    $ID = decryptpost($conn, $_POST['ID']);
    $added_on = date("Y-m-d");
    $coupon_code = decryptpost($conn, $_POST['coupon_code']);
    $coupon_value = decryptpost($conn, $_POST['coupon_value']);
    $cart_min_value = decryptpost($conn, $_POST['cart_min_value']);
    $coupon_type = decryptpost($conn, $_POST['coupon_type']);
    $expired_on = decryptpost($conn, $_POST['expired_on']);

    $columnsToUpdate = array(
        'coupon_code' => $coupon_code,
        'coupon_value' => $coupon_value,
        'cart_min_value' => $cart_min_value,
        'coupon_type' => $coupon_type,
        'expired_on' => $expired_on,
        'status' => '1',
        'added_on' => $added_on
    );
    $conditionColumn = 'ID'; // Adjust this to your actual condition column
    $conditionValue = $ID;
    $response = updatekro($conn, 'coupon', $columnsToUpdate, $conditionColumn, $conditionValue);


    if (isset($_FILES['image']['name']) && $_FILES['image']['name'] != '') {

        $logoExistsInDatabase = checkImageExistsInDatabase($conn, 'coupon', 'image');
        if ($logoExistsInDatabase) {
            $old_img = getImageNameInDatabase($conn, 'coupon', 'image');
            unlink('../../media/coupon/' . $old_img); // Remove the old file
        }

        $extn = explode('.', $_FILES["image"]["name"]);
        $str = str_replace(' ', '-', strtolower($coupon));
        $image   = $str . "." . $extn[1];
        $upath = "../../media/coupon/" . $image;
        move_uploaded_file($_FILES["image"]["tmp_name"], $upath);
        $columnsToUpdate = array(
            'image' => $image,
        );
        $conditionColumn = 'ID'; // Adjust this to your actual condition column
        $conditionValue = $ID;
        $response = updatekro($conn, 'coupon', $columnsToUpdate, $conditionColumn, $conditionValue);
    }
}


// Sending the JSON response
header('Content-Type: application/json');
echo json_encode($response);
