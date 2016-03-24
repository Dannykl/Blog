<?php
	session_start();
	echo "Logged out";
	unset($_SESSION['user']);  //unset the current user
	session_destroy();         //it destroys the session 
	require("loginForm.php");	//it requires login page to display it after the user is logged out
?>