<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delievery Boy Login</title>
    <link rel="stylesheet" href="./lib/themify-icon/themify-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/5.9.55/css/materialdesignicons.min.css" />
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
    <style>
        .error {
            background: #ec4b4b;
            padding: 1px 15px;
            color: white;
        }

        .success {
            background: #8cec4b;
            padding: 1px 15px;
            color: #214d0d;
        }
    </style>

</head>

<body class="bg-dark">

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
        <div class="auth-box bg-dark">
            <div id="loginform" style="margin-top: 100px; border: 1px white solid; padding: 50px; box-shadow: 1px 1px 10px white;">
                <div class="text-center pt-3 pb-3">
                    <span class="db" style="font-size: 1.5rem; color: #fdfdfd;font-weight: 800;">Delievery Boy Login</span>
                </div>
                <!-- Form -->
                <form class="form-horizontal mt-3" id="loginnowform" method="POST">
                    <div class="row pb-4">
                        <div class="col-12">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-success text-white h-100" id="basic-addon1"><i class="ti-mobile"></i></span>
                                </div>

                                <input type="text" class="form-control form-control-lg" placeholder="Mobile" id="loginmobile" name="loginmobile" required>

                            </div>
                            <p id="loginerrormobile" class="error">test</p>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-warning text-white h-100" id="basic-addon2"><i class="ti-pencil"></i></span>
                                </div>

                                <input type="password" placeholder="Password" id="loginpassword" name="loginpassword" class="form-control form-control-lg" required>

                            </div>
                            <p id="loginerrorpassword" class="error">test</p>

                        </div>
                    </div>
                    <div class="row border-top border-secondary">
                        <div class="col-12">
                            <div class="form-group">
                                <div class="pt-3 d-grid gap-2">
                                    <!-- <button class="btn btn-info" id="to-recover" type="button"><i class="fa fa-lock me-1"></i> Lost password?</button> -->

                                    <input type="submit" value="Login" class="btn btn-success float-end text-white" id="loginnow">
                                </div>

                            </div>
                            <p id="loginsuccess" class="success">test</p>
                            <p id="loginerrorfail" class="error">test</p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="./js/custom.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $("#loginerrormobile").hide();
        $("#loginerrorpassword").hide();
        $("#loginsuccess").hide();
        $("#loginerrorfail").hide();
        $("#loginnow").click(function(e) {
            e.preventDefault();
            var loginmobile = document.getElementById("loginmobile").value;
            var loginpassword = document.getElementById("loginpassword").value;

            if (loginmobile == "") {
                $("#loginerrormobile").html("Please Enter Your mobile");
                $("#loginerrormobile").show();
                $("#loginmobile").focus();
                $("#loginerrormobile").delay(4000).fadeOut("slow");
                return false;
            } else if (loginpassword == "") {
                $("#loginerrorpassword").html("Please Enter Password");
                $("#loginerrorpassword").show();
                $("#loginpassword").focus();
                $("#loginerrorpassword").delay(4000).fadeOut("slow");
                return false;
            } else {
                document.getElementById("loginnow").value = "Please Wait..";
                document.getElementById("loginnow").disabled = true;
                $.ajax({
                    type: "post",
                    url: "login_action.php",
                    data: $("#loginnowform").serialize(),

                    success: function(response) {
                        document.getElementById("loginnow").value = "Login";
                        document.getElementById("loginnow").disabled = false;

                        var response = JSON.parse(response);
                        if (response.invalidmobile == true) {
                            $("#loginerrormobile").html("Please Enter Valid mobile");
                            $("#loginerrormobile").show();
                            $("#loginmobile").focus();
                            $("#loginerrormobile").delay(4000).fadeOut("slow");
                            return false;
                        } else if (response.mobilenotfound == true) {
                            $("#loginerrormobile").html("mobile Not Found !");
                            $("#loginerrormobile").show();
                            $("#loginmobile").focus();
                            $("#loginerrormobile").delay(3000).fadeOut("slow");
                            return false;
                        } else if (response.passwordincorrect == true) {
                            $("#loginerrorpassword").html("Please Enter Valid Password !");
                            $("#loginerrorpassword").show();
                            $("#loginpassword").focus();
                            $("#loginerrorpassword").delay(3000).fadeOut("slow");
                            return false;
                        } else if (response.success == true) {
                            $("#loginsuccess").html("Login Successfull ! Redirecting ...");
                            $("#loginsuccess").show();
                            $("#loginsuccess").delay(6000).fadeOut("slow");
                            $("#loginnowform")[0].reset();
                            // window.location.reload();
                            setTimeout(function() {
                                window.location.href = "orders.php";
                            }, 2000);

                            // history.go(-1);
                        }
                    },
                });
            }
        });
    </script>


</body>

</html>