<?php
$ATTENDENCE = false;
$defaultNotification = false;
switch (basename($_SERVER['PHP_SELF'])) {
    case "attendence.php":
        $ATTENDENCE = true;
        break;
    case "attendence-emp.php":
        $ATTENDENCE = true;
        break;
    default:
        $defaultNotification = true;
}
?>
<!-- //////salary slip notification    // -->
<?php
if ($ATTENDENCE) {
?>
    <button id="kt_explore_toggle" class="explore-toggle btn btn-sm bg-body btn-color-gray-700 btn-active-primary shadow-sm position-fixed px-5 fw-bolder zindex-2 top-50 mt-10 end-0 transform-90 fs-6 rounded-top-0" title="Notification & Alerts" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-trigger="hover">
        <span id="kt_explore_toggle_label">Notification & Alerts <span class="notification_count badge rounded-pill badge-success ms-2"></span></span>
    </button>
    <div id="kt_explore" class="bg-body" data-kt-drawer="true" data-kt-drawer-name="explore" data-kt-drawer-activate="true" data-kt-drawer-overlay="true" data-kt-drawer-width="{default:'350px', 'lg': '475px'}" data-kt-drawer-direction="end" data-kt-drawer-toggle="#kt_explore_toggle" data-kt-drawer-close="#kt_explore_close">
        <div class="card shadow-none rounded-0 w-100">
            <div class="card-header" id="kt_explore_header">
                <h3 class="card-title fw-bolder text-gray-700">Notification & Alerts
                    <span class="notification_count badge rounded-pill badge-success ms-2"></span>
                </h3>
                <div class="card-toolbar">
                    <button type="button" class="btn btn-sm btn-icon btn-active-light-primary me-n5" id="kt_explore_close">
                        <span class="svg-icon svg-icon-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black" />
                                <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black" />
                            </svg>
                        </span>
                    </button>
                </div>
            </div>
            <div class="card-body" id="kt_explore_body">
                <div class="notifcationloaderAnim" style="display: none;">
                    <div class="justify-content-center jimu-primary-loading"></div>
                </div>
                <div id="kt_explore_scroll" class="scroll-y me-n5 pe-5" data-kt-scroll="true" data-kt-scroll-height="auto" data-kt-scroll-wrappers="#kt_explore_body" data-kt-scroll-dependencies="#kt_explore_header" data-kt-scroll-offset="5px">
                    <div class="ATTENDENCE">

                    </div>
                </div>
            </div>
        </div>
    </div>
<?php }
?>
<!-- ////default notification // -->
<?php
if ($defaultNotification) {
?>
    <button id="kt_explore_toggle" class="explore-toggle btn btn-sm bg-body btn-color-gray-700 btn-active-primary shadow-sm position-fixed px-5 fw-bolder zindex-2 top-50 mt-10 end-0 transform-90 fs-6 rounded-top-0" title="Notification & Alerts" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-trigger="hover">
        <span id="kt_explore_toggle_label">Notification & Alerts</span>
    </button>
    <div id="kt_explore" class="bg-body" data-kt-drawer="true" data-kt-drawer-name="explore" data-kt-drawer-activate="true" data-kt-drawer-overlay="true" data-kt-drawer-width="{default:'350px', 'lg': '475px'}" data-kt-drawer-direction="end" data-kt-drawer-toggle="#kt_explore_toggle" data-kt-drawer-close="#kt_explore_close">
        <div class="card shadow-none rounded-0 w-100">
            <div class="card-header" id="kt_explore_header">
                <h3 class="card-title fw-bolder text-gray-700">Notification & Alerts <span class="notification_count badge rounded-pill badge-success ms-2"></span> </h3>
                <div class="card-toolbar">
                    <button type="button" class="btn btn-sm btn-icon btn-active-light-primary me-n5" id="kt_explore_close">
                        <span class="svg-icon svg-icon-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black" />
                                <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black" />
                            </svg>
                        </span>
                    </button>
                </div>
            </div>
            <div class="card-body" id="kt_explore_body">
                <div id="kt_explore_scroll" class="scroll-y me-n5 pe-5" data-kt-scroll="true" data-kt-scroll-height="auto" data-kt-scroll-wrappers="#kt_explore_body" data-kt-scroll-dependencies="#kt_explore_header" data-kt-scroll-offset="5px">
                    <div class="rounded border border-dashed border-gray-300 py-1 px-1 mb-2">
                        <div class="d-flex flex-stack">
                            <div class="d-flex flex-column">
                                <div class="d-flex align-items-center mb-1">
                                    <div class="fs-6 fw-bold text-gray-800 fw-bold mb-0 me-1">Custom License</div>
                                </div>
                                <div class="fs-7 text-muted">Reach us for custom license offers.</div>
                            </div>
                            <div class="text-nowrap">
                                <a href="https://keenthemes.com/contact/" class="btn btn-sm btn-success" target="_blank">Contact Us</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php }
?>