<?php

$page_title = "Settings";
include('connect/head.php'); ?>
<?php
include('connect/menu-nav.php'); ?>
<script src="https://cdn.tiny.cloud/1/7omt3b4517021mnd1q496sj7bas6wt2mrbiuki543gxlabl1/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

<link rel="stylesheet" href="<?php echo ADMIN_SITE_PATH ?>assets/css/color-picker.css">
<style>
	.hidden-radio {
		display: none !important;
	}

	.img-container {
		position: relative !important;
		cursor: pointer !important;
	}

	.tick-mark {
		position: absolute !important;
		top: -15px !important;
		right: -10px !important;
		display: none !important;
		font-size: 25px;
		background: #29cd27;
		width: 40px;
		height: 40px;
		text-align: center;
		line-height: 40px;
		color: white;
		border-radius: 50%;
		opacity: 0;
		transition: opacity 0.3s ease-in-out;
	}

	.hidden-radio:checked+label .tick-mark {
		display: block !important;
		opacity: 1;
	}
</style>

<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
	<div class=" container-xxl " id="kt_content_container">
		<div class="card mb-5 mb-xl-10">
			<div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
				<div class="card-title m-0">
					<h3 class="fw-bold m-0">Portal Details</h3>
				</div>
			</div>

			<div id="kt_account_settings_profile_details" class="collapse show">
				<form id="company_detail_form" class="form fv-plugins-bootstrap5 fv-plugins-framework" novalidate="novalidate">
					<div class="card-body border-top p-9">
						<div class="row mb-6">
							<label class="col-lg-4 col-form-label required fw-semibold fs-6">Portal Name</label>
							<div class="col-lg-8">
								<div class="row">
									<div class="col-lg-12 fv-row fv-plugins-icon-container">
										<input type="text" name="portal_name" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" placeholder="Portal Name" value="<?php echo $portal_name ?>">
									</div>
								</div>
							</div>
						</div>

						<div class="row mb-6">
							<label class="col-lg-4 col-form-label required fw-semibold fs-6">Webiste Path</label>
							<div class="col-lg-8">
								<div class="row">
									<div class="col-lg-12 fv-row fv-plugins-icon-container">
										<input type="text" name="website_path" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" placeholder="Website Name" value="<?php echo $website_path ?>">
										<button onclick="copyValue(event)" type="button" class="copy-button">Copy</button>
									</div>
								</div>
							</div>
						</div>

						<div class="row mb-6">
							<label class="col-lg-4 col-form-label fw-semibold fs-6">
								<span class="required">Brand Logo </span>
							</label>
							<div class="col-lg-8 fv-row fv-plugins-icon-container">
								<input type="file" name="logo" alt="" class="form-control form-control-sm">
							</div>
							<div class="brandlogo">

							</div>
						</div>

						<div class="row mb-6">
							<label class="col-lg-4 col-form-label fw-semibold fs-6">
								<span class="required">Favicon</span>
							</label>
							<div class="col-lg-8 fv-row fv-plugins-icon-container">
								<input type="file" name="fav" alt="" class="form-control form-control-sm">
							</div>
							<div class="favlogo">

							</div>
						</div>


					</div>
					<div class="card-footer d-flex justify-content-end py-6 px-9">
						<button type="submit" class="btn btn-primary" id="kt_account_profile_details_submit">Save <i class="fas fa-check"></i> </button>
					</div>
					<input type="hidden">
				</form>
			</div>
		</div>

		<div class="card mb-5 mb-xl-10">
			<div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_connected_accounts" aria-expanded="true" aria-controls="kt_account_connected_accounts">
				<div class="card-title m-0">
					<h3 class="fw-bold m-0">Connected Accounts</h3>
				</div>
			</div>
			<div id="connected_accounts_form_div" class="collapse show">
				<form id="connected_accounts_form" method="post" enctype="multipart/form-data">
					<div class="card-body border-top p-9">
						<div class="py-2">
							<div class="d-flex flex-stack">
								<div class="d-flex">
									<img src="assets/media/svg/brand-logos/google-icon.svg" class="w-30px me-6" alt="">
									<div class="d-flex flex-column">
										<a href="#" class="fs-5 text-dark text-hover-primary fw-bold">Google</a>
										<div class="fs-6 fw-semibold text-gray-400">Login With Google</div>
									</div>
								</div>
								<div class="d-flex justify-content-end">
									<div class="form-check form-check-solid form-check-custom form-switch">
										<input class="form-check-input w-45px h-30px" type="checkbox" id="googleswitch" <?php if ($google_login == 1) {
																															echo "checked";
																														}  ?>>
										<label class="form-check-label" for="googleswitch"></label>
									</div>
								</div>
							</div>
							<div class="separator separator-dashed my-5"></div>
							<div class="d-flex flex-stack">
								<div class="d-flex">
									<img src="assets/media/infobip.webp" class="w-30px h-30px me-6" alt="">

									<div class="d-flex flex-column">
										<a href="#" class="fs-5 text-dark text-hover-primary fw-bold">Infobip</a>
										<div class="fs-6 fw-semibold text-gray-400">For Mail and whatsapp</div>
									</div>
								</div>
								<div class="d-flex justify-content-end">
									<div class="form-check form-check-solid form-check-custom form-switch">
										<input class="form-check-input w-45px h-30px" type="checkbox" id="infobip" <?php if ($is_infobip_connected == 1) {
																														echo "checked";
																													}  ?>>
										<label class="form-check-label" for="infobip"></label>
									</div>
								</div>
							</div>
							<div class="separator separator-dashed my-5"></div>

							<div class="d-flex flex-stack">
								<div class="d-flex">
									<img src="assets/media/2fa.png" class="w-30px h-30px me-6" alt="">

									<div class="d-flex flex-column">
										<a href="#" class="fs-5 text-dark text-hover-primary fw-bold">Two-factor Authentication </a>
										<div class="fs-6 fw-semibold text-gray-400">Two-factor authentication adds an extra layer of security to your account. To log in, in you'll need to provide a 4 digit amazing code.</div>
									</div>
								</div>
								<div class="d-flex justify-content-end">
									<div class="form-check form-check-solid form-check-custom form-switch">
										<input class="form-check-input w-45px h-30px" type="checkbox" id="twofactor" <?php if ($two_factor == 1) {
																															echo "checked";
																														}  ?>>
										<label class="form-check-label" for="twofactor"></label>
									</div>
								</div>
							</div>

						</div>
					</div>
					<div class="card-footer d-flex justify-content-end py-6 px-9">

						<button class="btn btn-primary">Save <i class="fas fa-check    "></i> </button>
					</div>
				</form>
			</div>
		</div>





		<div class="card mb-5 mb-xl-10">
			<div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_connected_accounts" aria-expanded="true" aria-controls="kt_account_connected_accounts">
				<div class="card-title m-0">
					<h3 class="fw-bold m-0">Social Media</h3>
				</div>
			</div>
			<div id="connected_accounts_form_div" class="collapse show">
				<form id="socialmediafrm" method="POST" enctype="multipart/form-data">
					<div class="card-body">
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
					<div class="card-footer d-flex justify-content-end py-6 px-9">

						<button class="btn btn-primary">Save <i class="fas fa-check"></i> </button>
					</div>
				</form>
			</div>
		</div>

		<div class="card mb-5 mb-xl-10">
			<div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_connected_accounts" aria-expanded="true" aria-controls="kt_account_connected_accounts">
				<div class="card-title m-0">
					<h3 class="fw-bold m-0">Contact</h3>
				</div>
			</div>
			<div id="connected_accounts_form_div" class="collapse show">
				<form id="contactupdatefrm" action="action/update-setting.php" method="POST" enctype="multipart/form-data">
					<div class="card-body">
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
					<div class="card-footer d-flex justify-content-end py-6 px-9">
						<button class="btn btn-primary">Save <i class="fas fa-check"></i> </button>
					</div>
				</form>
			</div>
		</div>

		<div class="card mb-5 mb-xl-10">
			<div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_email_preferences" aria-expanded="true" aria-controls="kt_account_email_preferences">
				<div class="card-title m-0">
					<h3 class="fw-bold m-0">Activation</h3>
				</div>
			</div>

			<div id="kt_account_settings_email_preferences" class="collapse show">
				<form class="form" id="activation_form">
					<div class="card-body border-top px-9 py-9">
						<label class="form-check form-check-custom form-check-solid align-items-start">
							<input class="form-check-input me-3" type="checkbox" name="mail_active" <?php if ($mail_active == 1) {
																										echo "checked";
																									}  ?>>

							<span class="form-check-label d-flex flex-column align-items-start">
								<span class="fw-bold fs-5 mb-0">Email</span>
							</span>
						</label>

						<div class="separator separator-dashed my-6"></div>
						<label class="form-check form-check-custom form-check-solid align-items-start">
							<input class="form-check-input me-3" type="checkbox" name="whatsapp_active" <?php if ($whatsapp_active == 1) {
																											echo "checked";
																										}  ?>>

							<span class="form-check-label d-flex flex-column align-items-start">
								<span class="fw-bold fs-5 mb-0">Whatsapp Message</span>
							</span>
						</label>

						<div class="separator separator-dashed my-6"></div>

						<div class="row mb-6">
							<label class="col-lg-4 col-form-label required fw-semibold fs-6">Email Authorization Key</label>
							<div class="col-lg-8 fv-row fv-plugins-icon-container">
								<input type="text" name="company" class="form-control form-control-lg form-control-solid" placeholder="Company name" value="efgergeSWD44545445454344243534tgdfert34r4333">
								<button onclick="copyValue(event)" type="button" class="copy-button">Copy</button>
							</div>
						</div>
						<div class="row mb-6">
							<label class="col-lg-4 col-form-label required fw-semibold fs-6">WhatsApp Template Name</label>
							<div class="col-lg-8 fv-row fv-plugins-icon-container">
								<input type="text" name="company" class="form-control form-control-lg form-control-solid" placeholder="Company name" value="otp_login" />
								<button onclick="copyValue(event)" type="button" class="copy-button">Copy</button>
							</div>
						</div>

						<div class="row mb-6">
							<label class="col-lg-4 col-form-label required fw-semibold fs-6">WhatsApp Sender Mobile</label>
							<div class="col-lg-8 fv-row fv-plugins-icon-container">
								<input type="text" name="company" class="form-control form-control-lg form-control-solid" placeholder="Company name" value="7017742830">
								<button onclick="copyValue(event)" type="button" class="copy-button">Copy</button>
							</div>
						</div>

					</div>

					<div class="card-footer d-flex justify-content-end py-6 px-9">

						<button class="btn btn-primary  px-6">Save <i class="fas fa-check    "></i> </button>
					</div>
				</form>
			</div>
		</div>


		<div class="card mb-5 mb-xl-10">
			<div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_email_preferences" aria-expanded="true" aria-controls="kt_account_email_preferences">
				<div class="card-title m-0">
					<h3 class="fw-bold m-0">Theme <span style="font-size: 10px;    color: var(--bs-danger);">(APPLIED ON FRONTEND)</span></h3>
				</div>
			</div>

			<div id="kt_account_settings_email_preferences" class="collapse show">
				<form id="colorupdatefrm" method="POST" enctype="multipart/form-data">
					<div class="card-body">
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
					<div class="card-footer d-flex justify-content-end py-6 px-9">

						<button class="btn btn-primary">Save <i class="fas fa-check"></i> </button>
					</div>
				</form>
			</div>
		</div>


		<div class="card mb-5">
			<div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_deactivate" aria-expanded="true" aria-controls="kt_account_deactivate">
				<div class="card-title m-0">
					<h3 class="fw-bold m-0">Preloaders</h3>
				</div>
			</div>
			<div id="" class="collapse show">
				<form id="design_form" class="form fv-plugins-bootstrap5 fv-plugins-framework" novalidate="novalidate">
					<div class="row">
						<?php
						$radioButtons = array(
							1 => '1.gif',
							2 => '2.gif',
							3 => '3.gif',
							4 => '4.gif',
							5 => '5.gif',
							6 => '6.gif',
							7 => '7.gif',
							8 => '8.gif',
							9 => '9.gif',
							10 => '10.gif',
							11 => '11.gif',
							12 => '12.gif',
						);
						foreach ($radioButtons as $value => $image) : ?>
							<div class="col-md-2 col-2 my-2">
								<input type="radio" name="preloader" id="loader<?php echo $value; ?>" value="<?php echo $value; ?>" class="hidden-radio" <?php if ($value == $preloader) echo 'checked'; ?>>
								<label for="loader<?php echo $value; ?>" class="img-container">
									<img src="assets/media/loaders_gif/<?php echo $image; ?>" class="img-fluid" alt="Loader <?php echo $value; ?>">
									<span class="tick-mark">&#10003;</span>
								</label>
							</div>
						<?php endforeach; ?>
					</div>

					<div class="card-footer d-flex justify-content-end py-6 px-9">
						<button id="" type="submit" class="btn btn-primary fw-semibold">Save <i class="fas fa-check    "></i> </button>
					</div>
				</form>
			</div>
		</div>

		<div class="card" style="    border: 1px solid red;">
			<div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_maintenance" aria-expanded="true" aria-controls="kt_account_maintenance" style="    background: snow !important;    border-radius: 20px;">
				<div class="card-title m-0">
					<h3 class="fw-bold m-0">DANGER ZONE</h3>
				</div>
			</div>
			<div id="kt_account_settings_maintenance" class="collapse show">
				<form id="maintenance_form" class="form fv-plugins-bootstrap5 fv-plugins-framework" novalidate="novalidate">
					<div class="card-body border-top p-9">
						<div class="notice d-flex bg-light-danger rounded border-danger border border-dashed mb-9 p-6">
							<div class="d-flex flex-stack flex-grow-1 ">
								<div class=" fw-semibold">
									<h4 class="text-gray-900 fw-bold">On Maintenance</h4>
									<div class="fs-6 text-gray-700 ">It will impact on your website !!</div>
								</div>
							</div>
						</div>
						<div class="form-check form-check-solid fv-row fv-plugins-icon-container">
							<input name="maintenance" class="form-check-input" style="background-color: var(--bs-red);" type="checkbox" id="maintenance" <?php if ($on_maintenance == 1) {
																																								echo "checked";
																																							}  ?>>
							<label class="form-check-label fw-semibold ps-2 fs-6" for="maintenance">Yes</label>
						</div>
					</div>

					<div class="card-footer d-flex justify-content-end py-6 px-9">
						<button id="kt_account_maintenance_account_submit" type="submit" class="btn btn-danger fw-semibold">DONE</button>
					</div>

					<input type="hidden">
				</form>
			</div>
		</div>
	</div>
	<?php include('connect/copyrights.php'); ?>
	<?php include('connect/footer-script.php'); ?>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>


	<script type="text/javascript" src="<?php echo ADMIN_SITE_PATH ?>assets/js/color-picker.js"></script>
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
	<script>
		$('#socialmediafrm').submit(function(e) {
			$('#overlay').fadeIn();
			e.preventDefault();

			var formData = new FormData(this); // Use FormData to handle image upload
			formData.append('param', 'social_update');

			$.ajax({
				type: "POST",
				url: "controller/update_settings.php",
				data: formData,
				processData: false, // Important for sending files
				contentType: false, // Important for sending files
				success: function(response) {
					$('#overlay').fadeOut();
					showPopup(response.status, response.message);
				}
			});
		});

		$('#contactupdatefrm').submit(function(e) {
			$('#overlay').fadeIn();
			e.preventDefault();

			var formData = new FormData(this); // Use FormData to handle image upload
			formData.append('param', 'contact_update');
			$.ajax({
				type: "POST",
				url: "controller/update_settings.php",
				data: formData,
				processData: false, // Important for sending files
				contentType: false, // Important for sending files
				success: function(response) {
					$('#overlay').fadeOut();
					showPopup(response.status, response.message);
				}
			});
		});




		$('#colorupdatefrm').submit(function(e) {
			$('#overlay').fadeIn();
			e.preventDefault();

			var formData = new FormData(this); // Use FormData to handle image upload
			formData.append('param', 'color_update');

			$.ajax({
				type: "POST",
				url: "controller/update_settings.php",
				data: formData,
				processData: false, // Important for sending files
				contentType: false, // Important for sending files
				success: function(response) {
					$('#overlay').fadeOut();
					showPopup(response.status, response.message);
				}
			});
		});
	</script>
	<script>
		$('#maketable').DataTable({
			"dom": "<'row'<'col-sm-12 col-md-8'B><'col-sm-12 col-md-4'f>>" + "<'row'<'col-sm-12'tr>>" + "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-2'l><'col-sm-12 col-md-5'p>>",
			"language": {
				sSearch: "",
				searchPlaceholder: "Search here...",
			},
			"sAjaxSource": "connect/listdata.php?show=<?php echo md5('Official_Visit') ?>",
			"responsive": true,
			"lengthChange": true,
			"paging": true,
			"autoWidth": false,
			"searching": true,
			"fixedColumns": true,
			"processing": true,
			"scrollX": true,
			"colReorder": true,
			"fixedColumns": {
				left: 2,
			},
			"buttons": [{
				extend: 'collection',
				text: 'Export Data',
				buttons: ['copy', 'excel', 'csv', 'print']
			}],
			"fnCreatedRow": function(nRow, aData, iDataIndex) {
				$('td:eq(6)', nRow).html(
					"<a onclick='delete_emp_visit(" + aData[6] + ")' class='badge badge-pill badge-danger text-white cursor-pointer'> <i class='fa fa-trash text-white'></i> </a>");
			}
		}).buttons().container();
		$('#maketable_filter input').addClass('form-control form-control-sm  w-100');
	</script>
	<script>
		function get_logo() {
			var brandlogo = $('.brandlogo'); // Cache the brandlogo element for better performance
			$.ajax({
				type: "POST",
				url: "controller/get_data.php",
				data: {
					get_logo: '1'
				},
				beforeSend: function() {
					brandlogo.html('<div class="spinner-border text-warning" role="status"></div>');
				},
				success: function(response) {
					brandlogo.html(response.message);
				},
				error: function() {
					// Handle error by showing an error message or taking appropriate action
					brandlogo.html('<div class="error-message">An error occurred</div>');
				}
			});
		}

		function get_fav() {
			var favlogo = $('.favlogo'); // Cache the favlogo element for better performance
			$.ajax({
				type: "POST",
				url: "controller/get_data.php",
				data: {
					get_fav: '1'
				},
				beforeSend: function() {
					favlogo.html('<div class="spinner-border text-warning" role="status"></div>');
				},
				success: function(response) {
					favlogo.html(response.message);
				},
				error: function() {
					// Handle error by showing an error message or taking appropriate action
					favlogo.html('<div class="error-message">An error occurred</div>');
				}
			});
		}

		$(document).ready(function() {
			get_logo();
			get_fav();
		});

		$('#company_detail_form').submit(function(e) {
			$('#overlay').fadeIn();
			e.preventDefault();

			var formData = new FormData(this); // Use FormData to handle image upload
			formData.append('param', 'company_update');

			$.ajax({
				type: "POST",
				url: "controller/update_settings.php",
				data: formData,
				processData: false, // Important for sending files
				contentType: false, // Important for sending files
				success: function(response) {
					get_logo();
					get_fav();
					$('#overlay').fadeOut();
					showPopup(response.status, response.message);

				}
			});
		});

		$('#activation_form').submit(function(e) {
			$('#overlay').fadeIn();
			e.preventDefault();
			$.ajax({
				type: "POST",
				url: "connect",
				data: $('#activation_form').serialize(),
				success: function(response) {
					$('#overlay').fadeOut();
					showPopup(response.status, response.message)
				}
			});
		});
		$('#maintenance_form').submit(function(e) {
			$('#overlay').fadeIn();
			var maintenance = $('#maintenance').prop('checked') ? 1 : 0;
			e.preventDefault();
			$.ajax({
				type: "POST",
				url: "controller/update_settings.php",
				data: {
					maintenance: maintenance,
					param: 'maintenance'
				},
				success: function(response) {
					$('#overlay').fadeOut();
					showPopup(response.status, response.message)

				}
			});
		});
		$('#connected_accounts_form').submit(function(e) {
			$('#overlay').fadeIn();
			e.preventDefault();
			var googleswitch = $('#googleswitch').prop('checked') ? 1 : 0; // Get the checked value (1 if checked, 0 if unchecked)
			var infobip = $('#infobip').prop('checked') ? 1 : 0; // Get the checked value (1 if checked, 0 if unchecked)
			var twofactor = $('#twofactor').prop('checked') ? 1 : 0; // Get the checked value (1 if checked, 0 if unchecked)
			$.ajax({
				type: "POST",
				url: "controller/update_settings.php",
				data: {
					googleswitch: googleswitch,
					infobip: infobip,
					twofactor: twofactor,
					param: 'connected_account'
				},
				success: function(response) {

					$('#overlay').fadeOut();
					showPopup(response.status, response.message);

				}
			});
		});

		$('#design_form').submit(function(e) {
			$('#overlay').fadeIn();
			e.preventDefault();

			var formData = $('#design_form').serializeArray();
			formData.push({
				name: 'param',
				value: 'design_update'
			});

			$.ajax({
				type: "POST",
				url: "controller/update_settings.php",
				data: formData,
				success: function(response) {

					$('#overlay').fadeOut();
					showPopup(response.status, response.message);

				}
			});
		});
	</script>
	<script>
		document.querySelectorAll('label[for^="loader"]').forEach(label => {
			label.addEventListener('click', () => {
				const radioId = label.getAttribute('for');
				const radio = document.getElementById(radioId);
				radio.checked = true;
			});
		});
	</script>
	<?php include('connect/footer-end.php'); ?>