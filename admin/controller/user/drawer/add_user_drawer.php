<div id="add_user_drawer" class="bg-body" data-kt-drawer="true" data-kt-drawer-name="chat" data-kt-drawer-activate="true" data-kt-drawer-overlay="true" data-kt-drawer-width="{default:'90%', 'md': '50%'}" data-kt-drawer-direction="end" data-kt-drawer-toggle="#add_user_drawer_toggle" data-kt-drawer-close="#add_user_drawer_close">
    <div class="card w-100 rounded-0" id="add_user_drawer_messenger">
        <form id="add_user_drawer_submit" method="post" enctype="multipart/form-data">
            <div class="card-header pe-5 themebg" id="add_user_drawer_messenger_header ">
                <div class="card-title">
                    <div class="d-flex justify-content-center flex-column me-3">
                        <span href="#" class="fs-4 fw-bolder drawer_head me-1 text-white lh-1 text-white">Add user</span>
                    </div>
                </div>
                <div class="card-toolbar">
                    <div class="d-flex flex-stack me-4">
                        <button class="submitbtn" type="submit" data-kt-element="send">Submit <i class="fa-regular fa-square-check"></i></button>
                    </div>
                    <div class="btn btn-sm btn-icon btn-active-light-primary closebtn" id="add_user_drawer_close">
                        <span class="svg-icon svg-icon-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black" />
                                <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black" />
                            </svg>
                        </span>
                    </div>
                </div>
            </div>
            <div class="card-body" id="add_user_drawer_messenger_body">
                <div class="scroll-y me-n5 pe-5" data-kt-element="messages" data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-dependencies="#add_user_drawer_messenger_header, #add_user_drawer_messenger_footer" data-kt-scroll-wrappers="#add_user_drawer_messenger_body" data-kt-scroll-offset="0px">
                    <div class="row mb-5">
                        <div class="col-md-3 fv-row fv-plugins-icon-container">
                            <label class="required fs-5 fw-semibold mb-2 text-capitalize">Full name</label>
                            <input type="text" class="form-control form-control-solid" placeholder="Full Name" required name="admin_name">
                        </div>
                        <div class="col-md-3 fv-row fv-plugins-icon-container">
                            <label class="required fs-5 fw-semibold mb-2 text-capitalize">Mobile</label>
                            <input type="text" class="form-control form-control-solid" placeholder="Mobile Number" required name="admin_mobile">
                        </div>
                        <div class="col-md-3 fv-row fv-plugins-icon-container">
                            <label class="required fs-5 fw-semibold mb-2 text-capitalize">Email</label>
                            <input type="text" class="form-control form-control-solid" placeholder="Email" required name="admin_email">
                        </div>
                        <div class="col-md-3 fv-row fv-plugins-icon-container">
                            <label class="fs-5 fw-semibold mb-2">DOB</label>
                            <input class="form-control form-control-solid" type="date" placeholder="" required name="dob">
                        </div>
                    </div>
                    <div class="d-flex flex-column mb-5 fv-row fv-plugins-icon-container">
                        <label class="required fs-5 fw-semibold mb-2 text-capitalize">Current Address</label>
                        <input class="form-control form-control-solid" placeholder="Current Address" name="current_address">
                    </div>
                    <div class="d-flex flex-column mb-5 fv-row fv-plugins-icon-container">
                        <label class="required fs-5 fw-semibold mb-2 text-capitalize">Permanent Address</label>
                        <input class="form-control form-control-solid" placeholder="Permanent Address" name="permanent_address">
                    </div>
                    <div class="radio-inputs">
                        <label class="radio">
                            <input type="radio" name="admin_user_type" value="1">
                            <span class="name">ADMIN</span>
                        </label>
                        <label class="radio">
                            <input type="radio" name="admin_user_type" value="2" checked>
                            <span class="name">USER</span>
                        </label>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>