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




if (isset($_POST['param']) &&  decryptpost($conn, $_POST['param']) === 'get_category_html') {
    try {
        $id = decryptpost($conn, $_POST['id']);

        $selectkro = selectkro($conn, 'category', ' WHERE ID="' . $id . '"');
        $selectkro = json_decode($selectkro, true);
        foreach ($selectkro as $singleselectkro) {
            extract($singleselectkro);
        }
        $html = ' 
        <div class="row mb-5">
        <input type="hidden" value="' . $id . '" name="ID" />
            <div class="col-md-3 fv-row fv-plugins-icon-container">
                <label class="required fs-5 fw-semibold mb-2 text-capitalize">Category</label>
                <input type="text" class="form-control form-control-solid" placeholder="Category" value="' . $category . '" name="category">
            </div>
          
            <div class="col-md-3 fv-row fv-plugins-icon-container">
                <label class="required fs-5 fw-semibold mb-2 text-capitalize">Display Priority</label>
                <input type="text" class="form-control form-control-solid" placeholder="Display Priority" value="' . $order_number . '" name="order_number">
            </div>

            <div class="col-md-6 fv-row fv-plugins-icon-container">
            <label class="required fs-5 fw-semibold mb-2 text-capitalize">Image</label>
                <div class="d-flex align-items-center gap-3"><img src="media/category/' . $image . '" width="80px" alt="" onclick="category(' . $image . ')">
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

        $deletekro = deletekro($conn, 'category', 'WHERE ID="' . $id . '"');
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
if (isset($_POST['param']) &&  decryptpost($conn, $_POST['param']) === 'category_active') {
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

    $response = updatekro($conn, 'category', $columnsToUpdate, $conditionColumn, $conditionValue);
}
if (isset($_POST['param']) &&  decryptpost($conn, $_POST['param']) === 'add_category') {
    $category = decryptpost($conn, $_POST['category']);
    $slug = str_replace(' ', '-', strtolower($category));
    $order_number = decryptpost($conn,$_POST['order_number']);
    $extn = explode('.', $_FILES["image"]["name"]);
    $str = str_replace(' ', '-', strtolower($category));
    $image   = $str . "." . $extn[1];
    $upath = "../../media/category/" . $image;
    move_uploaded_file($_FILES["image"]["tmp_name"], $upath);


    $category_category_id = generateUniqueNumber(10);
    $dataToInsert = array(
        'category' => $category,
        'slug' => $slug,
        'order_number' => $order_number,
        'image' => $image,
    );
    $response = addkro($conn, 'category', $dataToInsert);
}


if (isset($_POST['param']) &&  decryptpost($conn, $_POST['param']) === 'update_category') {
    $category = decryptpost($conn, $_POST['category']);
    $ID = decryptpost($conn, $_POST['ID']);
    $order_number = decryptpost($conn, $_POST['order_number']);
    $slug = str_replace(' ', '-', strtolower($category));
    $columnsToUpdate = array(
        'category' => $category,
        'slug' => $slug,
        'order_number' => $order_number,
    );
    $conditionColumn = 'ID'; // Adjust this to your actual condition column
    $conditionValue = $ID;
    $response = updatekro($conn, 'category', $columnsToUpdate, $conditionColumn, $conditionValue);


    if (isset($_FILES['image']['name']) && $_FILES['image']['name'] != '') {

        $logoExistsInDatabase = checkImageExistsInDatabase($conn, 'category', 'image');
        if ($logoExistsInDatabase) {
            $old_img = getImageNameCondInDatabase($conn, 'category', 'image', 'ID=' . $id . '');
            unlink('../../media/category/' . $old_img); // Remove the old file
        }

        $extn = explode('.', $_FILES["image"]["name"]);
        $str = str_replace(' ', '-', strtolower($category));
        $image   = $str . "." . $extn[1];
        $upath = "../../media/category/" . $image;
        move_uploaded_file($_FILES["image"]["tmp_name"], $upath);
        $columnsToUpdate = array(
            'image' => $image,
        );
        $conditionColumn = 'ID'; // Adjust this to your actual condition column
        $conditionValue = $ID;
        $response = updatekro($conn, 'category', $columnsToUpdate, $conditionColumn, $conditionValue);
    }
}

if (isset($_POST['param']) &&  decryptpost($conn, $_POST['param']) === 'change_category_type') {
    try {
        if (developer()) {
            $categoryType = decryptpost($conn, $_POST['categoryType']);
            $category_category_id = decryptpost($conn, $_POST['category_category_id']);
            $columnsToUpdate = array(
                'category_category_type' => $categoryType,
            );
            $conditionColumn = 'category_category_id'; // Adjust this to your actual condition column
            $conditionValue = $category_category_id;
            $response = updatekro($conn, 'category', $columnsToUpdate, $conditionColumn, $conditionValue);
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
