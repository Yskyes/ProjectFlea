<?php
	
	require_once 'connection.php';


	if(!(isset($_SESSION["username"])))
	{
		header("Location: ./front.php" );
		Exit();
	}

	//Check that the current password is correct

	function CheckCurrentPass()
	{
		$checkcurrentpass = "SELECT username, password FROM sellers WHERE username='$username' AND password = '$currentpassword'";
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

	//Grab the values from the form

	$telephone = $_POST['telephone'];
	$email = $_POST['changeemail'];
	$password1 = $_POST['changepassword1'];
	$password2 = $_POST['changepassword2'];
	$currentpassword = $_POST['currentpassword'];
	$username = $_SESSION["username"];

	//Regular expression to check the values for 2nd time

	$illegal = "\/[\^\<\,\"@\/\{\}\(\)\*\$\%\?\=\>\:\|\;\#](select|drop|update|delete|order by|group by)+\/"; // Just checks for illegal symbols + SQL keywords since otherwise it might block people's names.
	$userformat = "\/\^[a-zA-Z0-9_]{5,14}$/";
	$nameformat = "[\^\<\,\"@\/\{\}\(\)\*\$\%\?\=\>\:\|\;\#]+\/"; // Just checks for illegal symbols since otherwise it might block people's names.
	$phoneno = '\+?\d{1,4}?[-.\s]?\(?\d{1,3}?\)?[-.\s]?\d{1,4}[-.\s]?\d{1,4}[-.\s]?\d{1,9}'; //expression works
	$mailformat = '^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$'; //expression works
	$passw= "\/\^[a-zA-Z0-9_]{7,14}$/";

	/// Updates password, telephone, email. If update is succesful, ammends the status and moves over to next update. If update fails, or string is empty, gives a proper message and exists the script. ///

	// Update password

	if (!($password1 =="" || password2==""))
	{
		// RegEx check

		if (preg_match($passw, $password1)) 
		{
			$_SESSION["updatepassword"] = "Password contained illegal characters. Please refrain to letters, underscores, and numbers only";
	    	header("Location: ./userpage.php" );
	    	Exit();
		} 

		if (preg_match($passw, $password2)) 
		{
			$_SESSION["updatepassword"] = "Password contained illegal characters. Please refrain to letters, underscores, and numbers only";
	    	header("Location: ./userpage.php" );
	    	Exit();
		}
		else
		{
			// Check that the passwords match

			if ($password1 != $password2)
			{
				$_SESSION["updatepassword"] = "The two passwords you entered do not match.";
				header("Location: ./userpage.php" );
	    		Exit();
			}
			else
			{
				CheckCurrentPass();
				$updatepass = "UPDATE sellers
								SET password = '$password1'
								WHERE username = '$username'";

				if (mysqli_query($connection, $updatepass))
					{
						$_SESSION["updatestatus"] .= "password change was successful. ";
					}
					else
					{
						$_SESSION["registermsg"] = "Password change was not successful. Please try again. ";
						header("Location: ./userpage.php" );
				    	Exit();
					}
			}
			
		} 
	}

	// Update email

	if(!($email ==""))
	{
		if (preg_match($mailformat, $email)) 
		{
			$_SESSION["updateemail"] = "Not a valid email. In case of a rare domain, please contact the administrator.";
	    	header("Location: ./userpage.php" );
	    	Exit();
		} 
		else
		{
			CheckCurrentPass();

			$checkemail = "SELECT email FROM sellers WHERE email='$email'";
			if($result = mysqli_query($connection, $checkemail))
			{
				if(!(mysqli_num_rows($result) == 0))
				{
					$_SESSION["updateemail"] = "The email ".$email." is already in use.";
					header("Location: ./login.php" );
		    		Exit();
				}
				else
				{
					$updateemail ="UPDATE sellers
									SET email = '$email'
									WHERE username = '$username'";
					if (mysqli_query($connection, $updateemail))
					{
						$_SESSION["updatestatus"] .= "Email address change was successful. ";
					}
					else
					{
						$_SESSION["updateemail"] = "Email address change was not successful. Please try again. ";
						header("Location: ./userpage.php" );
				    	Exit();
					}
				}
			}
		}
	}


	// Update phone number

	if (!($telephone == ""))
	{
		if (preg_match($phoneno, $telephone)) 
		{
			$_SESSION["updatephone"] = "Use the following format for your telephone number: +123456789012";
	    	header("Location: ./userpage.php" );
	    	Exit();
		} 
		else
		{
			CheckCurrentPass();

			$checkphone = "SELECT telephone FROM sellers WHERE telephone='$telephone'";

			if($result = mysqli_query($connection, $checkphone))
			{
				if(!(mysqli_num_rows($result) == 0))
				{
					$_SESSION["updatephone"] = "The phone number ".$telephone." is already in use.";
					header("Location: ./userpage.php" );
		    		Exit();
				}
				else
				{
					$updatephone = "UPDATE sellers
									SET telephone = '$telephone'
									WHERE username = '$username'";

					if (mysqli_query($connection, $updatephone))
					{
						$_SESSION["updatestatus"] .= "Telephone number change was successful.";
					}
					else
					{
						$_SESSION["updatephone"] = "Telephone number update was not successful. Please try again. ";
						header("Location: ./userpage.php" );
				    	Exit();
					}
				}

			}
		}
	}


	header("Location: ./userpage.php" );
	Exit();

?>