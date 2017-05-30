<?php
	require_once 'connection.php';

	// Grab values

	if(!(isset($_SESSION["username"])))
	{
		header("Location: ./front.php" );
		Exit();
	}

	$title = $_POST['title'];
	$price = $_POST['price'];
	$category =  $_POST['category'];
	$location = $_POST['location'];
	$description = $_POST['description'];
	$username = $_SESSION["username"];

	if (strlen($title) > 30)
	{
		$_SESSION["addentryerror"] = "The title was more than 30 characters long.";
		header("Location: ./addentry.php");
		Exit();
	}
	
	if (strlen($price) > 10)
	{
		$_SESSION["addentryerror"] = "The price tag was more than 10 characters long.";
		header("Location: ./addentry.php");
		Exit();
	}
	
	
	if (strlen($description) > 300)
	{
		$_SESSION["addentryerror"] = "The description was more than 300 characters long.";
		header("Location: ./addentry.php");
		Exit();
	}

	$titlechar = htmlspecialchars($title, ENT_QUOTES);
	$pricechar = htmlspecialchars($price, ENT_QUOTES);
	$descriptionchar = 	htmlspecialchars($description, ENT_QUOTES);
	str_replace("€","&euro;",$titlechar);

	$addentry = "INSERT INTO advertisements (pricerequest, leftdate, locationid, categoryid, username, 		title, description)
				VALUES ('$pricechar', CURDATE(), '$location', '$category', '$username', '$titlechar', '$descriptionchar')";

	if (mysqli_query($connection, $addentry))
	{
		$_SESSION["addentryerror"] = "Adding your entry was successful. You can find a link to it from your profile. ";
		header("Location: ./addentry.php" );
    	Exit();
	}
	else
	{
		$_SESSION["addentryerror"] = "Adding your entry was not successful. Please try again. ";
		header("Location: ./addentry.php" );
    	Exit();
	}

?>