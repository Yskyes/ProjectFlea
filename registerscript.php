<?php

	require_once 'connection.php';

	$username = $_POST['username'];
	$fullname = $_POST['fullname'];
	$telephone = $_POST['telephone'];
	$email = $_POST['email'];
	$password1 = $_POST['password1'];
	$password2 = $_POST['password2'];

	$nameformat = RegExp (/^[a-zA-Z0-9*_]{5,14}$/);
	$phoneno =RegExp(/^[0-9+]{9,13}$/);
	$mailformat = RegExp(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/);
	$passw= RegExp(/^[a-zA-Z0-9!@#$%^&*_]{7,14}$/);

?>