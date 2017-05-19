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
	<h4 class=entrydivheader>User Details:</h4>
	    <ul>
	    	<li>Own Entries</li><!-- This should execute a search upon loading and list links to all user's own entries --><br>
	    	<li>Own Details</li><!-- Search results for details of the current user, executed upon page loading and authenticated by session i.e. user can see only their own details --><br>
    	</ul><br>
    	Change your details:
    	<table>
    		<tr><td>New Password:</td><td><input type="password" name="changepassword1" id="changepassword1"></tr>
    		<tr><td>Confirm Mew Password:</td><td><input type="password" name="changepassword2" id="changepassword2"></tr><!-- checks that it's the same as what's entered in the first one, returns error if not -->
    		<tr><td>Change Email:</td><td><input type="email" name="changeemail" id="changeemail"></tr>
    		<tr><td>Select avatar: <td align="left"><input type="file" name="avatar" accept="image/*"></td><!-- Probably not going to be used -->
    		<tr><td>Full name: </td><td><input type="text" name="fullname" id="fullname"></tr><!-- Should we allow user to change their full name on a whim? Username should definitely only be changed by admin action -->
			<tr><td>Telephone number: </td><td><input type="text" name="telephone" id="telephone"></tr>
    		<tr><td>Current Password:</td><td><input type="password" name="currentpassword" id="currentpassword"></tr><!-- Only accept changes if password is correct, standard security measure -->
    	</table>
	</div>
	<?php
		include 'footer.php';
	?>
</body>
</html>