<?php 
	require_once 'connection.php';
	
	//Fetches the entry number to search for from the part of the url 'entry=?'
	$entrynumber = $_GET['entry'];
	//Prepares and binds parameters for a basic SELECT query to get all of the entry details
	$stmt = $connection->prepare("SELECT advertisements.id, advertisements.pricerequest, advertisements.leftdate, locations.name AS location, categories.name AS category, advertisements.username, advertisements.title, advertisements.description FROM advertisements
JOIN locations ON advertisements.locationid = locations.id
JOIN categories ON advertisements.categoryid = categories.id
 WHERE advertisements.id = ?");

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
		$entrycategoryid = $row['category'];
		$entrylocationid = $row['location'];
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
		<title>Flea <?php if (empty($entrytitle)) echo ' - No entry found!'; else echo ' - ' . $entrytitle; ?></title>
	</head>
	<body>
		<?php
			include 'header.php';
			include 'nav.php';
		?>
		<br>
		<div class=entrydiv>
			<h4 class=entrydivheader><?php if (empty($entrytitle)) echo 'No entry found!'; else echo $entrytitle." - ".$entrypricerequest; ?></h4>
			<?php //Basic print out of the entry information. If no valid entry matching the given ID is found, it gives an error message.
			if (empty($entrytitle)) 
				echo 'Either the entry ID entered is invalid, or the entry you were looking for no longer exists.'; 
			else {
				echo 'By <b>'.$entryusername . '</b>. left on <b>'.$entryleftdate . '</b>.<br><br>';
				echo 'In category <b>'.$entrycategoryid . '.</b><br>';
				echo 'In <b>'.$entrylocationid . '.</b><br><br>';
				echo '<b>Description:</b><br><br>'; 
				echo nl2br($entrydescription) . '<br>';
			}
			//Admin button!
			
			if (adminPrivCheck($connection) == true)
			
			{
			
				echo '<button>Hello admin!</button>';
			
			}
			?>
		</div>
		<?php
			include 'footer.php';
		?>
	</body>
</html>