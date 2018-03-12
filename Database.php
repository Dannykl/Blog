<?php
	//connecting a database
	//first parameter domain name
	//second username for database
	//third parameter password to access to database
	//fourth parameter database name
	$configuration = parse_ini_file('../private/configuration.ini'); 
    $db = mysqli_connect($configuration['servername'],$configuration['username'],$configuration['password'],$configuration['dbname']) or die("Could not connect to database");

?>