<div class="modal fade" id="assign_device_modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header" id="assign_device_modal_header">
                <h2>Assign Device</h2>
                <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                    <span class="svg-icon svg-icon-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1"
                                transform="rotate(-45 6 17.3137)" fill="black" />
                            <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)"
                                fill="black" />
                        </svg>
                    </span>
                </div>
            </div>
            <div class="modal-body py-10 px-lg-8">
                <form id="assign_DeviceForm" class="form fv-plugins-bootstrap5 fv-plugins-framework">
                    <div class="row mb-5">
                        <div class="col-md-6 fv-row mb-4">
                            <label class="required fs-5 fw-bold mb-2">Seat No.</label>
                            <select name="value1" class="form-control form-control-solid" required
                                data-control="select2" data-dropdown-parent="#assign_device_modal"
                                data-placeholder=" Select Seat No...">
                                <option value=""> Select Seat No</option>
                                <option value="Server Room">Server Room</option>
                                <option value="200 Recption">200 Reception</option>
                                <?php
                                for ($i = 201; $i < 247; $i++) {
                                    echo "<option value='Common " . $i . "'>Common " . $i . "</option>";
                                }
                                ?>
                                <option value="247 Cabin 1">247 Cabin 1</option>
                                <option value="248 Cabin 2">248 Cabin 2</option>
                                <option value="249 Cabin 2">249 Cabin 2</option>
                                <option value="250 Cabin 2">250 Cabin 2</option>
                                <option value="251 Cabin 2">251 Cabin 2</option>
                                <option value="252 Cabin 3">252 Cabin 3</option>
                                <option value="253 Cabin 3">253 Cabin 3</option>
                                <option value="Confrence Hall">Conference Hall</option>
                                <option value="Field Employee">Field Employee</option>
                                <option value="Work From Home">Work From Home</option>
                            </select>
                        </div>
                        <div class="col-md-6 fv-row mb-4">
                            <label class="required fs-5 fw-bold mb-2">Select Employee</label>
                            <select name="value2" class="form-control form-control-solid" required
                                data-control="select2" data-dropdown-parent="#assign_device_modal"
                                data-placeholder="Select Employee...">
                                <option value=""> Select Employee</option>
                                <?php
                                $sql = "SELECT * FROM admin ORDER BY admin_name ASC";
                                $result = $link->query($sql);
                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        echo "<option value=" . $row['admin_id'] . ">" . $row['admin_name'] . "</option>";
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-md-6 fv-row mb-4">
                            <label class="required fs-5 fw-bold mb-2">Devices Allotted</label>
                            <select name="value3" class="form-control form-control-solid" required
                                data-control="select2" data-dropdown-parent="#assign_device_modal"
                                data-placeholder="Select Device Name...">
                                <option value=""> Select Device Name</option>
                                <?php
                                $sql = "SELECT * FROM devices WHERE div_qty!=0";
                                $result = $link->query($sql);
                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        echo "<option value=" . $row['div_id'] . ">" . $row['div_name'] . " | A : " . $row['div_qty'] . "</option>";
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-md-6 fv-row mb-4">
                            <label class="required fs-5 fw-bold mb-2">Assign Date</label>
                            <input type="date" name="value4" class="form-control form-control-solid" required>
                        </div>
                        <div class="col-md-12 fv-row">
                            <label class="required fs-5 fw-bold mb-2">Model No / Definition / Remarks</label>
                            <input type="text" name="value5" class="form-control form-control-solid" required>
                        </div>
                    </div>
            </div>
            <div class="modal-footer flex-center">
                <button type="submit" id="assign_device_modal_submit" class="btn btn-primary">
                    <span class="indicator-label">Submit</span>
                </button>
            </div>
            </form>
        </div>
    </div>
</div>