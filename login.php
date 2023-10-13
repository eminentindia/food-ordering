<?php include('includes/header.php');  ?>
<?php
if (isset($_SESSION['ATECHFOOD_USER'])) {
    echo '<script>window.location.href="' . SITE_PATH . 'profile"</script>';
}
?>

<body class="page-template belle">
    <?php include('includes/navbar.php') ?>

    <!--Body Content-->
    <div id="page-content" style="background: url(images/illustrations/hero-header-bg.png);
    background-size: cover;
    background-position: revert;
    background-repeat: no-repeat;">
        <!--Page Title-->
        <div class="page section-header text-center m-0">
            <div class="page-title">
                <div class="wrapper">
                    <h1 class="page-width"><span>Login with</span> mobile number</h1>

                </div>
            </div>
        </div>
        <!--End Page Title-->


        <div class="col-12 col-sm-12 col-md-4 col-lg-4 main-col offset-md-4 mt-5 mb-5" style="padding: 20px; background: #f9f9f9;box-shadow: 0px 0px 20px rgb(0 0 0 / 11%);border: 1px solid #dbdada;
    -webkit-box-shadow: 0px 0px 20px rgb(0 0 0 / 11%);">
            <div class="mb-4">
                <form method="post" id="loginformwithmobile" class="contact-form">
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12">

                            <div class="phone-input">
                                <div class="flag-icon">
                                    <img src="<?php echo SITE_PATH ?>images/india.png" alt="Indian Flag">
                                    <span>+91 </span>
                                </div>
                                <input required type="tel" name="phone" placeholder="Enter Your Mobile No." id="loginmobile" autocorrect="off" autocapitalize="off" autofocus="on" style="margin-bottom: 0  !important;">
                            </div>
                            <div id="otpBOX">
                            </div>
                            <div id="invalidotp">
                            </div>
                        </div>
                    </div>
                    <div class="error_field"></div>
                    <input type="hidden" name="type" value="login">
                    <div class="row">
                        <div class="text-center col-12 col-sm-12 col-md-12 col-lg-12">
                            <div id="form_msg"></div>
                            <button type="submit" class="btn btn-block btn-success mb-3 text-center shadow-none w-100" id="sendotp">Send OTP</button>
                        </div>
                    </div>
                    <div class="prFeatures">
                        <div class="row mb-0 pb-0">
                            <div class="col-4 col-sm-4 col-md-4 col-lg-4 nowrap no-wrap feature">
                                <img src="<?php echo SITE_PATH ?>images/credit-card.png" alt="Safe Payment" title="Safe Payment" />
                                <div class="details">
                                    <h3>Safe Payment</h3>
                                </div>
                            </div>
                            <div class="col-4 col-sm-4 col-md-4 col-lg-4 nowrap no-wrap feature">
                                <img src="<?php echo SITE_PATH ?>images/worldwide.png" alt="Worldwide Delivery" title="Worldwide Delivery" />
                                <div class="details">
                                    <h3>Fast Delivery</h3>
                                </div>
                            </div>
                            <div class="col-4 col-sm-4 col-md-4 col-lg-4 nowrap no-wrap feature">
                                <img src="<?php echo SITE_PATH ?>images/phone-call.png" alt="Hotline" title="Hotline" style="width:35px" />
                                <div class="details">
                                    <h3>Hotline</h3> <?php echo $site_phone ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
    <!--End Body Content-->

    <?php include('includes/footer.php');  ?>
    <?php include('includes/scripts.php');  ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>

    <script src="<?php echo SITE_PATH ?>js/login-register.js"></script>

    <script>
        $(document).ready(function() {
            $("#loginformwithmobile").validate({
                rules: {
                    phone: {
                        required: true,
                        rangelength: [10, 10],
                        number: true,
                    },
                },
                highlight: function(element) {
                    $(element).addClass("error");
                },
                unhighlight: function(element) {
                    $(element).removeClass("error");
                },
                errorPlacement: function(error, element) {
                    // Do not show any error messages
                },
                submitHandler: function(form) {
                    var loginmobile = $("#loginmobile").val();
                    $('#sendotp').attr("disabled", true);
                    $('#sendotp').html("Please Wait...");
                    $.ajax({
                        type: "POST",
                        url: "action/send_login_otp.php",
                        data: {
                            phone: loginmobile
                        },
                        success: function(response) {
                            if (response.status === "success") {
                                $("#loginmobile").attr("disabled", true);
                                $('#sendotp').attr("disabled", false);
                                $('#sendotp').html("Send OTP");
                                $("#otpBOX").html(response.html);
                                $('#sendotp').hide();
                                OTPInput();
                                initializeResendButton();


                            } else {
                                $("#otpBOX").html(response.html);
                                OTPInput();
                                initializeResendButton();
                            }
                        }
                    });
                },
            });
        });

        function OTPInput() {
            const inputs = document.querySelectorAll("#otp > *[id]");
            for (let i = 0; i < inputs.length; i++) {
                inputs[i].addEventListener("input", function(event) {
                    const inputValue = event.data;
                    if (event.inputType === "deleteContentBackward" || event.key === "Backspace") {
                        if (inputValue === null || inputValue === "") {
                            if (i !== 0) {
                                inputs[i - 1].value = "";
                                inputs[i - 1].focus();
                            }
                        }
                    } else {
                        if (i === inputs.length - 1 && inputValue !== null && inputValue !== "") {
                            return true;
                        } else if (/^[0-9a-zA-Z]$/.test(inputValue)) {
                            inputs[i].value = inputValue;
                            if (i !== inputs.length - 1) inputs[i + 1].focus();
                        }
                    }
                });
                // Handle the Backspace key press separately
                inputs[i].addEventListener("keydown", function(event) {
                    if (event.key === "Backspace" && i !== 0 && inputs[i].value === "") {
                        inputs[i - 1].value = "";
                        inputs[i - 1].focus();
                    }
                });
            }
        }

        function initializeResendButton() {
            var count = 1;
            var resendButton = document.getElementById("ResendOTP");
            var countdown = 10;
            var resendTimer;

            function startTimer() {
                resendButton.setAttribute("disabled", "disabled");
                resendButton.innerHTML = "Resend (" + count + "/3)";

                countdown = 10;
                resendTimer = setInterval(function() {
                    countdown--;

                    if (countdown >= 0) {
                        var seconds = countdown;
                        resendButton.innerHTML =
                            "Resend (" + (seconds < 10 ? "0" : "") + seconds + ")";
                    } else {
                        clearInterval(resendTimer);
                        if (count < 3) {
                            resendButton.removeAttribute("disabled");
                            resendButton.innerHTML = "Resend";
                        } else {
                            resendButton.remove();
                        }
                    }
                }, 1000);
            }

            resendButton.addEventListener("click", function() {
                if (!resendButton.hasAttribute("disabled")) {
                    count++;
                    if (count <= 3) {
                        startTimer();
                        //box show (hit again)
                        codfunc();
                    }
                }
            });
            startTimer();
        }

        $(document).on("click", ".validatethis", function(e) {
            var loginmobile = $("#loginmobile").val();
            e.preventDefault();
            const inputs = document.querySelectorAll("#otp input");
            const numbers = [];
            inputs.forEach(function(input) {
                const value = parseInt(input.value);
                if (!isNaN(value)) {
                    numbers.push(value);
                }
            });
            const numberString = numbers.join("");

            $('.validatethis').prop("disabled", true).html("Please Wait...");
            $.ajax({
                type: "post",
                url: "action/validate_otp.php",
                data: {
                    numbers: numberString,
                    loginmobile: loginmobile
                },
                success: function(response) {
                    if (response.trim() == "success") {
                        var success_html =
                            '<div class="alert alert-success d-flex align-items-center" role="alert"><div>OTP VALIDATED SUCCESSFULLY !!</div></div>';
                        $("#otpBOX").html(success_html);
                        location.reload();
                    } else {
                        var fail_html =
                            '<div class="alert alert-warning d-flex align-items-center" role="alert"><div>INVALID OTP !!</div></div>';
                        $("#invalidotp").html(fail_html);
                    }
                },
                complete: function() {
                    $('.validatethis').prop("disabled", false).html("Continue");
                }
            });

        });
    </script>
</body>

</html>