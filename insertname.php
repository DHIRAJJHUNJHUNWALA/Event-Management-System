
<html>
<head>
<script language="JavaScript">
<!--
function open()
{
window.location="success.php"
}

function redirect()
{
window.location="index.php"
}

//-->
</script>
</head>
<body>
<?php
$database="ffcs";
$name=$_POST['name'];
$regno=$_POST['regno'];
$con=mysql_connect("localhost","root","");
if(!$con)
{
die('Could not connect:'.mysql_error());
}
mysql_select_db("$database",$con);

$query="INSERT INTO users(name,regno)VALUES('$name','$regno')";
mysql_query($query);
if($query)
{

echo"<script type='text/javascript'>\n";
echo "alert('Appointment has been made!');\n";
echo "</script>";
echo '<script> open(); </script>';
 



}

mysql_close();
?>

</body>
</html>
