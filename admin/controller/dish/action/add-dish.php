<?php
include('../../../controller/common-controller.php');
include('../../../connect/session.php');
$getsetting = getsetting($conn);
$getsetting = json_decode($getsetting, true);
foreach ($getsetting as $getsinglesetting) {
    extract($getsinglesetting);
}
include('../../../controller/constant.inc.php');



$mainmainresponse = array();



if (isset($_POST['dish'])) {
    $added_on = date("Y-m-d");
    $category_id = safe_value($conn, $_POST['category_id']);
    $type = safe_value($conn, $_POST['type']);
    $dish = safe_value($conn, $_POST['dish']);
    $short_description = safe_value($conn, $_POST['short_description']);
    $dish_detail = safe_value($conn, $_POST['dish_detail']);
    $meta_title = safe_value($conn, $_POST['meta_title']);
    $slug = safe_value($conn, $_POST['slug']);
    $is_available = safe_value($conn, $_POST['is_available']);
    $is_combo = safe_value($conn, $_POST['is_combo']);
    $is_attribute_product = safe_value($conn, $_POST['is_attribute_product']);
    $meta_description = safe_value($conn, $_POST['meta_description']);
    $meta_keywords = safe_value($conn, $_POST['meta_keywords']);


    $selectedMeals = $_POST['meal'];
    if ($selectedMeals != '') {
        $mealsString = implode(',', $selectedMeals);
    } else {
        $mealsString = '';
    }

    if (isset($_POST['mrp'])) {
        $mrp = safe_value($conn, $_POST['mrp']);
    } else {
        $mrp = NULL;
    }


    if (isset($_POST['selling_price'])) {
        $selling_price = safe_value($conn, $_POST['selling_price']);
    } else {
        $selling_price = NULL;
    }

    if (isset($_POST['main_sku'])) {
        $main_sku = safe_value($conn, $_POST['main_sku']);
    } else {
        $main_sku = NULL;
    }
    $is_detailed_dish = $_POST['is_detailed_dish'];
    $price_tagline = $_POST['price_tagline'];
    // define Variable 
    $image = '';
    if (isset($_FILES['myimg']['name']) && is_string($_FILES['myimg']['name']) && $_FILES['myimg']['name'] != '') {
        $extn = explode('.', $_FILES["myimg"]["name"]);
        $rand = date('Y') . '-' . rand(1111, 9999);
        $str = str_replace(' ', '-', strtolower($dish));
        $image = $str . $rand . "." . $extn[1];
        $path = "../../../media/dish/" . $image;
        move_uploaded_file($_FILES["myimg"]["tmp_name"], $path);
    }

    $dataToInsert = array(
        'category_id' => $category_id,
        'is_detailed_dish' => $is_detailed_dish,
        'price_tagline' => $price_tagline,
        'meal' => $mealsString,
        'type' => $type,
        'dish' => $dish,
        'short_description' => $short_description,
        'dish_detail' => $dish_detail,
        'slug' => $slug,
        'image' => $image,
        'meta_title' => $meta_title,
        'meta_description' => $meta_description,
        'meta_keywords' => $meta_keywords,
        'status' => '1',
        'is_available' => $is_available,
        'is_combo' => $is_combo,
        'mrp' => $mrp,
        'selling_price' => $selling_price,
        'main_sku' => $main_sku,
        'is_attribute_product' => $is_attribute_product,
        'added_on' => $added_on,
    );

    $mainresponse = multipleaddkro($conn, 'dish', $dataToInsert);
    if ($mainresponse['lastInsertId'] != '') {
        $mydish_id = $mainresponse['lastInsertId'];
    } else {
        $mainresponse['status'] = 'error';
        $mainresponse['message'] = 'Something Went Wrong !!';
    }


    if ($is_attribute_product > 0) {
        //insert attribute
        $attributeArr = $_POST['attribute'];
        $priceArr = $_POST['price'];
        $skuArr = $_POST['sku']; // Assuming you have an array of SKUs

        foreach ($attributeArr as $key => $val) {
            $attribute = $val;
            $price = $priceArr[$key];
            $sku = $skuArr[$key]; // Get the corresponding SKU for this variant
            mysqli_query($conn, "INSERT INTO dish_details(dish_id, attribute, price, status, sku) VALUES ('$mydish_id', '$attribute', '$price', '1', '$sku')");
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
                    $sql = "insert into  images (dish_id,image) values('$mydish_id','$new_name') ";
                    mysqli_query($conn, $sql);
                }
            }
        }
    }

    $_SESSION["dishadd"] = 'added';
    // echo '<script>window.location.href = "' . SITE_PATH . 'admin/dish.php";</script>';

    $mainresponse['status'] = 'success';
    $mainresponse['message'] = 'Added Successfully !!';
} else {

    $mainresponse['status'] = 'error';
    $mainresponse['message'] = 'All Respective Fields Are Required !!';
}
// Sending the JSON mainresponse
header('Content-Type: application/json');
echo json_encode($mainresponse);
