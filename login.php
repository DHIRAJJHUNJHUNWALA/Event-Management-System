<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Event Co-ordinator Login </title>
<script type="text/javascript" src="js/jquery-1.9.0.min.js"></script>

<style type="text/css">
#registration-form {background: #FDFDFD;width: 350px;padding: 20px;margin-right: auto;margin-left: auto;border: 1px solid #E9E9E9;border-radius: 10px;}
</style>
</head>
<body><center>
<h2>Event Co-ordinator Login</h2></center>
<div id="registration-form">
<form method="POST" action="check.php"><center>
  <label for="">Event Co-ordinator:&nbsp;&nbsp;&nbsp;&nbsp;
  <input name="name" type="text" id="name" maxlength="15">
  <span id="user-result"></span>
  </label>
</br></br>
<label for="Registration no.">Enter Registration no.:
<input type="text" name="regno" id="regno" maxlength="10" >
</br></br>
<input type="submit" value="Submit" name="Submit" >
</div>
</center>
</form>
</br><center><h4><a href="index.php">Faculty login</a></center>
</body>
</html>
