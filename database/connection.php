<?php // This file should include first , before the queries.php file 

	$host = "localhost";
	$user = "root";
	$password = "";
	$database = "digital_services_contract";

	$con = mysqli_connect($host,$user,$password,$database);

	if(!$con)
	{
		die("Error in database connection");
	}

	
?>