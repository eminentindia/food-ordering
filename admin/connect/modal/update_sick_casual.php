<div class="modal fade" id="update_sick_casual" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false"
    role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitleId">Update Casual Sick Leave</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form  method="post" id="UpdateSickLeave">
                <div class="modal-body">
                    <div class="d-flex flex-column border-bottom  mb-8 fv-row">
                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                            <span class="required">Employee</span>
                            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                                title="Specify a target name for future usage and reference"></i>
                        </label>
                        <?php
                        $employee = '<select name="emp_id" class="form-control" data-control="select2">';
                        $get = "SELECT * FROM admin";
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
                    <div class="d-flex flex-column border-bottom  mb-8 fv-row">
                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                            <span class="required">Date</span>
                            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Date"></i>
                        </label>
                        <input type="date" class="form-control  fw-bolder" name="date" placeholder="Pick a date">
                    </div>

                    <div class="d-flex flex-column border-bottom  mb-8 fv-row">
                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                            <span class="required">Casual Leave</span>
                            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                                title="Casual Leave"></i>
                        </label>
                        <input type="text" class="form-control fw-bolder" name="casual_leave"
                            placeholder="Casual Leave">
                    </div>
                    <div class="d-flex flex-column border-bottom  mb-8 fv-row">
                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                            <span class="required">Sick Leave</span>
                            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                                title="Sick Leave"></i>
                        </label>
                        <input type="text" class="form-control fw-bolder" name="sick_leave" placeholder="Sick Leave">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save</button>
                </div>
            </form>

        </div>
    </div>
</div>