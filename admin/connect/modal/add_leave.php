<div class="modal fade" id="add_leave_modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h2>Add Leave</h2>
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
            <div class="modal-body scroll-y m-5">
                <form id="leaveForm" class="form fv-plugins-bootstrap5 fv-plugins-framework">
                    <div class="d-flex flex-column mb-7 fv-row fv-plugins-icon-container">
                        <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                            <span class="required">Leave Date</span>
                            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title=""
                                data-bs-original-title="Leave Date" aria-label="Specify a card holder's name"></i>
                        </label>
                        <input required type="text"
                            class="form-select form-select-solid fw-bolder form-control form-control-solid cursor-pointer"
                            name="leave_date" placeholder="Pick date range" id="kt_daterangepicker_1">

                    </div>
                    <div class="d-flex flex-column fv-row fv-plugins-icon-container">
                        <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                            <span class="required">Reason</span>
                            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title=""
                                data-bs-original-title="Leave Reason" aria-label="Specify a card holder's name"></i>
                        </label>
                        <textarea required name="reason" class="form-control-solid form-control"></textarea>
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
    </div>
</div>