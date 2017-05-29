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
		<title>Flea - Report Entry</title>
	</head>
	<body>
		<?php
			include 'header.php';
			include 'nav.php';
		?>
		<br>
		<div class=entrydiv>
            <?php 
			if (!isset($_SESSION["username"]))
            {
            echo '<h4 class=entrydivheader>404 - Page Not Found</h4>';
            echo 'Check the URL you typed in, or inform the administration if this page should exist.<br>';
            exit();
            }
            else 
            {
                if (empty($_POST['entry_id']))
                    echo 'No valid ID given';
                else
                {
                	$stmt = $connection->prepare("UPDATE advertisements SET reported = 1, reportdescription = ?  WHERE id = ?");
                	$entryid = $_POST['entry_id'];
                	$reportdescription = $_POST['reportdescription'];
                	$stmt->bind_param('si',$reportdescription, $entryid);
                	$stmt->execute();
                    echo 'Report sent.';
                    $stmt->close();
                }
            }
            ?>
            <br><a href="http://localhost/projectflea/front.php"> <u>&larr; Back to front page</u></a>
		</div>
		<?php
			include 'footer.php';
		?>
	</body>
</html>