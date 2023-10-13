<?php
session_start();
if ((isset($_SESSION['ADMIN_LOGIN_ID'])) && (isset($_SESSION['ADMIN_EMAIL']))) {
    echo '<script>window.location.href="admin-dashboard.php";</script>';
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="./lib/themify-icon/themify-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/5.9.55/css/materialdesignicons.min.css" />
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
    <style>
        .error {
            background: #ff7b7b;
            padding: 1px 15px;
            color: white;
            border-top: 2px solid #ec2121;
            font-size: 12px;
        }
        .success {
            background: #8cec4b;
            padding: 1px 15px;
            color: #214d0d;
            border-top: 2px solid #214d0d;
            font-size: 12px;
        }
    </style>

</head>

<body class="bg-light">

    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
        <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
        </symbol>
        <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
            <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z" />
        </symbol>
        <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
            <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
        </symbol>
    </svg>

    <div class="auth-wrapper d-flex no-block justify-content-center align-items-center ">
        <div class="auth-box bg-light">
            <div id="loginform" style="margin-top: 100px;
border: 1px #b7b7b7 solid;
padding: 50px;
box-shadow: 10px 10px 50px #dfdfdf;">
                <div class="text-center pt-3 pb-3">
                    <span class="db" style="font-size: 1.5rem; font-weight: 800;">Admin Login</span>
                </div>
                <!-- Form -->
                <form class="form-horizontal mt-3" id="loginnowform" method="POST">
                    <div class="row pb-2">
                        <div class="col-12">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text text-white h-100" id="basic-addon1" style="background-color: #769f30 !important;"><i class="ti-email"></i></span>
                                </div>

                                <input type="text" class="form-control form-control-lg infield" placeholder="Email Address" id="loginemail" name="loginemail" required>

                            </div>
                            <p id="loginerroremail" class="error"></p>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-warning text-white h-100" id="basic-addon2"><i class="ti-pencil"></i></span>
                                </div>

                                <input type="password" placeholder="Password" id="loginpassword" name="loginpassword" class="form-control form-control-lg infield" required>

                            </div>
                            <p id="loginerrorpassword" class="error"></p>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <div class="d-grid gap-2">
                                    <input type="submit" value="Login" class="btn btn-success float-end text-white disabled" id="loginnow">
                                </div>

                            </div>

                            <p id="loginerrorfail" class="error"></p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="./js/custom.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script>
        $(function() {
            $('.infield').keyup(function() {
                var empty = false;
                $('.infield').each(function() {
                    if ($(this).val() == '') {
                        empty = true;
                    }
                });
                if (empty) {
                    $('#loginnow').attr('disabled', 'disabled');
                } else {
                    $('#loginnow').removeAttr('disabled').addClass('btn-success').removeClass('disabled');
                }
            })
        })
    </script>
    <script>
        $("#loginerroremail").hide();
        $("#loginerrorpassword").hide();
        $("#loginerrorfail").hide();
        $("#loginnow").click(function(e) {
            e.preventDefault();
            var loginemail = document.getElementById("loginemail").value;
            var loginpassword = document.getElementById("loginpassword").value;
            if (loginemail == "") {
                $("#loginerroremail").html("Please Enter Your Email !");
                $("#loginerroremail").show();
                $("#loginemail").focus();
                $("#loginerroremail").delay(4000).fadeOut("slow");
                return false;
            } else if (loginpassword == "") {
                $("#loginerrorpassword").html("Please Enter Password !");
                $("#loginerrorpassword").show();
                $("#loginpassword").focus();
                $("#loginerrorpassword").delay(4000).fadeOut("slow");
                return false;
            } else {
                document.getElementById("loginnow").value = "Please Wait...";
                document.getElementById("loginnow").disabled = true;
                $.ajax({
                    type: "post",
                    url: "login_action.php",
                    data: $("#loginnowform").serialize(),

                    success: function(response) {
                        document.getElementById("loginnow").value = "Login";
                        document.getElementById("loginnow").disabled = false;
                        var response = JSON.parse(response);
                        if (response.invalidemail == true) {
                            $("#loginerroremail").html("Please Enter Valid Email !");
                            $("#loginerroremail").show();
                            $("#loginemail").focus();
                            $("#loginerroremail").delay(2000).fadeOut("slow");
                            return false;
                        } else if (response.emailnotfound == true) {
                            $("#loginerroremail").html("Email Not Found !");
                            $("#loginerroremail").show();
                            $("#loginemail").focus();
                            $("#loginerroremail").delay(3000).fadeOut("slow");
                            return false;
                        } else if (response.passwordincorrect == true) {
                            $("#loginerrorpassword").html("Please Enter Valid Password !");
                            $("#loginerrorpassword").show();
                            $("#loginpassword").focus();
                            $("#loginerrorpassword").delay(2000).fadeOut("slow");
                            return false;
                        } else if (response.success == '1' || response.success == '2') {
                            $("#loginnowform")[0].reset();
                            setTimeout(function() {
                                window.location.href = "order/orders.php";
                            }, 1000);
                        }
                        else if (response.success == '0' || response.success == '100') {
                            $("#loginnowform")[0].reset();
                            setTimeout(function() {
                                window.location.href = "admin-dashboard.php";
                            }, 1000);
                        }
                    },
                });
            }
        });
    </script>

</body>

</html>