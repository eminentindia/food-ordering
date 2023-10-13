
window.addEventListener("DOMContentLoaded", function () {
  const deliveryDateInput = document.getElementById("delievery_date");
  const fromDate = new Date();
  const tillDate = new Date();
  tillDate.setDate(tillDate.getDate() + 7);

  flatpickr(deliveryDateInput, {
    minDate: fromDate,
    maxDate: tillDate,
    theme: "green",
    disableMobile: true, // Disable native mobile picker (important for iOS)
  });
});

window.onload = function () {
  const deliveryDateInput = document.getElementById("delievery_date");
  const timeSlotSelect = document.getElementById("time_slot");

  function formatTime(date) {
    let hours = date.getHours();
    let displayHour = hours > 12 ? hours - 12 : hours;
    let meridiem = hours >= 12 ? "PM" : "AM";
    return `${displayHour}:00 ${meridiem}`;
  }

  function selectCurrentDateAndTimeSlot() {
    let currentDate = new Date();
    deliveryDateInput.addEventListener("change", function (e) {
      if (new Date(this.value).getDay() === 0) {
        e.preventDefault();
        this.value = "";
        alert("We Are Closed On Sunday");
      } else {
        updateTimeSlots();
      }
    });
    updateTimeSlots();
  }

  function updateTimeSlots() {
    let selectedDate = new Date(deliveryDateInput.value);
    let currentDate = new Date();
    timeSlotSelect.innerHTML = "";

    if (selectedDate.toDateString() === currentDate.toDateString()) {
      let firstAvailableSlot = null;
      let currentHour = currentDate.getHours();
      let startHour = currentHour >= 12 ? currentHour + 1 : 12;
      if (currentHour < 12) {
        startHour = 12;
      }
      for (let hour = startHour; hour < 21; hour++) {
        let displayHour = hour > 12 ? hour - 12 : hour;
        let slot1 = `${displayHour}:00 - ${displayHour}:30 ${
          hour >= 12 ? "PM" : "AM"
        }`;
        let slot2 = `${displayHour}:30 - ${displayHour + 1}:00 ${
          hour >= 12 ? "PM" : "AM"
        }`;
        let option1 = document.createElement("option");
        option1.value = slot1;
        option1.textContent = slot1;
        let option2 = document.createElement("option");
        option2.value = slot2;
        option2.textContent = slot2;
        let currentTime = new Date();
        currentTime.setHours(hour);
        currentTime.setMinutes(0);
        if (currentTime > currentDate && !firstAvailableSlot) {
          firstAvailableSlot = option1;
        }
        if (currentTime > currentDate && firstAvailableSlot) {
          timeSlotSelect.appendChild(firstAvailableSlot);
          firstAvailableSlot = null;
        }
        timeSlotSelect.appendChild(option1);
        timeSlotSelect.appendChild(option2);
      }

      if (firstAvailableSlot) {
        timeSlotSelect.value = firstAvailableSlot.value; // Automatically select the first available slot
      }
    } else if (selectedDate.getDay() === 0) {
      // If selected date is Sunday, show empty option
      let option = document.createElement("option");
      option.value = "";
      option.textContent = "Select Time Slot";
      timeSlotSelect.appendChild(option);
    } else {
      let timeSlots = [
        "12:00 - 12:30 PM",
        "12:30 - 1:00 PM",
        "1:00 - 1:30 PM",
        "1:30 - 2:00 PM",
        "2:00 - 2:30 PM",
        "2:30 - 3:00 PM",
        "3:00 - 3:30 PM",
        "3:30 - 4:00 PM",
        "4:00 - 4:30 PM",
        "4:30 - 5:00 PM",
        "5:00 - 5:30 PM",
        "5:30 - 6:00 PM",
        "6:00 - 6:30 PM",
        "6:30 - 7:00 PM",
        "7:00 - 7:30 PM",
        "7:30 - 8:00 PM",
        "8:00 - 8:30 PM",
        "8:30 - 9:00 PM",
      ];
      for (let timeSlot of timeSlots) {
        let option = document.createElement("option");
        option.value = timeSlot;
        option.textContent = timeSlot;
        timeSlotSelect.appendChild(option);
      }
    }
  }

  deliveryDateInput.addEventListener("change", updateTimeSlots);

  // Call selectCurrentDateAndTimeSlot() initially to set up event listener and display initial time slots
  selectCurrentDateAndTimeSlot();
};

function onlyOne(e) {
  document.getElementsByName("delieverytype").forEach((n) => {
    n !== e && (n.checked = !1);
  });
}


// Execute the code after the HTML has been loaded
document.addEventListener("DOMContentLoaded", function () {
  OTPInput();
});
function onlyOne1(e) {
  document.getElementsByName("store").forEach((n) => {
    n !== e && (n.checked = !1);
  });
}
$('input[name="delieverytype"]').click(function () {
  var e = $(this).attr("value");
  "Delivery" == e
    ? ($("#showsindelievery").fadeToggle("slow"),
      $("#changeName").html("Delivery Date <span>*</span>"))
    : "Takeaway" == e
    ? ($("#changeName").html("Take-Away Date <span>*</span>"),
      $("#showsindelievery").hide())
    : "Dinein" == e &&
      ($("#changeName").html("Dine-in Date <span>*</span>"),
      $("#showsindelievery").hide());
});

const picker = document.getElementById("delievery_date");
picker.addEventListener("input", function (e) {
  const selectedDate = new Date(this.value);
  const dayOfWeek = selectedDate.getUTCDay();
  if (dayOfWeek === 0) {
    // Sunday
    e.preventDefault();
    this.value = "";
    alert("We Are Closed On Sunday");
  }
});
const deliveryDateInput = document.getElementById("delievery_date");
const timeSlotSelect = document.getElementById("time_slot");
//validate otp

$(document).on("click", "#placeordernow", function (e) {
  e.preventDefault();
  $("#placeordernow").html("Processing...");
  $("#placeordernow").attr("disabled", true);
  $.ajax({
    type: "POST",
    url: "action/process_order.php",
    data: $("#checkmain").serialize(),
    datatype: JSON,
    success: function (response) {
      if (response.order_id) {
        window.location =
          "order-success.php?order_id=" + response.order_id + "";
        $("#placeordernow").html("ORDER COMPLETED !!");
        $("#placeordernow").attr("disabled", true);
      } else {
        alert(response);
        $("#placeordernow").html("Place Order !!");
        $("#placeordernow").attr("disabled", false);
      }
    },
    error: function (xhr, status, error) {
      $("#placeordernow").html("Please Try Again !!");
      $("#placeordernow").attr("disabled", false);
    },
  });
});

// Disable the ResendOTP button for 60 seconds and only allow it to be clicked 3 times
// Function to initialize the resend button functionality

//when user switch
$(document).ready(function () {
  $('input[name="payment_type"]').on("click", function () {
    var selectedPaymentType = $(this).val();
    if (selectedPaymentType === "online") {
      $("#otpBOX").hide();
      $("#placeorderdiv").html(
        '<input type="submit" class="site-btn maincheckout m-0" id="placeorder" value="Continue.." />'
      );
      $(".maincheckout").attr("disabled", false);
      $(".maincheckout").attr("value", "Continue..");
    } else if (selectedPaymentType === "cod") {
      $("#otpBOX").show();
      $(".maincheckout").attr("disabled", false);
      $(".maincheckout").attr("value", "Continue..");
    }
  });
});

$("#loginfirst").click(function (e) {
  e.preventDefault();
  $("#loginfirsthtml").html("Please Login to Continue...");
});
$("#invalidemail").hide();
$("#invalidemail").hide();
$("#errorpassword").hide();
$("#loginsuccess").hide();
$("#loginnow").click(function (e) {
  e.preventDefault();
  var loginemail = document.getElementById("loginemail").value;
  var loginpassword = document.getElementById("loginpassword").value;
  if (loginemail == "") {
    $("#invalidemail").html("Please Enter Your Email");
    $("#invalidemail").show();
    $("#email").focus();
    $("#invalidemail").delay(4000).fadeOut("slow");
    return false;
  } else if (loginpassword == "") {
    $("#errorpassword").html("Please Enter Password");
    $("#errorpassword").show();
    $("#password").focus();
    $("#errorpassword").delay(4000).fadeOut("slow");
    return false;
  } else {
    document.getElementById("loginnow").innerHTML = "Please Wait..";
    $.ajax({
      type: "post",
      url: "action/login-action.php",
      data: "email=" + loginemail + "&password=" + loginpassword,
      success: function (response) {
        document.getElementById("loginnow").innerHTML = "Login";
        var response = JSON.parse(response);
        if (response.invalidemail == true) {
          $("#invalidemail").html("Please Enter Valid Email");
          $("#invalidemail").show();
          $("#loginemail").focus();
          $("#invalidemail").delay(4000).fadeOut("slow");
          return false;
        } else if (response.emailnotfound == true) {
          $("#invalidemail").html("Email Not Found !");
          $("#invalidemail").show();
          $("#loginemail").focus();
          $("#invalidemail").delay(3000).fadeOut("slow");
          return false;
        } else if (response.passwordincorrect == true) {
          $("#errorpassword").html("Please Enter Correct Password!");
          $("#errorpassword").show();
          $("#errorpassword").focus();
          $("#errorpassword").delay(3000).fadeOut("slow");
          return false;
        } else if (response.notactive == true) {
          $("#invalidemail").html(
            "Your Email is not active. Please check your email to activate your account !"
          );
          $("#invalidemail").show();
          $("#invalidemail").delay(9000).fadeOut("slow");
          return false;
        } else if (response.success == true) {
          $("#loginform")[0].reset();
          window.location.reload();
        }
      },
    });
  }
});
$(".shopping-cart-total").hide();
$("#couponerror").hide();
$("#couponsuccess").hide();

