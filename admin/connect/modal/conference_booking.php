

<div class="modal fade" id="conferencemodal" tabindex="-1" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitleId">Conference Booking</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="p-3" method="POST" id="conferenceFORM">
                    <div class="form-group row mb-3">
                        <label class="col-sm-3 control-label text-sm-left pt-1">Event Lable</label>
                        <div class="col-sm-9">
                            <select class="form-control" required name="value1">
                                <option value="" selected disabled>Select Meeting Type</option>
                                <option value="fc-event-primary">Client/Virtual Meeting</option>
                                <option value="fc-event-warning">Group Meeting</option>
                                <option value="fc-event-danger">Urgent Meeting</option>
                                <option value="fc-event-info">Other</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label class="col-sm-3 control-label text-sm-left pt-1">Agenda Of Meeting</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" maxlength="20" required name="value2">
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label class="col-sm-3 control-label text-sm-left pt-1">Meeting Details</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="value3" required>
                        </div>
                    </div>
                    <!-- <div class="form-group row mb-3">
                        <label class="col-sm-3 control-label text-sm-left pt-1">Person Involved</label>
                        <div class="col-sm-9">
                            <select class="form-control col-lg-12" multiple="multiple" name="value7[]" data-control="select2" multiple="multiple" data-dropdown-parent="#conferencemodal" required>
                                <?php
                                $sql = "SELECT * FROM admin ORDER BY admin_name ASC";
                                $result = $link->query($sql);
                                while ($row = $result->fetch_assoc()) {
                                    echo "<option value='" . $row['admin_empid'] . "'>" . $row['admin_name'] . '-' . $row['admin_empid'] . "</option>";
                                } ?>
                            </select>
                        </div>
                    </div> -->

                    <div class="form-group row mb-3">
                        <label class="col-sm-3 control-label text-sm-left pt-1">Person Involved</label>
                        <div class="col-sm-9">
                            <!-- <select class="form-control col-lg-12" multiple="multiple" id="value7" name="value7[]" data-control="select2" multiple="multiple" data-dropdown-parent="#conferencemodal" required> -->

                                <?php
                                $sql = "SELECT * FROM admin ORDER BY admin_name ASC";
                                $result = $link->query($sql);
                                while ($row = $result->fetch_assoc()) {
                                    echo "<option value='" . $row['admin_empid'] . "'>" . $row['admin_name'] . '-' . $row['admin_empid'] . "</option>";
                                } ?>


                            </select>
                        </div>
                    </div>

                    <div class="form-group row mb-3">
                        <label class="col-sm-3 control-label text-sm-left pt-1">Scheduled Date</label>
                        <div class="col-sm-9">
                            <input type="date" id='userdate' onchange='TDate()' class="form-control" name="value4" required>
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <div class="col-sm-6">
                            <label class="col-sm-12 control-label">Meeting Starting From</label>
                            <div class="input-group">
                                <span class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="far fa-clock"></i>
                                    </span>
                                </span>
                                <input type="time" min="10:00" max="18:00" class="form-control form-control-sm" name="value5" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label class="col-sm-12 control-label">Meeting End On </label>
                            <div class="input-group">
                                <span class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="far fa-clock"></i>
                                    </span>
                                </span>
                                <input type="time" min="10:00" max="18:00" class="form-control form-control-sm" name="value6" required>
                            </div>
                        </div>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success" name="shedulemeeting">BOOK NOW</button>
            </div>
            </form>
        </div>
    </div>
</div>