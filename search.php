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
	<div class=entrydiv><h4 class=entrydivheader>Search Entries:</h4>
		<form action="searchscript.php" method="POST">
			<table>
				<tr><td>By Username:</td><td><input type="text" name="searchuser"></tr>
				<tr><td>By Location:</td><td><input type="text" name="searchlocation"></tr>
				<tr><td>By Category:</td><td><select name="searchcategory">
					<option disabled>--- Entertainment</option>
					<option value=6>Books</option>
					<option value=7>Films</option>
					<option value=8>Music</option>
					<option value=9>Video Games</option>
					<option value=10>Board Games</option>
					<option value=11>Art & Supplies</option>
					<option value=12>Toys</option>
					<option value=13>Sports Equipment</option>
					<option disabled>--- Electronics</option>
					<option value=14>Computers, Components & Accessories</option>
					<option value=15>Phones & Accessories</option>
					<option value=16>TV & Video</option>
					<option value=17>Audio Equipment & Accessories</option>
					<option value=18>Musical Equipment & Accessories</option>
					<option value=19>Wearables, Small Electronics & Misc.</option>
					<option disabled>--- Home, Garden & DIY</option>
					<option value=20>Tools</option>
					<option value=21>Appliances</option>
					<option value=22>Lighting</option>
					<option value=23>Furniture</option>
					<option value=24>Pet Supplies, Toys & Misc.</option>
					<option value=25>Garden Supplies & Decoration</option>
					<option value=26>Kitchen, Bathroom & Toilet Fixtures</option>
					<option value=27>Flooring, Carpets, Wallpaper & Paints</option>
					<option value=28>Windows, Frames, Curtains & Blinds</option>
					<option disabled>--- Clothing, Travel & Jewelry</option>
					<option value=29>Men</option>
					<option value=30>Women</option>
					<option value=31>Children</option>
					<option value=32>Babies</option>
					<option value=33>Shoes</option>
					<option value=34>Jewelry</option>
					<option value=35>Luggage</option>
					<option disabled>--- Vehicles</option>
					<option value=36>Cars</option>
					<option value=37>Vans</option>
					<option value=38>Motorcycles</option>
					<option value=39>Lorries</option>
					<option value=40>Tyres</option>
					<option value=41>Fluids</option>
					<option value=42>Electronics & Accessories</option>
					<option value=43>Spare/Replacement Parts</option>
				</select></td></tr>
				<tr><td>By Title:</td><td><input type="text" name="searchtitle"></tr>
				<tr><td>By Description: </td><td><input type="text" name="searchdescription"></tr>
				<tr><td><input type="submit" value="Submit" name="submit_search"></tr>
			</table>
		</form>
	</div>
	<?php
		include 'footer.php';
	?>
</body>
</html>