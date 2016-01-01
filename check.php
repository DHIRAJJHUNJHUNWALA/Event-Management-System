<html>
<head>

</head>
<body>
<script language="JavaScript">
<!--


function redirect()
{
window.location="failure.php"
}

//-->
</script>
<?php

$host="localhost"; // Host name 
$root="root"; // Mysql username 
$mypassword=""; // Mysql password 
$db_name="ffcs"; // Database name 
$tbl_name="users"; // Table name 


mysql_connect("$host", "$root", "$mypassword")or die("cannot connect"); 
mysql_select_db("$db_name")or die("cannot select DB");

$name=$_POST['name']; 
$regno=$_POST['regno']; 

$name = stripslashes($name);
$regno = stripslashes($regno);
$name = mysql_real_escape_string($name);
$regno = mysql_real_escape_string($regno);
$sql="SELECT * FROM users WHERE name='$name' and regno='$regno'";
$result=mysql_query($sql);


$count=mysql_num_rows($result);


if($count==1){


session_register("name");
session_register("regno"); 
header("location:eventform.php");
}
else {

 
	 echo '<script> redirect(); </script>';


   exit;
}
?>
</body>
</html>