<?php
$page_title = "Subscriptions";
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
                 
                </div>
                <div class="card-body p-1">
                    <table id="maketable" class=" table display nowrap table-striped table-bordered" style="width: 100%;">
                        <thead>
                            <tr>
                            <th> <strong>S.No</strong></th>
                            <th> <strong>Email</strong></th>
                            <th> <strong>Added On</strong></th>
                            <th> <strong>Active</strong></th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </form>
        </div>
    </div>
    <?php include('controller/subscription/drawer/add_subscription_drawer.php') ?>
    <?php include('controller/subscription/drawer/edit_subscription_drawer.php') ?>
    <?php include('connect/copyrights.php'); ?>
    <?php include('connect/footer-script.php'); ?>
    <script>
        KTDrawer.createInstances();
        const add = document.querySelector("#add_subscription_drawer");
        const add_drawer = KTDrawer.getInstance(add);
        const edit = document.querySelector("#edit_subscription_drawer");
        const edit_drawer = KTDrawer.getInstance(edit);
        //-------------------------- GET DATA FOR EDIT----------------------------------------------------------
        function edit_data(id) {
            $('#overlay').fadeIn();
            edit_drawer.show()
            var param = encryptpost('get_subscription_html');
            var id = encryptpost(id);
            var requestData = {
                id,
                param
            };
            $.ajax({
                type: "POST",
                url: "controller/subscription/controller.php",
                data: requestData,
                success: function(response) {
                    $('.get_edit_data_html').html(response.message)
                    $('#overlay').fadeOut();
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
                    url: "controller/subscription/controller.php",
                    data: requestData,
                    success: function(response) {
                        $('#overlay').fadeOut();
                        showPopup(response.status, response.message)
                        $('#maketable').DataTable().ajax.reload(null, false);
                    }
                });
            });
        }
        //-------------------------- ADD SUBMIT------------------------------------------------------------------

        $("#add_subscription_drawer_submit").validate({
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
                formData.append('param', encryptpost('add_subscription'));
                $.ajax({
                    type: "POST",
                    url: "controller/subscription/controller.php",
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
        $('#edit_subscription_drawer_submit').on('submit', function(event) {
            event.preventDefault();
            $('#overlay').fadeIn();
            // Create a FormData object to handle both form data and image
            var formDataWithImage = new FormData($('#edit_subscription_drawer_submit')[0]);
            // Serialize the form data and encrypt it
            var formData = $('#edit_subscription_drawer_submit').serializeArray();
            formData.forEach(function(input) {
                formDataWithImage.set(input.name, encryptpost(input.value));
            });
            formDataWithImage.append('param', encryptpost('update_subscription'));
            $.ajax({
                type: "POST",
                url: "controller/subscription/controller.php",
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
                var param = encryptpost('subscription_active');
                var id = encryptpost(id);
                var requestData = {
                    id,
                    param,
                    isChecked: !isChecked
                };
                $.ajax({
                    type: "POST",
                    url: "controller/subscription/controller.php",
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
                <input ${checked} class="checkbox activeornot ${aData[4]}" onclick="activeornotbtn('${aData[4]}')" type="checkbox">
                <div class="knobs"></div>
                <div class="layer"></div>
            </div>
        </div>`);


        }
        // Initialize DataTable
     

        
        $(document).ready(function() {
            initializeDynamicDataTable('maketable', 'connect/listdata.php?show=<?php echo md5('subscription') ?>', 2, 1, rowCreationFunction);
        });
    </script>


    <script>
        $(document).ready(function() {
            $('#searchInput').on('input', function() {
                var searchTerm = $(this).val();
                performSearch(searchTerm);
            });
        });

        function performSearch(searchTerm) {
            $.ajax({
                url: 'controller/search.php', // Change this to your PHP file
                method: 'GET',
                data: {
                    q: searchTerm
                },
                success: function(response) {
                    displayResults(response);
                },
                error: function() {
                    console.error('Error occurred during the AJAX request');
                }
            });
        }

        function displayResults(results) {
            var searchResults = $('#searchResults');
            searchResults.empty();

            if (results.length > 0) {
                for (var i = 0; i < results.length; i++) {
                    searchResults.append('<p>' + results[i] + '</p>');
                }
            } else {
                searchResults.append('<p>No results found</p>');
            }
        }
    </script>
    <?php include('connect/footer-end.php'); ?>