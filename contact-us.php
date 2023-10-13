<?php include('includes/header.php');  ?>

<body class="contact-template page-template belle">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" type="text/css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <style>

    </style>
    <?php include('includes/navbar.php') ?>

    <div id="page-content">

        <div class="bredcrumbWrap">
            <div class="container breadcrumbs">
                <a href="index.html" title="Back to the home page">Home</a><span aria-hidden="true">›</span><span>Contact Us</span>
            </div>
        </div>
        <div class=" py-5">
            <div class="container">
                <div class="text-center wow fadeInUp" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">
                    <h5 class="section-title ff-secondary text-center text-primary fw-normal">Contact Us</h5>
                    <h1 class="mb-4" style="font-weight: bold; margin-bottom:5px">Contact For Any Query</h1>
                    <p style="    font-size: 14px;line-height: 24px;color: #767676;" class="mb-5 contactIntro text-capitalize">We have currently 3 outlets in Delhi NCR, first two is in Barakhamba, Connaught Place & third one is in Bhikaji Cama Place. please visit once to get delicious & hygienic food avaliable for you.</p>
                </div>
                <style>
                    .header__shape {
                        position: absolute;
                        z-index: 1;
                    }

                    .header__shape.block--red {
                        width: 50px;
                        height: 50px;
                        background: rgba(255, 0, 115, 0.5);
                        top: 0px;
                        left: 0px;
                        animation: squiggle-one 16s linear infinite;
                    }

                    @media (min-width: 480px) {
                        .header__shape.block--red {
                            animation: squiggle-one-medium 16s linear infinite;
                        }
                    }

                    @media (min-width: 960px) {
                        .header__shape.block--red {
                            animation: squiggle-one-large 16s linear infinite;
                        }
                    }

                    .header__shape.triangle--mygreen {
                        width: 0;
                        height: 0;
                        border-left: 80px solid transparent;
                        border-right: 80px solid transparent;
                        border-bottom:  120px solid rgb(141 255 142 / 50%);
                        bottom: 30px;
                        left: 50%;
                        animation: squiggle-two 9s linear infinite;
                    }

                    @media (min-width: 480px) {
                        .header__shape.triangle--mygreen {
                            animation: squiggle-two-medium 9s linear infinite;
                        }
                    }

                    @media (min-width: 960px) {
                        .header__shape.triangle--mygreen {
                            animation: squiggle-two-large 9s linear infinite;
                        }
                    }

                    .header__shape.circle--green {
                        width: 55px;
                        height: 55px;
                        border-radius: 50%;
                        background: rgb(38 217 255 / 50%);
                        top: 100px;
                        right: 100px;
                        animation: squiggle-three 20s linear infinite;
                    }

                    @media (min-width: 480px) {
                        .header__shape.circle--green {
                            animation: squiggle-three-medium 20s linear infinite;
                        }
                    }

                    @media (min-width: 960px) {
                        .header__shape.circle--green {
                            animation: squiggle-three-large 20s linear infinite;
                        }
                    }

                    .header__shape.trap--yellow {
                        width: 40px;
                        height: 40px;
                        background: rgba(255, 255, 0, 0.5);
                        top: 100px;
                        left: 50%;
                        transform: skew(20deg, 0deg);
                        animation: squiggle-four 23s linear infinite;
                    }

                    @media (min-width: 480px) {
                        .header__shape.trap--yellow {
                            animation: squiggle-four-medium 23s linear infinite;
                        }
                    }

                    @media (min-width: 960px) {
                        .header__shape.trap--yellow {
                            animation: squiggle-four-large 23s linear infinite;
                        }
                    }

                    /* ANIMATIONS */
                    @keyframes squiggle-one {
                        0% {
                            transform: translate(0px, 0px);
                        }

                        25% {
                            transform: translate(150px, 100px) rotate(45deg);
                        }

                        50% {
                            transform: translate(240px, 300px) rotate(190deg);
                        }

                        75% {
                            transform: translate(200px, 50px) rotate(30deg);
                        }
                    }

                    @keyframes squiggle-two {
                        0% {
                            transform: translate(0px, 0px) rotate(deg);
                        }

                        25% {
                            transform: translate(-60px, 0px) rotate(-24deg);
                        }
                    }

                    @keyframes squiggle-three {
                        0% {
                            transform: translate(0px, 0px) scale(1, 1);
                        }

                        25% {
                            transform: translate(20px, 200px) scale(0.8, 0.8);
                        }

                        50% {
                            transform: translate(-136.3636363636px, -100px) scale(1.3, 1.3);
                        }

                        75% {
                            transform: translate(-150px, 30px) scale(1.1, 1.1);
                        }
                    }

                    @keyframes squiggle-four {
                        0% {
                            transform: skew(20deg, 0deg) translate(0px, 0px);
                        }

                        25% {
                            transform: skew(20deg, 0deg) translate(-150px, 100px) rotate(60deg);
                        }

                        50% {
                            transform: skew(20deg, 0deg) translate(-136.3636363636px, 100px) rotate(-100deg);
                        }
                    }

                    @keyframes squiggle-one-medium {
                        0% {
                            transform: translate(0px, 0px);
                        }

                        25% {
                            transform: translate(240px, 100px) rotate(45deg);
                        }

                        50% {
                            transform: translate(384px, 300px) rotate(190deg);
                        }

                        75% {
                            transform: translate(380px, 50px) rotate(30deg);
                        }
                    }

                    @keyframes squiggle-two-medium {
                        0% {
                            transform: translate(0px, 0px) rotate(deg);
                        }

                        25% {
                            transform: translate(-96px, 0px) rotate(-24deg);
                        }
                    }

                    @keyframes squiggle-three-medium {
                        0% {
                            transform: translate(0px, 0px) scale(1, 1);
                        }

                        25% {
                            transform: translate(32px, 200px) scale(0.8, 0.8);
                        }

                        50% {
                            transform: translate(-218.1818181818px, -100px) scale(1.3, 1.3);
                        }

                        75% {
                            transform: translate(-240px, 30px) scale(1.1, 1.1);
                        }
                    }

                    @keyframes squiggle-four-medium {
                        0% {
                            transform: skew(20deg, 0deg) translate(0px, 0px);
                        }

                        25% {
                            transform: skew(20deg, 0deg) translate(-240px, 100px) rotate(60deg);
                        }

                        50% {
                            transform: skew(20deg, 0deg) translate(-218.1818181818px, 100px) rotate(-100deg);
                        }
                    }

                    @keyframes squiggle-one-large {
                        0% {
                            transform: translate(0px, 0px);
                        }

                        25% {
                            transform: translate(480px, 100px) rotate(45deg);
                        }

                        50% {
                            transform: translate(768px, 300px) rotate(190deg);
                        }

                        75% {
                            transform: translate(860px, 50px) rotate(30deg);
                        }
                    }

                    @keyframes squiggle-two-large {
                        0% {
                            transform: translate(0px, 0px) rotate(deg);
                        }

                        25% {
                            transform: translate(-192px, 0px) rotate(-24deg);
                        }
                    }

                    @keyframes squiggle-three-large {
                        0% {
                            transform: translate(0px, 0px) scale(1, 1);
                        }

                        25% {
                            transform: translate(64px, 200px) scale(0.8, 0.8);
                        }

                        50% {
                            transform: translate(-436.3636363636px, -100px) scale(1.3, 1.3);
                        }

                        75% {
                            transform: translate(-480px, 30px) scale(1.1, 1.1);
                        }
                    }

                    @keyframes squiggle-four-large {
                        0% {
                            transform: skew(20deg, 0deg) translate(0px, 0px);
                        }

                        25% {
                            transform: skew(20deg, 0deg) translate(-480px, 100px) rotate(60deg);
                        }

                        50% {
                            transform: skew(20deg, 0deg) translate(-436.3636363636px, 100px) rotate(-100deg);
                        }
                    }
                </style>
                <div style="position: absolute;top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: -1;">
                    <div class="header__shape block--red"></div>
                    <div class="header__shape triangle--mygreen"></div>
                    <div class="header__shape circle--green"></div>
                    <div class="header__shape trap--yellow"></div>
                </div>
                <div class="row g-4">
                    <div class="col-12">
                        <div class="row gy-4" style="margin-top: 10px; margin-bottom: 30px;">
                            <div class="col-md-4 mb-3">
                                <h5 class="section-title ff-secondary fw-normal text-start text-primary">Email
                                </h5>
                                <p class="alignitcontact"><i class="fa fa-envelope-open text-primary me-2"></i>cp@foodieez.in</p>
                            </div>
                            <div class="col-md-4 mb-3">
                                <h5 class="section-title ff-secondary fw-normal text-start text-primary">Phone
                                </h5>
                                <p class="alignitcontact"><i class="fa fa-phone text-primary me-2"></i>+91 8826055975</p>
                            </div>
                            <div class="col-md-4 mb-3">
                                <h5 class="section-title ff-secondary fw-normal text-start text-primary">Working Days/Hours
                                </h5>
                                <p class="alignitcontact"><i class="fa fa-clock text-primary me-2"></i>Mon – Sat / 9:00 AM – 8:00 PM</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 wow fadeIn" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeIn;">
                        <div class="row">
                            <div class="col-md-12">
                                <div class=" store store1">
                                    <h4 class="text-white mb-3">OUTLET 1</h4>
                                    <p class="onerem"> <img loading="lazy" src="images/location.png" class="invercolor" alt=""> 07A, Ground Floor, Arunachal Building,
                                        Barakhamba Road, Connaught Place</p>
                                    <p class="onerem"> <a href="tel:+91 8826055975" class="text-white"> <img loading="lazy" src="images/mobile-phone.png" class="invercolor" alt="">+91 8826055975</a></p>
                                    <p class="onerem"> <a href="mailto:cp@foodieez.in" class="text-white"> <img loading="lazy" src="images/email.png" class="invercolor" alt=""> cp@foodieez.in</a></p>
                                </div>
                                <div class=" store store2">
                                    <h4 class="text-white mb-3">OUTLET 2</h4>
                                    <p class="onerem"> <img loading="lazy" src="images/location.png" class="invercolor" alt=""> Ground Floor, DCM Building, Barakhamba Road, Connaught Place</p>
                                    <p class="onerem"> <a href="tel:+91 8130654257" class="text-white"> <img loading="lazy" src="images/mobile-phone.png" class="invercolor" alt="">+91 8130654257</a></p>
                                    <p class="onerem"> <a href="mailto:dcm@foodieez.in" class="text-white"> <img loading="lazy" src="images/email.png" class="invercolor" alt=""> dcm@foodieez.in</a></p>
                                </div>
                                <div class=" store store3">
                                    <h4 class="text-white mb-3">OUTLET 3</h4>
                                    <p class="onerem"> <img loading="lazy" src="images/location.png" class="invercolor" alt=""> Somdatt Plaza Chamber 2, Bhikaji Cama Place Delhi</p>
                                    <p class="onerem"> <a href="tel:+91 9871257358" class="text-white"> <img loading="lazy" src="images/mobile-phone.png" class="invercolor" alt="">+91 9871257358</a></p>
                                    <p class="onerem"> <a href="mailto:bcp@foodieez.in" class="text-white"> <img loading="lazy" src="images/email.png" class="invercolor" alt=""> bcp@foodieez.in</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="wow fadeInUp" data-wow-delay="0.2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">
                            <form id="contactForm" method="POST">
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="text" class="form-control form-controlcontact" name="name" placeholder="Your Name">
                                            <label for="name">Your Name</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="email" class="form-control form-controlcontact" name="email" placeholder="Your Email">
                                            <label for="email">Your Email</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-floating">
                                            <input type="text" class="form-control form-controlcontact" name="subject" placeholder="Subject">
                                            <label for="subject">Subject</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-floating">
                                            <textarea class="form-control form-controlcontact" placeholder="Leave a message here" name="message" style="height: 150px"></textarea>
                                            <label for="message">Message</label>
                                        </div>
                                    </div>
                                    <div class="col-12 mt-5">
                                        <input class="btn btn-success w-100 py-3 sendmsg" type="submit" value="Send Message" />
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!--End Body Content-->


    <?php include('includes/footer.php');  ?>
    <?php include('includes/scripts.php');  ?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#contactForm').validate({
                rules: {
                    name: {
                        required: true
                    },
                    subject: {
                        required: true,
                    },
                    message: {
                        required: true,
                    },
                    email: {
                        required: true,
                        email: true
                    },
                },
                highlight: function(element) {
                    $(element).addClass('error');
                },
                unhighlight: function(element) {
                    $(element).removeClass('error');
                },
                errorPlacement: function(error, element) {
                    // Do not show any error messages
                },
                submitHandler: function(form) {
                    $('.sendmsg').val("Please Wait...")
                    $('.sendmsg').prop("disabled", true);
                    $.ajax({
                        type: "post",
                        url: "action/contact_submit.php",
                        data: $('#contactForm').serialize(),
                        success: function(response) {
                            var res = response.trim();
                            if (res == 'done') {
                                Swal.fire(
                                    'Success',
                                    'Enquiry Generated Successfully. Our team will contact you soon !!',
                                    'success'
                                )
                                $('#contactForm')[0].reset()
                            } else {
                                Swal.fire(
                                    'Opps',
                                    'Something went wrong. Please try again !!',
                                    'question'
                                )
                            }
                            $('.sendmsg').val("Send Message")
                            $('.sendmsg').prop("disabled", false);
                        }
                    });

                }
            });

        });
    </script>
</body>

</html>