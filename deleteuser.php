<?php

	require_once 'connection.php';

	if(!(isset($_SESSION["username"])))
	{
		header("Location: ./front.php" );
		Exit();
	}

	$password = $_POST['currentpassword'];

	// check password

	$illegal = "\/[\^\<\,\"@\/\{\}\(\)\*\$\%\?\=\>\:\|\;\#](select|drop|update|delete|order by|group by)+\/"; 

	if (preg_match($illegal, $password)) 
	{
		$_SESSION["loginerror"] = "Password contained illegal characters.";
    	header("Location: ./userpage.php" );
    	Exit();
	} 

	function CheckCurrentPass()
	{
		$checkcurrentpass = "SELECT username, password FROM sellers WHERE username='$username' AND password = '$password'";
		if($result = mysqli_query($connection, $checkcurrentpass))
		{
			if(!(mysqli_num_rows($result) == 0))
			{
				$_SESSION["oldpassword"] = "The current password is not correct. ";
				header("Location: ./userpage.php" );
	    		Exit();
			}
		}
	}

	CheckCurrentPass();

	$deleteuserentries = "DELETE FROM advertisements WHERE username='$username'";
	$deleteuser = "DELETE FROM sellers WHERE username='$username'";

	if($result = mysqli_query($connection, $deleteuserentries))
		{
			if($result = mysqli_query($connection, $deleteuser))
			{
				$_SESSION["delete_succesful"] = "It is hard to see you go. User and its entries are now deleted. ";
				unset($_SESSION["username"]);
				header("Location: ./front.php" );
	    		Exit();

			}
		}

	header("Location: ./userpage.php" );
	Exit();

?>