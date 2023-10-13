"use strict";
var KTSigninTwoSteps = (function () {
    var t, n;
    return {
        init: function () {
            (t = document.querySelector("#kt_sing_in_two_steps_form")),
                (n = document.querySelector("#kt_sing_in_two_steps_submit")).addEventListener("click", function (e) {
                    e.preventDefault();
                    var i = !0,
                        o = [].slice.call(t.querySelectorAll('input[maxlength="1"]'));
                    o.map(function (t) {
                        ("" !== t.value && 0 !== t.value.length) || (i = !1);
                    }),
                        !0 === i
                            ? (n.setAttribute("data-kt-indicator", "on"),
                              (n.disabled = !0),
                              setTimeout(function () {
                                  n.removeAttribute("data-kt-indicator"),
                                      (n.disabled = !1),
                                      Swal.fire({ text: "You have been successfully submitted OTP!", icon: "success", buttonsStyling: !1, confirmButtonText: "Ok, got it!", customClass: { confirmButton: "btn btn-primary" } }).then(function (
                                          t
                                      ) {
                                          document.getElementById("kt_sing_in_two_steps_form").submit();
                                          t.isConfirmed &&
                                              o.map(function (t) {
                                                  t.value = "";
                                              });
                                      });
                              }, 1e3))
                            : swal
                                  .fire({ text: "Please enter valid securtiy code and try again.", icon: "error", buttonsStyling: !1, confirmButtonText: "Ok, got it!", customClass: { confirmButton: "btn fw-bold btn-light-primary" } })
                                  .then(function () {
                                      KTUtil.scrollTop();
                                  });
                });
        },
    };
})();
KTUtil.onDOMContentLoaded(function () {
    KTSigninTwoSteps.init();
});
