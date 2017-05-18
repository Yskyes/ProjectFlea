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

	$nameformat = "[\^\<\,\"@\/\{\}\(\)\*\$\%\?\=\>\:\|\;\#]+\/"; // Just checks for illegal symbols since otherwise it might block people's names.
	$phoneno = '\+?\d{1,4}?[-.\s]?\(?\d{1,3}?\)?[-.\s]?\d{1,4}[-.\s]?\d{1,4}[-.\s]?\d{1,9}'; //expression works
	$mailformat = '^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$'; //expression works
	$passw= "\/\^[a-zA-Z0-9!@#$%^&*_]{7,14}$/";

?>