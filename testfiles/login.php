<?php

	

	// Create connection to XAMPP and its DB
	$connection = mysqli_connect('localhost', 'root', '');
	if(!$connection)
	{
		die("Database connection failed".mysqli_error($connection));
	}
	$select_db = mysqli_select_db($connection, 'fleadbv2');
	if (!$select_db)
	{
    	die("Database Selection Failed" . mysqli_error($connection));
    }

    	

    // Get values passed from the html page
	$username = $_POST['loginusername'];
	$password = $_POST['loginpassword'];
	$login = "SELECT * FROM sellers WHERE username='$username' AND password='$password'";

	

	// Query the database 
	$result = mysqli_query($connection, $login);
	// Places results in an array
	$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
	if ($row['username']==$username && $row['password']==$password)
	{
		$_SESSION["username"] = $username;
		$_SESSION["logged"] = true;
		header("Location: ./front.php");
	}
	else
	{
		$_SESSION["logged"] = false;
     	header("Location: ./flea_loginpage.php");
	}
?>	