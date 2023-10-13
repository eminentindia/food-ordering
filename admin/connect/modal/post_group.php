<div class="modal fade" tabindex="-1" id="groupPostModal">
    <div class="modal-dialog modal-dialog-centered modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="fa fa-users" aria-hidden="true"></i> Group Post</h5>
                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                    <span class="svg-icon fs-2x"></span>
                </div>
            </div>
            <div class="modal-body" style="border: 1px solid lightgoldenrodyellow;padding: 10px 20px; margin: 0; background: linear-gradient(0deg, #ddf0ff 0%, #ffffff 60%) !important;">
                <div class="">
                    <?php
                    $employee = '<select name="emp_department" class="text-gray-900 text-hover-primary fs-6 fw-bolder cursor-pointer" style="font-size: 11px !important" data-control="select2" multiple="multiple"  data-dropdown-parent="#groupPostModal" data-placeholder="Select a department" data-allow-clear="true" id="emp_department">';
                    $get = "SELECT admin_department FROM admin GROUP BY admin_department;";
                    $getresult = $link->query($get);

                    $defaultOption = '<option value="" class="text-gray-900 text-hover-primary fs-6 fw-bolder">';
                    $defaultOption .= '<i class="fa fa-users" aria-hidden="true"></i> Group';
                    $defaultOption .= '</option>';

                    $employee .= $defaultOption;

                    if ($getresult->num_rows > 0) {
                        while ($getrow = $getresult->fetch_assoc()) {
                            $employee .= "<option value='" . $getrow['admin_department'] . "'>" . $getrow['admin_department'] . "</option>";
                        }
                    }
                    $employee .= "</select>";
                    echo $employee;
                    ?>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-bs-dismiss="modal">Save</button>
            </div>
        </div>
    </div>
</div>