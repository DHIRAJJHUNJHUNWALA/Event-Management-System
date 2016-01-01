<?php
session_start();
unset($_SESSION['name']); 
unset($_SESSION['regno']); 
session_destroy();

header("Location: login.php");
exit;
?>