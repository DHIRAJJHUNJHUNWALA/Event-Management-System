<?php
###### db ##########
$db_username = 'root';
$db_password = '';
$db_name = 'ffcs';
$db_host = 'localhost';
################


//check we have username post var
if(isset($_POST["name"]))
{
	//check if its ajax request, exit script if its not
	if(!isset($_SERVER['HTTP_X_REQUESTED_WITH']) AND strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest') {
		die();
	}
	
	//try connect to db
	$connecDB = mysqli_connect($db_host, $db_username, $db_password,$db_name)or die('could not connect to database');
	
	//trim and lowercase username
	$name =  strtolower(trim($_POST["name"])); 
	
	//sanitize username
	$name = filter_var($name, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW|FILTER_FLAG_STRIP_HIGH);
	
	//check username in db
	$results = mysqli_query($connecDB,"SELECT name FROM users WHERE name='$name'");
	
	//return total count
	$name_exist = mysqli_num_rows($results); //total records
	
	//if value is more than 0, username is not available
	if($name_exist) {
		die('<img src="imgs/not-available.png" />');
	}else{
		die('<img src="imgs/available.png" />');
	}
	
	//close db connection
	mysqli_close($connecDB);
}
?>

