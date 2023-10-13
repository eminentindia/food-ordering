
<!-- <a class="menu-link" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-trigger="hover" id="holiday_modal">Holidays</a> -->

<div id="kt_explore" class="bg-body mt-0" data-kt-drawer="true" data-kt-drawer-name="explore" data-kt-drawer-activate="true" data-kt-drawer-overlay="true" data-kt-drawer-width="{default:'100%', 'lg': '475px'}" data-kt-drawer-direction="end" data-kt-drawer-toggle="#holiday_modal" data-kt-drawer-close="#kt_explore_close" style="height: 100% !important;">
    <div class="card shadow-none rounded-0 w-100 position-relative">
        <div class="card-header " id="kt_explore_header">
            <h3 class="card-title fw-bolder text-gray-700">Holidays <span class="notification_count badge rounded-pill badge-success ms-2"></span>
                <?php
                if ($_SESSION['admin_user_type'] == 1 or $_SESSION['admin_user_type'] == 2) {
                ?>

                    <button class="btn btn-light ms-5 btn-sm showaddholiday" style="padding: 3px 10px;">...</button>

                <?php }
                ?>

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
        <div class="card-body " id="kt_explore_body">
            <div id="kt_explore_scroll" class="scroll-y me-n5 pe-5" data-kt-scroll="true" data-kt-scroll-wrappers="#kt_explore_body" data-kt-scroll-dependencies="#kt_explore_header" data-kt-scroll-offset="5px">

            <?php
                if ($_SESSION['admin_user_type'] == 1 or $_SESSION['admin_user_type'] == 2) {
                ?>
                    <div class="addholiday" style="display: none;">
                    <form id="holidayForm" method="post" class="p-4 border bg-light-warning border-warning border-dashed" style="padding: 20px;margin-bottom: 25px;width: 100%;">
                        <div class="d-flex flex-column mb-2 fv-row fv-plugins-icon-container">
                            <label class="d-flex align-items-center fs-6 fw-bold form-label f12">
                                <span class="required f12">EVENT NAME</span>
                                <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Event Name" data-bs-original-title="Event Name"></i>
                            </label>
                            <input type="text" class="form-control form-control-sm" name="event_name">
                            <div class="fv-plugins-message-container invalid-feedback"></div>
                        </div>
                        <div class="d-flex flex-column mb-2 fv-row fv-plugins-icon-container">
                            <label class="d-flex align-items-center fs-6 fw-bold form-label  f12">
                                <span class="required f12">DATE</span>
                                <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Holiday Date" data-bs-original-title="Holiday Date"></i>
                            </label>
                            <input type="date" class="form-control-sm form-control" name="holiday_date">
                            <div class="fv-plugins-message-container invalid-feedback"></div>
                        </div>


                        <div class=" mb-3">
                            <button class="btn btn-warning btn-sm" id="addholidaysubmit">ADD</button>
                        </div>
                    </form>
                </div>
                <?php }
                ?>
                <div class="row" id="holidayslist">
                </div>
            </div>
        </div>
        <!-- //loader  -->
    <?php include('connect/loader/spinner-left.php'); ?>
    </div>
</div>