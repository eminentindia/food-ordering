
$("#newsletter_submit").click(function(e) {
    e.preventDefault();
    var newsletter_email = document.getElementById("newsletter_email").value;

    if (newsletter_email == "") {
        showSweetAlert('error', 'Oops...', 'Please Enter Your Email', {
            popup: 'swal-error-bg',
            icon: 'swal-error-icon'
        });
        $("#newsletter_email").focus();
        return false;
    } else {
        document.getElementById("newsletter_submit").innerHTML = "Please Wait..";
        $.ajax({
            type: "post",
            url: "http://localhost/food-ordering/action/newsletter-action",
            data: $("#newsletterform").serialize(),
            success: function(response) {
                document.getElementById("newsletter_submit").innerHTML = "Subscribe";
                var responseObj = JSON.parse(response);
                if (responseObj.regexist_email == true) {
                    showSweetAlert('info', 'Oops...', 'You have already subscribed !', {
                        popup: 'swal-info-bg',
                        icon: 'swal-info-icon'
                    });
                    $("#newsletter_email").focus();
                    return false;
                } else if (responseObj.success == true) {
                    $("#newsletterform")[0].reset();
                    showSweetAlert('success', 'Success!', 'Subscription Added !', {
                        popup: 'swal-success-bg',
                        icon: 'swal-success-icon'
                    });
                } else if (responseObj.reginvalid_email == true) {
                    showSweetAlert('error', 'Oops...', 'Invalid Email !', {
                        popup: 'swal-error-bg',
                        icon: 'swal-error-icon'
                    });
                } else if (responseObj.fail == true) {
                    showSweetAlert('error', 'Oops...', 'Please Check Internet Connection...', {
                        popup: 'swal-error-bg',
                        icon: 'swal-error-icon'
                    });
                }
            },
        });
    }
});
