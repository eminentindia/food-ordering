<?php include('includes/header.php');  ?>

<?php
if (!isset($_SESSION['ATECHFOOD_USER']) && !isset($_SESSION['ATECHFOOD_USER_ID'])) {
    echo '<script>window.location.href="' . SITE_PATH . '";</script>';
}

$getuserdetail = getUserDetailsByid();
?>
<style>
.form-control[readonly] {
    background-color: #edffc7;
}


</style>
<body class="page-template belle">
    <?php include('includes/navbar.php') ?>
    <div id="page-content">
        <!--Page Title-->
        <div class="bredcrumbWrap">
            <div class="container breadcrumbs">
                <a href="index.html" title="Back to the home page">Home</a><span aria-hidden="true">›</span><span>Profile</span>
            </div>
        </div>
        <!--End Page Title-->
        <style>
            .profilehead {
                font-size: 1.2rem;
                text-transform: uppercase;
            }

            .profilehead span {
                color: #fd7d16 !important;
            }

            p {
                line-height: 25px;
            }
        </style>
        <div class="my-account-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <!-- My Account Page Start -->
                        <div class="myaccount-page-wrapper">
                            <!-- My Account Tab Menu Start -->
                            <div class="row">
                                <div class="col-lg-3 col-md-4">
                                    <div class="myaccount-tab-menu nav" role="tablist">
                                        <a href="#dashboad" class="active" data-toggle="tab"><i class="fa fa-dashboard"></i>
                                            Dashboard</a>
                                        <a href="#account-info" class="" data-toggle="tab"><i class="fa fa-user"></i> Account <span>Details</span></a>
                                        <a href="<?php echo SITE_PATH ?>orders"><i class="fa fa-cart-arrow-down"></i> Orders</a>

                                        <a href="<?php echo SITE_PATH ?>logout"><i class="fa fa-sign-out"></i> Logout</a>
                                    </div>
                                </div>
                                <!-- My Account Tab Menu End -->

                                <!-- My Account Tab Content Start -->
                                <div class="col-lg-9 col-md-8">
                                    <div class="tab-content" id="myaccountContent">
                                        <!-- Single Tab Content Start -->
                                        <div class="tab-pane fade show active" id="dashboad" role="tabpanel">
                                            <div class="myaccount-content">
                                                <h3>Dashboard</h3>
                                                <div class="welcome">
                                                    <p>Hello, <strong><?php echo $_SESSION['name'] ?></strong></p>
                                                </div>
                                                <p class="mb-0">From your account dashboard. you can easily check & view your recent orders, and edit your password and account details.</p>
                                                <!-- <strong>
                                                    Referral Code: <?php echo $getuserdetail['referral_code'] ?>
                                                </strong>
                                                <br>
                                                <strong>
                                                    Referral Link: <a href="<?php echo SITE_PATH ?>register?<?php echo $getuserdetail['referral_code'] ?>"><?php echo SITE_PATH ?>register?referral_code=<?php echo $getuserdetail['referral_code'] ?></a>
                                                </strong> -->
                                            </div>
                                        </div>

                                        <!-- Single Tab Content Start -->
                                        <div class="tab-pane fade" id="account-info" role="tabpanel">
                                            <div class="myaccount-content">
                                                <h4 class="profilehead">Account <span>Details</span></h4>
                                                <div class="account-details-form">
                                                    <form method="post" id="userform">
                                                        <div class="row mt-5">
                                                            <div class="col-lg-6">
                                                                <div class="single-input-item">
                                                                    <label for="name" class="required">Name</label>
                                                                    <input type="text" class="text-capatalize" id="name" name="name" placeholder="Name" value="<?php echo $getuserdetail['name'] ?>" />
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <div class="single-input-item">
                                                                    <label for="email" class="required">Email Addres</label>
                                                                    <input type="email" id="email" placeholder="Email Address" value="<?php if (isset($_SESSION['email'])) {
                                                                                                                                            echo $_SESSION['email'];
                                                                                                                                        } else {
                                                                                                                                            echo '';
                                                                                                                                        } ?>" <?php if (isset($_SESSION['email']) != '') {
                                                                                                                                                    echo "readonly";
                                                                                                                                                }

                                                                                                                                                ?> />
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 ">
                                                                <div class="single-input-item">
                                                                    <label for="Mobile" class="required">Mobile</label>
                                                                    <input type="text" class="text-capatalize form-control" id="mobile" name="mobile" readonly placeholder="Mobile" value="<?php echo $getuserdetail['mobile'] ?>" />
                                                                </div>
                                                            </div>


                                                            <div class="col-lg-6 ">
                                                                <div class="single-input-item">
                                                                    <label for="city" class="required">City</label>
                                                                    <input type="text" class="text-capatalize" id="city" placeholder="City" name="city" value="<?php echo $getuserdetail['city'] ?>" />
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-12 ">
                                                                <div class="single-input-item">
                                                                    <label for="address" class="required">Address</label>
                                                                    <input type="text" class="text-capatalize" id="address" placeholder="Address" name="address" value="<?php echo $getuserdetail['address'] ?>" />
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 ">
                                                                <div class="single-input-item">
                                                                    <label for="appartment" class="required">Appartment</label>
                                                                    <input type="text" class="text-capatalize" id="appartment" placeholder="Appartment" name="appartment" value="<?php echo $getuserdetail['appartment'] ?>" />
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-6 ">
                                                                <div class="single-input-item">
                                                                    <label for="postcode" class="required">Postcode</label>
                                                                    <input type="text" class="text-capatalize" id="postcode" placeholder="Postcode" name="postcode" value="<?php echo $getuserdetail['postcode'] ?>" />
                                                                </div>
                                                            </div>

                                                            <input type="hidden" name="profile" id="profile" value="profile">
                                                        </div>
                                                        <div class="pb-4">
                                                            <button type="button" class="p-2 pill badge badge-success " id="savepersonaldetail">Save Changes</button>
                                                            <span class="ml-5" style="    color: #8bc528;" id="successpersonaldetail"></span>
                                                        </div>
                                                    </form>
                                                    
                                                </div>
                                            </div>
                                        </div> <!-- Single Tab Content End -->
                                    </div>
                                </div> <!-- My Account Tab Content End -->
                            </div>
                        </div> <!-- My Account Page End -->
                    </div>
                </div>
            </div>
        </div>
        <!-- my account wrapper end -->


        <!--End Body Content-->

        <?php include('includes/loader.php');  ?>

        <?php include('includes/footer.php');  ?>
        <?php include('includes/scripts.php');  ?>
        <script>
           
            $('#savepersonaldetail').click(function(e) {
                e.preventDefault();
                var name = document.getElementById("name").value;
                var mobile = document.getElementById("mobile").value;
                var profile = document.getElementById("profile").value;
                document.getElementById("savepersonaldetail").innerHTML = "Please Wait..";

                $.ajax({
                    type: "post",
                    url: "action/user-profile-action.php",
                    data: $('#userform').serialize(),
                    success: function(response) {
                        document.getElementById("savepersonaldetail").innerHTML = "Save Changes";
                        var response = JSON.parse(response);
                        if (response.success == true) {
                            // Use SweetAlert for the success message with custom options
                            Swal.fire({
                                toast: true,
                                position: 'center',
                                icon: 'success',
                                title: 'Changes Saved!',
                                showConfirmButton: false,
                                timer: 1500 // You can adjust the duration of the toast
                            });
                            // Update the username
                            $("#foodusername").html(name);
                            // Delay and fade out the success message
                            $("#successpersonaldetail").delay(1500).fadeOut("slow");
                            get_pass_html()
                        }
                    }
                });
            });



            $(document).on('click', '#savenewpassword', function(e) {
                e.preventDefault();
                var new_password = document.getElementById("new_password1").value;
                var confirm_password = document.getElementById("confirm_password1").value;
                var pswchange = document.getElementById("pswchange").value;
                document.getElementById("savenewpassword").innerHTML = "Please Wait..";

                $.ajax({
                    type: "post",
                    url: "action/user-profile-action.php",
                    data: 'new_password=' + new_password + '&confirm_password=' + confirm_password + '&newpswchange=' + pswchange,

                    success: function(response) {
                        document.getElementById("savenewpassword").innerHTML = "Save Changes";
                        var response = JSON.parse(response);
                        if (response.success == true) {
                            // Use SweetAlert for the success message
                            Swal.fire({
                                toast: true,
                                position: 'center',
                                icon: 'success',
                                title: 'Password Changed!',
                                showConfirmButton: false,
                                timer: 1500 // You can adjust the duration of the toast
                            });
                            get_pass_html()

                        } else if (response.error == true) {
                            // Use SweetAlert for the error message
                            Swal.fire({
                                toast: true,
                                position: 'center',
                                icon: 'error',
                                title: 'Password Not Match!',
                                showConfirmButton: false,
                                timer: 1500 // You can adjust the duration of the toast
                            });

                        } else {
                            // Use SweetAlert for the error message
                            Swal.fire({
                                toast: true,
                                position: 'center',
                                icon: 'error',
                                title: 'Password Can not be empty!',
                                showConfirmButton: false,
                                timer: 1500 // You can adjust the duration of the toast
                            });

                        }
                    }
                });
            });


            $(document).on('click', '#savepassword', function(e) {

                e.preventDefault();
                var current_password = document.getElementById("current_password").value;
                var new_password = document.getElementById("new_password").value;
                var confirm_password = document.getElementById("confirm_password").value;
                var pswchange = document.getElementById("pswchange").value;
                document.getElementById("savepassword").innerHTML = "Please Wait..";

                $.ajax({
                    type: "post",
                    url: "action/user-profile-action.php",
                    data: 'current_password=' + current_password + '&new_password=' + new_password + '&confirm_password=' + confirm_password + '&pswchange=' + pswchange,

                    success: function(response) {
                        document.getElementById("savepassword").innerHTML = "Save Changes";
                        var response = JSON.parse(response);
                        if (response.success == true) {
                            // Use SweetAlert for the success message
                            Swal.fire({
                                toast: true,
                                position: 'center',
                                icon: 'success',
                                title: 'Password Changed!',
                                showConfirmButton: false,
                                timer: 1500 // You can adjust the duration of the toast
                            });

                        } else if (response.error == true) {
                            // Use SweetAlert for the error message
                            Swal.fire({
                                toast: true,
                                position: 'center',
                                icon: 'error',
                                title: 'Password Not Match!',
                                showConfirmButton: false,
                                timer: 1500 // You can adjust the duration of the toast
                            });

                        } else if (response.currenterror == true) {
                            // Use SweetAlert for the error message
                            Swal.fire({
                                toast: true,
                                position: 'center',
                                icon: 'error',
                                title: 'Please Enter Current Password!',
                                showConfirmButton: false,
                                timer: 1500 // You can adjust the duration of the toast
                            });
                        } else if (response.currentnoterror == true) {
                            // Use SweetAlert for the error message
                            Swal.fire({
                                toast: true,
                                position: 'center',
                                icon: 'error',
                                title: 'Current Password Not Match !',
                                showConfirmButton: false,
                                timer: 1500 // You can adjust the duration of the toast
                            });

                        }
                    }
                });
            });
        </script>

<script>
    $(selector).hover(function () {
            // over
            
        }, function () {
            // out
        }
    );
</script>

</body>

</html>