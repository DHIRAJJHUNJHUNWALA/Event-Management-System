

<script language="JavaScript">
<!--
function open()
{
window.location="eventsuccess.php"
}

function redirect()
{
window.location="eventfailure.php"
}

//-->
</script>
</head>
<body>

<?php
function uuid() {
  
   // The field names refer to RFC 4122 section 4.1.2

   return sprintf('%04x%04x-%04x-%03x4-%04x-%04x%04x%04x',
       mt_rand(0, 65535), mt_rand(0, 65535), // 32 bits for "time_low"
       mt_rand(0, 65535), // 16 bits for "time_mid"
       mt_rand(0, 4095),  // 12 bits before the 0100 of (version) 4 for "time_hi_and_version"
       bindec(substr_replace(sprintf('%016b', mt_rand(0, 65535)), '01', 6, 2)),
           // 8 bits, the last two of which (positions 6 and 7) are 01, for "clk_seq_hi_res"
           // (hence, the 2nd hex digit after the 3rd hyphen can only be 1, 5, 9 or d)
           // 8 bits for "clk_seq_low"
       mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535) // 48 bits for "node" 
   ); 
}
?>

<?php
$database="ffcs";
$ename=$_POST['ename'];
$description=$_POST['description'];
$tags=$_POST['tags'];
$schedule=$_POST['schedule'];
$venuet=$_POST['venuet'];
$roomnumb=$_POST['roomnumb'];
$roombuild=$_POST['roombuild'];
$smartnumb=$_POST['smartnumb'];
$smartroom1=$_POST['smartroom1'];
$smartroom2=$_POST['smartroom2'];
$audibuild=$_POST['audibuild'];
$groundloc=$_POST['groundloc'];
$fee=$_POST['fee'];
$status=1;
$eid= uuid();
$con=mysql_connect("localhost","root","");
if(!$con)
{
die('Could not connect:'.mysql_error());
}
mysql_select_db("$database",$con);

$query="INSERT INTO eventdetails(ename,eid,description,tags,venuet,status,groundloc,fee,smartnumb,smartroom1,smartroom2,schedule,audibuild,roombuild,roomnumb)VALUES('$ename','$eid','$description','$tags','$venuet','$status','$groundloc','$fee','$smartnumb','$smartroom1','$smartroom2','$schedule','$audibuild','$roombuild','$roomnumb')";
mysql_query($query);
if($query)
{
echo '<script> open(); </script>';
 }
 echo '<script> redirect(); </script>';

mysql_close();
?>

