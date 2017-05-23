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
	
	//This code was taken from a comment on the PHP manual's mysqli_stmt::bind_param page, after repeated failure at getting my own code to store references in an array
	//http://fi2.php.net/manual/en/mysqli-stmt.bind-param.php#109256
	class BindParam{
    	private $values = array(), $types = '';
   
    	public function add( $type, &$value )
    	{
    		$this->values[] = &$value;
        	$this->types .= $type;
    	}
   
    	public function get(){
        	return array_merge(array($this->types), $this->values);
    	}
	} 
	
	//get values passed from the html page
	$searchcategory = $_GET['searchcategory'];
	$searchlocation = $_GET['searchlocation'];

	//allow for partial matches. TODO: allow user to specify whether they want partial or full matches
	$searchtitledescr = '%' . $_GET['searchtitledescr'] . '%';
	$searchuser = '%' . $_GET['searchuser'] . '%';

	//assemble what will become the prepared statement, and it's parameters, based on what forms are non-empty
	$bindParam = new BindParam(); 
	$queryconditions = array();
	$fullstatement = ("SELECT * FROM advertisements");
	
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
	
/*	$queryconditions = array();
	$variabletype = "";
    $statementvariables = array();

	//creates a prepared statement and binds variables as parameters
	$fullstatement = ("SELECT * FROM advertisements");
	
	if (!empty($_GET['searchtitledescr']))
	{
		$queryconditions[] = "(title LIKE ? OR description LIKE ?)";
		$variabletype = $variabletype . 'ss';
		$statementvariables[] = & $searchtitledescr;
		$statementvariables[] = & $searchtitledescr;

	}
	if (!empty($_GET['searchuser']))
	{
		$queryconditions[] = "username LIKE ?";
		$variabletype = $variabletype . 's';
		$statementvariables[] = & $searchuser;
	}
	if (!empty($_GET['searchcategory']))
	{
		$queryconditions[] = "categoryid = ?";
		$variabletype = $variabletype . 'i';
		$statementvariables[] = & $searchcategory;
	}
	if (!empty($_GET['searchlocation']))
	{
		$queryconditions[] = "locationid = ?";
		$variabletype = $variabletype . 'i';
		$statementvariables[] = & $searchlocation;
	}*/
	$fullstatement = $fullstatement . " WHERE " . implode(" AND ",$queryconditions);
//	array_unshift($statementvariables, $variabletype);
	$stmt = $connection->prepare($fullstatement);
	
	call_user_func_array(array($stmt, 'bind_param'), $bindParam->get()); 
	
//	echo $variabletype;					//debug stuff
//	var_dump($statementvariables);
	echo $fullstatement;
	var_dump($bindParam->get());
	
//	call_user_func_array(array($stmt, "bind_param"), array($statementvariables));
//	$stmt->bind_param("ssiis", $searchtitle, $searchuser, $searchlocation, $searchcategory, $searchdescription);
//	$stmt = $connection->prepare("SELECT * FROM advertisements WHERE title LIKE ? AND username LIKE ? AND description LIKE ?");
//	$stmt->bind_param("sss", $searchtitledescr, $searchuser, $searchtitledescr);

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