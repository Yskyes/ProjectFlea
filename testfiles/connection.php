<?php

	
	// Create connection to XAMPP and its DB
	$connection = mysqli_connect('localhost', 'root', '');
	if(!$connection)
	{
		die("Database connection failed".mysqli_error($connection));
	}
	$select_db = mysqli_select_db($connection, 'fleadb');
	if (!$select_db)
	{
    	die("Database Selection Failed" . mysqli_error($connection));
    }
    
	session_start();
	

?>