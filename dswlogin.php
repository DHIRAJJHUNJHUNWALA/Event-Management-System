<html>
<head>

<script language="javascript" type="text/javascript" src="js/jquery.min.js"></script>

<script language="JavaScript">
<!--
function setVisibility(id, visibility) {
document.getElementById(id).style.display = visibility;
}
//-->
</script>


<style>
.heading{
font-size:40px;
margin:20px;
color:green;
}
.identity
{
z-index:10;
padding:20px;
position:fixed;
background-color: rgba(60,60,60,0.1);
}
.formdec{
	font-size:20px;
	color: #494850;
	padding: 2%;
	margin-bottom: 5%;
	margin-left:325px;
	}
	.ename
	{
	list-style-type:none;
	}
	
</style>
</head>
<body>
<div class="identity">
<a href="costatus.php"><h4 style="color:black;padding:4px; background-color:yellow; align:center;" >Co-ordinator's login</h4></a>
<a href="plogin.php"><h4 style="color:black;padding:4px; background-color:yellow; align:center;" ><center>President Login</center></h4></a>
<a href="flogin.php"><h4 style="color:black;padding:4px; background-color:yellow; align:center;" ><center>Faculty Login</center></h4></a>
<a href="dswlogin.php"><h4 style="color:black;padding:4px; background-color:yellow; align:center;" ><center>DSW Login</center></h4></a></div>


<center><div class="heading">DSW Login</div></center>
<div class="formdec">
<div class="head" style="color:green;font-size:35px;"></br>Event-Requests</div>
<div class="pending" style="color:RED;font-size:25px;"></br>Pending Confirmation:</div>

<?php

session_start();

$database="ffcs";
$con=mysql_connect("localhost","root","");
if(! $con )
{
  die('Could not connect: ' . mysql_error());
}
mysql_select_db('ffcs');
$sql="SELECT ename,eid,description,fee,venuet,status FROM eventdetails WHERE status='3'";
$result = mysql_query( $sql, $con );
if($result!=0)
{
echo '<p align="center">';

echo '<ul class="ename" name="ename">';

echo '</p>';
$num_results=mysql_num_rows($result);
for($i=0;$i<$num_results;$i++)
{
$row=mysql_fetch_array($result);
$name=$row['ename'];
$id=$row['eid'];
$describe=$row['description'];
$fee=$row['fee'];
$venuet=$row['venuet'];
if($venuet==2)
{
$venuety="Rooms";
}
else if($venuet==3)
{
$venuety="Smart Classrooms";
}
else if($venuet==4)
{
$venuety="Ground/Field";
}
else if($venuet==1)
{
$venuety="Auditorium";
}
echo '<li>'.$name.'&nbsp;&nbsp;'.'</li>';
echo "<input type=button value=Show-Details onclick= setVisibility('$i','inline')  />"."<input type=button value=Hide-Details onclick= setVisibility('$i','none')  />"."&nbsp;&nbsp;"."<form method=POST name=accept action=dswconfirm.php >";
echo '<input type=checkbox name=eventid value='.$id.'>'.'Accept';
echo "&nbsp;&nbsp;"."<input type=submit value=Submit />"."</form>"; 
echo  '</br>'.'<p id="'.$i.'" style="display:none;">'.'Event-Id:'.'&nbsp;'.$id.'</br>'.'</br>';
echo 'Description:'.'</br>'.$describe.'</br>';
echo 'Registration fee:'.'&nbsp;'.$fee.'</br>';
echo 'Venue Type:'.'&nbsp;'.$venuety.'</br>'.'</p>'.'</br>';


}
echo '</ul>';

}
mysql_close($con);
?>
</div>
</body>
</html>