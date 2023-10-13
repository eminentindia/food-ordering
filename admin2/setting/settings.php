<?php require("../includes/top.php"); ?>
<?php
include('../controller/common-controller.php');
include('controller/setting-controller.php');
$conn = _connectodb();


$getsetting = getsetting($conn);
$getsetting = json_decode($getsetting, true);
foreach ($getsetting as $getsinglesetting) {
    extract($getsinglesetting);
}


include('../controller/constant.inc.php');
$website_close_arr = array('No', 'Yes');
?>

<?php include('../includes/header.php'); ?>
<?php include('../includes/sidebar.php'); ?>
<div class="page-wrapper">
    <link rel="stylesheet" href="<?php echo ADMIN_SITE_PATH ?>css/color-picker.css">
    <style>
        .card {
    margin-bottom: 20px;
    border: 1px solid #bdbdbd;
    background: #f9f9f9;
}
        .square .clr-field button,
        .circle .clr-field button {
            width: 22px;
            height: 22px;
            left: 5px;
            right: auto;
            border-radius: 5px;
        }

        .square .clr-field input,
        .circle .clr-field input {
            padding-left: 36px;
        }

        .circle .clr-field button {
            border-radius: 50%;
        }

        .toggle-password {
            float: right;
            margin-top: -25px;
            margin-right: 10px;
            z-index: 99999;
            cursor: pointer;
            position: relative;
        }
    </style>
    <!-- Bread crumb and right sidebar toggle -->

    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Settings</h4>
                <div class="ms-auto text-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo ADMIN_SITE_PATH; ?>admin-dashboard.php"><i class="mdi mdi-home"></i></a></li>

                            <li class="breadcrumb-item active" aria-current="page">Settings</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- End Bread crumb and right sidebar toggle -->
    <div class="container-fluid">
        <!-- -------------Content Here------------- -->
        <div class="row">

            <div class="col-md-6">
                <div class="card">
                    <form id="basicupdatefrm" method="POST" enctype="multipart/form-data">
                        <div class="card-body">
                            <h4 class="mb-3">Basic</h4>
                            <input type="hidden" name="ID" value="<?php echo $setting_id; ?>">
                            <div class="form-group row">
                                <label for="website_path" class="col-sm-3  control-label col-form-label">Website Path </label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="website_path" id="website_path" value="<?php echo $website_path; ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="fname" class="col-sm-3  control-label col-form-label">Cart Min Price </label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="cart_min_price" id="cart_min_price" value="<?php echo $cart_min_price; ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="fname" class="col-sm-3  control-label col-form-label">Cart Min Price Msg</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="cart_min_price_msg" id="cart_min_price_msg" value="<?php echo $cart_min_price_msg; ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="fname" class="col-sm-3  control-label col-form-label">Website Close</label>
                                <div class="col-sm-9">
                                    <select class="form-control" name="website_close" id="website_close">
                                        <?php foreach ($website_close_arr as $key => $val) {
                                            if ($website_close == $key) {
                                                echo "<option value='$key' selected>$val</option>";
                                            } else {
                                                echo "<option value='$key'>$val</option>";
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="fname" class="col-sm-3  control-label col-form-label">Website Close Msg</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="website_close_msg" id="website_close_msg" value="<?php echo $website_close_msg; ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="fname" class="col-sm-3  control-label col-form-label">Wallet Amount</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="wallet_amount" id="wallet_amount" value="<?php echo $wallet_amount; ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="fname" class="col-sm-3  control-label col-form-label">Referral Amount</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="referral_amount" id="referral_amount" value="<?php echo $referral_amount; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="border-top">
                            <div class="card-body">


                                <?php
                                if ($_SESSION['ADMIN_ROLE'] == 'super') {
                                ?>
                                    <button type="button" id="basicupdate" class="btn btn-primary waves-effect waves-dark shadow-none">Update</button>
                                    <span id="basicsuccess" class="mt-3 p-5 text-success"></span>
                                <?php } else {
                                ?>
                                    <button type="button" onclick="rolecheck()" class="btn btn-primary waves-effect waves-dark shadow-none">Update</button>
                                <?php } ?>

                            </div>
                        </div>
                    </form>
                </div>

                <!-- -----------new------------  -->
                <div class="card">
                    <form id="contactupdatefrm" action="action/update-setting.php" method="POST" enctype="multipart/form-data">
                        <div class="card-body">
                            <h4 class="mb-3">Contact</h4>
                            <input type="hidden" name="ID" value="<?php echo $setting_id; ?>">
                            <div class="form-group row">
                                <label for="fname" class="col-sm-3  control-label col-form-label">Address </label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="site_address" id="site_address" value="<?php echo $site_address; ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="fname" class="col-sm-3  control-label col-form-label">Phone</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="site_phone" id="site_phone" value="<?php echo $site_phone; ?>">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="fname" class="col-sm-3  control-label col-form-label"> Email</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="site_email" id="site_email" value="<?php echo $site_email; ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="fname" class="col-sm-3  control-label col-form-label"> Opening Hours</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="opening_hours" id="opening_hours" value="<?php echo $opening_hours; ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="fname" class="col-sm-3  control-label col-form-label"> Tagline</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="tagline" id="tagline" value="<?php echo $tagline; ?>">
                                </div>
                            </div>

                        </div>
                        <div class="border-top">
                            <div class="card-body">


                                <?php
                                if ($_SESSION['ADMIN_ROLE'] == 'super') {
                                ?>
                                    <button type="button" id="contactupdate" class="btn btn-primary waves-effect waves-dark shadow-none">Update</button>
                                    <span id="contactsuccess" class="mt-3 p-5 text-success"></span>
                                <?php } else {
                                ?>
                                    <button type="button" onclick="rolecheck()" class="btn btn-primary waves-effect waves-dark shadow-none">Update</button>
                                <?php } ?>


                            </div>
                        </div>
                    </form>
                </div>
                <!-- ------new----------  -->

                <div class="card">
                    <form id="socialmediafrm" method="POST" enctype="multipart/form-data">
                        <div class="card-body">
                            <h4 class="mb-3">Social Media</h4>
                            <input type="hidden" name="ID" value="<?php echo $setting_id; ?>">
                            <div class="form-group row">
                                <label for="fname" class="col-sm-3  control-label col-form-label"><i class="fab fa-instagram"></i> Instagram </label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="instagram" id="instagram" value="<?php echo $instagram; ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="fname" class="col-sm-3  control-label col-form-label"><i class="fab fa-facebook"></i> Facebook</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="facebook" id="facebook" value="<?php echo $facebook; ?>">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="fname" class="col-sm-3  control-label col-form-label"><i class="fab fa-twitter"></i> Twitter</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="twitter" id="twitter" value="<?php echo $twitter; ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="fname" class="col-sm-3  control-label col-form-label"><i class="fab fa-youtube"></i> Youtube</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="youtube" id="youtube" value="<?php echo $youtube; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="border-top">
                            <div class="card-body">


                                <?php
                                if ($_SESSION['ADMIN_ROLE'] == 'super') {
                                ?>
                                    <button type="button" id="socialmediaupdate" class="btn btn-primary waves-effect waves-dark shadow-none">Update</button>
                                    <span id="socialsuccess" class="mt-3 p-5 text-success"></span>
                                <?php } else {
                                ?>
                                    <button type="button" onclick="rolecheck()" class="btn btn-primary waves-effect waves-dark shadow-none">Update</button>
                                <?php } ?>



                            </div>


                        </div>

                    </form>

                </div>



            </div>
            <div class="col-md-6">
                <div class="card">
                    <form action="action/update-logo.php" method="POST" enctype="multipart/form-data">
                        <div class="card-body">
                            <h4 class="mb-3">Website Logo</h4>

                            <div class="form-group row">
                                <label for="fname" class="col-sm-3  control-label col-form-label"> Logo </label>

                                <div class="col-sm-9">
                                    <input type="hidden" name="oldlogo" value="<?php echo $logo ?>">
                                    <input type="file" class="form-control" name="logo" id="logo">
                                    <img src="<?php echo SITE_PATH ?>images/logo/<?php echo $logo ?>" alt="logo" width="200px">
                                </div>
                            </div>

                        </div>
                        <div class="border-top">
                            <div class="card-body">

                                <?php
                                if ($_SESSION['ADMIN_ROLE'] == 'super') {
                                ?>
                                    <button type="submit" class="btn btn-primary waves-effect waves-dark shadow-none">Update</button>
                                    <span id="socialsuccess" class="mt-3 p-5 text-success"></span>
                                <?php } else {
                                ?>
                                    <button type="button" onclick="rolecheck()" class="btn btn-primary waves-effect waves-dark shadow-none">Update</button>
                                <?php } ?>


                            </div>
                        </div>

                    </form>

                </div>
                <!-- --------new ---------  -->
                <div class="card">
                    <form action="action/update-fav.php" method="POST" enctype="multipart/form-data">
                        <div class="card-body">
                            <h4 class="mb-3">Favicon</h4>

                            <div class="form-group row">
                                <label for="fname" class="col-sm-3  control-label col-form-label"> Icon </label>

                                <div class="col-sm-9">
                                    <input type="hidden" name="oldfav" value="<?php echo $fav ?>">
                                    <input type="file" class="form-control" name="fav" id="fav">
                                    <img src="<?php echo SITE_PATH ?>images/<?php echo $fav ?>" alt="fav" width="60px">
                                </div>
                            </div>

                        </div>
                        <div class="border-top">
                            <div class="card-body">


                                <?php
                                if ($_SESSION['ADMIN_ROLE'] == 'super') {
                                ?>
                                    <button type="submit" class="btn btn-primary waves-effect waves-dark shadow-none">Update</button>
                                    <span id="colorsuccess" class="mt-3 p-5 text-success"></span>
                                <?php } else {
                                ?>
                                    <button type="button" onclick="rolecheck()" class="btn btn-primary waves-effect waves-dark shadow-none">Update</button>
                                <?php } ?>
                            </div>
                        </div>

                    </form>

                </div>
                <!-- --------new ---------  -->

                <div class="card">
                    <form id="colorupdatefrm" method="POST" enctype="multipart/form-data">
                        <div class="card-body">
                            <h4 class="mb-3">Theme </h4>
                            <div class="form-group row">

                            </div>
                            <div class="form-group row">
                                <label for="themecolor" class="col-sm-3  control-label col-form-label">Theme Color </label>
                                <div class="col-sm-9">
                                    <div class="example circle">
                                        <input type="text" class="coloris form-control" name="themecolor" id="themecolor" value="<?php echo $themecolor; ?>">
                                    </div>

                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="mainbtn" class="col-sm-3  control-label col-form-label">Main Button</label>
                                <div class="col-sm-9">
                                    <div class="example circle">
                                        <input type="text" class="coloris form-control" name="mainbtn" id="mainbtn" value="<?php echo $mainbtn; ?>">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="secondarybtn" class="col-sm-3  control-label col-form-label"> Secondary Button</label>
                                <div class="col-sm-9">
                                    <div class="example circle">
                                        <input type="text" class="coloris form-control" name="secondarybtn" id="secondarybtn" value="<?php echo $secondarybtn; ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="secondarybtn" class="col-sm-3  control-label col-form-label"> Mobile Nav</label>
                                <div class="col-sm-9">
                                    <div class="example circle">
                                        <input type="text" class="coloris form-control" name="mobilenav" id="mobilenav" value="<?php echo $mobilenav; ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="secondarybtn" class="col-sm-3  control-label col-form-label"> Mobile Nav Dropdown</label>
                                <div class="col-sm-9">
                                    <div class="example circle">
                                        <input type="text" class="coloris form-control" name="mobilenavlight" id="mobilenavlight" value="<?php echo $mobilenavlight; ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="secondarybtn" class="col-sm-3  control-label col-form-label"> Mobile Nav Text</label>
                                <div class="col-sm-9">
                                    <div class="example circle">
                                        <input type="text" class="coloris form-control" name="mobilenavtxt" id="mobilenavtxt" value="<?php echo $mobilenavtxt; ?>">
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="border-top">
                            <div class="card-body">
                                <?php
                                if ($_SESSION['ADMIN_ROLE'] == 'super') {
                                ?>
                                    <button type="button" id="colorupdate" class="btn btn-primary waves-effect waves-dark shadow-none">Update</button>
                                    <span id="colorsuccess" class="mt-3 p-5 text-success"></span>
                                <?php } else {
                                ?>
                                    <button type="button" onclick="rolecheck()" class="btn btn-primary waves-effect waves-dark shadow-none">Update</button>
                                <?php } ?>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- --------new ---------  -->
                <?php
                if ($_SESSION['ADMIN_ROLE'] == 'super') {
                ?>
                    <div class="card">
                        <form id="smtpfrm" method="POST" enctype="multipart/form-data">
                            <div class="card-body">
                                <h4 class="mb-3">SMTP</h4>
                                <input type="hidden" name="ID" value="<?php echo $setting_id; ?>">
                                <div class="form-group row">
                                    <label for="fname" class="col-sm-3  control-label col-form-label"> SMTP Email </label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="smtp_email" id="smtp_email" value="<?php echo $smtp_email; ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="fname" class="col-sm-3  control-label col-form-label">SMTP Password</label>
                                    <div class="col-sm-9">
                                        <input type="password" class="form-control" name="smtp_password" id="password-field" value="<?php echo $smtp_password; ?>">

                                        <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                                    </div>

                                </div>
                            </div>
                            <div class="border-top">
                                <div class="card-body">
                                    <button type="button" id="smtpupdate" class="btn btn-primary waves-effect waves-dark shadow-none">Update</button>
                                    <span id="smtpsuccess" class="mt-3 p-5 text-success"></span>
                                </div>
                            </div>

                        </form>
                    </div>

                <?php } ?>
                <!-- -----------new-----------  -->
            </div>
        </div>
    </div>
    <!-- ------------------------------------------------>
</div>
<script>
    $("#socialmediaupdate").click(function(e) {
        e.preventDefault();
        $.ajax({
            type: "post",
            url: "action/update-social-media.php",
            data: $('#socialmediafrm').serialize(),
            success: function(response) {
                var response = JSON.parse(response);
                if (response.success == true) {
                    $("#socialsuccess").html("Social Media Link Updated !");
                    $("#socialsuccess").show();
                    $("#socialsuccess").focus();
                    $("#socialsuccess").delay(4000).fadeOut("slow");
                    return false;
                }
            }
        });
    });
</script>
<script>
    $("#smtpupdate").click(function(e) {
        e.preventDefault();
        $.ajax({
            type: "post",
            url: "action/smtp-update.php",
            data: $('#smtpfrm').serialize(),
            success: function(response) {
                var response = JSON.parse(response);
                if (response.success == true) {
                    $("#smtpsuccess").html("SMTP Details Updated !");
                    $("#smtpsuccess").show();
                    $("#smtpsuccess").focus();
                    $("#smtpsuccess").delay(4000).fadeOut("slow");
                    return false;
                }
            }
        });
    });
</script>
<script>
    $("#contactupdate").click(function(e) {
        e.preventDefault();
        $.ajax({
            type: "post",
            url: "action/update-contact.php",
            data: $('#contactupdatefrm').serialize(),
            success: function(response) {
                var response = JSON.parse(response);
                if (response.success == true) {
                    $("#contactsuccess").html("Contact Information Updated !");
                    $("#contactsuccess").show();
                    $("#contactsuccess").focus();
                    $("#contactsuccess").delay(4000).fadeOut("slow");
                    return false;
                }
            }
        });
    });
</script>
<script>
    $("#colorupdate").click(function(e) {
        e.preventDefault();
        $.ajax({
            type: "post",
            url: "action/update-color.php",
            data: $('#colorupdatefrm').serialize(),
            success: function(response) {
                var response = JSON.parse(response);
                if (response.success == true) {

                    $("#colorsuccess").html("Theme Updated !");
                    $("#colorsuccess").show();
                    $("#colorsuccess").focus();
                    $("#colorsuccess").delay(4000).fadeOut("slow");
                    return false;
                }
            }
        });
    });
</script>
<script>
    $("#basicupdate").click(function(e) {
        e.preventDefault();
        $.ajax({
            type: "post",
            url: "action/basic-update.php",
            data: $('#basicupdatefrm').serialize(),
            success: function(response) {
                var response = JSON.parse(response);
                if (response.success == true) {
                    $("#basicsuccess").html("Basic Information Updated !");
                    $("#basicsuccess").show();
                    $("#basicsuccess").focus();
                    $("#basicsuccess").delay(4000).fadeOut("slow");
                    return false;
                }
            }
        });
    });
</script>
<?php include('../includes/footer.php'); ?>
<script>
    $(".toggle-password").click(function() {

        $(this).toggleClass("fa-eye fa-eye-slash");
        var input = $($(this).attr("toggle"));
        if (input.attr("type") == "password") {
            input.attr("type", "text");
        } else {
            input.attr("type", "password");
        }
    });
</script>

<script type="text/javascript" src="<?php echo ADMIN_SITE_PATH ?>js/color-picker.js"></script>
<script type="text/javascript">
    Coloris({
        el: '.coloris',
        swatches: [
            '#264653',
            '#2a9d8f',
            '#e9c46a',
            '#f4a261',
            '#e76f51',
            '#d62828',
            '#023e8a',
            '#0077b6',
            '#0096c7',
            '#00b4d8',
            '#48cae4'
        ]
    });
</script>