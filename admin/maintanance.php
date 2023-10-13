<!DOCTYPE html>
<html lang="en">
<?php
$getsetting = getsetting($link);
$getsetting = json_decode($getsetting, true);
foreach ($getsetting as $getsinglesetting) {
    extract($getsinglesetting);
}
if ($_SESSION['admin_user_type'] == '0') {
    echo '<script>location.href="dashboard.php"</script>';
} else if ($on_maintenance == '0') {
    echo '<script>location.href="dashboard.php"</script>';
}
?>
<head>
    <title>Maintenance | <?php echo $portal_name ?></title>
    <meta name="keywords" content="<?php echo $page_title; ?> | Portal | <?php echo $portal_name; ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:title" content="EIPL Portal - <?php echo $page_title; ?>  | <?php echo $portal_name; ?>" />
    <meta property="og:url" content="<?php echo $base_url ?>" />
    <meta property="og:site_name" content="<?php echo $portal_name; ?> | <?php echo $page_title; ?> Page" />
    <?php echo '<link rel="canonical" href="' . $canonicalURL . '" />'; ?>
    <link href="assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
    <style>
        body {
            background-image: url(assets/media/maintanance.jpg) !important;
        }

        /* Replace 'Your Start Color' and 'Your End Color' with the desired colors */
        .gradient-text {
            font-size: 36px;
            font-weight: bold;
            background: linear-gradient(45deg, #a48020, #d76a53);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            display: inline-block;
            animation: textGradient 5s infinite linear;

        }

        @keyframes textGradient {
            0% {
                background-position: 0% 50%;
                color: #a48020 !important;
                /* Initial text color */
            }

            50% {
                background-position: 100% 50%;
                color: #d76a53 !important;
                /* Color at halfway of the animation */
            }

            100% {
                background-position: 0% 50%;
                color: #a48020 !important;
                /* Final text color (same as initial) */
            }
        }
    </style>
</head>

<body id="kt_body" class="app-blank bgi-size-cover bgi-position-center bgi-no-repeat">

    <div class="d-flex flex-column flex-root" id="kt_app_root">
        <div class="d-flex flex-column flex-center flex-column-fluid">
            <div class="d-flex flex-column flex-center text-center p-10">
                <div class="card card-flush w-lg-650px py-5">
                    <div class="card-body py-15 py-lg-20">

                        <div class="mb-10">
                            <img src="assets/media/under-maintenance.gif" class="mw-100 mh-300px img-fluid theme-light-show" alt="">
                        </div>
                        <form class="w-md-350px mb-2 mx-auto fv-plugins-bootstrap5 fv-plugins-framework" action="#" id="kt_coming_soon_form">
                            <div class="fv-row text-start fv-plugins-icon-container">
                                <div class="d-flex flex-column flex-md-row justify-content-center gap-3">
                                </div>
                                <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="/metronic8/demo1/assets/plugins/global/plugins.bundle.js"></script>
    <script src="/metronic8/demo1/assets/js/scripts.bundle.js"></script>


    <script src="/metronic8/demo1/assets/js/custom/authentication/sign-up/coming-soon.js"></script>



    <svg id="SvgjsSvg1001" width="2" height="0" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev" style="overflow: hidden; top: -100%; left: -100%; position: absolute; opacity: 0;">
        <defs id="SvgjsDefs1002"></defs>
        <polyline id="SvgjsPolyline1003" points="0,0"></polyline>
        <path id="SvgjsPath1004" d="M0 0 "></path>
    </svg>
</body>

</html>