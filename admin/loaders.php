<?php
$getsetting = getsetting($link);
$getsetting = json_decode($getsetting, true);
foreach ($getsetting as $getsinglesetting) {
    extract($getsinglesetting);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <style>
        #overlay {
            position: fixed;
            z-index: 9999998;
            /* Make sure the overlay is below the loading spinner */
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgb(33 33 33);
            /* Semi-transparent black overlay */
            display: flex;
            justify-content: center;
            align-items: center;
        }
    </style>



<div id="overlay" >
    <?php
    if ($preloader == 1) {
    ?>
        <style>
            /* Existing styles for the loading spinner */
            #foodieezloader {
                position: fixed;
                z-index: 9999999;
                left: 0;
                right: 0;
                top: 50%;
                display: flex;
                justify-content: center;
                align-items: center;
            }


            #container {
                display: flex;
                justify-content: center;
                align-items: center;
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
            }


            #h3 {
                color: white;
            }

            #ring {
                width: 190px;
                height: 190px;
                border: 1px solid transparent;
                border-radius: 50%;
                position: absolute;
            }

            #ring:nth-child(1) {
                border-bottom: 8px solid lightgreen;
                animation: rotate1 2s linear infinite;
            }

            @keyframes rotate1 {
                from {
                    transform: rotateX(50deg) rotateZ(110deg);
                }

                to {
                    transform: rotateX(50deg) rotateZ(470deg);
                }
            }

            #ring:nth-child(2) {
                border-bottom: 8px solid green;
                animation: rotate2 2s linear infinite;
            }

            @keyframes rotate2 {
                from {
                    transform: rotateX(20deg) rotateY(50deg) rotateZ(20deg);
                }

                to {
                    transform: rotateX(20deg) rotateY(50deg) rotateZ(380deg);
                }
            }

            #ring:nth-child(3) {
                border-bottom: 8px solid orangered;
                animation: rotate3 2s linear infinite;
            }

            @keyframes rotate3 {
                from {
                    transform: rotateX(40deg) rotateY(130deg) rotateZ(450deg);
                }

                to {
                    transform: rotateX(40deg) rotateY(130deg) rotateZ(90deg);
                }
            }

            #ring:nth-child(4) {
                border-bottom: 8px solid rgb(252, 183, 55);
                animation: rotate4 2s linear infinite;
            }

            @keyframes rotate4 {
                from {
                    transform: rotateX(70deg) rotateZ(270deg);
                }

                to {
                    transform: rotateX(70deg) rotateZ(630deg);
                }
            }
        </style>
        <div id="foodieezloader">
            <div id="container">
                <div id="ring"></div>
                <div id="ring"></div>
                <div id="ring"></div>
                <div id="ring"></div>
                <div id="h3">Please Wait...</div>
            </div>
        </div>
    <?php } else if ($preloader == 2) {
    ?>
        <style>
            .load2 {
                position: absolute;
                width: 100px;
                height: 100px;
                top: 0;
                bottom: 0;
                left: 0;
                right: 0;
                margin: auto;
            }

            .load2 .item {
                width: 50px;
                height: 50px;
                position: absolute;
            }

            .load2 .item-1 {
                background-color: rgb(250, 87, 103);
                top: 0;
                left: 0;
                z-index: 1;
                animation: item-1_move 1.8s cubic-bezier(.6, .01, .4, 1) infinite;
            }

            .load2 .item-2 {
                background-color: rgb(121, 68, 228);
                top: 0;
                right: 0;
                animation: item-2_move 1.8s cubic-bezier(.6, .01, .4, 1) infinite;
            }

            .load2 .item-3 {
                background-color: rgb(27, 145, 247);
                bottom: 0;
                right: 0;
                z-index: 1;
                animation: item-3_move 1.8s cubic-bezier(.6, .01, .4, 1) infinite;
            }

            .load2 .item-4 {
                background-color: rgb(250, 194, 76);
                bottom: 0;
                left: 0;
                animation: item-4_move 1.8s cubic-bezier(.6, .01, .4, 1) infinite;
            }

            @keyframes item-1_move {

                0%,
                100% {
                    transform: translate(0, 0)
                }

                25% {
                    transform: translate(0, 50px)
                }

                50% {
                    transform: translate(50px, 50px)
                }

                75% {
                    transform: translate(50px, 0)
                }
            }

            @keyframes item-2_move {

                0%,
                100% {
                    transform: translate(0, 0)
                }

                25% {
                    transform: translate(-50px, 0)
                }

                50% {
                    transform: translate(-50px, 50px)
                }

                75% {
                    transform: translate(0, 50px)
                }
            }

            @keyframes item-3_move {

                0%,
                100% {
                    transform: translate(0, 0)
                }

                25% {
                    transform: translate(0, -50px)
                }

                50% {
                    transform: translate(-50px, -50px)
                }

                75% {
                    transform: translate(-50px, 0)
                }
            }

            @keyframes item-4_move {

                0%,
                100% {
                    transform: translate(0, 0)
                }

                25% {
                    transform: translate(50px, 0)
                }

                50% {
                    transform: translate(50px, -50px)
                }

                75% {
                    transform: translate(0, -50px)
                }
            }
        </style>
        <div class="load2">
            <div class="item item-1"></div>
            <div class="item item-2"></div>
            <div class="item item-3"></div>
            <div class="item item-4"></div>
        </div>
    <?php } else if ($preloader == 3) {
    ?>
        <style>
            .loader {
                position: absolute;
                margin: auto;
                top: 0;
                bottom: 0;
                left: 0;
                right: 0;
                width: 6.250em;
                height: 6.250em;
                animation: rotate5123 2.4s linear infinite;
            }

            .white {
                top: 0;
                bottom: 0;
                left: 0;
                right: 0;
                background: white;
                animation: flash 2.4s linear infinite;
                opacity: 0;
            }

            .dot {
                position: absolute;
                margin: auto;
                width: 2.4em;
                height: 2.4em;
                border-radius: 100%;
                transition: all 1s ease;
            }

            .dot:nth-child(2) {
                top: 0;
                bottom: 0;
                left: 0;
                background: #FF4444;
                animation: dotsY 2.4s linear infinite;
            }

            .dot:nth-child(3) {
                left: 0;
                right: 0;
                top: 0;
                background: #FFBB33;
                animation: dotsX 2.4s linear infinite;
            }

            .dot:nth-child(4) {
                top: 0;
                bottom: 0;
                right: 0;
                background: #99CC00;
                animation: dotsY 2.4s linear infinite;
            }

            .dot:nth-child(5) {
                left: 0;
                right: 0;
                bottom: 0;
                background: #33B5E5;
                animation: dotsX 2.4s linear infinite;
            }

            @keyframes rotate5123 {
                0% {
                    transform: rotate(0);
                }

                10% {
                    width: 6.250em;
                    height: 6.250em;
                }

                66% {
                    width: 2.4em;
                    height: 2.4em;
                }

                100% {
                    transform: rotate(360deg);
                    width: 6.250em;
                    height: 6.250em;
                }
            }

            @keyframes dotsY {
                66% {
                    opacity: .1;
                    width: 2.4em;
                }

                77% {
                    opacity: 1;
                    width: 0;
                }
            }

            @keyframes dotsX {
                66% {
                    opacity: .1;
                    height: 2.4em;
                }

                77% {
                    opacity: 1;
                    height: 0;
                }
            }

            @keyframes flash {
                33% {
                    opacity: 0;
                    border-radius: 0%;
                }

                55% {
                    opacity: .6;
                    border-radius: 100%;
                }

                66% {
                    opacity: 0;
                }
            }
        </style>
        <figure class="loader">
            <div class="dot white"></div>
            <div class="dot"></div>
            <div class="dot"></div>
            <div class="dot"></div>
            <div class="dot"></div>
        </figure>
    <?php    } else if ($preloader == 4) {
    ?>
        <style>
            #wifi-loader {
                --background: #62abff;
                --front-color: #4f29f0;
                --back-color: #c3c8de;
                --text-color: #414856;
                width: 64px;
                height: 64px;
                border-radius: 50px;
                position: relative;
                display: flex;
                justify-content: center;
                align-items: center;
            }

            #wifi-loader svg {
                position: absolute;
                display: flex;
                justify-content: center;
                align-items: center;
            }

            #wifi-loader svg circle {
                position: absolute;
                fill: none;
                stroke-width: 6px;
                stroke-linecap: round;
                stroke-linejoin: round;
                transform: rotate(-100deg);
                transform-origin: center;
            }

            #wifi-loader svg circle.back {
                stroke: var(--back-color);
            }

            #wifi-loader svg circle.front {
                stroke: var(--front-color);
            }

            #wifi-loader svg.circle-outer {
                height: 86px;
                width: 86px;
            }

            #wifi-loader svg.circle-outer circle {
                stroke-dasharray: 62.75 188.25;
            }

            #wifi-loader svg.circle-outer circle.back {
                animation: circle-outer135 1.8s ease infinite 0.3s;
            }

            #wifi-loader svg.circle-outer circle.front {
                animation: circle-outer135 1.8s ease infinite 0.15s;
            }

            #wifi-loader svg.circle-middle {
                height: 60px;
                width: 60px;
            }

            #wifi-loader svg.circle-middle circle {
                stroke-dasharray: 42.5 127.5;
            }

            #wifi-loader svg.circle-middle circle.back {
                animation: circle-middle6123 1.8s ease infinite 0.25s;
            }

            #wifi-loader svg.circle-middle circle.front {
                animation: circle-middle6123 1.8s ease infinite 0.1s;
            }

            #wifi-loader svg.circle-inner {
                height: 34px;
                width: 34px;
            }

            #wifi-loader svg.circle-inner circle {
                stroke-dasharray: 22 66;
            }

            #wifi-loader svg.circle-inner circle.back {
                animation: circle-inner162 1.8s ease infinite 0.2s;
            }

            #wifi-loader svg.circle-inner circle.front {
                animation: circle-inner162 1.8s ease infinite 0.05s;
            }

            #wifi-loader .text {
                position: absolute;
                bottom: -40px;
                display: flex;
                justify-content: center;
                align-items: center;
                text-transform: lowercase;
                font-weight: 500;
                font-size: 14px;
                letter-spacing: 0.2px;
            }

            #wifi-loader .text::before,
            #wifi-loader .text::after {
                content: attr(data-text);
            }

            #wifi-loader .text::before {
                color: var(--text-color);
            }

            #wifi-loader .text::after {
                color: var(--front-color);
                animation: text-animation76 3.6s ease infinite;
                position: absolute;
                left: 0;
            }

            @keyframes circle-outer135 {
                0% {
                    stroke-dashoffset: 25;
                }

                25% {
                    stroke-dashoffset: 0;
                }

                65% {
                    stroke-dashoffset: 301;
                }

                80% {
                    stroke-dashoffset: 276;
                }

                100% {
                    stroke-dashoffset: 276;
                }
            }

            @keyframes circle-middle6123 {
                0% {
                    stroke-dashoffset: 17;
                }

                25% {
                    stroke-dashoffset: 0;
                }

                65% {
                    stroke-dashoffset: 204;
                }

                80% {
                    stroke-dashoffset: 187;
                }

                100% {
                    stroke-dashoffset: 187;
                }
            }

            @keyframes circle-inner162 {
                0% {
                    stroke-dashoffset: 9;
                }

                25% {
                    stroke-dashoffset: 0;
                }

                65% {
                    stroke-dashoffset: 106;
                }

                80% {
                    stroke-dashoffset: 97;
                }

                100% {
                    stroke-dashoffset: 97;
                }
            }

            @keyframes text-animation76 {
                0% {
                    clip-path: inset(0 100% 0 0);
                }

                50% {
                    clip-path: inset(0);
                }

                100% {
                    clip-path: inset(0 0 0 100%);
                }
            }
        </style>
        <div id="wifi-loader">
            <svg class="circle-outer" viewBox="0 0 86 86">
                <circle class="back" cx="43" cy="43" r="40"></circle>
                <circle class="front" cx="43" cy="43" r="40"></circle>
                <circle class="new" cx="43" cy="43" r="40"></circle>
            </svg>
            <svg class="circle-middle" viewBox="0 0 60 60">
                <circle class="back" cx="30" cy="30" r="27"></circle>
                <circle class="front" cx="30" cy="30" r="27"></circle>
            </svg>
            <svg class="circle-inner" viewBox="0 0 34 34">
                <circle class="back" cx="17" cy="17" r="14"></circle>
                <circle class="front" cx="17" cy="17" r="14"></circle>
            </svg>
            <div class="text" data-text="Searching"></div>
        </div>
    <?php } else if ($preloader == 5) {
    ?>
        <style>
            .spinner {
                width: 56px;
                height: 56px;
                display: grid;
                border: 4.5px solid #0000;
                border-radius: 50%;
                border-color: #dbdcef #0000;
                animation: spinner-e04l1k 1s infinite linear;
            }

            .spinner::before,
            .spinner::after {
                content: "";
                grid-area: 1/1;
                margin: 2.2px;
                border: inherit;
                border-radius: 50%;
            }

            .spinner::before {
                border-color: #474bff #0000;
                animation: inherit;
                animation-duration: 0.5s;
                animation-direction: reverse;
            }

            .spinner::after {
                margin: 8.9px;
            }

            @keyframes spinner-e04l1k {
                100% {
                    transform: rotate(1turn);
                }
            }
        </style>
        <div class="spinner"></div>

    <?php } else if ($preloader == 6) {
    ?>
        <style>
            .loader {
                transform: translateZ(1px);
            }

            .loader:after {
                content: '$';
                display: inline-block;
                width: 48px;
                height: 48px;
                border-radius: 50%;
                text-align: center;
                line-height: 40px;
                font-size: 32px;
                font-weight: bold;
                background: #FFD700;
                color: #DAA520;
                border: 4px double;
                box-sizing: border-box;
                box-shadow: 2px 2px 2px 1px rgba(0, 0, 0, .1);
                animation: coin-flip 4s cubic-bezier(0, 0.2, 0.8, 1) infinite;
            }

            @keyframes coin-flip {

                0%,
                100% {
                    animation-timing-function: cubic-bezier(0.5, 0, 1, 0.5);
                }

                0% {
                    transform: rotateY(0deg);
                }

                50% {
                    transform: rotateY(1800deg);
                    animation-timing-function: cubic-bezier(0, 0.5, 0.5, 1);
                }

                100% {
                    transform: rotateY(3600deg);
                }
            }
        </style>
        <div class="loader"></div>
    <?php } else if ($preloader == 7) {
    ?>
        <style>
            .spinner {
                width: 3em;
                height: 3em;
                cursor: not-allowed;
                border-radius: 50%;
                border: 2px solid #444;
                box-shadow: -10px -10px 10px #6359f8, 0px -10px 10px 0px #9c32e2, 10px -10px 10px #f36896, 10px 0 10px #ff0b0b, 10px 10px 10px 0px#ff5500, 0 10px 10px 0px #ff9500, -10px 10px 10px 0px #ffb700;
                animation: rot55 0.7s linear infinite;
            }

            .spinnerin {
                border: 2px solid #444;
                width: 1.5em;
                height: 1.5em;
                border-radius: 50%;
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
            }

            @keyframes rot55 {
                to {
                    transform: rotate(360deg);
                }
            }
        </style>
        <div class="spinner">
            <div class="spinnerin"></div>
        </div>
    <?php } else if ($preloader == 8) {
    ?>
        <style>
            .loader {
                width: 8px;
                height: 40px;
                border-radius: 4px;
                display: block;
                background-color: currentColor;
                margin: 20px auto;
                position: relative;
                color: blue;
                animation: animloader 0.3s 0.3s linear infinite alternate;
            }

            .loader::after,
            .loader::before {
                content: '';
                width: 8px;
                height: 40px;
                border-radius: 4px;
                background: currentColor;
                position: absolute;
                top: 50%;
                transform: translateY(-50%);
                left: 20px;
                animation: animloader 0.3s 0.45s linear infinite alternate;
            }

            .loader::before {
                left: -20px;
                animation-delay: 0s;
            }

            @keyframes animloader {
                0% {
                    height: 48px;
                }

                100% {
                    height: 4px;
                }
            }
        </style>
        <div class="loader"></div>
    <?php } else if ($preloader == 9) {
    ?>
        <style>
            .loader {
                width: 85px;
                height: 85px;
                display: flex;
                flex-wrap: wrap;
                justify-content: space-between;
                align-content: space-between;
                animation: loading-rotate 3s linear infinite;
            }

            .item {
                width: 40px;
                height: 40px;
                display: block;
                box-sizing: border-box;
            }

            .item:nth-of-type(1) {
                background-color: #50DE68;
                border-radius: 20px 20px 0 20px;
                border-left: #ffffff 4px solid;
                border-top: #f7f7f7 4px solid;
            }

            .item:nth-of-type(2) {
                background-color: rgb(32, 80, 46);
                border-radius: 20px 20px 20px 0;
                border-right: #ffffff 4px solid;
                border-top: #f7f7f7 4px solid;
            }

            .item:nth-of-type(3) {
                background-color: rgb(0, 255, 55);
                border-radius: 20px 0 20px 20px;
                border-left: #ffffff 4px solid;
                border-bottom: #f7f7f7 4px solid;
            }

            .item:nth-of-type(4) {
                background-color: rgb(32, 182, 32);
                border-radius: 0 20px 20px 20px;
                border-right: #ffffff 4px solid;
                border-bottom: #f7f7f7 4px solid;
            }

            @keyframes loading-rotate {
                0% {
                    transform: scale(1) rotate(0);
                }

                20% {
                    transform: scale(1) rotate(72deg);
                }

                40% {
                    transform: scale(0.5) rotate(144deg);
                }

                60% {
                    transform: scale(0.5) rotate(216deg);
                }

                80% {
                    transform: scale(1) rotate(288deg);
                }

                100% {
                    transform: scale(1) rotate(360deg);
                }
            }
        </style>
        <div class="loader">
            <span class="item"></span>
            <span class="item"></span>
            <span class="item"></span>
            <span class="item"></span>
        </div>
    <?php } else if ($preloader == 10) {
    ?>
        <style>
            .loader {
                height: 120px;
                width: 120px;
                display: flex;
                justify-content: center;
                align-items: center;
                position: relative;
            }

            .loader div {
                height: 30px;
                width: 30px;
                position: absolute;
                animation: move 4s infinite;
            }

            .loader div:nth-child(1) {
                background-color: rgb(158, 136, 246);
                box-shadow: rgb(158, 136, 246) 0px 7px 29px 0px;
                transform: translate(-30px, -30px);
                animation-delay: -1s;
            }

            .loader div:nth-child(2) {
                background-color: rgb(97, 183, 253);
                box-shadow: rgb(97, 183, 253) 0px 7px 29px 0px;
                transform: translate(30px, -30px);
                animation-delay: -2s;
            }

            .loader div:nth-child(3) {
                background-color: rgb(95, 249, 175);
                box-shadow: rgb(95, 249, 175) 0px 7px 29px 0px;
                transform: translate(30px, 30px);
                animation-delay: -3s;
            }

            .loader div:nth-child(4) {
                background-color: rgb(243, 171, 89);
                box-shadow: rgb(243, 171, 89) 0px 7px 29px 0px;
                transform: translate(-30px, 30px);
                animation-delay: -4s;
            }

            @keyframes move {
                0% {
                    transform: translate(-30px, -30px);
                }

                25% {
                    transform: translate(30px, -30px);
                }

                50% {
                    transform: translate(30px, 30px);
                }

                75% {
                    transform: translate(-30px, 30px);
                }

                100% {
                    transform: translate(-30px, -30px);
                }
            }
        </style>
        <div class="loader">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
        </div>
    <?php } else if ($preloader == 11) {
    ?>
        <style>
            .code-loader {
                color: #fff;
                font-family: Consolas, Menlo, Monaco, monospace;
                font-weight: bold;
                font-size: 100px;
                opacity: 0.8;
            }

            .code-loader span {
                display: inline-block;
                animation: pulse_414 0.4s alternate infinite ease-in-out;
            }

            .code-loader span:nth-child(odd) {
                animation-delay: 0.4s;
            }

            @keyframes pulse_414 {
                to {
                    transform: scale(0.8);
                    opacity: 0.5;
                }
            }
        </style>
        <div class="code-loader">
            <span>{</span><span>}</span>
        </div>
    <?php } else if ($preloader == 12) {
    ?>
        <style>
            /* //codelessly loader style */
            .ui-loader {
                display: inline-block;
                width: 50px;
                height: 50px;
            }

            .loader-blk {
                color: #3f51b5;
                animation: rotate-outer08 1.4s linear infinite;
            }

            .multiColor-loader {
                display: block;
                animation: color-anim08 1.4s infinite;
            }

            .loader-circle {
                stroke: currentColor;
            }

            .MuiCircularProgress-circleStatic {
                transition: stroke-dashoffset 0.3s cubic-bezier(0.4, 0, 0.2, 1) 0s;
            }

            .loader-circle-animation {
                animation: rotate-inner08 1.4s ease-in-out infinite;
                stroke-dasharray: 80px, 200px;
                stroke-dashoffset: 0;
            }

            @keyframes rotate-outer08 {
                0% {
                    transform-origin: 50% 50%;
                }

                100% {
                    transform: rotate(360deg);
                }
            }

            @keyframes rotate-inner08 {
                0% {
                    stroke-dasharray: 1px, 200px;
                    stroke-dashoffset: 0;
                }

                50% {
                    stroke-dasharray: 100px, 200px;
                    stroke-dashoffset: -15px;
                }

                100% {
                    stroke-dasharray: 100px, 200px;
                    stroke-dashoffset: -125px;
                }
            }

            @keyframes color-anim08 {
                0% {
                    color: #4285f4;
                }

                25% {
                    color: #ea4335;
                }

                50% {
                    color: #f9bb2d;
                }

                75% {
                    color: #34a853;
                }
            }
        </style>
        <div class="ui-loader loader-blk">
            <svg viewBox="22 22 44 44" class="multiColor-loader">
                <circle cx="44" cy="44" r="20.2" fill="none" stroke-width="3.6" class="loader-circle loader-circle-animation"></circle>
            </svg>
        </div>
    <?php }
    ?>

</div>
</body>

</html>