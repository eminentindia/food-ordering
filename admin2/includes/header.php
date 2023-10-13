<?php
if ((!isset($_SESSION['ADMIN_LOGIN_ID'])) && (!isset($_SESSION['ADMIN_EMAIL']))) {
    echo '<script>window.location.href="' . ADMIN_SITE_PATH . 'index.php";</script>';
}
?>

<link rel="shortcut icon" href="<?php echo SITE_PATH ?>images/<?php echo $fav ?>" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="<?php echo ADMIN_SITE_PATH; ?>lib/themify-icon/themify-icons.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/5.9.55/css/materialdesignicons.min.css" />
<link rel="stylesheet" href="<?php echo ADMIN_SITE_PATH; ?>css/style.css">
<link rel="stylesheet" href="<?php echo ADMIN_SITE_PATH; ?>css/datepicker.css">
<script src="<?php echo ADMIN_SITE_PATH; ?>js/sweet-alert.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css" />
<script src="<?php echo ADMIN_SITE_PATH; ?>controller/function.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/r/dt/jq-2.1.4,jszip-2.5.0,pdfmake-0.1.18,dt-1.10.9,af-2.0.0,b-1.0.3,b-colvis-1.0.3,b-html5-1.0.3,b-print-1.0.3,se-1.0.1/datatables.min.css" />
</head>

<body>

    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full" data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">

        <header class="topbar" data-navbarbg="skin5">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">
                <div class="navbar-header" data-logobg="skin5">
                    <!-- Logo -->

                    <a class="navbar-brand" href="<?php echo ADMIN_SITE_PATH ?>">

                        <span class="logo-text">
                            <!-- dark Logo text -->
                            <img src="<?php echo SITE_PATH ?>images/logo/logo.png" alt="homepage" class="light-logo" width="200px" />
                        </span>
                    </a>

                    <a class="nav-toggler waves-effect waves-dark d-block d-md-none" href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                </div>

                <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">


                    <ul class="navbar-nav float-start me-auto">
                        <li class="nav-item d-none d-lg-block"><a class="nav-link sidebartoggler waves-effect waves-dark" href="javascript:void(0)" data-sidebartype="mini-sidebar"><i class="mdi mdi-menu font-24"></i></a></li>

                    </ul>

                    <ul class="navbar-nav float-end">


                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Hi <?= ucwords($_SESSION['ADMIN_NAME']); ?> !
                                <img src="<?php echo ADMIN_SITE_PATH; ?>images/logo-icon.png" alt="user" class="rounded-circle" width="31">
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end user-dd animated" aria-labelledby="navbarDropdown">

                                <a class="dropdown-item logout" type="button" href="<?php echo ADMIN_SITE_PATH ?>logout.php"><i class="fa fa-power-off me-1 ms-1"></i> Logout</a>


                            </ul>
                        </li>

                    </ul>
                </div>
            </nav>
        </header>