function get_cart_count() {
  $.ajax({
    type: "POST",
    url: SITE_PATH + "action/get_cart_count.php",
    success: function (response) {
      $(".CartCount").html(response);
    },
  });
}
get_cart_count();
function AddToCart(dishID, qty, tiffin) {
  let selectedPrice = 0;
  let attributeID = "";
  let quantity = 1;
  const attributesData = [];

  const selectedAttribute = $(
    'input[name^="attribute_' + tiffin + dishID + '"]:checked'
  );

  selectedAttribute.each(function () {
    const selectedPriceAttr = parseFloat($(this).attr("data-price"));
    const sku = $(this).attr("data-sku");
    const attributeIDAttr = parseFloat($(this).val());
    const quantityAttr = parseInt(
      $('input[name="quantity_' + tiffin + dishID + sku + '"]').val()
    );

    const totalPrice = selectedPriceAttr * quantityAttr;
    attributesData.push({
      attributeID: attributeIDAttr,
      totalPrice: totalPrice,
      quantity: quantityAttr,
    });
  });

  if (selectedAttribute.length > 0) {
    selectedPrice = parseFloat(selectedAttribute.attr("data-price"));
    sku = selectedAttribute.attr("data-sku");
    attributeID = parseFloat(selectedAttribute.val());
    quantity = parseInt(
      $('input[name="quantity_' + tiffin + dishID + sku + '"]').val()
    );
  } else {
    const elm = $("#price_" + tiffin + dishID);
    selectedPrice = parseFloat(elm.data("price"));
    sku = elm.data("sku");
    quantityInputName = "quantity_" + tiffin + dishID + sku;
    quantity = parseInt($('input[name="' + quantityInputName + '"]').val());
  }

  const totalPrice = selectedPrice * quantity;

  const data = {
    dishID: dishID,
    attributesData: attributesData,
    attributeID: attributeID,
    totalPrice: totalPrice,
    quantity: quantity,
    tiffin: tiffin,
    selectedPrice: selectedPrice,
  };

  const addButton = $("." + dishID + " .add-button-text");
  const customLoader = addButton.find(".custom-loader");

  customLoader.removeClass("d-none");
  addButton.find(".text").addClass("d-none");

  if (quantity == 0) {
    alert("Goli Beta Masti Nhi !!");
    setTimeout(() => {
      customLoader.addClass("d-none");
      addButton.find(".text").removeClass("d-none");
    }, 1000);
    return;
  }

  $.ajax({
    type: "POST",
    url: SITE_PATH + "action/add_to_cart.php",
    data: data,
    dataType: "json",
    success: function (response) {
      setTimeout(() => {
        customLoader.addClass("d-none");
        addButton.find(".text").removeClass("d-none");
      }, 1000);
      get_cart();
      get_cart_count();
      showNotification(response.message);
    },
  });
}

function AddToCartPlan(dishID, qty, tiffin) {
  let selectedPrice = 0;
  let attributeID = "";
  let quantity = 1;
  const attributesData = [];

  const selectedAttribute = $(
    'input[name^="attribute_' + tiffin + dishID + '"]:checked'
  );

  selectedAttribute.each(function () {
    const selectedPriceAttr = parseFloat($(this).attr("data-price"));
    const sku = $(this).attr("data-sku");
    const attributeIDAttr = parseFloat($(this).val());
    const quantityAttr = parseInt(
      $('input[name="quantity_' + tiffin + dishID + sku + '"]').val()
    );

    const totalPrice = selectedPriceAttr * quantityAttr;
    attributesData.push({
      attributeID: attributeIDAttr,
      totalPrice: totalPrice,
      quantity: quantityAttr,
    });
  });

  if (selectedAttribute.length > 0) {
    selectedPrice = parseFloat(selectedAttribute.attr("data-price"));
    sku = selectedAttribute.attr("data-sku");
    attributeID = parseFloat(selectedAttribute.val());
    quantity = parseInt(
      $('input[name="quantity_' + tiffin + dishID + sku + '"]').val()
    );
  } else {
    const elm = $("#price_" + tiffin + dishID);
    selectedPrice = parseFloat(elm.data("price"));
    sku = elm.data("sku");
    quantityInputName = "quantity_" + tiffin + dishID + sku;
    quantity = parseInt($('input[name="' + quantityInputName + '"]').val());
  }

  const totalPrice = selectedPrice * quantity;

  const data = {
    dishID: dishID,
    attributesData: attributesData,
    attributeID: attributeID,
    totalPrice: totalPrice,
    quantity: quantity,
    tiffin: tiffin,
    selectedPrice: selectedPrice,
  };

  const addButton = $("." + dishID + " .add-button-text");
  const customLoader = addButton.find(".custom-loader");

  customLoader.removeClass("d-none");
  addButton.find(".text").addClass("d-none");
  if (quantity == 0) {
    alert("Goli Beta Masti Nhi !!");
    setTimeout(() => {
      customLoader.addClass("d-none");
      addButton.find(".text").removeClass("d-none");
    }, 1000);
    return;
  }
  $.ajax({
    type: "POST",
    url: SITE_PATH + "action/add_to_cartplan.php",
    data: data,
    dataType: "json",
    success: function (response) {
      setTimeout(() => {
        customLoader.addClass("d-none");
        addButton.find(".text").removeClass("d-none");
      }, 1000);
      get_cart();
      get_cart_count();
      showNotification(response.message);
    },
  });
}
function showNotification(text) {
  const notification = $('<div class="notification">').text(text);
  $("body").append(notification);
  setTimeout(function () {
    notification.remove();
  }, 1000);
  notification.addClass("show");
}

function initializeQuantityButtons() {
  var quantityIncrement = document.querySelectorAll(".quantity-increment");
  var quantityDecrement = document.querySelectorAll(".quantity-decrement");

  quantityIncrement.forEach(function (button) {
    button.addEventListener("click", function (event) {
      event.preventDefault();
      var input = button.parentNode.querySelector(".quantity-input");
      input.value = parseInt(input.value) + 1;
    });
  });

  quantityDecrement.forEach(function (button) {
    button.addEventListener("click", function (event) {
      event.preventDefault();
      var input = button.parentNode.querySelector(".quantity-input");
      if (parseInt(input.value) > 1) {
        input.value = parseInt(input.value) - 1;
      }
    });
  });
}
$(document).ready(function () {
  initializeQuantityButtons();
});
function initializeCartQuantityButtons() {
  var quantityIncrement = document.querySelectorAll(".cartquantity-increment");
  var quantityDecrement = document.querySelectorAll(".cartquantity-decrement");

  quantityIncrement.forEach(function (button) {
    button.addEventListener("click", function (event) {
      event.preventDefault();
      var productId = button.parentNode
        .querySelector(".cartquantity-input")
        .getAttribute("data-productId");
      var productSku = button.parentNode
        .querySelector(".cartquantity-input")
        .getAttribute("data-productSku");
      var productKey = button.parentNode
        .querySelector(".cartquantity-input")
        .getAttribute("data-productKey");
      updateCartQuantity(productId, productSku, productKey, +1); // +1
    });
  });

  quantityDecrement.forEach(function (button) {
    button.addEventListener("click", function (event) {
      event.preventDefault();
      var input = button.parentNode.querySelector(".cartquantity-input");
      var productId = input.getAttribute("data-productId");
      var productSku = button.parentNode
        .querySelector(".cartquantity-input")
        .getAttribute("data-productSku");
      var productKey = button.parentNode
        .querySelector(".cartquantity-input")
        .getAttribute("data-productKey");
      if (parseInt(input.value) > 1) {
        updateCartQuantity(productId, productSku, productKey, -1); // -1 if greater than 1
      }
    });
  });

  // AJAX function to update cart quantity
  function updateCartQuantity(productId, productSku, productKey, quantity) {
    // Define the data to send as JSON
    $("#loader_" + productKey).show();
    var data = {
      productId,
      productSku,
      quantity,
    };
    $.ajax({
      type: "POST",
      url: SITE_PATH + "action/update_cart",

      data: data,
      success: function (response) {
        // Handle the success response from the server, if needed
        $("#loader_" + productKey).show();
        setTimeout(() => {
          get_cart();
        }, 1000);
      },
      error: function (xhr, status, error) {
        // Handle errors, if any
        console.error("AJAX request failed with status:", status);
      },
    });
  }
}
document.querySelectorAll(".nav-item").forEach((linkItem) => {
  linkItem.addEventListener("click", (_) => {
    var breakpoint = 768;
    var isMobile = $(window).width() < breakpoint;
    var targetElement = document.getElementById("tiffinmaindiv");

    if (isMobile) {
      targetElement.scrollIntoView({
        behavior: "smooth",
      });
    } else {
      targetElement.scrollIntoView({
        behavior: "smooth",
      });
    }
  });
});
function removeCartItem(key) {
  $("#loader_" + key).show();
  $.ajax({
    type: "POST",
    url: SITE_PATH + "action/remove_cart_item.php",
    data: {
      key,
    },
    success: function (response) {
      $("#loader_" + key).hide();
      var $cartItem = $("#attr_" + key);
      $cartItem.fadeToggle();
      $cartItem.css("transform", "translateX(100px)");
      get_cart_count();
      get_cart();
    },
  });
}
function get_cart() {
  $.ajax({
    type: "post",
    url: SITE_PATH + "action/get_cart.php",
    success: function (t) {
      $("#cart-container").html(t);
      initializeCartQuantityButtons();
    },
  });
}
$(document).ready(function () {
  get_cart();
});
