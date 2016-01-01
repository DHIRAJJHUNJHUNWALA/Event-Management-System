<!DOCTYPE html>
<html>
<title>
	Events form
</title>
<head>

<?php
session_start();
if (!isset($_SESSION['name'])) 
{
header("location:login.php");
}
if (!isset($_SESSION['regno'])) 
{
header("location:login.php");
}
?>


<script language="javascript" type="text/javascript" src="datetimepicker.js">

</script>
<script language="javascript" type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
<script language="javascript" type="text/javascript" src="js/jquery.min.js"></script>

<script language="JavaScript">
<!--
/**
 * File: js/showhide.js
 * Author: design1online.com, LLC
 * Purpose: toggle the visibility of fields depending on the value of another field
 **/
$(document).ready(function () {
    toggleFields();
    $("#venuet").change(function () {
        toggleFields();
    });

});
$(document).ready(function () {
    toggleFieldsaudi();
    $("#venuet").change(function () {
        toggleFieldsaudi();
    });

});
$(document).ready(function () {
    toggleFieldssmart();
    $("#venuet").change(function () {
        toggleFieldssmart();
    });

});
$(document).ready(function () {
    toggleFieldsground();
    $("#venuet").change(function () {
        toggleFieldsground();
    });

});
//this toggles the visibility of our parent permission fields depending on the current selected value of the underAge field
function toggleFields() {
    if ($("#venuet").val() == 2)
        $("#room").show();
    else
        $("#room").hide();
}
function toggleFieldsaudi() {
    if ($("#venuet").val() == 1)
        $("#audi").show();
    else
        $("#audi").hide();
}
function toggleFieldssmart() {
    if ($("#venuet").val() == 3)
        $("#smart").show();
    else
        $("#smart").hide();
}
function toggleFieldsground() {
    if ($("#venuet").val() == 4)
        $("#ground").show();
    else
        $("#ground").hide();
}
//-->

</script>

<style>

.identity
{
z-index:10;
padding:20px;
position:fixed;
background-color: rgba(60,60,60,0.1);
}
	
	
	.head{
	color: color;
	font-size: 30px;
	}
	.please{
	font-size: 20px;
	color: black;
	}
	.formdec{
	font-size:20px;
	color: #494850;
	padding: 2%;
	margin-bottom: 5%;
	margin-left:325px;
	}
	.btn{
width:260px;
height:50px;
margin-left:45px
}
.btn{
width:260px;
height:50px;
margin-left:45px
}

.button1{
width:250px;
height:45px;
border:none;
outline:none;
box-shadow:0 3px 2px 0 #2c80a2;
color:#fff;
font-size:14px;
text-shadow:0 1px rgba(0,0,0,0.4);
background-color:#3fb8e8;
font-weight:700;
background-image:url(../images/1.png);
background-repeat:no-repeat;
background-position:200px
}
.button1:hover{
background-color:#1baae3;
cursor:pointer
}
.button1:active{
padding-top:2px;
box-shadow:none
}
</style>
	
</head>
<body>
<div class="identity">
<h4 style="color:green;" >Event Co-ordinator:</h4>
<h4 style="color:rgba(40,40,40,0.7);" >Username: &nbsp;<?php echo $_SESSION['name']; ?></h4>
<h4 style="color:rgba(40,40,40,0.7);" >Registration no. &nbsp;<?php echo $_SESSION['regno']; ?></h4>
<a href="costatus.php"><h4 style="color:black;padding:4px; background-color:yellow; align:center;" >Check event-status</h4></a>
<a href="formlogout.php"><h4 style="color:black;" ><center>LOGOUT</center></h4></a></div>

<div class="formdec">

<div class="head" style="color:green"></br>Events Registration Form</div>
</br>
</br>
<div class="please">
Please Fill out the following form in order to register your event:</div></br>


<form name="details" class="details" enctype="multipart/form-data" onsubmit="return validate()" method="POST" action="eventinsert.php">
Event-name:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" size="25" name="ename" id="ename" />
</br></br>
Description:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<textarea name="description" id="description" cols="45" rows="5"></textarea></br></br>
 Schedule:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input id="demo3" name="schedule" type="text" size="25"><a href="javascript:NewCal('demo3','ddmmmyyyy',true,24)"><img src="imgs/cal.gif" width="16" height="16" border="0" alt="Pick a date"></a>
</br></br>
Registration fee(INR): &nbsp;&nbsp;&nbsp;<input type="number" name="fee" id="fee" size="5" /></br></br>
Tags:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<textarea name="tags" id="tags" cols="40" rows="2"></textarea></br></br>

Venue-type: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<select name="venuet" id="venuet" >
<option value="1">Auditoriums</option>
<option value="2">Rooms</option>
<option value="3">Smart-classrooms</option>
<option value="4"> Grounds/fields</option>
</select>

</br></br>
<div id="room">
No. of Rooms: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="number" name="roomnumb" id="roomnumb" size="2" />
</br></br>Building:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<select name="roombuild" id="roombuild" >
<option>SCSE</option>
<option>SITE</option>
<option>SELECT</option>
<option> SMBS</option>
<option> SBST</option>
<option> VITBS</option>
</select></br></br></div>
<div id="audi">
Auditoriums:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

<select name="audibuild" id="audibuild">
<option>Kamraj Auditorium</option>
<option>Anna Auditorium</option>
<option>Channa Reddy Auditorium</option>
</select>
</br></br></div>
<div id="smart">
No. of Smart-classrooms: &nbsp;&nbsp;&nbsp;&nbsp;<input type="number" name="smartnumb" id="smartnumb" size="2" />
</br></br>Building Preference1:&nbsp;&nbsp;&nbsp;
<select name="smartroom1" id="smartroom1" >
<option>SCSE</option>
<option>SITE</option>
<option>SELECT</option>
<option> SMBS</option>
<option> SBST</option>
<option> VITBS</option>
</select></br></br>
Building Preference2:&nbsp;&nbsp;&nbsp;
<select name="smartroom2" id="smartroom2" >
<option>SCSE</option>
<option>SITE</option>
<option>SELECT</option>
<option> SMBS</option>
<option> SBST</option>
<option> VITBS</option>
</select></br></br>
</div>
<div id="ground">
Grounds/Fields:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

<select name="groundloc" id="groundloc">
<option>SJT Ground</option>
<option>Basketball Ground</option>
</select>
</br></br></div>
</br>
<div class="btn">
<input class="button1" type="submit" value="Submit" name="submit">
</div>
</form>
</div>
</body>
</html>