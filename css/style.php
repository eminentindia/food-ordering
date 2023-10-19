<?php
header("Content-type: text/css; charset: UTF-8");

?>
<?php
include('../admin/controller/common-controller.php');
$conn = _connectodb();
include('../admin/setting/controller/setting-controller.php');
$getsetting = getsetting($conn);
$getsetting = json_decode($getsetting, true);
foreach ($getsetting as $getsinglesetting) {
  extract($getsinglesetting);
  // print_r($getsetting);
}
?>
@import url('https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600&display=swap');
@import url('https://fonts.googleapis.com/css2?family=Kalam:wght@300;400&family=Roboto+Slab:wght@200;300;400;500;600;700&display=swap');
* {
-webkit-box-sizing: border-box;
-moz-box-sizing: border-box;
box-sizing: border-box;
}

*,
::before,
::after {
box-sizing: border-box;
-webkit-box-sizing: border-box;
}

.tab-content::-webkit-scrollbar {
width: 7px; /* Adjust the width as needed */
border-radius:0px
}
.tab-content::-webkit-scrollbar-thumb {
background-color: var(--mainbtn); /* Change this color to your desired scrollbar color */
border-radius:20px;
}


.table-responsive::-webkit-scrollbar {
width: 4px; /* Adjust the width as needed */
border-radius:0px;height: 5px;
}
.table-responsive::-webkit-scrollbar-thumb {
background-color: var(--mainbtn); /* Change this color to your desired scrollbar color */
border-radius:20px;height: 5px;
}
html,body {
overflow-x: hidden !important;
}

:root {
--themecolor: <?php echo $themecolor; ?>;
--mainbtn: <?php echo $mainbtn; ?>;
--secondarybtn: <?php echo $secondarybtn ?>;
--mobilenav: <?php echo $mobilenav ?>;
--mobilenavtxt: <?php echo $mobilenavtxt ?>;
--mobilenavlight:<?php echo $mobilenavlight ?>;
}
.owl-carousel.owl-drag .owl-item{
height: 80px !important;
}
.owl-carousel .owl-item img{
cursor:pointer
}
body {
font-size: 13px;
line-height: 1.5;
-webkit-font-smoothing: antialiased;
-moz-osx-font-smoothing: grayscale;

font-family: 'Jost', sans-serif !important;
color: #424242;
margin: 0;
padding: 0;
}



article,
aside,
details,
figcaption,
figure,
footer,
header,
nav,
section,
summary {
display: block;
}

audio,
canvas,
video {
display: inline-block;
}

audio:not([controls]) {
display: none;
height: 0;
}

[hidden] {
display: none;
}

html,
button,
input,
select,
textarea {}

input:focus,
textarea:focus,
select:focus {
border-color: #cdcfd3;
}

input,
textarea {
padding: 10px 18px;
text-transform:capatalize
}

a {
text-decoration: none;
}

a:hover {
text-decoration: none !important;
}

select {
-webkit-appearance: none;
-moz-appearance: none;
appearance: none;
background-position: right center;
background-image: url(../images/arrow-select.png) !important;
background-repeat: no-repeat !important;
background-position: right 10px center !important;
line-height: 1.2;
text-indent: 0.01px;
text-overflow: "";
cursor: pointer;
padding-bottom: 8px 28px 8px 15px;
text-transform:capatalize
}

iframe {
border: 0;
width: 100%;
}

a {
color: #555555;
text-decoration: none;
-ms-transition: all 0.5s ease-in-out;
-webkit-transition: all 0.5s ease-in-out;
transition: all 0.5s ease-in-out;
}

a:focus {
outline: none;
}

a:active,
a:hover {
color: #353333;
outline: none;
}


a:hover, a:focus {
    opacity: 0.8;
    filter: saturate(1.6);
}

a:hover {
text-decoration: underline;
}

p {
margin: 0 0 24px;
}

pre {
background: #f5f5f5;
color: #666;

font-size: 14px;
margin: 20px 0;
overflow: auto;
padding: 20px;
white-space: pre;
white-space: pre-wrap;
word-wrap: break-word;
}

blockquote,
q {
-webkit-hyphens: none;
-moz-hyphens: none;
-ms-hyphens: none;
hyphens: none;
quotes: none;
}

blockquote:before,
blockquote:after,
q:before,
q:after {
content: "";
content: none;
}

blockquote {
font-size: 18px;
font-style: italic;

margin: 24px 40px;
}

blockquote blockquote {
margin-right: 0;
}

blockquote cite,
blockquote small {
font-size: 14px;

text-transform: uppercase;
}

blockquote em,
blockquote i {
font-style: normal;

}

img {
-ms-interpolation-mode: bicubic;
border: 0;
vertical-align: middle;
}

svg:not(:root) {
overflow: hidden;
}

ol,
ul {
padding: 0;
margin: 0;
}

ul li {
list-style-type: none;
list-style: none;
}

.list-items {
margin-left: 15px;
}

.hide {
display: none !important;
}

.errmsg {
border-left: red 3px solid;
background: antiquewhite;
padding: 5px 10px;
}
.form-control form-controlcontact-feedback {
top: 0px !important;
right: 20px !important;
}

.glyphicon-ok::before {
color: green !important;
}

.glyphicon-remove::before {
color: #f43a3a !important;
}

.help-block {
display: block;
margin-top: 5px;
margin-bottom: 10px;
color: #ff5353;
}

#siteNav a {
color: #535353 !important;
}

.store {
padding: 20px;
color: #fff;
margin-bottom: 20px
}

.store1 {
background: #ffb100bf
}

.store2 {
background: #5d9c59d6
}

.store3 {
background: #f96666cc
}

.invercolor {
filter: invert(100%);
-webkit-filter: invert(100%);
width: 25px
}

.contactIntro {
display: flex;
margin: 0 230px
}

.catcommonwidth {
width: 120px;
border-radius: 20px !important
}

.ulPillsMain img {
width: 50px
}

.dayTitle {
font-size: 1.1rem;
text-transform: uppercase;
color: #fff
}

.ulPillsMain .text-body {
font-size: .8rem;
color: #ffd9a0 !important
}

.ulPillsMain .paddingCommon {
padding-bottom: .5rem
}

.ps-4custom {
padding-left: 1.5rem
}

.customCheckBox {
gap: 10px
}

.choosestore {
gap: 8px;
padding: 10px;
color: #545454;
font-size: 1rem;
<!-- border: 1px dashed rgb(113 153 26); -->
<!-- background: #71991a1f -->
}

.text-primary {
color: #fd7d16 !important;
}
.alignitcontact{
display: flex;
align-items: center;
gap: 10px;
}
.successmsg {
border-left: #50c80d 3px solid;
background: #d7fad9;
padding: 5px 10px;
}
#tiffin .item-name-text {
margin-right: 4px;
font-size: 1.22rem;
font-weight: 500;
color: #3e4152;
word-break: break-word;
margin-bottom: 0;
}

#tiffin .details-container {
max-width: calc(100% - 144px);
}

#tiffin .item-container {
display: -webkit-box;
display: flex;
-webkit-box-pack: justify;
justify-content: space-between;
align-items: center;
border-bottom: 0.5px solid #d3d3d3;
padding: 10px 0 ;
}

#tiffin .item-price-container {
font-size: 1rem;
margin-right: 8px;
font-weight: 400;
color: #338937;
margin-top: 2px;
}

#tiffin .item-description,
#tiffin .item-description p {
width: 100%;
font-family: 'Kalam', cursive;
margin-top: 5px;
line-height: 1.3;
color: rgb(40 44 63 / 73%);
width: 70%;
font-size: .9rem;
line-height: 23px;
white-space: nowrap;
}

#tiffin .add-button-text {
color: #60b246;
width: 100%;
height: 100%;
font-family: 'Kalam', cursive;
cursor: pointer;box-shadow: 0 3px 8px #e9e9eb;
}

#tiffin .add-button-text:hover {
cursor: pointer;box-shadow: 0 8px 8px #e9e9eb;
}
#tiffin .add-button-inner {
width: 96px !important;
height: 36px !important;
display: inline-block;
height: 30px;
width: 83px;
border: 1px solid #d4d5d9;
color: #60b246;
font-size: .9rem;
font-weight: 600;
line-height: 36px;
position: relative;
text-align: center;
border-radius: 8px;
background-color: #fff;
}
.onerem{
color: white !important;
size: 1rem !important;
}
.section-title {
position: relative;
font-family: 'Kalam', cursive;
display: inline-block;font-size: 2.4rem; color: #fea116 !important;
}
/* Simplified and corrected CSS code */

/* Adjusted the specificity of this selector */
.form-floating label {
font-weight: 400;
}

/* Simplified and organized the properties */
.form-controlcontact {
display: block !important;
width: 100% !important;
height: 34px !important;
padding: 6px 12px !important;
font-size: 14px !important;
line-height: 1.42857143 !important;
color: #202b07 !important;
background-color: #fff !important;
background-image: none !important;
border: 1px solid #e4e4e4 !important;
border-radius: 0 !important;
box-shadow: none !important;
transition: border-color ease-in-out 0.15s, box-shadow ease-in-out 0.15s !important;
}

/* Simplified and adjusted positioning */
.form-floating {
position: relative !important;
font-family: 'Kalam', cursive;
}

/* Simplified padding values */
.form-floating .form-control,
.form-floating .form-select {
padding-top: 1.625rem !important;
padding-bottom: 0.9rem !important;height: 45px !important;
height:75px !Important
}

/* Adjusted positioning */
.form-floating label {
position: absolute !important;
top: 0 !important;
left: 0 !important;
height: 100% !important;
padding: 1rem 0.75rem !important;
pointer-events: none !important;
border: 1px solid transparent !important;
transform-origin: 0 0 !important;
transition: opacity 0.1s ease-in-out, transform 0.1s ease-in-out !important;
}

/* Simplified the media query */
@media (prefers-reduced-motion: reduce) {
.form-floating label {
transition: none !important;
}

/* Adjusted textarea height */
textarea.form-control {
height: auto !important;
}
}

/* Simplified placeholder color */
.form-floating .form-control::placeholder {
color: transparent !important;
}

/* Simplified and adjusted padding values */
.form-floating .form-control:focus,
.form-floating .form-control:not(:placeholder-shown) {
padding-top: 1.625rem !important;
padding-bottom: 0.625rem !important;
}

/* Adjusted autofill padding */
.form-floating .form-control:-webkit-autofill {
padding-top: 1.625rem !important;
padding-bottom: 0.625rem !important;height: 45px !important;
}

/* Simplified and adjusted label styles */
.form-floating .form-control:focus ~ label,
.form-floating .form-control:not(:placeholder-shown) ~ label,
.form-floating .form-select ~ label,
.form-floating .form-control:-webkit-autofill ~ label {
opacity: 0.65 !important;
transform: scale(0.85) translateY(-0.5rem) translateX(0.15rem) !important;
}


.input-group>.form-control,.input-group>.form-select{
position:relative;
flex:1 1 auto;
width:1%;
min-width:0
}
.input-group>.form-control:focus,.input-group>.form-select:focus{
z-index:3
}
.section-title::before {
position: absolute;
left: -55px;
}

.section-title::after, .section-title::before {
content: "";
width: 45px;
height: 2px;
margin-top: -1px;
position: absolute;
background: #fea116;
top: 50%;
}.contactIntro {
display: flex;
margin: 0 230px;
}
#tiffin .add-button-inner {
position: relative;
width: 96px;
min-height: 36px;

}

#tiffin .add-button {
position: absolute;
left: 50%;
bottom: 4px;
-webkit-transform: translateX(-50%);
transform: translateX(-50%);
z-index: 1;
}

#tiffin .image-container {
position: relative;
margin-left: 16px;
min-width: 118px;
min-height: 120px;
}

#tiffin .typeicon {
width: 16px;
margin-bottom: 4px;
}

#tiffin .image-button {
width: 118px;
height: 96px;
-o-object-fit: cover;
object-fit: cover;
border-radius: 10px;
padding: 0;
background: transparent;
border: none;
cursor: pointer;
outline: none;
text-align: left;
}

#tiffin .image-button img {

width: 118px;
height: 96px;
-o-object-fit: cover;
object-fit: cover;
border-radius: 10px;
}
/*======================================================================
3. Typography
========================================================================*/

h1,
h2,
h3,
h4,
h5,
h6,
.h1,
.h2,
.h3,
.h4,
.h5,
.h6,
address,
p,
pre,
blockquote,
dl,
dd,
menu,
ol,
ul,
table,
caption,
hr {
margin: 0;
margin-bottom: 15px;
color: #353333;
margin: 0 0 10px;
line-height: 1.2;
overflow-wrap: break-word;
word-wrap: break-word;
}

h1,
.h1 {
font-size: 24px;
}

h2,
.h2 {
font-size: 19px;
letter-spacing: 0.03em;
text-transform: uppercase;
}

h3,
.h3 {
font-size: 16px;
}

h4,
.h4 {
font-size: 1em;
}

h5,
.h5 {
font-size: 18px;
}

h6,
.h6 {
font-size: 14px;
}

img {
max-width: 100%;
}

p {
color: #555;
}

p:last-child {
margin-bottom: 0;
}

input,
button,
select,
textarea {
background: transparent;
border: 1px solid #d7d7d7;
transition: all 0.4s ease-out 0s;
-webkit-transition: all 0.4s ease-out 0s;
color: #424242;
}

input:focus,
input:active,
button:focus,
button:active,
select:focus,
select:active,
textarea:focus,
textarea:active {
outline: none;
border-color: var(--themecolor);

}

input,
select,
textarea {
width: 100%;
font-size: 14px;
box-shadow: none;
-webkit-box-shadow: none;
border-radius: 0;
-webkit-border-radius: 0;
}

input,
select {
height: 40px;
padding: 0 40px 0 10px;margin-bottom:20px !important;
text-transform:capatalize !important;
}

input[type="checkbox"],
input[type="radio"] {
width: auto;
height: auto;
}

input[type="checkbox"]:focus,
input[type="radio"]:focus {
outline: 0;
box-shadow: none;
}

.text-left {
text-align: left !important;
}

.text-center {
text-align: center !important;
}

.text-right {
text-align: right !important;
}

hr {
margin: 20px 0;
border: 0;

}

.border-bottom {
border-bottom: 1px solid #f5f5f5 !important;
}
#codpayment img{
width:50px
}
#onlinepayment img{
width:50px
}
/*======================================================================
4. Utilities
========================================================================*/
.hidden {
display: none;
}

.visuallyhidden {
border: 0;
clip: rect(0 0 0 0);
height: 1px;
margin: -1px;
overflow: hidden;
padding: 0;
position: absolute;
width: 1px;
}

.poss_relative {
position: relative;
}

.poss_absolute {
position: absolute;
}

.visuallyhidden.focusable:active,
.visuallyhidden.focusable:focus {
clip: auto;
height: auto;
margin: 0;
overflow: visible;
position: static;
width: auto;
}

.invisible {
visibility: hidden;
}

.clearfix:before,
.clearfix:after {
content: " ";
/* 1 */
display: table;
/* 2 */
}

.clearfix:after {
clear: both;
}



/* Text specialized */
.text-italic {
font-style: italic;
}

.text-normal {
font-style: normal;
}

.text-underline {
font-style: underline;
}

/* Font specialized */
.body-font {}

.heading-font {}

.list--inline {
padding: 0;
margin: 0;
}

.list--inline li {
display: inline-block;
margin-bottom: 0;
vertical-align: middle;
}

.display-table {
display: table;
table-layout: fixed;
width: 100%;
margin: 0 !important;
}

.display-table-cell {
float: none;
display: table-cell;
vertical-align: middle;
}

/*======================================================================
5. Container
========================================================================*/
.container {
max-width: 1300px;
padding-left: 30px;
padding-right: 30px;
}

.container-fluid {
padding: 0 55px;
}

.container-fluid:before,
.container-fluid:after {
content: "";
clear: both;
display: block;
}

.grid {
*zoom: 1;
list-style: none;
margin: 0;
padding: 0;
margin-left: -30px;
}

.grid__item {
float: left;
padding-left: 30px;
width: 100%;
}

.grid--no-gutters>.grid__item {
padding-left: 0;
}
.mobfilterdiv{
width: 30px;
height: 30px;
line-height: 30px;
border: 1px solid lightgrey;
text-align: center;
display:none
}
.closeFilter {
position:relative !important
}

.closeposition{
position: absolute;
right: -10px;
border: 1px solid lightgrey;
width: 30px;
height: 30px;
text-align: center;
display: flex;
align-items: center;
justify-content: center;
top: -10px;
border-radius: 50%;
transition: all .4s ease;
background: white;
z-index: 9999999999;
}

#mySidebar .closeposition{position: fixed;
left: 200px;
border: 1px solid lightgrey;
width: 30px;
height: 30px;
text-align: center;
display: flex;
align-items: center;
justify-content: center;
top: 10px;
border-radius: 50%;
transition: all .4s ease;
background: white;
z-index: 9999999999;
}
/*======================================================================
6. Button
========================================================================*/
.btn,
.shopify-payment-button__button--unbranded {
-moz-user-select: none;
-ms-user-select: none;
-webkit-user-select: none;
user-select: none;
-webkit-appearance: none;
-moz-appearance: none;
appearance: none;
display: inline-block;
width: auto;
height: auto;
text-decoration: none;
text-align: center;
vertical-align: middle;
cursor: pointer;
border-radius: 0;
padding: 8px 15px 8px;
color: #fff;
text-transform: uppercase;
letter-spacing: 1px;
line-height: normal;
white-space: normal;
font-size: 13px;
-ms-transition: all 0.3s ease-in-out;
-webkit-transition: all 0.3s ease-in-out;
transition: all 0.3s ease-in-out;
}
.page-width span{
color:#ff8500 !important;
}
.btn-success {
color: #fff;
background-color: var(--mainbtn) !important;
border: 1px solid var(--mainbtn) !important;
outline: none !important;
box-shadow:none !important
}

.btn-success:hover {
color: white !important;
background-color:#ff8500 !important;
border: 1px solid #ff8500!important;
outline: none !important;
transform:scale(1.2)
}

.btn-green {
color: #fff;
background-color: var(--green) !important;
border: 1px solid var(--green) !important;
outline: none !important;
box-shadow: none !important;
}

.btn-green:hover {
color: var(--green) !important;
background-color: rgb(255, 255, 255) !important;
border: 1px solid var(--green) !important;
outline: none !important;
box-shadow: none !important;
}


.btn-secondary {
color: #fff;
background: var(--mainbtn) !important;
border: 1px solid var(--mainbtn) !important;
outline: none !important;
box-shadow: none !important;
}

.btn-secondary:hover {
color: var(--mainbtn) !important;
background: transparent !important;
border: 1px solid var(--mainbtn) !important;
outline: none !important;
box-shadow: none !important;
}


.btn-warning {
color: #fff !important;
background-color: var(--secondarybtn) !important;
border: 1px solid var(--secondarybtn) !important;
outline: none !important;
box-shadow: none !important;
}

.btn-warning:hover {
color: var(--secondarybtn) !important;
background-color: #ffffff !important;
border: 1px solid var(--secondarybtn) !important;
outline: none !important;
box-shadow: none !important;
}

.btn:hover, .btn:focus, .shopify-payment-button__button--unbranded:hover, .shopify-payment-button__button--unbranded:focus {
opacity: 0.8;
color: #fff;
text-decoration: none;
transform: scale(1.2);
}
.btn-success.disabled, .btn-success:disabled
{
background-color: #26b01b !important;
border-color: #26b01b !important;
transform: scale(1.2);

}

.btn--small {
padding: 8px 10px;
font-size: 0.92308em;
line-height: 1;
}
.text-danger{
color:#ea3523!important;
}
.btn--secondary {
background-color: #ededed;
color: #353333;
}

.btn--link {
background-color: transparent;
border: 0;
margin: 0;
color: #31a3a3;
text-align: left;
text-decoration: none;
outline: none !important;
box-shadow: none !important;
}

.btn--link:hover,
.btn--link:focus {
opacity: 0.8;
text-decoration: none;
}


/*======================================================================
8. Pre Loader
========================================================================*/
#pre-loader {
background-color: #fff;
height: 100%;
width: 100%;
position: fixed;
z-index: 1;
margin-top: 0px;
top: 0px;
left: 0px;
bottom: 0px;
overflow: hidden !important;
right: 0px;
z-index: 999999;
}

#pre-loader img {
text-align: center;
left: 0;
position: absolute;
right: 0;
top: 50%;
transform: translateY(-50%);
-webkit-transform: translateY(-50%);
-o-transform: translateY(-50%);
-ms-transform: translateY(-50%);
-moz-transform: translateY(-50%);
z-index: 99;
margin: 0 auto;
}



.ui-loader {
display: inline-block;
width: 50px;

height: 50px;

text-align: center;
left: 0;
position: absolute;
right: 0;
top: 50%;
transform: translateY(-50%);
-webkit-transform: translateY(-50%);
-o-transform: translateY(-50%);
-ms-transform: translateY(-50%);
-moz-transform: translateY(-50%);
z-index: 99;
margin: 0 auto;
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
animation: rotate-inner08 1.4s ease-in-out
infinite;
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


/*======================================================================
9. Header Style
========================================================================*/
.classicHeader:not(.stickyNav) {
position: absolute;
width: 100%;
z-index: 8;
}

.promotion-header {
color: #df1a0b;
letter-spacing: 1px;
text-transform: uppercase;
padding: 10px 35px;
background-color: #fff0ef;
text-align: center;
position: relative;
z-index: 5;
}

.closeHeader {
cursor: pointer;
font-size: 18px;

position: absolute;
right: 40px;
top: 8px;
height: 25px;
width: 25px;
line-height: 22px;
color: #df1a0b;
}

.top-header {
color: #fff;
padding-top: 8px;
padding-bottom: 10px;
background: var(--themecolor);
}
span.money {
font-weight: 600;
font-family: 'Kalam', cursive;
}
.subtotal .label{
font-family: 'Kalam', cursive;

}
.dishbadge{
position: static;
top: -15px;
right: 0;
background: #ffc549;
border: 1px dashed #86ac34 !important;
color: #2d2d2de0;
}
.shortdesclineheight p{
line-height:30px
}
.top-header a {
color: #fff;
}

.top-header p,
.top-header a,
.top-header select,
.top-header .fa,
.top-header span.selected-currency,
.top-header .language-dd {
color: #ffffff;
font-size: 12px;
margin-bottom: 0;
text-decoration: none;
letter-spacing: 0.05em;
vertical-align: middle;
text-transform: uppercase;
line-height: normal;
}

.top-header a:hover {
text-decoration: underline;
}

.top-header .phone-no,
.top-header .welcome-msg {
display: inline;
}

.top-header .phone-no .anm {
vertical-align: middle;
}

.top-header .phone-no a:hover {
text-decoration: none;
}

.selected-currency,
.language-dd {
width: 40px;
display: inline-block;
cursor: pointer;
margin-right: 10px;
}

.language-dd {
width: 65px;
text-transform: uppercase;
display: inline;
}

.selected-currency:after,
.language-dd:after {
content: "\f0d7";
font-family: "FontAwesome";
display: inline-block;
vertical-align: middle;
padding-left: 5px;
}
img.img-icon-tiffin {
width: 40px;
}
.top-header .currency-picker,
.top-header .language-dropdown {
display: inline;
position: relative;
vertical-align: middle;
}

#currencies,
#language {
top: 29px;
left: -5px;
display: none;
position: absolute;
background: #fff;
border: 1px solid #f5f5f5;
padding: 0;
z-index: 333;
}

#currencies li,
#language li {
color: #fff;
cursor: pointer;
padding: 5px 15px;
list-style: none;
border-bottom: solid 1px #ddd;
background: #1f2612;

}

#currencies li:hover,
#language li:hover {
background: #f5f5f5;
}

.top-header .user-menu {
display: none;
}

.top-header .user-menu .anm {
font-size: 19px;
cursor: pointer;
}

.top-header .list-inline {
margin: 0;
list-style: none;
}

.top-header .list-inline>li {
display: inline-block;
padding-right: 5px;
padding-left: 5px;
text-transform: uppercase;
}

.logo {
padding-top: 15px;
padding-bottom: 15px;
margin: 0;
}
.max-content{
width:max-content;font-family: 'Kalam', cursive;
}


#loginformwithmobile .phone-input {
display: flex;
align-items: center;
border: 1px solid #ccc;
border-radius: 5px;
padding: 5px;
margin-bottom: 20px;
font-size: 15px;
}

#loginformwithmobile .phone-input .flag-icon {
display: flex;
align-items: center;
gap: 10px;
background: white;
padding: 9px;
border: 1px solid #cbcbcb;
margin-right: 4px;
}

#loginformwithmobile .phone-input .flag-icon img {
width: 30px;
/* Adjust the size of the flag icon as needed */
height: auto;
}

#loginformwithmobile .phone-input input[type="tel"] {
flex: 1;
border: none;
outline: none;
padding: 5px;
font-size: 12px;
letter-spacing: 4px;
font-weight: bolder;
text-transform: uppercase;
}

.stickyNav {
position: fixed;
top: 0;
z-index: 9999;
width: 100%;
left: 0;
background-color: #fff;
box-shadow: 0 0 7px rgba(0, 0, 0, 0.2);
-webkit-box-shadow: 0 0 7px rgba(0, 0, 0, 0.2);
}




.stickyNav .logo {
padding-left: 0;
}

.site-cart {
float: right;
position: relative;
}

.site-header__cart {
color: #353333;
text-decoration: none;
}

.site-header__cart:hover {
text-decoration: none;
}

.site-header__cart .icon {
font-size: 22px;
text-decoration: none;
}

.site-header__cart-count {
font-size: 11px;
display: inline-block;
color: #fff;
background-color: #729a1b;
border-radius: 50%;
text-align: center;
width: 18px;
height: 18px;
line-height: 18px;
position: absolute;
right: -5px;
bottom: 0;
}

#header-cart {
z-index: 333;
width: 320px;
margin-top: 5px;
display: none;
background-color: #fff;
border: 1px solid #e8e9eb;
position: absolute;
top: 100%;
right: -5px;
z-index: 555;
border-radius: 0;
}

#header-cart hr {
margin: 20px 0;
}

#header-cart .btn {
color: #fff;
margin: 0 2% 0 0;
width: 48%;
padding: 10px;
}

#header-cart .btn:nth-of-type(2n) {
margin-right: 0;
}

#header-cart #cart-title {
text-align: left;
margin-bottom: 0;
}

#header-cart .variant-cart {
color: #777;
font-size: 11px; font-family: 'Kalam', cursive;
}

#header-cart .wrapQtyBtn {
display: block;
float: none;
}

#header-cart .qtyField .label {
float: left;
line-height: 30px;
padding-right: 5px;
}

#header-cart .qtyField .qtyBtn,
#header-cart .qtyField .qty {
font-size: 11px;
width: 25px;
height: 30px;
display: inline-block;
padding: 3px;
}

#header-cart .qtyField a .fa {
font-size: 11px;
}

.btn-addto-cart {
color: #111111;
}

.btn-addto-cart a:hover {
color: #111111;
}

.mini-products-list {
padding: 15px 15px 0;
max-height: 380px;
overflow-x: hidden;
overflow-y: auto;
list-style: none;
margin: 0;
}

.mini-products-list+.mini-products-list {
padding-top: 0;
}

.mini-products-list li {
padding-bottom: 10px;
margin-bottom: 10px;
line-height: normal;
display: block;
position:relative;
border-bottom: solid 1px #eee;
}

.mini-products-list li:last-of-type {
border-bottom: 0;
padding-bottom: 0;
}

.mini-products-list li:before,
.mini-products-list li:after {
content: "";
clear: both;
display: block;
}

.mini-products-list li .product-image {
width: 25%;
float: left;
height: 50px;
overflow: hidden;
}

.mini-products-list li .pro-img {
float: left;
width: 30%;
}

.mini-products-list li .pName {
color: #353333;
font-size: 13px;
white-space: normal;
text-decoration: none;
display: block;
line-height: normal;
margin-right: 18px;
margin-bottom: 0;
}

.mini-products-list li .pName:hover {
color: #222;
}

.mini-products-list li .product-details {
float: left;
width: 75%;
padding-left: 15px;
text-align: left;
}

.mini-products-list li .remove {
color: #5c5c5c;
float: right;
font-size: 14px;
padding: 0 2px 0 7px;
margin-top: 0;
text-decoration: none;
}

.mini-products-list li .remove:hover {
color: #353333;
}

.mini-products-list li .edit-i.remove {
font-size: 11px;
padding-top: 1px;
}



.mini-products-list li .priceRow .prodMulti {
display: inline-block;
font-size: 10px;
}

.mini-products-list li .priceRow .product-price {
display: inline-block;
}

.mini-products-list li .qtyField {
padding-left: 0;
display: flex;
align-items: center;
}

.mini-products-list li .qtyField a {
display: none;
}

.mini-products-list li .qtyField span {
display: inline-block;
padding: 0;
border: 0;
}

#header-cart .total {
padding: 0 10px 15px;
}

#header-cart .total .total-in {
color: #353333;
margin: 10px 0;
padding: 8px 10px;
border-top: 1px solid #e8e9eb;

text-align: left;
display: inline-block;
width: 100%;
}

#header-cart .total .product-price {
float: right;
font-size: 16px;
}

#header-cart .total label {
float: left;
line-height: 24px;
text-transform: uppercase;
margin: 0;
}

#header-cart .total .total-in .label {
text-transform: uppercase;
}

.stickyNav .site-header__search {
<!-- display: none; -->
}

.site-header__search {
float: right;
}

.search {
position: fixed;
top:0;
width: 100%;
background: #fff;
color: #333;
z-index: 9999999999;
box-shadow: 0 2px 3px rgba(0, 0, 0, 0.1);
-webkit-box-shadow: 0 2px 3px rgba(0, 0, 0, 0.1);
opacity: 0;
visibility: hidden;
transform-origin: top center;
-webkit-transform-origin: top center;
transform: translateY(-100%);
-webkit-transform: translateY(-100%);
transition: opacity 0.2s, transform 0.2s;
-webkit-transition: opacity 0.2s, transform 0.2s;
}

.search--opened {
opacity: 1;
visibility: visible;
transform: translateY(0);
-webkit-transform: translateY(0);
-ms-transform: translateY(0);
}

.site-header__search .search-trigger {
border: 0;
font-size: 20px;
padding-right: 20px;
cursor: pointer;
padding-top: 0;
}

.site-header__search .search-trigger:hover {
color: #30bdbd;
}

.search .search__form {
margin: 35px 60px;
position: relative;
}

.search .search__input {
width: 100%;
border: 0;
font-size: 18px;
padding: 0 40px;
}

.search .search__button {
border: 0;
font-size: 18px;
}

.search .go-btn {
position: absolute;
left: 0;
top: 10px;
}

.search .close-btn {
position: absolute;
right: 0;
top: 1px;
font-size: 18px;
line-height: normal;
display: block;
border: 0;
padding: 5px;
cursor: pointer;
}

#siteNav {
position: relative;
max-width: 1100px;
margin: 0 auto;
padding: 0;
list-style: none;
}

#siteNav.right {
text-align: right;
}

#siteNav.left {
text-align: left;
}

#siteNav.center {
text-align: center;
}

#AccessibleNav {
padding-left: 0;
}

.mobile-nav-wrapper,
.site-header__logo.mobileview {
display: none;
}

@media (min-width: 990px) {
#siteNav a {
text-decoration: none;
font-size: 13px;
display: block;
opacity: 1;
-webkit-font-smoothing: antialiased;
letter-spacing: 0.05em;
position: relative;
font-weight:500
}

#siteNav>li {
display: inline-block;
text-align: left;
}

#siteNav>li>a {
padding: 0 20px;
text-transform: uppercase;
line-height: 40px;
}

#siteNav.medium>li>a .anm {
display: none;
}

#siteNav>li>a:hover:hover,
#siteNav>li>a:hover {
color: var(--themecolor);;
}

#siteNav>li .megamenu {
opacity: 0;
visibility: hidden;
padding: 25px 25px 0;
width: 100%;
position: absolute;
top: 59px;
left: 0;
z-index: 999;
background-color: #fff;
box-shadow: 2px 2px 1px 0px rgba(0, 0, 0, 0.3);
-webkit-box-shadow: 2px 2px 1px 0px rgba(0, 0, 0, 0.3);
pointer-events: none;
-ms-transition: all 0.3s ease;
-webkit-transition: all 0.3s ease;
transition: all 0.3s ease;
border: 1px solid #eee;
max-height: 600px;
overflow: auto;
}

#siteNav>li .megamenu ul {
padding: 0;
list-style: none;
}

#siteNav>li:hover>.megamenu {
top: 40px;
opacity: 1;
visibility: visible;
pointer-events: visible;
}

#siteNav>li .megamenu li.lvl-1 {
margin-bottom: 25px;
}

#siteNav>li .megamenu li.lvl-1 a.lvl-1 {
color: #353333;
font-size: 14px;
text-transform: uppercase;
padding: 0 0 8px;

}

#siteNav>li .megamenu li.lvl-1 li .site-nav {
color: #353333;
padding: 5px 0;

}

#siteNav>li .megamenu li.lvl-1 li .site-nav:hover {
color: #353333;
}

#siteNav>li .megamenu li.lvl-1 li .site-nav:before {
content: "";
display: inline-block;
width: 0px;
height: 2px;
vertical-align: middle;
background-color: #353333;
-ms-transition: all 0.3s ease-in-out;
-webkit-transition: all 0.3s ease-in-out;
transition: all 0.3s ease-in-out;
}

#siteNav>li .megamenu li.lvl-1 li .site-nav:hover:before {
width: 5px;
margin-right: 3px;
}

#siteNav>li .megamenu.style4 {
background-repeat: no-repeat;
background-size: auto 100%;
}

#siteNav>li .megamenu .imageCol {
padding-bottom: 25px;
}

#siteNav>li ul.dropdown li a .anm {
position: absolute;
right: 10px;
top: 10px;
}

#siteNav a .lbl {
color: #ffffff;
font-size: 10px;

letter-spacing: 0;
line-height: 1;
text-transform: uppercase;
display: inline-block;
padding: 2px 4px;
border-radius: 3px;
background-color: #f00;
box-shadow: 0 0 3px rgba(0, 0, 0, 0.3);
-webkit-box-shadow: 0 0 3px rgba(0, 0, 0, 0.3);
position: relative;
vertical-align: middle;
}

#siteNav a .lbl:after {
content: " ";
display: block;
width: 0;
height: 0;
position: absolute;
bottom: 3px;
left: -7px;
border: 4px solid transparent;
border-right-color: transparent;
border-right-color: #f00;
}

#siteNav a .lbl.nm_label3 {
background-color: #fb6c3e;
}

#siteNav a .lbl.nm_label1 {
background-color: #01bad4;
}

#siteNav a .lbl.nm_label3:after {
border-right-color: #fb6c3e;
}

#siteNav a .lbl.nm_label1:after {
border-right-color: #01bad4;
}

#siteNav>li.dropdown {
position: relative;
}

#siteNav>li .dropdown,
#siteNav>li .dropdown ul {
list-style: none;
border: 1px solid #eeeeee;
opacity: 0;
visibility: hidden;
width: 220px;
position: absolute;
top: 59px;
left: 0;
z-index: 999;
box-shadow: 2px 2px 1px 0px rgba(0, 0, 0, 0.3);
-ms-transition: all 0.3s ease-in-out;
-webkit-transition: all 0.3s ease-in-out;
transition: all 0.3s ease-in-out;
padding: 0;
}

#siteNav>li:hover>.dropdown,
#siteNav>li .dropdown li:hover>ul {
top: 40px;
opacity: 1;
visibility: visible;
}

#siteNav>li ul.dropdown li {
border-top: 1px solid #eeeeee;
position: relative;
}

#siteNav>li ul.dropdown li:first-child {
border: 0;
}

#siteNav>li ul.dropdown li a {
color: #353333;

padding: 8px 12px;
background-color: #fff;
}

#siteNav>li ul.dropdown li a:hover {
color: #fff;
background-color: var(--themecolor);
padding-left: 17px;
}

#siteNav>li ul.dropdown li ul {
top: 20px;
left: 100%;
}

#siteNav>li ul.dropdown li:hover>ul {
top: 0;
}
}

.header-content-wrapper {
width: 100%;
padding: 15px 0;
}

/*======================================================================
10. Homepage Slideshow
========================================================================*/
.slideshow-wrapper {
position: relative;
}

.slideshow .slide {
position: relative;
}

.slideshow .wrap-caption.center {
max-width: 1200px;
}

.slideshow .wrap-caption.right {
float: right;
}

.slideshow .wrap-caption.left {
float: left;
}

.slideshow .wrap-caption {
display: inline-block;
padding: 25px;
}

.slideshow__text-content {
text-align: center;
margin-top: 30px;
position: absolute;
width: 100%;
top: 50%;
-ms-transform: translateY(-40%);
-webkit-transform: translateY(-40%);
transform: translateY(-40%);
opacity: 0;
transition: all 0.5s cubic-bezier(0.44, 0.13, 0.48, 0.87);
-webkit-transition: all 0.5s cubic-bezier(0.44, 0.13, 0.48, 0.87);
-ms-transition: all 0.5s cubic-bezier(0.44, 0.13, 0.48, 0.87);
transition-delay: 0.3s;
-webkit-transition-delay: 0.3s;
-ms-transition-delay: 0.3s;
z-index: 3;
}

.slideshow__text-content.bottom {
top: inherit;
bottom: 10%;
-ms-transform: translateY(10%);
-webkit-transform: translateY(10%);
transform: translateY(10%);
}

.slideshow__text-content.top {
top: 10%;
-ms-transform: translateY(10%);
-webkit-transform: translateY(10%);
transform: translateY(10%);
}

.slick-active .slideshow__text-content.bottom {
-ms-transform: translateY(0);
-webkit-transform: translateY(0);
transform: translateY(0);
}

.slick-active .slideshow__text-content.top {
-ms-transform: translateY(-5%);
-webkit-transform: translateY(-5%);
transform: translateY(-5%);
}

.slick-active .slideshow__text-content,
.no-js .slideshow__text-content {
-ms-transform: translateY(-50%);
-webkit-transform: translateY(-50%);
transform: translateY(-50%);
opacity: 1;
}

.slideshow .slideshow__title {
color: #ffffff;

font-size: 66px;
text-transform: uppercase;
line-height: 1.1;
text-shadow: 1px 1px 7px rgba(0, 0, 0, 0);
}

.slideshow .slideshow__subtitle {
color: #ffffff;

font-size: 16px;
text-transform: uppercase;
margin-bottom: 20px;
line-height: 1.2;
text-shadow: 1px 1px 4px rgba(0, 0, 0, 0);
display: block;
}

.slideshow__text-wrap {
height: 100%;
}

.slick-active .slideshow__image.img-animate {
-ms-transform: scale(1);
-webkit-transform: scale(1);
transform: scale(1);
}

.slideshow__image.img-animate {
-ms-transform: scale(1.1);
-webkit-transform: scale(1.1);
transform: scale(1.1);
}

.slideshow__overlay.bottom:before {
background: -ms-linear-gradient(bottom, rgba(0, 0, 0, 0) 0%, #353333 100%);
background: linear-gradient(to bottom, rgba(0, 0, 0, 0) 0%, #353333 100%);
}

.slideshow__overlay:before {
content: "";
position: absolute;
top: 0;
right: 0;
bottom: 0;
left: 0;
opacity: 0.5;
z-index: 3;
}

.slideshow .slick-slide img {
width: 100%;
}

.slideshow .slick-prev,
.slideshow .slick-next {
line-height: normal;
font-size: 0px;
padding: 0;
border: 0;
opacity: 0.5;
position: absolute;
z-index: 4;
top: 50%;
-ms-transform: translateY(-50%);
-webkit-transform: translateY(-50%);
transform: translateY(-50%);
width: 40px;
height: 40px;
border-radius: 5px;
text-align: center;
background-color: rgba(255, 255, 255, 0.1);
-ms-transition: all ease-out 0.2s;
-webkit-transition: all ease-out 0.2s;
transition: all ease-out 0.2s;
}

.slideshow .slick-prev {
left: 10px;
}

.slideshow .slick-next {
right: 10px;
}

.slideshow .slick-next:before {
content: "\ea8c";
font-family: "annimex-icons";
color: #353333;
}

.slideshow .slick-prev:before {
content: "\ea8b";
font-family: "annimex-icons";
color: #353333;
}

.slideshow .slick-prev:before,
.slideshow .slick-next:before {
font-size: 20px;
line-height: 20px;
}

.slideshow .slick-prev:hover,
.slideshow .slick-next:hover {
opacity: 0.7;
background-color: rgba(255, 255, 255, 0.7);
box-shadow: 0 0 4px rgba(0, 0, 0, 0.4);
-webkit-box-shadow: 0 0 4px rgba(0, 0, 0, 0.4);
}

.slideshow .btn {
color: #fff;
background-color: #353333;
}

.slideshow .btn:hover,
.slideshow .btn:focus {
opacity: 0.8;
}

/*======================================================================
11. Section
========================================================================*/
.section {
padding-top: 35px;
padding-bottom: 35px;
}

.section-header {
margin-bottom: 35px;
}

.pb-section {
padding-bottom: 35px;
}

.pt-section {
padding-top: 35px;
}

.no-pb-section {
padding-bottom: 0;
}

/*======================================================================
12. Products With Tab Slider
========================================================================*/
.tab-slider-product.section .section-header {
margin-bottom: 15px;
}

.tab-slider-product .tabs {
border: 0;
text-align: center;
margin: 0 0 30px;
padding: 0;
}

.tab-slider-product .tabs>li {
float: none;
display: inline-block;
margin: 0 15px;
cursor: pointer;
}

.tab-slider-product .tabs>li {
background: none !important;
border: 0 !important;
text-transform: uppercase;
letter-spacing: 1px;
color: #929292;

font-size: 13px;
padding-top: 0;
}

.tab-slider-product .tabs>li.active {
color: #111111;
}

.tab-slider-product .tabs li:hover,
.tab-slider-product .tabs li:focus {
color: #111111;
opacity: 1;
text-decoration: underline;
}

.tab-slider-product .tab_container {
clear: both;
width: 100%;
background: #fff;
}

.tab-slider-product .tab_content {
display: none;
}

.tab-slider-product .tab_drawer_heading {
display: none;
}

/*======================================================================
13. Product Grid
========================================================================*/
.grid-products a {
text-decoration: none !important;
}

@media only screen and (min-width: 992px) {
.shop-grid-5 .grid-products .item.col-lg-2 {
-ms-flex: 0 0 20%;
-webkit-flex: 0 0 20%;
flex: 0 0 20%;
max-width: 20%;
}

}

@media only screen and (min-width: 1540px) {
.shop-grid-7 .grid-products .item.col-lg-2 {
-ms-flex: 0 0 14.2222%;
-webkit-flex: 0 0 14.2222%;
flex: 0 0 14.2222%;
max-width: 14.2222%;
}
}

.grid-products .item .product-image .showVariantImg img {
opacity: 0;
visibility: hidden;
}

.grid-products .item .product-image .showVariantImg .variantImg {
visibility: visible;
opacity: 1;
}

.grid-products .item .product-image .showLoading {
transition: 0.5s;
animation: loader-rotate 0.8s infinite linear;
background: 0 0 !important;
border: 3px solid rgba(100, 100, 100, 0.5);
border-top-color: rgba(100, 100, 100, 0.5);
border-radius: 100%;
border-top-color: #fff;
content: "";
height: 34px !important;
left: 50%;
line-height: 1;
margin-left: -17px;
margin-top: -17px;
pointer-events: none;
position: absolute;
top: 50% !important;
-webkit-animation: loader-rotate 0.8s infinite linear;
width: 34px !important;
z-index: 154 !important;
}

.grid-products .item .product-image {
position: relative;
overflow: hidden;
margin: 0 auto 15px;
border-radius: 15px !important;
height: 150px;
overflow: hidden;
}

.grid-products .item .product-image>a {
display: block;
white-space: nowrap;
opacity: 1;
}

.grid-products .item .product-image img {
display: inline-block;
width: 100%;
margin: 0 auto;
vertical-align: middle;
-ms-transition: all ease-out 0.4s;
-webkit-transition: all ease-out 0.4s;
transition: all ease-out 0.4s;
height: 100% !important;
overflow:hidden
}

.grid-products .item .product-image .hover {
visibility: hidden;
opacity: 0;
left: 50%;
top: 50%;
position: absolute;
-ms-transform: translate(-50%, -50%);
-webkit-transform: translate(-50%, -50%);
transform: translate(-50%, -50%);
}

.grid-products .item .product-image:hover .primary {
opacity: 0;
}

.grid-products .item .product-image:hover .hover:not(.variantImg) {
opacity: 1;
visibility: visible;
}

.grid-view_image:hover .primary {
opacity: 0;
visibility: hidden;
}

.grid-view_image:hover .hover:not(.variantImg) {
opacity: 1;
visibility: visible;
}

.grid-view-item.style2 .grid-view-item__link {
position: relative;
overflow: hidden;
margin: 0 auto 15px;
}

.grid-view-item.style2 .grid-view-item__link {
display: block;
white-space: nowrap;
opacity: 1;
}

.grid-view-item.style2 .grid-view-item__image {
display: inline-block;
width: 100%;
margin: 0 auto;
vertical-align: middle;
-ms-transition: all ease-out 0.4s;
-webkit-transition: all ease-out 0.4s;
transition: all ease-out 0.4s;
}

.grid-view-item.style2 .grid-view-item__link .hover {
visibility: hidden;
opacity: 0;
left: 50%;
top: 50%;
position: absolute;
-ms-transform: translate(-50%, -50%);
-webkit-transform: translate(-50%, -50%);
transform: translate(-50%, -50%);
}

.grid-view-item.style2 .grid-view-item__link:hover .primary {
opacity: 0 !important;
visibility: hidden;
}

.grid-view-item.style2 .grid-view-item__link:hover .hover:not(.variantImg) {
opacity: 1;
visibility: visible;
}

.grid-view-item.style2 .hoverDetails {
width: 94%;
opacity: 0;
position: absolute;
top: 50%;
left: 50%;
-ms-transform: translate(-50%, -50%);
-webkit-transform: translate(-50%, -50%);
transform: translate(-50%, -50%);
-ms-transition: all ease-out 0.4s;
-webkit-transition: all ease-out 0.4s;
transition: all ease-out 0.4s;
}

.template-collection .grid-view-item.style2 i {
vertical-align: middle;
}

.grid-view-item.style2 .grid-view-item__link,
.grid-view-item.style2 .grid-view_image {
margin-bottom: 0;
}

.grid-view-item.style2 .grid-view-item__link .hover {
opacity: 0 !important;
visibility: hidden;
}

.grid-view-item.style2:hover .grid-view-item__link .hover {
opacity: 0.2 !important;
visibility: visible;
}

.grid-view-item.style2:hover .hoverDetails {
opacity: 1;
}

.grid-view-item.style2 .button-set,
.grid-view-item.style2 .variants.add {
position: static;
opacity: 1;
margin: 0;
}

.grid-view-item.style2 .button-set {
margin-top: 10px;
}

.grid-view-item.style2 .button-set a.quick-view,
.grid-view-item.style2 .button-set .wishlist-btn,
.grid-view-item.style2 .button-set .compare-btn,
.grid-view-item.style2 .button-set>form {
display: inline-block;
margin: 0 2px;
vertical-align: middle;
}

.grid-view-item.style2 .button-set i {
line-height: 35px;
}

.grid-view-item.style2 .button-set>form button {
padding: 0;
width: 35px;
height: 35px;
}

.grid-view_image {
position: relative;
overflow: hidden;
margin: 0 auto 15px;
}

.grid-products.style3 .item .product-name {
margin-bottom: 10px;
}

.grid-products.style3 .item .product-image {
margin: 0 auto;
}

.grid-view_image .product-image>a:after {
content: "";
display: inline-block;
width: 0px;
height: 100%;
vertical-align: middle;
}

.slick-prev,
.slick-next {
position: absolute;
z-index: 9;
display: block;
height: auto;
line-height: normal;
font-size: 0px;
padding: 6px 10px;
cursor: pointer;
background: transparent;
color: transparent;
top: 50%;
-webkit-transform: translate(0, -50%);
-ms-transform: translate(0, -50%);
transform: translate(0, -50%);
padding: 0;
border: none;
opacity: 0.5;
}

.slick-prev:before,
.slick-next:before {
font-family: "annimex-icons";
font-size: 20px;
line-height: 1;
color: #353333;
-webkit-font-smoothing: antialiased;
-moz-osx-font-smoothing: grayscale;
}

.slick-prev:before {
content: "\ea8b";
}

.slick-next::before {
content: "\ea8c";
}

.productSlider:hover .slick-arrow,
.productPageSlider:hover .slick-arrow,
.productSlider-style1:hover .slick-arrow,
.productSlider-style2:hover .slick-arrow,
.productSlider-style2:hover .slick-arrow,
.productSlider-fullwidth:hover .slick-arrow {
opacity: 1;
}

.grid-products .slick-arrow {
margin-top: -50px;
}

.productPageSlider .slick-arrow {
margin-top: -40px;
}

.productSlider-style1 .slick-arrow,
.productSlider-style2 .slick-prev,
.productSlider-fullwidth .slick-prev {
margin-top: -10px;
}

.productSlider .slick-arrow,
.productPageSlider .slick-arrow,
.productSlider-style1 .slick-arrow,
.productSlider-style2 .slick-arrow,
.productSlider-fullwidth .slick-arrow {
padding: 6px 10px;
border-radius: 5px;
opacity: 0;
-ms-transition: all 0.5s ease-in-out;
-webkit-transition: all 0.5s ease-in-out;
transition: all 0.5s ease-in-out;
}

.productSlider .slick-next,
.productPageSlider .slick-next,
.productSlider-style1 .slick-next,
.productSlider-style2 .slick-next,
.productSlider-fullwidth .slick-next {
right: -35px;
}

.productSlider .slick-prev,
.productPageSlider .slick-prev,
.productSlider-style1 .slick-prev,
.productSlider-style2 .slick-prev,
.productSlider-fullwidth .slick-prev {
left: -35px;
}

.grid-products .slick-slider .item,
.grid-products.slick-slider .item {
margin-bottom: 0;
}

.product-labels {
position: absolute;
left: 5px;
top: 5px;
}

.product-labels.rectangular .lbl {
border-radius: 0;
}

.product-labels.radius .lbl {
border-radius: 3px;
}

.product-labels .lbl {
display: block;
white-space: nowrap;
color: #fff;
font-size: 11px;

text-transform: uppercase;
text-align: center;
padding: 0 5px;
height: 20px;
line-height: 20px;
margin-bottom: 5px;
}

.product-labels .on-sale {
right: 5px;
background: #f54337;
}

.product-labels .pr-label1 {
left: 5px;
background: #01bad4;
}

.product-labels .pr-label2 {
left: 5px;
background: #e9a400;
}

.product-labels .pr-label3 {
left: 5px;
background: #81d53d;
}

.product-labels.rounded .lbl {
border-radius: 50%;
-moz-border-radius: 50%;
-webkit-border-radius: 50%;
display: -webkit-box;
display: -webkit-flex;
display: -moz-flex;
display: -ms-flexbox;
display: flex;
-webkit-box-align: center;
-ms-flex-align: center;
-webkit-align-items: center;
-moz-align-items: center;
align-items: center;
white-space: nowrap;
word-break: break-all;
-webkit-box-pack: center;
-ms-flex-pack: center;
-webkit-justify-content: center;
-moz-justify-content: center;
justify-content: center;
text-align: center;
height: 50px;
width: 50px;
}

.grid-view-item--sold-out .grid-view-item__image {
opacity: 0.5;
}

.sold-out {
position: absolute;
top: 0;
width: 100%;
left: 0;
height: 100%;
}

.sold-out span {
color: #353333;
position: absolute;
top: 50%;
left: 0;
right: 0;
text-transform: uppercase;
letter-spacing: 0.08em;
text-align: center;
}

.variants.add button {
background-color: #ffffff;
width: 100%;
text-transform: uppercase;
-ms-transition: all 0.3s ease-in-out;
-webkit-transition: all 0.3s ease-in-out;
transition: all 0.3s ease-in-out;
border-radius: 15px !important;
}

.variants.add {
position: absolute;
bottom: -50px;
-ms-transition: all 0.3s ease-in-out;
-webkit-transition: all 0.3s ease-in-out;
transition: all 0.3s ease-in-out;
left: 5px;
right: 5px;
}

.product-image:hover .variants.add {
bottom: 5px;
}

.button-set {
position: absolute;
right: 5px;
top: 30px;
opacity: 0;
-ms-transition: all 0.5s ease-in-out;
-webkit-transition: all 0.5s ease-in-out;
transition: all 0.5s ease-in-out;
}

.button-set i {
line-height: 34px;
}

.product-image:hover .button-set {
top: 5px;
opacity: 1;
}

a.quick-view,
a.wishlist,
.cartIcon,
.add-to-compare {
background-color: #ffffff;
border: 0;
width: 35px;
height: 35px;
line-height: 34px;
display: block;
text-transform: uppercase;
text-align: center;
padding: 0;
margin-bottom: 5px;
}

a.quick-view:hover,
a.wishlist:hover,
.cartIcon:hover,
.variants.add button:hover,
.add-to-compare:hover {
color: #242424;
opacity: 0.8;
}

a.quick-view {
margin-bottom: 5px !important;
}

.button-style2,
.button-style2 .variants.add {
position: static;
opacity: 1;
}

.button-style2 .btn-style2 {
display: block;
float: left;
width: 25%;
}

.button-style2 .cartIcon,
.button-style2 .quick-view-popup,
.button-style2 .wishlist,
.button-style2 .compare {
color: #fff;
background-color: #353333;
border-right: 1px solid #fff;
}

.button-style2 .compare {
border-right: 0;
}

.button-style2 .wishlist,
.button-style2 .compare {
width: 100%;
}

.button-style2 .variants.add button {
color: #fff;
background-color: #353333;
}

.grid-products .item {
margin: 0 0 30px;
}

.tab_container .grid-products .item {
margin-bottom: 0;
}

.grid-products .item .product-name a {
color: #3e3e3e;
font-size: 1.4em;
line-height: 1.2;
margin-bottom: 0;
text-align: left;
font-weight:600
}

.grid-products .item .product-name a:hover {
opacity: 0.8;
}

.grid-products .item .product-price {
margin: 0;
}

.product-price .old-price {
color: #555;
font-size: 12px;
opacity: 0.8;
text-decoration: line-through;
}

.product-price .old-price+.price {
padding-left: 5px;
color: #b0d761 !important;
}

.product-price .price {
font-family: 'Kalam', cursive;
color: #7c7c7c;
}

.product-price__sale,
.product__price--sale {
color: #b0d761 !important;
}

.product-review .fa {
font-size: 13px;
opacity: 1;
color: #ff9500;
margin: 0 1px;
}

.grid-products .item .swatches {
margin: 8px 0 0;
list-style: none;
padding: 0;
}

.grid-products .item .swatches li {
display: inline-block;
height: 15px;
width: 15px;
margin: 3px 1px;
cursor: pointer;
box-shadow: 0 0 1px 1px #ddd;
-webkit-box-shadow: 0 0 1px 1px #ddd;
}

.grid-products .item .swatches li img {
display: block;
border-radius: 50%;
-webkit-border-radius: 50%;
max-height: 30px;
margin: 0 auto;
}

.grid-products .item .swatches li.square img {
border-radius: 0;
-webkit-border-radius: 0;
}

.grid-products .item .swatches li.radius img {
border-radius: 5px;
-webkit-border-radius: 5px;
}

.grid-products .item .swatches li:hover {
box-shadow: 0 0 1px 1px #353333;
-webkit-box-shadow: 0 0 1px 1px #353333;
}

.grid-products .item .swatches li.rounded {
border-radius: 50% !important;
-webkit-border-radius: 50% !important;
}

.grid-products .item .swatches li.radius {
border-radius: 5px !important;
-webkit-border-radius: 5px !important;
}

.grid-products .item .swatches li.medium {
height: 30px;
width: 30px;
}

.grid-products .item .swatches li.navy {
background-color: navy;
}

.grid-products .item .swatches li.green {
background-color: green;
}

.grid-products .item .swatches li.gray {
background-color: gray;
}

.grid-products .item .swatches li.aqua {
background-color: aqua;
}

.grid-products .item .swatches li.orange {
background-color: orange;
}

.grid-products .item .swatches li.purple {
background-color: purple;
}

.grid-products .item .swatches li.teal {
background-color: teal;
}

.grid-products .item .swatches li.black {
background-color: #040404;
}

.grid-products .item .swatches li.red {
background-color: red;
}

.grid-products .item .swatches li.yellow {
background-color: yellow;
}

.grid-products .item .swatches li.darkgreen {
background-color: darkgreen;
}

.grid-products .item .swatches li.maroon {
background-color: maroon;
}

.grid-view-item__title {
color: #353333;
font-size: 1em;
line-height: 1.2;
margin-bottom: 0;
}

.grid-view-item__meta {
margin: 5px 0;
}

.product-price__price {
display: inline-block;
}

.grid-products-hover-btn a.quick-view,
.grid-products-hover-btn a.wishlist,
.grid-products-hover-btn .variants.add button,
.grid-products-hover-btn .cartIcon,
.grid-products-hover-btn .add-to-compare {
color: #ffffff;
}

.grid-products-hover-gry a.quick-view,
.grid-products-hover-gry a.wishlist,
.grid-products-hover-gry .variants.add button,
.grid-products-hover-gry .cartIcon,
.grid-products-hover-gry .add-to-compare {
color: #ffffff;
background-color: #555555;
}

.brand-name a {
color: #555;
font-size: 12px;
text-transform: uppercase;
}

/*======================================================================
14. Collection Box Slider
========================================================================*/
.collection-grid-item {
position: relative;
width: 100%;
}

.collection-box .container-fluid {
padding: 0;
}

.collection-box-style1 .container-fluid {
padding: 0 55px;
}

.collection-box .collection-grid-item__link {
position: relative;
display: block;
border: none;
overflow: hidden;
}

.collection-box .collection-grid-item__link:before {
-ms-transition: all 0.5s ease-in-out;
-webkit-transition: all 0.5s ease-in-out;
transition: all 0.5s ease-in-out;
content: "";
position: absolute;
top: -110%;
left: -210%;
width: 200%;
height: 200%;
opacity: 0;
filter: alpha(opacity=0);
-webkit-transform: rotate(30deg);
-ms-transform: rotate(30deg);
-moz-transform: rotate(30deg);
-o-transform: rotate(30deg);
transform: rotate(30deg);
background: rgba(255, 255, 255, 0.1);
background: linear-gradient(to right,
rgba(255, 255, 255, 0.1) 0%,
rgba(255, 255, 255, 0.1) 77%,
rgba(255, 255, 255, 0.5) 92%,
rgba(255, 255, 255, 0) 100%);
}

.collection-box .collection-grid-item__link:hover:before {
opacity: 1;
filter: alpha(opacity=100);
top: -40%;
left: -40%;
-ms-transition: all 0.5s ease-in-out;
-webkit-transition: all 0.5s ease-in-out;
transition: all 0.5s ease-in-out;
}

.collection-box .collection-grid-item__link img {
margin: 0 auto;
width: 100%;
}

.collection-box .collection-grid-item__title-wrapper {
text-align: center;
position: absolute;
bottom: 25px;
width: 100%;
}

.collection-box-style1 .collection-grid-item__title-wrapper {
top: 50%;
bottom: auto;
}

.collection-box .collection-grid-item__title {
position: relative;
display: inline-block;
width: auto;
-ms-transition: all 0.5s ease-in-out;
-webkit-transition: all 0.5s ease-in-out;
transition: all 0.5s ease-in-out;
}

.collection-box .collection-grid-item__title.btn--secondary {
background-color: #ededed;
color: #353333;
border: 0;
}

.collection-box-style1 .collection-grid-item__title.btn--secondary:hover {
background-color: #353333;
color: #fff;
border: 0;
}

.collection-box .slick-arrow,
.collection-grid-4item .slick-arrow {
opacity: 0;
visibility: hidden;
width: 40px;
height: 40px;
background: white;
border-radius: 25px;
}

.collection-box:hover .slick-arrow,
.collection-grid-4item:hover .slick-arrow {
color: #353333;
opacity: 1;
visibility: visible;
}

.collection-box .collection-grid .slick-prev,
.collection-box .collection-grid-4item .slick-prev {
left: 10px;
}

.collection-box .collection-grid .slick-next,
.collection-box .collection-grid-4item .slick-next {
right: 10px;
}

.collection-box .collection-grid-4item .btn--secondary {
background-color: #353333;
color: #fff;
}

/*======================================================================
15. Brands Logo Slider
========================================================================*/
.logo-bar__item:hover {
opacity: 0.6;
}

.logo-bar .slick-arrow {
-ms-transition: all 0.5s ease-in-out;
-webkit-transition: all 0.5s ease-in-out;
transition: all 0.5s ease-in-out;
}

.logo-bar:hover .slick-arrow {
color: #353333;
opacity: 1;
}

.logo-bar .slick-prev {
left: -15px;
}

.logo-bar .slick-next {
right: -15px;
}

.logo-bar .slick-slide img {
margin: 0 auto;
}

/*======================================================================
16. Latest Blog Post
========================================================================*/
.latest-blog .wrap-blog {
display: table;
}

.latest-blog .wrap-blog .article__grid-image,
.latest-blog .wrap-blog .article__grid-meta {
display: table-cell;
vertical-align: middle;
float: none;
}

.latest-blog .wrap-blog .article__grid-meta {
width: 55%;
}

.latest-blog .wrap-blog .wrap-blog-inner {
background: rgba(255, 255, 255, 0.8);
padding: 20px;
margin-left: -30px;
position: relative;
}

.latest-blog .article__title {
font-size: 14px;
text-transform: uppercase;
letter-spacing: 1px;
margin-bottom: 0;
}

.latest-blog .article__date {
font-size: 12px;
color: #666;
display: inline-block;
margin-bottom: 15px;
}

.latest-blog .article__grid-excerpt {
font-size: 12px;
margin-bottom: 10px;
}

.latest-blog .article__meta-buttons {
text-transform: uppercase;
}

/*======================================================================
17. Store Feature
========================================================================*/
.store-info h5,
.store-info .h5 {
margin-bottom: 5px;
text-transform: uppercase;
letter-spacing: 0.08em;
font-size: 13px;


}

.store-info li {
padding: 0 20px;
text-align: center;
}

.store-info li+li {
border-left: 1px dotted #ddd;
}

.store-info .icon {
color: #a9a9a9;
font-size: 40px;
vertical-align: middle;
display: block;
margin-bottom: 20px;
}

/*======================================================================
18. Shop Pages
========================================================================*/
.template-collection .collection-header {
margin-bottom: 45px;
}

.collection-hero {
position: relative;
overflow: hidden;
}

.collection-hero__image {
height: 150px;
opacity: 1;
}

.collection-hero__image img {
width: 100%;
}

.collection-hero__title-wrapper::before {
content: "";
position: absolute;
top: 0;
right: 0;
bottom: 0;
left: 0;
background-color: #353333;
opacity: 0.4;
}

.collection-hero__title {
font-size: 1.84615em;
position: absolute;
color: #fff;
width: 100%;
text-align: center;
left: 0;
right: 0;
top: 50%;
text-transform: uppercase;
-ms-transform: translateY(-50%);
-webkit-transform: translateY(-50%);
transform: translateY(-50%);
}

.category-description {
margin-bottom: 40px;
}

.sidebar .sidebar_widget {
margin-bottom: 35px;
clear: both;
width: 100%;
}

.sidebar h2,
.sidebar .h2 {
margin-bottom: 20px;
font-size: 15px;
}

.sidebar .sidebar_widget .widget-content ul {
margin: 0 0 15px;
list-style: none;
}

.sidebar .sidebar_widget .widget-content ul li {
list-style: none;
padding: 3px 0;
font-size: 12px;
}

.filterBox ul:not(.filter-color) {
margin-left: -5px;
list-style: none;
}

.filterBox ul:not(.filter-color) li {
padding: 3px 0;
}

.filterBox ul:not(.filter-color) input[type="checkbox"] {
width: 20px;
height: auto;
margin: 0;
padding: 0;
font-size: 1em;
opacity: 0;
}

.filterBox ul:not(.filter-color) input[type="checkbox"]+label {
display: inline-block;
margin-left: -20px;
line-height: 1.5em;
cursor: pointer;
margin-bottom: 0;
}

.filterBox ul:not(.filter-color) li label {

font-size: 14px;
color:#363636;
}

.filterBox ul:not(.filter-color) input[type="checkbox"]+label>span {
display: inline-block;
width: 13px;
height: 13px;
margin: 0.25em 0.5em 0.25em 0.25em;
border: 1px solid #d0d0d0;
vertical-align: bottom;
}

.filterBox ul:not(.filter-color) input[type="checkbox"]:checked+label>span::before {
content: "\f00c";
font-family: "FontAwesome";
display: block;
width: 12px;
color: #353333;
font-size: 9px;
line-height: 11px;
text-align: center;
}

.filterBox .filter-color {
display: table;
list-style: none;
width: 100%;
}

.filterBox .filter-color .swacth-btn {
display: block;
float: left;
margin-bottom: 10px;
position: relative;
height: 25px;
width: 25px;
border: 1px solid #fff;
background-color: #f8f8f8;
margin-right: 10px;
text-align: center;
font-size: 10px;
line-height: 21px;
color: #353333;
cursor: pointer;
}

.filterBox .filter-color .swacth-btn.checked {
border-color: #353333;
}

.filterBox .filter-color .black {
background-color: #353333;
}

.filterBox .filter-color .white {
background-color: #fff;
border: 1px solid #ddd;
}

.filterBox .filter-color .red {
background-color: #fe0000;
}

.filterBox .filter-color .pink {
background-color: #ffc1cc;
}

.filterBox .filter-color .gray {
background-color: #818181;
}

.filterBox .filter-color .green {
background-color: #027b02;
}

.filterBox .filter-color .orange {
background-color: #fca300;
}

.filterBox .filter-color .yellow {
background-color: #f9f900;
}

.filterBox .filter-color .blueviolet {
background-color: #8a2be2;
}

.filterBox .filter-color .brown {
background-color: #a52a2a;
}

.filterBox .filter-color .darkGoldenRod {
background-color: #b8860b;
}

.filterBox .filter-color .darkGreen {
background-color: #006400;
}

.filterBox .filter-color .darkRed {
background-color: #8b0000;
}

.filterBox .filter-color .dimGrey {
background-color: #696969;
}

.filterBox .filter-color .khaki {
background-color: #f0e68c;
}

.sidebar .sidebar_widget.categories .sub-level {
position: relative;
}

.sidebar .sidebar_widget.categories .sub-level>a:after {
content: "\ebe0";
font-family: "annimex-icons";
display: inline-block;
position: absolute;
right: 0;
top: 3px;
}

.sidebar .sidebar_widget.categories .sub-level>a.active:after {
content: "\ebd1";
font-family: "annimex-icons";
display: inline-block;
}

.sidebar .sidebar_widget.categories .sub-level ul {
margin-left: 15px;
margin-bottom: 0;
display: none;
}

.sidebar .sidebar_widget.categories li a {
display: block;
}

.filter-widget .widget-title {
position: relative;
cursor: pointer;
}

.filter-widget .widget-title:after {
content: "\eb69";
font-family: "annimex-icons";
display: inline-block;
position: absolute;
right: 0;
top: -1px;
font-size: 17px;
}

.filter-widget .widget-title.active:after {
content: "\eb66";
font-family: "annimex-icons";
display: inline-block;
}

.size-swacthes .swacth-list ul {
margin-left: 0;
}

.size-swacthes .swacth-list li {
float: left;
display: block;
}

.size-swacthes .swacth-list .swacth-btn {
font-size: 12px;
display: block;
margin-bottom: 2px;
width: 31px;
height: 31px;
line-height: 31px;
}

/* Price Range */
.price-filter input[type="text"] {
height: 30px;
padding: 0 10px;
text-align: center;
font-size: 12px;
width: 100px;
}

#slider-range.ui-slider-horizontal {
background: #e9e9e9;
border: none;
border-radius: 0;
height: 3px;
margin-bottom: 20px;
}

#slider-range .ui-slider-handle {
background: #fff;
border: 2px solid #353333;
height: 10px;
outline: none;
top: -4px;
width: 10px;
border-radius: 50%;
cursor: w-resize;
margin-left: -1px;
}

#slider-range.ui-slider-horizontal .ui-slider-range {
background: #777;
border: 0;
}

#slider-range.ui-slider-horizontal .ui-slider-range~.ui-slider-range {
background: #353333;
}

/* Color Swatches */
.grid-products .item .swatches.color-style li {
box-shadow: none;
-webkit-box-shadow: none;
}

.grid-products .item .swatches.color-style li input[type="checkbox"] {
display: none;
}

.grid-products .item .swatches.color-style li input[type="checkbox"]+label.color {
margin: 0;
cursor: pointer;
border: 1px solid #ccc;
}

.grid-products .item .swatches.color-style li input[type="checkbox"]+label.color span {
display: block;
height: 25px;
width: 25px;
}

.grid-products .item .swatches.color-style li input[type="checkbox"]:checked+label.color {
border: 1px solid #353333;
box-shadow: 0 0 1px #353333;
}

.grid-products .item .swatches.color-style li .black {
background-color: #353333;
}

.grid-products .item .swatches.color-style li .white {
background-color: #fff;
}

.grid-products .item .swatches.color-style li .red {
background-color: #fe0000;
}

.grid-products .item .swatches.color-style li.rounded {
width: 25px;
height: 25px;
border-radius: 50% !important;
-webkit-border-radius: 50% !important;
}

.grid-products .item .swatches.color-style li.rounded input[type="checkbox"]+label.color,
.grid-products .item .swatches.color-style li.rounded input[type="checkbox"]+label.color span,
.grid-products .item .swatches.color-style li.rounded input[type="checkbox"]:checked+label.color {
border-radius: 50% !important;
-webkit-border-radius: 50% !important;
}

.grid-products .item .swatches.color-style li.radius input[type="checkbox"]+label.color,
.grid-products .item .swatches.color-style li.radius input[type="checkbox"]+label.color span,
.grid-products .item .swatches.color-style li.radius input[type="checkbox"]:checked+label.color {
border-radius: 5px !important;
-webkit-border-radius: 5px !important;
}

.grid-products .item .swatches.color-style li.small,
.grid-products .item .swatches.color-style li.small input[type="checkbox"]+label.color span {
width: 15px;
height: 15px;
}

/* End Color Swatches */

.list-sidebar-products {
margin-top: 30px;
}

.list-sidebar-products:before,
.list-sidebar-products:after,
.sidebar .sidebar_widget:before,
.sidebar .sidebar_widget:after {
content: "";
clear: both;
display: block;
}

.list-sidebar-products .grid__item {
margin-bottom: 5px;
}

.mini-list-item {
margin-bottom: 10px;
}

.mini-list-item:before,
.mini-list-item:after {
content: "";
clear: both;
display: block;
}

.mini-list-item .mini-view_image {
float: left;
width: 25%;
}

.mini-list-item .mini-view_image img {
width: 100%;
max-width: 70px;
}

.mini-list-item .details {
margin-left: 30%;
}

.product-tags li {
border-radius: 18px;
display: inline-block;
border: 1px solid #e8e9eb;
margin-bottom: 5px;
height: 25px;
}

.product-tags li a {
padding: 5px 10px;
font-size: 11px;
}

.btnview {
background: none;
color: #353333;
padding: 5px 0;

-ms-transition: all 0.5s ease-in-out;
-webkit-transition: all 0.5s ease-in-out;
transition: all 0.5s ease-in-out;
}

.btnview:hover {
background: none;
border-color: #fff;
color: #353333;
}

.filters-toolbar-wrapper {
border: 0;
margin: 0px 0px 10px 0
}

.filters-toolbar-wrapper .change-view {
cursor: pointer;
background: none;
opacity: 0.6;
border: 0;
padding: 0 3px;
}

.filters-toolbar-wrapper .change-view--active {
opacity: 1;
}

.filters-toolbar__product-count {
font-size: 1rem;
line-height: 35px;
margin-bottom: 0;
overflow: hidden;
text-overflow: ellipsis;
letter-spacing: 1.2px;
white-space: nowrap;
}

.filters-toolbar-wrapper select {
width: auto;
font-size: 12px;
}
.bottomfilter {
display:none;
background: #f8f8f8;
position: fixed;
bottom: 0;
width: 100%;
z-index: 9;
border-top: 1px solid #dddddd;
}
.bottomfilter .row{
display: flex;
justify-content: space-around;
align-items: center;line-height: 50px;
}
.bottomfilter .col-3{
display: flex;
justify-content: center;
align-items: center;
}
.bottomfilter .site-header__search{
float:none
}
.bottomfilter .site-header__cart-count{
bottom: 15px;
}
.filters-toolbar__input {
-ms-transition: all ease-out 0.15s;
-webkit-transition: all ease-out 0.15s;
transition: all ease-out 0.15s;
background-color: #fff;
border: 0 solid transparent;
overflow: hidden;
text-overflow: ellipsis;
white-space: nowrap;
max-width: 100%;
height: 35px;
opacity: 1;
}

.infinitpagin {
clear: both;
padding: 15px 0 30px;
text-align: center;
}

.loadMore {
color: #fff !important;
}

.pagination {
width: 100%;
text-align: center;
list-style: none;
font-size: 1.15385em;
}

.pagination ul {
display: block;
margin: 0 auto;
}

.pagination li {
display: inline-block;
}

.pagination li.active a {
border: 2px solid #636871;
color: #555;
}

.pagination li a {
font-size: 12px;
color: #a2a2a2;
height: 30px;
width: 30px;
line-height: 28px;
display: inline-block;
border: 2px solid #e8e9eb;
vertical-align: middle;
}

.pagination li a i {
line-height: 28px;
vertical-align: middle;
}

/* Countdown Timer On listing */
.grid-products .item:hover .saleTime {
display: none;
}

.saleTime {
position: absolute;
bottom: 5px;
left: 0;
right: 0;
z-index: 111;
}

.saleTime .time-count {

font-size: 14px;
}

.saleTime span>span {

min-width: 30px;
padding: 6px 4px 4px;
line-height: 12px;
display: inline-block;
margin: 0 0 0 1px;
text-align: center;
background: rgba(255, 255, 255, 0.9);
color: #141414;
}

.saleTime span>span span {
display: block;
background: none;
font-size: 10px;

margin-top: -3px;
text-transform: uppercase;
line-height: 8px;
}

.timermobile {
margin: 0 -10px;
display: none;
}

.timermobile .saleTime {
position: relative;
margin-top: 20px;
}

.countdown-deals {
line-height: 35px;
text-align: center;
width: 100%;
margin-bottom: 10px;
}

.countdown-deals .cdown {
background: #f1f1f1;
display: inline-block;
height: 50px;
width: 44px;
}

.countdown-deals .cdown span {
font-size: 14px;

}

.countdown-deals .cdown>p {
font-size: 12px;
text-transform: uppercase;
line-height: 0;
margin: 0;
}

.grid-products .countdown-deals {
position: absolute;
bottom: -10px;
}

.grid-products .countdown-deals .cdown {
color: #fff;
background-color: #353333;
}

.product-list .countdown-deals {
line-height: 40px;
text-align: left;
}

.product-list .countdown-deals .cdown {
font-size: 14px;
height: 59px;
width: 65px;
text-align: center;
color: #fff;
background-color: #353333;
}

.product-load-more .item {
display: none;
}

/*======================================================================
19. Product Listview
========================================================================*/
.list-view-item {
display: table;
table-layout: fixed;
margin-bottom: 15px;
padding-bottom: 15px;
width: 100%;

text-decoration: none;
}

.list-view-item:hover {
text-decoration: none;
}

.list-view-item p {
color: #555;
}

.list-view-item__image-column {
display: table-cell;
vertical-align: middle;
width: 230px;
}

.list-view-item__image-wrapper {
position: relative;
margin-right: 20px;
}

.list-view-item__title-column {
display: table-cell;
vertical-align: middle;
}

.list-view-items .grid-view-item__title {
margin-bottom: 10px;
text-align: left;
}

.list-view-items .product-price__sale {
padding-left: 5px;
}

.list-view-items .variants {
margin-top: 10px;
}

.main-content {
min-height: 500px;
}

/*======================================================================
20. Bredcrumb
========================================================================*/
.bredcrumbWrap {
background: #f9f9f9;
padding: 10px 0;
margin: 0 0 30px;
border-top: solid 1px #e8e9eb;
}

.breadcrumbs a,
.breadcrumbs span {
color: #111;
display: inline-block;
padding: 0 7px 0 0;
margin-right: 7px;
font-size: 12px;
}

.img-fluid {
width: 100% !important;
}



.product-form .swatch .swatchInput+.swatchLbl.rounded {
border-radius: 50% !important;
}

.product-form .swatch .swatchInput+.swatchLbl.rectangle {
border-radius: 7px !important;
}

.product-buttons {
position: absolute;
right: 10px;
bottom: 10px;
z-index: 99;
}

.product-buttons .btn.popup-video i,
.product-buttons .btn i {
line-height: 33px;
}

.product-buttons .btn {
font-size: 19px;
height: 36px;
width: 36px;
text-align: center;
margin-top: 5px;
clear: both;
border-radius: 3px;
padding: 0;
line-height: 33px;
float: right;
color: #ffffff;
opacity: 0.9;
}

.product-template__container .product-single {
margin-bottom: 20px;
}

.product-template__container .product-single__meta {
position: relative;
margin-bottom: 20px;
}
span.mainprice_tagline {
color: #b4a820;
font-size: 15px;

letter-spacing: -.5px;
}
span.mainprice_tagline2 {
color: #b4a820;
font-size: 11px;
letter-spacing: -.5px;
}
h1.product-single__title,
.product-single__title.h1 {
color: #353333;
font-size: 23px;
margin-bottom: 10px;
padding-right: 60px;
text-transform: uppercase;
font-weight:600
}

.product-template__container .product-nav {
position: absolute;
right: 0;
top: 10px;
}

.product-template__container .product-nav .next {
float: right;
}

.product-template__container .product-nav .prev,
.product-template__container .product-nav .next {
font-size: 20px;
display: block;
line-height: 22px;
text-align: center;
height: 20px;
width: 20px;
padding: 0;
color: #353333;
}

.product-template__container .prInfoRow {
margin-bottom: 10px;
}

.product-template__container .prInfoRow>div {
display: inline-block;
margin-right: 5%;
}

.product-template__container .prInfoRow .instock {
color: #447900;
}

.product-template__container .prInfoRow .spr-badge-caption {
color: #424242;
padding-left: 5px;
}

.product-template__container .prInfoRow a:hover {
text-decoration: none;
}

.product-single__price .product-price__price {
font-size: 1.46154em;
padding-left: 3px;
}

.discount-badge {
display: inline-block;
vertical-align: middle;
margin: -2px 0 0 5px;
font-size: 13px;
}

.discount-badge .product-single__save-amount {}

.discount-badge .off,
.discount-badge .product-single__save-amount {
color: #b0d761;
}

.product-single__price {
display: inline-block;
margin-right: 10px;
color: #555;
font-size: 1.15385em;

margin-bottom: 15px;
}

.orderMsg {
color: #b0d761;
font-size: 15px;
margin-bottom: 20px;
}

.orderMsg img {
margin-right: 3px;
vertical-align: top;
-webkit-animation-name: blinker;
-webkit-animation-iteration-count: infinite;
-webkit-animation-timing-function: cubic-bezier(0.6, 0, 1, 1);
-webkit-animation-duration: 0.8s;
}

@-webkit-keyframes blinker {
from {
opacity: 1;
}

to {
opacity: 0;
}
}

.product-description ul,
.product-single__description ul {
margin-left: 0;
}

.product-single__description ul {
text-align: left;
}

.product-description ul li,
.product-single__description ul li {
position: relative;
margin-left: 15px;
list-style: disc;
}

.rte {
color: #555;
margin-bottom: 20px;
}

.rte li {
margin-bottom: 4px;
list-style: inherit;
}

.rte h1,
.rte .h1,
.rte h2,
.rte .h2,
.rte h3,
.rte .h3,
.rte h4,
.rte .h4,
.rte h5,
.rte .h5,
.rte h6,
.rte .h6 {
margin-top: 30px;
margin-bottom: 15px;
}

.rte h1:first-child,
.rte .h1:first-child,
.rte h2:first-child,
.rte .h2:first-child,
.rte h3:first-child,
.rte .h3:first-child,
.rte h4:first-child,
.rte .h4:first-child,
.rte h5:first-child,
.rte .h5:first-child,
.rte h6:first-child,
.rte .h6:first-child {
margin-top: 0;
}

.rte:last-child {
margin-bottom: 0;
}

.product-template__container #quantity_message {
color: #31a3a3;
font-size: 16px;
text-align: center;
padding: 5px 9px;
margin-bottom: 15px;
}

.product-template__container #quantity_message .items {}

.product-form {
display: -webkit-flex;
display: -ms-flexbox;
display: flex;
width: 100%;
-webkit-flex-wrap: wrap;
-moz-flex-wrap: wrap;
-ms-flex-wrap: wrap;
flex-wrap: wrap;
-ms-flex-align: end;
-webkit-align-items: flex-end;
-moz-align-items: flex-end;
-ms-align-items: flex-end;
-o-align-items: flex-end;
align-items: flex-end;
width: auto;
margin: 0 -5px -10px;
}

.product-template__container .product-form .swatch {
width: 100%;
}

.product-form .swatch {
margin-bottom: 10px;
}

.product-form .swatch .product-form__item {
margin-bottom: 0;
padding-bottom: 0;
padding-top: 0;
}

.product-form__item {
-webkit-flex: 1 1 200px;
-moz-flex: 1 1 200px;
-ms-flex: 1 1 200px;
flex: 1 1 200px;
margin-bottom: 10px;
padding: 5px;
}

.product-form .swatch label {
display: block;
text-transform: uppercase;

}

.product-template__container label .slVariant {}

.product-form .swatch .swatch-element {
display: inline-block;
margin-right: 8px;
cursor: pointer;
}

.product-form .swatch .swatchInput+.swatchLbl.color.medium {
width: 50px;
height: 50px;
}

.product-form .swatch .swatchInput:checked+.swatchLbl {
border: 2px solid #111111;
box-shadow: none;
}

.product-form .swatch .swatchInput+.swatchLbl.color {
width: 30px;
padding: 0;
height: 30px;
background-repeat: no-repeat;
background-position: 50% 50%;
background-size: 100% auto;
cursor: pointer;
}

.product-form .swatch .swatchInput+.swatchLbl.large {
width: 40px;
height: 40px;
}

.product-form .swatch .swatchInput+.swatchLbl.large:not(.color) {
line-height: 36px;
}

.product-form .swatch .swatchInput+.swatchLbl {
color: #333;
font-size: 12px;

line-height: 28px;
text-transform: capitalize;
display: inline-block;
margin: 0;
min-width: 30px;
height: 30px;
overflow: hidden;
text-align: center;
background-color: #f9f9f9;
padding: 0 10px;
border: 2px solid #fff;
box-shadow: 0 0 0 1px #ddd;
border-radius: 0;
-ms-transition: all 0.5s ease-in-out;
-webkit-transition: all 0.5s ease-in-out;
transition: all 0.5s ease-in-out;
cursor: pointer;
}

.product-form .swatch .swatchInput {
display: none;
}

.infolinks {
margin-bottom: 25px;
padding: 0 5px;
}

.infolinks .btn {
font-size: 11px;
background-color: transparent;
color: #353333;
padding: 0;
margin-right: 15px;
display: inline-block;
vertical-align: top;

}

.infolinks .btn:focus {
outline: 0;
}

#sizechart {
text-align: center;
background: #fff;
margin: 0 auto;
padding: 20px;
max-width: 800px;
position: relative;
}

#sizechart table tr th {
background: #353333;
color: #fff;
border: 0 !important;
}

#sizechart table tr th,
#sizechart table tr td {
padding: 7px 12px;
text-align: center;
font-size: 12px;
border: 1px solid #e8e9eb;
}

table {
margin-bottom: 15px;
width: 100%;
border-collapse: collapse;
border-spacing: 0;
}

#productInquiry {
background: #eee;
margin: 0 auto;
padding: 20px;
max-width: 600px;
position: relative;
}

#productInquiry input[type="tel"],
#productInquiry input[type="email"],
#productInquiry input[type="text"],
#productInquiry textarea {
background-color: #fff;
margin-bottom: 10px;
}

#productInquiry textarea {
padding: 10px;
}

.product-template__container .product-action {
width: 100%;
display: block;
margin-bottom: 15px;
padding: 0 5px;
}

.product-template__container .product-form__item--quantity {
float: left;
margin: 0 10px 10px 0;
}

.wrapQtyBtn {
float: left; border: 1px solid #80808069;
border-radius: 20px;
}

.qtyField {
display: table;
margin: 0 auto;
}

.qtyField .qty {
width: 40px;
}

.qtyField .qtyBtn,
.qtyField .qty {
padding: 10px 6px;
width: 30px;
height: 42px;
border-radius: 0;
float: left;
}

.qtyField a {
background-color: #eee;
color: #353333;
}

.qtyField a .fa {
font-size: 12px;
line-height: 21px;
}

.qtyField>a,
.qtyField>span,
.qtyField input {
display: table-cell;
line-height: normal;
text-align: center;
padding: 3px 6px;
border: 1px solid #f5f5f5;
}

.product-template__container .product-form__item--submit {
width: auto;
overflow: hidden;
}

.product-template__container .product-form__item--submit .btn {
width: 100%;
padding: 6px 15px;
min-height: 42px;
}

.product-template__container .shopify-payment-button .shopify-payment-button__button--unbranded {
border-radius: 0;
-ms-transition: all 0.3s ease-in-out;
-webkit-transition: all 0.3s ease-in-out;
transition: all 0.3s ease-in-out;
color: #fff;
background-color: #ffe549;
float: right;
}

.shopify-payment-button__button {
cursor: pointer;
display: block;
font-size: 1em;

line-height: 1;
text-align: center;
width: 100%;
}

.shopify-payment-button__button--unbranded {
padding: 1em 2em;
}

.product-template__container .shareRow {
padding: 10px 0 20px;
}

.product-template__container .shareRow .wishlist {
background: none !important;
color: #353333 !important;
text-transform: capitalize;
width: auto;
text-align: left;
line-height: inherit;
height: auto;
text-decoration: none;
}

.product-template__container .shareRow .wishlist span {
display: inline;
padding-left: 5px;
letter-spacing: 0.02em;
}

.product-template__container .shareRow .medium-up--one-third {
width: 33%;
}

.social-sharing .btn {
color: #353333 !important;
padding: 0 5px;
margin-bottom: 0;
background: none !important;
border: 0;
letter-spacing: normal;
text-transform: capitalize;
}

.btn--share .fa {
color: #222222;
font-size: 14px;
}

.freeShipMsg {
margin-bottom: 12px;
}

.freeShipMsg .fa {
font-size: 20px;
width: 25px;
vertical-align: middle;
}

.shippingMsg {
margin-bottom: 12px;
}

.shippingMsg .fa {
font-size: 18px;
width: 25px;
vertical-align: middle;
}

.userViewMsg {
clear: both;
margin-bottom: 12px;
}

.userViewMsg .fa,
.userViewMsg .uersView {
color: #b0d761;
}

.userViewMsg .fa {
font-size: 18px;
width: 25px;
}

.prFeatures {
padding: 20px 0;
}

.prFeatures .feature {
margin-bottom: 20px; display: flex;
align-items: center;
}

.prFeatures img {
float: left;
}

.prFeatures .details {
margin-left: 10px;
line-height: 1.5;
}

.prFeatures .details h3,
.prFeatures .details .h3 {
margin-bottom: 5px;
text-transform: uppercase;
font-size: 13px;
font-weight: 600;
}

.template-product .tabs-listing .product-tabs {

width: 100%;
margin-bottom: 0;
}

.template-product .tabs-listing .product-tabs li {
float: none;
display: inline-block;
cursor: pointer;
margin-top:10px
}
.swal-error-bg{
background: #ff846c !Important;
color: white;
}

.swal-sucess-bg{
border: 2px dashed #8eb737;
}
body.swal2-toast-shown .swal2-container{
z-index: 99999999 !important;
}
.swal-error-icon, .swal-info-icon{
border-color:white !important
}

.swal2-success-circular-line-right, .swal2-success-circular-line-left{
background:transparent !important,
}

.product-description p{
line-height:25px
}
.img-thumbnail{
border-radius:0.75rem !important
}
.template-product .tabs-listing .product-tabs a {
border-bottom: 1px solid transparent;
margin-bottom: -1px;
letter-spacing: 1px;
display: block;
border: none;
padding: 10px 0;
background: none !important;
text-transform: uppercase;

border-radius: 0;
outline: none;
color: #2e2d2d;
text-decoration: none;
}

.template-product .product-tabs li.active a,
.template-product .product-tabs li.active a:focus {
text-decoration: none;
border: 0;
color: #353333;

opacity: 1;
}
.gappricemul{
letter-spacing: 1px;
font-weight: 800;
color: #3c3c3c;
}
.acor-ttl.active {}

.acor-ttl {
display: block;
padding: 15px 0;
position: relative;

letter-spacing: 1px;


margin: 0;
font-size: 12px;
cursor: pointer;
}

.template-product .tabs-listing .tab-container {
padding: 10px 0;
text-align: left;
}

.tab-container .tab-content {
display: none;
}

.product-template__container .product-single-1 .tab-container .tab-content {
padding-top: 20px;
}

.template-product .prstyle2 .tabs-listing .acor-ttl:before {
position: absolute;
right: 15px;
top: 15px;
content: "\f107";
font-family: "FontAwesome";
font-size: 16px;

}

.template-product .prstyle2 .tabs-listing .acor-ttl.active:before {
content: "\f106";
color: #353333;
}

#shopify-product-reviews {
*zoom: 1;
display: block;
clear: both;
overflow: hidden;
margin: 1em 0;
}

.spr-container:before,
.spr-container:after {
content: " ";
display: table;
}

.spr-summary-starrating {
margin: 0 6px 0 0;
}

.spr-summary-actions-newreview {
float: right;
background: #353333;
color: #fff !important;
font-size: 12px;

padding: 8px 10px;
text-transform: uppercase;
}

.spr-form {
padding: 0 25px;
}

.spr-form-title {
font-size: 16px;
line-height: 24px;
margin-top: 0;
text-transform: uppercase;
}

.spr-form-contact-name,
.spr-form-contact-email,
.spr-form-contact-location,
.spr-form-review-rating,
.spr-form-review-title,
.spr-form-review-body {
*zoom: 1;
margin: 0 0 15px 0;
}

.spr-container input,
.spr-container select,
.spr-container textarea {
border-color: #d3d3d3;
}

.product-template__container label {

text-transform: uppercase;
letter-spacing: 0.02em;
}

.spr-reviews {
padding: 15px 0;
}

.spr-review {
padding: 15px 25px;

}

.btn {
outline: none !important;
}

.spr-review-header-starratings {
margin: 0 0 0.5em 0;
display: inline-block;
}

.spr-review-header-title {
font-size: 16px;
line-height: 24px;
margin: 0;
padding: 0;
border: none;
text-transform: uppercase;
}

.spr-review-header-byline {
font-size: 13px;
opacity: 0.7;
display: inline-block;
margin: 0 0 1em 0;
}

.spr-review-content {
*zoom: 1;
margin: 0 0 24px 0;
}

.template-product .tabs-listing .tab-container table tr th {
background: #353333;
color: #fff;
border: 0 !important;
}

.template-product .tabs-listing .tab-container table tr th,
.template-product .tabs-listing .tab-container table tr td {

text-align: center;
font-size: 12px;
border: 1px solid #e8e9eb;
}

.related-product {
margin-bottom: 30px;
}

.product-template__container .section-header {
margin-bottom: 40px;
}

.sub-heading {
text-align: center;
max-width: 500px;
margin: 0 auto;
}

.related-product .grid--view-items {
overflow: visible;
}

.recently-product .grid-products .item {
float: left;
}

.product-single__photos.bottom .product-dec-slider-1 {
padding: 8px 0;
margin-left: -4px;
}

.product-single__photos.bottom .product-dec-slider-1 .slick-list {
margin: 0 -2px;
}

.product-single__photos.bottom .product-dec-slider-1 .slick-slide {
margin: 0 4px;
}

.product-info .lbl {}

.left-content-product {
float: left;
width: 80%;
padding-right: 30px;
}

.sidebar-product {
float: left;
width: 20%;
}

.sidebar-product .prFeatures {
padding-top: 0;
}

.sidebar-product .prFeatures h5 {
font-size: 1.07692em;


}

.template-product-right-thumb .sidebar-product .prFeatures {
padding-top: 0;
}

.sidebar-product .section-header {
margin-bottom: 20px;
}

.prstyle3 .related-product {
margin-bottom: 20px;
}

.prstyle3 .related-product:before,
.prstyle3 .related-product:after {
content: "";
clear: both;
display: block;
}

.prstyle3 .related-product .section-header .h2,
.prstyle3 .related-product .section-header .sub-heading {
text-align: left;
}

.prstyle3 .related-product .section-header {
margin-bottom: 12px;
}

.prSidebar .section-header h2,
.prSidebar .section-header .h2 {
font-size: 130%;
text-align: left !important;
}

.prstyle3 .mini-list-item .mini-view_image img {
max-width: 110px;
}

.prstyle3 .mini-list-item .mini-view_image {
width: 28%;
}

.prstyle3 .mini-list-item .details {
margin-left: 32%;
}

.template-product-right-thumb .product-details-img .product-thumb {
padding-right: 0;
padding-left: 5px;
}

.template-product-right-thumb .product-thumb .product-dec-slider-2 a {
padding-bottom: 3px;
}

.template-product-right-thumb .prFeatures {
padding: 40px 0 20px;
}

.product-countdown {
position: static;
margin: 15px 0;
}

.product-countdown:before,
.product-countdown:after {
content: "";
clear: both;
display: block;
}

.product-countdown .time-count {

font-size: 24px;
display: block;
width: 100%;
text-align: center;
margin: 0;
}

.product-countdown span>span {

width: 24%;
margin-right: 0.3%;
padding: 10px;
line-height: 18px;
display: inline-block;
text-align: center;
background: #353333;
color: #fff;
float: left;
}

.product-countdown span>span span {
display: block;
background: none;
font-size: 15px;

text-transform: uppercase;
line-height: 16px;
text-align: center;
width: 100%;
padding: 8px;
}

.product-right-sidebar .product-details-img {
width: 50%;
float: left;
padding-right: 10px;
}

.product-right-sidebar .product-information {
width: 50%;
float: left;
padding-left: 10px;
}

.product-right-sidebar .sidebar-product {
width: 100%;
}

.product-right-sidebar .tabs-listing {
clear: both;
padding-top: 30px;
}

.product-right-sidebar .sub-heading {
text-align: left;
}

.product-right-sidebar .related-product {
margin-bottom: 20px;
}

.product-labels .pr-label3 {
left: 5px;
background: #fb6c3e;
}

.product-single .product-single__meta {
position: relative;
}

.product-single .product-featured-img {
width: 100%;
display: block;
margin: 0 auto;
}

.product-single .grid_item-title {
font-size: 26px;
margin-bottom: 25px;
}

.product-single .product-single__title {
font-size: 18px;
}

/*======================================================================
22. Categories List
========================================================================*/
.categories-list-items:before,
.categories-list-items:after {
content: "";
clear: both;
display: block;
}

.categories-item {
float: left;
width: 23.2%;
margin-right: 2.307692307692308%;
}

.categories-item:last-of-type {
margin-right: 0;
}

.categories-item ul {
list-style: none;
padding: 0;
margin: 0;
}

.categories-item ul li {
list-style: disc;
margin-left: 15px;
}

.categories-item .thumb {
margin-bottom: 15px;
display: block;
}

.categories-item h4 {

font-size: 14px;
text-transform: uppercase;
margin: 0 0 10px;
}
input[type="number"]::-webkit-outer-spin-button,
input[type="number"]::-webkit-inner-spin-button {
-webkit-appearance: none;
appearance: none;
margin: 0; /* Optional - if you want to remove the margin */
}
.categories-item .rte-setting {
margin-bottom: 20px;
}

.categories-list-items .row {
margin-bottom: 40px;
}

/*======================================================================
23. Pages
========================================================================*/
.page.section-header {
background: #f9f9f9;
border: 1px solid #e8e9eb;
}

.page.section-header h1 {
text-transform: uppercase;
margin: 0;
color: #353333;
padding: 25px 0;
font-size: 18px;
}
footer#footer {
position: relative;
z-index: 99;
}
.page-template .addressFooter {
font-size: 14px;
list-style: none;
}

.page-template #page-content .addressFooter .icon {
color: #353333 !important;
font-size: 18px;
}

.page-template .addressFooter li p {
padding-left: 30px;
}

.contact-template .section-header {
margin-bottom: 0;
}

.contact-template .map-section {
margin-bottom: 0;
overflow: hidden;
height: 350px;
}

.contact-template .map-section .container {
position: relative;
height: 100%;
}

.contact-template .map-section__overlay {
left: auto;
width: 300px;
padding: 20px;
display: inline-block;
text-align: center;
z-index: 3;
position: absolute;
left: 0;
top: 0;
transform: translateY(-135%);
-webkit-transform: translateY(-135%);
margin-top: 0;
background: rgba(255, 255, 255, 0.8);
}

.contact-template .map-section__overlay-wrapper {
position: static;
text-align: left;
height: 100%;
}

.rte-setting {
margin-bottom: 11.11111px;
}

.contact-template .btn--secondary {
background-color: #ededed;
color: #353333;

}

.contact-form textarea {
height: 120px;
}

#accordionExample .title {
margin: 35px 0 20px;
}

#accordionExample .panel-title {
cursor: pointer;

font-size: 14px;
text-transform: none;
margin: 0;
background: none;
padding: 15px;
border-top: 2px solid #eee;
display: block;
color: #555;
padding-left: 30px;
position: relative;
}

#accordionExample .panel-title.active {
color: #353333;
}

#accordionExample .panel-content {
padding: 1px 5px 15px 30px;
}

#accordionExample .panel-title[aria-expanded="true"] {
color: #ffffff;
background: #a5c858;
margin-bottom: 20px;
}

#accordionExample .panel-title[aria-expanded="false"]:before {
content: "\e61a";
font-family: "themify";
display: inline-block;
position: absolute;
left: 5px;
font-size: 14px;
}

#accordionExample .panel-title[aria-expanded="true"]:before {
content: "\e622";
font-family: "themify";
display: inline-block;
position: absolute;
left: 5px;
font-size: 14px;
}

.lookbook-template .page.section-header {
margin-bottom: 0;
}

.lookbook:before,
.lookbook:after {
content: "";
clear: both;
display: block;
}

.lookbook .grid-lookbook,
.lookbook .grid-sizer {
float: left;
}

.lookbook .grid-lookbook>img {
width: 100%;
}

.lookbook .caption {
-webkit-transition-duration: 0.5s;
transition-duration: 0.5s;
position: absolute;
left: 0;
transform: translateY(-50%);
-webkit-transform: translateY(-50%);
width: 100%;
text-align: center;
top: 50%;
z-index: 9;
}

.lookbook .overlay {
z-index: 222;
position: absolute;
content: " ";
height: 100%;
width: 100%;
top: 0;
left: 0;
background: #353333;
opacity: 0.2;
visibility: visible;
}

.lookbook h2,
.lookbook .h2 {
color: #fff;
font-size: 22px;
letter-spacing: 0.03em;
transition-duration: 0.5s;
-webkit-transition-duration: 0.5s;
margin-bottom: -20px;
}

.lookbook .btn {
color: #fff;
transition-duration: 0.3s;
-webkit-transition-duration: 0.3s;
opacity: 0;
visibility: hidden;
margin-top: -20px;
position: relative;
z-index: 555;
padding: 10px 60px;
}

.lookbook>div:hover .btn {
opacity: 1;
visibility: visible;
}

.lookbook>div:hover {
transition-duration: 0.5s;
-webkit-transition-duration: 0.5s;
}

.lookbook>div:hover .overlay {
opacity: 0.1;
}

.grid:after {
content: "";
display: block;
clear: both;
}

.grid-sizer,
.grid-item {
width: 50%;
}

@media (max-width: 575px) {
.grid-products .item .product-name a {
font-size: 1.1em;
}
#header-cart .qtyField .label{
font-size:10px
}
#header-cart .qtyField .qtyBtn, #header-cart .qtyField .qty {
font-size: 10px;
width: 20px;
height: 23px;
padding: 0;
}
.mobupdatecart{
font-size: 10px;
}
.collection-hero__image{
height:100px
}

.grid-sizer,
.grid-item {
width: 100%;
}
.grid-products .item .product-price{
margin:0
}
}

@media (min-width: 576px) and (max-width: 767px) {
.collection-hero__image{
height:100px
}

.grid-sizer,
.grid-item {
width: 50%;
}
}

.grid-item {
float: left;
}

.grid-item img {
display: block;
max-width: 100%;
}

.empty-page-content {
padding: 140px 0;
}

.empty-page-content .btn {
color: #fff;
}

.site-header__logo-image {
margin-bottom: 10px;
display: block;
}

.template-password .shopify-section {
height: 100vh;
}

.password-table {
display: table;
height: 100%;
width: 100%;
}

.password-cell {
width: 50%;
display: table-cell;
vertical-align: middle;
text-align: center;
position: relative;
}

.password-page {
background: none !important;
display: table;
height: 100%;
width: 100%;
color: #555;
background-color: #fff;
background-size: cover;
}

.password-table .password-cell {
background: url(../images/coming-soon.jpg);
background-repeat: no-repeat;
background-position: 50% 50%;
background-size: cover;
}

.password-header {
position: absolute;
right: 0;
}

.password-main {
width: 100%;
height: 100%;
margin: 0 auto;
display: table;
vertical-align: middle;
}

.password-main__inner {
display: table-cell;
vertical-align: middle;
padding: 15px 30px;
}

.password__title {
margin-bottom: 30px;
}

.password__input-group {
max-width: 340px;
margin: 0 auto 30px;
}

.password-cell .input-group {
position: relative;
display: table;
width: 100%;
border-collapse: separate;
height: 40px;
}

.password-cell .input-group__field {
width: 100%;
border-right: 0;
border-radius: 3px 0 0 3px;
}

.password-cell .input-group__btn .btn {
border-radius: 0 3px 3px 0;
white-space: nowrap;
}

.password-cell .input-group__field,
.password-cell .input-group__btn {
display: table-cell;
vertical-align: middle;
margin: 0;
}

.password-cell .input-group__btn {
white-space: nowrap;
width: 1%;
}

.template-blog .bredcrumbWrap {
border: 0;
}

.custom-search {
margin-bottom: 20px;
}

.custom-search .search {
opacity: 1;
border: 1px solid #e5e5e5;
max-width: 100%;
padding: 8px 10px;
border-radius: 0;
box-shadow: none;
-webkit-box-shadow: none;
display: table;
top: 0;
transform: none;
-webkit-transform: none;
visibility: visible;
}

.custom-search .search__input {
font-size: 13px;
border: none;
display: table-cell;
width: 100%;
padding: 0 10px;
}

.custom-search .input-group__field,
.custom-search .input-group__btn {
display: table-cell;
vertical-align: middle;
margin: 0;
}

.custom-search .input-group__btn {
text-align: center;
white-space: nowrap;
width: 1%;
}

.custom-search .btnSearch {
border: 0;
cursor: pointer;
font-size: 14px;
}

.article_featured-image {
display: -webkit-box;
display: -moz-box;
display: -ms-flexbox;
display: -webkit-flex;
display: flex;
align-items: center;
justify-content: center;
min-height: 140px;
}

.article_featured-image img {
margin-bottom: 20px;
}

.publish-detail {
margin: 0 0 10px 0;
}

.publish-detail li {
list-style: none;
display: inline-block;
margin-right: 10px;
}

.blog--list-view .article {
margin-bottom: 20px;
}

.featured-content .list-items {
margin-left: 10px;
}

#comment_form {
padding: 20px;
border: 1px solid #e8e9eb;
background: #f5f5f5;
margin-top: 40px;
}

#comment_form input[type="text"],
#comment_form input[type="email"],
#comment_form textarea {
background: #fff;
}

.blog-nav {
margin-top: 20px;
}

.blog-nav .icon {
vertical-align: middle;
padding-right: 4px;
}

.blog-nav .text-right .icon {
padding-left: 4px;
}

.tags-clouds li {
display: inline-block;
margin-bottom: 6px;
margin-right: 6px;
}

.tags-clouds li a {
display: block;
border: 1px solid #ddd;
padding: 5px 9px !important;
text-transform: uppercase;
}

.tags-clouds li a:hover {
background-color: #f1f1f1;
}

.loadmore-post {
text-align: center;
}

.blog--grid-load-more .article {
display: none;
border-bottom: 1px solid #ddd;
padding: 0 0 30px;
margin-bottom: 30px;
}

.error-page .empty-page-content h1 {
font-size: 60px;
text-transform: uppercase;
font-weight: 800;
}

.compare-page .table {
border: 1px solid #ddd;
}

.compare-page .table th {
background-color: #f1f1f1;
vertical-align: middle;
}

.compare-page .table td {
border: 1px solid #ddd;
vertical-align: middle;
}

.compare-page .table .remove-compare {
border: 0;
cursor: pointer;
}

.compare-page .table .featured-image {
max-width: 200px;
margin-bottom: 10px;
}

.compare-page .table .product-price.product_price {
margin-bottom: 10px;
display: block;
}

.compare-page .table .available-stock p {
color: #090;
text-transform: uppercase;
}

.compare-page2 .table .remove-compare {
float: right;
width: 100%;
text-align: right;
}

.compare-page2 .table .grid-link__title {
margin-bottom: 10px;
}

/* Wishlist -------------------------------*/
.wishlist-table .table-bordered,
.wishlist-table .table-bordered td,
.wishlist-table .table-bordered th {
vertical-align: middle;
white-space: nowrap;
}

.wishlist-table .table-bordered th {
text-transform: uppercase;
}

.wishlist-table .product-thumbnail img {
max-width: 100px;
}

.wishlist-table .product-subtotal .btn {
white-space: nowrap;
}

/* End Wishlist --------------------------*/

/* Checkout Page ------------------------------------------------*/
.customer-box h3 {
color: #161616;
font-size: 12px;

line-height: normal;
margin: 0;
padding: 15px;
text-transform: uppercase;
background-color: #f1f1f1;
}

.customer-box h3 i {
margin-right: 5px;
}

.customer-box h3 a {

text-decoration: none;
}

.billing-fields {
margin-bottom: 30px;
}

.order-table .table thead th {
background-color: #fff;
font-size: 13px;
padding: 8px 5px 5px;
border-bottom: 1px solid #ddd;
}

.order-table .table td {
font-size: 13px;
padding: 8px 5px 5px;
}

.card {
border-radius: 0;
margin-bottom: 10px;
}

.card-header {
position: relative;
padding: 6px 15px;
}

.card-header:before {
content: "\f078";
font-family: "FontAwesome";
font-size: 13px;
position: absolute;
right: 10px;
top: 9px;
color: #555;
}

.payment-accordion .card .card-header {
background-color: #fff;
}

.payment-accordion .card .card-header a {
display: block;
font-size: 16px;

text-transform: uppercase;
}

.order-button-payment .btn {
font-size: 14px;
display: flex;
align-items: center;
justify-content: center;
gap: 10px;
padding: 8px 16px;
background: var(--themecolor);;
}
.customer-box .discount-coupon,
.customer-box .customer-info {
background-color: #fbfbfb;
}

.create-ac-content,
.your-order-payment {
border: 1px solid #ddd;
padding: 20px;
}

.create-ac-content .form-check {
margin-left: 15px;
}

.customer-box input[type="email"],
.customer-box input[type="text"],
.customer-box input[type="password"] {
background-color: #fff;
}

.order-button-payment {
margin-top: 30px;
}

/* End Checkout Page ------------------------------------------*/

/*Collection Page ---------------------------------------------*/
.collection-box .colletion-item {
position: relative;
overflow: hidden;
margin-bottom: 30px;
}

.collection-box a {
display: block;
}

.collection-box a img {
display: block;
transition: transform 0.5s ease;
-webkit-transition: transform 0.5s ease;
-ms-transition: transform 0.5s ease;
}

.collection-box .colletion-item:hover img {
transform: scale(1.1);
-webkit-transform: scale(1.1);
-ms-transform: scale(1.1);
}

.collection-box .title {
font-size: 14px;
text-align: center;
position: absolute;
bottom: 45px;
left: 0;
right: 0;
}

.collection-box .title span {
display: inline-block;
margin: 0 auto;
text-transform: uppercase;
background-color: #ffffff;
padding: 5px 10px;
}

/* End Collection Page ---------------------------------------*/

/*======================================================================
24. Cart Pages
========================================================================*/
.cart__row {
position: relative;
}

.cart th {

padding: 10px 0 8px;
background: #f2f2f2;
text-transform: uppercase;
padding-left: 15px;
padding-right: 15px;
letter-spacing: 1px;
}

.cart td {
padding: 10px;
}

.cart .cart__meta {
padding-right: 15px;
}

.cart th.cart__meta,
.cart td.cart__meta {
text-align: left;
}

.cart__image-wrapper a {
display: block;
}
#mycartpagediv .table td, .table th {
padding: 0.75rem;
width:200px;
vertical-align: middle;
border-top: 1px solid #dee2e6;
}
.cart .list-view-item__title {
color: #353333;
font-size: 1.15385em;
text-align:center
}

.cart__image-wrapper img{
width: 40px;
}

.cart .qtyField a {
height: 36px;
line-height: 34px;
padding: 0;
}

.cart .qtyField .cart__qty-input {
height: 36px;
width: 40px;
float: left;
}

.cart .qtyField a .icon {
line-height: 33px;
font-size: 10px;
}

.cart .cart__remove {
border: 0;
margin-top: 4px;
font-size: 14px;
padding: 0;
height: 25px;
width: 25px;
text-align: center;
vertical-align: middle;
line-height: 25px;
}

.cart .cart__remove .icon {
line-height: 24px;
}

.cart table tfoot .icon {
vertical-align: middle;
}

.style2 .cart__footer .cart-note {
margin-bottom: 30px;
}

.cart__footer .solid-border {
border: 1px solid #e8e9eb;
padding: 20px;
margin-bottom: 20px;
}

.cart__footer h5,
.cart__footer .h5,
.cart__footer h5 label,
.cart__footer .h5 label,
.cart__footer .cart__subtotal-title {
color: #353333;
text-transform: uppercase;
font-size: 14px;

letter-spacing: 0.02em;
}

.cart-note__input {
min-height: 50px;
width: 100%;
height: 178px;
}

.cart-note__label,
.cart-note__input {
display: block;
}

.cart__subtotal {

padding-left: 15px;
display: inline-block;
}

.cart__shipping {
font-style: italic;
font-size: 13px;
padding: 12px 0;
}

.cart_tearm label {
cursor: pointer;
}

input.checkbox {
height: auto;
vertical-align: middle;
padding: 0;
box-shadow: none;
}

#cartCheckout {
width: 100%;
padding: 15px;
}

.cart-variant1 .cart .cart__price-wrapper {
text-align: center;
}

.cart-variant1 .cart table {
border: 1px solid #f2f2f2;
}

.cart-variant1 .cart table td {
border: 1px solid #f2f2f2;
}

.cart-variant1 .cart th.text-right,
.cart-variant1 .cart .text-right.cart-price {
text-align: center !important;
}

.cart__meta-text {
color: #a2a2a2;
font-size: 12px;
}

/*======================================================================
25. Quick View
========================================================================*/
#content_quickview.modal {
top: 8%;
}

#content_quickview .modal-dialog {
max-width: 800px;
background-color: #fff;
padding: 25px;
}

#content_quickview .modal-body {
border: 0;
padding: 0;
}

#content_quickview .modal-content {
border: 0;
}

#content_quickview .model-close-btn {
width: 30px;
height: 30px;
line-height: 32px;
position: absolute;
top: -23px;
right: -20px;
cursor: pointer;
text-align: center;
}

.modal-open {
padding-right: 0 !important;
}

.modal-open .modal {
padding-right: 0 !important;
overflow: hidden;
}

/*======================================================================
26. Promotional Top Popup
========================================================================*/
.notification-bar {
text-align: center;
position: relative;
z-index: 5;
background-color: #1f2612;
}

.notification-bar__message {
color: #fff;
letter-spacing: 1px;
text-transform: uppercase;
font-size: 12px;
padding: 10px 30px;
display: block;
}

.notification-bar__message:hover,
.notification-bar__message:active,
.notification-bar__message:focus,
.notification-bar__message:focus-within {
color: #fff;
text-decoration: none;
}

.close-announcement {
cursor: pointer;
font-size: 15px;

position: absolute;
right: 40px;
top: 8px;
height: 25px;
width: 25px;
line-height: 22px;
color: #fff;
}

/*======================================================================
27. Image Banners
========================================================================*/
.section.imgBanners {
padding-top: 8px;
padding-bottom: 20px;
}

.imgBnrOuter .inner img {
display: block;
width: 100%;
}

.imgBnrOuter .inner * {
-ms-transition: all 0.4s ease-in-out;
-webkit-transition: all 0.4s ease-in-out;
transition: all 0.4s ease-in-out;
}

.imgBnrOuter .inner a,
.imgBnrOuter .inner a:hover {
opacity: 1;
}

.imgBnrOuter .inner .ttl {
line-height: 25px;
font-size: 17px;
display: inline-block;
padding: 10px 20px;
max-width: 80%;
position: absolute;
background-color: rgba(255, 255, 255, 0.8);
}

.imgBnrOuter .inner:hover .ttl {
background-color: #fff;
}

.imgBnrOuter .inner .ttl h3 {


font-size: 21px;
}

.imgBnrOuter .inner .ttl h5 {


font-size: 16px;
}

.imgBnrOuter .inner.center .ttl {
left: 50%;
top: 50%;
-ms-transform: translate(-50%, -50%);
-webkit-transform: translate(-50%, -50%);
transform: translate(-50%, -50%);
}

.imgBnrOuter .inner.btmright .ttl {
right: 20px;
bottom: 20px;
text-align: right;
}

.imgBnrOuter .inner.topleft .ttl {
left: 20px;
top: 20px;
text-align: left;
}

.imgBnrOuter .inner.topright .ttl {
right: 20px;
top: 20px;
text-align: right;
}

.imgBnrOuter .inner {
position: relative;
overflow: hidden;
}

.imgBnrOuter .inner:hover img {
-ms-transform: scale(1.1);
-webkit-transform: scale(1.1);
transform: scale(1.1);
}

.imgBnrOuter .inner.btmleft .ttl {
left: 20px;
bottom: 20px;
text-align: left;
}

.imgBnrOuter .img-bnr {
text-align: center;
padding: 10px;
}

.custom-content-style1 .mb-4 {
margin-bottom: 30px !important;
}

.custom-content-style1 .h3 {
font-size: 16px;
line-height: normal;
line-height: 24px;
text-transform: uppercase;
}

/*======================================================================
28. Homepages Demo
========================================================================*/
/*---------------------------------------
28.1 Home2 Default -------------------
---------------------------------------*/

.home2-default .top-header .user-menu .anm {
color: #353333;
}

.home2-default .top-header p,
.home2-default .top-header a,
.home2-default .top-header select,
.home2-default .top-header .ad,
.home2-default .top-header span.selected-currency,
.home2-default .top-header .language-dd {
color: #fff;
}

.home2-default .slideshow .slideshow__title {
color: #353333;
font-size: 55px;


text-transform: none;
}
.home2-default .section-header .h2 span{
color: #fd7d16;
}
.home2-default .slideshow .slideshow__subtitle {
color: #353333;
font-size: 26px;
text-transform: none;
line-height: 1.2;
text-shadow: 1px 1px 4px rgba(0, 0, 0, 0);
}

.home2-default .section-header h2,
.home2-default .section-header .h2 {

font-size: 2.1em;
text-transform: none;
letter-spacing: 0.03em;
}

.home2-default .hero--large {
background-attachment: fixed;
}

.home2-default .grid-products .slick-arrow {
margin-top: -30px;
}

.home-lookbook img {
width: 100%;
}

.footer-3 .footer-top {
padding: 40px 0 30px;
}

@media only screen and (min-width: 1199px) {
.footer-3 .col-md-3.col-lg-3 {
-ms-flex: 0 0 20%;
flex: 0 0 20%;
max-width: 20%;
}
}

.footer-3 .footer-newsletter .newsletter__input {
background-color: #fff;
margin-bottom: 10px;
}

.footer-3 hr {
border-color: #454545;
}

/*======================================================================
29. Testimonial Slider
========================================================================*/
.quote-wraper {
background: #f9f9f9;
padding: 40px;
}

.quotes-slider blockquote {
border: 0;
max-width: 700px;
margin: 0 auto;
line-height: 26px;
}

.quotes-slider__text {
font-size: 1.13462em;

font-style: normal;
padding: 0 15px;
}

.quotes-slider .authour {

letter-spacing: 1px;
text-transform: uppercase;
color: #353333;
line-height: 18px;
}

.quotes-slider__text p {
margin-bottom: 30px;
}

.quotes-slider .slick-arrow {
opacity: 0;
visibility: hidden;
-ms-transition: all 0.5s ease-in-out;
-webkit-transition: all 0.5s ease-in-out;
transition: all 0.5s ease-in-out;
}

.quotes-slider:hover .slick-arrow {
opacity: 1;
visibility: visible;
}

.quotes-slider .slick-prev {
left: 0;
}

.quotes-slider .slick-next {
right: 0;
}

/*======================================================================
30. Instagram Feed
========================================================================*/
.instagram-feed-section:before,
.instagram-feed-section:after {
content: "";
clear: both;
display: block;
}

#instafeed .insta-img {
display: inline-block;
padding: 2px;
float: left;
}

#instafeed.imlow_resolution .insta-img {
width: 25%;
}

/*======================================================================
31. Hero Banners
========================================================================*/
.hero {
position: relative;
height: 475px;
display: table;
width: 100%;
background-size: cover;
background-repeat: no-repeat;
background-position: 50% 50%;
background-attachment: scroll;
}

.hero__inner {
position: relative;
display: table-cell;
vertical-align: middle;
padding: 35px 0;
color: #353333;
z-index: 2;
text-align: center;
}

.hero[data-stellar-background-ratio] {
background-attachment: fixed;
}

.hero .text-small .mega-title {
font-size: 25px;


}

.hero .text-small .mega-subtitle {
font-size: 16px;
margin-bottom: 25px;
}

@media only screen and (min-width: 990px) {

.your-class .owl-carousel.owl-drag .owl-item{
height: 80px;
}
.hero__inner .wrap-text {
max-width: 500px;
}
}

.hero--large {
height: 150px;
}

.hero .text-large .mega-title {
font-size: 45px;
}

.hero__inner .center {
text-align: center;
margin: 0 auto;
}

.hero .text-large .mega-subtitle {
font-size: 20px;
}

.hero .mega-subtitle {
margin-bottom: 25px;
}

.hero .font-bold .mega-title {}

.hero__inner .right {
float: right;
text-align: center;
}

.hero .text-medium .mega-title {
font-size: 35px;
}

.hero .text-medium .mega-subtitle {
font-size: 18px;
}

/*======================================================================
32. Newsletter Cookie Popup
========================================================================*/
#modalOverly {
height: auto !important;
position: fixed;
bottom: 0;
left: 0;
right: 0;
top: 0;
z-index: 10;
background-color: rgba(0, 0, 0, 0.7);
-ms-transition: all 0.45s cubic-bezier(0.29, 0.63, 0.44, 1);
-webkit-transition: all 0.45s cubic-bezier(0.29, 0.63, 0.44, 1);
transition: all 0.45s cubic-bezier(0.29, 0.63, 0.44, 1);
}

#popup-container {
display: none;
max-width: 700px;
position: fixed;
left: 0;
right: 0;
top: 50%;
background: #fafafa;
margin: 20px auto;
z-index: 444;
-ms-transform: translateY(-50%);
-webkit-transform: translateY(-50%);
transform: translateY(-50%);
}

#popup-window {
position: relative;
}

#popup-container .row-cell.first {
width: 65%;
text-align: center;
}

#popup-container .row-cell.last {
width: 35%;
text-align: right;
}

#popup-container .closepopup {
display: block;
color: #fff;
font-size: 11px;
height: 30px;
line-height: 19px;
padding: 5px;
position: absolute;
right: -14px;
top: -14px;
width: 30px;
border-radius: 50%;
z-index: 333;
}

#popup-container .closepopup:hover {
opacity: 0.8;
}

#popup-container .width40 {
width: 40%;
}

#popup-container .width60 {
width: 60%;
}

.newsletter-left {
padding: 40px 30px;
}

.newsletter-left h1,
.newsletter-left .h1 {

font-size: 20px;
text-transform: uppercase;
margin: 0 0 15px 0;
letter-spacing: 0.08em;
}

.newsletter-left h2 {
font-size: 20px;
margin: 0 0 15px 0;
letter-spacing: 0.08em;
text-transform: uppercase;
}

.newsletter-left .input-group__field {
border-right: 1px solid #e8e9eb;
}

.newsletter-left .input-group {
display: block;
margin: 0 auto 20px;
position: relative;
width: 100%;
}

.newsletter-left .input-group input {
width: 100%;
margin: 0 0 10px 0;
}

.newsletter-left .social {
margin: 10px 0 0;
}

.newsletter-left .social li {
display: inline-block;
margin: 0 5px;
list-style: none;
}

.newsletter-left .social a {
border-radius: 50%;
color: #141515;
display: inline-block;
font-size: 18px;
height: 30px;
line-height: 20px;
padding: 5px;
text-align: center;
width: 30px;
}

.newsletter-left #Subscribe {
width: 100%;
height: auto;
padding: 12px 20px;
}

/*======================================================================
33. Footer
========================================================================*/
#footer {
margin-top: 35px;
}

.footer-2 .site-footer {
background-color: #fff;
}

.footer-2 .footer-top h4,
.footer-2 .footer-top .h4 {
color: #040404;
font-size: 15px;


margin-bottom: 15px;
}

.footer-2 .footer-top,
.footer-2 .footer-links a,
.footer-2 .footer-top p,
.footer-2 .footer-bottom,
.footer-2 .footer-bottom a {
color: #404831;
}

.footer-2 .site-footer .addressFooter .icon {
color: #020202 !important;
margin-top: 2px;
}

.footer-2 .site-footer hr {
border-color: #e8e8e8;
}



/* Newsletter */
.newsletter-section {
background-color: #f9f9f9;
border: 1px solid #e8e9eb;
padding: 35px 0;
}

.newsletter-section .footer-newsletter {
width: 60%;
}

.newsletter-section .section-header {
margin: 0 20px 0 0;
float: left;
display: inline-block;
}

.newsletter-section .section-header label {

margin-bottom: 0;
color: #353333;
}

.newsletter-section .section-header span {
display: block;
font-size: 13px;
text-align: left;
}

.newsletter-section .input-group {
max-width: 100%;
margin: 0;
width: auto;
position: relative;
display: table;
border-collapse: separate;
}

.newsletter-section .input-group__btn {
white-space: nowrap;
width: 1%;
display: table-cell;
vertical-align: middle;
margin: 0;
}

.newsletter-section .input-group .btn,
.newsletter-section .input-group__field {
height: 40px;
}

.newsletter-section .input-group__field {
background-color: #fff;
}

.newsletter-section .input-group__field,
.newsletter-section .input-group__btn .btn {
border-radius: 0;
}

.newsletter-section .btn {
color: #fff;
background-color: var(--themecolor) !important;
border:1px solid var(--themecolor) !important;
}

.newsletter-section .btn:hover,
.newsletter-section .btn:focus {
background-color: white !important;
border:1px solid var(--themecolor) !important;
color: var(--themecolor);
}

.visually-hidden,
.icon__fallback-text {
position: absolute !important;
overflow: hidden;
clip: rect(0 0 0 0);
height: 1px;
width: 1px;
margin: -1px;
padding: 0;
border: 0;
}

/* End Newsletter */

/* Social Icon */
.site-footer__social-icons li {
padding: 0 10px;
}

.social-icons .icon {
color: #111111;
font-size: 16px;
}

.site-footer__social-icons .icon {
width: 16px;
}

/* End Social Icon */

.site-footer {
background: #141414;
}

.site-footer ul {
list-style: none;
}

.footer-top {
padding: 40px 0 15px;
}

.footer-top h4,
.footer-top .h4 {
color: #ffffff;
font-size: 15px;

margin-bottom: 15px;
}

.footer-links .h4 {
position: relative;
}

.footer-links ul,
.contact-box ul {
margin-bottom: 20px;
}

.footer-links li {
margin-bottom: 10px;
}

.footer-top,
.footer-links a,
.footer-top p,
.footer-bottom {
color: #ffffff;
}

.addressFooter .icon {
color: #ffffff !important;
float: left;
font-size: 14px;
margin-top: 2px;
}

.addressFooter li {
padding-bottom: 30px;
}

.addressFooter li p {
padding-left: 25px;
}

.site-footer hr {
margin: 0;
border-color: #454545;
}

.footer-bottom {
padding: 25px 0;
}

.footer-bottom a {
color: #fff;
}

.footer-bottom a:hover {
text-decoration: underline;
}

.footer-bottom span {
letter-spacing: 1px;
}

.footer-bottom .payment-icons .icon {
font-size: 25px;
}

#site-scroll {
color: #fff;
line-height: 38px;
cursor: pointer;
font-size: 20px;
height: 40px;
right: 30px;
position: fixed;
border-radius: 3px;
text-align: center;
transition: all 0.3s ease 0s;
-moz-transition: all 0.3s ease 0s;
-webkit-transition: all 0.3s ease 0s;
width: 40px;
bottom: 50px;
z-index: 444;
display: none;
background: var(--themecolor) !important;;
}

#site-scroll i {
line-height: 40px;
}

/*---------------------------------------
End Footer ----------------------------
---------------------------------------*/

.blur-up.lazyloaded {
-webkit-filter: blur(0);
filter: blur(0);
}

.blur-up {
-webkit-filter: blur(5px);
filter: blur(5px);
transition: filter 400ms, -webkit-filter 400ms;
-webkit-transition: filter 400ms, -webkit-filter 400ms;
}

@-webkit-keyframes animateHeart {
0% {
-webkit-transform: scale(1);
}

15% {
-webkit-transform: scale(1.25);
}

50% {
-webkit-transform: scale(1);
}

100% {
-webkit-transform: scale(1);
}
}

@keyframes animateHeart {
0% {
transform: scale(1);
}

5% {
transform: scale(1.2);
}

10% {
transform: scale(1.1);
}

15% {
transform: scale(1.25);
}

50% {
transform: scale(1);
}

100% {
transform: scale(1);
}
}

.myaccount-tab-menu {
-webkit-box-orient: vertical;
-webkit-box-direction: normal;
-ms-flex-direction: column;
flex-direction: column;
}

.myaccount-tab-menu a {
border: 1px solid #ccc;
border-bottom: none;
color: #444444;

font-size: 13px;
display: block;
padding: 10px 15px;
text-transform: uppercase;
}

.myaccount-tab-menu a:last-child {
border-bottom: 1px solid #ccc;
}

.myaccount-tab-menu a:hover,
.myaccount-tab-menu a.active {
background-color: #729a1b;
border-color: #729a1b;
color: #ffffff;
}

.myaccount-tab-menu a i.fa {
font-size: 14px;
text-align: center;
width: 25px;
}

@media only screen and (max-width: 680px) {
#tiffin .item-description, #tiffin .item-description p {
width: 100%;
width: 100%;
font-size: .8rem;
line-height: 20px;
white-space: normal;
}

#tiffin .image-button img {
width: 100px;
}

#tiffin .image-container {
min-width: 100px;
}

#tiffin .item-name-text {
font-size: .9rem;
}
}

@media only screen and (max-width: 767px) {
.typeImage{
width:12px
}
.mobfilterdiv{
display:block
}
#tiffin .details-container {
max-width: fit-content;
}
#tiffin .image-button {
width: 100px;
}
#tiffin .item-name-text {
font-size: 1rem;
}

#tiffin .item-description, #tiffin .item-description p {
font-size: .7rem;
line-height: 15px;
white-space: normal;
}
.text-capatalize{
text-transform: capitalize !important;
}
.atech-sticky-navbar.fixed {
display: flex;
position: fixed;
left: 0;
height:45px;
width: 100%;
background-color: #fff;
border-top: 1px solid #e7e7e7;
z-index: 9999999999999;
bottom: 0;
}
.single-input-item label{
text-transform: capitalize !important;
}

.ccols-wrap>*, .has-ccols>* {
max-width: 100%;
flex: 0 0 auto;
width: 25%;
}
.atech-sticky-navbar .atech-icon-bars {
font-size: 22px;
}
.atech-sticky-navbar i {
font-size: 18px;
display: block;
}
.atech-sticky-navbar .wallet-container{
justify-content: center !Important;
}
.atech-sticky-navbar .wallet-link{
margin-right: 0;
}

.atech-sticky-navbar a, .atech-sticky-navbar .label {
color: #222529;text-transform: capitalize;
font-size: 12px;
}.atech-sticky-navbar .sticky-icon+.sticky-icon {
border-left: 1px solid #cdcdcd;
}
.footerIcon{
width: 20px !Important;
}
.atech-sticky-navbar>div {
text-align: center;
margin-top: 10px;
margin-bottom: 0;
}
.bottomfilter {
box-shadow: 0 0 20px #00000021;
}
.dynamiclogin{
position: fixed;
top: 12px;
z-index: 99999999;
right: 10px;
}
.top-header .user-menu .anm {
font-size: 14px;
cursor: pointer;
color: #ffffff !important;
background: #fd7d16;
padding: 8px;
border-radius: 50%;
}
.mobile-logo{
display:flex !Important;
justify-content:center !Important
}
.mobile-logo img{
width: 120px;
float: right;
display: flex;
align-items: center;
text-align: center;
padding: 10px;
}
.mobile-logo .logo{padding:0;margin:0}

.grid-products .item .product-name a{
font-size: 1em;
}.grid-products .item .product-price {
margin: 0;
font-size: .7rem; display: flex;
flex-wrap: wrap;
}

.grid-products .item .product-image{
height: 100px;
overflow: hidden;
}
.coupon-card h3 {
font-size: 18px !important;
font-weight: 400 !important;
line-height: 20px !important;
}
.header-wrap {

background: white;
-webkit-animation-name: fadeInDown;
animation-name: fadeInDown;
position: sticky;
top: 0;
z-index:9999 !Important
}
.header-wrap {
color: white;
display: flex;
justify-content: center;
align-items: center;
border-bottom: 2px solid transparent;
transition: all 0.3s ease-in-out;
}

/* Styles for the fixed header */
.header-fixed {
position: fixed;
top: 0;
width: 100%;
background-color: #333;
border-bottom: 2px solid #ff6f61; /* Change border color when fixed */
animation: slide-down 0.3s ease-in-out;
}

/* Add animation keyframes */
@keyframes slide-down {
0% {
transform: translateY(-100%);
}
100% {
transform: translateY(0);
}
}
#myaccountContent {
margin-top: 30px;
}
}

.myaccount-content {
border: 1px solid #eeeeee;
background: #fcfff5;
padding: 30px;
}

@media only screen and (max-width: 575px) {
.myaccount-content {
padding: 20px 15px;
}
}

.myaccount-content form {
margin-top: -20px;
}

.myaccount-content h3 {
font-size: 22px;
border-bottom: 1px dashed #ccc;
padding-bottom: 10px;
margin-bottom: 25px;

}

.myaccount-content .welcome a {
color: #444444;
}

.myaccount-content .welcome a:hover {
color: #729a1b;
}

.myaccount-content .welcome strong {

color: #729a1b;
}

.myaccount-content fieldset {
margin-top: 20px;
}

.myaccount-content fieldset legend {
color: #444444;
font-size: 16px;
margin-top: 20px;

padding-bottom: 20px;
border-bottom: 1px solid #ccc;
}

.myaccount-table {
white-space: nowrap;
font-size: 14px;
}

.myaccount-table table th,
.myaccount-table .table th {
color: #444444;
padding: 10px;

background-color: #f8f8f8;
border-color: #ccc;
border-bottom: 0;
}

.myaccount-table table td,
.myaccount-table .table td {
padding: 10px;
vertical-align: middle;
border-color: #ccc;
}

.saved-message {
background-color: #f4f5f7;
border-top: 3px solid #729a1b;
-webkit-border-radius: 5px 5px 0 0;
-moz-border-radius: 5px 5px 0 0;
border-radius: 5px 5px 0 0;

font-size: 14px;
color: #444444;
padding: 20px;
}

.err_msg {
color: orangered;
}

.success_msg {
color: green;
}

#regsuccess {
font-size: 14px;
background: #28a745 !important;
margin-top: 10px;
border-radius: 5px;
color: white;
padding: 5px;
}

#loginfirsthtml {
color: #ff661b;
float: right;
margin-top: 8px;
}

.checkerr {
background: #fb6a6a;
margin-top: 10px;
padding: 6px;
color: white;
}

<!-- //Responsive  -->

@media only screen and (max-width: 1450px) {
.slideshow .slideshow__title { font-size:55px; }
.home2-default .slideshow .slideshow__title { font-size:50px; }
.home2-default .slideshow .slideshow__subtitle { font-size:22px; }
.slideshow__text-content.bottom { bottom:2%; }

.collection-hero__image { height:150px; }

.home5-cosmetic .slideshow .slideshow__title { font-size:53px; }
.home5-cosmetic .slideshow .slideshow__subtitle { font-size:20px; }
}

@media only screen and (max-width: 1199px) {
.container-fluid, .home3-boxed-layout .container-fluid { padding:0 30px; }

#siteNav > li .megamenu.style4 { background-image:none !important; padding-right:0 !important; }
#siteNav > li > a { padding:0 8px; }

.lookbook.grid { margin-left:0; }

.home2-default .slideshow .slideshow__title { font-size:40px; }
.home2-default .slideshow .slideshow__subtitle { font-size:18px; }

.home3-boxed-layout .slideshow .slideshow__title { font-size:32px; }
.home3-boxed-layout .slideshow .slideshow__subtitle { font-size:18px; }

.home4-fullwidth .slideshow--medium { height:450px; background-color:#eee; }
.home4-fullwidth .slideshow__text-content { margin-top:100px; }
.home4-fullwidth .slideshow .slideshow__title { font-size:65px; }
.home4-fullwidth .slideshow .slideshow__subtitle { font-size:16px; }

.home5-cosmetic .slideshow .slideshow__title { font-size:43px; }
.home5-cosmetic .slideshow .slideshow__subtitle { font-size:18px; }

.home11-grid .slideshow .wrap-caption { max-width:520px; }
.home11-grid .slideshow .slideshow__title { font-size:55px; }
}


@media only screen and (max-width: 1024px) {
.grid-view-item.style2 .hoverDetails.mobile { display:block; position:relative; transform:none; -webkit-transform:none; left:0; top:auto; margin:15px 0 0; opacity:1; visibility:visible }

.logo-bar .slick-prev { left:0; }
.logo-bar .slick-next { right:0; }

.collection-box .slick-arrow,
.collection-box:hover .slick-arrow,
.productSlider .slick-arrow, .productPageSlider .slick-arrow, .productSlider-style1 .slick-arrow, .productSlider-style2 .slick-arrow,
.productSlider-fullwidth .slick-arrow { opacity:1; visibility:visible; margin:0; }
.productSlider .slick-next, .collection-box .collection-grid .slick-next, .productPageSlider .slick-next { right:10px; }
.productSlider .slick-prev, .collection-box .collection-grid .slick-prev, .productPageSlider .slick-prev { left:10px; }

.button-set { opacity:1; top:5px; }
.variants.add { bottom:0px; margin-top:10px; position:absolute; left:0; right:0; }
.variants.add .btn { padding:5px 12px; font-size:10px; background-color:#fbfbfb; }

.saleTime.desktop { display:none; }
.timermobile { display:block; }
.timermobile .saleTime { display:block; position:relative; margin-top:20px; }
.grid-products .item:hover .timermobile .saleTime { display:block; }

.button-style2 .variants.add button { font-size:13px; padding:0; }
.button-style2, .button-style2 .variants.add { margin-top:0; }
.button-style2 i { vertical-align:middle; }

.home4-fullwidth .grid-products-hover-btn .variants.add .btn { color:#ffffff; background-color:#000000; }
.home4-fullwidth .grid-products-hover-btn a.quick-view, .home4-fullwidth .grid-products-hover-btn a.wishlist,
.home4-fullwidth .grid-products-hover-btn .cartIcon, .home4-fullwidth .grid-products-hover-btn .add-to-compare { font-size:14px; }

.productSlider .slick-prev, .productPageSlider .slick-prev, .productSlider-style1 .slick-prev,
.productSlider-style2 .slick-prev, .productSlider-fullwidth .slick-prev { left:-10px; }
.productSlider .slick-next, .productPageSlider .slick-next, .productSlider-style1 .slick-next,
.productSlider-style2 .slick-next, .productSlider-fullwidth .slick-next { right:-10px; }

.home8-jewellery .slideshow .slideshow__title { font-size:26px; }
.home8-jewellery .slideshow .slideshow__subtitle { font-size:13px; }

.home11-grid .slideshow .slideshow__title { font-size:40px; }

}
.carousel-indicators>li {
width: 10px !important;
height: 10px !important;
}
@media only screen and (max-width: 991px) {
html { overflow-x:hidden }
.site-header__logo.mobileview { display:block; }

.mobile-logo { text-align:center; }

.top-header .customer-links { display:none; position:absolute; right:0; top:29px; z-index:222; margin:0; width:140px; background:#fff; box-shadow:1px 1px 3px rgba(0,0,0,0.2); -webkit-box-shadow:1px 1px 3px rgba(0,0,0,0.2); z-index:9999999 }
.top-header .customer-links li { display:block; text-align:left; margin:0; padding:0; border-bottom:1px solid #ddd; }
.top-header .customer-links li a { color:#555; padding:10px; display:block; }
.top-header .customer-links li a:hover { opacity:0.7; }


#siteNav { display:none; }
.header-content-wrapper .btn--link { border:0; }
.header-content-wrapper .btn--link .anm { font-size:17px; }

.pageWrapper { position:relative; left:0; -ms-transition:all 0.4s ease-in-out; -webkit-transition:all 0.4s ease-in-out; transition:all 0.4s ease-in-out; }
.mobile-nav-wrapper { display:block; }
body.menuOn .pageWrapper { left:270px }
#pageWrapper { position:relative; left:0; -ms-transition:all 0.4s ease-in-out; -webkit-transition: all 0.4s ease-in-out; transition: all 0.4s ease-in-out; }
.js-mobile-nav-toggle .anm { display:none; color:#000; }
.site-header__menu { border:0; padding:0; font-size:17px; display:block; cursor:pointer; }
.js-mobile-nav-toggle.mobile-nav--open .anm-bars-r,
.js-mobile-nav-toggle.mobile-nav--close .icon.anm.anm-times-l { display:inline-block; }
#MobileNav { height:100%; overflow:auto; list-style:none; padding:0; margin:0; }
.mobile-nav-wrapper .closemobileMenu { color: #fff;
font-size: 13px;
padding: 8px 10px;
background-color: var(--themecolor);
cursor: pointer; }
.mobile-nav-wrapper .closemobileMenu .anm { font-size:13px; padding:2px; float:right; }
.mobile-nav-wrapper { width:270px; height:100%;position:fixed; left:-270px; top:0; z-index:999; background-color:var(--mobilenav) !important;; box-shadow:0 0 5px rgba(0,0,0,0.3); opacity:0; visibility:hidden;-ms-transition:all 0.4s ease-in-out; -webkit-transition:all 0.4s ease-in-out; transition:all 0.4s ease-in-out; }
.mobile-nav-wrapper.active { left:0; opacity:1; visibility:visible; }
#MobileNav li { border-top:1px solid; position:relative }
#MobileNav li.grid__item {float:none;padding:0 }
#MobileNav li a { color:var(--mobilenavtxt); font-size:14px; text-decoration:none; display:block; padding:10px 45px 10px 10px; opacity:1; -webkit-font-smoothing:antialiased; font-weight:400; letter-spacing:0.05em; text-transform:uppercase; position:relative }
#MobileNav li a .anm { color:var(--mobilenavtxt); font-size:11px; display:block; width:40px; height:40px; line-height:40px; position:absolute; right:0; top:0; text-align:center }
#MobileNav li a .lbl { color:var(--mobilenavtxt); font-size:10px; font-weight:400; letter-spacing:0; line-height:1; text-transform:uppercase; display:inline-block; padding:2px 4px; border-radius:3px; background-color:#f00; box-shadow:0 0 3px rgba(0,0,0,0.3); position:relative; vertical-align:middle }
#MobileNav li a .lbl:after { content:" "; display:block; width:0; height:0; position:absolute; bottom:3px; left:-7px; border:4px solid transparent; border-right-color:#f00 }
#MobileNav li a .lbl.nm_label1 { background-color:#01bad4 }
#MobileNav li a .lbl.nm_label1:after { border-right-color:#01bad4 }
#MobileNav li a .lbl.nm_label2 { background-color:#f54337 }
#MobileNav li a .lbl.nm_label2:after { border-right-color:#f54337 }
#MobileNav li a .lbl.nm_label3 { background-color:#fb6c3e }
#MobileNav li a .lbl.nm_label3:after { border-right-color:#fb6c3e }
#MobileNav li a .lbl.nm_label4 {background-color:#d0a306 }
#MobileNav li a .lbl.nm_label4:after { border-right-color:#d0a306 }
#MobileNav li a .lbl.nm_label5 { background-color:#af4de2 }
#MobileNav li a .lbl.nm_label5:after { border-right-color:#af4de2 }
#MobileNav li ul { display:none; background-color:var(--mobilenavlight) !important; list-style:none; padding:0; margin:0; }
#MobileNav li li a { padding-left:20px }
#MobileNav li li li a { padding-left:30px; }
#MobileNav li li li li a { padding-left:40px; }
#MobileNav li:hover{
background:var(--mobilenav);
transition: all .4s ease }
.slideshow .wrap-caption { padding:20px; }
.slideshow .slideshow__title { font-size:40px; }
.slideshow__text-content.bottom { bottom:1%; }
.home2-default .slideshow .slideshow__title { font-size:35px; }

.newsletter-section .justify-content-end { -webkit-flex-pack:center !important; -ms-flex-pack:center !important; justify-content:center !important; }
.footer-social { margin-top:30px; }

.template-collection .collection-header { margin-bottom:5px; }

.product-details-img { margin-bottom:20px; }
h1.product-single__title, .product-single__title.h1 { font-size:16px; }
.template-product .tabs-listing .product-tabs a { padding:10px 0 }

.left-content-product { width:100%; padding-right:0; }
.sidebar-product { width:100%; padding-left:0; }
.sidebar-product .related-product .grid__item { width:50%; }
.sidebar-product .related-product .grid__item:nth-child(2n+1) { clear:left; }
.sidebar-product .sub-heading { max-width:100%; }
.prSidebar .col-12 { padding-left:0; padding-right:0; }

.latest-blog .wrap-blog .article__grid-image, .latest-blog .wrap-blog .article__grid-meta { vertical-align:top; }
.latest-blog .wrap-blog .wrap-blog-inner { padding:0 20px; margin-left:0; }

.home15-funiture-header .site-header__search { float:right; }
.home15-funiture-header { padding-bottom:0; }

.image-banner-1 { padding-left:15px !important; margin-bottom:30px; }
.image-banner-2 { padding-right:15px !important; }
.image-banner-2 .mt-4 { margin-top:30px !important; }

.img-grid-banner2 .col-12 { padding-right:15px !important; padding-left:15px !important; }

.home3-boxed-layout .slideshow .slideshow__title { font-size:26px; }
.home3-boxed-layout .slideshow .slideshow__subtitle { font-size:16px; }

.home4-fullwidth .slideshow .slideshow__title { font-size:55px; }
.home4-fullwidth .slideshow .slideshow__subtitle { font-size:15px; }

.hero .text-large .mega-title { font-size:35px; }
.hero .text-large .mega-subtitle { font-size:18px; }

.home7-shoes .slideshow__text-content { margin-top:10px; }
.home7-shoes .slideshow .slideshow__title { font-size:20px; }
.home7-shoes .slideshow .slideshow__subtitle { font-size:16px; }

.home8-jewellery-header .site-header__search { float:right; }
.home8-jewellery .grid-products .slick-arrow { margin-top:-40px; }
.home8-jewellery .hero { margin:10px 0 20px; }

.hero { height:400px; }
.hero__inner .right { float:none; }
.hero .text-medium .mega-title { font-size:25px; }
.hero .text-medium .mega-subtitle { font-size:15px; }

.home9-parallax .js-mobile-nav-toggle .anm { color:#fff; }

.home10-minimal .imgBnrOuter .inner .ttl { font-size:14px; padding:5px 10px; line-height:normal; }

.home11-grid .slideshow .slideshow__subtitle { font-size:16px; }
.home11-grid .slideshow .slick-prev, .home11-grid .slideshow .slick-next { top:50%; }

.home12-category .slideshow .slideshow__title { font-size:35px; }
.home12-category .slideshow .slideshow__subtitle { font-size:16px; }

.home13-auto-parts .slideshow .slideshow__title { font-size:26px; }

.featured-content .list-items { margin-left:0; margin-right:0; }

.home14-bags .imgBnrOuter .custom-text .h3 { font-size:18px; }

.product-labels.rounded .lbl { height:35px; width:35px; font-size:10px; }

.feature-row__text .row-text { padding: 20px; }
}

@media only screen and (min-width: 767px) {


.home6-modern #page-content { padding-top:13px; }

.prstyle2 .prFeatures { float:left; width:100%; padding-top:30px; }
.prstyle2 .prFeatures img { max-width:40px; }
.prstyle2 .prFeatures .details { margin-left:55px; }
.prstyle3 .prFeatures .grid__item { margin-bottom:30px }
.prstyle3 .prFeatures img { max-width:40px }
.prstyle3 .prFeatures .details { margin-left:50px }
}

@media only screen and (max-width: 767px) {
.filters-toolbar__product-count {
font-size: 1rem;
}
.site-header__search .search-trigger{
padding-right: 0;
padding:0 !Important
}
.navcartitem{
display: flex;
justify-content: end;
gap: 10px;
align-items:center;
flex-direction: row-reverse;
}
h1, .h1 { font-size:1.69231em }
h2, .h2 { font-size:1.38462em; text-transform:uppercase; letter-spacing:0.03em }
h3, .h3 { font-size:1.15385em; text-transform:uppercase }

.mobile-hide { display:none; }
.container, .home3-boxed-layout .container-fluid { padding-left:15px; padding-right:15px; }

.template-index-belle .home-slideshow { padding-top:55px; }

.pb-section { padding-bottom:15px; }
.section { padding-top:20px; padding-bottom:20px; }

.slideshow .slideshow__title { font-size:30px; }
.slideshow .slideshow__subtitle { font-size:14px; }
.home2-default .home-slideshow { padding-top:0; }
.home2-default .slideshow .slideshow__title { font-size:26px; }
.home2-default .slideshow .slideshow__text-content.middle { top:25%; }
.home2-default .slideshow .slick-prev, .home2-default .slideshow .slick-next { top:50%; }
.slideshow__text-content.bottom { bottom:0; }
.slideshow .slick-prev, .slideshow .slick-next { top:60%; }
.slideshow .slick-prev, .slideshow .slick-next { width:30px; height:30px; }
.slideshow .slick-prev::before, .slideshow .slick-next::before { font-size:13px; line-height:18px; }

.tab-slider-product .tab_drawer_heading { display:block; }

.tab-slider-product .tabs > li { margin:0 10px; }
.grid-products .slick-arrow { margin-top:-80px; }
.grid-products.productSlider .slick-arrow { margin-top:-40px; }
.collection-box:hover .slick-arrow { margin:0; }

.latest-blog .wrap-blog { margin-bottom:20px; }
.latest-blog .wrap-blog .wrap-blog-inner { margin-left:0; padding:0 20px; }

.store-info li { width:50%; display:block; float:left; padding-bottom:15px; }
.store-info li:nth-child(3) { border-left:0; }
.store-info li .icon { margin:0 0 8px 0; font-size:25px; }

.button-set i, .grid-view-item.style2 .button-set i { line-height:26px; }
.grid-view-item.style2 .button-set > form button, a.quick-view, a.wishlist, .cartIcon, .add-to-compare { width:26px; height:26px; line-height:26px; }

h2, .h2, .home2-default .section-header h2, .home2-default .section-header .h2 { font-size:18px; }

.footer-links .h4 { cursor:pointer; border-bottom:solid 1px #454545; padding-bottom:20px; }
.footer-links .h4:after { content: "\e64b"; font-family:'themify'; font-size:10px; display:block; position:absolute; right:10px; top:5px; }
.footer-links .h4.active:after { content: "\e648"; }
.footer-links ul { display:none; }

.footer-bottom .text-md-center { text-align:center !important; margin-bottom:10px; }

.collection-hero h1.collection-hero__title, .collection-hero .collection-hero__title.h1 { font-size:18px; }

.filterbar { padding:20px; opacity:0; visibility:hidden; width:240px; height:100%; overflow:auto; background-color:#fff; box-shadow:0 0 5px rgba(0,0,0,0.3); position:fixed; top:0; z-index:9999;
left:-240px; -ms-transition:0.5s; -webkit-transition:0.5s; transition:0.5s; }
.btn-filter { margin-bottom:20px; width:100%; }
.filterbar .sidebar_widget:not(.filterBox), .filterbar .static-banner-block { display:none; }
.filterbar.active { left:0; opacity:1; visibility:visible; }
.filterbar.active .closeFilter { float:right; padding:2px 7px; margin:-5px -8px 0 0; cursor:pointer; }

.list-view-item__image-column { width:85px; }

.product-template__container .shareRow .medium-up--one-third { width:100%; }
.product-template__container .shareRow .display-table-cell { display:block; text-align:left !important; }
.prstyle2 .prFeatures, .prstyle3 .prFeatures { padding-left:20px }

.product-right-sidebar .product-details-img { width:100%; float:left; padding-right:0; margin-bottom:20px; }
.product-right-sidebar .product-information { width:100%; float:left; padding-left:0; }
.selector-wrapper.product-form__item { -webkit-flex:1 1 100%; -moz-flex:1 1 100%; -ms-flex:1 1 100%; flex:1 1 100%; }

.password-table .password-cell { display:none; }
.password-table .password-cell + .password-cell { display:table; width:100%; }

.template-blog .sidebar { margin-top:30px; }
.template-blog .mini-list-item .mini-view_image { width:80px; }
.template-blog .mini-list-item .details { margin-left:0; }

.cart thead, .cart-price, .cart .cart__update-wrapper { padding-top:0; padding-bottom:15px; }
.cart .small--hide { display:none; }
.cart tr, .cart tbody { width:100%; display:table; }
.cart tbody { display:block; }
.cart-flex { display:block; width:100%; }
.cart-flex-item { display:table-cell; min-width:0; }
.cart__price-wrapper { text-align:right; }

#content_quickview.modal { overflow:auto; }

#popup-container { margin:20px; }
#popup-container .width40 { display:none; }
#popup-container .width60 { width:100%; }

.hero--large { height:488px; }
.hero { background-position:50% 50% !important; background-attachment:scroll !important; }

.footer-3 .footer-links .h4, .home4-fullwidth .footer-links .h4 { border-bottom-color:#454545; }
.home11-grid .footer-3 .footer-links .h4, .home11-grid .home4-fullwidth .footer-links .h4 { border-bottom-color:#4da4a4; }

.home2-default .footer-links .h4 { border-color:#e8e8e8; }

.layout-boxed { padding:0 20px; }
.layout-boxed .imgBanners { display:none; }
.feature-row__text .row-text { margin-left:0; padding:10px 0; }
.feature-row__text .row-text { margin-right:0; }
.layout-boxed .grid-products .slick-arrow { margin-top:0; }
.featured-column .text-center { margin-bottom:30px; }
.feature-row { -webkit-flex-direction:column; -moz-flex-direction:column; -ms-flex-direction:column; flex-direction:column; }
.feature-row__item { -webkit-flex:1 1 auto; -moz-flex:1 1 auto; -ms-flex:1 1 auto; flex:1 1 auto; max-width:100%; width:auto; padding:0; }
.feature-row__text { order:2; padding-bottom:0; padding:0; }
.feature-row .feature-row__item { width:100% !important; }
.feature-row .feature-row__item img { width:100%; margin-bottom:20px; }

.layout-boxed .slideshow__text-content { text-align:left; }

.home4-fullwidth .slideshow--medium { height:350px; background-color:#eee; }
.home4-fullwidth .slideshow__text-content { margin-top:100px; }
.home4-fullwidth .slideshow .slideshow__title { font-size:34px; }
.home4-fullwidth .slideshow .slideshow__subtitle { font-size:13px; display:block; margin-bottom:10px; }
.home4-fullwidth .slideshow .btn { font-size:12px; padding:5px 10px; display:inline-block; }

.quote-wraper { padding:20px 10px; }
.quote-wraper .quotes-slider blockquote { font-size:13px; line-height:23px; }
.quotes-slider .slick-arrow { opacity:1; visibility:visible; }
.quote-wraper .slick-next { right:-5px; }
.quote-wraper .slick-prev { left:-3px; }

.home4-fullwidth .container-fluid, .collection-box-style1 .container-fluid { padding-left:15px; padding-right:15px; }
.collection-box-style1 .collection-grid-item { margin-bottom:30px; }

.home5-cosmetic .slideshow .slideshow__title { font-size:30px; }
.home5-cosmetic .slideshow .slideshow__subtitle { font-size:16px; }
.home5-cosmetic .section-header h2 { font-size:22px; }

.home6-modern .imgBanners { margin-top:20px; }

.hero .text-large .mega-title { font-size:30px; }
.hero .text-large .mega-subtitle { font-size:16px; }
.hero .text-medium .mega-title { font-size:22px; }
.hero .text-medium .mega-subtitle { font-size:14px; }

.product-single .display-table, .product-single .display-table-cell { display:block; }
.product-single .product-featured-img { margin-bottom:30px; }
.product-single .grid_item-title { font-size:22px; margin-bottom:10px; }
.product-single .display-table-cell { padding-left:0; padding-right:0; }
.product-template__container .product-single__meta { margin-bottom:0; }

.home7-shoes .grid-products .slick-arrow { margin-top:0; }
.home7-shoes .slideshow .slideshow__subtitle { display:none; }
.home7-shoes .slideshow .slideshow__title { font-size:20px; }
.custom-content-style1 .h3 { font-size:15px; }

.home8-jewellery .imgBanners .col-12.pl-0 { padding-left:15px !important; padding-right:0; }
.home8-jewellery .imgBanners .col-12.pr-0 { padding-right:15px !important; }
.home8-jewellery #instafeed.imlow_resolution .insta-img { width:20%; }
.home8-jewellery .slideshow .slideshow__subtitle { display:none; }

.home9-parallax .footer-links .h4 { padding-bottom:15px; margin-bottom:10px; }
.home9-parallax .footer-links:last-of-type .h4 { border-bottom:0; }

.home11-grid .slideshow .slideshow__title { font-size:30px; }
.home11-grid .grid-products .slick-arrow { margin-top:-20px; }

.home10-minimal .imgBanners .col-12 { margin-bottom:30px; }

.home12-category .slideshow .slideshow__title { font-size:30px; }
.home12-category .footer-newsletter { padding-bottom:20px; }
.home12-category .feature-content { padding:0 15px; }
.home12-category .feature-content .feature-row__item.feature-row__text { margin-bottom:20px; }
.home12-category .feature-row__text .row-text { padding-top:0; }

.store-feature-top { display:none; }
.home13-auto-parts .slideshow .slideshow__title { font-size:22px; }
.slideshow .mobile-show { display:block; }
.slideshow .desktop-show { display:none; }
.home13-auto-parts .footer-links .h4, .home14-bags .footer-links .h4 { border-color:#454545; }

.categories-item { width:48.5%; }
.categories-item:nth-of-type(1n) { margin-bottom:20px; }
.categories-item:nth-of-type(2n) { margin-right:0; margin-bottom:20px; }
.categories-item:nth-of-type(2n+1) { clear:left; }
.categories-list-items .row { margin-bottom:0; }
.categories-item img { width:100%; }
.categories-list-items .btn { font-size:12px; padding:5px 10px; }

#site-scroll { font-size:18px; line-height:30px; height:30px; width:30px; right:15px; bottom:60px; }
#site-scroll i { line-height:30px; }

.close-announcement { right:10px; }

#sizechart table, .tab-container table { table-layout:fixed; }

.store-info li { width:100%; border-left:0 !important; border-bottom:1px dotted #ddd; margin-bottom:10px; padding-bottom:10px; }
.store-info li:last-child { border-bottom:0; }

#footer .addressFooter li:last-of-type { padding-bottom:0; }
}

@media only screen and (max-width: 575px) {

.search .search__form { margin:33px 20px; }
.search .search__input { font-size:15px;margin-bottom: 0 !important; }
.search .go-btn{
position: sticky;
}
.slideshow .wrap-caption { padding:10px 0; }
.slideshow .slideshow__title { font-size:18px; }
.slideshow .slideshow__subtitle { display:none; }
.slideshow .container { width:320px; }
.slideshow .btn { display:none; }
.sliderFull .slideshow__subtitle { display:block; }
.sliderFull .btn { display:inline-block; }
.sliderFull .slideshow__title { font-size:30px; }
.sliderFull .slideshow__subtitle { margin-bottom:10px; }
.sliderFull .slideshow__text-content.bottom { bottom:70px; }

.home5-cosmetic .slideshow .slideshow__title { font-size:24px; }

.newsletter-section { padding:20px 0; }
.newsletter-section .section-header { display:block; margin:0 0 15px 0; float:none; }
.newsletter-section .section-header span { display:inline-block; padding-right:5px; }

.footer-bottom .copyright { text-align:center; }

.timermobile .saleTime span>span { margin:0; min-width:0; font-size:10px; background:#f2f2f2 }
.timermobile .saleTime span>span span { font-size:9px; display:block; float:none }

.hero { height:200px; }

.image-banner-3 { margin-bottom:25px; }
.imgBnrOuter .inner .ttl { line-height:20px; font-size:14px; padding:10px; }
.imgBnrOuter .inner.topleft .ttl { left:10px; top:10px; }
.imgBnrOuter .inner .ttl h3 { font-size:18px; }

.home3-boxed-layout .slideshow .slideshow__title { font-size:16px; margin-bottom:5px; }
.home3-boxed-layout .slideshow .slideshow__subtitle { font-size:15px; margin-bottom:10px; }
.home3-boxed-layout .btn { padding:3px 10px; font-size:12px; }
.home3-boxed-layout .slideshow .btn, .home3-boxed-layout .slideshow .slideshow__subtitle{ display:inline-block; }

.home4-fullwidth .slideshow--medium { height:250px; background-color:#eee; }

.custom-content-style1 .mb-4 { margin-bottom:0 !important; }
.custom-content-style1 .row.align-items-center .col-12 { margin-bottom:30px; }

.three-column-pro .col-12:not(:last-of-type) { margin-bottom:30px; }

.home8-jewellery .slideshow .slideshow__title { font-size:20px; max-width:190px; display:block; }
.home8-jewellery .imgBanners .col-12.pl-0 { padding-right:15px !important; margin-bottom:25px; }

.home11-grid .slideshow .wrap-caption { padding:20px; max-width:240px; }
.home11-grid .slideshow__text-content { margin-top:0; }
.home11-grid .slideshow .slideshow__title { font-size:20px; }

.home12-category .slideshow__text-content { margin-top:10px; }
.home12-category .slideshow .container { width:100%; }
.home12-category .slideshow .slideshow__title { font-size:18px; }

.home13-auto-parts .slideshow .container { width:100%; }
.home13-auto-parts .slideshow .slideshow__title { font-size:16px; }
.home13-auto-parts .slideshow .slideshow__subtitle { display:block !important; font-size:12px; margin-bottom:10px; }
.home13-auto-parts .slideshow .btn { display:inline-block !important; padding:5px 10px; font-size:11px; }

.featured-content .list-items .col-12 { margin-bottom:15px; }
.featured-content .list-items img { margin-bottom:10px; }
.collection-box .collection-grid-item__title-wrapper { bottom:10px; }

.categories-item { width:100%; margin-right:0; }

.product-countdown span>span { width:24.3%; }

.home13-auto-parts .collection-box .collection-grid-4item .slick-next { right:-8px; }
.home13-auto-parts .collection-box .collection-grid-4item .slick-prev { left:-8px; }

}

@media only screen and (max-width: 480px) {
.top-header .col-10 { padding-right:5px; }
.top-header .text-right { padding-left:5px; }
.selected-currency, .language-dd { margin-right:5px; }
.top-header p, .top-header a, .top-header select, .top-header .fa, .top-header span.selected-currency, .language-dd { font-size:11px; letter-spacing:0; }

.container-fluid, .home15-funiture-top .container-fluid, .home15-funiture-header .container-fluid { padding: 0 20px; }

.search .search__form { margin:10px 10px }

#sidebar-cart #header-cart { width:100% }
#header-cart { width:282px;display: block;
position: static; }

.latest-blog .wrap-blog .article__grid-image, .latest-blog .wrap-blog .article__grid-meta { display:block; }
.latest-blog .wrap-blog .article__grid-image { text-align:center; }
.latest-blog .wrap-blog .article__grid-meta { width:100%; }
.latest-blog .wrap-blog .article__grid-image img { width:100%; margin-bottom:20px; }
.latest-blog .wrap-blog .wrap-blog-inner { padding:0; }

.sidebar-product .related-product .grid__item { width:100%; }
.sidebar-product .related-product .grid__item:nth-child(2n+1) { clear:left; }

.home2-default .slideshow .slideshow__title { font-size:18px; }

.home3-boxed-layout .tab-slider-product .col-12,
.home3-boxed-layout .tab_container .grid-products .item { padding:0; }]

.hero .text-large .mega-title { font-size:26px; }
.hero .text-large .mega-subtitle { font-size:15px; }

.collection-box .container-fluid { padding:0 15px; }

#footer { margin-top:20px; }

}
.subitalic{
font-family: 'Kalam', cursive !important;
MARGIN-TOP: -5px;
font-size: 1rem;
}
.sidecartitem{
display: flex;
position: relative;
align-items: center;
box-shadow: 0 8px 30px 0 rgb(0 0 0 / 8%);
flex-direction: row;
gap: 20px;
margin-bottom: 20px;
border-bottom: 1px solid #d3d3d396;
overflow: hidden;
}
.close-icon1{
width: 16px;
height: 16px;
background: rgb(17 40 1);
display: flex;
justify-content: center;
padding: 13px;
line-height: 2px;
color: #fff!important;
box-shadow: 0 2px 6px 0 rgba(0,0,0,.4);
transition: .5s linear; border-radius: 50%;
}
.sidecartitem .product-image{
height: 100px;
width: 100px;
overflow: hidden;
border-radius: 30px;
position:relative
}

.sidecartitem .product-image img{
height:100%
}
.imagetoptiffin {
display:none;
position: absolute;
left: 50%;
transform: translateX(-50%);
text-align: center;
background: #ffffffc2;
text-transform: uppercase;
padding: 5px 100%;
font-size: 9px;
letter-spacing: 1px;
}


.sidecartitem .product-name {
font-size: 1.1rem;
font-weight: 400;
color: #112801;
text-align: left;
font-family: 'Kalam';
padding-top: 10px;
}
.sidecartitem .bottomdiv {
line-height: 20px;
font-weight: 400; margin-bottom: 10px; font-family: 'Kalam';
}
.sidecartitem .btn-delete {
position: absolute;
right: 5px;
top: 5px;
border: 1px solid #8080807a;
border-radius: 50%;
height: 20px;
width: 20px;
text-align: center; font-family: 'Kalam';
display: flex;
align-items: center;
justify-content: center;
color: #0000008c;
font-size: 11px;
background-color: #fff;
color: #222529;
box-shadow: 0 2px 6px 0 rgb(0 0 0 / 20%);
}

/* Style for the radio button container */
.attributes-container {
display: flex;
flex-wrap: wrap;
}

/* Style for the radio button box */
.attribute-label {
display: inline-block;
margin-right: 10px;
margin-bottom: 5px;
background-color: #fff;
/* Default background color */
border: 1px solid #c5cabb;
padding: 5px 10px;
border-radius: 5px;
cursor: pointer;
color: #6d7066;
text-align: center;


}

/* Hide the actual radio button */
.attribute-box input[type="radio"],
.attribute-box input[type="checkbox"] {
display: none;
margin-bottom: 0 !important;
padding-bottom: 0;
margin-right: 10px;
}

/* Style for the label when the radio button is selected */
.attribute-box input[type="radio"]:checked+.attribute-label,
.attribute-box input[type="checkbox"]:checked+.attribute-label {
background-color: #729a1b;
color: #fff;
border: 1px dashed#ffffff;
}

.attribute-box input[type="radio"]:checked+.attribute-label .gappricemul ,
.attribute-box input[type="checkbox"]:checked+.attribute-label .gappricemul {
color: #ffe15e;
}



/* Style for the quantity controls */
.quantity-controls,
.cartquantity-controls {
display: flex;
align-items: center;

border: 1px dashed white;
padding: 4px 8px;padding-left: 0;
}

/* Style for the quantity input */
.quantity-input,
.cartquantity-input , .cartquantity-inputpage {
width: 35px;
text-align: center;
border: 1px solid #ccc;
border-radius: 3px;
padding: 0 !important;
margin: 0 5px;
height: auto;
padding-bottom: 0 !important;
background: white;
margin-bottom: 0 !important;
}

/* Style for the increment and decrement buttons */
.quantity-decrement,
.quantity-increment,
.cartquantity-decrement,
.cartquantity-increment , .cartquantity-incrementpage, .cartquantity-decrementpage {
width: 25px;
height: 25px;
border: 1px solid #ccc;
text-align: center;
border-radius: 50%;
cursor: pointer;
background-color: #f0f0f0;
display: flex;
justify-content: center;
align-items: center;
}

.quantity-increment,
.cartquantity-increment ,.cartquantity-incrementpage {
margin-left: 5px;
}
.tiffincont {
position: relative;
height: 100%;
}

/* Modify the scrollbar for .tiffinmaindiv */
.tiffinmaindiv {
z-index: 99;
margin-bottom: 20px;
border-bottom: 1px solid #fd7d16;
display: flex;
justify-content: space-between;
flex-wrap: nowrap;
background: white;
overflow-x: auto;
overflow-y: hidden;
}
/* Style the scrollbar track */
.tiffinmaindiv::-webkit-scrollbar {
width: 2px; /* Adjust the width as needed */
}
/* Style the scrollbar thumb */
.tiffinmaindiv::-webkit-scrollbar-thumb {
background-color: #fd7d16; /* Change this color to your desired scrollbar color */
height: 10px;
}
#sidebar-cart ul.products::-webkit-scrollbar {
width: 4px; /* Adjust the width as needed */
}
#sidebar-cart ul.products::-webkit-scrollbar-thumb {
background-color: lightgrey;
height: 10px;
}
.tiffinmaindiv .nav-item {
display: flex;
flex-direction: row-reverse;
align-items: center;
}
.tiffinmaindiv .nav-link {
font-weight: 800;
display: flex;
align-items: center;
gap: 5px;
letter-spacing: 1px;
justify-content: center;
letter-spacing: 0;
}

.tiffinmaindiv .nav-link.active {
color: #fff;
background-color: #fd7d16;
border-radius: 0;
border: none;
opacity: 1;
margin: 0;
}
.tiffinmaindiv .nav-link:hover {
border-color: lightgrey;
isolation: isolate;
transition: 0.8s ease-in-out background;
}
#tiffin .section-header {
background: url(../images/tiffin-bg.jpg) bottom/cover no-repeat;
height: 150px;
display: flex;
align-items: center;
justify-content: center;
flex-direction: column;
}
#tiffin .section-header {
position: relative; /* Add this */
height: 150px;
display: flex;
align-items: center;
justify-content: center;
flex-direction: column;
}
#tiffin .section-header::before { /* Add this */
content: "";
position: absolute;
top: 0;
right: 0;
bottom: 0;
left: 0;
background: rgba(0, 0, 0, 0.5); /* Adjust the opacity as needed */
z-index: 9; /* Send it behind the content */
}
#tiffin .section-header::after { /* Add this if you want an overlay on top of the content */
content: "";
position: absolute;
top: 0;
right: 0;
bottom: 0;
left: 0;
background: url(../images/tiffin-bg.jpg) bottom/cover no-repeat;
z-index: -2; /* Send it behind the overlay */
}
#tiffin h2,
#tiffin .h2 {
font-size: 3.2em;
text-transform: none;
letter-spacing: 0.03em;
color: #ffffff;
padding: 2px 27px;
background: #00000047;
font-weight: bolder;
border-radius:20px;
z-index:999
}

#tiffin .subitalic {
font-family: 'Kalam', cursive !important;
margin-top: -5px;
font-size: 1rem;
z-index:999;
color: #dbf6a1;
font-weight: 500;
}
@media only screen and (max-width: 837px) {
.img-icon-tiffin {
width: 38px;
}

}
@media only screen and (max-width: 775px) {
.tiffinmaindiv {
top: 45px;
border: 1px dashed #3e530f; justify-content: space-between;
}

.img-icon-tiffin {
width: 30px;
}
.sidecartitem .product-image {
height: 80px;
width: 80px;
}
}@media only screen and (max-width: 650px) {
.grid-products .item .product-image{
height: 80px;
}

.img-icon-tiffin {
width: 28px;
}

}

@media only screen and (max-width: 420px) {
#tiffin .image-container {
margin-left: 5px;
}
}
.addtocartloading {
--clr: rgb(0, 113, 128);
--gap: 6px;
/* gap between each circle */
display: flex;
justify-content: center;
align-items: center;
gap: var(--gap);
}

.add-button-text {
position: relative;
}

.custom-loader {
position: absolute;
top: 50%;
left: 50%;
transform: translate(-50%, -50%);
/* Add your custom loader styles here */
}

.addtocartloading span {
width: 10px;
height: 10px;
border-radius: 100%;
background-color: rgb(109 174 32);
opacity: 0;
}

.addtocartloading span:nth-child(1) {
animation: fade 1s ease-in-out infinite;
}

.addtocartloading span:nth-child(2) {
animation: fade 1s ease-in-out 0.33s infinite;
}

.addtocartloading span:nth-child(3) {
animation: fade 1s ease-in-out 0.66s infinite;
}

@keyframes fade {

0%,
100% {
opacity: 1;
}

60% {
opacity: 0;
}
}

/* CSS for the loader */
.loader {
display: none;
/* Initially hidden */
position: absolute;
top: 0;
left: 0;
width: 100%;
height: 100%;
background-color: rgb(255 255 255 / 54%);
/* Semi-transparent white background */
z-index: 9999;
/* Ensure the loader is on top of other content */
}

.loader-content {
position: absolute;
top: 50%;
left: 50%;
transform: translate(-50%, -50%);
animation: fade-in 0.3s ease-in-out;
/* Fade-in animation */
}

.loader-spinner {
border: 1px solid #f3f3f3;
border-top: 4px solid #ffbd50;
border-radius: 50%;
width: 30px;
height: 30px;
animation: spin .3s linear infinite;
}

@keyframes spin {
0% {
transform: rotate(0deg);
}

100% {
transform: rotate(360deg);
}
}

@keyframes fade-in {
0% {
opacity: 0;
}

100% {
opacity: 1;
}
}

.item.sidecartitem {
/* Your existing styles */
/* Add a transition for the transform property */
transition: transform 0.3s ease-in-out;
/* Adjust the duration and easing as needed */
}
.badge-success{
background-color: #58a431 !important;
}
/* CSS to style the notification */
.notification {
position: fixed;
bottom: 50px;
right: -400px;
background-color: #4CAF50;
color: white;
padding: 15px;
border-radius: 5px;
box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
z-index: 999999999;
opacity: 0;
transition: opacity 0.3s ease-in-out, right 0.3s ease-in-out, transform 0.3s ease-in-out;
/* Add transform for left animation */
transform: translateX(20px);
/* Initially, move it to the right */
}

.notification.show {
opacity: 1;
right: 20px;
transform: translateX(0);
/* Move it back to its original position (left) */
transition: opacity 0.3s ease-in-out, right 0.3s ease-in-out, transform 0.3s ease-in-out;
/* Add transform for left animation */
}

/* Styles for the notification text */
.notification-text {
margin: 0;
font-size: 16px;
}
@media (max-width: 767px) {
.bottomfilter {
display: block; /* Show the div on mobile devices */
}
.navcartitem {
display: none;
}
}

/* Add this CSS to hide the div on screens larger than 767px */
@media (min-width: 768px) {
.bottomfilter {
display: none; /* Hide the div on screens larger than 767px */
}
}
.mycursive{

font-family: 'Kalam', cursive;
font-weight:bold
}
.couponinput-container {
position: relative;
display: flex;
height: 2.8rem;
width: 100%;
background-color: #fff;
border-radius: 8px;
box-shadow: 20px 20px 30px rgba(0, 0, 0, .05);
}

.couponinput-container input {
height: 100%;
width: 100%;
border-radius: 8px;
border: 1px solid rgb(176 190 197);
background-color: transparent;
padding: 0.625rem 70px 0.625rem 0.75rem;
font-size: 0.875rem;
line-height: 1.25rem;
font-weight: 400;
color: rgb(69 90 100);
outline: none;
transition: all .15s cubic-bezier(0.4, 0, 0.2, 1);
}

.couponinput-container input:focus {
border: 1px solid rgb(66 201 123);
}

.couponappy-btn {
position: absolute;
width: 65px;
right: 4px;
top: 4px;
bottom: 4px;
z-index: 10;
border-radius: 4px;
background-color: rgb(66 201 123);
color: #fff;
padding-top: .25rem;
padding-bottom: .25rem;
padding-left: 0.5rem;
padding-right: 0.5rem;
text-align: center;
vertical-align: middle;
font-size: 12px;
font-weight: 600;
text-transform: uppercase;
border: none;
transition: .6s ease;
}

.couponappy-btn:hover {
right: 2px;
top: 2px;
bottom: 2px;
border-radius: 8px;
}

.couponinput-container input:placeholder-shown~.couponappy-btn {
pointer-events: none;
background-color: gray;
opacity: 0.5;
}


.checkoutPage .error {
color: #ff5a5a;
}

/* //for coupon bydefault */
.checkoutPage .coupon-card {
background: radial-gradient(circle at 10% 20%, rgb(14 47 6) 0%, rgb(99 213 123) 90%);
color: #fff;
text-align: center;
padding: 10px;
border-radius: 15px;
box-shadow: 0 10px 10px 0 rgba(0, 0, 0, 0.15);
position: relative;

}

.checkoutPage .logo {
width: 80px;
border-radius: 8px;
margin-bottom: 20px;

}

.checkoutPage .coupon-card h3 {
font-size: 18px;
font-weight: 400;
line-height: 20px;
border-radius: 10px;

}

.checkoutPage .coupon-card p {
font-size: 15px;
color: #FFC107;

}

.checkoutPage .coupon-row {
display: flex;
align-items: center;
margin: 15px auto;
width: fit-content;

}

#cpnCode {
border: 1px dashed #fff;
padding: 10px 20px;
border-right: 0;

}

#cpnBtn {
border: 1px solid #fff;
background: #fff;
padding: 10px 20px;
color: #7158fe;
cursor: pointer;
}

.checkoutPage .circle1,
.checkoutPage .circle2 {
background: #a9ffbbc9;
width: 50px;
height: 50px;
border-radius: 50%;
position: absolute;
top: 50%;
transform: translateY(-50%);

}

.checkoutPage .circle3 {
background: #f8f8f8a3;
width: 50px;
height: 50px;
border-radius: 50%;
position: absolute;
top: 0;
transform: translateY(-50%);

}

.checkoutPage .circle4 {
background: #f8f8f8e0;
width: 50px;
height: 50px;
border-radius: 50%;
position: absolute;
bottom: -40px;
transform: translateY(-50%);
}

.checkoutPage .circle1 {
left: -25px;
}

.checkoutPage .circle2 {
right: -25px;
}

.checkoutPage .circle3 {
left: -25px;
}

.checkoutPage .circle4 {
right: -25px;
}
a.collection-grid-item__link.cartdflex {
display: flex;
align-items: center;
justify-content: center;
}a.collection-grid-item__link.cartdflex h3 {
margin-bottom:0 !important
}

a.collection-grid-item__link.cartdflex h3:hover {
color:var(--themecolor) !important
}

.form-control:focus {
color: #495057 !Important;
background-color: #f8ffe0 !Important;
border-color: #597101 !Important;
outline: 0 !Important;
box-shadow: 0 0 0 1px rgb(132 151 62) !Important;
border-radius: 0 !Important;
}
.multiplelabel .quantity-controls {
  padding-right: 0;
    position: absolute;
    right: 35px;
    border: 0;
}










#sidebarcartnav {
margin: 10px auto;
min-height: 50px;
flex-flow: row nowrap;
display: flex;
flex-direction: column;
flex-wrap: nowrap;
align-items: flex-start;
align-content: flex-start;
justify-content: space-around;
}

#sidebarcartnav a.cart-button {
width: 44px;
min-height: 50px;
position: relative;
cursor: pointer;
display: flex;
flex-direction: column;
flex-wrap: nowrap;
align-items: center;
align-content: flex-start;
justify-content: space-around;
}

#sidebarcartnav a.cart-button span.bag-icon {
width: 34px;
height: 40px;
display: block;
margin-bottom: 10px;
z-index: 1;
text-indent: -999px;
overflow: hidden;
mask: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 34 40'%3E%3Cpath d='M33.1 10.2h-8V7.9C25 3.5 21.4 0 17 0c-4.4 0-8 3.5-8 7.9v2.3H1c-.5 0-.9.4-.9.9v24.4C0 38 2.1 40 4.6 40h24.7c2.6 0 4.6-2 4.6-4.5V11.1c.1-.5-.3-.9-.8-.9zM10.8 7.9c0-3.4 2.8-6.1 6.2-6.1 3.4 0 6.2 2.7 6.2 6.1v2.3H10.8V7.9zm21.3 27.6c0 1.5-1.2 2.7-2.8 2.7H4.6c-1.5 0-2.8-1.2-2.8-2.7V12H9v1.1c0 .5.4.9.9.9s.9-.4.9-.9V12h12.4v1.2c0 .5.4.9.9.9s.9-.4.9-.9V12h7.1v23.5z'/%3E%3C/svg%3E");
background: rgba(255, 255, 255, 0.6);
transition: all 0.2s linear 0s;
}

#sidebarcartnav a.cart-button span.bag-count {
border-radius: 3px;
color: rgba(255, 255, 255, 0.9);
font-size: 16px;
font-weight: 600;
height: 28px;
width: 34px;
position: absolute;
top: 11px;
z-index: 0;
display: flex;
flex-direction: row;
align-items: center;
justify-content: center;
transition: all 0.2s linear 0s;
}

#sidebarcartnav a.cart-button span.bag-label {
display: block;
color: rgba(255, 255, 255, 0.6);
font-size: 11px;
text-transform: uppercase;
letter-spacing: 1px;
height: 20px;
width: 80px;
text-align: center;
transition: all 0.2s linear 0s;
}

#sidebarcartnav a.cart-button:active span.bag-icon,
#sidebarcartnav a.cart-button:hover span.bag-icon {
background: #fff;
}

#sidebarcartnav a.cart-button:active span.bag-count,
#sidebarcartnav a.cart-button:hover span.bag-count {
color: #fff;
}

#sidebarcartnav a.cart-button:active span.bag-label,
#sidebarcartnav a.cart-button:hover span.bag-label {
color: #fff;
}

body.show-sidebar-cart {
overflow: hidden !important;
height: 100% !important;
}

body.show-sidebar-cart #sidebar-cart {
right: 0;
visibility: visible;
}

#sidebar-cart {
background: #ffffff;
color: #041b02;
padding: 15px 15px 0 15px;
position: fixed;
display: block;
width: 420px;
height: 100%;
z-index: 2;
top: 0px;
right: -100%;
box-shadow: -10px 0 15px rgba(0, 0, 0, 0.1);
transition: right 0.3s ease-in-out;
z-index: 9999999999999999;
overflow: hidden;
}

#sidebar-cart a.close-button {
height: 16px;
width: 16px;
margin: 0 0 15px 0;
text-decoration: none;
position: absolute;
top: 20px;
display: flex;
}

#sidebar-cart a.close-button span.close-icon {}

#sidebar-cart a.close-button:active span.close-icon,
#sidebar-cart a.close-button:hover span.close-icon {
background: #fff;
}

#sidebar-cart h2 {
font-size: 1.4rem;
font-weight: 600;
text-align: center;
letter-spacing: 2px;
text-transform: uppercase;
line-height: 1;
margin: 5px 0 25px 0;
display: flex;
justify-content: center;
font-family: 'Kalam', cursive;
color: #323331;
}

#sidebar-cart h2 span.count {
color: #fff;
background: var(--themecolor);
padding: 8px;
margin-left: 6px;
position: relative;
top: -1px;
width: 18px;
height: 18px;
border-radius: 50px;
font-size: 12px;
letter-spacing: 0;
display: flex;
align-items: center;
justify-content: center;
}

#sidebar-cart ul.products {
margin: 0;
padding: 0 0 15px 0;
list-style: none;
height: calc(100vh - 200px);
overflow-x: hidden;
overflow-y: auto;
display: block;
position: relative;
z-index: 0;
margin-top: 40px;
}


#sidebar-cart ul.products li.product {
margin: 0 0 10px 0;
padding: 0;
width: 100%;
min-height: 30px;
background: #fafafa;
border-radius: 3px;
color: #282829;
position: relative;
z-index: 1;
display: flex;
flex-flow: row nowrap;
transition: all 0.2s linear;
border: 1px solid #e8e8e8;
}

#sidebar-cart ul.products li.product:active,
#sidebar-cart ul.products li.product:hover {
background: #fff;
}

#sidebar-cart ul.products li.product:active span.product-details h3,
#sidebar-cart ul.products li.product:hover span.product-details h3 {
color: var(--themecolor) !important;
}

#sidebar-cart ul.products li.product:active img,
#sidebar-cart ul.products li.product:hover img {
border-color: #d7d7de !important;
}

#sidebar-cart ul.products li.product a.product-link {
width: 100%;
color: #354165;
padding: 10px;
margin: 0;
display: flex;
flex-direction: row;
flex-wrap: nowrap;
}

#sidebar-cart ul.products li.product a.product-link span.product-image {
display: inline-block;
width: 75px;
height: 50px;
padding-right: 10px;
}

#sidebar-cart ul.products li.product a.product-link span.product-image img {
width: 60px;
height: 50px;
border: 1px solid #d7d7de;
transition: all 0.2s linear;
}

#sidebar-cart ul.products li.product a.product-link span.product-details {
display: inline-block;
width: 100%;
min-height: 30px;
color: #75757a;
}

#sidebar-cart ul.products li.product a.product-link span.product-details h3 {
margin: 3px 25px 5px 0;
font-size: 13px;
font-weight: 500;
color: #44444a;
transition: all 0.2s linear;
}

#sidebar-cart ul.products li.product a.product-link span.product-details span.qty-price {
display: flex;
flex-direction: row;
flex-wrap: nowrap;
align-content: center;
align-items: center;
justify-content: space-between;
width: 100%;
position: relative;
z-index: 5px;
margin-top: 8px;
}

#sidebar-cart ul.products li.product a.product-link span.product-details span.qty-price span.qty,
#sidebar-cart ul.products li.product a.product-link span.product-details span.qty-price span.price {
display: flex;
flex-direction: row;
flex-wrap: nowrap;
}

#sidebar-cart ul.products li.product a.product-link span.product-details span.qty-price span.qty {
display: flex;
flex-direction: row;
flex-wrap: nowrap;
align-content: center;
align-items: center;
justify-content: flex-start;
}

#sidebar-cart ul.products li.product a.product-link span.product-details span.qty-price span.qty button.minus-button,
#sidebar-cart ul.products li.product a.product-link span.product-details span.qty-price span.qty button.plus-button {
width: 25px;
height: 24px;
border-radius: 3px;
border: 1px solid #cdcdd1;
background: #f0f0f9;
color: #75757a;
font-size: 18px;
text-align: center;
vertical-align: middle;
line-height: 20px;
transition: all 0.3s linear;
}

#sidebar-cart ul.products li.product a.product-link span.product-details span.qty-price span.qty button.minus-button:active,
#sidebar-cart ul.products li.product a.product-link span.product-details span.qty-price span.qty button.plus-button:active,
#sidebar-cart ul.products li.product a.product-link span.product-details span.qty-price span.qty button.minus-button:hover,
#sidebar-cart ul.products li.product a.product-link span.product-details span.qty-price span.qty button.plus-button:hover {
color: #fff;
background: var(--themecolor);
border-color: var(--themecolor);
cursor: pointer;
outline: none;
}

#sidebar-cart ul.products li.product a.product-link span.product-details span.qty-price span.qty button.minus-button:focus,
#sidebar-cart ul.products li.product a.product-link span.product-details span.qty-price span.qty button.plus-button:focus {
outline: none;
}

#sidebar-cart ul.products li.product a.product-link span.product-details span.qty-price span.qty input.qty-input {
width: 24px;
height: 24px;
text-align: center;
border: 1px solid #cdcdd1;
border-radius: 3px;
margin: 0 2px;
transition: all 0.2s linear;
}

#sidebar-cart ul.products li.product a.product-link span.product-details span.qty-price span.qty input.qty-input:active,
#sidebar-cart ul.products li.product a.product-link span.product-details span.qty-price span.qty input.qty-input:hover {
border: 1px solid var(--themecolor);
}

#sidebar-cart ul.products li.product a.product-link span.product-details span.qty-price span.qty input.qty-input:focus {
outline: none;
border: 1px solid var(--themecolor);
}

#sidebar-cart ul.products li.product a.product-link span.product-details span.qty-price span.qty input.qty-input::-webkit-inner-spin-button,
#sidebar-cart ul.products li.product a.product-link span.product-details span.qty-price span.qty input.qty-input::-webkit-outer-spin-button {
appearance: none;
margin: 0;
}

#sidebar-cart ul.products li.product a.product-link span.product-details span.qty-price span.price {
color: var(--themecolor);
font-weight: 500;
font-size: 13px;
display: inline-flex;
}

#sidebar-cart ul.products li.product a.remove-button {
height: 20px;
width: 20px;
margin: 10px 10px 0 0;
text-decoration: none;
position: absolute;
top: 2px;
right: 0;
z-index: 2;
display: flex;
text-align: center;
}

#sidebar-cart ul.products li.product a.remove-button span.remove-icon {
width: 20px;
/* height: 16px; */
background: rgb(117 117 122 / 19%);
text-align: center;
line-height: 16px;
border-radius: 50%;
display: flex;
align-items: center;
justify-content: center;
}



#sidebar-cart div.totals {
position: absolute;
bottom: 45px;
left: 0;
right: 0;
height: 45px;
background: #112801;
border-bottom: 1px solid #194204;
display: flex;
flex-direction: column;
flex-wrap: nowrap;
}

#sidebar-cart div.totals div.subtotal,
#sidebar-cart div.totals div.shipping,
#sidebar-cart div.totals div.tax {
padding: 15px;
text-align: center;
color: #44444a;
border-bottom: 1px solid #d7d7de;
text-transform: uppercase;
letter-spacing: 1px;
font-size: 14px;
font-weight: 400;
display: flex;
flex-direction: row;
flex-wrap: nowrap;
justify-content: space-between;
}

#sidebar-cart div.totals div.subtotal span.amount,
#sidebar-cart div.totals div.shipping span.amount,
#sidebar-cart div.totals div.tax span.amount {
color: #e9f92e;
margin-left: 10px;
font-weight: 600;
}

#sidebar-cart div.action-buttons {
padding: 0;
position: absolute;
bottom: 0;
left: 0;
right: 0;
width: 100%;
height: auto;
background: #fff;
display: block;
white-space: nowrap;
z-index: 9999999999;
}
.cartpageimgtext{
display: flex;
align-items: center;
gap: 5px;
line-height: 20px;
}
#sidebar-cart div.action-buttons a.view-cart-button,
#sidebar-cart div.action-buttons a.checkout-button {
display: inline-block;
padding: 10px;
margin: 20px 15px;
text-align: center;
text-transform: uppercase;
letter-spacing: 1px;
font-size: 14px;
border-width: 1px;
border-style: solid;
border-radius: 4px;
transition: all 0.2s linear;
}

#sidebar-cart div.action-buttons a.view-cart-button {
background: #fff;
border-color: var(--themecolor);
margin-right: 5px;
color: var(--themecolor);
width: 80px;
}

#sidebar-cart div.action-buttons a.view-cart-button:active,
#sidebar-cart div.action-buttons a.view-cart-button:hover {
background: rgba(77, 192, 227, 0.2);
color: var(--themecolor);
}

#sidebar-cart div.action-buttons a.checkout-button {
border-color: var(--themecolor);
background: var(--themecolor);
margin-left: 5px;
color: #fff;
width: 200px;
}

#sidebar-cart div.action-buttons a.checkout-button:after {
content: url("data:image/svg+xml,%3Csvg fill='%23fff' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 448 512'%3E%3Cpath d='M311.03 131.515l-7.071 7.07c-4.686 4.686-4.686 12.284 0 16.971L387.887 239H12c-6.627 0-12 5.373-12 12v10c0 6.627 5.373 12 12 12h375.887l-83.928 83.444c-4.686 4.686-4.686 12.284 0 16.971l7.071 7.07c4.686 4.686 12.284 4.686 16.97 0l116.485-116c4.686-4.686 4.686-12.284 0-16.971L328 131.515c-4.686-4.687-12.284-4.687-16.97 0z'/%3E%3C/svg%3E");
width: 20px;
height: 14px;
display: inline-block;
margin-left: 6px;
vertical-align: middle;
position: relative;
top: -5px;
z-index: 1;
}

#sidebar-cart div.action-buttons a.checkout-button:active,
#sidebar-cart div.action-buttons a.checkout-button:hover {
background: #22b0db;
border-color: #22b0db;
}

#sidebar-cart-curtain {
background: rgba(0, 0, 0, 0.2);
display: none;
position: fixed;
top: 0;
left: 0;
bottom: 0;
right: 0;
z-index: 1;
}

.getcartdiv {
position: absolute;
z-index: 9;
top: 50%; /* Center vertically */
left: 50%; /* Center horizontally */
transform: translate(-50%, -50%); /* Center both horizontally and vertically */
display: flex;
flex-wrap: wrap;
gap: 20px;
justify-content: flex-start;
align-items: center; width: 90%;
}

<!-- //media query  -->
@media only screen and (max-width: 300px) {...}
@media only screen and (max-width: 400px) {#tiffin h2, #tiffin .h2 {
    font-size: 2.2em;}}
@media only screen and (max-width: 600px) { #sidebar-cart {
width: 100%;
right: -1000px;
} .product-name img{
width:20px
}.attribute-box input[type="checkbox"]+.attribute-label {
    font-size: .7rem;
    padding: 2px 5px;
}.multiplelabel .attribute-label {
    flex-wrap: nowrap;
    white-space: nowrap;
}
#codpayment img{
width:40px
}
#onlinepayment img{
  width:40px
}
.multiplelabel{
    padding:2px 5px
}
.multiplelabel .quantity-decrement,.multiplelabel .quantity-increment{
width:20px;
height:20px
}
.multiplelabel .quantity-input, .multiplelabel .cartquantity-input{
    width:25px;
    height:20px

}
#sidebar-cart div.action-buttons{
    <!-- position:fixed -->
}
.delieverytype-info .plan-name{
    font-size: .6rem;
}
.typeoption label{
  padding:.3rem !Important
}
.borderpadding {
  padding:5px !Important
}
.typeoption input+label img {
    width:20px
}
.sidecartitem .product-name{
    font-size:.9rem
}
.sidecartitem .bottomdiv {
    font-weight: 300;
    font-size: .7rem;
}
.bottomdiv .product-price{
    line-height: 12px;
}
}
.mobcartshowdiv {
    border: 1px solid #8080807a;
    margin-bottom: 8px;
    padding: 5px;
    background: white;
}
.mobcarttotaldiv{
  background: #e3e3e3;
    padding: 10px;
    border: 1px dashed #0d9b0d;
    display: flex;
    justify-content: space-between;
    font-weight: 800;
}
.myorder-table{
    display:block
  }
  .myorder-table2{
    display:none
  }
@media only screen and (max-width: 600px) {

  .prFeatures img {
    width: 20px !Important;
}

.prFeatures .details h3, .prFeatures .details .h3, .prFeatures .details{
  font-size:12px;
  margin-bottom:0 !important
}
  #loginformwithmobile .phone-input input[type="tel"]{
    letter-spacing:1px
  }
  #loginformwithmobile .phone-input {
 
    box-shadow: 1px 1px 13px lightgrey;
}
  .collection-box .collection-grid-item__title.btn--secondary{
    font-size:.5rem
  }
  .shopping-cart-total {
    margin: 0 auto;
    display: flex;
    justify-content: space-between;
    padding: 5px 10px;
}
.your-order{
  padding-bottom:25px
}
  .myorder-table{
    display:none
  }
  .myorder-table2{
    display:block
  }
  .checkout__form .checkout__form__input p {
    margin-bottom: 8px !Important;
    margin-top: 4px !Important;
}
    .font10check{
        font-size:10px
    }
    #mycartpagediv .table td, .table th {
   min-width: 150px;
}
    .cart .list-view-item__title {
    color: #264c12;
    font-size: .7rem;
    line-height: 15px;
}
    .cartpageimgtext{
    display: flex;
   flex-direction:column
}.cart__image-wrapper img{
width: 50px;
}}
@media only screen and (max-width: 768px) {
  .variants.add{
    display:none
  }
  .contactIntro {
    display: flex;
    margin: 0 !important;
}
.fw-noraml{
    font-size: 1.4rem;
}
}
@media only screen and (min-width: 992px) {...}
@media only screen and (min-width: 1024px) {
    
    body::-webkit-scrollbar {
width: 10px; /* Adjust the width as needed */
border-radius:20px
}

/* Style the scrollbar thumb */
body::-webkit-scrollbar-thumb {
background-color: #fd7d16; /* Change this color to your desired scrollbar color */
border-radius:20px;
}
    .grid-products .item .product-image{
height:100px
}
.grid-products .item .product-name a {
font-size: 1.1em;
}
.product-price .price {
font-size: .7rem;
}
.product-details .typeImage, .product-name img{
width:20px
}
.grid-products .item .product-price {
line-height: 10px;
}
.setwidthreg{
    min-width: 60% !important;
    margin: 0 auto !important;
}
}
@media only screen and (min-width: 1200px) {.setwidthreg{
    min-width: 40% !important;
    margin: 0 auto !important;
}}


.outfstock{
  position: absolute;
    top: 0;
    background: #ff3f00ab;
    width: 100%;
    text-align: center;
    color: white;
    border-radius: 10px;
}


.light2 {
    position: absolute;
    top: 0;
    background: #8BC34A;
    width: max-content;
    text-align: center;
    color: white;
    right: 0;
    border-radius: 10px;
    padding: 0 10px;
}

.light {
  position: absolute;
    top: 0;
    background: #8BC34A;
    width: 100%;
    text-align: center;
    color: white;
    border-radius: 10px;
}
.light2 {
  border: 0;
  color: #fff;
  text-transform: uppercase;
  font-family: Arial,Helvetica,sans-serif;
  cursor: pointer;
  background: -moz-linear-gradient(-45deg,  #8BC34A 0%, #8BC34A 40%, #ffffff 50%, #8BC34A 60%, #8BC34A 100%);
  background: -webkit-gradient(linear, left top, right bottom, color-stop(0%,#8BC34A), color-stop(40%,#8BC34A), color-stop(50%,#ffffff), color-stop(60%,#8BC34A), color-stop(100%,#8BC34A));
  background: -webkit-linear-gradient(-45deg,  #8BC34A 0%,#8BC34A 40%,#ffffff 50%,#8BC34A 60%,#8BC34A 100%);
  background: -o-linear-gradient(-45deg,  #8BC34A 0%,#ff6e00 40%,#ffffff 50%,#8BC34A 60%,#8BC34A 100%);
  background: -ms-linear-gradient(-45deg,  #8BC34A 0%,#8BC34A 40%,#ffffff 50%,#8BC34A 60%,#8BC34A 100%);
  background: linear-gradient(135deg,  #8BC34A 0%,#8BC34A 40%,#ffffff 50%,#8BC34A 60%,#8BC34A 100%);
  filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#8BC34A', endColorstr='#8BC34A',GradientType=1 );
  background-repeat: no-repeat;  
  background-position:0%;
  background-size:300%; 
  animation:light 1s infinite;
    -webkit-animation:light 1s infinite;
}
.light {
  border: 0;
  color: #fff;
  text-transform: uppercase;
  font-family: Arial,Helvetica,sans-serif;
  cursor: pointer;
  background: -moz-linear-gradient(-45deg,  #8BC34A 0%, #8BC34A 40%, #ffffff 50%, #8BC34A 60%, #8BC34A 100%);
  background: -webkit-gradient(linear, left top, right bottom, color-stop(0%,#8BC34A), color-stop(40%,#8BC34A), color-stop(50%,#ffffff), color-stop(60%,#8BC34A), color-stop(100%,#8BC34A));
  background: -webkit-linear-gradient(-45deg,  #8BC34A 0%,#8BC34A 40%,#ffffff 50%,#8BC34A 60%,#8BC34A 100%);
  background: -o-linear-gradient(-45deg,  #8BC34A 0%,#ff6e00 40%,#ffffff 50%,#8BC34A 60%,#8BC34A 100%);
  background: -ms-linear-gradient(-45deg,  #8BC34A 0%,#8BC34A 40%,#ffffff 50%,#8BC34A 60%,#8BC34A 100%);
  background: linear-gradient(135deg,  #8BC34A 0%,#8BC34A 40%,#ffffff 50%,#8BC34A 60%,#8BC34A 100%);
  filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#8BC34A', endColorstr='#8BC34A',GradientType=1 );
  background-repeat: no-repeat;  
  background-position:0%;
  background-size:300%; 
  animation:light 1s infinite;
    -webkit-animation:light 1s infinite;
}
.light:hover {
  
}
@keyframes light {
  0% {
        background-position: 100%; 
  }
  100% { 
        background-position:0%; 
  }
}
        
@-webkit-keyframes light {
  0% {
        background-position: 100%; 
  }
  100% { 
        background-position:0%; 
  }
}