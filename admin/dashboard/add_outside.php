<div id="kt_explore" class="bg-body mt-0" data-kt-drawer="true" data-kt-drawer-name="explore" data-kt-drawer-activate="true" data-kt-drawer-overlay="true" data-kt-drawer-width="{default:'100%', 'lg': '475px'}" data-kt-drawer-direction="end" data-kt-drawer-toggle="#add_outside_modal" data-kt-drawer-close="#kt_explore_close">
    <div class="card shadow-none rounded-0 w-100 position-relative">
        <div class="card-header " id="kt_explore_header">
            <h3 class="card-title fw-bolder text-gray-700">Official Visit <span class="notification_count badge rounded-pill badge-success ms-2"></span>
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
                <form method="post" id="add_outside">
                    <div class="d-flex flex-column border-bottom  mb-8 fv-row">
                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                            <span class="required">Date</span>
                        </label>
                        <input type="text" class="form-select form-select-solid fw-bolder" name="daterange" placeholder="Pick date Range" id="kt_daterangepicker_1">
                    </div>
                    <div class="d-flex flex-column border-bottom  mb-8 fv-row">
                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                            <span class="required">Employee</span>
                            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="It will updated in the attendance also !!"></i>
                        </label>
                        <?php
                        $employee = '<select name="emp_id" class="form-control" data-control="select2" >';
                        $get = "SELECT * FROM admin WHERE admin_status='Active'";
                        $getresult = $link->query($get);
                        if ($getresult->num_rows > 0) {
                            while ($getrow = $getresult->fetch_assoc()) {
                                $employee .= "<option value='" . $getrow['admin_empid'] . "' >" . $getrow['admin_name'] . " &lt;" . $getrow['admin_empid'] . "&gt;</option>";
                            }
                        }
                        $employee .= "</select>";
                        echo $employee;
                        ?>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
                <div class="card-body p-1 border  border-dark border-dashed my-5">
                    <div>
                        <div id="export"></div>
                    </div>
                    <table id="maketable" class="table nowrap table-striped table-bordered  ">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th>Employee Name</th>
                                <th>Employee Code</th>
                                <th>From</th>
                                <th>To</th>
                                <th>Added On</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="data"></tbody>
                    </table>
                </div>
            </div>
        </div>
        <?php include('connect/loader/spinner-left.php'); ?>
    </div>
</div>