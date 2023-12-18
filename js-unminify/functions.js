// Function to show a SweetAlert toast
function showSweetAlert(icon, title, text, customClass, position = 'center') {
  Swal.fire({
    icon,
    title,
    text,
    toast: true,
    position,
    showConfirmButton: false,
    timer: 3000,
    allowOutsideClick: true,
    customClass,
  });
}

// Function to add an item to the cart using AJAX
function add_to_cart(id, type) {
  const qty = $("#dishqty").val();
  const attr = $('input[name="radio_' + id + '"]:checked').val();

  $.ajax({
    type: "post",
    url: SITE_PATH + "action/manage-cart.php",
    data: { qty, attr, type },
    success: function (response) {
      $("html, body").animate({ scrollTop: 0 }, "slow");
      const data = $.parseJSON(response);
      showSweetAlert('success', 'Dish Added !', '', 'swal-sucess-bg', 'top-end');
      jQuery("#CartCount").html(data.totalcartcount);
      jQuery("#totalPrice").html(data.totalPrice);
      jQuery("#Attribute").html(data.attribute);

      // Rest of your code for updating the cart UI
    },
  });
}

// Function to delete an item from the cart using AJAX
function delete_cart(id, is_type) {
  jQuery.ajax({
    url: SITE_PATH + "action/manage-cart.php",
    type: "post",
    data: { attr: id, type: 'delete' },
    success: function (result) {
      if (is_type == "load") {
        window.location.href = window.location.href;
      } else {
        const data = jQuery.parseJSON(result);
        jQuery(".CartCount").html(data.totalCartDish);
        jQuery("#shop_added_msg_" + id).html("");
      }
    },
  });
}
