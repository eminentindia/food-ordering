<div class="modal fade" id="addgallerymodal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitleId">ADD</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="connect/ajax/add_gallery_local.php" enctype="multipart/form-data" method="post" id="uploadForm">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="" class="form-label">Event Name</label>
                        <select class="form-select form-select-solid form-select-lg" name="event_name" id="event_name">
                            <option value="" selected>Select one</option>
                            <?php
                            $sel = "SELECT * FROM gallery_events";
                            $f = mysqli_query($link, $sel);
                            while ($r = mysqli_fetch_assoc($f)) {
                            ?>
                                <option value="<?php echo $r['EventName'] ?>" selected><?php echo $r['EventName'] ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="mb-3" style="padding: 30px; padding-top: 0;">
                    <div class="dropzone p-5 d-flex justify-content-center flex-wrap" id="myDropzone"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Upload</button>
                </div>
            </form>

        </div>
    </div>
</div>