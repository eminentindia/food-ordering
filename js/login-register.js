$(document).ready(function () {
  // Function to show error toast
  function showErrorToast(message, inputId) {
    Swal.fire({
      icon: "error",
      title: "Error",
      text: message,
      toast: true,
      position: "bottom-end",
      showConfirmButton: false,
      timer: 7774000,
      background: "#ff9999",
      onClose: () => {
        $(inputId).focus();
      },
    });
  }

  // Function to show success toast
  function showSuccessToast(message) {
    Swal.fire({
      icon: "success",
      title: "Success",
      text: message,
      toast: true,
      position: "bottom-end",
      showConfirmButton: false,
      timer: 4000,
      background: "#99ff99",
    });
  }

  // Login form submission
  $("#loginform").submit(function (e) {
    e.preventDefault();
    var loginemail = $("#loginemail").val();
    var loginpassword = $("#loginpassword").val();

    if (!loginemail) {
      showErrorToast("Please Enter Your Email", "#loginemail");
    } else if (!loginpassword) {
      showErrorToast("Please Enter Password", "#loginpassword");
    } else {
      $("#loginnow").val("Please Wait..").prop("disabled", true);
      $.ajax({
        type: "post",
        url: "action/login-action.php",
        data: $(this).serialize(),
        success: function (response) {
          $("#loginnow").val("Login").prop("disabled", false);
          var responseData = JSON.parse(response);
          if (responseData.invalidemail) {
            showErrorToast("Please Enter Valid Email !", "#loginemail");
          } else if (responseData.emailnotfound) {
            showErrorToast("Email Not Found !", "#loginemail");
          } else if (responseData.notactive) {
            showErrorToast("Inactive User !", "#loginemail");
          } else if (responseData.passwordincorrect) {
            showErrorToast("Please Enter Valid Password !", "#loginpassword");
          } else if (responseData.success) {
            $("#loginform")[0].reset();
            showSuccessToast("Login Successfull !!");
            setTimeout(function () {
              window.location.href = "cart.php";
            }, 1000);
          }
        },
      });
    }
  });

  // Registration form submission

  // Mobile number validation
  $("#mobile").blur(function () {
    var mobile = $(this).val();
    if (mobile.length === 10 && mobile !== null && !validamobile(mobile)) {
      showErrorToast("Enter 10 Digit Mobile Number", "#mobile");
      $(this).val("");
    }
  });

  // Function to validate mobile number
  function validamobile(mobile) {
    var regex = /^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/im;
    return regex.test(mobile);
  }
});
