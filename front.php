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
	<div class="entrydiv">
	<?php
		if(isset($_SESSION["delete_succesful"]))
		{
			echo $_SESSION["delete_succesful"];
			unset($_SESSION["delete_succesful"]);
		
		}
	?>
		<h2> What is Flea?</h2>
		<p>Flea is the bass player for american funk-rock band Red Hot Chili Peppers. But in this context, Flea is a school project to create an online fleamarket / second-hand store. </p>
		<p>In Flea, users can search for products other people are selling, or set up a new ad themselves. </p>
		<p>Here are some of the ads that have just popped up on the site:</p>
	<?php
		$showten = "SELECT title, leftdate, id, pricerequest FROM advertisements ORDER BY leftdate DESC LIMIT 10";

		// Query the database 
		$result = mysqli_query($connection, $showten);

		
		//print it all out
		$table="<table>
						<tr>
							<th>Title</th>
							<th>Price Request</th>
							<th>Left Date</th>
						</tr>";

		while ($row = $result->fetch_assoc()) 
		{
			$entryaddress = "entryview.php?entry=".$row['id'];
			$table.= "<tr>  <td><u> <a href=".$entryaddress.">".$row['title']."</a></u> </td> <td>".$row['pricerequest']."</td> <td>".$row['leftdate']."</td></tr>";
								
		}
		$table.="</table>";
		echo $table;
					
	?>
	<?php
		include 'footer.php';
	?>
</body>
</html>