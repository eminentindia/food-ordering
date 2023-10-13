<div class="modal fade" id="usertypemodal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-md modal-dialog-zoom" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitleId">Change User Type</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form enctype="multipart/form-data" method="post">
                    <input type="hidden" name="admin_user_id">
                    <div class="d-flex align-items-center justify-content-between gap-4">
                        <button type="button" name="admin_user_type" value="0" class="badge rounded-pill bg-primary cursor-pointer border-0 w-100 p-4 " onclick="getUserType(0)">DEVELOPER</button>
                        <button type="button" name="admin_user_type" value="1" class="badge rounded-pill bg-success cursor-pointer border-0 w-100 p-4 " onclick="getUserType(1)">ADMIN</button>
                        <button type="button" name="admin_user_type" value="2" class="badge rounded-pill bg-warning cursor-pointer border-0 w-100 p-4 " onclick="getUserType(2)">USER</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>