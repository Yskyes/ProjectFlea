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
	    
	    	<li><b>Own Entries</b></li><br>
			<!-- This should execute a search upon loading and list links to all user's own entries -->
				<?php
	    			// Check that the user is logged in, otherwise redirect
					if(!(isset($_SESSION["username"])))
					{
						header("Location: ./login.php" );
						Exit();
					}
					// Fetch user info
					$user = $_SESSION["username"];
					$userentries = "SELECT id, title, leftdate FROM advertisements 
					JOIN sellers ON advertisements.username = sellers.username WHERE sellers.username = '$user'";

					// Query the database 
					$result = mysqli_query($connection, $userentries);

					if(mysqli_num_rows($result) == 0)
					{
						echo "<br> You do not have any advertisements.<br>";
					}
					
					else
					{
						//print it all out
						$table="<table><tr>
								    <th>Id</th>
								    <th>Title</th>
								    <th>Left Date</th>
							  </tr>";
						while ($row = $result->fetch_assoc()) 
						{
							$table.= "<tr> <td>".$row['id']."</td> <td>".$row['title']."</td> <td>".$row['leftdate']."</td> </tr>";
							
						}
						$table.="</table>";
						echo $table;
					}

				?>


			<br>
	    	<b>Own Details</b>
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
						
							echo '<br>'.$row['username'].'<br>';
							echo $row['fullname'].'<br>';
							echo $row['email'].'<br>';
							echo $row['telephone'].'<br>';
					}

				?>

	    		<!-- Search results for details of the current user, executed upon page loading and authenticated by session i.e. user can see only their own details --><br>
    		<br>
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