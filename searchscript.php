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
		include 'footer.php';
	?>
</body>
</html>
<?php
	require_once 'connection.php';
	
	//get values passed from the html page
	$searchtitledescr = $_GET['searchtitledescr'];
	$searchuser = $_GET['searchuser'];
//	$searchcategory = $_GET['searchcategory'];
//	$searchlocation = $_GET['searchlocation'];
//	$searchdescription = $_GET['searchdescription'];

	//creates a prepared statement and binds variables as parameters
//	$stmt = $connection->prepare("SELECT * FROM advertisements WHERE title LIKE ? AND username LIKE ? AND categoryid = ? AND locationid = ? AND description LIKE ?");
//	$stmt->bind_param("ssiis", $searchtitle, $searchuser, $searchlocation, $searchcategory, $searchdescription);
	$stmt = $connection->prepare("SELECT * FROM advertisements WHERE title LIKE ? AND username LIKE ? AND description LIKE ?");
	$stmt->bind_param("sss", $searchtitledescr, $searchuser, $searchtitledescr);
	
	//allow for partial matches. TODO: allow user to specify whether they want partial or full matches
	$searchtitledescr = '%' . $searchtitledescr . '%';
	$searchuser = '%' . $searchuser . '%';
//	$searchdescription = '%' . $searchdescription . '%';

	//execute query
	$result = $stmt->execute();

	//get the result
	$result = $stmt->get_result();
   
	//get the number of rows
	$num_of_rows = $result->num_rows;
	
	//print it all out
	while ($row = $result->fetch_assoc()) {
		echo 'title: '.$row['title'].'<br>';
		echo 'username: '.$row['username'].'<br>';
		echo 'pricerequest: '.$row['pricerequest'].'<br>';
		echo 'leftdate: '.$row['leftdate'].'<br>';
		echo 'categoryid: '.$row['categoryid'].'<br>';
		echo 'locationid: '.$row['locationid'].'<br>';
		echo 'description: '.$row['description'].'<br><br>';
	}

   //free results
   $stmt->free_result();

$stmt->close();

?>