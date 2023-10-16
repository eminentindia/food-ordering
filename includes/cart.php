
<aside id="sidebar-cart">
    <main>






        <div id="cart-container">
            <ul class="products">
                <!-- Your existing cart items here -->
            </ul>
            <div class="totals">
                <div class="subtotal">
                    <span class="label text-white">Subtotal:</span>
                    <span class="product-price text-white" id="totalPrice">
                    </span>
                </div>
            </div>
        </div>

        <div class="action-buttons">
            <div class="buttonSet text-center d-flex">
                <a style="height: 50px;line-height: 30px; transform: none !important;" <?php
                                                            if ($website_close == 0) {
                                                            ?> href="<?php echo SITE_PATH ?>cart" ; <?php } else {
                                                                                                    ?> onclick="websiteclose()" <?php
                                                                                                                            }
                                                                                                                                ?> class="btn btn-secondary  w-100">View Cart</a>
                <a style="height: 50px;line-height: 30px; transform: none !important;" <?php
                                                            if ($website_close == 0) {
                                                            ?> href="<?php echo SITE_PATH ?>checkout" ; <?php } else {
                                                                                                        ?> onclick="websiteclose()" <?php
                                                                                                                                }
                                                                                                                                    ?> class="btn btn-warning  w-100">Checkout</a>
            </div>
        </div>
    </main>
</aside>
<div id="sidebar-cart-curtain"></div>
<script>
    $(document).ready(function() {
        // Function that shows and hides the sidebar cart
        $(document).on("click", ".cart-button, .close-button, #sidebar-cart-curtain", function(e) {
            e.preventDefault();

            // Toggle the class on the body to show/hide the cart
            $("body").toggleClass("show-sidebar-cart");

            // Toggle the visibility of the sidebar curtain
            $("#sidebar-cart-curtain").fadeToggle(500);
        });

        // Function that adds or subtracts quantity when a plus or minus button is clicked
        $(document).on("click", '.plus-button, .minus-button', function() {
            // Get quantity input and related attributes
            var qtyInput = $(this).closest('.qty').find('.qty-input');
            var val = parseFloat(qtyInput.val());
            var max = parseFloat(qtyInput.attr('max'));
            var min = parseFloat(qtyInput.attr('min'));
            var step = parseFloat(qtyInput.attr('step'));

            if ($(this).is('.plus-button')) {
                // Increase the value if it's within the maximum
                if (!max || val + step <= max) {
                    qtyInput.val(val + step);
                }
            } else {
                // Decrease the value if it's above the minimum
                if (!min || val - step >= min) {
                    qtyInput.val(val - step);
                }
            }
        });
    });
</script>