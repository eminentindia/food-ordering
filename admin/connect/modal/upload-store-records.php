<style>
    .dz-default {
        padding: 50px;
        text-align: center;
        display: flex;
        margin: 0 auto;
        justify-content: center;
    }
</style>
<div class="modal fade" id="uploadstoreRecords" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg p-9">
        <div class="modal-content rounded">
            <div class="modal-header">
                <h2>Drag & Drop Records Here...</h2>

                <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                    <span class="svg-icon svg-icon-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black" />
                            <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black" />
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                </div>
                <!--end::Close-->
            </div>
            <div class="modal-body scroll-y" id="">
                <div id="content">
                    <form class="dropzone" id="dropzonee"></form>
                    <button id="upload_btn" class="btn btn-sm btn-primary mt-3">Upload</button>
                </div>
            </div>
        </div>
    </div>
    <!--end::Modal content-->
</div>
