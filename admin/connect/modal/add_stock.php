<div class="modal fade" id="add_stock_modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header" id="kt_modal_new_address_header">
                <h2>Add New Stock</h2>
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
                <form id="stockForm" class="form fv-plugins-bootstrap5 fv-plugins-framework">
                    <div class="row mb-5">
                        <div class="col-md-12 fv-row mb-4">
                            <label class="required fs-5 fw-bold mb-2">Device Name</label>
                            <select name="div_id" class="form-control form-control-solid" required data-control="select2" data-dropdown-parent="#add_stock_modal">
                                <option value="" selected disabled> Select Device name</option>
                                <?php
                                $sql = "SELECT * FROM devices";
                                $result = $link->query($sql);
                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        echo "<option value=" . $row['div_id'] . ">" . $row['div_name'] . "</option>";
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-md-12 fv-row">
                            <label class="required fs-5 fw-bold mb-2">Quantity</label>
                            <input type="number" name="div_qty" placeholder="Quantity"
                                class="form-control form-control-solid" required>
                        </div>
                    </div>
            </div>
            <div class="modal-footer flex-center">
                <button type="submit" id="kt_modal_new_address_submit" class="btn btn-primary">
                    <span class="indicator-label">Submit</span>
                </button>
            </div>
            </form>
        </div>
    </div>
</div>