<?php
	//database credentials are stored on configuration.ini file that is located in root folder
	$configuration = parse_ini_file('../../configuration.ini'); 
    $db = mysqli_connect($configuration['servername'],$configuration['username'],$configuration['password'],$configuration['dbname']) or die("Could not connect to database");

?>