<?php

	require_once 'connection.php';

	

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
		$_SESSION["logged"] = True;
		$_SESSION['LAST_ACTIVITY'] = time();
		header("Location: ./front.php");
	}
	else
	{
		$_SESSION["logged"] = False;
     	header("Location: ./login.php");
	}
?>	