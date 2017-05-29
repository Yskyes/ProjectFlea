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
		<title>Flea - Admin Stuff</title>
	</head>
	<body>
		<?php
			include 'header.php';
			include 'nav.php';
		?>
		<br>
		<div class=entrydiv>
			<h4 class=entrydivheader>Deleted entry</h4>
            <?php 
            	$stmt = $connection->prepare("DELETE FROM advertisements WHERE id = ?");
            	$entryid = $_POST['entry_id'];
            	$stmt->bind_param('i',$entryid);
            	$stmt->execute();
                printf("%d Row deleted.\n", $connection->affected_rows);
                $stmt->close();
            ?>
            <br><a href="http://localhost/projectflea/front.php"> <u>&larr; Back to front page</u></a>
		</div>
		<?php
			include 'footer.php';
		?>
	</body>
</html>