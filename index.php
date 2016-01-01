<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title> Appointment of Event Co-ordinator</title>
<script type="text/javascript" src="js/jquery-1.9.0.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
	$("#name").keyup(function (e) {
	
		//removes spaces from name
		$(this).val($(this).val().replace(/\s/g, ''));
		
		var name = $(this).val();
		if(name.length < 4){$("#user-result").html('');return;}
		
		if(name.length >= 4){
			$("#user-result").html('<img src="imgs/ajax-loader.gif" />');
			$.post('check_username.php', {'name':name}, function(data) {
			  $("#user-result").html(data);
			});
		}
	});	
});
</script>
<style type="text/css">
#registration-form {background: #FDFDFD;width: 350px;padding: 20px;margin-right: auto;margin-left: auto;border: 1px solid #E9E9E9;border-radius: 10px;}
</style>
</head>
<body><center>
<h2>APPOINTMENT FORM</h2></center>
<div id="registration-form">
<form method="POST" action="insertname.php"><center>
  <label for="">Event Co-ordinator:&nbsp;&nbsp;&nbsp;&nbsp;
  <input name="name" type="text" id="name" maxlength="15">
  <span id="user-result"></span>
  </label>
</br></br>
<label for="Registration no.">Enter Registration no.:
<input type="text" name="regno" id="regno" maxlength="10" >
</br></br>
<input type="submit" value="Appoint" name="Appoint" >
</div>
</center>
</form>
</br><center><h4><a href="login.php">Student login</a></center>
</body>
</html>
