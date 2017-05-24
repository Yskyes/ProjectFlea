<?php 
	require_once 'connection.php';
	
	//Fetches the entry number to search for from the part of the url 'entry=?'
	$entrynumber = $_GET['entry'];
	//Prepares and binds parameters for a basic SELECT query to get all of the entry details
	$stmt = $connection->prepare("SELECT * FROM advertisements WHERE id = ?");
	$stmt->bind_param("i", $entrynumber);
	//Execute query
	$result = $stmt->execute();
	//Get the result
	$result = $stmt->get_result();
	//Get the number of rows
	$num_of_rows = $result->num_rows;
	//Save it in variables (mainly needed to alter the title, otherwise echoing it in the body itself would've worked fine)
	while ($row = $result->fetch_assoc()) {
		$entrytitle = $row['title'];
		$entryusername = $row['username'];
		$entrypricerequest = $row['pricerequest'];
		$entryleftdate = $row['leftdate'];
		$entrycategoryid = $row['categoryid'];
		$entrylocationid = $row['locationid'];
		$entrydescription = $row['description'];
	}
	//Free results and close statement
	$stmt->free_result();
	$stmt->close();
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="description" content="online second-hand shopping platform!">
		<meta name="keywords" content="shopping, online, second-hand, fleamarket, HTML5, CSS">
		<meta name="authors" content="Robin Jacobs, Mikko Jaakonsaari">
		<link rel = "stylesheet" type = "text/css" href = "stylesheet.css">
		<title>Flea <?php echo ' - ' . $entrytitle; ?></title>
	</head>
	<body>
		<?php
			include 'header.php';
			include 'nav.php';
		?>
		<br>
		<div class=entrydiv>
			<h4 class=entrydivheader>Entry <?php echo $entrynumber . ': ' . $entrytitle; ?></h4>
			<?php 
				echo $entryusername . '<br>';
				echo $entrypricerequest . '<br>';
				echo $entryleftdate . '<br>';
				echo $entrycategoryid . '<br>';
				echo $entrylocationid . '<br>';
				echo $entrydescription . '<br>';
			?>
		</div>
		<?php
			include 'footer.php';
		?>
	</body>
</html>