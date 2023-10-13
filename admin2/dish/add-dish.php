<?php require("../includes/top.php"); ?>
<?php
include('../controller/common-controller.php');
include('../category/controller/category-controller.php');
include('controller/dish-controller.php');

$conn = _connectodb();
$categorydata = getcategory($conn);
$categorydata = json_decode($categorydata, true);
include('../setting/controller/setting-controller.php');
$getsetting = getsetting($conn);
$getsetting = json_decode($getsetting, true);
foreach ($getsetting as $getsinglesetting) {
    extract($getsinglesetting);
    // print_r($getsetting);
}
include('../controller/constant.inc.php');
?>

<?php include('../includes/header.php'); ?>

<?php include('../includes/sidebar.php'); ?>
<link rel="stylesheet" href="../css/dropzone.css">
<div class="page-wrapper">
    <script src="https://cdn.ckeditor.com/ckeditor5/31.1.0/classic/ckeditor.js"></script>
    <link rel="stylesheet" href="<?= ADMIN_SITE_PATH ?>css/multiple-input.css">
    <!-- Bread crumb and right sidebar toggle -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Add Dish</h4>
                <div class="ms-auto text-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo ADMIN_SITE_PATH; ?>admin-dashboard.php"><i class="mdi mdi-home"></i></a></li>
                            <li class="breadcrumb-item active" aria-current="page"><a href="<?php echo ADMIN_SITE_PATH; ?>dish/view-dish.php">View Dish</a></li>

                            <li class="breadcrumb-item active" aria-current="page">Add Dish</li>
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
            <form class="form-horizontal" method="POST" enctype="multipart/form-data" action="action/add-dish.php" id="add_dish_form" onsubmit="return AdddishValidate()">
                <div class="card-body">
                    <div class="form-group row">
                        <label for="is_available" class="col-sm-3 control-label col-form-label">Is Available</label>
                        <div class="col-sm-3">
                            <div class="form-check">
                                <input type="radio" class="form-check-input" name="is_available" id="is_available" name="radio-stacked" value="1" checked>
                                <label class="form-check-label mb-0" for="is_available">Yes</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" name="is_available" id="is_available" name="radio-stacked" value="0">
                                <label class="form-check-label mb-0" for="is_available">No</label>
                            </div>
                        </div>

                        <label for="is_detailed_dish" class="col-sm-3 control-label col-form-label">Is Detailed Dish</label>
                        <div class="col-sm-3">
                            <div class="form-check">
                                <input type="radio" class="form-check-input" name="is_detailed_dish" id="is_detailed_dish" name="radio-stacked" value="1" checked>
                                <label class="form-check-label mb-0" for="is_detailed_dish">Yes</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" name="is_detailed_dish" id="is_detailed_dish" name="radio-stacked" value="0">
                                <label class="form-check-label mb-0" for="is_detailed_dish">No</label>
                            </div>
                        </div>


                    </div>
                    <div class="form-group row">
                        <label for="is_attribute_product" class="col-sm-3 control-label col-form-label">Is Attribute Product</label>
                        <div class="col-sm-3">
                            <div class="form-check">
                                <input type="radio" class="form-check-input" name="is_attribute_product" id="is_attribute_product" name="radio-stacked" value="1" checked>
                                <label class="form-check-label mb-0" for="is_attribute_product">Yes</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" name="is_attribute_product" id="is_attribute_product" name="radio-stacked" value="0">
                                <label class="form-check-label mb-0" for="is_attribute_product">No</label>
                            </div>
                        </div>

                        <label for="type" class="col-sm-3 control-label col-form-label">Type</label>
                        <div class="col-sm-3">
                            <div class="form-check">
                                <input type="radio" class="form-check-input" name="type" id="type" value="veg" checked>
                                <label class="form-check-label mb-0" for="type">Veg</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" name="type" id="type" value="non-veg">
                                <label class="form-check-label mb-0" for="type">Non-Veg</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row" id="mainpricediv" style="background: #f7f7f7;padding: 20px;border: 1px solid #d9d9d9;">
                        <label for="is_available" class="col-sm-3 control-label col-form-label">Price</label>
                        <div class="col-sm-9">
                            <div class="row">
                                <div class="col-sm-3">
                                    <input type="number" class="form-control" name="mrp" id="mrp">
                                    <label class="form-check-label mb-0" for="mrp">MRP <span class="text-danger">*</span> </label>
                                </div>
                                <div class="col-sm-3">
                                    <input type="number" class="form-control" name="selling_price" id="selling_price">
                                    <label class="form-check-label mb-0" for="selling_price">Selling Price</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="main_sku" class="col-sm-3 control-label col-form-label">SKU <span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="main_sku" id="main_sku">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="slug" class="col-sm-3 control-label col-form-label">Slug <span class="text-danger">*</span></label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="slug" id="slug">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="price_tagline" class="col-sm-3 control-label col-form-label">Price Tagline</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="price_tagline" id="price_tagline">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="is_available" class="col-sm-3 control-label col-form-label">Meal</label>
                        <div class="col-sm-6">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" name="meal[]" id="breakfast" value="breakfast">
                                <label class="form-check-label mb-0" for="breakfast">Breakfast</label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" name="meal[]" id="lunch" value="lunch">
                                <label class="form-check-label mb-0" for="lunch">Lunch</label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" name="meal[]" id="dinner" value="dinner">
                                <label class="form-check-label mb-0" for="dinner">Dinner</label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" name="meal[]" id="beverages" value="beverages">
                                <label class="form-check-label mb-0" for="beverages">Beverages</label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" name="meal[]" id="noodles" value="noodles">
                                <label class="form-check-label mb-0" for="noodles">Noodles</label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" name="meal[]" id="other" value="other">
                                <label class="form-check-label mb-0" for="other">Other</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">

                        <label for="category" class="col-sm-3 control-label col-form-label">Category <span class="text-danger">*</span></label>
                        <div class="col-sm-3">
                            <select name="category_id" id="category_id" class="form-control select2">
                                <option value="0" selected disabled>Select Category</option>
                                <?php
                                foreach ($categorydata as $category) {
                                ?>
                                    <option value="<?php echo $category['ID'] ?>"><?php echo $category['category'] ?></option>
                                <?php }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row" style="background: #fff8d8; padding: 5px;">
                        <label for="dish" class="col-sm-3 control-label col-form-label">Dish Name <span class="text-danger">*</span></label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="dish" id="dish">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="image" class="col-sm-3 control-label col-form-label">Dish Image <span class="text-danger">*</span></label>
                        <div class="col-sm-9  col-11">
                            <input type="file" name="myimg" id="myimg" class="myimg form-control">
                        </div>
                    </div>
                    <div class="form-group row" id="dropzonediv">
                        <label for="image" class="col-sm-3 control-label col-form-label">Image</label>
                        <div class="col-sm-9 div-center col-11">
                            <div class="dropzone mt-3" id="myDropzone"></div>
                        </div>
                    </div>
                    <div class="form-group row" id="dish_box1">
                        <label for="Attributes" class="col-sm-3 mb-2 control-label col-form-label">Attributes <span class="text-danger">*</span></label>
                        <div class="col-sm-2"><input type="text" class="form-control attribute" name="attribute[]" placeholder="ATTRIBUTE" id="attribute"></div>
                        <div class="col-sm-2"><input type="number" class="form-control price" name="price[]" placeholder="PRICE" id="price"></div>
                        <div class="col-sm-2"><input type="text" class="form-control sku" name="sku[]" placeholder="SKU" id="sku"></div>
                        <div class="col-sm-2"><button type="button" class=" btn btn-primary waves-effect waves-light shadow-none" name="addmore" onclick="add_more()">Add More</button></div>
                    </div>
                    <div class="form-group row">
                        <label for="short_description" class="col-sm-3 control-label col-form-label">Short Description <span class="text-danger">*</span></label>
                        <div class="col-sm-9">
                            <textarea class="form-control" name="short_description" id="short_description"></textarea>
                        </div>
                    </div>
                    <div class="form-group row" id="dishDetailID">
                        <label for="dish_detail" class="col-sm-3 control-label col-form-label">Dish Detail <span class="text-danger">*</span></label>
                        <div class="col-sm-9">
                            <textarea class="form-control" name="dish_detail" id="dish_detail"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="meta_title" class="col-sm-3 control-label col-form-label">Meta Title <span class="text-danger">*</span></label>
                        <div class="col-sm-9">

                            <input type="text" class="form-control" name="meta_title" id="meta_title">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="meta_description" class="col-sm-3 control-label col-form-label">Meta Description <span class="text-danger">*</span></label>
                        <div class="col-sm-9">
                            <textarea class="form-control " name="meta_description" id="meta_description"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="meta_keywords" class="col-sm-3 control-label col-form-label">Meta Keywords <span class="text-danger">*</span></label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="meta_keywords" id="meta_keywords">
                        </div>
                    </div>
                </div>
                <?php
                if ($_SESSION['ADMIN_ROLE'] == 'super') {
                ?>
                    <div class="border-top">
                        <div class="card-body">
                            <button type="submit" name="submit" id="submit_form" class="btn btn-primary waves-effect waves-light shadow-none">Add</button>
                        </div>
                    </div>

                <?php } else {
                ?>
                    <div class="border-top">
                        <div class="card-body">
                            <button type="button" class="btn btn-primary waves-effect waves-dark shadow-none" onclick="rolecheck()">Add</button>

                        </div>
                    </div>
                <?php } ?>
            </form>
        </div>
        <!-- ------------------------------------------------>
    </div>
    <input type="hidden" id="add_more" value="1">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- uncomment below code for validation------------------------------------------------------ -->

    <?php include('../includes/footer.php'); ?>
    <script type="text/javascript" src="../js/dropzone.js"></script>
    <script src="<?= ADMIN_SITE_PATH ?>js/multiple-input.js"></script>
    <script>
        function add_more() {
            var add_more = jQuery(' #add_more').val();
            add_more++;
            jQuery('#add_more').val(add_more);
            var html = ' <div class="row pt-2" id="box' + add_more + '">  <div class="col-sm-3 mt-2 control-label "></div><div class="col-sm-2"><input type="text" class="form-control ml-5 attribute" name="attribute[]" placeholder="Attribute" id="attribute" required></div><div class="col-sm-2"><input type="number" class="price form-control ml-5" name="price[]" required placeholder="price" id="price"></div><div class="col-sm-2"><input type="text" class="form-control ml-5 sku" name="sku[]" placeholder="sku" id="sku" required></div><div class="col-sm-2"><button type="button" class=" btn btn-warning waves-effect waves-light shadow-none ml-5"  onclick="remove_more(' + add_more + ')">Remove</button></div> </div>';
            jQuery('#dish_box1').append(html);
        }

        function remove_more(id) {
            $('#box' + id).fadeOut(200, function() {
                $('#box' + id).remove();
            });
        }
    </script>

    <!-- <script>
        ClassicEditor
            .create(document.querySelector('#short_description'))
            .catch(error => {
                console.error(error);
            });
    </script>

    <script>
        ClassicEditor
            .create(document.querySelector('#dish_detail'))
            .catch(error => {
                console.error(error);
            });
    </script>
     -->
    <script>
        $('input[name="meta_keywords"]').amsifySuggestags();
    </script>
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
                "category_id", "dish", "myimg", "slug", "meta_title", "meta_description", "meta_keywords"
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

            const formData = new FormData(document.getElementById("add_dish_form"));
            const xhr = new XMLHttpRequest();
            xhr.open("POST", "action/add-dish.php", true);
            // Set up headers, e.g., CSRF token
            xhr.setRequestHeader('X-CSRF-TOKEN', $('meta[name="csrf-token"]').attr('content'));
            xhr.onload = function() {
                // Re-enable the button and restore its text
                submitButton.disabled = false;
                submitButton.textContent = "Submit";
                window.location.href = "view-dish.php";
                if (xhr.status === 200) {
                    validation_msg(xhr.responseText, "question", "2000");
                    window.location.href = "view-dish.php";
                } else {
                    // Handle errors here
                    console.error("Error:", xhr.statusText);
                }
            };
            // Manually append the image file(s) to the FormData
            const imageInput = document.querySelector('input[name="myimg"]');
            if (imageInput.files.length === 1) {
                formData.append("myimg", imageInput.files[0]);
            }
            // $('.attribute').each(function() {
            //     formData.append("attribute[]", $(this).val());
            // });
            $('.price').each(function() {
                formData.append("price[]", $(this).val());
            });
            $('.sku').each(function() {
                formData.append("sku[]", $(this).val());
            });
            formData.append("meal[]", selectedMeals);
            xhr.send(formData);
        }
        Dropzone.autoDiscover = false;

        let selectedMeals = [];
        // Initialize Dropzone
        const myDropzone = new Dropzone("#myDropzone", {
            url: "action/add-dish.php",
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
                        const inputElement = document.getElementsByName(field)[0];
                        if (inputElement) {
                            formData.append(field, inputElement.value);
                        }
                    }
                    const imageInput = document.querySelector('input[name="myimg"]');
                    if (imageInput && imageInput.files.length === 1) {
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
        // Function to toggle the visibility of the dish_box1 div
        function toggleDishBox() {
            var isAttributeProduct = document.querySelector('input[name="is_attribute_product"]:checked').value;
            var dishBox = document.getElementById('dish_box1');
            var mainpricediv = document.getElementById('mainpricediv');
            if (isAttributeProduct === "0") {
                dishBox.style.display = 'none';
                mainpricediv.style.display = 'flex';
            } else {
                dishBox.style.display = 'flex';
                mainpricediv.style.display = 'none';

            }
        }

        function toggleDetaildishBox() {
            var is_detailed_dish = document.querySelector('input[name="is_detailed_dish"]:checked').value;
            var dropzonediv = document.getElementById('dropzonediv');
            var dishDetailID = document.getElementById('dishDetailID');

            if (is_detailed_dish === "0") {
                dropzonediv.style.display = 'none';
                dishDetailID.style.display = 'none';
            } else {
                dropzonediv.style.display = 'flex'; // or 'flex' if you prefer
                dishDetailID.style.display = 'flex'; // or 'flex' if you prefer
            }
        }

        // Add an event listener to the radio input
        document.addEventListener('DOMContentLoaded', function() {
            var radioInputs = document.querySelectorAll('input[name="is_attribute_product"]');
            radioInputs.forEach(function(radioInput) {
                radioInput.addEventListener('change', toggleDishBox);
            });

            var dish_Detailradio = document.querySelectorAll('input[name="is_detailed_dish"]');
            dish_Detailradio.forEach(function(radioInput) {
                radioInput.addEventListener('change', toggleDetaildishBox);
            });

            // Call the function initially to set the initial state
            toggleDetaildishBox();
            toggleDishBox();
        });
    </script>