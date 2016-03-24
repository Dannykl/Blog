<?php
	//connecting a database
	//first parameter domain name
	//second username for database
	//third parameter password to access to database
	//fourth parameter database name
	$db = mysqli_connect("localhost","root","","Blog") or die("Could not connect to database");

?>