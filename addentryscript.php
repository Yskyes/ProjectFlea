<?php
	require_once 'connection.php';

	// Grab values

	$title = $_POST['title'];
	$price = $_POST['price'];
	$category =  $_POST['category'];
	$description = $_POST['description'];

	$title = htmlspecialchars($title, ENT_QUOTES);
	$price = htmlspecialchars($price, ENT_QUOTES);
	// locations have special chars so converting is not an option. The string needs to pass another form of validation.
	$location = $_POST['location']; 
	//even though this is just a number
	$category = htmlspecialchars($category, ENT_QUOTES);
	// img is gonna have its own validation 
	$image = $_POST['pic'];

	$description = 	htmlspecialchars($description, ENT_QUOTES);

	echo $title;
	echo $price;
	echo $location;
	echo $category;
	echo $image;
	echo $description;
?>