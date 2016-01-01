<script language="JavaScript">
<!--
function open()
{
alert('Event has been confirmed'); 
window.location="flogin.php"
}

function redirect()
{
alert('Event could not be confirmed!'); 
window.location="flogin.php"
}

//-->
</script>

<?php
$id=$_POST['eventid'];
$database="ffcs";
$con=mysql_connect("localhost","root","");
if(! $con )
{
  die('Could not connect: ' . mysql_error());
}
mysql_select_db('ffcs');
$query="UPDATE eventdetails SET status=3 WHERE eid='$id'";
mysql_query($query);
if($query)
{
echo '<script> open(); </script>';
 }
 echo '<script> redirect(); </script>';


mysql_close($con);
?>