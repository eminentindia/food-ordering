<?php
$page_title = "Dish";
include('connect/head.php'); ?>
<?php include('connect/menu-nav.php');
?>
<link rel="stylesheet" href="<?= ADMIN_SITE_PATH ?>assets/css/multiple-input.css">
<link rel="stylesheet" href="<?= ADMIN_SITE_PATH ?>assets/css/dropzone.css">

<?php
$categorydata = getcategory($conn);
$categorydata = json_decode($categorydata, true);
?>
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <div class=" container-xxl " id="kt_content_container">
        <div class="card card-xl-stretch mb-xl-8">
            <form method="post">
                <div class="card-header  borderBottom1">
                    <div class="card-title">
                        <div class="d-flex align-items-center themeColor text-upper position-relative my-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="black">
                                <rect x="2" y="2" width="9" height="9" rx="2" fill="black"></rect>
                                <rect opacity="0.3" x="13" y="2" width="9" height="9" rx="2" fill="black"></rect>
                                <rect opacity="0.3" x="13" y="13" width="9" height="9" rx="2" fill="black"></rect>
                                <rect opacity="0.3" x="2" y="13" width="9" height="9" rx="2" fill="black"></rect>
                            </svg>&nbsp; List Of <?php echo $page_title; ?>
                        </div>
                    </div>
                    <div class="card-toolbar">
                        <div class="d-flex justify-content-end" data-kt-customer-table-toolbar="base">
                            <button type="button" class="me-3 btn btn-sm btn-success" data-kt-drawer-show="true" data-kt-drawer-target="#add_dish_drawer">ADD</button>
                        </div>
                    </div>
                </div>
                <div class="card-body p-1">
                    <table id="maketable" class=" table display nowrap table-striped table-bordered" style="width: 100%;">
                        <thead>
                            <tr>

                                <th> <strong>S.No</strong></th>
                                <th> <strong>Category</strong></th>
                                <th class="text-center"> <strong>Type</strong></th>
                                <th> <strong>Dish Name</strong></th>
                                <th> <strong>Image</strong></th>
                                <th> <strong>Status</strong></th>
                                <th> <strong>Is Popular</strong></th>
                                <th> <strong>Is Available</strong></th>
                                <th> <strong>Feedbacks</strong></th>
                                <th> <strong>Action</strong></th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </form>
        </div>
    </div>
    <?php include('controller/dish/drawer/add_dish_drawer.php') ?>
    <?php include('controller/dish/drawer/edit_dish_drawer.php') ?>
    <?php include('controller/dish/modal/change_dish_type.php') ?>
    <?php include('connect/copyrights.php'); ?>
    <?php include('connect/footer-script.php'); ?>
    <script>
        KTDrawer.createInstances();
        const add = document.querySelector("#add_dish_drawer");
        const add_drawer = KTDrawer.getInstance(add);
        const edit = document.querySelector("#edit_dish_drawer");
        const edit_drawer = KTDrawer.getInstance(edit);
        //-------------------------- GET DATA FOR EDIT----------------------------------------------------------
        function edit_data(id) {
            $('#overlay').fadeIn();
            edit_drawer.show()
            var param = encryptpost('get_dish_html');
            var id = encryptpost(id);
            var requestData = {
                id,
                param
            };
            $.ajax({
                type: "POST",
                url: "controller/dish/controller.php",
                data: requestData,
                success: function(response) {

                    $('.get_edit_data_html').html(response.message)
                    $('#overlay').fadeOut();

                    manageDish();
                    $('input[name="edit_meta_keywords"]').amsifySuggestags();

                }
            });
        }
        //-------------------------- DELETE DATA----------------------------------------------------------
        function delete_data(id) {
            showDeleteConfirmation(function() {
                $('#overlay').fadeIn();
                var param = encryptpost('delete_data');
                var requestData = {
                    id,
                    param
                };
                $.ajax({
                    type: "POST",
                    url: "controller/dish/controller.php",
                    data: requestData,
                    success: function(response) {
                        $('#overlay').fadeOut();
                        showPopup(response.status, response.message)
                        $('#maketable').DataTable().ajax.reload(null, false);
                    }
                });
            });
        }

        function delete_image(id, element) {
            showDeleteConfirmation(function() {
                $('#overlay').fadeIn();
                var param = encryptpost('delete_gallery_image');
                var requestData = {
                    id,
                    param
                };
                $.ajax({
                    type: "POST",
                    url: "controller/dish/controller.php",
                    data: requestData,
                    success: function(response) {
                        $('#overlay').fadeOut();
                        showPopup(response.status, response.message);
                        // Fade out the parent div of the clicked element
                        $('.hidethis_' + element).hide();
                    }
                });
            });
        }
        //-------------------------- ADD SUBMIT------------------------------------------------------------------





        //-------------------------- EDIT SUBMIT------------------------------------------------------------------
        $('#edit_dish_drawer_submit').on('submit', function(event) {
            event.preventDefault();
            $('#overlay').fadeIn();
            // Create a FormData object to handle both form data and image
            var formDataWithImage = new FormData($('#edit_dish_drawer_submit')[0]);
            // Serialize the form data and encrypt it
            var formData = $('#edit_dish_drawer_submit').serializeArray();
            formData.forEach(function(input) {
                formDataWithImage.set(input.name, encryptpost(input.value));
            });
            formDataWithImage.append('param', encryptpost('update_dish'));
            $.ajax({
                type: "POST",
                url: "controller/dish/controller.php",
                data: formDataWithImage, // Send both form data and image
                processData: false, // Important: prevent jQuery from processing the data
                contentType: false, // Important: prevent jQuery from setting the content type automatically
                success: function(response) {
                    $('#overlay').fadeOut();
                    $('#maketable').DataTable().ajax.reload(null, false);
                    edit_drawer.hide();
                    showPopup(response.status, response.message);
                }
            });
        });



        // ------------------------------------ FOR DATATABLE -----------------------------------------------------
        function rowCreationFunction(nRow, aData, iDataIndex) {
            var checked = aData[5] == '1' ? 'checked' : '';
            $('td:eq(5)', nRow).html(`
        <div class="toggle-button-switch">
            <div id="button-3" class="button r">
                <input ${checked} name="status" class="checkbox activeornot ${aData[5]}" onclick="activeornotbtn('${aData[5]}')" type="checkbox">
                <div class="knobs"></div>
                <div class="layer"></div>
            </div>
        </div>`);

            $('td:eq(6)', nRow).html(`
        <div class="toggle-button-switch">
            <div id="button-3" class="button r">
                <input ${checked} name="is_popular" class="checkbox activeornot ${aData[6]}" onclick="activeornotbtn('${aData[6]}')" type="checkbox">
                <div class="knobs"></div>
                <div class="layer"></div>
            </div>
        </div>`);

            $('td:eq(7)', nRow).html(`
        <div class="toggle-button-switch">
            <div id="button-3" class="button r">
                <input ${checked} name="is_popular" class="checkbox activeornot ${aData[7]}" onclick="activeornotbtn('${aData[7]}')" type="checkbox">
                <div class="knobs"></div>
                <div class="layer"></div>
            </div>
        </div>`);

            $('td:eq(9)', nRow).html(`
        <div class="d-flex align-items-center gap-4">
            <button type="button" class="edit-button" onclick="edit_data('${aData[9]}')">
                <img src="assets/images/edit.png" class="edit-svgIcon" />
            </button>
            <button type="button" onclick="delete_data('${aData[9]}')" class="delete-button">
                <img src="assets/images/delete.png" class="delete-svgIcon" />
            </button>
        </div>`);
        }

        $(document).ready(function() {
            initializeDynamicDataTable('maketable', 'connect/listdata.php?show=<?php echo md5('dish') ?>', 2, 1, rowCreationFunction);
        });
    </script>

    <script type="text/javascript" src="<?= ADMIN_SITE_PATH ?>assets/js/dropzone.js"></script>
    <script src="<?= ADMIN_SITE_PATH ?>assets/js/multiple-input.js"></script>

    <script>
        function add_more() {
            var add_more = jQuery(' #add_more').val();
            add_more++;
            jQuery('#add_more').val(add_more);
            var html = ' <div class="row additionalrows pt-2" id="box' + add_more + '">  <div class="col-sm-3 mb-2 control-label col-form-label"></div><div class="col-sm-2"><input type="text" class="form-control ml-5 attribute" name="attribute[]" placeholder="ATTRIBUTE" id="attribute" required></div><div class="col-sm-2"><input type="number" class="price form-control ml-5" name="price[]" required placeholder="PRICE" id="price"></div><div class="col-sm-2"><input type="text" class="form-control ml-5 sku" name="sku[]" placeholder="SKU" id="sku" required></div> <div class="col-sm-1"><div class="adddivpositionwarn"><i title="Add More" class="fa fa-minus" style="cursor: pointer;" onclick="remove_more(' + add_more + ')"></i></div>';
            jQuery('#dish_box1').append(html);
        }

        function remove_more(id) {
            $('#box' + id).fadeOut(200, function() {
                $('#box' + id).remove();
            });
        }
    </script>

    <script>
        $('input[name="meta_keywords"]').amsifySuggestags();
    </script>
    <script>
        // for add dish 
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

            if (is_attribute_product == "0") {
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
            if (!AdddishValidate()) {
                return;
            }

            const submitButton = document.getElementById("submit_form");
            submitButton.disabled = true;
            submitButton.textContent = "Submitting...";

            const formData = new FormData(document.getElementById("add_dish_form"));

            $.ajax({
                type: "POST",
                url: "controller/dish/action/add-dish.php",
                data: formData,
                processData: false,
                contentType: false,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {

                    submitButton.disabled = false;
                    submitButton.textContent = "Submit";

                    const overlay = $('#overlay');

                    if (response.status === 'success') {
                        overlay.fadeOut();
                        showPopup(response.status, response.message);
                        $('#maketable').DataTable().ajax.reload(null, false);
                        add_drawer.hide();


                    } else {
                        overlay.fadeOut();
                        showPopup('error', 'Please Check Your Internet Connection');
                        $('#maketable').DataTable().ajax.reload(null, false);

                    }
                }
            });
        }
        Dropzone.autoDiscover = false;
        let selectedMeals = [];
        // Initialize Dropzone
        const myDropzone = new Dropzone("#myDropzone", {
            url: "controller/dish/action/add-dish.php",
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
        // Function to toggle the visibility of the dish_box1 div
        function toggleDishBox() {
            var isAttributeProduct = document.querySelector('input[name="is_attribute_product"]:checked').value;
            var dishBox = document.getElementById('dish_box1');
            var mainpricediv = document.getElementById('mainpricediv');
            if (isAttributeProduct == "0") {
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

            if (is_detailed_dish == "0") {
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


    <!-- //edit  -->
    <script>
        function manageDish() {




            function EditishValidate() {
                const requiredFields = [
                    "edit_category_id", "edit_dish", "edit_slug", "edit_meta_title", "edit_meta_description", "edit_meta_keywords"
                ];

                for (const field of requiredFields) {
                    const value = document.getElementsByName(field)[0].value.trim();
                    if (value === "") {
                        validation_msg(`Please Enter ${field.replace("_", " ").toUpperCase()}!`, "question", "2000");
                        document.getElementsByName(field)[0].focus();
                        return false;
                    }
                }

                const short_description = document.getElementsByName("edit_short_description")[0].value.trim();
                if (short_description === "") {
                    validation_msg("Please Enter Short Description!", "question", "2000");
                    document.getElementsByName("edit_short_description")[0].focus();
                    return false;
                }

                const is_attribute_product = document.querySelector('input[name="edit_is_attribute_product"]:checked').value;
                const is_detailed_dish = document.querySelector('input[name="edit_is_detailed_dish"]:checked').value;

                if (is_attribute_product === "0") {
                    const mrp = document.getElementsByName("edit_mrp")[0].value.trim();
                    const selling_price = document.getElementsByName("edit_selling_price")[0].value.trim();
                    const main_sku = document.getElementsByName("edit_main_sku")[0].value.trim();

                    if (mrp === "" || selling_price === "" || main_sku === "") {
                        alert("Please fill in all required fields for MRP, Selling Price, and Main SKU.");
                        return false;
                    }
                }

                if (is_detailed_dish === "1") {
                    const dish_detail = document.getElementsByName("edit_dish_detail")[0].value.trim();
                    if (dish_detail === "") {
                        alert("Please Enter Dish Details!");
                        document.getElementsByName("edit_dish_detail")[0].focus();
                        return false;
                    }
                }

                return true;
            }

            function submitFormDataViaAjax() {
                if (!EditishValidate()) {
                    return;
                }

                const submitButton = document.getElementById("editsubmit_form");
                submitButton.disabled = true;
                submitButton.textContent = "Submitting...";

                const formData = new FormData(document.getElementById("edit_dish_form"));

                $.ajax({
                    type: "POST",
                    url: "controller/dish/action/edit-dish.php",
                    data: formData,
                    processData: false,
                    contentType: false,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="edit_csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        submitButton.disabled = false;
                        submitButton.textContent = "Submit";
                        const overlay = $('#overlay');
                        if (response.status === 'success') {
                            overlay.fadeOut();
                            showPopup(response.status, response.message);
                            $('#maketable').DataTable().ajax.reload(null, false);
                            add_drawer.hide();
                        } else {
                            overlay.fadeOut();
                            showPopup('error', 'Please Check Your Internet Connection');
                            $('#maketable').DataTable().ajax.reload(null, false);
                        }
                    }
                });
            }




            Dropzone.autoDiscover = false;
            let editselectedMeals = [];
            // Initialize Dropzone
            const editmyDropzone = new Dropzone("#editmyDropzone", {
                url: "controller/dish/action/edit-dish.php",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="edit_csrf-token"]').attr('content')
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
                    const submitButton = document.getElementById("editsubmit_form");
                    submitButton.addEventListener("click", function(e) {
                        if (editmyDropzone.getQueuedFiles().length === 0) {
                            e.preventDefault();
                            submitFormDataViaAjax();
                        } else {
                            EditishValidate();
                            e.preventDefault();
                            e.stopPropagation();
                            editmyDropzone.processQueue();
                        }
                    });


                    this.on('sendingmultiple', function(data, xhr, formData) {
                        var formFields = [
                            "edit_dish", "edit_ID", "edit_oldImg", "edit_category_id", "edit_short_description",
                            "dish_detail", "edit_meta_title", "edit_slug", "edit_is_available",
                            "meta_description", "edit_meta_keywords", "edit_type", "edit_is_attribute_product", "edit_is_detailed_dish", "edit_price_tagline", "edit_mrp", "edit_selling_price", "edit_main_sku"
                        ];
                        for (const field of formFields) {
                            const inputElement = document.getElementsByName(field)[0];
                            if (inputElement) {
                                formData.append(field, inputElement.value);
                            }
                        }
                        const imageInput = document.querySelector('input[name="edit_myimg"]');
                        if (imageInput && imageInput.files.length === 1) {
                            formData.append("editmyimg", imageInput.files[0]);
                        }
                        $('.edit_dish_details_id').each(function() {
                            formData.append("editdish_details_id[]", $(this).val());
                        });
                        $('.edit_attribute').each(function() {
                            formData.append("editattribute[]", $(this).val());
                        });
                        $('.edit_price').each(function() {
                            formData.append("editprice[]", $(this).val());
                        });
                        $('.edit_sku').each(function() {
                            formData.append("editsku[]", $(this).val());
                        });
                        editselectedMeals = $('input[name="edit_meal[]"]:checked').map(function() {
                            return $(this).val();
                        }).get();
                        formData.append("editmeal[]", editselectedMeals);
                    });
                }
            });

            function edittoggleDishBox() {
                var isAttributeProduct = document.querySelector('input[name="edit_is_attribute_product"]:checked').value;
                var dishBox = document.getElementById('editdish_box1');
                var editmainpricediv = document.getElementById('editmainpricediv');
                if (isAttributeProduct === "0") {
                    dishBox.style.display = 'none';
                    editmainpricediv.style.display = 'flex';
                } else {
                    dishBox.style.display = 'flex';
                    editmainpricediv.style.display = 'none';
                }
            }

            function edittypedish() {
                var istype = document.querySelector('input[name="edit_type"]:checked').value;
                if (istype == 'non-veg') {
                    $('#edit_dish_drawer_messenger_body').css('background-color', '#ffedf0');
                    $('.dishnameeditclass').css('background-color', '#ff9a9a');
                } else {
                    $('#edit_dish_drawer_messenger_body').css('background-color', 'white');
                    $('.dishnameeditclass').css('background-color', '#fff8d8');

                }
            }

            function edittoggleDetaildishBox() {
                var is_detailed_dish = document.querySelector('input[name="edit_is_detailed_dish"]:checked').value;
                console.log(is_detailed_dish);
                var editdropzonediv = document.getElementById('editdropzonediv');
                var dishDetailID = document.getElementById('editdishDetailID');

                if (is_detailed_dish === "0") {
                    editdropzonediv.style.display = 'none';
                    dishDetailID.style.display = 'none';
                } else {
                    editdropzonediv.style.display = 'flex';
                    dishDetailID.style.display = 'flex';
                }
            }

            // Event delegation for dynamically loaded content
            $(document).on('change', 'input[name="edit_meal[]"]', function() {
                const editselectedMeals = $('input[name="edit_meal[]"]:checked').map(function() {
                    return $(this).val();
                }).get();
            });

            // Event delegation for dynamically loaded content
            $(document).on('click', '#editsubmit_form', function(e) {
                if (editmyDropzone.getQueuedFiles().length === 0) {
                    e.preventDefault();
                    submitFormDataViaAjax();
                } else {
                    EditishValidate();
                    e.preventDefault();
                    e.stopPropagation();
                    editmyDropzone.processQueue();
                }
            });

            // Event delegation for dynamically loaded content
            $(document).on('change', 'input[name="edit_is_attribute_product"]', edittoggleDishBox);
            $(document).on('change', 'input[name="edit_is_detailed_dish"]', edittoggleDetaildishBox);
            $(document).on('change', 'input[name="edit_type"]', edittypedish);













        }





        function remove_more(counter) {
            // Add the logic to remove the dynamically added elements here
            $('#editbox' + counter).remove();
        }

        function edit_remove_more(id) {
            jQuery('#editbox' + id).hide(1000);
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

        var edit_add_more_counter = 0; // Initialize a counter variable
        function newedit_add_more() {
            edit_add_more_counter++; // Increment the counter


                var html = ' <div class="row additionalrows pt-2" id="editbox' + edit_add_more_counter + '">  <div class="col-sm-3 mb-2 control-label col-form-label"></div><div class="col-sm-2"><input type="text" class="form-control ml-5 attribute" name="attribute[]" placeholder="ATTRIBUTE" id="attribute" required></div><div class="col-sm-2"><input type="number" class="price form-control ml-5" name="price[]" required placeholder="PRICE" id="price"></div><div class="col-sm-2"><input type="text" class="form-control ml-5 sku" name="sku[]" placeholder="SKU" id="sku" required></div> <div class="col-sm-1"><div class="adddivpositionwarn"><i title="Add More" class="fa fa-minus" style="cursor: pointer;" onclick="remove_more(' + edit_add_more_counter + ')"></i></div>';

            $('#editdish_box1').append(html);
        }

        // Call manageDish when the page loads initially
    </script>
    <?php include('connect/footer-end.php'); ?>