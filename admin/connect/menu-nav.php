<link rel="stylesheet" href="https://cdn.datatables.net/r/dt/jq-2.1.4,jszip-2.5.0,pdfmake-0.1.18,dt-1.10.9,af-2.0.0,b-1.0.3,b-colvis-1.0.3,b-html5-1.0.3,b-print-1.0.3,se-1.0.1/datatables.min.css" />
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.min.css" />
<link rel="stylesheet" href="https://cdn.datatables.net/searchbuilder/1.4.0/css/searchBuilder.dataTables.min.css" />
<link rel="stylesheet" href="https://cdn.datatables.net/colreorder/1.6.1/css/colReorder.dataTables.min.css" />
<link rel="stylesheet" href="https://cdn.datatables.net/datetime/1.3.0/css/dataTables.dateTime.min.css" />
<link href="assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
<link href="assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
<link rel="stylesheet" href="https://cdn.datatables.net/rowreorder/1.4.1/css/rowReorder.dataTables.min.css">

</head>
<?php
include('connect/loader/foodieezloader.php')
?>
<div class="offlineoverlay"></div>
<div class="wrapperoffline" style="display: none;">
	<div class="offlinetoast animate__animated  animate__shakeX animate__infinite	infinite animate__repeat-2 animate__slow 3s">
		<div class="offlinecontent">
			<div class="icon">
				<span>
					<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
						<path fill="currentColor" d="M13.414 19.412a1.994 1.994 0 0 0 0-2.826a1.994 1.994 0 0 0-2.828-.002a2 2 0 1 0 2.828 2.828zm7.071-7.897a1.99 1.99 0 0 1-1.414-.586c-3.899-3.899-10.243-3.898-14.143 0A2 2 0 0 1 2.099 8.1c5.459-5.458 14.341-5.458 19.799 0a2 2 0 0 1-1.413 3.415zM7.757 15.757a2 2 0 0 1-1.414-3.414c3.118-3.119 8.194-3.119 11.313 0a2 2 0 0 1-2.829 2.829a4.005 4.005 0 0 0-5.657 0a1.99 1.99 0 0 1-1.413.585z" />
					</svg>
				</span>
			</div>
			<div class="details">
				<span>You're offline now</span>
				<p>Opps! Please Check Your Internet Connection !!</p>
			</div>
		</div>
		<!-- <div class="toastclose-icon"><span>
					<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
						<path fill="currentColor" d="m13.41 12l4.3-4.29a1 1 0 1 0-1.42-1.42L12 10.59l-4.29-4.3a1 1 0 0 0-1.42 1.42l4.3 4.29l-4.3 4.29a1 1 0 0 0 0 1.42a1 1 0 0 0 1.42 0l4.29-4.3l4.29 4.3a1 1 0 0 0 1.42 0a1 1 0 0 0 0-1.42Z" />
					</svg>
				</span>
			</div> -->
	</div>
</div>

<body id="kt_body" class="header-fixed header-tablet-and-mobile-fixed aside-fixed aside-secondary-disabled">
	<div class="d-flex flex-column flex-root">

		<div class="page d-flex flex-row flex-column-fluid">
			<div id="kt_aside" class="aside" data-kt-drawer="true" data-kt-drawer-name="aside" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="auto" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_aside_toggle">


				<div class="aside-logo flex-column-auto pt-3" id="kt_aside_logo">
					<a href="dashboard.php">
						<img alt="Logo" src="<?php echo $logo;  ?>" class="asidelogo" />
					</a>
				</div>

				<div class="aside-menu flex-column-fluid pt-0 pb-5 py-lg-5" id="kt_aside_menu">

					<div class="hover-scroll-overlay-y px-2 my-5 my-lg-5" id="kt_aside_menu_wrapper" data-kt-scroll="true" data-kt-scroll-height="auto" data-kt-scroll-dependencies="{default: '#kt_aside_toolbar, #kt_aside_footer'}" data-kt-scroll-wrappers="#kt_aside_menu">

						<div id="kt_aside_menu" class="menu menu-column menu-title-gray-600 menu-state-primary menu-state-icon-primary menu-state-bullet-primary menu-icon-gray-400 menu-arrow-gray-400 fw-bold fs-6" data-kt-menu="true">
							<div class="menu-item py-3 	300ms">
								<a class="menu-link sidenavBtn " href="dashboard.php" title="Dashboard" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss="click" data-bs-placement="right">
									<span class="menu-icon">
										<span class="svg-icon svg-icon-2x">
											<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
												<rect x="2" y="2" width="9" height="9" rx="2" fill="black" />
												<rect opacity="0.3" x="13" y="2" width="9" height="9" rx="2" fill="black" />
												<rect opacity="0.3" x="13" y="13" width="9" height="9" rx="2" fill="black" />
												<rect opacity="0.3" x="2" y="13" width="9" height="9" rx="2" fill="black" />
											</svg>
										</span>
									</span>
									<h6 class="smallh6">
										HOME
									</h6>
								</a>
							</div>

							<!-- <div data-kt-menu-trigger="click" data-kt-menu-placement="right-start" class="menu-item py-3 ">

								<span class="menu-link sidenavBtn" title="Stock" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss="click" data-bs-placement="right">
									<span class="menu-icon">
										<span class="svg-icon svg-icon-2x">
											<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
												<path opacity="0.3" d="M21 22H3C2.4 22 2 21.6 2 21V5C2 4.4 2.4 4 3 4H21C21.6 4 22 4.4 22 5V21C22 21.6 21.6 22 21 22Z" fill="black" />
												<path d="M6 6C5.4 6 5 5.6 5 5V3C5 2.4 5.4 2 6 2C6.6 2 7 2.4 7 3V5C7 5.6 6.6 6 6 6ZM11 5V3C11 2.4 10.6 2 10 2C9.4 2 9 2.4 9 3V5C9 5.6 9.4 6 10 6C10.6 6 11 5.6 11 5ZM15 5V3C15 2.4 14.6 2 14 2C13.4 2 13 2.4 13 3V5C13 5.6 13.4 6 14 6C14.6 6 15 5.6 15 5ZM19 5V3C19 2.4 18.6 2 18 2C17.4 2 17 2.4 17 3V5C17 5.6 17.4 6 18 6C18.6 6 19 5.6 19 5Z" fill="black" />
												<path d="M8.8 13.1C9.2 13.1 9.5 13 9.7 12.8C9.9 12.6 10.1 12.3 10.1 11.9C10.1 11.6 10 11.3 9.8 11.1C9.6 10.9 9.3 10.8 9 10.8C8.8 10.8 8.59999 10.8 8.39999 10.9C8.19999 11 8.1 11.1 8 11.2C7.9 11.3 7.8 11.4 7.7 11.6C7.6 11.8 7.5 11.9 7.5 12.1C7.5 12.2 7.4 12.2 7.3 12.3C7.2 12.4 7.09999 12.4 6.89999 12.4C6.69999 12.4 6.6 12.3 6.5 12.2C6.4 12.1 6.3 11.9 6.3 11.7C6.3 11.5 6.4 11.3 6.5 11.1C6.6 10.9 6.8 10.7 7 10.5C7.2 10.3 7.49999 10.1 7.89999 10C8.29999 9.90003 8.60001 9.80003 9.10001 9.80003C9.50001 9.80003 9.80001 9.90003 10.1 10C10.4 10.1 10.7 10.3 10.9 10.4C11.1 10.5 11.3 10.8 11.4 11.1C11.5 11.4 11.6 11.6 11.6 11.9C11.6 12.3 11.5 12.6 11.3 12.9C11.1 13.2 10.9 13.5 10.6 13.7C10.9 13.9 11.2 14.1 11.4 14.3C11.6 14.5 11.8 14.7 11.9 15C12 15.3 12.1 15.5 12.1 15.8C12.1 16.2 12 16.5 11.9 16.8C11.8 17.1 11.5 17.4 11.3 17.7C11.1 18 10.7 18.2 10.3 18.3C9.9 18.4 9.5 18.5 9 18.5C8.5 18.5 8.1 18.4 7.7 18.2C7.3 18 7 17.8 6.8 17.6C6.6 17.4 6.4 17.1 6.3 16.8C6.2 16.5 6.10001 16.3 6.10001 16.1C6.10001 15.9 6.2 15.7 6.3 15.6C6.4 15.5 6.6 15.4 6.8 15.4C6.9 15.4 7.00001 15.4 7.10001 15.5C7.20001 15.6 7.3 15.6 7.3 15.7C7.5 16.2 7.7 16.6 8 16.9C8.3 17.2 8.6 17.3 9 17.3C9.2 17.3 9.5 17.2 9.7 17.1C9.9 17 10.1 16.8 10.3 16.6C10.5 16.4 10.5 16.1 10.5 15.8C10.5 15.3 10.4 15 10.1 14.7C9.80001 14.4 9.50001 14.3 9.10001 14.3C9.00001 14.3 8.9 14.3 8.7 14.3C8.5 14.3 8.39999 14.3 8.39999 14.3C8.19999 14.3 7.99999 14.2 7.89999 14.1C7.79999 14 7.7 13.8 7.7 13.7C7.7 13.5 7.79999 13.4 7.89999 13.2C7.99999 13 8.2 13 8.5 13H8.8V13.1ZM15.3 17.5V12.2C14.3 13 13.6 13.3 13.3 13.3C13.1 13.3 13 13.2 12.9 13.1C12.8 13 12.7 12.8 12.7 12.6C12.7 12.4 12.8 12.3 12.9 12.2C13 12.1 13.2 12 13.6 11.8C14.1 11.6 14.5 11.3 14.7 11.1C14.9 10.9 15.2 10.6 15.5 10.3C15.8 10 15.9 9.80003 15.9 9.70003C15.9 9.60003 16.1 9.60004 16.3 9.60004C16.5 9.60004 16.7 9.70003 16.8 9.80003C16.9 9.90003 17 10.2 17 10.5V17.2C17 18 16.7 18.4 16.2 18.4C16 18.4 15.8 18.3 15.6 18.2C15.4 18.1 15.3 17.8 15.3 17.5Z" fill="black" />
											</svg>
										</span>
									</span>
									<h6 class="smallh6">
										STOCK
									</h6>
								</span>
								<div class="menu-sub menu-sub-dropdown w-225px px-1 py-4">

									<div class="menu-item">
										<a class="menu-link" href="page.php">
											<span class="menu-bullet">
												<span class="bullet bullet-dot"></span>
											</span>
											<span class="menu-title">Overview</span>
										</a>
									</div>

								</div>
							</div>
 -->
							<?php
							if (checkSuperAdminSession()) {
							?>
								<div class="menu-item py-3 	300ms">
									<a class="menu-link sidenavBtn " href="category.php" title="category" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss="click" data-bs-placement="right">
										<span class="menu-icon">
											<i class="fa fa-list fs-2" aria-hidden="true"></i>

										</span>
										<h6 class="smallh6">
											CATEGORY
										</h6>
									</a>
								</div>

							<?php }

							?>


							<div class="menu-item py-3 	300ms">
								<a class="menu-link sidenavBtn " href="order.php" title="order" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss="click" data-bs-placement="right">
									<span class="menu-icon">
										<i class="fa  fa-shopping-cart fs-2" aria-hidden="true"></i>

									</span>
									<h6 class="smallh6">
										ORDERS
									</h6>
								</a>
							</div>

							<?php
							if (checkSuperAdminSession()) {
							?>

								<div class="menu-item py-3 	300ms">
									<a class="menu-link sidenavBtn " href="sales.php" title="sales" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss="click" data-bs-placement="right">
										<span class="menu-icon">
											<i class="fa  fa-rupee-sign fs-2" aria-hidden="true"></i>

										</span>
										<h6 class="smallh6">
											SALES
										</h6>
									</a>
								</div>
								<div class="menu-item py-3 	300ms">
									<a class="menu-link sidenavBtn " href="banner.php" title="banner" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss="click" data-bs-placement="right">
										<span class="menu-icon">
											<i class="fa fa-image fs-2" aria-hidden="true"></i>

										</span>
										<h6 class="smallh6">
											Banner
										</h6>
									</a>
								</div>
								<div class="menu-item py-3 	300ms">
									<a class="menu-link sidenavBtn " href="festivals.php" title="festivals" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss="click" data-bs-placement="right">
										<span class="menu-icon">
											<i class="fa fa-gift fs-2" aria-hidden="true"></i>

										</span>
										<h6 class="smallh6">
											Festivals
										</h6>
									</a>
								</div>
								<div class="menu-item py-3 	300ms">
									<a class="menu-link sidenavBtn " href="dish.php" title="dish" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss="click" data-bs-placement="right">
										<span class="menu-icon">
											<i class="fa fa-utensils fs-2" aria-hidden="true"></i>

										</span>
										<h6 class="smallh6">
											Dish
										</h6>
									</a>
								</div>

								<div class="menu-item py-3 	300ms">
									<a class="menu-link sidenavBtn " href="coupon.php" title="coupon" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss="click" data-bs-placement="right">
										<span class="menu-icon">
											<i class="fa fa-tag fs-2" aria-hidden="true"></i>

										</span>
										<h6 class="smallh6">
											Coupons
										</h6>
									</a>
								</div>

								<div class="menu-item py-3 	300ms">
									<a class="menu-link sidenavBtn " href="subscription.php" title="subscription" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss="click" data-bs-placement="right">
										<span class="menu-icon">
											<i class="fa fa-inbox fs-2" aria-hidden="true"></i>

										</span>
										<h6 class="smallh6">
											Subscriptions
										</h6>
									</a>
								</div>

								<div class="menu-item py-3 	300ms">
									<a class="menu-link sidenavBtn " href="users.php" title="Users" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss="click" data-bs-placement="right">
										<span class="menu-icon">
											<i class="fa fa-user fs-2" aria-hidden="true"></i>

										</span>
										<h6 class="smallh6">
											USERS
										</h6>
									</a>
								</div>
							<?php } ?>


						</div>
					</div>
				</div>
				<div class="aside-footer flex-column-auto pb-5 pb-lg-10" id="kt_aside_footer">
					<div class="d-flex flex-center w-100 scroll-px" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-dismiss="click" title="Quick actions">
						<button type="button" class="btn btn-custom" data-kt-menu-trigger="click" data-kt-menu-overflow="true" data-kt-menu-placement="top-start">
							<span class="svg-icon">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
									<rect opacity="0.3" width="12" height="2" rx="1" transform="matrix(-1 0 0 1 15.5 11)" fill="black" />
									<path d="M13.6313 11.6927L11.8756 10.2297C11.4054 9.83785 11.3732 9.12683 11.806 8.69401C12.1957 8.3043 12.8216 8.28591 13.2336 8.65206L16.1592 11.2526C16.6067 11.6504 16.6067 12.3496 16.1592 12.7474L13.2336 15.3479C12.8216 15.7141 12.1957 15.6957 11.806 15.306C11.3732 14.8732 11.4054 14.1621 11.8756 13.7703L13.6313 12.3073C13.8232 12.1474 13.8232 11.8526 13.6313 11.6927Z" fill="black" />
									<path d="M8 5V6C8 6.55228 8.44772 7 9 7C9.55228 7 10 6.55228 10 6C10 5.44772 10.4477 5 11 5H18C18.5523 5 19 5.44772 19 6V18C19 18.5523 18.5523 19 18 19H11C10.4477 19 10 18.5523 10 18C10 17.4477 9.55228 17 9 17C8.44772 17 8 17.4477 8 18V19C8 20.1046 8.89543 21 10 21H19C20.1046 21 21 20.1046 21 19V5C21 3.89543 20.1046 3 19 3H10C8.89543 3 8 3.89543 8 5Z" fill="#C4C4C4" />
								</svg>
							</span>
						</button>
						<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-bold w-200px" data-kt-menu="true">
							<div class="menu-item px-1">
								<div class="menu-content p-1">
									<a class="btn btn-danger btn-sm px-4 w-100" href="logout.php">Logout</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
				<div class="header-mobile py-3">
					<div class="container d-flex flex-stack">
						<div class="d-flex align-items-center flex-grow-1 flex-lg-grow-0">
							<a href="index.php">
								<img alt="Logo" src="<?php echo $logo;  ?>" class="h-35px" />
							</a>
						</div>
						<button class="btn btn-icon btn-active-color-primary" id="kt_aside_toggle">
							<span class="svg-icon svg-icon-2x me-n1">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
									<path d="M21 7H3C2.4 7 2 6.6 2 6V4C2 3.4 2.4 3 3 3H21C21.6 3 22 3.4 22 4V6C22 6.6 21.6 7 21 7Z" fill="black" />
									<path opacity="0.3" d="M21 14H3C2.4 14 2 13.6 2 13V11C2 10.4 2.4 10 3 10H21C21.6 10 22 10.4 22 11V13C22 13.6 21.6 14 21 14ZM22 20V18C22 17.4 21.6 17 21 17H3C2.4 17 2 17.4 2 18V20C2 20.6 2.4 21 3 21H21C21.6 21 22 20.6 22 20Z" fill="black" />
								</svg>
							</span>
						</button>
					</div>
				</div>
				<div id="kt_header" class="header py-6 py-lg-0" data-kt-sticky="true" data-kt-sticky-name="header" data-kt-sticky-offset="{lg: '300px'}">
					<div class="header-container container-xxl">
						<div class="page-title d-flex flex-column align-items-start justify-content-center flex-wrap me-lg-20 py-3 py-lg-0 me-3">
							<h1 class="d-flex flex-column text-dark fw-bolder my-1 	600ms">
								<span class="text-white fs-1"><?php echo $page_title ?></span>
							</h1>
							<div class="popup" style="display: none;"></div>
						</div>
						<div class="d-flex align-items-center flex-wrap">
						
							<div class="d-flex align-items-center py-3 py-lg-0">

								<div class="me-3">
									<a href="#" class="sidenavBtn btn btn-icon btn-custom btn-active-color-primary" data-kt-menu-trigger="click" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">
										<span class="svg-icon svg-icon-1 svg-icon-white">
											<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
												<path d="M6.28548 15.0861C7.34369 13.1814 9.35142 12 11.5304 12H12.4696C14.6486 12 16.6563 13.1814 17.7145 15.0861L19.3493 18.0287C20.0899 19.3618 19.1259 21 17.601 21H6.39903C4.87406 21 3.91012 19.3618 4.65071 18.0287L6.28548 15.0861Z" fill="black" />
												<rect opacity="0.3" x="8" y="3" width="8" height="8" rx="4" fill="black" />
											</svg>
										</span>
									</a>
									<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-primary fw-bold py-4 fs-6 w-275px" data-kt-menu="true">
										<div class="menu-item px-3">
											<div class="menu-content d-flex align-items-center px-3">
												<div class="symbol symbol-50px me-5">
													<img alt="Logo" src="assets/media/avatars/150-26.jpg" />
												</div>
												<div class="d-flex flex-column">
													<div class="fw-bolder d-flex align-items-center fs-5"><?php echo $_SESSION['admin_name'] ?>
													</div>
													<a href="mailto:<?php echo $_SESSION['admin_email'] ?>" title="<?php echo $_SESSION['admin_email'] ?>" class="fw-bold text-muted text-hover-primary fs-7 email_ellipsis"><?php echo $_SESSION['admin_email'] ?></a>
												</div>
											</div>
										</div>
										<div class="separator my-2"></div>
										<?php
										if (checkSuperAdminSession()) {
										?>
											<div class="menu-item px-5 my-1">
												<a href="settings.php" class="menu-link px-5">Account Settings</a>
											</div>

										<?php } ?>
										<div class="menu-item px-5">
											<a href="logout.php" class="menu-link px-5">Sign Out</a>
										</div>
									</div>
								</div>

							</div>
						</div>
					</div>
					<div class="header-offset"></div>
				</div>