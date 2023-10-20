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


$categorydata = getcategory($conn);
$categorydata = json_decode($categorydata, true);


$mealOptions = ["breakfast", "lunch", "dinner", "beverages", "noodles", "other"];


if (isset($_POST['param']) &&  decryptpost($conn, $_POST['param']) === 'get_dish_html') {
    $id = decryptpost($conn, $_POST['id']);
    $DISHID = decryptpost($conn, $_POST['id']);

    $selectkro = selectkro($conn, 'dish', ' WHERE ID="' . $id . '"');
    $selectkro = json_decode($selectkro, true);
    foreach ($selectkro as $singleselectkro) {


        extract($singleselectkro);
    }
    $html = ' 
       
        <input type="hidden" value="' . $id . '" name="ID" value="' . $ID . '" />
            <div class="card-body">
                <div class="form-group row mb-3">
                    <label for="edit_is_available" class="col-sm-3 control-label col-form-label">Is Available</label>
                    <div class="col-sm-3 radiocenter">
                        <div class="form-check">
                            <input type="radio" class="form-check-input" name="edit_is_available"  ' . ($is_available == '1' ? 'checked' : '') . '  id="edit_is_available" name="radio-stacked" value="1" >
                            <label class="form-check-label mb-0" for="edit_is_available">Yes</label>
                        </div>
                        <div class="form-check">
                            <input type="radio" class="form-check-input" name="edit_is_available" ' . ($is_available == '0' ? 'checked ' : '') . '  id="edit_is_available" name="radio-stacked" value="0">
                            <label class="form-check-label mb-0" for="edit_is_available">No</label>
                        </div>
                    </div>

                    <label for="edit_is_detailed_dish" class="col-sm-3 control-label col-form-label">Is Detailed Dish</label>
                    <div class="col-sm-3 radiocenter">
                        <div class="form-check">
                            <input type="radio" class="form-check-input" name="edit_is_detailed_dish" ' . ($is_detailed_dish == '1' ? 'checked ' : '') . '  value="1" id="edit_is_detailed_dish" name="radio-stacked"  >
                            <label class="form-check-label mb-0" for="edit_is_detailed_dish">Yes</label>
                        </div>
                        <div class="form-check">
                            <input type="radio" class="form-check-input" name="edit_is_detailed_dish" ' . ($is_detailed_dish == '0' ? 'checked ' : '') . 'value="0"  id="edit_is_detailed_dish" name="radio-stacked">
                            <label class="form-check-label mb-0" for="edit_is_detailed_dish">No</label>
                        </div>
                    </div>


                </div>
                <div class="form-group row mb-3">
                    <label for="edit_is_attribute_product" class="col-sm-3 control-label col-form-label">Is Attribute Product</label>
                    <div class="col-sm-3 radiocenter">
                        <div class="form-check">
                            <input type="radio" class="form-check-input" name="edit_is_attribute_product" ' . ($is_attribute_product == 1 ? 'checked' : '') . ' value="1" id="edit_is_attribute_product" name="radio-stacked" value="1" checked>
                            <label class="form-check-label mb-0" for="edit_is_attribute_product">Yes</label>
                        </div>
                        <div class="form-check">
                            <input type="radio" class="form-check-input" name="edit_is_attribute_product" ' . ($is_attribute_product == '0' ? 'checked' : '') . ' value="0" id="edit_is_attribute_product" name="radio-stacked" value="0">
                            <label class="form-check-label mb-0" for="edit_is_attribute_product">No</label>
                        </div>
                    </div>

                    <label for="edit_type" class="col-sm-3 control-label col-form-label">Type</label>
                    <div class="col-sm-3 radiocenter">
                        <div class="form-check">
                            <input type="radio" class="form-check-input" name="edit_type" ' . ($type == 'veg' ? 'checked' : '') . ' value="veg" id="edit_type" value="veg" checked>
                            <label class="form-check-label mb-0" for="edit_type">Veg</label>
                        </div>
                        <div class="form-check">
                            <input type="radio" class="form-check-input" name="edit_type" ' . ($type == 'non-veg' ? 'checked' : '') . ' value="non-veg" id="edit_type" value="non-veg">
                            <label class="form-check-label mb-0" for="edit_type">Non-Veg</label>
                        </div>
                    </div>
                </div>
                <div class="form-group row mb-3 "  id="editmainpricediv" style="' . ($is_attribute_product == '1' ? 'display:none' : '') . ' background: #f7f7f7;padding: 20px;border: 1px solid #d9d9d9;">
                    <label for="edit_is_available" class="col-sm-3 control-label col-form-label">Price</label>
                    <div class="col-sm-9">
                        <div class="row">
                            <div class="col-sm-3">
                                <input type="number" class="form-control" name="edit_mrp" value="' . $mrp . '" id="edit_mrp">
                                <label class="form-check-label" style="margin:10px 0;font-weight:bold" for="edit_mrp">MRP <span class="text-danger">*</span> </label>
                            </div>
                            <div class="col-sm-3">
                                <input type="number" class="form-control" name="edit_selling_price" value="' . $selling_price . '" id="edit_selling_price">
                                <label class="form-check-label" style="margin:10px 0;font-weight:bold" for="edit_selling_price">Selling Price</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label for="edit_main_sku" class="col-sm-3 control-label col-form-label">SKU <span class="text-danger">*</span></label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="edit_main_sku" value="' . $main_sku . '" id="edit_main_sku">
                        </div>
                    </div>
                </div>
                <div class="form-group row mb-3">
                    <label for="edit_slug" class="col-sm-3 control-label col-form-label">Slug <span class="text-danger">*</span></label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="edit_slug" value="' . $slug . '" id="edit_slug">
                    </div>
                </div>
                <div class="form-group row mb-3">
                    <label for="edit_price_tagline" class="col-sm-3 control-label col-form-label">Price Tagline</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="edit_price_tagline" value="' . $price_tagline . '" id="edit_price_tagline">
                    </div>
                </div>
                <div class="form-group row mb-3 ">
                    <label for="edit_meal" class="col-sm-3 control-label col-form-label">Meal</label>
                    <div class="col-sm-6 radiocenter">';
    foreach ($mealOptions as $mealOption) {
        $html .= '<div class="form-check">
                                <input type="checkbox" class="form-check-input" name="edit_meal[]" id="' . $mealOption . '" value="' . $mealOption . '" ';
        $html .= (strpos($meal, $mealOption) !== false) ? 'checked' : '';
        $html .= '>
                                <label class="form-check-label mb-0" for="' . $mealOption . '">' . ucfirst($mealOption) . '</label>
                            </div>';
    }

    $html .= '</div>
                </div>
               <div class="form-group row mb-3">
                <label for="category" class="col-sm-3 control-label col-form-label">Category <span class="text-danger">*</span></label>
                <div class="col-sm-3">
                    <select name="edit_category_id" id="edit_category_id" class="form-control select2">
                        <option value="0" disabled>Select Category</option>';

    foreach ($categorydata as $getcategorydata) {
        $ID = $getcategorydata['ID'];
        $category = $getcategorydata['category'];
        $selected = ($category_id == $ID) ? 'selected' : '';

        $html .= '<option value="' . $ID . '" ' . $selected . '>' . $category . '</option>';
    }

    $html .= '</select>
                </div>
            </div>
        
                <div class="form-group row mb-3 dishnameeditclass" style="background: #fff8d8; padding: 5px;">
                    <label for="edit_dish" class="col-sm-3 control-label col-form-label">Dish Name <span class="text-danger">*</span></label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="edit_dish" value="' . $dish . '" id="edit_dish">
                    </div>
                </div>

                <div class="form-group row mb-3">
                    <label for="image" class="col-sm-3 control-label col-form-label">Dish Image <span class="text-danger">*</span></label>
                    <div class="col-sm-9  col-11 d-flex align-items-center gap-4">

                        <img src="' . SITE_PATH . 'admin/media/dish/' . $image . ' ?>" width="80px" alt="" onclick="edit_dish("' . $image . '")">
                            <input type="file" class="form-control" name="edit_myimg" id="edit_myimg">
                            <input type="hidden" name="oldImg" id="oldImg" value="' . $image . '">

                    </div>
                </div>
                <div class="form-group row mb-3 " ' . ($is_detailed_dish == '0' ? 'style="display:none"' : '') . ' id="editdropzonediv" >
                    <label for="image" class="col-sm-3 control-label col-form-label">Image</label>
                    <div class="col-sm-9 div-center col-11">
                        <div class="dropzone mt-3" id="editmyDropzone"></div>
                    </div>


                    <div class="form-group row">
                    <label for="image" class="col-sm-3 control-label col-form-label">Image Gallery</label>
                    <div class="col-sm-9 div-center col-11">
                        <div id="js-lightgallery">';


    $res2 = mysqli_query($conn, "select * from images where dish_id='" . $DISHID . "'");

    if ($res2) {
        $index = 1;
        while ($excimage = mysqli_fetch_assoc($res2)) {
            $marginTopClass = ($index !== 0) ? 'mt-2' : '';

            $html .= '<div class="mb-3 d-flex flex-wrap gap-4 ' . $marginTopClass . '">';

            $html .= '<div class="hidethis_' . $index . '" style="z-index: 999; position: relative; color: #FF6262; width: 150px; height: 80px; overflow: hidden;">';
            $html .= '<div class="delphotof" onclick="delete_image(' . $excimage['image_id'] . ', ' . $index . ')">'; // Pass the 'this' element to the function
            $html .= '<i class="fa fa-trash galleryimagedel"></i>';
            $html .= '</div>';
            $html .= '<a href="' . SITE_PATH . 'admin/media/dish/' . $excimage['image'] . '" target="_blank">';
            $html .= '<img class="img-fluid img-rounded round img-thumbnail" src="' . SITE_PATH . 'admin/media/dish/' . $excimage['image'] . '" alt="">';
            $html .= '</a>';
            $html .= '</div>';

            $html .= '</div';

            $index++;
        }
    }
    $html .= '</div>
                        </div>
                    </div>
                </div>
                <div class="form-group row mb-3 " id="editdish_box1" style="position:relative;background: #fff8d8; padding: 5px; ' . ($is_attribute_product == '0' ? 'display:none' : '') . '">';
    $j = 1;
    $dish_details_sql = mysqli_query($conn, "select * from dish_details where dish_id='$DISHID' ORDER BY dish_detail_id ASC");
    while ($dish_detail_row = mysqli_fetch_assoc($dish_details_sql)) {
        $ch = ' <div class="form-check form-switch">
        <input class="form-check-input" type="checkbox" role="switch" data-id="' . $dish_detail_row['dish_detail_id'] . '" name="attr_status"';
        $ch .= ($dish_detail_row['status'] == '1') ? ' checked>' : '>';
        $ch .= '</div>';
        $html .= '
        <div class="form-group row" id="dish_box' . $j . '">

                        <label for="Attributes" class="col-sm-3 mb-2 control-label col-form-label remove_' . $dish_detail_row['dish_detail_id'] . '">Attributes ' . $j . ' </label>
                        <input type="hidden" name="edit_dish_details_id[]" class="edit_dish_details_id" value="' . $dish_detail_row['dish_detail_id'] . '">
                        <div class="col-md-2 remove_' . $dish_detail_row['dish_detail_id'] . '">
                            <input type="text" class="form-control attribute" required name="attribute[]" placeholder="Attribute" value="' . $dish_detail_row['attribute'] . '">
                        </div>
                        <div class="col-md-2 remove_' . $dish_detail_row['dish_detail_id'] . '">
                            <input required type="number" class="form-control price" name="price[]" placeholder="price" value="' . $dish_detail_row['price'] . '">
                        </div>
                        <div class="col-md-2 remove_' . $dish_detail_row['dish_detail_id'] . '">
                            <input required type="text" class="form-control sku" name="sku[]" placeholder="sku" value="' . $dish_detail_row['sku'] . '">
                        </div>
                        <div  style="display:flex"  class="col-3 gap-5 align-items-center  remove_' . $dish_detail_row['dish_detail_id'] . '">
                        <div   style="display:flex"  class=" justify-content-center gap-4 align-items-center remove_' . $dish_detail_row['dish_detail_id'] . '">
                            ';

        $html .=  $ch;

        if ($j != 1) {
            $html .= '
                        <div style="display:flex" class="   justify-content-center gap-4 align-items-center  remove_' . $dish_detail_row['dish_detail_id'] . '">
                            <div class="adddivpositionwarn"><i title="Add More" class="fa fa-trash bg-danger bg-hover-warning" style="cursor: pointer;" onclick="remove_old_attr(\'' . $dish_detail_row['dish_detail_id'] . '\')"></i></div>

                        </div>';
        }
        $html .= '</div></div>';

        $html .= '</div>';
        $j++;
    }
    $html .= '<div class="col-sm-10">
                    <button type="button" class="shadow-none" name="edit_add_more" style="    float: right;
                    position: absolute;
                    bottom: 5px;
                    right: 15px;
                    width: 40px;
                    height: 40px;
                    display: flex;
                    align-items: center;
                    margin: 0 auto;
                    justify-content: center;
                    background: #7fc6ff;
                    border:1px solid #7fc6ff;
                    color: white;" onclick="newedit_add_more()" ><i title="Add More" class="fa fa-plus" style="cursor: pointer;" ></i></button>
                </div>

                </div>
                <div class="form-group row mb-3">
                    <label for="edit_short_description" class="col-sm-3 control-label col-form-label">Short Description <span class="text-danger">*</span></label>
                    <div class="col-sm-9">
                        <textarea class="form-control" name="edit_short_description" value="' . $short_description . '" id="edit_short_description">' . $short_description . '</textarea>
                    </div>
                </div>
                <div class="form-group row mb-3" id="editdishDetailID"  ' . ($is_detailed_dish == '0' ? 'style="display:none"' : '') . ' >
                    <label for="edit_dish_detail" class="col-sm-3 control-label col-form-label">Dish Detail <span class="text-danger">*</span></label>
                    <div class="col-sm-9">
                        <textarea class="form-control" name="edit_dish_detail" value="' . $dish_detail . '" id="edit_dish_detail">' . $dish_detail . '</textarea>
                    </div>
                </div>
                <div class="form-group row mb-3">
                    <label for="edit_meta_title" class="col-sm-3 control-label col-form-label">Meta Title <span class="text-danger">*</span></label>
                    <div class="col-sm-9">

                        <input type="text" class="form-control" name="edit_meta_title" value="' . $meta_title . '" id="edit_meta_title">
                    </div>
                </div>
                <div class="form-group row mb-3">
                    <label for="edit_meta_description" class="col-sm-3 control-label col-form-label">Meta Description <span class="text-danger">*</span></label>
                    <div class="col-sm-9">
                        <textarea class="form-control " name="edit_meta_description" value="' . $meta_description . '" id="edit_meta_description">' . $meta_description . '</textarea>
                    </div>
                </div>
                <div class="form-group row mb-3">
                    <label for="edit_meta_keywords" class="col-sm-3 control-label col-form-label">Meta Keywords <span class="text-danger">*</span></label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="edit_meta_keywords" value="' . $meta_keywords . '" id="edit_meta_keywords">
                    </div>
                </div>
            </div>

        </div>
    </div>
        </div>
        </div>
       
        ';
    $response['status'] = 'success';
    $response['message'] = $html;
}


if (isset($_POST['param']) && decryptpost($conn, $_POST['param']) === 'delete_data') {
    $id = $_POST['id'];
    // Delete dish images
    deleteImages($conn, $id);
    // Delete dish and its details
    $deletekro = deletekro($conn, 'dish', 'WHERE ID="' . $id . '"');
    if ($deletekro) {
        $deletekroDetails = deletekro($conn, 'dish_details', 'WHERE dish_id="' . $id . '"');
        $deletekroDetails = deletekro($conn, 'images', 'WHERE dish_id="' . $id . '"');
        $response['status'] = 'success';
        $response['message'] = 'SUCCESS !!';
    } else {
        $response['status'] = 'error';
        $response['message'] = 'FAILED TO DELETE !!';
    }
}

if (isset($_POST['param']) && decryptpost($conn, $_POST['param']) === 'delete_attribute') {
    $id = $_POST['id'];
    // Delete dish and its details
    $deletekro = deletekro($conn, 'dish_details', 'WHERE dish_detail_id="' . $id . '"');
    if ($deletekro) {
        $response['status'] = 'success';
        $response['message'] = 'SUCCESS !!';
    } else {
        $response['status'] = 'error';
        $response['message'] = 'FAILED TO DELETE !!';
    }
}


function deleteImages($conn, $dishId)
{
    $imageDir = '../../media/dish/';

    $oldImage = getImageNameCondInDatabase($conn, 'dish', 'image', 'ID=' . $dishId);
    if ($oldImage != '') {
        $oldImagePath = $imageDir . $oldImage;
        if (file_exists($oldImagePath)) {
            unlink($oldImagePath); // Remove the old file
        }
    }

    $query = "SELECT image FROM images WHERE dish_id='$dishId'";
    $result = mysqli_query($conn, $query);
    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $galleryImage = $row['image'];
            $imagePath = $imageDir . $galleryImage;
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }
    }
}




if (isset($_POST['param']) && decryptpost($conn, $_POST['param']) === 'delete_gallery_image') {
    $id = $_POST['id'];
    // Delete dish images
    $deletekro = deleteImagesBYImageID($conn, $id);
    $deletekroDetails = deletekro($conn, 'images', 'WHERE image_id="' . $id . '"');
    $response['status'] = 'success';
    $response['message'] = 'SUCCESS !!';
}


function deleteImagesBYImageID($conn, $imageID)
{
    $imageDir = '../../media/dish/';
    $query = "SELECT * FROM images WHERE image_id='$imageID'";
    $result = mysqli_query($conn, $query);
    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $galleryImage = $row['image'];
            $imagePath = $imageDir . $galleryImage;
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }
    }
}



if (isset($_POST['param']) &&  decryptpost($conn, $_POST['param']) === 'dish_active') {
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

    $response = updatekro($conn, 'dish', $columnsToUpdate, $conditionColumn, $conditionValue);
}


if (isset($_POST['param']) &&  decryptpost($conn, $_POST['param']) === 'dish_is_pop_active') {
    $status =  $_POST['isChecked'];
    $id = decryptpost($conn, $_POST['id']);

    if ($status == 'true') {
        $statusValue = '0';
    }
    if ($status == 'false') {
        $statusValue = '1';
    }
 
    $columnsToUpdate = array(
        'is_popular' => $statusValue,
    );
    $conditionColumn = 'ID'; // Adjust this to your actual condition column
    $conditionValue = $id;

    $response = updatekro($conn, 'dish', $columnsToUpdate, $conditionColumn, $conditionValue);
}

if (isset($_POST['param']) &&  decryptpost($conn, $_POST['param']) === 'dish_is_available_active') {
    $status =  $_POST['isChecked'];
    $id = decryptpost($conn, $_POST['id']);

    if ($status == 'true') {
        $statusValue = '0';
    }
    if ($status == 'false') {
        $statusValue = '1';
    }
 
    $columnsToUpdate = array(
        'is_available' => $statusValue,
    );
    $conditionColumn = 'ID'; // Adjust this to your actual condition column
    $conditionValue = $id;

    $response = updatekro($conn, 'dish', $columnsToUpdate, $conditionColumn, $conditionValue);
}


if (isset($_POST['param']) &&  decryptpost($conn, $_POST['param']) === 'change_dish_type') {
    try {
        $dishType = decryptpost($conn, $_POST['dishType']);
        $dish_dish_id = decryptpost($conn, $_POST['dish_dish_id']);
        $columnsToUpdate = array(
            'dish_dish_type' => $dishType,
        );
        $conditionColumn = 'dish_dish_id'; // Adjust this to your actual condition column
        $conditionValue = $dish_dish_id;
        $response = updatekro($conn, 'dish', $columnsToUpdate, $conditionColumn, $conditionValue);
    } catch (\Throwable $th) {
        $response['status'] = 'error';
        $response['message'] = 'FAILED TO UPDATE !!';
    }
}

if (isset($_POST['param']) &&  decryptpost($conn, $_POST['param']) === 'change_attr_status_data') {
    try {
        $attr_status = mysqli_real_escape_string($conn, $_POST['qq']);
        $uniq_id = mysqli_real_escape_string($conn, $_POST['uniq_id']);
        $columnsToUpdate = array(
            'status' => $attr_status,
        );
        $conditionColumn = 'dish_detail_id'; // Adjust this to your actual condition column
        $conditionValue = $uniq_id;
        $response = updatekro($conn, 'dish_details', $columnsToUpdate, $conditionColumn, $conditionValue);
    } catch (\Throwable $th) {
        $response['status'] = 'error';
        $response['message'] = 'FAILED TO UPDATE !!';
    }
}


// Sending the JSON response
header('Content-Type: application/json');
echo json_encode($response);
