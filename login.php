
<?php
	define("THREE_HOURS", 60*60*3);
	

	// Create connection to XAMPP and its DB
	$connection = mysqli_connect('localhost', 'root', '');
	if(!$connection)
	{
		die("Database connection failed".mysqli_error($connection));
	}
	$select_db = mysqli_select_db($connection, 'fleadb');
	if (!$select_db)
	{
    	die("Database Selection Failed" . mysqli_error($connection));
    }
    // Get values passed from the login form
	$username = $_POST['username'];
	$password = $_POST['password'];

	session_start();

	// Query the database 
	$result = mysqli_query($connection, "SELECT * FROM users WHERE username='$username' AND password='$password'");
	// Places result line in an array
	$row = mysqli_fetch_array($result);
	if ($row['username']==$username && $row['password']==$password)
	{
		echo "Welcome, ".$username;
		setcookie("username", @_POST["username"], time()+ THREE_HOURS);
		setcookie("password", @_POST["password"], time()+ THREE_HOURS);
	}
	else
	{
		echo "Login failed. Please check your credentials.";
	}
?>	