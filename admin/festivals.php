<?php
$page_title = "Festivals Banner";
include('connect/head.php'); ?>
<?php include('connect/menu-nav.php');
?><?php

if (!checkSuperAdminSession()) {
	echo '<script>window.location.href="dashboard.php"</script>';
}
?>
<style>

</style>
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
                            <button type="button" class="me-3 btn btn-sm btn-success" data-kt-drawer-show="true" data-kt-drawer-target="#add_festivals_drawer">ADD</button>
                        </div>
                    </div>
                </div>
                <div class="card-body p-1">
                    <table id="maketable" class=" table display nowrap table-striped table-bordered" style="width: 100%;">
                        <thead>
                            <tr>
                                <th> <strong>S.No</strong></th>
                                <th> <strong>Festival Name</strong></th>
                                <th> <strong>Festival Banner</strong></th>
                                <th> <strong>Status</strong></th>
                                <th> <strong>Banner Timing</strong></th>
                                <th> <strong>Redirect Page</strong></th>
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
    <?php include('controller/festivals/drawer/add_festivals_drawer.php') ?>
    <?php include('controller/festivals/drawer/edit_festivals_drawer.php') ?>
    <?php include('connect/copyrights.php'); ?>
    <?php include('connect/footer-script.php'); ?>
    <script>
        KTDrawer.createInstances();
        const add = document.querySelector("#add_festivals_drawer");
        const add_drawer = KTDrawer.getInstance(add);
        const edit = document.querySelector("#edit_festivals_drawer");
        const edit_drawer = KTDrawer.getInstance(edit);
        //-------------------------- GET DATA FOR EDIT----------------------------------------------------------
        function edit_data(id) {
            $('#overlay').fadeIn();
            edit_drawer.show()
            var param = encryptpost('get_festivals_html');
            var id = encryptpost(id);
            var requestData = {
                id,
                param
            };
            $.ajax({
                type: "POST",
                url: "controller/festivals/controller.php",
                data: requestData,
                success: function(response) {
                    $('.get_edit_data_html').html(response.message)
                    $('#overlay').fadeOut();
                }
            });
        }
        
        //-------------------------- ADD SUBMIT------------------------------------------------------------------

        $("#add_festivals_drawer_submit").validate({
            highlight: function(element) {
                $(element).addClass("error");
            },
            unhighlight: function(element) {
                $(element).removeClass("error");
            },
            submitHandler: function(form) {
                $('#overlay').fadeIn();

                // Create a FormData object to handle both form data and image
                var formData = new FormData(form);

                // Serialize the form data and encrypt it
                $(form).serializeArray().forEach(function(input) {
                    formData.set(input.name, encryptpost(input.value));
                });
                formData.append('param', encryptpost('add_festivals'));
                $.ajax({
                    type: "POST",
                    url: "controller/festivals/controller.php",
                    data: formData,
                    processData: false, // Prevent jQuery from processing the data
                    contentType: false, // Prevent jQuery from setting content type
                    success: function(response) {
                        $('#overlay').fadeOut();
                        $('#maketable').DataTable().ajax.reload(null, false);
                        add_drawer.hide();
                        showPopup(response.status, response.message);
                    }
                });
            },
        });




        //-------------------------- EDIT SUBMIT------------------------------------------------------------------
        $('#edit_festivals_drawer_submit').on('submit', function(event) {
            event.preventDefault();
            $('#overlay').fadeIn();
            // Create a FormData object to handle both form data and image
            var formDataWithImage = new FormData($('#edit_festivals_drawer_submit')[0]);
            // Serialize the form data and encrypt it
            var formData = $('#edit_festivals_drawer_submit').serializeArray();
            formData.forEach(function(input) {
                formDataWithImage.set(input.name, encryptpost(input.value));
            });
            formDataWithImage.append('param', encryptpost('update_festivals'));
            $.ajax({
                type: "POST",
                url: "controller/festivals/controller.php",
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




        function activeornotbtn(id) {
            var checkbox = $('.' + id); // Get the checkbox element by class name
            if (checkbox.length > 0) {
                var isChecked = checkbox.prop('checked'); // Get the current checked state
                checkbox.prop('checked', !isChecked); // Toggle the checkbox's checked state
                $('#overlay').fadeIn(); // Show an overlay indicating loading
                var param = encryptpost('festivals_active');
                var id = encryptpost(id);
                var requestData = {
                    id,
                    param,
                    isChecked: !isChecked
                };
                $.ajax({
                    type: "POST",
                    url: "controller/festivals/controller.php",
                    data: requestData,
                    success: function(response) {
                        $('#overlay').fadeOut(); // Hide the overlay
                        $('#maketable').DataTable().ajax.reload(null, false); // Reload the DataTable
                        showPopup(response.status, response.message); // Display a popup message
                    },
                    error: function(error) {
                        showPopup(response.status, error);
                    }
                });
            } else {
                showPopup('Network Issue !!', 'error');
            }
        }

        // ------------------------------------ FOR DATATABLE -----------------------------------------------------
        function rowCreationFunction(nRow, aData, iDataIndex) {
            var checked = aData[3] == '1' ? 'checked' : '';
            $('td:eq(3)', nRow).html(`
        <div class="toggle-button-switch">
            <div id="button-3" class="button r">
                <input ${checked} class="checkbox activeornot ${aData[6]}" onclick="activeornotbtn('${aData[6]}')" type="checkbox">
                <div class="knobs"></div>
                <div class="layer"></div>
            </div>
        </div>`);

            $('td:eq(6)', nRow).html(`
        <div class="d-flex align-items-center gap-4">
            <button type="button" class="edit-button" onclick="edit_data('${aData[6]}')">
                <img src="assets/images/edit.png" class="edit-svgIcon" />
            </button>
           
        </div>`);

        }
        // Initialize DataTable
        
        $(document).ready(function() {
            initializeDynamicDataTable('maketable', 'connect/listdata.php?show=<?php echo md5('festivals') ?>', 2, 1, rowCreationFunction);
        });
    </script>
  
    <?php include('connect/footer-end.php'); ?>