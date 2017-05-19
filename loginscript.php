<?php

	require_once 'connection.php';

	

    // Get values passed from the html page
	$username = $_POST['loginusername'];
	$password = $_POST['loginpassword'];
	

	$illegal = "\/[\^\<\,\"@\/\{\}\(\)\*\$\%\?\=\>\:\|\;\#](select|drop|update|delete|order by|group by)+\/"; // Just checks for illegal symbols + SQL keywords since otherwise it might block people's names.
	$userformat = "\/\^[a-zA-Z0-9_]{5,14}$/";

	if (preg_match($illegal, $username)) 
	{
		$_SESSION["loginerror"] = "Username contained illegal characters. Please refrain to letters, underscores, and numbers only";
    	header("Location: ./login.php" );
    	Exit();
	}

	if (preg_match($userformat, $username)) 
	{
		$_SESSION["loginerror"] = "Username must be 5-14 characters long and contain only letters, numbers, or underscores";
    	header("Location: ./login.php" );
    	Exit();
	} 

	if (preg_match($illegal, $password)) 
	{
		$_SESSION["loginerror"] = "Password contained illegal characters. Please refrain to letters, underscores, and numbers only";
    	header("Location: ./login.php" );
    	Exit();
	} 

	

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
     	Exit();
	}
?>	