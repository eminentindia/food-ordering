<?php

if ((!isset($_SESSION['DELIEVERY_BOY_LOGIN_ID'])) && (!isset($_SESSION['DELIEVERY_BOY_MOBILE']))) {
    echo '<script>window.location.href="' . SITE_PATH . 'delievery-boy/index.php";</script>';
}
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="<?php echo SITE_PATH; ?>admin/css/style.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css" />

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.dataTables.min.css" />

<style>
    table.dataTable tbody tr {
        background-color: #fff;
        border: 1px solid green !important;
    }

    .collapse:not(.show) {
        display: block;
    }
</style>
</head>

<body style="background: #8ebe43;">

    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full" data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
        <header class="topbar" data-navbarbg="skin5">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">
                <div class="navbar-header" data-logobg="skin5">
                    <a class="navbar-brand" href="<?php echo SITE_PATH ?>">
                        <span class="logo-text">
                            <img src="<?php echo SITE_PATH ?>images/logo/<?php echo $logo ?>" alt="homepage" class="light-logo" width="160px" />
                        </span>
                    </a>

                    <a class="nav-toggler waves-effect waves-dark d-block d-md-none" href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                </div>

                <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">


                    <ul class="navbar-nav float-start me-auto">
                        <li class="nav-item "><a class="nav-link sidebartoggler waves-effect waves-dark" href="javascript:void(0)" data-sidebartype="mini-sidebar"><i class="mdi mdi-menu font-24"></i></a></li>

                    </ul>

                    <ul class="navbar-nav float-end" style="position: absolute;
right: 0;
text-align: 0;
top: 0; display:block">


                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <?= 'Hi ' . $_SESSION['DELIEVERY_BOY_NAME'] . ' !' ?>
                                <?php
                                if (isset($_SESSION['DELIEVERY_BOY_PIC'])) {
                                ?>
                                    <img src="<?php echo SITE_PATH; ?>admin/media/delievery_boy/<?php echo $_SESSION['DELIEVERY_BOY_PIC'] ?>" alt="user" class="rounded-circle" width="31">
                                <?php } else {
                                ?>
                                    <img src="<?php echo SITE_PATH; ?>admin/images/logo-icon.png" alt="user" class="rounded-circle" width="31">
                                <?php }

                                ?>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end user-dd animated" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item logout" type="button" href="<?php echo SITE_PATH ?>delievery-boy/logout.php"><i class="fa fa-power-off me-1 ms-1"></i> Logout</a>
                            </ul>
                        </li>

                    </ul>
                </div>
            </nav>
        </header>