<?php
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="description" content="online second-hand shopping platform!">
	<meta name="keywords" content="shopping, online, second-hand, fleamarket, HTML5, CSS">
	<meta name="authors" content="Robin Jacobs, Mikko Jaakonsaari">
	<link rel = "stylesheet" type = "text/css" href = "stylesheet.css">
	<title>Flea Terms and Conditions</title>
</head>

<body>
	<?php
		include 'header.php';
	?>
	<?php
		include 'nav.php';
	?>
	<br>
		<div class=entrydiv><br>
		<h4 class=entrydivheader>Terms and Conditions</h4>
			<p>By using and/or registering on this site, you agree to:</p>
			<ul class=toclist>
				<li>Follow all applicable Finnish legislation</li><br>
				<li>Conduct yourself in a polite and civil manner towards other users</li><br>
				<li>Provide descriptions and pictures of products for sale that are not misleading or inaccurate</li>
			</ul>
			<p>We reserve the right to punish users for breach of these terms including, but not limited to temporary
			or permanent suspension of user account rights. Breaches of the law will be reported to the relevant
			authorities.</p>
			<p>Flea is provided as a service without warranty of any kind; while we will make every effort to 
			ensure proper functioning and uptime, this is not guaranteed. Methods of payment are subject to the
			terms of use from the providers thereof. Payment disorders, in addition to sanctions that payment service
			providers may apply, suspension or termination of one's user account here may also be applied.</p>
		</div>
	<?php
		include 'footer.php';
	?>
</body>
</html>