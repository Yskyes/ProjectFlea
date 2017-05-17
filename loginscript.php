<?php

	require_once 'connection.php';

	

    // Get values passed from the html page
	$username = $_POST['loginusername'];
	$password = $_POST['loginpassword'];
	$usernameformat = RegExp (/^[a-zA-Z0-9*_]{5,14}$/);
	$fullnameformat = RegExp (/^[a-zA-ZäöüÄÖÜ\ \,\.\'\-]{4,25}$/); 
	$phoneno =RegExp(\+?\d{1,4}?[-.\s]?\(?\d{1,3}?\)?[-.\s]?\d{1,4}[-.\s]?\d{1,4}[-.\s]?\d{1,9}); //expression works
	$mailformat = RegExp(^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$); //expression works
	$passw= RegExp(/^[a-zA-Z0-9[:punct:]{7,14}/); //expression works?

	if (!(preg_match()))

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