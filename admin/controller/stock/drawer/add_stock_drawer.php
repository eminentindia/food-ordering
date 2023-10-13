<div id="add_stock_drawer" class="bg-body" data-kt-drawer="true" data-kt-drawer-name="chat" data-kt-drawer-activate="true" data-kt-drawer-overlay="true" data-kt-drawer-width="{default:'91%', 'md': '91%'}" data-kt-drawer-direction="end" data-kt-drawer-toggle="#add_stock_drawer_toggle" data-kt-drawer-close="#add_stock_drawer_close">
        <div class="card w-100 rounded-0" id="add_stock_drawer_messenger">
            <div class="card-header pe-5 themebg" id="add_stock_drawer_messenger_header ">
                <div class="card-title">
                    <div class="d-flex justify-content-center flex-column me-3">
                        <span href="#" class="fs-4 fw-bolder drawer_head me-1 text-white lh-1 text-white">Add Stock</span>
                    </div>
                </div>
                <form id="add_stock_drawer_submit" method="post" enctype="multipart/form-data">
                <div class="card-toolbar">
                    <div class="d-flex flex-stack me-4">
                        <button class="submitbtn" type="submit" data-kt-element="send">Submit <i class="fa-regular fa-square-check"></i></button>
                    </div>
                    <div class="btn btn-sm btn-icon btn-active-light-primary closebtn" id="add_stock_drawer_close">
                        <span class="svg-icon svg-icon-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black" />
                                <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black" />
                            </svg>
                        </span>
                    </div>
                </div>
            </div>
            <div class="card-body" id="add_stock_drawer_messenger_body">
                <div class="scroll-y me-n5 pe-5" data-kt-element="messages" data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-dependencies="#add_stock_drawer_messenger_header, #add_stock_drawer_messenger_footer" data-kt-scroll-wrappers="#add_stock_drawer_messenger_body" data-kt-scroll-offset="0px">
                    <div class="row mb-5">
                        <div class="col-md-6 fv-row fv-plugins-icon-container">
                            <label class="required fs-5 fw-semibold mb-2">First name</label>

                            <input type="text" class="form-control form-control-solid" placeholder="" name="first-name">
                            <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
                        </div>

                        <div class="col-md-6 fv-row fv-plugins-icon-container">
                            <label class="required fs-5 fw-semibold mb-2">Last name</label>

                            <input type="text" class="form-control form-control-solid" placeholder="" name="last-name">
                            <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="d-flex flex-column mb-5 fv-row fv-plugins-icon-container">
                        <label class="required fs-5 fw-semibold mb-2">Address Line 1</label>

                        <input class="form-control form-control-solid" placeholder="" name="address1">
                        <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
                    </div>
                    <div class="d-flex flex-column mb-5 fv-row fv-plugins-icon-container">
                        <label class="required fs-5 fw-semibold mb-2">Address Line 2</label>

                        <input class="form-control form-control-solid" placeholder="" name="address2">
                        <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
                    </div>
                    <div class="d-flex flex-column mb-5 fv-row fv-plugins-icon-container">
                        <label class="fs-5 fw-semibold mb-2">Town</label>

                        <input class="form-control form-control-solid" placeholder="" name="city">
                        <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
                    </div>
                    <div class="row g-9 mb-5">
                        <div class="col-md-6 fv-row fv-plugins-icon-container">
                            <label class="fs-5 fw-semibold mb-2">State / Province</label>

                            <input class="form-control form-control-solid" placeholder="" name="state">
                            <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
                        </div>

                        <div class="col-md-6 fv-row fv-plugins-icon-container">
                            <label class="fs-5 fw-semibold mb-2">Post Code</label>

                            <input class="form-control form-control-solid" placeholder="" name="postcode">
                            <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="fv-row mb-5">
                        <div class="d-flex flex-stack">
                            <div class="me-5">
                                <label class="fs-5 fw-semibold">Use as a billing adderess?</label>

                                <div class="fs-7 fw-semibold text-muted">If you need more info, please check budget planning</div>
                            </div>

                            <label class="form-check form-switch form-check-custom form-check-solid">
                                <input class="form-check-input" name="billing" type="checkbox" value="1" checked="checked">

                                <span class="form-check-label fw-semibold text-muted">
                                    Yes
                                </span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>