<div class="modal fade " id="uploadempdocsmodal" tabindex="-1" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-xl modal-dialog-centered " role="document">
        <div class="modal-content">
            <div class="modal-body p-0 m-0">
                <form id="upload_emp_docs_form" method="post" enctype="multipart/form-data">
                    <div class="border border-dashed border-success px-8 py-8 bg-light-success" >
                        <div class="addhere">
                            <label class=" col-form-label fw-bold fs-6">
                                Choose Employee
                            </label>
                            <div class="fv-row fv-plugins-icon-container">
                                <select aria-label="Choose Employee" name="emp_id" id="emp_id" data-control="select2"  data-dropdown-parent="#uploadempdocsmodal" data-placeholder="Search Employee..." class="form-control" required onchange="handleSelectChange()">
                                    <option value="" selected disabled>Select Employee</option>
                                    <?php
                                    $sel = mysqli_query($link, "select * from admin Where admin_status='Active' ");
                                    while ($row = mysqli_fetch_assoc($sel)) {
                                    ?>
                                        <option <?php
                                                if (isset($_GET['user_id'])) {
                                                    if ($_GET['user_id'] == $row['admin_empid']) {
                                                        echo "selected";
                                                    }
                                                }
                                                ?> value="<?php echo trim($row['admin_empid']) ?>">
                                            <?php echo '<span style="font-weight:bold;white-space:nowrap">' . ucfirst($row['admin_name'] . ' - ' . $row['admin_empid']) . '</span>' ?>
                                        </option>
                                    <?php }
                                    ?>
                                </select>
                                <div class="fv-plugins-message-container invalid-feedback"></div>
                            </div>
                        </div>

                        <?php
                        include('connect/loader/spinner2.php');
                        ?>

                        <div id="docoutput" style="background: #ffffffc7;padding: 20px; display: flex;justify-content: space-between;flex-wrap: wrap;align-items: center;"></div>

                        <div class="mt-5" style="background: #e8fff3cc;padding: 20px;">
                            <button type="submit" class="btn btn-success btn-block">UPLOAD <i class="fa fa-upload" aria-hidden="true"></i></button>
                        </div>
                </form>
            </div>
        </div>

    </div>
</div>
</div>