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
<div class="modal fade" id="edit_reimbursement_modal" tabindex="-1" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-xl ">
		<div class="modal-content border border-success border-dashed" style="background: linear-gradient(90deg, #fffefe 59%, #f6f3ff 100%) !important;">
			<div class="modal-header bg-white" style="background: #f3eeff !important; border-bottom: 1px solid #e4dcff;">
				<h2>Edit Expense</h2>
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

			<?php include('connect/loader/spinner2.php') ?>

			<div class="modal-body scroll-y mx-2 my-2 formContainer editcontainer">
				
			</div>
		</div>
	</div>
</div>