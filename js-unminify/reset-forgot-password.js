// Reset password
$("#resetpasserr, #forgotsuccess").hide();

$("#resetpass").click(function (e) {
  e.preventDefault();
  var reset_password = $("#reset_password").val();

  if (reset_password === "") {
    showErrorToast("Please Enter Your Password");
  } else {
    $("#resetpass").val("Please Wait..");
    $.post(
      SITE_PATH + "action/reset-password.php",
      $("#resetform").serialize(),
      function (response) {
        $("#resetpass").val("Submit");
        handleResetResponse(response);
      }
    );
  }
});

// Forgot password
$("#forgotemail, #forgotsuccess").hide();

$("#forgotnow").click(function (e) {
  e.preventDefault();
  var forgot_email = $("#forgot_email").val();

  if (forgot_email === "") {
    showErrorToast("Please Enter Your Email");
  } else {
    $("#forgotnow").val("Please Wait..");
    $.post(
      SITE_PATH + "action/forgot-password.php",
      $("#forgotform").serialize(),
      function (response) {
        $("#forgotnow").val("Submit");
        handleForgotResponse(response);
      }
    );
  }
});

function showErrorToast(message) {
  Swal.fire({
    icon: "error",
    title: "Oops...",
    text: message,
    toast: true,
    position: "top-end",
    showConfirmButton: false,
    timer: 4000,
  });
}

function handleResetResponse(response) {
  response = JSON.parse(response);

  if (response.resetsuccess) {
    $("#resetform")[0].reset();
    showSuccessToast(
      "Password changed successfully! <a href='login.php'>Click Here to Login</a>"
    );
  } else if (response.resetfail) {
    showErrorToast("Please Check Internet Connection...");
  } else if (response.wrong) {
    showErrorToast("Something Went Wrong...");
  }
}

function handleForgotResponse(response) {
  response = JSON.parse(response);

  if (response.forgotfail) {
    showErrorToast("Something went wrong!");
  } else if (response.forgotsuccess) {
    $("#forgotform")[0].reset();
    showSuccessToast("Please check your email to reset your password!");
  }
}

function showSuccessToast(message) {
  Swal.fire({
    icon: "success",
    title: "Success!",
    html: message,
    toast: true,
    position: "top-end",
    showConfirmButton: false,
    timer: 4000,
  });
}
