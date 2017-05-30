<?php 
	require_once 'connection.php';
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="description" content="online second-hand shopping platform!">
		<meta name="keywords" content="shopping, online, second-hand, fleamarket, HTML5, CSS">
		<meta name="authors" content="Robin Jacobs, Mikko Jaakonsaari">
		<link rel = "stylesheet" type = "text/css" href = "stylesheet.css">
		<title>Flea - Page not Found</title>
	</head>
	<body>
		<?php
			include 'header.php';
			include 'nav.php';
		?>
		<br>
		<div class=entrydiv>
            <h4 class=entrydivheader>404 - Page Not Found</h4>
            Check the URL you typed in, or inform the administration if this page should exist.<br>
            <br><a href="http://localhost/projectflea/front.php"> <u>&larr; Back to front page</u></a>
		</div>
		<?php
			include 'footer.php';
		?>
	</body>
</html>