<style>
	.dz-default {
		padding: 50px;
		text-align: center;
		display: flex;
		margin: 0 auto;
		justify-content: center;
	}

	.floww {
		position: absolute;
		width: 100%;
		height: 100%;
		top: 0;
		left: 0;
		background: #ffffff85;
		z-index: 1;
		filter: blur(4px);
	}
</style>
<div class="modal fade" id="add_reimbursement_modal" tabindex="-1" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-xl ">
		<div class="modal-content border border-success border-dashed" style="background: linear-gradient(90deg, #fffefe 59%, #f6f3ff 100%) !important;">
			<div class="modal-header bg-white" style="background: #f3eeff !important; border-bottom: 1px solid #e4dcff;">
				<h2>Add New Expense</h2>
				<div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal" style="    background: #bfa9ff;">
					<span class="svg-icon svg-icon-1">
						<style>
							.svg-icon svg [fill]:not(.permanent):not(g) {
								fill: #ffffff !important;
							}
						</style>

						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
							<rect opacity="0.9" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="white" />
							<rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="white" />
						</svg>
					</span>
				</div>
			</div>
			<div class="modal-body scroll-y mx-2 my-2 formContainer">
				<form method="post" enctype="multipart/form-data" class="form" id="reimbursement_form" action="connect/reimbursement_upload.php" onsubmit="return ADDREIMBURESEMENT()">
					<div id="blurdiv"></div>
					<div class="row">
						<div class="col-md-4" style="z-index: 9;">
							<div class="d-flex flex-column mb-7 fv-row errordatediv">
								<label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
									<span class="required">Date Of Spent</span>
									<i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Date Of Spent"></i>
								</label>
								<input type="date" class="form-control datepickernew" placeholder="Date of Spent" name="date_of_spent" id="dateInput" />
								<span class="dateError"></span>
							</div>
						</div>
						<div class="col-md-4">
							<div class="d-flex flex-column mb-7 fv-row">
								<label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
									<span class="required">Client Name</span>
									<i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Client Name"></i>
								</label>
								<input type="text" class="form-control" placeholder="Client Name" name="client_name" />
							</div>
						</div>


						<div class="col-md-4">
							<div class="d-flex flex-column mb-7 fv-row">
								<label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
									<span class="required">Purpose Of Travel</span>
									<i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Purpose Of Travel"></i>
								</label>
								<input type="text" class="form-control" placeholder="Purpose Of Travel" name="purpose_of_travel" />
							</div>
						</div>

						<div class="col-md-4">
							<div class="d-flex flex-column mb-7 fv-row">
								<label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
									<span class="required">Travel From</span>
									<i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Travel From"></i>
								</label>
								<input type="text" class="form-control" placeholder="Travel From" name="travel_from" />
							</div>
						</div>
						<div class="col-md-4">
							<div class="d-flex flex-column mb-7 fv-row">
								<label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
									<span class="required">Travel To</span>
									<i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Travel To"></i>
								</label>
								<input type="text" class="form-control" placeholder="Travel To" name="travel_to" />
							</div>
						</div>
						<div class="col-md-4">
							<div class="d-flex flex-column mb-7 fv-row">
								<label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
									<span class="required">Travel By</span>
									<i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Travel By"></i>
								</label>
								<select name="travel_by" id="travel_by" class="form-control" data-dropdown-parent="#add_reimbursement_modal" required>
									<option value="" selected disabled>Select Option</option>
									<option value="Ola">Ola</option>
									<option value="Uber">Uber</option>
									<option value="Rapido">Rapido</option>
									<option value="Bike">Bike</option>
									<option value="Car">Car</option>
									<option value="Bus">Bus</option>
									<option value="Metro">Metro</option>
									<option value="Cab">Cab</option>
									<option value="Tram">Tram</option>
									<option value="TOTO">Toto</option>
									<option value="Train">Train</option>
									<option value="Auto">Auto</option>
									<option value="Motor Cycle">Motor Cycle</option>
									<option value="Lodge">Lodge</option>
									<option value="Ferry">Ferry</option>
									<option value="Self">Self</option>
									<option value="Rikshaw">Rikshaw</option>
								</select>

							</div>
						</div>
						<?php
						if (!checkLocationSession($link)) {
						?>
							<div class="col-md-3">
								<div class="d-flex flex-column mb-7 fv-row">
									<label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
										<span class="required">Distance (in Km)</span>
										<i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Distance"></i>
									</label>
									<input type="number" class="form-control" placeholder="Distance" required name="distance" />
								</div>
							</div>
							<div class="col-md-3">
								<div class="d-flex flex-column mb-7 fv-row">
									<label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
										<span class="required">Store Code</span>
										<i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Store Code"></i>
									</label>
									<input type="text" class="form-control" placeholder="Store Code" name="store_code" />
								</div>
							</div>
							<div class="col-md-3">
								<div class="d-flex flex-column mb-7 fv-row">
									<label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
										<span class="required">Licence Name</span>
										<i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Licence Name"></i>
									</label>
									<input type="text" class="form-control" placeholder="Licence Name" name="licence_name" />
								</div>
							</div>
							<div class="col-md-3">
								<div class="d-flex flex-column mb-7 fv-row">
									<label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
										<span class="required">Authority Name</span>
										<i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Authority Name"></i>
									</label>
									<input type="text" class="form-control" placeholder="Authority Name" name="authority_name" />
								</div>
							</div>
						<?php }
						?>

						<div class="row">
							<div class="col-lg-3 col-md-4 col-sm-6 col-6">
								<div class="d-flex flex-column mb-7 fv-row">
									<label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
										<span class="required">Food Claim</span>
										<i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Food Amount Claim"></i>
									</label>
									<input type="number" class="form-control form-control-solid" placeholder="Amount Claim" name="food" oninput="calculateTotalAmount()" style="    background: #e8fff3;" />
								</div>
							</div>
							<div class="col-lg-3 col-md-4 col-sm-6 col-6">
								<div class="d-flex flex-column mb-7 fv-row">
									<label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
										<span class="required">Stationery Claim</span>
										<i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Stationery Amount Claim"></i>
									</label>
									<input type="number" class="form-control form-control-solid" placeholder="Amount Claim" name="stationery" oninput="calculateTotalAmount()" style="    background: #e8fff3;" />
								</div>
							</div>
							<div class="col-lg-3 col-md-4 col-sm-6 col-6">
								<div class="d-flex flex-column mb-7 fv-row">
									<label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
										<span class="required">Hotel Claim</span>
										<i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Hotel Amount Claim"></i>
									</label>
									<input type="number" class="form-control form-control-solid" placeholder="Amount Claim" name="hotel" oninput="calculateTotalAmount()" style="    background: #e8fff3;" />
								</div>
							</div>
							<div class="col-lg-3 col-md-4 col-sm-6 col-6">
								<div class="d-flex flex-column mb-7 fv-row">
									<label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
										<span class="required">Affidavit Claim</span>
										<i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Affidavit Amount Claim"></i>
									</label>
									<input type="number" class="form-control form-control-solid" placeholder="Amount Claim" name="affidavit" oninput="calculateTotalAmount()" style="    background: #e8fff3;" />
								</div>
							</div>
							
							<div class="col-lg-3 col-md-4 col-sm-6 col-6">
								<div class="d-flex flex-column mb-7 fv-row">
									<label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
										<span class="required">Others Claim</span>
										<i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Others Amount Claim"></i>
									</label>
									<input type="number" class="form-control form-control-solid" placeholder="Amount Claim" name="other" oninput="calculateTotalAmount()" />

								</div>
							</div>

							<div class="col-lg-9 col-md-9 col-sm-9 col-12">
								<div class="d-flex flex-column mb-7 fv-row">
									<label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
										<span class="required">Other Amount Claim Reason</span>
										<i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Others Amount Claim"></i>
									</label>
									<input type="text" class="form-control form-control-solid" placeholder="Amount Claim Reason"  name="other_reason" />
								</div>
							</div>

							<div class="col-md-4">
								<div class="d-flex flex-column fv-row" style="border: 1px dashed green;margin-bottom: 10px;padding: 15px 8px;background: #ebffeb;">
									<label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
										<span class="required">Total Amount Claim</span>
										<i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Amount Claim"></i>
									</label>
									<input type="text" class="form-control form-control-solid" placeholder="Amount Claim"  name="amount_claim" readonly style="background: #aaffaa; color: black; font-weight: 700;" />
								</div>
							</div>
							<div class="col-md-8">
								<div class="d-flex flex-column mb-7 fv-row">
									<label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
										<span class="required">Remark</span>
										<i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Final Remark"></i>
									</label>
									<textarea class="form-control" placeholder="Remark"  name="final_remark"></textarea>
								</div>
							</div>
						</div>


						<div class="col-md-12">
							<div class="dropzone mt-3 bg-light-success border-success border-dashed" id="myDropzone">
							</div>
						</div>
					</div>

					<div class="text-center pt-15">
						<button type="submit" id="submit_reimbursement_form" class="btn btn-primary">
							<span class="indicator-label d-flex align-items-center gap-2">Submit <i class="fa-regular fa-circle-check"></i></span>
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>