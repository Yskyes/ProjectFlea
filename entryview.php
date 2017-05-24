<?php 
	require_once 'connection.php';
	$entrynumber = $_GET['entry'];
	$stmt = $connection->prepare("SELECT * FROM advertisements WHERE id = ?");
	$stmt->bind_param("i", $entrynumber);
		//execute query
	$result = $stmt->execute();

	//get the result
	$result = $stmt->get_result();
   
	//get the number of rows
	$num_of_rows = $result->num_rows;
	//print it all out
	while ($row = $result->fetch_assoc()) {
/*		echo 'title: '.$row['title'].'<br>';
		echo 'username: '.$row['username'].'<br>';
		echo 'pricerequest: '.$row['pricerequest'].'<br>';
		echo 'leftdate: '.$row['leftdate'].'<br>';
		echo 'categoryid: '.$row['categoryid'].'<br>';
		echo 'locationid: '.$row['locationid'].'<br>';
		echo 'description: '.$row['description'].'<br><br>'; */
		$entrytitle = $row['title'];
		$entryusername = $row['username'];
		$entrypricerequest = $row['pricerequest'];
		$entryleftdate = $row['leftdate'];
		$entrycategoryid = $row['categoryid'];
		$entrylocationid = $row['locationid'];
		$entrydescription = $row['description'];
	}
	//free results
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
	<title>Flea</title>
</head>

<body>
	<?php
		include 'header.php';
	?>
	<?php
		include 'nav.php';
	?>
	<br>
	<div class=entrydiv><h4 class=entrydivheader>Entry <?php echo $entrynumber . ': ' . $entrytitle; ?></h4>
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