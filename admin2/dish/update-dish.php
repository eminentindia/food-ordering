<?php require("../includes/top.php"); ?>
<?php
include('../controller/common-controller.php');
include('../category/controller/category-controller.php');
include('controller/dish-controller.php');

$conn = _connectodb();
$ID = $_GET['dish_id'];

$getdish = getsingledish($conn, $ID);
$getdish = json_decode($getdish, true);

$categorydata = getcategory($conn);
$categorydata = json_decode($categorydata, true);
foreach ($getdish as $key => $getsingledish) {
    extract($getsingledish);
}


include('../setting/controller/setting-controller.php');
$getsetting = getsetting($conn);
$getsetting = json_decode($getsetting, true);
foreach ($getsetting as $getsinglesetting) {
    extract($getsinglesetting);
    // print_r($getsetting);
}
include('../controller/constant.inc.php');
include('../../function.inc.php');
?>
<script src="https://cdn.ckeditor.com/ckeditor5/31.1.0/classic/ckeditor.js"></script>
<link rel="stylesheet" href="<?= ADMIN_SITE_PATH ?>css/multiple-input.css">
<style>
    .delphotof {
        background: white !important;
        position: absolute;
        z-index: 9999999;
        width: 30px;
        height: 30px;
        text-align: center;
        align-items: center;
        display: flex;
        justify-content: center;
        border-radius: 50%;
    }
</style>
<?php include('../includes/header.php'); ?>
<?php include('../includes/sidebar.php'); ?>
<div class="page-wrapper">
    <link rel="stylesheet" href="../css/dropzone.css">
    <link rel="stylesheet" href="../css/lightgallery.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/1.6.0/css/lightgallery.min.css">
    <!-- Bread crumb and right sidebar toggle -->

    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Update dish</h4>
                <div class="ms-auto text-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo ADMIN_SITE_PATH; ?>admin-dashboard.php"><i class="mdi mdi-home"></i></a></li>
                            <li class="breadcrumb-item active" aria-current="page"><a href="<?php echo ADMIN_SITE_PATH; ?>dish/view-dish.php">View dishs</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Update dish</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- End Bread crumb and right sidebar toggle -->
    <div class="container-fluid">
        <!-- -------------Content Here------------- -->
        <div class="card">
            <form class="form-horizontal" action="action/update-dish.php" id="UpdateDishForm" method="POST" enctype="multipart/form-data" onsubmit="return Updatedish()">

                <div class="card-body">
                    <div class="form-group row">
                        <label for="fname" class="col-sm-3 control-label col-form-label">Is Available</label>
                        <div class="col-sm-3">

                            <?php
                            if ($is_available == '1') {
                            ?>
                                <div class="form-check">
                                    <input type="radio" class="form-check-input" name="is_available" name="radio-stacked" required="" value="1" checked>
                                    <label class="form-check-label mb-0">Yes</label>
                                </div>
                                <div class="form-check">
                                    <input type="radio" class="form-check-input" name="is_available" name="radio-stacked" required="">
                                    <label class="form-check-label mb-0" value="0">No</label>
                                </div>
                            <?php       } else {
                            ?>
                                <div class="form-check">
                                    <input type="radio" class="form-check-input" name="is_available" name="radio-stacked" required="" value="1">
                                    <label class="form-check-label mb-0">Yes</label>
                                </div>
                                <div class="form-check">
                                    <input type="radio" class="form-check-input" name="is_available" name="radio-stacked" required="" value="0" checked>
                                    <label class="form-check-label mb-0">No</label>
                                </div>
                            <?php   }

                            ?>
                        </div>

                        <label for="fname" class="col-sm-3 control-label col-form-label">Is Detailed Dish</label>
                        <div class="col-sm-3">
                            <?php
                            if ($is_detailed_dish == '1') {
                            ?>
                                <div class="form-check">
                                    <input type="radio" class="form-check-input" name="is_detailed_dish" name="radio-stacked" required="" value="1" checked>
                                    <label class="form-check-label mb-0">Yes</label>
                                </div>
                                <div class="form-check">
                                    <input type="radio" class="form-check-input" name="is_detailed_dish" name="radio-stacked" required="">
                                    <label class="form-check-label mb-0" value="0">No</label>
                                </div>
                            <?php       } else {
                            ?>
                                <div class="form-check">
                                    <input type="radio" class="form-check-input" name="is_detailed_dish" name="radio-stacked" required="" value="1">
                                    <label class="form-check-label mb-0">Yes</label>
                                </div>
                                <div class="form-check">
                                    <input type="radio" class="form-check-input" name="is_detailed_dish" name="radio-stacked" required="" value="0" checked>
                                    <label class="form-check-label mb-0">No</label>
                                </div>
                            <?php   }

                            ?>


                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="is_attribute_product" class="col-sm-3 control-label col-form-label">Is Attribute Product</label>
                        <div class="col-sm-3">

                            <?php
                            if ($is_attribute_product == '1') {
                            ?>
                                <div class="form-check">
                                    <input type="radio" class="form-check-input" name="is_attribute_product" id="is_attribute_product" name="radio-stacked" value="1" checked>
                                    <label class="form-check-label mb-0" for="is_attribute_product">Yes</label>
                                </div>
                                <div class="form-check">
                                    <input type="radio" class="form-check-input" name="is_attribute_product" id="is_attribute_product" name="radio-stacked" value="0" checked>
                                    <label class="form-check-label mb-0" for="is_attribute_product">No</label>
                                </div>
                            <?php } ?>
                            <?php
                            if ($is_attribute_product == '0') {
                            ?>
                                <div class="form-check">
                                    <input type="radio" class="form-check-input" name="is_attribute_product" id="is_attribute_product" name="radio-stacked" value="1">
                                    <label class="form-check-label mb-0" for="is_attribute_product">Yes</label>
                                </div>
                                <div class="form-check">
                                    <input type="radio" class="form-check-input" name="is_attribute_product" id="is_attribute_product" name="radio-stacked" value="0" checked>
                                    <label class="form-check-label mb-0" for="is_attribute_product">No</label>
                                </div>
                            <?php } ?>


                        </div>
                        <label for="fname" class="col-sm-3 control-label col-form-label">Type</label>
                        <div class="col-sm-3">

                            <?php
                            if ($type == 'veg') {
                            ?>
                                <div class="form-check">
                                    <input type="radio" class="form-check-input" name="type" required="" value="veg" id="type" checked>

                                    <label class="form-check-label mb-0">Veg</label>
                                </div>
                                <div class="form-check">
                                    <input type="radio" class="form-check-input" name="type" id="type" required="" value="non-veg">

                                    <label class="form-check-label mb-0" value="non-veg">Non-Veg</label>
                                </div>
                            <?php       } else {
                            ?>
                                <div class="form-check">
                                    <input type="radio" class="form-check-input" name="type" required="" value="veg" id="type">

                                    <label class="form-check-label mb-0">Veg</label>
                                </div>
                                <div class="form-check">
                                    <input type="radio" class="form-check-input" name="type" required="" value="non-veg" id="type" checked>

                                    <label class="form-check-label mb-0">Non-veg</label>
                                </div>
                            <?php   }

                            ?>
                        </div>
                    </div>
                    <?php
                    if ($is_attribute_product == '0') {
                    ?>
                        <div class="form-group row" id="mainpricediv" style="background: #f7f7f7;padding: 20px;border: 1px solid #d9d9d9;">
                            <label for="is_available" class="col-sm-3 control-label col-form-label">Price</label>
                            <div class="col-sm-9">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <input type="number" class="form-control" name="mrp" id="mrp" value="<?php echo $getsingledish['mrp']; ?>">
                                        <label class="form-check-label mb-0" for="mrp">MRP <span class="text-danger">*</span> </label>
                                    </div>
                                    <div class="col-sm-3">
                                        <input type="number" class="form-control" name="selling_price" id="selling_price" value="<?php echo $getsingledish['selling_price']; ?>">
                                        <label class="form-check-label mb-0" for="selling_price">Selling Price</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="main_sku" class="col-sm-3 control-label col-form-label">SKU <span class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="main_sku" id="main_sku" value="<?php echo $getsingledish['main_sku']; ?>">
                                </div>
                            </div>
                        </div>

                    <?php } ?>


                    <div class="form-group row">
                        <label for="slug" class="col-sm-3 control-label col-form-label">Slug</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="slug" id="slug" value="<?php echo $getsingledish['slug']; ?>">
                        </div>

                    </div>
                    <div class="form-group row">
                        <label for="price_tagline" class="col-sm-3 control-label col-form-label">Price Tagline</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="price_tagline" id="price_tagline" value="<?php echo $getsingledish['price_tagline']; ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="is_available" class="col-sm-3 control-label col-form-label">Meal</label>
                        <?php
                        // echo $meal;
                        $meal = isset($getsingledish['meal']) ? explode(',', $getsingledish['meal']) : [];
                        $meals = ['breakfast', 'lunch', 'dinner', 'beverages', 'noodles', 'other'];
                        function isChecked($value, $meal)
                        {
                            return in_array($value, $meal);
                        }
                        ?>
                        <div class="col-sm-6">
                            <?php foreach ($meals as $mealType) : ?>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" name="meal[]" id="<?php echo $mealType; ?>" value="<?php echo $mealType; ?>" <?php if (isChecked($mealType, $meal)) echo 'checked'; ?>>
                                    <label class="form-check-label mb-0" for="<?php echo $mealType; ?>"><?php echo ucfirst($mealType); ?></label>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="fname" class="col-sm-3 control-label col-form-label">Category</label>
                        <div class="col-sm-9">
                            <select name="category_id" id="category_id" class="form-control select2">
                                <?php
                                foreach ($categorydata as $key => $getcategorydata) {
                                    extract($getcategorydata);
                                ?> <option <?php if ($getsingledish['category_id'] == "$ID") {
                                                echo "selected";
                                            } ?> value="<?php echo $ID ?>"> <?php echo $category ?></option>

                                <?php }  ?>

                            </select>
                        </div>
                    </div>
                    <div class="form-group row" style="background: #fff8d8;  padding: 5px;">
                        <input type="hidden" name="ID" id="ID" value="<?php echo $getsingledish['ID']; ?>">
                        <label for="dish" class="col-sm-3 control-label col-form-label">Dish Name</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="dish" id="dish" value="<?php echo $dish; ?>">
                        </div>
                    </div>



                    <div class="form-group row">
                        <label for="fname" class="col-sm-3 control-label col-form-label">Dish Image</label>
                        <div class="col-sm-9">
                            <img src="../media/dish/<?php echo $getsingledish['image']; ?>" width="80px" alt="" onclick="dish('<?php echo $image; ?>')">
                            <input type="file" class="form-control" name="myimg" id="myimg">
                            <input type="hidden" name="oldImg" id="oldImg" value="<?php echo $getsingledish['image']; ?>">
                        </div>
                    </div>

                    <?php
                    if ($is_detailed_dish == '1') {
                    ?>
                        <div class="form-group row">
                            <label for="image" class="col-sm-3 control-label col-form-label">Images</label>
                            <div class="col-sm-9 div-center col-11">
                                <div class="dropzone mt-3" id="myDropzone"></div>
                            </div>
                        </div>
                    <?php } ?>


                    <?php
                    if ($is_detailed_dish == '1') {
                    ?>
                        <div class="form-group row">
                            <label for="image" class="col-sm-3 control-label col-form-label">Image Gallery</label>
                            <div class="col-sm-9 div-center col-11">
                                <div id="js-lightgallery">
                                    <?php
                                    $img = getAllImg($_GET['dish_id']);
                                    $index = 0; // Add an index to track the first image
                                    foreach ($img as $photo_feed) {
                                    ?>
                                        <div class="mb-3 <?php if ($index !== 0) echo 'mt-2'; ?>"> <!-- Add mt-2 class for top margin except for the first image -->
                                            <?php
                                            if ($_SESSION['ADMIN_ROLE'] == 'super') {
                                            ?>
                                                <div style="z-index: 999; position: relative; color: #FF6262;">
                                                    <div class="delphotof" onclick="DeletePhotoFeed(<?php echo $photo_feed['image_id'] ?>,'<?php echo $photo_feed['image'] ?>')">
                                                        <i class="fa fa-trash"></i>
                                                    </div>
                                                    <a href="../media/dish/<?php echo $photo_feed['image']; ?>">
                                                        <img class="img-fluid" src="../media/dish/<?php echo $photo_feed['image']; ?>" alt="">
                                                    </a>
                                                </div>
                                            <?php } else {
                                            ?>
                                                <a href="../media/dish/<?php echo $photo_feed['image']; ?>">
                                                    <i class="fa fa-trash" onclick="rolecheck()" style="z-index: 999; position: relative; color: #FF6262;"></i>
                                                    <img class="img-fluid" src="../media/dish/<?php echo $photo_feed['image']; ?>" alt="">
                                                </a>
                                            <?php } ?>
                                        </div>
                                    <?php
                                        $index++; // Increment the index for subsequent images
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    <?php }

                    ?>
                    <?php
                    if ($is_attribute_product == '1') {
                    ?>
                        <div class="form-group row" id="dish_box1">
                            <?php
                            $i = 1;
                            $dishID = $_GET['dish_id'];
                            $dish_details_sql = mysqli_query($conn, "select * from dish_details where 
                        dish_id='$dishID'");
                            while ($dish_detail_row = mysqli_fetch_assoc($dish_details_sql)) {
                            ?>
                                <label for="Attributes" class=" col-sm-3 mb-2 control-label col-form-label remove_<?= $dish_detail_row['ID'] ?>">Attributes</label>
                                <input type="hidden" name="dish_details_id[]" class="dish_details_id" id="dish_details_id" value="<?php echo $dish_detail_row['ID']; ?>">
                                <div class="col-md-2 remove_<?= $dish_detail_row['ID'] ?>"><input type="text" class="form-control attribute" required name="attribute[]" placeholder="Attribute" id="attribute" value="<?php echo $dish_detail_row['attribute'] ?>"></div>
                                <div class="col-md-2 remove_<?= $dish_detail_row['ID'] ?>"><input required type="number" class="form-control price" name="price[]" placeholder="price" id="price" value="<?php echo $dish_detail_row['price'] ?>"></div>

                                <div class="col-md-2 remove_<?= $dish_detail_row['ID'] ?>"><input required type="text" class="form-control sku" name="sku[]" placeholder="sku" id="sku" value="<?php echo $dish_detail_row['sku'] ?>"></div>


                                <div class="col-md-1 remove_<?= $dish_detail_row['ID'] ?>"> <?php if ($dish_detail_row['status'] == 0) { ?>
                                        <a href="action/update_dish_detail_status.php?action=deactive&ID=<?php echo $dish_detail_row['ID']; ?>" class="btn btn-dark btn-sm shadow-none waves-effect waves-dark" title="Click to active" data-toggle="tooltip">
                                            Deactive</a>
                                        </a>
                                    <?php } else { ?>
                                        <a href="action/update_dish_detail_status.php?action=active&ID=<?php echo $dish_detail_row['ID']; ?>" class="btn btn-success btn-sm shadow-none waves-effect waves-dark" title="Click to Deactive" data-toggle="tooltip">
                                            Active</a>
                                        </a>
                                    <?php } ?>
                                </div>
                                <?php if ($i != 1) { ?>
                                    <div class="col-sm-1 remove_<?= $dish_detail_row['ID'] ?>"><button type="button" class=" btn btn-warning waves-effect waves-light shadow-none ml-5" onclick="remove_old_attr('<?php echo $dish_detail_row['ID'] ?>')">Remove</button></div>
                                <?php } ?>
                            <?php $i++;
                            } ?>
                            <div class="col-sm-10"><button type="button" class=" btn btn-primary waves-effect waves-light shadow-none" name="addmore" style="float: right;" onclick="add_more()">Add More</button></div>
                        </div>
                    <?php } ?>


                    <div class="form-group row">
                        <label for="dish_detail" class="col-sm-3 control-label col-form-label">Short Description</label>
                        <div class="col-sm-9">
                            <textarea class="form-control" name="short_description" id="short_description"> <?php echo $short_description; ?></textarea>
                        </div>
                    </div>

                    <?php
                    if ($is_detailed_dish == '1') {
                    ?>
                        <div class="form-group row">
                            <label for="dish_detail" class="col-sm-3 control-label col-form-label">Dish Details</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" name="dish_detail" id="dish_detail"> <?php echo $dish_detail; ?></textarea>
                            </div>
                        </div>
                    <?php }
                    ?>


                    <div class="form-group row">
                        <label for="meta_title" class="col-sm-3 control-label col-form-label">Meta Title</label>
                        <div class="col-sm-9">

                            <input type="text" class="form-control" name="meta_title" id="meta_title" value="<?php echo $meta_title; ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="meta_description" class="col-sm-3 control-label col-form-label">Meta Description</label>
                        <div class="col-sm-9">
                            <textarea class="form-control " name="meta_description" id="meta_description"><?php echo $meta_description; ?></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="meta_keywords" class="col-sm-3 control-label col-form-label">Meta Keywords</label>
                        <div class="col-sm-9">

                            <input type="text" class="form-control" name="meta_keywords" id="meta_keywords" value="<?php echo $meta_keywords; ?>">
                        </div>
                    </div>

                </div>


                <?php
                if ($_SESSION['ADMIN_ROLE'] == 'super') {
                ?>
                    <div class="border-top">
                        <div class="card-body">
                            <button type="submit" name="submit" class="btn btn-primary waves-effect waves-dark shadow-none" id="submit_form">Update</button>
                        </div>
                    </div>

                <?php } else {
                ?>
                    <div class="border-top">
                        <div class="card-body">
                            <button type="button" class="btn btn-primary waves-effect waves-dark shadow-none" onclick="rolecheck()">Update</button>
                        </div>
                    </div>
                <?php } ?>
            </form>
        </div>

        <!-- ------------------------------------------------>
    </div>


    <input type="hidden" id="add_more" value="1">
    <script>
        function add_more() {
            var add_more = jQuery(' #add_more').val();
            add_more++;
            jQuery('#add_more').val(add_more);
            var html = ' <div class="row pt-2" id="box' + add_more + '">  <div class="col-sm-3 mt-2 control-label "></div><div class="col-sm-2"><input type="text" class="form-control ml-5 attribute" name="attribute[]" required placeholder="Attribute" id="attribute"></div><div class="col-sm-2"><input type="number" required class="price form-control ml-5" name="price[]" placeholder="price" id="price"></div><div class="col-sm-2"><input type="text" required class="sku form-control ml-5" name="sku[]" placeholder="sku" id="sku"></div><div class="col-sm-2"><button type="button" class=" btn btn-warning waves-effect waves-light shadow-none ml-5"  onclick="remove_more(' + add_more + ')">Remove</button></div> </div>';
            jQuery('#dish_box1').append(html);
        }

        function remove_more(id) {
            jQuery('#box' + id).hide(1000);
        }

        function remove_old_attr(id) {
            var result = confirm('Are you sure');
            if (result == true) {

                $.ajax({
                    type: "post",
                    url: "action/delete-attr.php",
                    data: "dish_details_id=" + id,
                    success: function(response) {
                        $(".remove_" + id + "").hide();
                    }
                });
            }

        }
    </script>

    <?php include('../includes/footer.php'); ?>
    <script type="text/javascript" src="../js/dropzone.js"></script>
    <script type="text/javascript" src="../js/light-gallery.js"></script>
    <script type="text/javascript" src="../js/light-gallery-delete-button.js"></script>

    <script>
        $(document).ready(function() {
            // Attach a change event listener to the checkboxes
            $('input[name="meal[]"]').on('change', function() {
                const selectedMeals = $('input[name="meal[]"]:checked').map(function() {
                    return $(this).val();
                }).get();
            });
        });


        function AdddishValidate() {
            const requiredFields = [
                "category_id", "dish", "slug", "meta_title", "meta_description", "meta_keywords"
            ];

            for (const field of requiredFields) {
                const value = document.getElementsByName(field)[0].value.trim();
                if (value === "") {
                    validation_msg(`Please Enter ${field.replace("_", " ").toUpperCase()}!`, "question", "2000");
                    document.getElementsByName(field)[0].focus();
                    return false;
                }
            }

            const short_description = document.getElementsByName("short_description")[0].value.trim();
            if (short_description === "") {
                validation_msg("Please Enter Short Description!", "question", "2000");
                document.getElementsByName("short_description")[0].focus();
                return false;
            }

            const is_attribute_product = document.querySelector('input[name="is_attribute_product"]:checked').value;
            const is_detailed_dish = document.querySelector('input[name="is_detailed_dish"]:checked').value;

            if (is_attribute_product === "0") {
                const mrp = document.getElementsByName("mrp")[0].value.trim();
                const selling_price = document.getElementsByName("selling_price")[0].value.trim();
                const main_sku = document.getElementsByName("main_sku")[0].value.trim();

                if (mrp == "" || selling_price == "" || main_sku == "") {
                    alert("Please fill in all required fields for MRP, Selling Price, and Main SKU.");
                    return false;
                }
            }

            if (is_detailed_dish == "1") {
                const dish_detail = document.getElementsByName("dish_detail")[0].value.trim();
                if (dish_detail == "") {
                    alert("Please Enter Dish Details!");
                    document.getElementsByName("dish_detail")[0].focus();
                    return false;
                }
            }
            return true; // All validations passed
        }

        function submitFormDataViaAjax() {
            // Disable the button and change its text
            if (!AdddishValidate()) {
                return;
            }
            const submitButton = document.getElementById("submit_form");
            submitButton.disabled = true;
            submitButton.textContent = "Submitting...";
            const formData = new FormData(document.getElementById("UpdateDishForm"));
            const xhr = new XMLHttpRequest();
            xhr.open("POST", "action/update-dish.php", true);
            // Set up headers, e.g., CSRF token
            xhr.setRequestHeader('X-CSRF-TOKEN', $('meta[name="csrf-token"]').attr('content'));
            xhr.onload = function() {
                // Re-enable the button and restore its text
                submitButton.disabled = false;
                submitButton.textContent = "Submit";
                if (xhr.status === 200) {
                    validation_msg(xhr.responseText, "question", "2000");
                } else {
                    // Handle errors here
                    console.error("Error:", xhr.statusText);
                }
            };
            const imageInput = document.querySelector('input[name="myimg"]');
            if (imageInput.files.length === 1) {
                formData.append("myimg", imageInput.files[0]);
            }
            $('.dish_details_id').each(function() {
                formData.append("dish_details_id[]", $(this).val());
            });
            $('.attribute').each(function() {
                formData.append("attribute[]", $(this).val());
            });
            $('.price').each(function() {
                formData.append("price[]", $(this).val());
            });
            $('.sku').each(function() {
                formData.append("sku[]", $(this).val());
            });
            formData.append("meal[]", selectedMeals);
            xhr.send(formData);
        }

        // Dropzone configuration
        Dropzone.autoDiscover = false;
        let selectedMeals = [];

        const myDropzone = new Dropzone("#myDropzone", {
            url: "action/update-dish.php",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            autoProcessQueue: false,
            uploadMultiple: true,
            parallelUploads: 5,
            maxFiles: 15,
            acceptedFiles: ".jpeg,.jpg,.png,.gif",
            addRemoveLinks: true,
            dictDuplicateFile: "Duplicate Files Cannot Be Uploaded",
            preventDuplicates: true,
            init: function() {
                const submitButton = document.getElementById("submit_form");
                submitButton.addEventListener("click", function(e) {
                    if (myDropzone.getQueuedFiles().length === 0) {
                        e.preventDefault();
                        submitFormDataViaAjax();
                    } else {
                        AdddishValidate();
                        e.preventDefault();
                        e.stopPropagation();
                        myDropzone.processQueue();
                    }
                });


                this.on('sendingmultiple', function(data, xhr, formData) {
                    var formFields = [
                        "dish", "ID", "oldImg", "category_id", "short_description",
                        "dish_detail", "meta_title", "slug", "is_available",
                        "meta_description", "meta_keywords", "type", "is_attribute_product", "is_detailed_dish", "price_tagline", "mrp", "selling_price", "main_sku"
                    ];
                    for (const field of formFields) {
                        formData.append(field, document.getElementsByName(field)[0].value);
                    }
                    const imageInput = document.querySelector('input[name="myimg"]');
                    if (imageInput.files.length === 1) {
                        formData.append("myimg", imageInput.files[0]);
                    }
                    $('.dish_details_id').each(function() {
                        formData.append("dish_details_id[]", $(this).val());
                    });
                    $('.attribute').each(function() {
                        formData.append("attribute[]", $(this).val());
                    });
                    $('.price').each(function() {
                        formData.append("price[]", $(this).val());
                    });
                    $('.sku').each(function() {
                        formData.append("sku[]", $(this).val());
                    });
                    selectedMeals = $('input[name="meal[]"]:checked').map(function() {
                        return $(this).val();
                    }).get();
                    formData.append("meal[]", selectedMeals);
                });
            }
        });
    </script>
    <script>
        $(document).ready(function() {

            var $initScope = $('#js-lightgallery');
            if ($initScope.length) {
                $initScope.justifiedGallery({
                    border: -1,
                    rowHeight: 150,
                    margins: 8,
                    waitThumbnailsLoad: true,
                    randomize: false,
                }).on('jg.complete', function() {
                    $initScope.lightGallery({
                        thumbnail: true,
                        animateThumb: true,
                        showThumbByDefault: true,
                    });
                });
            };
            $initScope.on('onAfterOpen.lg', function(event) {
                $('body').addClass("overflow-hidden");
            });
            $initScope.on('onCloseAfter.lg', function(event) {
                $('body').removeClass("overflow-hidden");
            });
        });

        function DeletePhotoFeed(PhotoId, Image) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                    if (result.isConfirmed) {

                        $.post("action/delete_photo_feeed.php", {
                                PhotoId: PhotoId,
                                Image: Image
                            },
                            function(data, status) {
                                //document.getElementById("s_users_info").innerHTML = data;
                                var response = JSON.parse(data);
                                if (response.error == false) {
                                    alert(response.message);
                                    location.reload();
                                } else {
                                    noboAlert(response.message);
                                }
                            });
                    }
                },
                function() {
                    alertify.error('Cancel')
                });
        }
    </script>
    <script src="<?= ADMIN_SITE_PATH ?>js/multiple-input.js"></script>
    <script>
        $('input[name="meta_keywords"]').amsifySuggestags();
    </script>