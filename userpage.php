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
	<h4 class="entrydivheader">User Details:</h4>
	    <ul>
	    	<li><b>Own Entries</b></li><br><!-- This should execute a search upon loading and list links to all user's own entries --><br>
	    	<li><b>Own Details</b></li>
	    		<?php
	    			// Check that the user is logged in, otherwise redirect
					if(!(isset($_SESSION["username"])))
					{
						header("Location: ./login.php" );
						Exit();
					}
					// Fetch user info
					$user = $_SESSION["username"];
					$userinfo = "SELECT username, fullname, email, telephone FROM sellers WHERE username = '$user'";

					// Query the database 
					$result = mysqli_query($connection, $userinfo);

					//print it all out
					while ($row = $result->fetch_assoc()) 
					{
						echo '<ul class="sublist">';
							echo '<br><li>'.$row['username'].'</li><br>';
							echo '<li>'.$row['fullname'].'</li><br>';
							echo '<li>'.$row['email'].'</li><br>';
							echo '<li>'.$row['telephone'].'</li><br>';
						echo '</ul>';
						
					}

				?>

	    		<!-- Search results for details of the current user, executed upon page loading and authenticated by session i.e. user can see only their own details --><br>
    	</ul><br>
    	<b>Change your details:</b>
    	<table>
    		<tr><td>New Password:</td><td><input type="password" name="changepassword1" id="changepassword1"></tr>
    		<tr><td>Confirm New Password:</td><td><input type="password" name="changepassword2" id="changepassword2"></tr><!-- checks that it's the same as what's entered in the first one, returns error if not -->
    		<tr><td>Change Email:</td><td><input type="email" name="changeemail" id="changeemail"></tr>
    		<tr><td>Select avatar: <td align="left"><input type="file" name="avatar" accept="image/*"></td><!-- Probably not going to be used -->
			<tr><td>Telephone number: </td><td><input type="text" name="telephone" id="telephone"></tr>
    		<tr><td>Current Password:</td><td><input type="password" name="currentpassword" id="currentpassword"></tr><!-- Only accept changes if password is correct, standard security measure -->
    	</table>
	</div>
	<?php
		include 'footer.php';
	?>
</body>
</html>