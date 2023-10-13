<div id="leaveModal" class="bg-body" data-kt-drawer="true" data-kt-drawer-name="explore" data-kt-drawer-activate="true" data-kt-drawer-overlay="true" data-kt-drawer-width="{default:'350px', 'lg': '475px'}" data-kt-drawer-direction="end" data-kt-drawer-toggle="#kt_explore_toggle" data-kt-drawer-close="#kt_explore_close">
    <div class="card shadow-none rounded-0 w-100" style="background-color: #f3f4f7 !important; background-image: url(assets/images/tree.svg) !important;background-size: auto; background-repeat: no-repeat;background-attachment: fixed; background-position: bottom right; min-height: 100vh !IMPORTANT;">
        <div class="card-header" id="kt_explore_header">
            <h3 class="card-title fw-bolder text-gray-700">Leave <span class="notification_count badge rounded-pill badge-success ms-2"></span> </h3>
            <div class="card-toolbar">
                <button type="button" class="btn btn-sm btn-icon btn-active-light-primary me-n5 btn-primary text-white" id="kt_explore_close">
                    <span class="svg-icon svg-icon-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black" />
                            <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black" />
                        </svg>
                    </span>
                </button>
            </div>
        </div>
        <div class="card-body" id="kt_explore_body" style="    padding-top: 1.2rem;">
            <div id="kt_explore_scroll" class="scroll-y me-n5 pe-5" data-kt-scroll="true" data-kt-scroll-height="auto" data-kt-scroll-wrappers="#kt_explore_body" data-kt-scroll-dependencies="#kt_explore_header" data-kt-scroll-offset="5px">
          <div class="viewleaveDiv">

          </div>
            </div>
        </div>
    </div>
</div>