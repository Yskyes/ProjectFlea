<?php

	//fuck knows if any of the bits i wrote work, i code like a chimpanzee uses a typewriter

	// Create connection to XAMPP and its DB
	$connection = mysqli_connect('localhost', 'root', '');
	if(!$connection)
	{
		die("Database connection failed".mysqli_error($connection));
	}
	$select_db = mysqli_select_db($connection, 'fleadb');
	if (!$select_db)
	{
    	die("Database Selection Failed" . mysqli_error($connection));
    	}
    	// Get values passed from the html page
	$searchtitle = $_POST['searchtitle'];
	$searchuser = $_POST['searchuser'];
	$searchcategory = $_POST['searchcategory'];
	$searchlocation = $_POST['searchlocation'];
	$searchdescription = $_POST['searchdescription'];

	//creates a prepared statement and binds variables as parameters
	$stmt = $connection->prepare("SELECT * FROM advertisments WHERE title LIKE ? AND user_username LIKE ? AND category_id = ? AND location_id = ? AND description LIKE ?");
	$stmt->bind_param("ssiis", $searchtitle, $searchuser, $searchlocation, $searchcategory, $searchdescription);

	// Query the database 
	$result = $stmt->execute();

	// Places result line in an array and prints
	while ($row = mysqli_fetch_array($result))
	{
	echo 'id: ' .$row['id'];
	echo '<br /> title: ' .$row['title'];
	echo '<br /> user_username: ' .$row['user_username'];
	echo '<br /> category_id: ' .$row['category_id'];
	echo '<br /> location_id: ' .$row['location_id'];
	echo '<br /> description: ' .$row['description'];
	echo '<br /> pricerequest: ' .$row['pricerequest'];
	echo '<br /> picture: ' .$row['picture'];
	echo '<br /> leftdate: ' .$row['leftdate'];
	}

	$stmt->close();

?>	