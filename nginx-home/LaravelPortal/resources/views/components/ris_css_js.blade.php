<link rel="stylesheet" href="/bower/bootstrap/dist/css/bootstrap.min.css"/>
<link rel="stylesheet" href="/bower/jquery-ui/themes/dark-hive/jquery-ui.min.css" type="text/css">
<script src="/bower/jquery/dist/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-migrate/3.0.1/jquery-migrate.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="/bower/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="/bower/jquery-ui/jquery-ui.min.js"></script>
<script src="/bower/jquery-timepicker-jt/jquery.timepicker.min.js"></script>
<script src="/bower/moment/min/moment.min.js"></script>
<script src="/bower/moment-timezone/builds/moment-timezone-with-data-1970-2030.min.js"></script>
<style>
/* FOR syntaxHighlight */
.syntaxHighlighted {
    background-color:whitesmoke !important;
}
.syntaxHighlighted .string { color: green !important; }
.syntaxHighlighted .number { color: darkorange !important; }
.syntaxHighlighted .boolean { color: blue !important; }
.syntaxHighlighted .null { color: magenta !important; }
.syntaxHighlighted .key { color: #0158ff !important; }

body {
font-size: 14px;
}


.centertabs {

font-size: 12px;
width: max-content;
margin: auto !important;
}
</style>
<style>
body {  /* load page before showing */

/*
height:0px;
width:0px;
 */
visibility:hidden;
padding:0 !important;
margin:0 !important;

}

#webcamwrapper, #cropperimage, #results {

margin: 20px;
border: 2px solid black;
color: black;
background: #0b0a0a;

}

form {

line-height:1em !important;
}

.listheading {

font-size: 1em;
margin: 10px auto 10px auto;
color:black;
text-align:center;

}

.plupload_wrapper {
min-width:320px !important;
}

.ui-widget.admins {

background: none;
max-width: 100%;
padding:10px;

}
.ui-widget.admins * {
color:black;
}

#orderrequests {
	height:200px;
	overflow:scroll;
}

.create-dicom {
position: absolute;
top: 0;
right: 0;
}

#navbarCollapse {
height:max-content;
}
.modal-open {
	overflow:auto;
}

/*  CSS for the Paginator Widget  */
.pageactive {
color:red !important;
}

.modal-dialog {
width:max-content;
}

.modal-footer {

text-align:center;
margin:auto;
padding:0px;
}

/*
#widget, .paginator {

width:max-content;
margin:auto;

}
 */

#widget, .RISpaginator, .paginator {

    font-size: 10px !important;
    padding: 2px;
    border-radius: 4px;
    width: max-content;
    margin: auto;
    border-radius: 10px;
}

#widget a, .RISpaginator a, .paginator a {

	margin: 2px 5px 2px 0px;
	background: white;
	display: inline-block;
	width: 20px;
	font-size: 12px;
	color: black;
	border: 1px solid black;
	text-align: center;
	border-radius: 5px;
	line-height:16px;
}


/*  For the Flags Add-In */
.SumoSelect > .optWrapper > .options li label {
	margin-left: 10px;
	display:inline-block !important;
}
.SumoSelect li.opt img {

height:14px;
}

.claimstatus, .billingstatus {
display:block;
}

#EditingForm > span:first-child {
text-align: center;
display: inline-block;
width: 100%;
}
/*
FOR THE FILE BROWSER
 */
#filelist {
background: white;
color: black;
text-align: left;
margin: 10px;
padding: 10px;
border-radius: 10px;
}

#filelist .row {
	margin:0px;
	padding:3px;
	border:1px solid black;
	border-collapse: collapse;
}

#filelist > row:first-child div {}

.billingfunctionbutton {
display:inline-block;
}


#studieswrapper * {
	font-size:10px !important;
}

.captchaimage {
height:60px;
width:auto;
text-align:center;
margin:auto;

}
/* Timepicker font-size */
.ui-timepicker-am, .ui-timepicker-pm {
	font-size:16px !important;

}
/* BOOTSTRAP MODAL (SEE BOTTOM OF FOOTER), modal-content and modal-footer also. */

.modal {
z-index:5000;
color:black;

}
.modal-header {
text-align:center;
margin:auto;
}


/* BEGIN CROPPER CSS for WebCam and Image Upload */


video {

  width:320px;
  float:left;
}

#croppercontrols {

	color: black;
	font-size: 16px;
	line-height: 24px;
	display:none;
	color:black;
	margin-left:20px;

}


#title {

	font-size: 18px;
	font-weight: bold;
/* 	padding-left: 30px; */
}

#capture {

    display:block;
    clear:both;
    }



#webcamwrapper {

	margin-bottom:20px;
	text-align:left;
	display:inline-block;


}

#webcamwrapper span, #results span {
	color:black;
	display: block;
	/* 	text-align: center; */
	font-weight: bold;
	clear:both;

}


.cropper-container {

  margin: 0px 0px;
  max-width: 320px;
  clear:both;
display:inline-block;
}

.cropper-container img {
  max-width: 100%;

}

#result {
	vertical-align:top;
/*         margin-left:20px; */
	max-width:320px;

}

#results  {

	display:none;
	vertical-align:top;
	color:white;
	position:relative;

}


.cropper-view-box, .cropper-face {
	border-radius:50%;
}
.cropper-bg {
	background-image:none !important;
}
.cropper-modal {
	background:none !important;
}

.square {
	 border-radius:0% !important;
}

#uploadavatar, #webcamupload, #deleteavatars, #profileavatar, #userform {

border: 3px solid #2d6ba0;
border-radius: 10px;
padding: 20px;
margin: 20px;
clear:both;

}

#profileavatar {

max-width: 300px;
text-align: center;
cursor:pointer;
}

#profileavatar img {

 height:128px;
}

/* END CROPPER CSS for WebCam and Image Upload */

.formselectorbuttons {
	background: white;
	max-width: 800;
	text-align: center;
	margin: 0 20px 0 20px;
	border: 2px solid black;
	border-radius: 10px;
}

.feedbackwrapper {

background: #7d0101;
color: white;
padding: 0px;
font-size: 10px;
text-align: center;
margin: auto;
width: 100%;
}

.user_avatar {
	width: 100%;
	margin: auto;
	text-align: center;
}

.user_avatar img {
	max-height: 75px;
	max-width: 75px;
}

.orderstatusicons * {
color:white !important;
}

.billingbutton {

color: white !important;
font-size: 10px !important;
background-color: #8e0022 !important;
border-radius: 2px;
border:none;
padding: 2px;
font-weight:300;
margin: 2px 2px 2px 2px;
cursor:pointer;
float:right;

}
.contact-form * {
    font-family:"Trebuchet MS", Helvetica, sans-serif;

}

.contact-form input:not([type=submit]), .contact-form textarea  {
    background-color:white !important;
    color:black !important;
    border:1px solid black !important;
}

.contact-form textarea {
    height:200px;
}

.form-group {
margin-bottom:0px;
}

.form-group input {
height:auto;
padding:1px !important;
}

.form-group .control-label {

font-size:14px;
color:black;
}

#disclaimer {

white-space: normal;
margin-top: 20px;
text-align: justify;
font-size: 8px;

}
/*For the iframe loaded info pages */

#nav-tabContent * {

font-weight: bold;
font-size: 16px;
margin: 10px;
text-align: justify;
}

#nav-tabContent img {
margin:0px;
width:100%;
}

.uibuttonsmallred, .uibuttonsmallred *   {

color: white !important;
font-size: 10px;
background-color: #8e0022 !important;
border-radius: 4px;
border:none;
padding: 1px;
font-weight:300;
margin: 2px 2px 2px 2px;
cursor:pointer;
width:max-content !important;
max-width:100%;

}

.dropdown-menu {
    background: #0972a5;
    border: 1px solid white;
}
.navbar .dropdown-item {
    color:white;
    font-size:12px;
}
.navbar .dropdown-item:hover {
    color:black;
    font-size:12px;
}

.navbar .nav-item {

    color:white;
    font-size:12px;
    font-family:"Lucida Sans Unicode", "Lucida Grande", sans-serif;
}

.navbar .nav-item .nav-link:hover {
	color:white;
	text-decoration: underline;
}

.form-group label {
text-align:right;
margin:0;
padding:0;
}

::placeholder {
	color: red !important;
	opacity: .8 !important;
	font-size: 12px;
	font-weight: 200;
	background: white !important;
}


.editableformwrapper {

margin: 0px;
display: block;
position: absolute;
top: 0px;
left:0px;
z-index:2000;
background: white;
width: 100%;
padding: 20px;
border-radius: 10px;
border: 2px solid black;
overflow: visible;

}

.editableformaddbutton, #close_editform, #closeform {

margin: auto;
display: block;

}

#userform {
	display: block;
	position: relative;
	z-index: 0;
	background: black;
	border: 3px solid black;
	padding: 20px;
	background: white;
	border-radius: 10px;
}

#spinner {

position: fixed;
top: 50%;
left: 50%;
width: auto;
height: auto;
-webkit-transform: translate(-50%,-50%);
-moz-transform: translate(-50%,-50%);
-ms-transform: translate(-50%,-50%);
-o-transform: translate(-50%,-50%);
transform: translate(-50%,-50%);
pointer-events:none;
z-index:10002;

}

#spinner img {

height: 100px;
border-radius: 100px;
background: transparent;

}
.errormessage {
padding: 5px;
border: 2px solid black;
color: red !important;
display: block;
width: max-content;
margin: auto;
background: white;
outline: 2px solid whitedashed;
outline-style: dashed;
}

.admins, .users {
padding-top:20px;
padding-bottom:60px;
}


.leftalignblock, .leftalignblock *  {
text-align:left;
color:black;
font-size:.8em;
}

span.edited_green {

	font-size: .8em !important;
	white-space: nowrap;
	position: absolute;
	left: 0px;
	top: 5px;
	border-radius: 3px;
}
span.edited_red  {

font-size:0.8em !important;
display:block;
border:1px solid black;
border-radius: 3px;

}


.profile {  /* wrapper for profile view */

margin:20px;


}

.navbar {

background-color: #8e0022 !important;
box-shadow: 5px 5px 5px black !important;
position:sticky;
position:-webkit-sticky;
padding:0px !important;
}

#new_password_form {

text-align: center;
margin: auto;
width:320px;

}
#new_password_form * {
 width:100%;
}

.box {

padding:0px 10px 10px 10px;

}

.btn-danger {

	font-size: .7em !important;
	padding: 5px !important;
}

.ui-tooltip{

max-width: 800px;

}


.centertabs {

display:table;
margin:auto !important;
background: none;
border: none;
}


.nav-item.active > a {
color:white;
text-decoration:underline;
}

#patient_actions {

 text-align:center;
 margin:auto;
}

#patientdiv, #searchdiv {  /* The AJAX loaded thing with red border */

display:block;
border:2px solid red;
width:100%;
max-height:100%;
margin: 5px 0px 5px 0px;
background:#111;
padding: 0 5px 20px 5px;

}
#searchdiv {
	border:2px solid springgreen;
}


/* The AJAX loaded thing the drops down from above */

#orderform, #patientform, #insuranceform {

/* 	background: white; */
/*
	color: white;
	font-weight: bold;
	border-radius: 20px;
	border: 2px solid white;
 */
	padding: 5px;
	width:100%;
}

h4 {
font-size:16px !important;
}

.SumoSelect > .optWrapper > .options li label {
	background:transparent !important;
}

#modalDiv {

position: fixed;
z-index: 2000;
background: #000;
color: white;
top:0px;
left: 0px;
right:0px;
overflow:scroll;
height:100vh;
display:none;

}

#modalDiv  .form-group {
	text-align: right;
	/* margin: 5px; */
	border-radius: 5px;
	border: 2px solid white;
	margin: 0px 10px 0 10px;
}

#orderform .form-group {
text-align:left !important;
}


.datepicker, .timepicker {
border:2px solid green;

}
.ui-timepicker-list li {
margin: 0;
font-size: 10px;
text-align: center;
padding: 0px;
border: 1px solid black;
}

font-family: courier;

/*  For Styled Forms, could use theme */

.SumoSelect > .CaptionCont {
background-color:unset !important;
}

.shadedform:nth-child(even), .shadedform:nth-child(even) *,  .shadedform:nth-child(even) .CaptionCont  {

background:#DDD;
color:black;
font-weight:bold;
font-size:10px;
}

.shadedform:nth-child(odd), .shadedform:nth-child(odd) *, .shadedform:nth-child(odd) .CaptionCont {
background:#FFF;
color:black;
font-weight:bold;
font-size:10px;
}

.shadedform h5 {
margin:0px;
padding: 2px 0px 4px 0px;
font-weight:bold !important;
font-size:14px !important;
}


#demographics textarea {
background:white;
color:black;
}

/* BEGIN HISTORY FORM CSS */

#historywrapper {

background:#DDD;
color:black;
border-radius:20px;
padding:20px;
display:table;
}
#historywrapper .form-group {
border-radius: 5px;

border: 2px solid white;

margin: 0px 10px 0 10px;
}

#historywrapper * {

	font-size:12px;
}

.searchresults {

display:grid;
overflow:hidden;

}
.searchresults option {

width:360px;

}

.fa-trash-alt {

	font-size: 16px !important;
	color: red;
	margin: 0px 10px 0px 10px;
}
.fas.fa-plus {
		font-size: 16px !important;
}


#rxwrapper, #icdwrapper {
text-align:center;
}

/* END HISTORY FORM CSS */

[readonly] , [disabled], .SumoSelect.disabled, .readonly {
border: 2px solid red !important;
}


.canedit  {
border:2px solid green !important;
}

SumoSelect * {
color:white !important;
}


.ui-tabs-panel.ui-widget-content  {
	border: 2px solid snow;
	margin: 5px;
	border-radius: 10px;
}
.widget {
display:inline-block;
}

#icd10dxcodes, #medicationlist {

font-size:12px;
text-align:left;

}
[for = icd10codes], [for = medicationlist]  {
font-size:14px;
font-weight:bold;
text-align:left;
text-decoration: underline;

}


/* Calendar for Order Form */

#calendardiv{

height:max-content;
overflow:scroll;
display:none;

}

/* The AJAX loaded thing the drops down from above */


.SumoSelect {

	float: left;
    font-size: 12px;
    width: inherit !important;

}

.SumoSelect * {

color:black;
text-align:left !important;
}


.selectPatient, .selectedOrder {
    background-color:rgba(0, 255, 127, 0.5) !important;
    -moz-opacity: .5;
}

.selectPatient *, .selectedOrder * {
	color:white !important;
}

/*
select.form-control {
    -webkit-appearance: menulist;
}
 */

.ui-datepicker-header, .ui-datepicker-calendar {
 color:white;
}


#textmarkup {
    background:#222;
}

#apiresults {

	line-height: normal;
	font-size: 16px;
	font-family: "Trebuchet MS", Helvetica, sans-serif;
	color: black;
	background: seashell;
	border-radius: 20px;
	padding: 20px 10px 20px 10px;
	border: 2px solid black;
	text-shadow: black 2px;
	box-shadow: -5px -5px 5px 2px #afc2e4;
}

/* centers the tabs */

.nav-tabs > li {

margin-bottom: -1px !important;
float: none !important;
display: inline-block !important;
}

ul.nav-tabs {

text-align:center !important;

}

.rangedates {

background:black;
color:white;

}
#filedetails {
color:white;
font-size:0.75em;
}

.iconinfo {
    color:white;
    font-size:0.75em;
}
.iconinfo  img {
padding-right:5px;
height:2.0em;
display:inline;
}
.iconinfo a {
padding-right:20px;
}

.popover {
	border:2px solid black;
	border-radius:10px;
	padding:5px 5px 5px 5px;
	z-index:100000;
}

.popover-body {
	border:2px solid black;
	border-radius:10px;

}

[data-toggle="popover"]::after {
	content: '?';
	font-size: 16px;
	color: black;
	background: white;
	border-radius: 5px;
	display: inline-block;
	width: 16px;
	line-height: 16px;
	margin-left: 5px;
}


/*
.viewicon > img, .fetchicon > img, .isoicon > img, .zipicon > img, .oldstudyicon > img {
height:1.2em;
}
 */

.uiicons img, .uiicons {

height:1.4em;

}

.uiiconslarge img, .uiiconslarge {

height:2.0em;

}



.uiiconsorder img {

height:2.5em;
text-align:center;


}

#loadoldreport {
padding: 0px 2px !important;
margin: 15px 0px 0px 15px !important;
}

.closeresults {
 position:absolute;
}

#APImonitor {

	display:none;
	padding:10px;
	color:white;
	background: black;
}
.medpicslogo {
  background:transparent;color: #FF0008;font-family: arial;font-style: normal;font-size: 16px;font-variant: small-caps;text-shadow: 1px 1px 1px #FFF;margin:10px 0px 10px 0px;

}
.medpicslogo img {height:30px;margin-bottom:15px;}


/* css for report editor */

.reportdiv {

background:black !important;
padding-bottom:30px;
}

.reportheader {

background:black !important;
color:white !important;
font-size:10px;
border:1px solid white;
border-radius:5px;
}

.reportheader div span:first-child {
  padding:0px 5px 0px 0px;
}

.reportdiv .htmlmarkup textarea
{
	background-color: #555;
	border: none;
	color:white;
	display: block;
	height: 40px;
	line-height: normal;
	resize: both;
	width: 90%;
	margin-top:10px;
	margin-bottom:10px;
}

.reportdiv .htmlmarkup input[type="text"]
{
	background-color: #555;
	border: none;
	width: 50em;
	color:white;
}
.reportdiv .htmlmarkup input[type="number"]
{
	background-color: #555;
	border: none;
	color:white;
	width: 6em;
}

.reportdiv .htmlmarkup select

{
	color: black;
	display: block;
	max-width: 55em;
}

/* Below is for the HL7 report */

.reportdiv .htmlmarkup, .reportdiv #reportswrapper > div  {

	padding:10px;
	margin:0px;
	background: white;
	border-top: 1px solid black;
	color: #000;
	font-family: "Trebuchet MS", Helvetica, sans-serif;
	font-size: 12px;
	font-weight:bold;
}

.reportdiv #markupform .htmlmarkup {
    background:black !important;
    color:white;
}

.reportdiv .htmlmarkup div, .reportdiv #reportswrapper > div div {

  display:block;
  padding:0px;
  line-height: initial;
  margin:5px 0px 5px 0px;
}


.reportdiv .htmlmarkup label, .reportdiv #reportswrapper > div label
{
	font-size: 12px;
	color:#07b71c;
	width:200px;
}


.reportdiv .htmlmarkup section > header, .reportdiv #reportswrapper > div section > header
{
	color: #2e78b9;
	font-family: "Trebuchet MS", Helvetica, sans-serif;
	font-size: 16px;
	font-weight: bold;
	margin-bottom: 0.0cm;
	margin-top: 0.3cm;
}
.reportdiv .htmlmarkup section > section > header, .reportdiv #reportswrapper > div section > section > header
{
	color: #e62a00;
	font-family: "Trebuchet MS", Helvetica, sans-serif;
	font-size: 12px;
	font-weight: bold;
	margin-bottom: 0.0cm;
	margin-top: 0.3cm;
	text-align: left;
}

.reportdiv .htmlmarkup section > section > section > header, .reportdiv #reportswrapper > div section > section > section > header
{
	color: green;
	font-family: "Trebuchet MS", Helvetica, sans-serif;
	font-size: 12px;
	font-weight: bold;
	margin-bottom: 0.0cm;
	margin-top: 0.3cm;
	text-align: left;
}

.reportdiv .htmlmarkup > section
{
}
.reportdiv .htmlmarkup section > section, .reportdiv #reportswrapper > div  section > section
{
	padding-left: 0.8cm;
}
.reportdiv .htmlmarkup p, .reportdiv #reportswrapper > div p
{
	margin-bottom: 0.0cm;
	margin-top: 0.0cm;
	padding-left: 0.8cm;
}

/* end of report editor css */


#contract_id {
color:black;
}

.btn-sm, .btn-xs {
border:none !important;
padding:2px !important;
}
#myNav {
z-index:10000;

}



#delegator {

text-align: center !important;
/* min-height: 2048px; */
height: 100%;
min-height:100vh;
}

.spanclosex {

font-size:12px;
background:red;
color:white;

}

#studycontainer {
  width:100%;
  max-width:100%;
}

.info {
height:100%;
font-size:0.8em;
}
.info img  {
  height:1em;
}

.ui-tabs {

font-size:0.7em;

}

.divtableheader, .worklistheader {

  padding:0px;
  margin:0px 0px 0px -1px;
  background:#2a5881;
  width:100%;
  font-size:14px;
  line-height:16px;
  text-align:center;

}

.divtableheader *, .worklistheader * {
color:white !important;
}

.divtableheader > div {

	overflow: hidden;
	white-space: nowrap;
	text-overflow: ellipsis;
	display: block;
	border-left:1px solid white;
	color:white;

	}

.divtableheader div:first-child {

    border:none;
}

.divtable {


    color: black;
	font-weight: bold;
	font-size:0.9em;
/* 	box-shadow: 0px 0px 0px 2px #1e40eb; */
  	margin:0px;
	padding:5px 0px 5px 0px;
	overflow:hidden;
	width:100%;
	text-align:left;

}

.divtable, .divtable > div {

	display:flex;
}


.divtable >	div , .divtable > div > div	 {

    overflow: hidden;
	white-space: nowrap;
	text-overflow: ellipsis;
	max-height:60px;
	padding:0px 0px 0px 0px;
	border-right:1px solid white;
	font-size:12px !important;
	font-family:  "Trebuchet MS", Helvetica, sans-serif;
	padding-left:5px;

	}

.divtable span {
color:black;
}


.divtable div:last-child, .divtable > div > div:last-child {

border-right:none;

}

#searchform, .searchform {

  box-shadow: none !important;
  background:none;
  font-size:10px;
  padding:0px;
}

#searchform input, .searchform input, .searchform select, #searchform select {

  background: #BBB;
  color:black;
  width:100%;
  border:none;
  font-size:12px;
  display:block;

}

.rowcount, .rowcount * {

	background:white !important;
	color:black !important;
	width:max-content;
	margin:auto;
}

input[name=begindate], input[name=enddate], input[name=changedate] {

width: 100px;
display: inline;
margin: 5px;
padding: 5px;
height: 1em;
}

input[name=changedate] {
width: 10px;
}

.nopadding {
        padding:0px !important;
		margin:0px;
	}

	.padding {
		padding:2px !important;
		margin:0px;
	}


.narrowmedia {
  display:none;
}

[data-sort-param] {
  cursor:pointer;
}


.latestHL7 {
	float:right;
}
@media only screen and (max-width: 580px) {

  .row.widemedia {
    display:none !important;
  }
  .searchform .narrowmedia, #searchform .narrowmedia {
    display:inline-block;
    width:100%;
    color:white !important;
    background:black !important;
    padding-bottom:5px;

  }
  .divtable div {

  display:table !important;
  border-right:none !important;

  }

  .divtable div span:first-child {
  width:150px;
  }

  #searchform * {
   background:#888;
  }

  #searchform input {
    border:1px solid white;
  }

}


/* primary = blue, danger = red, info = light blue, success = green, danger = red */

.btn-primary, .btn-danger, .btn-info, .btn-success, btn-warning {

font-size: 12px !important;
padding: 1px !important;
border-radius: 5px;
margin: 5px;
}

/*  READERS & BILLERS & REFERRERS & PATIENTS STUDIES LIST PAGES */

#studies .storagenamespace {

font-size: 16px !important;

}
.facilityinfo {
position:relative;
text-align: left;
}



	#reportsselector {
	color:black;
	margin-left:10px;
	width:500px;
	}
	#reportsselectorform {
display: inline-block;
color: black;
margin-left: 10px;
width: 500px;
font-family: Monaco;
font-size: 12px;
	}
	#templateid {
	width:500px;
	}

#teleRadDivOverlayWrapper {

    width:100%;
    height:100%;
    display: none;
    position: absolute;
    top: 0px;
    left: 0px;
    z-index: 3000;
    background: black;
/*     height: 100vh; */
    overflow-y:scroll;

}

#teleRadDivOverlay {

background:black;

}

#viewertools {
color:white;
}

 .vieweroverlay a {
    padding: 0px;
    font-size: inherit;
}
.vieweroverlay {
background-color:black;
transition:0s;
}

#teleradClose {
display:block;
text-align: center;
margin:auto;
}

#noreports  {
color:#fff;
display: inline-block;
padding: 10px;
}
.btn-hide {
display:none;
}
.btn-show {
display:inline-block;
}
.route_select {
position: absolute;
z-index: 10;
display: none;
color: black;
bottom:0;
left:0;

}
.showselect {

color: #8e0022;
margin-left: 5px;
}


	.shareDiv {
	    margin-right:10px;
	    margin-left:10px;
	}

	.info {
	  color:black;
		font-weight:500;
		font-size:.7em;

		clear:both;
	}
	.info img {
	  height:1.5em;
	}
	.error {
	  background: #fff;
	  text-align: center !important;
	  font-size: 12px;
	  color: red !important;
	  box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
	  border-radius: 5px;
	  padding: 0px !important;
	  margin: 0px;
	  width: 100%;
	  max-width:none;
	  display: inline-block;
	}

	.SumoUnder {
	    visibility:hidden;
	}


	blockquote {
		border-color:transparent !important;

	}

/*
::-moz-selection {
  color: red;
  background: white;
}
 */

::selection {
  color: red;
  background: white;
}

#database { /* database selection form */
color: black;
text-align: center;
}

    /* The Overlay (background) */
    .vieweroverlay {
        /* Height & width depends on how you want to reveal the overlay (see JS below) */
height: 100%;
width: 0;
position: fixed;
 /* Stay in place */
z-index: 10;
 /* Sit on top */
left: 0;
top: 0;
background-color: rgb(0,0,0);
 /* Black fallback color */
background-color: rgba(0,0,0, 0.9);
 /* Black w/opacity */
overflow-x: hidden;
 /* Disable horizontal scroll */
overflow-y: hidden;
transition: 1s;
 /* 0.5 second transition effect to slide in or slide down the overlay (height or width, depending on reveal) */
}

    /* Position the content inside the overlay */
.vieweroverlay-content {
position: relative;
top: 0px;
 /* 25% from the top */
width: 100%;
 /* 100% width */
text-align: center;
 /* Centered text/links */
margin-top: 0px;
 /* 30px top margin to avoid conflict with the close button on smaller screens */
}


/* Position the close button (top right corner) */

.vieweroverlay a.closebtn {

position: absolute;
z-index: 2;
top: 50px;
right: 0px;
background: transparent;

}

.vieweroverlay .fa-window-close {
    color:red;
}

    /* When the height of the screen is less than 450 pixels, change the font-size of the links and position the close button again, so they don't overlap */
    @media screen and (max-height: 450px) {
        .vieweroverlay a {font-size: 20px}
        .vieweroverlay .closebtn {
            font-size: 40px;
            top: -25px;
            right: 0px;
        }
    }

    label .fa-asterisk {
	color:red !important;
}
</style>
