<?php
	require_once 'connection.php';
	
    	// Get values passed from the html page
//	$searchtitle = $_POST['searchtitle'];
	$searchuser = $_POST['searchuser'];
//	$searchcategory = $_POST['searchcategory'];
//	$searchlocation = $_POST['searchlocation'];
//	$searchdescription = $_POST['searchdescription'];

	//creates a prepared statement and binds variables as parameters
//	$stmt = $connection->prepare("SELECT * FROM advertisments WHERE title LIKE ? AND username LIKE ? AND category_id = ? AND location_id = ? AND description LIKE ?");
//	$stmt->bind_param("ssiis", $searchtitle, $searchuser, $searchlocation, $searchcategory, $searchdescription);
	$stmt = $connection->prepare("SELECT * FROM advertisements WHERE username LIKE ?");
	$stmt->bind_param("s", $searchuser);

	// Query the database 
	$result = $stmt->execute();

   /* Get the result */
   $result = $stmt->get_result();
   
   /* Get the number of rows */
   $num_of_rows = $result->num_rows;
   
      while ($row = $result->fetch_assoc()) {
        echo 'title: '.$row['title'].'<br>';
        echo 'username: '.$row['username'].'<br>';
        echo 'categoryid: '.$row['categoryid'].'<br>';
        echo 'locationid: '.$row['locationid'].'<br>';
		echo 'description: '.$row['description'].'<br><br>';
   }

   /* free results */
   $stmt->free_result();


	// Places result line in an array and prints
//	while ($row = mysqli_fetch_array($result))
//	{
//	echo 'id: ' .$row['id'];
//	echo '<br /> title: ' .$row['title'];
//	echo '<br /> user_username: ' .$row['user_username'];
//	echo '<br /> category_id: ' .$row['category_id'];
//	echo '<br /> location_id: ' .$row['location_id'];
//	echo '<br /> description: ' .$row['description'];
//	echo '<br /> pricerequest: ' .$row['pricerequest'];
//	echo '<br /> picture: ' .$row['picture'];
//	echo '<br /> leftdate: ' .$row['leftdate'];
//	}

	$stmt->close();

?>	