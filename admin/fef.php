<script>
    // for add dish 
    $(document).ready(function() {
        // Attach a change event listener to the checkboxes
        $('input[name="edit_meal[]"]').on('change', function() {
            const editselectedMeals = $('input[name="edit_meal[]"]:checked').map(function() {
                return $(this).val();
            }).get();
        });
    });

    function EditishValidate() {
        const requiredFields = [
            "category_id", "edit_dish", "edit_myimg", "edit_slug", "edit_meta_title", "edit_meta_description", "edit_meta_keywords"
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

            if (mrp == "" || selling_price == "" || main_sku == "") {
                alert("Please fill in all required fields for MRP, Selling Price, and Main SKU.");
                return false;
            }
        }

        if (is_detailed_dish == "1") {
            const dish_detail = document.getElementsByName("edit_dish_detail")[0].value.trim();
            if (dish_detail == "") {
                alert("Please Enter Dish Details!");
                document.getElementsByName("edit_dish_detail")[0].focus();
                return false;
            }
        }

        return true; // All validations passed
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
                console.log(response);
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
    // Function to toggle the visibility of the editdish_box1 div
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

    function edittoggleDetaildishBox() {
        var is_detailed_dish = document.querySelector('input[name="edit_is_detailed_dish"]:checked').value;
        var editdropzonediv = document.getElementById('editdropzonediv');
        var dishDetailID = document.getElementById('dishDetailID');

        if (is_detailed_dish === "0") {
            editdropzonediv.style.display = 'none';
            dishDetailID.style.display = 'none';
        } else {
            editdropzonediv.style.display = 'flex'; // or 'flex' if you prefer
            dishDetailID.style.display = 'flex'; // or 'flex' if you prefer
        }
    }
    // Add an event listener to the radio input
    document.addEventListener('DOMContentLoaded', function() {
        var editradioInputs = document.querySelectorAll('input[name="edit_is_attribute_product"]');
        editradioInputs.forEach(function(radioInput) {
            radioInput.addEventListener('change', edittoggleDishBox);
        });

        var editdish_Detailradio = document.querySelectorAll('input[name="edit_is_detailed_dish"]');
        editdish_Detailradio.forEach(function(radioInput) {
            radioInput.addEventListener('change', edittoggleDetaildishBox);
        });

        // Call the function initially to set the initial state
        edittoggleDetaildishBox();
        edittoggleDishBox();
    });
</script>