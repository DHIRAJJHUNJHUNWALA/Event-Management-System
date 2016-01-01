<script language="JavaScript">
<!--
function open()
{
alert('Event has been confirmed'); 
window.location="dswlogin.php"
}

function redirect()
{
alert('Event could not be confirmed!'); 
window.location="dswlogin.php"
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
$sql="SELECT ename,eid,description,fee,venuet FROM eventdetails WHERE eid='$id'";
$query="UPDATE eventdetails SET status=4 WHERE eid='$id'";
mysql_query($query);
if($query)
{
echo '<script> open(); </script>';
 }
 echo '<script> redirect(); </script>';

//convert to pdf
 // INCLUDE THE phpToPDF.php FILE
require("phpToPDF.php"); 

// PUT YOUR HTML IN A VARIABLE
$my_html="<HTML>
<h2> $ename </h2><br><br>
<div style=\"display:block; padding:20px; border:2pt solid:#FE9A2E; background-color:#F6E3CE; font-weight:bold;\">
Venue: $venuet</br>Fee: $fee</br>Description: $describe
</div><br><br>

</HTML>";

// SET YOUR PDF OPTIONS
// FOR ALL AVAILABLE OPTIONS, VISIT HERE:  http://phptopdf.com/documentation/
$pdf_options = array(
  "source_type" => 'html',
  "source" => $my_html,
  "action" => 'save',
  "save_directory" => 'pdfs',
  "file_name" => $id.'.pdf');

// CALL THE phpToPDF FUNCTION WITH THE OPTIONS SET ABOVE
phptopdf($pdf_options);

// convert to pdf close
mysql_close($con);
?>