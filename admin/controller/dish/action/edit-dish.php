<?php
include('../../../controller/common-controller.php');
include('../../../connect/session.php');
$getsetting = getsetting($conn);
$getsetting = json_decode($getsetting, true);
foreach ($getsetting as $getsinglesetting) {
    extract($getsinglesetting);
}
include('../../../controller/constant.inc.php');




$mainresponse = array();
if (isset($_POST['ID'])) {
    $added_on = date("Y-m-d");
    $category_id = safe_value($conn, $_POST['edit_category_id']);
    $ID = safe_value($conn, $_POST['ID']);
    $type = safe_value($conn, $_POST['edit_type']);
    $dish = safe_value($conn, $_POST['edit_dish']);
    $short_description = safe_value($conn, $_POST['edit_short_description']);

    if (isset($_POST['edit_dish_detail'])) {

        $dish_detail = safe_value($conn, $_POST['edit_dish_detail']);
    } else {
        $dish_detail = NULL;
    }



    $meta_title = safe_value($conn, $_POST['edit_meta_title']);
    $slug = safe_value($conn, $_POST['edit_slug']);
    $is_available = safe_value($conn, $_POST['edit_is_available']);
    $is_combo = safe_value($conn, $_POST['edit_is_combo']);
    $is_attribute_product = safe_value($conn, $_POST['edit_is_attribute_product']);
    $meta_description = safe_value($conn, $_POST['edit_meta_description']);
    $meta_keywords = safe_value($conn, $_POST['edit_meta_keywords']);


    $selectedMeals = $_POST['edit_meal'];
    if ($selectedMeals != '') {
        $mealsString = implode(',', $selectedMeals);
    } else {
        $mealsString = '';
    }

    if (isset($_POST['edit_mrp'])) {
        $mrp = safe_value($conn, $_POST['edit_mrp']);
    } else {
        $mrp = NULL;
    }


    if (isset($_POST['edit_selling_price'])) {
        $selling_price = safe_value($conn, $_POST['edit_selling_price']);
    } else {
        $selling_price = NULL;
    }

    if (isset($_POST['edit_main_sku'])) {
        $main_sku = safe_value($conn, $_POST['edit_main_sku']);
    } else {
        $main_sku = NULL;
    }
    $is_detailed_dish = $_POST['edit_is_detailed_dish'];
    $price_tagline = $_POST['edit_price_tagline'];
    // define Variable 
    $image = '';
    if (isset($_FILES['edit_myimg']['name']) && !empty($_FILES['edit_myimg']['name'])) {
        $old_img = null;
        // Check if the image exists in the database and delete the old file
        $logoExistsInDatabase = checkImageExistsInDatabase($conn, 'dish', 'image');
        if ($logoExistsInDatabase) {
            $old_img = getImageNameCondInDatabase($conn, 'dish', 'image', 'ID=' . $ID);
            if($old_img!=''){
                $file_path = '../../../media/dish/' . $old_img;
                if (file_exists($file_path)) {
                    unlink($file_path); // Remove the old file
                } 
            }
        }
        
        $extn = pathinfo($_FILES["edit_myimg"]["name"], PATHINFO_EXTENSION);
        $uniqueName = time() . '_' . uniqid() . '.' . $extn;
        $upath = "../../../media/dish/" . $uniqueName;
        // Move the uploaded file to the new location
        move_uploaded_file($_FILES["edit_myimg"]["tmp_name"], $upath);
        // Update the image in the database
        $columnsToUpdate = ['image' => $uniqueName];
        $conditionColumn = 'ID'; // Adjust this to your actual condition column
        $conditionValue = $ID;
        $response = updatekro($conn, 'dish', $columnsToUpdate, $conditionColumn, $conditionValue);
    }

    $columnsToUpdate = array(
        'category_id' => $category_id,
        'is_detailed_dish' => $is_detailed_dish,
        'price_tagline' => $price_tagline,
        'meal' => $mealsString,
        'type' => $type,
        'dish' => $dish,
        'short_description' => $short_description,
        'dish_detail' => $dish_detail,
        'slug' => $slug,
        'meta_title' => $meta_title,
        'meta_description' => $meta_description,
        'meta_keywords' => $meta_keywords,
        'is_available' => $is_available,
        'is_combo' => $is_combo,
        'mrp' => $mrp,
        'selling_price' => $selling_price,
        'main_sku' => $main_sku,
        'is_attribute_product' => $is_attribute_product,
    );


    $conditionColumn = 'ID'; // Adjust this to your actual condition column
    $conditionValue = $ID;

    $response = updatekro($conn, 'dish', $columnsToUpdate, $conditionColumn, $conditionValue);



    if ($is_attribute_product > 0 &&  isset($_POST['price']) != '' &&  isset($_POST['sku']) != '') {
        //insert edit attribute
        $attributeArr = $_POST['attribute'];
        $priceArr = $_POST['price'];
        $dishDetailsIdArr = $_POST['edit_dish_details_id'];
        $skuArr = $_POST['sku'];

        foreach ($attributeArr as $key => $val) {
            $attribute = $val;
            $price = $priceArr[$key];
            $sku = $skuArr[$key];
            if (isset($dishDetailsIdArr[$key])) {
                $did = $dishDetailsIdArr[$key];
                mysqli_query($conn, "update dish_details set attribute='$attribute', price='$price', sku='$sku' where dish_detail_id='$did'");
            } else {

                mysqli_query($conn, "insert into dish_details(dish_id,attribute,price,status,sku) values('$ID','$attribute','$price','1','$sku')");
            }
        }
        if (isset($_FILES['file']['name']) && $_FILES['file']['name'] != '') {
            $file_names = '';
            $total = count($_FILES['file']['name']);
            for ($i = 0; $i < $total; $i++) {
                $filename = $_FILES['file']['name'][$i];
                $extension = pathinfo($filename, PATHINFO_EXTENSION);
                $valid_extensions = array("png", "jpg", "jpeg");
                if (in_array($extension, $valid_extensions)) {
                    $new_name = rand() . "." . $extension;
                    $path = "../../../media/dish/" . $new_name;
                    move_uploaded_file($_FILES['file']['tmp_name'][$i], $path);
                    // $file_names .= $new_name . " , ";
                    $sql = "insert into  images (dish_id,image) values('$ID','$new_name') ";
                    mysqli_query($conn, $sql);
                }
            }
        }
    }

    $_SESSION["dishadd"] = 'added';
    // echo '<script>window.location.href = "' . SITE_PATH . 'admin/dish.php";</script>';

    $response['status'] = 'success';
    $response['message'] = 'Added Successfully !!';
} else {

    $response['status'] = 'error';
    $response['message'] = 'All Respective Fields Are Required !!';
}


// Sending the JSON response
header('Content-Type: application/json');
echo json_encode($response);
