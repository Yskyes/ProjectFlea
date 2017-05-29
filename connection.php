<?php

	// Included in every file. Checks that the connection and that the current session hasn't timed out. If it has, the session will be destroyed.

	session_start();
	
	// Create connection to XAMPP and its DB
	$connection = mysqli_connect('localhost', 'root', '');
	if(!$connection)
	{
		die("Database connection failed".mysqli_error($connection));
		echo "Database connection failed";
	}
	$select_db = mysqli_select_db($connection, 'fleadbv2');
	if (!$select_db)
	{
    	die("Database Selection Failed" . mysqli_error($connection));
    	echo "Database selection failed";
    }
    
	if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 1800)) 
	{
	    // last request was more than 30 minutes ago
	    session_unset();     // unset $_SESSION variable for the run-time 
	    session_destroy();   // destroy session data in storage
	}
	
	$_SESSION['LAST_ACTIVITY'] = time(); // update last activity time stamp

	function adminPrivCheck($connection)
	{
		if(!isset($_SESSION["username"]))
			return false;
		else
		{
			$user = $_SESSION["username"];
			$checkadmin = "SELECT adminrights FROM sellers WHERE username = '$user'";
			$result = mysqli_query($connection, $checkadmin);
			$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
			if ($row['adminrights'] == 1)
				return true;
			else return false;
		}
	}
	
?>