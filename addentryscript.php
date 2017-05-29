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
	$description = $_POST['description'];
	$username = $_SESSION["username"];

	
	$title = htmlspecialchars($title, ENT_QUOTES);
	$price = htmlspecialchars($price, ENT_QUOTES);
	// locations have special chars so converting is not an option. The string needs to pass another form of validation.
	$location = $_POST['location']; 
	//even though this is just a number
	$category = htmlspecialchars($category, ENT_QUOTES);

	if(isset($_FILES['image']) 
	{
    if($_FILES['image']['size'] > 10485760) { //10 MB (size is also in bytes)
        // File too big
    } else {
        // File within size restrictions
    }

	$image = addslashes(file_get_contents($_FILES['image'])); //SQL Injection defence!

	$description = 	htmlspecialchars($description, ENT_QUOTES);

	$addentry = "INSERT INTO advertisements (pricerequest, leftdate, picture, locationid, categoryid, username, 		title, description)
				VALUES ('$pricerequest', CURDATE(), '$image', '$location', '$category', '$username', 'title', '$description')";

	if (mysqli_query($connection, $addentry))
	{
		header("Location: ./entryview.php$row['id']");
    	Exit();
	}
	else
	{
		$_SESSION["registermsg"] = "Registration was not successful. Please try again. ";
		header("Location: ./login.php" );
    	Exit();
	}

?>