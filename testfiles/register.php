<?php

	include 'connection.php';

	$username = $_POST['username'];
	$fullname = $_POST['fullname'];
	$telephone = $_POST['telephone'];
	$email = $_POST['email'];
	$password = $_POST['password1'];

	$sql = "INSERT INTO sellers (username, fullname, password, email, telephone) 
	VALUES ('$username', '$fullname', '$telephone', '$email', '$password')";

	$result = mysqli_query($connection, $sql);

	header("Location: flea_frontpage.html");

?>