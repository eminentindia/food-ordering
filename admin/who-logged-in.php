<?php
$page_title = "Who Logged In";
include('connect/head.php'); ?>
<?php
include('connect/menu-nav.php'); ?>
<style>
    .table tbody {
        position: relative;
    }

    .table tbody::before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-image: url(assets/images/policybg.png);
        background-repeat: no-repeat;
        background-size: cover;
        opacity: 0.2;
    }

    @media (max-width: 767px) {
        .mobile-width-50 {
            width: 50%;
        }
    }
</style>
<div class="col-xl-12 p-0">
    <div class="card card-xl-stretch mb-xl-8">
        <div class="card-header  borderBottom1">
            <div class="card-title">
                <div class="d-flex align-items-center themeColor text-upper position-relative my-1">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="black">
                        <rect x="2" y="2" width="9" height="9" rx="2" fill="black"></rect>
                        <rect opacity="0.3" x="13" y="2" width="9" height="9" rx="2" fill="black"></rect>
                        <rect opacity="0.3" x="13" y="13" width="9" height="9" rx="2" fill="black"></rect>
                        <rect opacity="0.3" x="2" y="13" width="9" height="9" rx="2" fill="black"></rect>
                    </svg>&nbsp; <?php echo $page_title ?>
                </div>
            </div>
        </div>
    </div>
    <?php include('connect/loader/spinner2.php') ?>
    <div class=" row  policyHTML">

    </div>
</div>
<?php include('connect/modal/update_policy.php'); ?>
<?php include('connect/copyrights.php'); ?>
<?php include('connect/footer-script.php'); ?>
<script src="assets/js/dropzone.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
<script>
    function loginas($email) {
        $('#loginas').html('Please Wait... !!')
        $.ajax({
            type: "post",
            url: "connect/ajax/loginas.php",
            data: {
                email: $email
            },
            success: function(response) {
                $('#loginas').html('Please Wait... !!')
                if (response == 'done') {
                    window.location = "dashboard.php";
                } else {
                    alert('Something Went Wrong');
                }
            }
        });
    }

    function getpolicy(id) {
        $('.spinner-container').show();
        $.ajax({
            type: "post",
            url: "connect/ajax/get_who_logged_in_data.php",
            success: function(response) {
                $('.policyHTML').html(response)
                $('.spinner-container').fadeOut();
            }
        });
    }
    $(document).ready(function() {
        getpolicy();
    });

    function updatepolicy(id) {
        $('.spinner-container').show();
        $('#update_policy').modal('show');
        // var formdata=$('#updatepolicyform').serialize();
        $.ajax({
            type: "post",
            url: "connect/ajax/policy_form.php",
            data: {
                id: id
            },
            success: function(response) {
                $('.updatepolicyhtml').html(response)
                $('.spinner-container').fadeOut();

            }
        });

    }
    $(document).ready(function() {
        $('#updatepolicyform').validate({
            highlight: function(element) {
                $(element).addClass('error');
            },
            unhighlight: function(element) {
                $(element).removeClass('error');
            },
            submitHandler: function(form) {
                var formData = new FormData($('#updatepolicyform')[0]);
                $.ajax({
                    type: "POST",
                    url: "connect/ajax/update_policy.php",
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(result) {
                        $('#updatepolicyform')[0].reset();
                        $('#update_policy').modal('hide');
                        getpolicy();
                    }
                });
            }
        });
    });
</script>
<?php include('connect/footer-end.php'); ?>