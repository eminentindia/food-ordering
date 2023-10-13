<?php
session_start();
include('controller/common-controller.php');

$getsetting = getsetting($conn);
$getsetting = json_decode($getsetting, true);
foreach ($getsetting as $getsinglesetting) {
	extract($getsinglesetting);
}
if (isset($_SESSION['ADMIN_LOGIN_ID']) and $_SESSION['admin_mobile'] and $_SESSION['admin_status'] == '1'   and $_SESSION['OTP'] != "") { ?>
	<!DOCTYPE html>
	<html lang="en">

	<head>
		<title>Authentication - Eminent India Private Limited</title>
		<meta name="description" content="Our organization adherence to laws, regulations, guidelines & specifications relevant to its business. Violations of compliance regulations often result in legal punishment, including federal fines." />
		<meta name="keywords" content="Administrator Dashboard | Employee Dashboard | License Portal | Payment Portal | Client Portal" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta charset="utf-8" />
		<meta property="og:locale" content="en_US" />
		<meta property="og:type" content="article" />
		<meta property="og:title" content="EIPL License Portal - Authentication Page | Eminent India Private Limited" />
		<meta property="og:url" content="https://eminent-india.com" />
		<meta property="og:site_name" content="Eminent India | License Portal" />
		<link rel="canonical" href="https://eminentcompliance.com/login/" />
		<link rel="shortcut icon" href="assets/images/favicon.ico" />
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
		<link href="assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
		<link href="assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
		<script type="text/javascript">
			function preventBack() {
				window.history.forward();
			}
			setTimeout("preventBack()", 0);
			window.onunload = function() {
				null
			};
		</script>
		<style>
			input::-webkit-outer-spin-button,
			input::-webkit-inner-spin-button {
				-webkit-appearance: none;
				margin: 0;
			}

			/* Firefox */
			input[type=number] {
				-moz-appearance: textfield;
			}

			@media only screen and (max-width: 600px) {
				.h-60px {
					height: 40px !important;
				}

				.w-60px {
					width: 40px !important;
				}

				.flex-stack {

					flex-wrap: nowrap !important;
				}
			}
		</style>
	</head>

	<body id="kt_body" class="bg-body">
		<div class="d-flex flex-column flex-root">
			<div class="d-flex flex-column flex-lg-row flex-column-fluid">
				<div class="d-none d-lg-flex flex-column flex-lg-row-auto w-xl-600px positon-xl-relative" style="background: url(assets/media/login-bg.png); background-size: cover;">
					<div class="d-flex flex-column position-xl-fixed top-0 bottom-0 w-xl-600px scroll-y">
						<div class="d-flex flex-row-fluid flex-column text-center p-10 pt-lg-20">
							<a href="htt" class="py-9 mb-5">
							<img alt="Logo" src="<?php echo $logo ?>" class="img-fluid" />

							</a>
						</div>
					</div>
				</div>
				<div class="d-flex flex-column flex-lg-row-fluid py-10">
					<div class="d-flex flex-center flex-column flex-column-fluid">
						<div class="w-lg-600px p-10 p-lg-15 mx-auto">
							<form class="form w-100 mb-10" novalidate="novalidate" method="POST" action="process.php" id="kt_sing_in_two_steps_form">
								<div class="text-center mb-10">
									<img alt="Logo" class="mh-125px" src="assets/media/svg/misc/smartphone.svg" />
								</div>
								<div class="text-center mb-10">
									<h1 class="text-dark mb-3">Two Step Verification</h1>
									<?php echo $_SESSION['OTP'] ?>
									<div class="text-muted fw-bold fs-5 mb-5">Enter the verification code we sent to</div>
									<div class="fw-bolder text-dark fs-3">+91 XXXXXX<?php echo substr($_SESSION['admin_mobile'], -4); ?></div>
								</div>
								<div class="mb-10 px-md-10">
									<div class="fw-bolder text-start text-dark fs-6 mb-1 ms-1">Type your 6 digit security code</div>
									<!-- <div class="d-flex flex-wrap flex-stack"> -->
									<div class="otp-input-fields d-flex flex-wrap flex-stack">
										<input type="number" maxlength="1" name="otp1" class="otp__digit otp__field__1 form-control form-control-solid h-60px w-60px fs-2qx text-center border-primary border-hover mx-1 my-2">
										<input type="number" maxlength="1" name="otp2" class="otp__digit otp__field__2 form-control form-control-solid h-60px w-60px fs-2qx text-center border-primary border-hover mx-1 my-2">
										<input type="number" maxlength="1" name="otp3" class="otp__digit otp__field__3 form-control form-control-solid h-60px w-60px fs-2qx text-center border-primary border-hover mx-1 my-2">
										<input type="number" maxlength="1" name="otp4" class="otp__digit otp__field__4 form-control form-control-solid h-60px w-60px fs-2qx text-center border-primary border-hover mx-1 my-2">
										<input type="number" maxlength="1" name="otp5" class="otp__digit otp__field__5 form-control form-control-solid h-60px w-60px fs-2qx text-center border-primary border-hover mx-1 my-2">
										<input type="number" maxlength="1" name="otp6" class="otp__digit otp__field__6 form-control form-control-solid h-60px w-60px fs-2qx text-center border-primary border-hover mx-1 my-2">
									</div>
									<!-- </div> -->
								</div>
								<div class="d-none flex-center">
									<button type="submit" id="kt_sing_in_two_steps_submit" class="btn btn-lg btn-primary fw-bolder">
										<span class="indicator-label">Submit OTP</span>
										<span class="indicator-progress">Please wait...
											<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
									</button>
								</div>
							</form>

						</div>
					</div>
					<div class="d-flex flex-center flex-wrap fs-6 p-5 pb-0">
						<div class="d-flex flex-center fw-bold fs-6">
							<a class="text-danger text-hover-primary px-2">Don't share your OTP with anyone.</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<script>
			var hostUrl = "assets/";
		</script>
		<script src="assets/plugins/global/plugins.bundle.js"></script>
		<script src="assets/js/scripts.bundle.js"></script>
		<script src="assets/js/custom/authentication/sign-in/two-steps.js"></script>


		<script>
			var otp_inputs = document.querySelectorAll(".otp__digit")

			var mykey = "0123456789".split("")
			otp_inputs.forEach((_) => {
				_.addEventListener("keyup", handle_next_input)
			})

			function handle_next_input(event) {
				let current = event.target
				let index = parseInt(current.classList[1].split("__")[2])
				current.value = event.key

				if (event.keyCode == 8 && index > 1) {
					current.previousElementSibling.focus()
				}
				if (index < 6 && mykey.indexOf("" + event.key + "") != -1) {
					var next = current.nextElementSibling;
					next.focus()
				}

				if (index == 6) {

					document.getElementById('kt_sing_in_two_steps_form').submit();

				}


				var _finalKey = ""

				for (let {
						value
					}
					of otp_inputs) {
					_finalKey += value
				}

			}
		</script>
	</body>

	</html><?php } else {
			header('location:404.html');
		} ?>