<style>
    .center-radio {
        display: flex;
        align-items: center;
        gap: 5px;
    }
</style>
<div id="kt_explore" class="bg-body mt-0" data-kt-drawer="true" data-kt-drawer-name="explore" data-kt-drawer-activate="true" data-kt-drawer-overlay="true" data-kt-drawer-width="{default:'350px', 'lg': '550px'}" data-kt-drawer-direction="end" data-kt-drawer-toggle="#add_leave_modal" data-kt-drawer-close="#kt_explore_close">
    <div class="card shadow-none rounded-0 w-100 position-relative">
        <div class="card-header " id="kt_explore_header">
            <h3 class="card-title fw-bolder text-gray-700">Add Leave <span class="notification_count badge rounded-pill badge-success ms-2"></span>
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
            <div id="kt_explore_scroll" class="scroll-y me-n5 pe-5" data-kt-scroll="true" data-kt-scroll-height="auto" data-kt-scroll-wrappers="#kt_explore_body" data-kt-scroll-dependencies="#kt_explore_header" data-kt-scroll-offset="5px">

                <form id="leaveForm" class="form fv-plugins-bootstrap5 fv-plugins-framework">
                    <div class="d-flex flex-column mb-7 fv-row fv-plugins-icon-container">
                        <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                            <span class="required">Leave Date</span>
                            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="" data-bs-original-title="Leave Date" aria-label="Specify a card holder's name"></i>
                        </label>
                        <input required type="text" class="form-select flatpicker form-select-solid fw-bolder form-control form-control-solid cursor-pointer" name="leave_date" placeholder="Pick date" id="flatpicker">

                    </div>
                    <div class="d-flex flex-column fv-row fv-plugins-icon-container">
                        <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                            <span class="required">Reason</span>
                            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="" data-bs-original-title="Leave Reason" aria-label="Specify a card holder's name"></i>
                        </label>
                        <textarea required name="reason" class="form-control-solid form-control"></textarea>
                        <div class="fv-plugins-message-container invalid-feedback"></div>
                    </div>
                    <?php
                    if (checkOnlyAdminSession()) { //if admin add leave
                    ?>
                        <div class="d-flex flex-column border-bottom mb-8 fv-row">
                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                <span class="required">Employee</span>
                                <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Specify a target name for future usage and reference"></i>
                            </label>
                            <?php
                            $employee = '<select name="emp_id" class="form-control" data-control="select2" required>';
                            $employee .= '<option value="">Please choose employee</option>'; // Add the "Please choose employee" option
                            $get = "SELECT * FROM admin  WHERE admin_status='Active'   ";
                            $getresult = $link->query($get);
                            if ($getresult->num_rows > 0) {
                                while ($getrow = $getresult->fetch_assoc()) {
                                    $employee .= "<option value='" . $getrow['admin_empid'] . "'>" . $getrow['admin_name'] . " &lt;" . $getrow['admin_empid'] . "&gt;</option>";
                                }
                            }
                            $employee .= "</select>";
                            echo $employee;
                            ?>
                        </div>
                    <?php } else {
                    ?>
                        <div class="d-flex flex-column border-bottom mb-8 fv-row">
                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                <span class="required">Employee</span>
                                <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Specify a target name for future usage and reference"></i>
                            </label>
                            <?php
                            $employee = '<select name="emp_id" class="form-control" data-control="select2" required>';
                            $employee .= '<option value="">Please choose employee</option>'; // Add the "Please choose employee" option
                            $sel = "SELECT * FROM expense_app WHERE exp_a_emp='" . $_SESSION['admin_id'] . "'";
                            $f = mysqli_query($link, $sel);
                            $r = mysqli_fetch_assoc($f);
                            $region = $r['exp_a_reg'];
                            $get = "SELECT * FROM admin  WHERE admin.admin_region= '" . $region . "' AND admin_status='Active'   ";
                            $getresult = $link->query($get);
                            if ($getresult->num_rows > 0) {
                                while ($getrow = $getresult->fetch_assoc()) {
                                    $employee .= "<option value='" . $getrow['admin_empid'] . "'>" . $getrow['admin_name'] . " &lt;" . $getrow['admin_empid'] . "&gt;</option>";
                                }
                            }
                            $employee .= "</select>";
                            echo $employee;
                            ?>
                        </div>
                    <?php }

                    ?>

                    <div class="d-flex flex-column fv-row fv-plugins-icon-container border border-dashed bg-light-success border-success p-3">
                        <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                            <span class="required">Status</span>
                            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="" data-bs-original-title="Leave Status" aria-label="Assign leave status"></i>
                        </label>
                        <div class="d-flex  align-items-center " style="flex-wrap: wrap;overflow: auto;flex: 0 0 auto;gap: 20px;">
                            <label style="width:auto !Important; cursor:pointer !Important">
                                <div class="center-radio"> <input type="radio" value="CASUALLEAVE" id="" name="status">Casual Leave</div>
                            </label>
                            <label style="width:auto !Important; cursor:pointer !Important">
                                <div class="center-radio"> <input type="radio" value="SICKLEAVE" id="" name="status">Sick Leave</div>
                            </label>
                            <label style="width:auto !Important; cursor:pointer !Important">
                                <div class="center-radio"> <input type="radio" value="PRESENT" id="" name="status">Present</div>
                            </label>
                            <label style="width:auto !Important; cursor:pointer !Important">
                                <div class="center-radio"> <input type="radio" value="ABSENT" id="" name="status">Absent</div>
                            </label>
                            <label style="width:auto !Important; cursor:pointer !Important">
                                <div class="center-radio"> <input type="radio" value="SHORTLEAVE" id="" name="status">Short Leave</div>
                            </label>
                            <label style="width:auto !Important; cursor:pointer !Important">
                                <div class="center-radio"> <input type="radio" value="HALFDAY" id="" name="status">Half Day</div>
                            </label>
                            <label style="width:auto !Important; cursor:pointer !Important">
                                <div class="center-radio"> <input type="radio" value="FESTIVEHOLIDAY" id="" name="status">Holiday</div>
                            </label>
                        </div>
                        <div class="fv-plugins-message-container invalid-feedback"></div>
                    </div>
                    <div class="text-center pt-5">
                        <button type="submit" id="submitleave" class="btn btn-primary">
                            <span class="indicator-label">Submit</span>
                        </button>
                    </div>
                </form>




            </div>
        </div>
        <?php include('connect/loader/spinner-left.php'); ?>
    </div>
</div>