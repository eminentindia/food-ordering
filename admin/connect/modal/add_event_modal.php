<div class="modal fade" id="addeventmodal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitleId">ADD EVENT</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form enctype="multipart/form-data" method="post" id="addEventForm">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="" class="form-label">Event Name</label>
                        <input type="event_name" name="event_name" id="eventName" required class="form-control" placeholder="Please Enter Event Name">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Event Thumbnail <span class="text-danger">(500px*350px)</span> </label>
                        <input type="file" name="event_image" id="eventFile" required class="form-control" placeholder="Please Choose Event Image">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary addevent">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>