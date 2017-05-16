<?php 
	session_start();	
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="description" content="online second-hand shopping platform!">
	<meta name="keywords" content="shopping, online, second-hand, fleamarket, HTML5, CSS">
	<meta name="authors" content="Robin Jacobs, Mikko Jaakonsaari">
	<link rel = "stylesheet" type = "text/css" href = "stylesheet.css">
	<title>Flea</title>
</head>

<body>
	<?php
		include 'header.php';
	?>
	<?php
		include 'nav.php';
	?>
	
	<?php 
		if(isset($_SESSION["username"]))
		{
			echo "Logged in as ".$_SESSION["username"];
		}
		else
		{
			echo "No user logged in";
		}
	?>
	
	<?php
		include 'footer.php';
	?>
</body>
</html>