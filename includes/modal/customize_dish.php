<!-- Modal -->
<style>
    /* CSS for Zoom-in Effect */
    .zoom-in {
        animation: zoomIn 0.3s ease forwards;
    }

    @keyframes zoomIn {
        from {
            transform: scale(0.5);
            opacity: 0;
        }

        to {
            transform: scale(1);
            opacity: 1;
        }
    }

    .customizeHTML {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        padding: 0;
    }
</style>
<div class="modal fade" id="customize_modal_ID" tabindex="-1" role="dialog" aria-labelledby="customizemodalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content zoom-in">
            <div class="modal-header d-block">
                <h5 class="modal-title text-center" style="text-transform: uppercase;
    font-family: 'Kalam', cursive !important;font-weight: 700;" id="customizemodalTitle"></h5>
                <button type="button" class="" data-bs-dismiss="modal" aria-label="Close" style="   position: absolute;top: 10px;right: 10px;background: #FF5722;opacity: 1;color: white;border: 1px;border-radius: 50%;padding: 4px;width: 30px;height: 30px">X</button>
            </div>
            <div class="modal-body">
                <div class="container-fluid customizeHTML">

                </div>
            </div>
            <div class="modal-footer p-0">
                <button type="button" class="btn btn-success w-100">Add TO Cart <img width="25px" src="<?php echo SITE_PATH ?>images/shopping-cart-white.png" alt=""></button>
            </div>
        </div>
    </div>
</div>