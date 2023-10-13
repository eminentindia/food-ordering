<?php
include('config.php');

include('controller/common-controller.php');

$getsetting = getsetting($conn);
$getsetting = json_decode($getsetting, true);
foreach ($getsetting as $getsinglesetting) {
	extract($getsinglesetting);
}

$login_button = '';
if (isset($_GET["code"])) {
	$token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);
	if (!isset($token['error'])) {
		session_start();
		$google_client->setAccessToken($token['access_token']);
		$_SESSION['access_token'] = $token['access_token'];
		$google_service = new Google_Service_Oauth2($google_client);
		$data = $google_service->userinfo->get();
		if (!empty($data['email'])) {
			$email = $data['email'];
			include_once('connect/connection.php');
			$sql = "SELECT * FROM admin WHERE admin_email='$email'";
			$result = $conn->query($sql);
			if ($result->num_rows > 0) {
				while ($row = $result->fetch_assoc()) {
					$_SESSION['ADMIN_LOGIN_ID'] = $row['id'];
					$_SESSION['admin_email'] = $row['admin_email'];
					$_SESSION['admin_name'] = $row['admin_username'];
					$_SESSION['ADMIN_ROLE'] = $row['role'];
					$_SESSION['admin_mobile'] = $row['admin_mobile'];
					$_SESSION['admin_password'] = $row['admin_password'];
					$_SESSION['store'] = $row['store'];
					$_SESSION['admin_status'] = $row['admin_status'];
					$response['success'] = $row['store'];
					if ($_SESSION['admin_status'] == "1") {
						header("location:dashboard.php");
					} else {
						header('location:500.html');
					}
				}
			}
		}
	}
}
if (!isset($_SESSION['access_token'])) {
	$login_button = '<a href="' . $google_client->createAuthUrl() . '" class="btn btn-flex flex-center btn-light btn-lg w-100 mb-5"><img alt="Logo" src="assets/media/svg/brand-logos/google-icon.svg" class="h-20px me-3" />Continue with Google</a>';
}

$protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http';
$domain = $_SERVER['HTTP_HOST'];
$base_url = $protocol . '://' . $domain;
$currentURL = $base_url . $_SERVER['REQUEST_URI'];
$canonicalURL = $base_url . parse_url($currentURL, PHP_URL_PATH);
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title><?php echo $portal_name ?></title>

	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
	<link href="assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
	<link href="assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
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
						<h1>
							<?php
							if (!empty($data['given_name'])) {
								echo "<br>" . $data['given_name'];
							}
							if (!empty($data['family_name'])) {
								echo "<br>" . $data['family_name'];
							}
							if (!empty($data['email'])) {
								echo "<br>" . $data['email'];
							}
							if (!empty($data['gender'])) {
								echo "<br>" . $data['gender'];
							}
							if (!empty($data['picture'])) {
								echo "<br>" . $data['picture'];
							}
							?>
						</h1>
					</div>
				</div>
			</div>
			<div class="d-flex flex-column flex-lg-row-fluid py-10">
				<div class="d-flex flex-center flex-column flex-column-fluid">
					<div class="w-lg-500px p-10 p-lg-15 mx-auto">
						<form class="form w-100" novalidate="novalidate" id="kt_sign_in_form" action="process.php" method="POST">
							<div class="text-center mb-10">
								<h1 class="text-dark mb-3">For Register Users Only</h1>
							</div>
							<div class="fv-row mb-10">
								<label class="form-label fs-6 fw-bolder text-dark">Email</label>
								<input class="form-control form-control-lg form-control-solid" type="text" name="email" autocomplete="off" />
							</div>
							<div class="fv-row mb-10">
								<div class="d-flex flex-stack mb-2">
									<label class="form-label fw-bolder text-dark fs-6 mb-0">Password</label>
								</div>
								<input class="form-control form-control-lg form-control-solid" type="password" name="password" autocomplete="off" />
							</div>
							<div class="text-center">
								<button type="submit" id="kt_sign_in_submit" class="btn btn-lg btn-primary w-100 mb-5" style="    background: #115740;">
									<span class="indicator-label">Continue</span>
									<span class="indicator-progress">Please wait...
										<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
								</button>
								<?php
								if ($google_login == '1') {
								?>
									<div class="text-center text-muted text-uppercase fw-bolder mb-5">or</div>
									<?php if ($login_button != '') {
										echo $login_button;
									} else {
										echo '<a disabled class="btn btn-flex flex-center btn-dark btn-lg w-100 mb-5"><img alt="Logo" src="assets/media/svg/brand-logos/google-icon.svg" class="h-20px me-3" />Google Login Is Disabled</a>';
									}
									?>
									<php ?>
									<?php 								}
									?>
							</div>
						</form>
						<?php if (isset($_GET['problem'])) {
							echo '<p href="#" class="text-center text-danger text-hover-primary fs-2 px-2">' . $_GET['problem'] . '</p>';
						} ?>
						<p class="text-center text-muted text-hover-primary px-2">* Please Don't Share Your Password for Unathorised Access</p>
					</div>
				</div>
				<div class="d-flex flex-center flex-wrap fs-6 p-5 pb-0">
					<div class="d-flex flex-center fw-bold fs-6">
						<a href="#" class="text-muted text-hover-primary px-2">© Copyright 2023. All Rights
							Reserved.</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script src="assets/plugins/global/plugins.bundle.js"></script>
	<script src="assets/js/scripts.bundle.js"></script>
	<script>
		"use strict";
		var KTSigninGeneral = (function() {
			var t, e, i;
			return {
				init: function() {
					(t = document.querySelector("#kt_sign_in_form")),
					(e = document.querySelector("#kt_sign_in_submit")),
					(i = FormValidation.formValidation(t, {
						fields: {
							email: {
								validators: {
									notEmpty: {
										message: "Email address is required"
									},
									emailAddress: {
										message: "The value is not a valid email address",
									},
								},
							},
							password: {
								validators: {
									notEmpty: {
										message: "The password is required"
									}
								},
							},
						},
						plugins: {
							trigger: new FormValidation.plugins.Trigger(),
							bootstrap: new FormValidation.plugins.Bootstrap5({
								rowSelector: ".fv-row",
							}),
						},
					})),
					e.addEventListener("click", function(n) {
						n.preventDefault(),
							i.validate().then(function(i) {
								"Valid" == i
									?
									(e.setAttribute("data-kt-indicator", "on"),
										(e.disabled = !0),
										setTimeout(function() {
											e.removeAttribute("data-kt-indicator"),
												(e.disabled = !1),

												<?php
												if ($two_factor == 1) {
												?>
											Swal.fire({
												text: "OTP Has Send To Your Register Mobile Number!",
												icon: "success",
												buttonsStyling: !1,
												confirmButtonText: "Ok, got it!",
												customClass: {
													confirmButton: "btn btn-primary"
												},
											}).then(function(e) {
												document.getElementById("kt_sign_in_form").submit();
												e.isConfirmed &&
													((t.querySelector('[name="email"]').value = ""),
														(t.querySelector('[name="password"]').value = ""));
											});
										<?php }
										?>

										}, 2e3)) :
									Swal.fire({
										text: "Sorry, looks like there are some errors detected, please try again.",
										icon: "error",
										buttonsStyling: !1,
										confirmButtonText: "Ok, got it!",
										customClass: {
											confirmButton: "btn btn-primary"
										},
									});
							});
					});
				},
			};
		})();
		KTUtil.onDOMContentLoaded(function() {
			KTSigninGeneral.init();
		});
	</script>
</body>

</html>