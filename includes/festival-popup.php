<?php
$festive = getactivefestivepopupFrontEnd();

foreach ($festive as $bannerfestive) {
    $count = count($festive);
    if ($count > 0) {
?>
        <style>
            .closebtnfestive {
                position: absolute;
                background: white !important;
                z-index: 999999;
                opacity: 1;
                right: 0;
                width: 30px;
                height: 30px;
                border-radius: 50%;
            }

            .closebtnfestive:hover {
                opacity: .8;
                transform: scale(1.2);
            }


            .pyro>.before,
            .pyro>.after {
                position: absolute;
                width: 5px;
                height: 5px;
                border-radius: 50%;
                box-shadow: 0 0 5px #fff;
                /* Example box shadow: h-offset v-offset blur color */
                -moz-animation: 1s bang ease-out infinite backwards, 1s gravity ease-in infinite backwards, 5s position linear infinite backwards;
                -webkit-animation: 1s bang ease-out infinite backwards, 1s gravity ease-in infinite backwards, 5s position linear infinite backwards;
                -o-animation: 1s bang ease-out infinite backwards, 1s gravity ease-in infinite backwards, 5s position linear infinite backwards;
                -ms-animation: 1s bang ease-out infinite backwards, 1s gravity ease-in infinite backwards, 5s position linear infinite backwards;
                animation: 1s bang ease-out infinite backwards, 1s gravity ease-in infinite backwards, 5s position linear infinite backwards;
                z-index: 999;

            }

            /* The rest of your animation properties remain unchanged */


            .pyro>.after {
                -moz-animation-delay: 1.25s, 1.25s, 1.25s;
                -webkit-animation-delay: 1.25s, 1.25s, 1.25s;
                -o-animation-delay: 1.25s, 1.25s, 1.25s;
                -ms-animation-delay: 1.25s, 1.25s, 1.25s;
                animation-delay: 1.25s, 1.25s, 1.25s;
                -moz-animation-duration: 1.25s, 1.25s, 6.25s;
                -webkit-animation-duration: 1.25s, 1.25s, 6.25s;
                -o-animation-duration: 1.25s, 1.25s, 6.25s;
                -ms-animation-duration: 1.25s, 1.25s, 6.25s;
                animation-duration: 1.25s, 1.25s, 6.25s;
            }

            @-webkit-keyframes bang {
                to {
                    box-shadow: -33px -195.6666666667px #40ff00, -248px -284.6666666667px #ff8c00, 91px -121.6666666667px #ff00e1, -156px -264.6666666667px #ff00bf, 71px -255.6666666667px #0ff, 248px -12.6666666667px #0ff, -163px -45.6666666667px #ff4000, 45px -259.6666666667px #4800ff, 20px -131.6666666667px #ffd500, 131px -139.6666666667px #0bf, 79px 64.3333333333px #4cff00, 13px -13.6666666667px #f06, 141px 9.3333333333px #0f0, -129px 39.3333333333px #ff2600, 71px -267.6666666667px #40ff00, -241px -37.6666666667px #ffa600, 242px -295.6666666667px #00ff40, 169px -352.6666666667px #a0f, 221px -286.6666666667px #40ff00, 144px -114.6666666667px #ff00c8, 106px -11.6666666667px #ff00c4, 167px -118.6666666667px #ffc400, -28px -277.6666666667px #ff002b, 73px -69.6666666667px #ff6a00, 104px -284.6666666667px #3c00ff, 16px -325.6666666667px #ff004c, -213px 49.3333333333px #9dff00, 15px -232.6666666667px #ffc400, 132px -118.6666666667px #001eff, -158px -179.6666666667px #f09, -65px -154.6666666667px #ff002f, 179px 15.3333333333px #d0f, 217px -310.6666666667px #ff0051, 243px -157.6666666667px #7b00ff, -176px -68.6666666667px #ff00e1, 42px -246.6666666667px #00ff9d, -239px -201.6666666667px #000dff, -45px -271.6666666667px #aeff00, 200px 47.3333333333px #00b3ff, 107px -335.6666666667px #00ff8c, 96px -75.6666666667px #ff0084, 197px -6.6666666667px #ff00a2, -103px -302.6666666667px #f0a, 165px -266.6666666667px #ff0026, 243px -32.6666666667px #00fbff, -74px -248.6666666667px #ff0084, 67px -361.6666666667px #ff5900, 207px 0.3333333333px #00ffbf, 183px -249.6666666667px #00ff62, -33px -346.6666666667px #0fc, 93px -335.6666666667px #ff0040;
                }
            }

            @-moz-keyframes bang {
                to {
                    box-shadow: -33px -195.6666666667px #40ff00, -248px -284.6666666667px #ff8c00, 91px -121.6666666667px #ff00e1, -156px -264.6666666667px #ff00bf, 71px -255.6666666667px #0ff, 248px -12.6666666667px #0ff, -163px -45.6666666667px #ff4000, 45px -259.6666666667px #4800ff, 20px -131.6666666667px #ffd500, 131px -139.6666666667px #0bf, 79px 64.3333333333px #4cff00, 13px -13.6666666667px #f06, 141px 9.3333333333px #0f0, -129px 39.3333333333px #ff2600, 71px -267.6666666667px #40ff00, -241px -37.6666666667px #ffa600, 242px -295.6666666667px #00ff40, 169px -352.6666666667px #a0f, 221px -286.6666666667px #40ff00, 144px -114.6666666667px #ff00c8, 106px -11.6666666667px #ff00c4, 167px -118.6666666667px #ffc400, -28px -277.6666666667px #ff002b, 73px -69.6666666667px #ff6a00, 104px -284.6666666667px #3c00ff, 16px -325.6666666667px #ff004c, -213px 49.3333333333px #9dff00, 15px -232.6666666667px #ffc400, 132px -118.6666666667px #001eff, -158px -179.6666666667px #f09, -65px -154.6666666667px #ff002f, 179px 15.3333333333px #d0f, 217px -310.6666666667px #ff0051, 243px -157.6666666667px #7b00ff, -176px -68.6666666667px #ff00e1, 42px -246.6666666667px #00ff9d, -239px -201.6666666667px #000dff, -45px -271.6666666667px #aeff00, 200px 47.3333333333px #00b3ff, 107px -335.6666666667px #00ff8c, 96px -75.6666666667px #ff0084, 197px -6.6666666667px #ff00a2, -103px -302.6666666667px #f0a, 165px -266.6666666667px #ff0026, 243px -32.6666666667px #00fbff, -74px -248.6666666667px #ff0084, 67px -361.6666666667px #ff5900, 207px 0.3333333333px #00ffbf, 183px -249.6666666667px #00ff62, -33px -346.6666666667px #0fc, 93px -335.6666666667px #ff0040;
                }
            }

            @-o-keyframes bang {
                to {
                    box-shadow: -33px -195.6666666667px #40ff00, -248px -284.6666666667px #ff8c00, 91px -121.6666666667px #ff00e1, -156px -264.6666666667px #ff00bf, 71px -255.6666666667px #0ff, 248px -12.6666666667px #0ff, -163px -45.6666666667px #ff4000, 45px -259.6666666667px #4800ff, 20px -131.6666666667px #ffd500, 131px -139.6666666667px #0bf, 79px 64.3333333333px #4cff00, 13px -13.6666666667px #f06, 141px 9.3333333333px #0f0, -129px 39.3333333333px #ff2600, 71px -267.6666666667px #40ff00, -241px -37.6666666667px #ffa600, 242px -295.6666666667px #00ff40, 169px -352.6666666667px #a0f, 221px -286.6666666667px #40ff00, 144px -114.6666666667px #ff00c8, 106px -11.6666666667px #ff00c4, 167px -118.6666666667px #ffc400, -28px -277.6666666667px #ff002b, 73px -69.6666666667px #ff6a00, 104px -284.6666666667px #3c00ff, 16px -325.6666666667px #ff004c, -213px 49.3333333333px #9dff00, 15px -232.6666666667px #ffc400, 132px -118.6666666667px #001eff, -158px -179.6666666667px #f09, -65px -154.6666666667px #ff002f, 179px 15.3333333333px #d0f, 217px -310.6666666667px #ff0051, 243px -157.6666666667px #7b00ff, -176px -68.6666666667px #ff00e1, 42px -246.6666666667px #00ff9d, -239px -201.6666666667px #000dff, -45px -271.6666666667px #aeff00, 200px 47.3333333333px #00b3ff, 107px -335.6666666667px #00ff8c, 96px -75.6666666667px #ff0084, 197px -6.6666666667px #ff00a2, -103px -302.6666666667px #f0a, 165px -266.6666666667px #ff0026, 243px -32.6666666667px #00fbff, -74px -248.6666666667px #ff0084, 67px -361.6666666667px #ff5900, 207px 0.3333333333px #00ffbf, 183px -249.6666666667px #00ff62, -33px -346.6666666667px #0fc, 93px -335.6666666667px #ff0040;
                }
            }

            @-ms-keyframes bang {
                to {
                    box-shadow: -33px -195.6666666667px #40ff00, -248px -284.6666666667px #ff8c00, 91px -121.6666666667px #ff00e1, -156px -264.6666666667px #ff00bf, 71px -255.6666666667px #0ff, 248px -12.6666666667px #0ff, -163px -45.6666666667px #ff4000, 45px -259.6666666667px #4800ff, 20px -131.6666666667px #ffd500, 131px -139.6666666667px #0bf, 79px 64.3333333333px #4cff00, 13px -13.6666666667px #f06, 141px 9.3333333333px #0f0, -129px 39.3333333333px #ff2600, 71px -267.6666666667px #40ff00, -241px -37.6666666667px #ffa600, 242px -295.6666666667px #00ff40, 169px -352.6666666667px #a0f, 221px -286.6666666667px #40ff00, 144px -114.6666666667px #ff00c8, 106px -11.6666666667px #ff00c4, 167px -118.6666666667px #ffc400, -28px -277.6666666667px #ff002b, 73px -69.6666666667px #ff6a00, 104px -284.6666666667px #3c00ff, 16px -325.6666666667px #ff004c, -213px 49.3333333333px #9dff00, 15px -232.6666666667px #ffc400, 132px -118.6666666667px #001eff, -158px -179.6666666667px #f09, -65px -154.6666666667px #ff002f, 179px 15.3333333333px #d0f, 217px -310.6666666667px #ff0051, 243px -157.6666666667px #7b00ff, -176px -68.6666666667px #ff00e1, 42px -246.6666666667px #00ff9d, -239px -201.6666666667px #000dff, -45px -271.6666666667px #aeff00, 200px 47.3333333333px #00b3ff, 107px -335.6666666667px #00ff8c, 96px -75.6666666667px #ff0084, 197px -6.6666666667px #ff00a2, -103px -302.6666666667px #f0a, 165px -266.6666666667px #ff0026, 243px -32.6666666667px #00fbff, -74px -248.6666666667px #ff0084, 67px -361.6666666667px #ff5900, 207px 0.3333333333px #00ffbf, 183px -249.6666666667px #00ff62, -33px -346.6666666667px #0fc, 93px -335.6666666667px #ff0040;
                }
            }

            @keyframes bang {
                to {
                    box-shadow: -33px -195.6666666667px #40ff00, -248px -284.6666666667px #ff8c00, 91px -121.6666666667px #ff00e1, -156px -264.6666666667px #ff00bf, 71px -255.6666666667px #0ff, 248px -12.6666666667px #0ff, -163px -45.6666666667px #ff4000, 45px -259.6666666667px #4800ff, 20px -131.6666666667px #ffd500, 131px -139.6666666667px #0bf, 79px 64.3333333333px #4cff00, 13px -13.6666666667px #f06, 141px 9.3333333333px #0f0, -129px 39.3333333333px #ff2600, 71px -267.6666666667px #40ff00, -241px -37.6666666667px #ffa600, 242px -295.6666666667px #00ff40, 169px -352.6666666667px #a0f, 221px -286.6666666667px #40ff00, 144px -114.6666666667px #ff00c8, 106px -11.6666666667px #ff00c4, 167px -118.6666666667px #ffc400, -28px -277.6666666667px #ff002b, 73px -69.6666666667px #ff6a00, 104px -284.6666666667px #3c00ff, 16px -325.6666666667px #ff004c, -213px 49.3333333333px #9dff00, 15px -232.6666666667px #ffc400, 132px -118.6666666667px #001eff, -158px -179.6666666667px #f09, -65px -154.6666666667px #ff002f, 179px 15.3333333333px #d0f, 217px -310.6666666667px #ff0051, 243px -157.6666666667px #7b00ff, -176px -68.6666666667px #ff00e1, 42px -246.6666666667px #00ff9d, -239px -201.6666666667px #000dff, -45px -271.6666666667px #aeff00, 200px 47.3333333333px #00b3ff, 107px -335.6666666667px #00ff8c, 96px -75.6666666667px #ff0084, 197px -6.6666666667px #ff00a2, -103px -302.6666666667px #f0a, 165px -266.6666666667px #ff0026, 243px -32.6666666667px #00fbff, -74px -248.6666666667px #ff0084, 67px -361.6666666667px #ff5900, 207px 0.3333333333px #00ffbf, 183px -249.6666666667px #00ff62, -33px -346.6666666667px #0fc, 93px -335.6666666667px #ff0040;
                }
            }

            @-webkit-keyframes gravity {
                to {
                    transform: translateY(200px);
                    -moz-transform: translateY(200px);
                    -webkit-transform: translateY(200px);
                    -o-transform: translateY(200px);
                    -ms-transform: translateY(200px);
                    opacity: 0;
                }
            }

            @-moz-keyframes gravity {
                to {
                    transform: translateY(200px);
                    -moz-transform: translateY(200px);
                    -webkit-transform: translateY(200px);
                    -o-transform: translateY(200px);
                    -ms-transform: translateY(200px);
                    opacity: 0;
                }
            }

            @-o-keyframes gravity {
                to {
                    transform: translateY(200px);
                    -moz-transform: translateY(200px);
                    -webkit-transform: translateY(200px);
                    -o-transform: translateY(200px);
                    -ms-transform: translateY(200px);
                    opacity: 0;
                }
            }

            @-ms-keyframes gravity {
                to {
                    transform: translateY(200px);
                    -moz-transform: translateY(200px);
                    -webkit-transform: translateY(200px);
                    -o-transform: translateY(200px);
                    -ms-transform: translateY(200px);
                    opacity: 0;
                }
            }

            @keyframes gravity {
                to {
                    transform: translateY(200px);
                    -moz-transform: translateY(200px);
                    -webkit-transform: translateY(200px);
                    -o-transform: translateY(200px);
                    -ms-transform: translateY(200px);
                    opacity: 0;
                }
            }

            @-webkit-keyframes position {

                0%,
                19.9% {
                    margin-top: 10%;
                    margin-left: 40%;
                }

                20%,
                39.9% {
                    margin-top: 40%;
                    margin-left: 30%;
                }

                40%,
                59.9% {
                    margin-top: 20%;
                    margin-left: 70%;
                }

                60%,
                79.9% {
                    margin-top: 30%;
                    margin-left: 20%;
                }

                80%,
                99.9% {
                    margin-top: 30%;
                    margin-left: 80%;
                }
            }

            @-moz-keyframes position {

                0%,
                19.9% {
                    margin-top: 10%;
                    margin-left: 40%;
                }

                20%,
                39.9% {
                    margin-top: 40%;
                    margin-left: 30%;
                }

                40%,
                59.9% {
                    margin-top: 20%;
                    margin-left: 70%;
                }

                60%,
                79.9% {
                    margin-top: 30%;
                    margin-left: 20%;
                }

                80%,
                99.9% {
                    margin-top: 30%;
                    margin-left: 80%;
                }
            }

            @-o-keyframes position {

                0%,
                19.9% {
                    margin-top: 10%;
                    margin-left: 40%;
                }

                20%,
                39.9% {
                    margin-top: 40%;
                    margin-left: 30%;
                }

                40%,
                59.9% {
                    margin-top: 20%;
                    margin-left: 70%;
                }

                60%,
                79.9% {
                    margin-top: 30%;
                    margin-left: 20%;
                }

                80%,
                99.9% {
                    margin-top: 30%;
                    margin-left: 80%;
                }
            }

            @-ms-keyframes position {

                0%,
                19.9% {
                    margin-top: 10%;
                    margin-left: 40%;
                }

                20%,
                39.9% {
                    margin-top: 40%;
                    margin-left: 30%;
                }

                40%,
                59.9% {
                    margin-top: 20%;
                    margin-left: 70%;
                }

                60%,
                79.9% {
                    margin-top: 30%;
                    margin-left: 20%;
                }

                80%,
                99.9% {
                    margin-top: 30%;
                    margin-left: 80%;
                }
            }

            @keyframes position {

                0%,
                19.9% {
                    margin-top: 10%;
                    margin-left: 40%;
                }

                20%,
                39.9% {
                    margin-top: 40%;
                    margin-left: 30%;
                }

                40%,
                59.9% {
                    margin-top: 20%;
                    margin-left: 70%;
                }

                60%,
                79.9% {
                    margin-top: 30%;
                    margin-left: 20%;
                }

                80%,
                99.9% {
                    margin-top: 30%;
                    margin-left: 80%;
                }
            }
        </style>
        <div class="modal fade " id="festivalPopup">
            <div class="pyro">
                <div class="before"></div>
                <div class="before"></div>
                <div class="after"></div>
                <div class="after"></div>
            </div>
            <div class=" modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
                <div class="modal-content p-0 m-0">
                    <button type="button" class="close closebtnfestive" data-dismiss="modal">&times;</button>
                    <div class="modal-body p-0 m-0">
                        <img src="<?php echo ADMIN_SITE_PATH ?>media/festive/<?php echo $bannerfestive['festival_banner'] ?>" class="img-fluid " alt="<?php echo $bannerfestive['festival_name'] ?>">
                    </div>

                </div>
            </div>
        </div>
        <script>
            $(document).ready(function() {
                setTimeout(() => {
                    $('#festivalPopup').modal('show');
                }, 1000);
            });
            // Verify that the modal element exists on the page
            var modal = document.querySelector('.modal');
            if (modal) {
                modal.style.cursor = 'url("images/fireworks.png"), auto';
            }
        </script>
    <?php }
    ?>
<?php } ?>