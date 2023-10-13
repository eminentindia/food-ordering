<?php
session_start();
## Database configuration
include('../../controller/common-controller.php');
$conn = _connectodb();
setTimeZone();
echo '<pre>';
print_r($_POST);
print_r($_FILES);
// die();

if (isset($_POST['dish']) && isset($_POST['category_id'])) {
    $added_on = date("Y-m-d");
    $category_id = safe_value($conn, $_POST['category_id']);
    $type = safe_value($conn, $_POST['type']);
    $dish = safe_value($conn, $_POST['dish']);
    $short_description = safe_value($conn, $_POST['short_description']);
    if (isset($_POST['dish_detail'])) {

        $dish_detail = safe_value($conn, $_POST['dish_detail']);
    } else {
        $dish_detail = NULL;
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

    $meta_title = safe_value($conn, $_POST['meta_title']);
    $slug = safe_value($conn, $_POST['slug']);
    $is_available = safe_value($conn, $_POST['is_available']);
    $meta_description = safe_value($conn, $_POST['meta_description']);
    $meta_keywords = safe_value($conn, $_POST['meta_keywords']);
    $selectedMeals = $_POST['meal'];
    $is_detailed_dish = $_POST['is_detailed_dish'];
    $price_tagline = $_POST['price_tagline'];
    $is_attribute_product = $_POST['is_attribute_product'];

    if ($selectedMeals != '') {
        $mealsString = implode(',', $selectedMeals);
    } else {
        $mealsString = '';
    }
    $ID = $_POST['ID'];

    if (isset($_FILES['myimg']['name']) && $_FILES['myimg']['name'] != '' && $_POST['oldImg'] != '') {
        $oldImg = safe_value($conn, $_POST['oldImg']);
        $extn = explode('.', $_FILES["myimg"]["name"]);
        $rand = rand(1111, 9999);
        $str = str_replace(' ', '-', strtolower($dish));
        $image   = $str . $rand . "." . $extn[1];
        $UnlinkPath = "../../media/dish/" . $oldImg;
        unlink($UnlinkPath);
        $upath = "../../media/dish/" . $image;
        move_uploaded_file($_FILES["myimg"]["tmp_name"], $upath);
        $update_story = "UPDATE dish SET image='$image' WHERE ID ='$ID' ";
        $result_story     = mysqli_query($conn, $update_story);
    }


    $update_action = "UPDATE dish SET category_id='$category_id',is_detailed_dish='$is_detailed_dish',type='$type',dish='$dish',short_description='$short_description',dish_detail='$dish_detail',meta_title='$meta_title',meal='$mealsString',slug='$slug',meta_description='$meta_description',meta_keywords='$meta_keywords',is_available='$is_available',price_tagline='$price_tagline',mrp='$mrp',selling_price='$selling_price',main_sku='$main_sku' WHERE ID ='$ID' ";
    $result = mysqli_query($conn, $update_action);

    if ($is_attribute_product == '1') {
        //insert edit attribute
        $attributeArr = $_POST['attribute'];
        $priceArr = $_POST['price'];
        $dishDetailsIdArr = $_POST['dish_details_id'];
        $skuArr = $_POST['sku'];

        foreach ($attributeArr as $key => $val) {
            $attribute = $val;
            $price = $priceArr[$key];
            $sku = $skuArr[$key];
            if (isset($dishDetailsIdArr[$key])) {
                $did = $dishDetailsIdArr[$key];
                mysqli_query($conn, "update dish_details set attribute='$attribute', price='$price', sku='$sku' where ID='$did'");
            } else {

                mysqli_query($conn, "insert into dish_details(dish_id,attribute,price,status,sku) values('$ID','$attribute','$price',1,'$sku')");
            }
        }
    }
    if ($is_detailed_dish == 1) {

        if (isset($_FILES['file']['name']) != '') {

            $file_names = '';
            $total = count($_FILES['file']['name']);

            for ($i = 0; $i < $total; $i++) {
                $filename = $_FILES['file']['name'][$i];
                $extension = pathinfo($filename, PATHINFO_EXTENSION);

                $valid_extensions = array("png", "jpg", "jpeg");

                if (in_array($extension, $valid_extensions)) {
                    $new_name = rand() . "." . $extension;
                    $path = "../../media/dish/" . $new_name;

                    move_uploaded_file($_FILES['file']['tmp_name'][$i], $path);
                    // $file_names .= $new_name . " , ";
                    $sql = "insert into  images (dish_id,image) values('$ID','$new_name') ";
                    echo $sql;
                    if (mysqli_query($conn, $sql)) {
                    } else {
                    }
                } else {
                }
            }
        }
    }



    $_SESSION["dishupdate"] = 'update';
    echo "Success !!";
} else {
    echo "All Respective Fields Are Required !!";
}
