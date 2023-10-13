<?php include('includes/header.php');  ?>

<body class="page-template belle">
    <?php include('includes/navbar.php') ?>

    <!--Body Content-->
    <div id="page-content">
        <!--Page Title-->
        <div class="page section-header text-center">
            <div class="page-title">
                <div class="wrapper">
                    <h1 class="page-width">Your cart</h1>
                </div>
            </div>
        </div>
        <!--End Page Title-->

        <div class="loader mycartloader" style="display:none">
            <div class="loader-content">
                <div class="loader-spinner"></div>
            </div>
        </div>
        <div id="cartappend">
        </div>
    </div>
    <!--End Body Content-->
    <?php include('includes/footer.php');  ?>
    <?php include('includes/scripts.php');  ?>
    <script>
        function append_cart() {
            $(".mycartloader").show();
            $.ajax({
                type: "POST",
                url: SITE_PATH + "action/get_cart_page.php",
                success: function(response) {
                    setTimeout(() => {
                        $("#cartappend").html(response);
                        initializeCartQuantityButtonspagecart();
                        $(".mycartloader").hide();
                    }, 100);
                },
            });
        }
        $(document).ready(function() {
            append_cart();
        });
        function initializeCartQuantityButtonspagecart() {
            var quantityIncrement = document.querySelectorAll(".cartquantity-incrementpage");
            var quantityDecrement = document.querySelectorAll(".cartquantity-decrementpage");

            quantityIncrement.forEach(function(button) {
                button.addEventListener("click", function(event) {
                    event.preventDefault();
                    var productId = button.parentNode
                        .querySelector(".cartquantity-inputpage")
                        .getAttribute("data-productId");
                    var productSku = button.parentNode
                        .querySelector(".cartquantity-inputpage")
                        .getAttribute("data-productSku");
                    var productKey = button.parentNode
                        .querySelector(".cartquantity-inputpage")
                        .getAttribute("data-productKey");
                    updateCartQuantitypage(productId, productSku, productKey, +1); // +1
                });
            });

            quantityDecrement.forEach(function(button) {
                button.addEventListener("click", function(event) {
                    event.preventDefault();
                    var input = button.parentNode.querySelector(".cartquantity-inputpage");
                    var productId = input.getAttribute("data-productId");
                    var productSku = button.parentNode
                        .querySelector(".cartquantity-inputpage")
                        .getAttribute("data-productSku");
                    var productKey = button.parentNode
                        .querySelector(".cartquantity-inputpage")
                        .getAttribute("data-productKey");
                    if (parseInt(input.value) > 1) {
                        updateCartQuantitypage(productId, productSku, productKey, -1); // -1 if greater than 1
                    }
                });
            });

            // AJAX function to update cart quantity
            function updateCartQuantitypage(productId, productSku, productKey, quantity) {
                $(".mycartloader").show();
                var data = {
                    productId,
                    productSku,
                    quantity,
                };
                $.ajax({
                    type: "POST",
                    url: SITE_PATH + "action/update_cart",
                    data: data,
                    success: function(response) {
                        setTimeout(() => {
                            $(".mycartloader").hide();
                            append_cart();
                        }, 1000);
                    },
                    error: function(xhr, status, error) {
                        $(".mycartloader").hide();
                    },
                });
            }
        }

        function removeCartItempage(key) {
            $(".mycartloader").show();
            $.ajax({
                type: "POST",
                url: SITE_PATH + "action/remove_cart_item.php",
                data: {
                    key,
                },
                success: function(response) {
                    setTimeout(() => {
                        $(".mycartloader").hide();
                        append_cart();
                    }, 1000);
                },
            });
        }
    </script>
</body>

</html>