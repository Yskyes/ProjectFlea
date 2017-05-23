<?php

	require_once 'connection.php';

	//Grab the values from form

	$username = $_POST['username'];
	$fullname = $_POST['fullname'];
	$telephone = $_POST['telephone'];
	$email = $_POST['email'];
	$password1 = $_POST['password1'];
	$password2 = $_POST['password2'];

	//Regular expression to check the values for 2nd time

	$illegal = "\/[\^\<\,\"@\/\{\}\(\)\*\$\%\?\=\>\:\|\;\#](select|drop|update|delete|order by|group by)+\/"; // Just checks for illegal symbols + SQL keywords since otherwise it might block people's names.
	$userformat = "\/\^[a-zA-Z0-9_]{5,14}$/";
	$nameformat = "[\^\<\,\"@\/\{\}\(\)\*\$\%\?\=\>\:\|\;\#]+\/"; // Just checks for illegal symbols since otherwise it might block people's names.
	$phoneno = '\+?\d{1,4}?[-.\s]?\(?\d{1,3}?\)?[-.\s]?\d{1,4}[-.\s]?\d{1,4}[-.\s]?\d{1,9}'; //expression works
	$mailformat = '^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$'; //expression works
	$passw= "\/\^[a-zA-Z0-9_]{7,14}$/";


	// Illegal symbol + format checks

	if (preg_match($illegal, $username)) 
	{
		$_SESSION["registeruser"] = "Username contained illegal characters. Please refrain to letters, underscores, and numbers only";
    	header("Location: ./login.php" );
    	Exit();
	}

	if (preg_match($illegal, $fullname)) 
	{
		$_SESSION["registerfull"] = "Password contained illegal characters. Please refrain to letters, underscores, and numbers only";
    	header("Location: ./login.php" );
    	Exit();
	}

	if (preg_match($phoneno, $telephone)) 
	{
		$_SESSION["registerphone"] = "Use the following format for your telephone number: +123456789012";
    	header("Location: ./login.php" );
    	Exit();
	} 

	if (preg_match($mailformat, $email)) 
	{
		$_SESSION["registeremail"] = "Not a valid email. In case of a rare domain, please contact the administrator.";
    	header("Location: ./login.php" );
    	Exit();
	} 

	if (preg_match($passw, $password1)) 
	{
		$_SESSION["registerpassword"] = "Password contained illegal characters. Please refrain to letters, underscores, and numbers only";
    	header("Location: ./login.php" );
    	Exit();
	} 

	if (preg_match($passw, $password2)) 
	{
		$_SESSION["registerpassword"] = "Password contained illegal characters. Please refrain to letters, underscores, and numbers only";
    	header("Location: ./login.php" );
    	Exit();
	} 

	// Check that the passwords match

	if ($password1 != $password2)
	{
		$_SESSION["registerpassword"] = "The two passwords you entered do not match.";
	}

	// If the full name includes allowed special characters, convert them to HTML entities

	$fullname = htmlspecialchars($fullname);

	// Query the DB in case the suggested values exist already
	$checkuser = "SELECT username FROM sellers WHERE username='$username'";
	$checkemail = "SELECT email FROM sellers WHERE email='$email'";
	$checkphone = "SELECT telephone FROM sellers WHERE telephone='$telephone'";



	
	// Places results in an array
	if($result = mysqli_query($connection, $checkuser))
	{
		if(!(mysqli_num_rows($result) == 0))
		{
			$_SESSION["registeruser"] = "The username ".$username." is already in use.";
			header("Location: ./login.php" );
    		Exit();
		}
	}
	
	if($result = mysqli_query($connection, $checkemail))
	{
		if(!(mysqli_num_rows($result) == 0))
		{
			$_SESSION["registeremail"] = "The email ".$email." is already in use.";
			header("Location: ./login.php" );
    		Exit();
		}
	}

	if($result = mysqli_query($connection, $checkphone))
	{
		if(!(mysqli_num_rows($result) == 0))
		{
			$_SESSION["registerphone"] = "The phone number ".$telephone." is already in use.";
			header("Location: ./login.php" );
    		Exit();
		}
	}

	// If all checks hold water, do the insert

	$registeruser = "INSERT INTO sellers (username, fullname, password, email, telephone) VALUES ('$username', '$fullname', '$password1', '$email', '$telephone')";

	if (mysqli_query($connection, $registeruser))
	{
		$_SESSION["registermsg"] = "Registration was successful. Please proceed to log in using the form below.";
		header("Location: ./login.php" );
    	Exit();
	}
	else
	{
		$_SESSION["registermsg"] = "Registration was not successful. Please try again. ";
		header("Location: ./login.php" );
    	Exit();
	}

?>