<?php
include('../../controller/common-controller.php');
include('../../connect/session.php');
$getsetting = getsetting($conn);
$getsetting = json_decode($getsetting, true);
foreach ($getsetting as $getsinglesetting) {
    extract($getsinglesetting);
}
$response = array();
include('../../controller/constant.inc.php');




if (isset($_POST['param']) &&  decryptpost($conn, $_POST['param']) === 'get_festivals_html') {
    try {
        $id = decryptpost($conn, $_POST['id']);

        $selectkro = selectkro($conn, 'festivals', ' WHERE festival_id="' . $id . '"');
        $selectkro = json_decode($selectkro, true);
        foreach ($selectkro as $singleselectkro) {
            extract($singleselectkro);
        }


        $html = '
        <div class="row mb-5">
            <input type="hidden" value="' . $id . '" name="ID" />
            <div class="form-group row mb-3">
                <label for="code" class="col-sm-3 control-label col-form-label">Festivals Name</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control form-control-solid" name="festival_name" id="festival_name" value="' . $festival_name . '" required>
                </div>
            </div>
            <div class="form-group row mb-3">
                <label for="min_value" class="col-sm-3 control-label col-form-label">Banner Timing</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control form-control-solid" name="timing" id="timing" value="' . $timing . '" required>
                </div>
            </div>
            <div class="form-group row mb-3">
                <label for="min_value" class="col-sm-3 control-label col-form-label">Redirect Page</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control form-control-solid" name="redirect_page" id="redirect_page" value="' . $redirect_page . '" required>
                </div>
            </div>

            <div class="form-group row mb-3">
                    <label for="image" class="col-sm-3 control-label col-form-label">Festival Banner</label>
                    <div class="col-sm-9  col-11 d-flex align-items-center gap-4">
                        <img src="' . SITE_PATH . 'admin/media/festive/' . $festival_banner . ' ?>" width="80px" alt="" onclick="edit_dish("' . $festival_banner . '")">
                            <input type="file" class="form-control" name="festival_banner" id="festival_banner">
                            <input type="hidden" name="oldImg" id="oldImg" value="' . $festival_banner . '">
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

        $deletekro = deletekro($conn, 'festivals', 'WHERE ID="' . $id . '"');
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
if (isset($_POST['param']) &&  decryptpost($conn, $_POST['param']) === 'festivals_active') {
    $status =  $_POST['isChecked'];
    $id = decryptpost($conn, $_POST['id']);

    if ($status == 'true') {
        $statusValue = '0';
    }
    if ($status == 'false') {
        $statusValue = '1';
    }
    $columnsToUpdate = array(
        'festival_status' => $statusValue,
    );
    $conditionColumn = 'festival_id'; // Adjust this to your actual condition column
    $conditionValue = $id;

    $response = updatekro($conn, 'festivals', $columnsToUpdate, $conditionColumn, $conditionValue);
}


if (isset($_POST['param']) &&  decryptpost($conn, $_POST['param']) === 'add_festivals') {


    $added_on = date("Y-m-d");
    $festival_name = decryptpost($conn, $_POST['festival_name']);
    $timing = decryptpost($conn, $_POST['timing']);
    $redirect_page = decryptpost($conn, $_POST['redirect_page']);


    if (isset($_FILES['festival_banner']['name']) && is_string($_FILES['festival_banner']['name']) && $_FILES['festival_banner']['name'] != '') {
        $extn = explode('.', $_FILES["festival_banner"]["name"]);
        $rand = date('Y') . '-' . rand(1111, 9999);
        $str = str_replace(' ', '-', strtolower($festival_name));
        $image = $str . $rand . "." . $extn[1];
        $path = "../../media/festive/" . $image;
        move_uploaded_file($_FILES["festival_banner"]["tmp_name"], $path);
    }


    $dataToInsert = array(
        'festival_name' => $festival_name,
        'timing' => $timing,
        'festival_banner'=>$image,
        'redirect_page' => $redirect_page
    );
    $response = addkro($conn, 'festivals', $dataToInsert);
}


if (isset($_POST['param']) &&  decryptpost($conn, $_POST['param']) === 'update_festivals') {

    $ID = decryptpost($conn, $_POST['ID']);

    $festival_name = decryptpost($conn, $_POST['festival_name']);
    $timing = decryptpost($conn, $_POST['timing']);
    $redirect_page = decryptpost($conn, $_POST['redirect_page']);


    $columnsToUpdate = array(
        'festival_name' => $festival_name,
        'timing' => $timing,
        'redirect_page' => $redirect_page
    );
    $conditionColumn = 'festival_id'; // Adjust this to your actual condition column
    $conditionValue = $ID;
    $response = updatekro($conn, 'festivals', $columnsToUpdate, $conditionColumn, $conditionValue);

    if (isset($_FILES['festival_banner']['name']) && $_FILES['festival_banner']['name'] != '') {
        $logoExistsInDatabase = checkImageExistsInDatabase($conn, 'festivals', 'festival_banner');
        if ($logoExistsInDatabase) {
            $old_img = getImageNameInDatabase($conn, 'festivals', 'festival_banner');
            unlink('../../media/festive/' . $old_img); // Remove the old file
        }
        $extn = explode('.', $_FILES["festival_banner"]["name"]);
        $str = str_replace(' ', '-', strtolower($festival_name));
        $image   = $str . rand() . "." . $extn[1];
        $upath = "../../media/festive/" . $image;
        move_uploaded_file($_FILES["festival_banner"]["tmp_name"], $upath);
        $columnsToUpdate = array(
            'festival_banner' => $image,
        );
        $conditionColumn = 'festival_id'; // Adjust this to your actual condition column
        $conditionValue = $ID;
        $response = updatekro($conn, 'festivals', $columnsToUpdate, $conditionColumn, $conditionValue);
    }
}


// Sending the JSON response
header('Content-Type: application/json');
echo json_encode($response);
