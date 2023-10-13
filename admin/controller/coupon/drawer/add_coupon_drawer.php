<div id="add_coupon_drawer" class="bg-body" data-kt-drawer="true" data-kt-drawer-name="chat" data-kt-drawer-activate="true" data-kt-drawer-overlay="true" data-kt-drawer-width="{default:'90%', 'md': '50%'}" data-kt-drawer-direction="end" data-kt-drawer-toggle="#add_coupon_drawer_toggle" data-kt-drawer-close="#add_coupon_drawer_close">
    <div class="card w-100 rounded-0" id="add_coupon_drawer_messenger">
        <form id="add_coupon_drawer_submit" method="post" enctype="multipart/form-data">
            <div class="card-header pe-5 themebg" id="add_coupon_drawer_messenger_header ">
                <div class="card-title">
                    <div class="d-flex justify-content-center flex-column me-3">
                        <span href="#" class="fs-4 fw-bolder drawer_head me-1 text-white lh-1 text-white">Add coupon</span>
                    </div>
                </div>
                <div class="card-toolbar">
                    <div class="d-flex flex-stack me-4">
                        <button class="submitbtn" type="submit" data-kt-element="send">Submit <i class="fa-regular fa-square-check"></i></button>

                    </div>
                    <div class="btn btn-sm btn-icon btn-active-light-primary closebtn" id="add_coupon_drawer_close">
                        <span class="svg-icon svg-icon-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black" />
                                <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black" />
                            </svg>
                        </span>
                    </div>
                </div>
            </div>
            <div class="card-body" id="add_coupon_drawer_messenger_body">
                <div class="scroll-y me-n5 pe-5" data-kt-element="messages" data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-dependencies="#add_coupon_drawer_messenger_header, #add_coupon_drawer_messenger_footer" data-kt-scroll-wrappers="#add_coupon_drawer_messenger_body" data-kt-scroll-offset="0px">
                    <div class="row mb-5">

                        <div class="form-group row mb-3">
                            <label for="code" class="col-sm-3 control-label col-form-label">Coupon Code</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control form-control-solid" name="coupon_code" id="coupon_code" required>
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label for="fname" class="col-sm-3 control-label col-form-label">Type</label>
                            <div class="col-sm-9" style="display: flex;gap: 10px;align-items: center;">
                                <div class="form-check">
                                <label class="form-check-label mb-0" for="customControlValidation1">   <input type="radio" class="form-check-input" name="coupon_type" id="customControlValidation1" name="radio-stacked" required value="P">
                                   Percent</label>
                                </div>
                                <div class="form-check">
                                <label class="form-check-label mb-0" for="customControlValidation2">  <input type="radio" class="form-check-input" name="coupon_type" id="customControlValidation2" name="radio-stacked" required value="F" checked>
                                   Number</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label for="min_value" class="col-sm-3 control-label col-form-label">Coupon Value</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control form-control-solid" name="coupon_value" id="coupon_value" required>
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="min_value" class="col-sm-3 control-label col-form-label">Cart Min Value</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control form-control-solid" name="cart_min_value" id="cart_min_value" required>
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="expired_on" class="col-sm-3 control-label col-form-label">Expired On</label>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <input required type="date" class="form-control form-control-solid" data-date-format='yyyy-mm-dd' placeholder="yyyy-mm-dd" name="expired_on" id="expired_on" />
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </form>
    </div>
</div>