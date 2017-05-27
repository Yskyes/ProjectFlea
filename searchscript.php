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
						$this->values[] = &$value;
						$this->types .= $type;
					}
					public function get()
					{
						return array_merge(array($this->types), $this->values);
					}
				} 
	
				//Get values passed from the html page
				$searchcategory = $_GET['searchcategory'];
				$searchlocation = $_GET['searchlocation'];
	
				//Same as above, and allow for partial matches. TODO: allow user to specify whether they want partial or full matches
				$searchtitledescr = '%' . $_GET['searchtitledescr'] . '%';
				$searchuser = '%' . $_GET['searchuser'] . '%';
	
				//Begins the process of assembling what will become the prepared statement, and its parameters, based on what forms are non-empty
				$bindParam = new BindParam(); 
				$queryconditions = array();
				$fullstatement = ("SELECT * FROM advertisements");
		
				//Checks whether each field is empty. If not, it adds the relevant query conditions and parameters for bind_param
				if (!empty($_GET['searchtitledescr']))
				{
					$queryconditions[] = '(title LIKE ? OR description LIKE ?)';
					$bindParam->add('s', $searchtitledescr);
					$bindParam->add('s', $searchtitledescr);
				}
	
				if (!empty($_GET['searchuser']))
				{
					$queryconditions[] = 'username LIKE ?';
					$bindParam->add('s', $searchuser);
				}
		
				if (!empty($_GET['searchcategory']))
				{
					$queryconditions[] = 'categoryid = ?';
					$bindParam->add('i', $searchcategory);
				}
	
				if (!empty($_GET['searchlocation']))
				{
					$queryconditions[] = 'locationid = ?';
					$bindParam->add('i', $searchlocation);
				}
				
				//Implode the queryconditions array, inserting ' AND ' in between each elemeent as it goes, and adding it to the base fullstatement
				$fullstatement = $fullstatement . " WHERE " . implode(" AND ",$queryconditions);
				
				//Prepares the now-assembled query
				$stmt = $connection->prepare($fullstatement);
				
				//Calls the array returned from bindParam function
				//In the form of 1st element = a string corresponding to parameter types, aferwards each element a reference to a parameter.
				//bind_param MUST be given references for the second element onwards. Dunno why.
				call_user_func_array(array($stmt, 'bind_param'), $bindParam->get()); 
		
				//Debug printing, the final SQL query, and all parameters in the array given to bind_param
				// echo $fullstatement . "<br>";
				// var_dump($bindParam->get());
				// echo "<br>";
	
				//Execute the query
				$result = $stmt->execute();
	
				//get the result
				$result = $stmt->get_result();
	   
				//Get the number of rows
				$num_of_rows = $result->num_rows;
		
				//Print all of the results
				if ($num_of_rows == 0)
				{
					echo 'No results for your search. Try different parameters';
				}
				else
				{
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
