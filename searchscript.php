<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="description" content="online second-hand shopping platform!">
		<meta name="keywords" content="shopping, online, second-hand, fleamarket, HTML5, CSS">
		<meta name="authors" content="Robin Jacobs, Mikko Jaakonsaari">
		<link rel = "stylesheet" type = "text/css" href = "stylesheet.css">
		<title>Flea - Search Results</title>
	</head>
	<body>
		<?php
			include 'header.php';
			include 'nav.php';
		?>
		<br><div class=entrydiv>
			<a href="http://localhost/projectflea/search.php"> <u>&larr; Back to search</u></a>
			<br><br>
			<?php 
				require_once 'connection.php';
				//This code was taken from a comment on the PHP manual's mysqli_stmt::bind_param page, after repeated failure at getting my own code to store references in an array
				//http://fi2.php.net/manual/en/mysqli-stmt.bind-param.php#109256
				class BindParam
				{
					private $values = array(), $types = '';
					public function add( $type, &$value )
					{
						$this->values[] = &$value;	//Adds references to array, as bind_param and call_user_func_array requires.
						$this->types .= $type;		//Appends data type indicator to type string. This will become the first value in the array when get() is called
					}
					public function get()
					{
						return array_merge(array($this->types), $this->values);
					}
				} 
	
				//Get values passed from the html page
				$searchcategory = $_GET['searchcategory'];
				$searchlocation = $_GET['searchlocation'];
	
				//Same as above, and allow for partial string matches.
				$searchtitledescr = '%' . $_GET['searchtitledescr'] . '%';
				$searchuser = '%' . $_GET['searchuser'] . '%';
	
				//Begins the process of assembling what will become the prepared statement, and its parameters, based on what forms are non-empty
				$bindParam = new BindParam(); 
				$queryconditions = array();
				$fullstatement = 'SELECT * FROM advertisements a';
		
				//Checks whether all fields is empty, and if so prepares a basic statement.
				if ((empty($_GET['searchtitledescr'])) and (empty($_GET['searchuser'])) and (empty($_GET['searchcategory'])) and (empty($_GET['searchlocation'])))
				{
					$stmt = $connection->prepare($fullstatement);
				}
				//If not, checks whether each search field is not empty, and adds appropriate query conditions and parameters
				else
				{
					//If the category to search for is a child category, add basic WHERE clause like all the others
					if ((!empty($_GET['searchcategory'])) && ($_GET['searchcategory']) > 5)
					{
						$queryconditions[] = 'a.categoryid = ?';
						$bindParam->add('i', $searchcategory);
					}
					//For parent categories, things get a bit more complicated, as all WHERE clauses need to be added after JOIN.
					if ((!empty($_GET['searchcategory'])) && ($_GET['searchcategory']) <= 5)
					{
						$fullstatement .= ' JOIN categories c ON a.categoryid = c.id LEFT JOIN categories f on f.id = c.parentcategory';
						$queryconditions[] = 'c.parentcategory = ?';
						$bindParam->add('i', $searchcategory);
					}
					//Searches both title and description for the same string
					if (!empty($_GET['searchtitledescr']))
					{
						$queryconditions[] = '(a.title LIKE ? OR a.description LIKE ?)';
						$bindParam->add('s', $searchtitledescr);
						$bindParam->add('s', $searchtitledescr);
					}
					//Basic user ID match
					if (!empty($_GET['searchuser']))
					{
						$queryconditions[] = 'a.username LIKE ?';
						$bindParam->add('s', $searchuser);
					}
					//Basic location match from value given by dropdown
					if ((!empty($_GET['searchlocation'])) && ($_GET['searchlocation']) <= 19)
					{
						$fullstatement .= ' JOIN locations loc ON a.locationid = loc.id LEFT JOIN locations l on l.id = loc.parentlocation';
						$queryconditions[] = 'loc.parentlocation = ?';
						$bindParam->add('i', $searchlocation);
					}
					if ((!empty($_GET['searchlocation'])) && ($_GET['searchlocation']) > 19)
					{
						$queryconditions[] = 'a.locationid = ?';
						$bindParam->add('i', $searchlocation);
					}
					
					//Implode the queryconditions array, inserting ' AND ' in between each elemeent as it goes, and adding it to the base fullstatement
					$fullstatement = $fullstatement . " WHERE " . implode(" AND ",$queryconditions);
					
					//Prepares the now-assembled query
					$stmt = $connection->prepare($fullstatement);
					
					//Calls the array returned from bindParam function
					//In the form of 1st element = a string corresponding to parameter types, aferwards each element a reference to a parameter.
					//bind_param MUST be given references for the second element onwards.
					call_user_func_array(array($stmt, 'bind_param'), $bindParam->get()); 
				}
				//Debug printing, the final SQL query, and all parameters in the array given to bind_param
				//echo $fullstatement . "<br>";
				//var_dump($bindParam->get());
				//echo "<br>";
	
				//Execute the query
				$result = $stmt->execute();
	
				//get the result
				$result = $stmt->get_result();
	   
				//Get the number of rows
				$num_of_rows = $result->num_rows;
		
				//Print all of the results. If none, basic message printed instead.
				if ($num_of_rows == 0)
				{
					echo 'No results for your search. Try different parameters';
				}
				else
				{
				/*while ($row = $result->fetch_assoc())
				{
					echo '<a href="entryview.php?entry=' . $row['id'] . '">' . 'Entry Link</a> <br>';
					echo 'title: '.$row['title'].'<br>';
					echo 'username: '.$row['username'].'<br>';
					echo 'pricerequest: '.$row['pricerequest'].'<br>';
					echo 'leftdate: '.$row['leftdate'].'<br>';
					echo 'categoryid: '.$row['categoryid'].'<br>';
					echo 'locationid: '.$row['locationid'].'<br>';
					echo 'description: '.$row['description'].'<br><br>'; 
				} */
					$table="<table><tr>
					<th>Title</th>
					<th>Price Request</th>
					<th>Left Date</th>
					</tr>";
					while($row = $result->fetch_assoc()) 
						{
						$entryaddress = "entryview.php?entry=".$row['id'];
						$table.= "<tr>  
						<td><u> <a href=".$entryaddress.">".$row['title']."</a></u> </td> 
						<td>".$row['pricerequest']."</td> 
						<td>".$row['leftdate']."</td>
						</tr>";
						}
					$table.="</table>";
					echo $table;
				}
	
				//Free results from memory as they're no longer needed
				$stmt->free_result();
	
				//Close the statement
				$stmt->close();
			?>
		</div><br>
	</body>
	<?php
		include 'footer.php';
	?>
</html>
