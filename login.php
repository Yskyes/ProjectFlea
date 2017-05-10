
<?php
	
	include 'connection.php'; //runs the connection script from other file
	
	$username = $_POST['loginusername'];
	$password = $_POST['loginpassword'];
	
	$sql = "SELECT * FROM sellers WHERE username='$username' AND password='$password'";
	$result = mysqli_query($connection, $sql);

	if (!$row = mysqli_fetch_assoc($result))
	{
		echo "Your username or password is incorrect.";
	}
	else
	{
		echo "You are logged in!";
	}

	//header("Location: flea_frontpage.html");

?>	