<?php

$page_title = "Dashboard";
include('connect/head.php'); ?>
<?php
include('connect/menu-nav.php'); ?>
<script src="https://cdn.tiny.cloud/1/7omt3b4517021mnd1q496sj7bas6wt2mrbiuki543gxlabl1/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
<?php
$getcategory = getcategory($conn);
$getcategory = json_decode($getcategory, true);
$getcoupon = getcoupon($conn);
$getcoupon = json_decode($getcoupon, true);
$getdish = getdish($conn);
$getdish = json_decode($getdish, true);
$getorder = getorder($conn);
$getorder = json_decode($getorder, true);
$getusers = getusers($conn);
$getusers = json_decode($getusers, true);
$getsubscription = getsubscription($conn);
$getsubscription = json_decode($getsubscription, true);

$getfestivals = getfestivals($conn);
$getfestivals = json_decode($getfestivals, true);
?>
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
	<div class="container-xxl" id="kt_content_container">
		<div class="row g-5 g-xl-8">
			<div class="col-xl-4">
				<div class="row mb-5 mb-xl-8 g-5 g-xl-8">
					<div class="col-4">
						<div class="card card-stretch">
							<a href="order.php" target="_blank" class="btn btn-flex btn-text-gray-800 btn-icon-gray-400 btn-active-color-primary bg-body flex-column justfiy-content-start align-items-start text-start w-100 p-2 fs-1 mb-4 text-warning">
								<?php
								$start_date  = date('Y-m-d') . ' 00-00-00';
								$end_date = date('Y-m-d') . ' 23-59-59';
								$getDashboard_orders = gettodaytotalorder($conn, $start_date, $end_date);
								//   print_r($getDashboard_orders);
								if ($getDashboard_orders != '') {
									echo sizeof($getDashboard_orders);
								} else {
									echo '0';
								}
								?>
								<span class="fs-8 fw-bolder text-success">Today Orders</span>
							</a>
						</div>
					</div>
					<!-- <div class="col-4">
						<div class="card card-stretch">
							<a href="order.php" target="_blank" class="btn btn-flex btn-text-gray-800 btn-icon-gray-400 btn-active-color-primary bg-body flex-column justfiy-content-start align-items-start text-start w-100 p-2 fs-1 mb-4 text-warning">
								<?php

								$start_date  = date('Y-m-d') . ' 00-00-00';
								$end_date = date('Y-m-d') . ' 23-59-59';
								$getDashboard_orders = getDashboardpendingOrders($conn);
								//   print_r($getDashboard_orders);
								if ($getDashboard_orders != '') {
									echo sizeof($getDashboard_orders);
								} else {
									echo '0';
								}
								?>
								<span class="fs-8 fw-bolder text-success">Pending Orders</span>
							</a>
						</div>
					</div> -->

					<div class="col-4">
						<div class="card card-stretch">
							<a href="order.php" target="_blank" class="btn btn-flex btn-text-gray-800 btn-icon-gray-400 btn-active-color-primary bg-body flex-column justfiy-content-start align-items-start text-start w-100 p-2 fs-1 mb-4 text-warning">
								<?php

								$start_date  = date('Y-m-d') . ' 00-00-00';
								$end_date = date('Y-m-d') . ' 23-59-59';
								$getDashboard_orders = getDashboardcancelpendingOrders($conn, $start_date, $end_date);
								//   print_r($getDashboard_orders);
								if ($getDashboard_orders != '') {
									echo sizeof($getDashboard_orders);
								} else {
									echo '0';
								}
								?>
								<span class="fs-8 fw-bolder text-success">Cancel Orders </span>
							</a>
						</div>
					</div>

					<div class="col-4">
						<div class="card card-stretch">
							<a href="order.php" target="_blank" class="btn btn-flex btn-text-gray-800 btn-icon-gray-400 btn-active-color-primary bg-body flex-column justfiy-content-start align-items-start text-start w-100 p-2 fs-1 mb-4 text-warning">
								<?php

								$start_date  = date('Y-m-d') . ' 00-00-00';
								$end_date = date('Y-m-d') . ' 23-59-59';
								$getDashboard_orders = getDashboardtodaycompleteOrders($conn, $start_date, $end_date);
								//   print_r($getDashboard_orders);
								if ($getDashboard_orders != '') {
									echo sizeof($getDashboard_orders);
								} else {
									echo '0';
								}
								?>
								<span class="fs-8 fw-bolder text-success">Complete Orders </span>
							</a>
						</div>
					</div>

				</div>
				<?php
				if (checkSuperAdminSession()) {
				?>
					<div class="card mb-5 mb-xl-8">
						<div class="card-header border-0 pt-5">
							<h3 class="card-title align-items-start flex-column">
								<span class="card-label fw-bolder fs-3 mb-1">Quick Links</span>
							</h3>
							<div class="card-toolbar">
								<ul class="nav gap-4">
									<li class="nav-item">
										<a class="quickbadgediv nav-link btn btn-sm btn-color-muted btn-active btn-active-dark  fw-bolder px-4 me-1" href="category.php">Category <span class="quickbadge badge rounded-pill counter f-20 badge-primary badge"><?php echo count($getcategory); ?></span>
										</a>
									</li>
									<li class="nav-item">
										<a class="quickbadgediv nav-link btn btn-sm btn-color-muted btn-active btn-active-dark fw-bolder px-4 me-1" href="coupon.php">Coupon <span class="quickbadge badge rounded-pill counter f-20 badge-primary badge"><?php echo count($getcoupon); ?></a>
									</li>
									<li class="nav-item">
										<a class="quickbadgediv nav-link btn btn-sm btn-color-muted btn-active btn-active-dark fw-bolder px-4  me-1" href="dish.php">Dishes <span class="quickbadge badge rounded-pill counter f-20 badge-primary badge"><?php echo count($getdish); ?></a>
									</li>

									<li class="nav-item">
										<a class=" quickbadgediv nav-link btn btn-sm btn-color-muted btn-active btn-active-dark fw-bolder px-4  me-1" href="order.php">Orders <span class="quickbadge badge rounded-pill counter f-20 badge-primary badge"><?php echo count($getorder); ?></a>
									</li>

									<li class="nav-item">
										<a class="quickbadgediv nav-link btn btn-sm btn-color-muted btn-active btn-active-dark fw-bolder px-4  me-1" href="user.php">Users <span class="quickbadge badge rounded-pill counter f-20 badge-primary badge"><?php echo count($getusers); ?></a>
									</li>
									<li class="nav-item">
										<a class="quickbadgediv nav-link btn btn-sm btn-color-muted btn-active btn-active-dark fw-bolder px-4  me-1" href="subscription.php">Festivals <span class="quickbadge badge rounded-pill counter f-20 badge-primary badge"><?php echo count($getfestivals); ?></a>
									</li>
									<li class="nav-item">
										<a class="quickbadgediv nav-link btn btn-sm btn-color-muted btn-active btn-active-dark fw-bolder px-4  me-1" href="subscription.php">Subscriptions <span class="quickbadge badge rounded-pill counter f-20 badge-primary badge"><?php echo count($getsubscription); ?></a>
									</li>
								</ul>
							</div>
						</div>
					</div>
				<?php }
				?>
				<div class="card mb-5 mb-xl-8">
					<div class="card-header align-items-center border-0 mt-4" style="min-height: 20px;">
						<h3 class="card-title align-items-start flex-column">
							<span class="fw-bolder mb-2 text-dark">Most Sale Dish</span>
						</h3>
						<?php
						$mostsalesql = null; // Initialize $mostsalesql to avoid "Undefined variable" warning

						if (checkSuperAdminSession()) {
							$filter = " ";
						} else {
							$filter = " AND orders.store='" . $_SESSION['store'] . "'";
						}

						$mostsalesql_result = mysqli_query($conn, "SELECT count(order_details.dish_order_id) as dish_count, dish.dish, dish.image FROM order_details, dish_details, dish, orders WHERE order_details.dish_order_id=dish_details.dish_detail_id AND dish_details.dish_id=dish.id $filter  GROUP BY order_details.dish_order_id ORDER BY count(order_details.dish_order_id) DESC LIMIT 1");

						if ($mostsalesql_result && mysqli_num_rows($mostsalesql_result) > 0) {
							$mostsalesql = mysqli_fetch_assoc($mostsalesql_result);
						?>
							<div class="card-body pt-0">
								<div class="d-flex gap-4 align-items-center mb-4">
									<h4 class="pt-3" style="background: #daff88; font-size: 1.2rem; width: max-content; padding: 4px 20px; margin: 0; padding-top: 4px !important;border-radius: 10px;"><?php echo $mostsalesql['dish']; ?></h4>
									<br>
									<h6 class="dishtimes"><?php echo $mostsalesql['dish_count']; ?> Times</h6>
								</div>
								<div class="card bgi-position-y-bottom bgi-position-x-end bgi-no-repeat bgi-size-cover min-h-150px mb-5 mb-xl-8" style="  font-family: 'Kalam', cursive;background-color: #fd7d16;  background-size: cover;background-image:url('<?php echo PRODUCT_IMAGE_SITE_PATH . $mostsalesql['image'] ?>')">

								</div>

							</div><!-- Your code continues here -->
						<?php
						}
						?>
					</div>

					<!-- Other parts of your code -->


				</div>

			</div>
			<div class="col-xl-8 ps-xl-12">


				<div class="row">


					<?php
					if (checkDCMSession() || checkSuperAdminSession()) {
					?>
						<div class=" <?php if (checkSuperAdminSession() ? 'col-md-6' : 'col-md-12') ?>" style="background: white;border: 1px solid #dbdbdb; padding: 0; -webkit-box-shadow: -1px 10px 5px -7px rgb(0 0 0 / 10%); -moz-box-shadow: -1px 10px 5px -7px rgb(0 0 0 / 10%); box-shadow: -1px 10px 5px -7px rgb(0 0 0 / 10%);">
							<!--begin::Item-->
							<div class="d-flex align-items-center bg-light-info rounded p-5 changedash" style="border-bottom: 1px solid #d3d3d3ab;padding-bottom: 20px !important;margin-bottom: 20px;     padding-top: 20px !important;   background: #a6dd79;">
								<!--begin::Icon-->
								<span class="svg-icon svg-icon-info me-5">
									<!--begin::Svg Icon | path: icons/duotune/abstract/abs027.svg-->
									<span class="svg-icon svg-icon-1">
										<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
											<path opacity="0.3" d="M21.25 18.525L13.05 21.825C12.35 22.125 11.65 22.125 10.95 21.825L2.75 18.525C1.75 18.125 1.75 16.725 2.75 16.325L4.04999 15.825L10.25 18.325C10.85 18.525 11.45 18.625 12.05 18.625C12.65 18.625 13.25 18.525 13.85 18.325L20.05 15.825L21.35 16.325C22.35 16.725 22.35 18.125 21.25 18.525ZM13.05 16.425L21.25 13.125C22.25 12.725 22.25 11.325 21.25 10.925L13.05 7.62502C12.35 7.32502 11.65 7.32502 10.95 7.62502L2.75 10.925C1.75 11.325 1.75 12.725 2.75 13.125L10.95 16.425C11.65 16.725 12.45 16.725 13.05 16.425Z" fill="black"></path>
											<path d="M11.05 11.025L2.84998 7.725C1.84998 7.325 1.84998 5.925 2.84998 5.525L11.05 2.225C11.75 1.925 12.45 1.925 13.15 2.225L21.35 5.525C22.35 5.925 22.35 7.325 21.35 7.725L13.05 11.025C12.45 11.325 11.65 11.325 11.05 11.025Z" fill="black"></path>
										</svg>
									</span>
									<!--end::Svg Icon-->
								</span>
								<div class="flex-grow-1 me-2">
									<span class="fw-bolder text-info text-hover-info fs-6">DCM Building</span>
								</div>
								<div class="d-flex flex-column">
									<?php
									$sel = "select * from orders where store='2' and otp_validate='0' and  ( paymentstatus='authorized' || paymentstatus='captured' ) ||  ( paymentstatus='created' and payment_type='cod' and store='2' ) ";
									$res = mysqli_query($conn, $sel);
									$count = mysqli_num_rows($res);

									$sel2 = "select * from orders where store='2' and otp_validate='1'";
									$res2 = mysqli_query($conn, $sel2);
									$count2 = mysqli_num_rows($res2);

									$dcm = array(
										array("label" => "Completed Orders", "y" => $count2),
										array("label" => "Pending Orders", "y" => $count)
									)

									?>
									<span class="fw-bolder text-green py-1"><span style="font-size: 1.4rem;"><?php echo $count ?></span> Pending Orders</span>
									<span class="fw-bolder text-green py-1"><span style="font-size: 1.4rem;"><?php echo $count2 ?></span> Completed Orders</span>


								</div>
							</div>
							<div id="dcmcontainer" style="height: 370px; width: 100%;"></div>
						</div>
					<?php }
					?>

					<?php
					if (checkArunachalSession() || checkSuperAdminSession()) {
					?>
						<div class=" <?php if (checkSuperAdminSession() ? 'col-md-6' : 'col-md-12') ?>" style="background: white;border: 1px solid #dbdbdb;padding: 0;-webkit-box-shadow: -1px 10px 5px -7px rgb(0 0 0 / 10%);-moz-box-shadow: -1px 10px 5px -7px rgb(0 0 0 / 10%);box-shadow: -1px 10px 5px -7px rgb(0 0 0 / 10%);">
							<div class="d-flex align-items-center bg-light-success rounded p-5 changedash" style="border-bottom: 1px solid #d3d3d3ab; padding-bottom: 20px !important;    padding-top: 20px !important;  margin-bottom: 20px;    background: #98cae5;">
								<span class="svg-icon svg-icon-success me-5">
									<span class="svg-icon svg-icon-1">
										<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
											<path opacity="0.3" d="M21.25 18.525L13.05 21.825C12.35 22.125 11.65 22.125 10.95 21.825L2.75 18.525C1.75 18.125 1.75 16.725 2.75 16.325L4.04999 15.825L10.25 18.325C10.85 18.525 11.45 18.625 12.05 18.625C12.65 18.625 13.25 18.525 13.85 18.325L20.05 15.825L21.35 16.325C22.35 16.725 22.35 18.125 21.25 18.525ZM13.05 16.425L21.25 13.125C22.25 12.725 22.25 11.325 21.25 10.925L13.05 7.62502C12.35 7.32502 11.65 7.32502 10.95 7.62502L2.75 10.925C1.75 11.325 1.75 12.725 2.75 13.125L10.95 16.425C11.65 16.725 12.45 16.725 13.05 16.425Z" fill="black"></path>
											<path d="M11.05 11.025L2.84998 7.725C1.84998 7.325 1.84998 5.925 2.84998 5.525L11.05 2.225C11.75 1.925 12.45 1.925 13.15 2.225L21.35 5.525C22.35 5.925 22.35 7.325 21.35 7.725L13.05 11.025C12.45 11.325 11.65 11.325 11.05 11.025Z" fill="black"></path>
										</svg>
									</span>
								</span>
								<div class="flex-grow-1 me-2">
									<span class="fw-bolder text-primary text-hover-primary fs-6">Arunachal Building</span>
								</div>
								<div class="d-flex flex-column">
									<?php
									$sel = "select * from orders where store='1' and otp_validate='0' and  ( paymentstatus='authorized' || paymentstatus='captured' ) ||  ( paymentstatus='created' and payment_type='cod' and store='1' ) ";
									$res = mysqli_query($conn, $sel);
									$count = mysqli_num_rows($res);
									$sel2 = "select * from orders where store='1' and otp_validate='1' ";
									$res2 = mysqli_query($conn, $sel2);
									$count2 = mysqli_num_rows($res2);
									$cp = array(
										array("label" => "Completed Orders", "y" => $count2),
										array("label" => "Pending Orders", "y" => $count)
									)
									?>
									<span class="fw-bolder text-green py-1"><span style="font-size: 1.4rem;"><?php echo $count ?> </span>Pending Orders</span>
									<span class="fw-bolder text-green py-1"><span style="font-size: 1.4rem;"><?php echo $count2 ?></span> Completed Orders</span>
								</div>
							</div>
							<div id="cpcontainer" style="height: 370px; width: 100%;"></div>
						</div>
					<?php }
					?>

				</div>


				<div class="card mb-xl-8">

					<div class="container-fluid">
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

						<div class="row">




						</div>



					</div>
				</div>


			</div>

		</div>
	</div>
</div>
<?php include('connect/copyrights.php'); ?>
<?php include('connect/footer-script.php'); ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
<script src="connect/ajax/script/dashboard.js"></script>
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
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
	AOS.init();
</script>

<script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>

<script>
	CanvasJS.addColorSet("greenShades",
		[ //colorSet Array
			"#6fe473",
			"#2c742e"
		]);


	<?php
	if (checkDCMSession() || checkSuperAdminSession()) {
	?>
		var chart = new CanvasJS.Chart("dcmcontainer", {
			animationEnabled: true,
			colorSet: "greenShades",
			data: [{
				type: "pie",
				indexLabel: "{label} ({y})",
				startAngle: 90,
				showInLegend: true,
				legendText: "{label} : {y}",
				dataPoints: <?php echo json_encode($dcm, JSON_NUMERIC_CHECK); ?>
			}]
		});
		chart.render();

	<?php } ?>
	<?php
	if (checkArunachalSession() || checkSuperAdminSession()) {
	?>
		var chart2 = new CanvasJS.Chart("cpcontainer", {
			animationEnabled: true,
			colorSet: "greenShades",

			data: [{
				type: "pie",
				indexLabel: "{label} ({y})",
				startAngle: 90,
				showInLegend: true,
				legendText: "{label} : {y}",
				dataPoints: <?php echo json_encode($cp, JSON_NUMERIC_CHECK); ?>
			}]
		});

		chart2.render();

	<?php } ?>
</script>
<?php include('connect/footer-end.php'); ?>