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

<script language="javascript" type="text/javascript" src="js/jquery.min.js"></script>


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
<h4 style="color:green;" >Event Co-ordinator:</h4>
<h4 style="color:rgba(40,40,40,0.7);" >Username: &nbsp;<?php echo $_SESSION['name']; ?></h4>
<h4 style="color:rgba(40,40,40,0.7);" >Registration no. &nbsp;<?php echo $_SESSION['regno']; ?></h4>
<a href="eventform.php"><h4 style="color:black;padding:4px; background-color:yellow; align:center;" >Submit event</h4></a>
<a href="formlogout.php"><h4 style="color:black;" ><center>LOGOUT</center></h4></a></div>


<div class="formdec">
<div class="head" style="color:green;font-size:35px;"></br>Events-Status</div>
<div class="pending" style="color:RED;font-size:25px;"></br>Pending Confirmation:</div>

<?php


$database="ffcs";
$con=mysql_connect("localhost","root","");
if(! $con )
{
  die('Could not connect: ' . mysql_error());
}
mysql_select_db('ffcs');
$sql="SELECT ename,eid,description,fee,venuet FROM eventdetails WHERE status<='3'";
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
echo "<input type=button value=Show-Details onclick= setVisibility('$i','inline')  />"."<input type=button value=Hide-Details onclick= setVisibility('$i','none')  />";
echo  '</br>'.'<p id="'.$i.'" style="display:none;">'.'Event-Id:'.'&nbsp;'.$id.'</br>'.'</br>';
echo 'Description:'.'</br>'.$describe.'</br>';
echo 'Registration fee:'.'&nbsp;'.$fee.'</br>';
echo 'Venue Type:'.'&nbsp;'.$venuety.'</br>'.'</p>'.'</br>';


}
echo '</ul>';

}
mysql_close($con);
?>
<div class="pending" style="color:RED;font-size:25px;"></br>Confirmed Events:</div>
<?php


$database="ffcs";
$con=mysql_connect("localhost","root","");
if(! $con )
{
  die('Could not connect: ' . mysql_error());
}
mysql_select_db('ffcs');
$sql="SELECT ename,eid,description,fee,venuet FROM eventdetails WHERE status='4'";
$result = mysql_query( $sql, $con );
if($result!=0)
{
echo '<p align="center">';

echo '<ul class="ename" name="ename">';

echo '</p>';
$num_results=mysql_num_rows($result);
$num_results=100+$num_results;
for($a=100;$a<$num_results;$a++)
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
echo "<input type=button value=Show-Details onclick= setVisibility('$a','inline')  />"."<input type=button value=Hide-Details onclick= setVisibility('$a','none')  />"."<a href='pdfs/".$id.".pdf'>Download Your PDF</a>";
echo  '</br>'.'<p id="'.$a.'" style="display:none;">'.'Event-Id:'.'&nbsp;'.$id.'</br>'.'</br>';
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