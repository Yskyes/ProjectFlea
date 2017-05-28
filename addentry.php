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
	<!-- Everything the user needs for creating a new entry is here -->
	<div class=entrydiv><h4 class=entrydivheader>Create an entry:</h4>
		<form action="./addentryscript.php" method="POST" name="addentry">
			<!-- An answer on Stack Overflow by a W3School employee suggested using tables for this on particular purpose -->
			<table> 
				<tr><td>Title:</td><td><input type="text" name=title></td></tr>
				<tr><td>Asking price:</td><td><input type="text" name=price></td></tr>
				<tr><td>Location (use municipality or region) : </td><td><input type="text" name=location></td></tr>
				<tr><td>Select category:</td><td><select name="category">
					<option value=1>---Entertainment</option>
					<option value=6>Books</option>
					<option value=7>Films</option>
					<option value=8>Music</option>
					<option value=9>Video Games</option>
					<option value=10>Board Games</option>
					<option value=11>Art & Supplies</option>
					<option value=12>Toys</option>
					<option value=13>Sports Equipment</option>
					<option value=2>---Electronics</option>
					<option value=14>Computers, Components & Accessories</option>
					<option value=15>Phones & Accessories</option>
					<option value=16>TV & Video</option>
					<option value=17>Audio Equipment & Accessories</option>
					<option value=18>Musical Equipment & Accessories</option>
					<option value=19>Wearables, Small Electronics & Misc.</option>
					<option value=3>--- Home, Garden & DIY</option>
					<option value=20>Tools</option>
					<option value=21>Appliances</option>
					<option value=22>Lighting</option>
					<option value=23>Furniture</option>
					<option value=24>Pet Supplies, Toys & Misc.</option>
					<option value=25>Garden Supplies & Decoration</option>
					<option value=26>Kitchen, Bathroom & Toilet Fixtures</option>
					<option value=27>Flooring, Carpets, Wallpaper & Paints</option>
					<option value=28>Windows, Frames, Curtains & Blinds</option>
					<option value=4>--- Clothing, Travel & Jewelry</option>
					<option value=29>Men</option>
					<option value=30>Women</option>
					<option value=31>Children</option>
					<option value=32>Babies</option>
					<option value=33>Shoes</option>
					<option value=34>Jewelry</option>
					<option value=35>Luggage</option>
					<option value=5>--- Vehicles</option>
					<option value=36>Cars</option>
					<option value=37>Vans</option>
					<option value=38>Motorcycles</option>
					<option value=39>Lorries</option>
					<option value=40>Tyres</option>
					<option value=41>Fluids</option>
					<option value=42>Electronics & Accessories</option>
					<option value=43>Spare/Replacement Parts</option>
				</select></td></tr>
		  		<tr><td>Select image: <td align="left"><input type="file" name="pic" accept="image/*"></td>
		  		<tr><td>Description</td><td>(max 400 characters):</td></tr>
				<tr><td><textarea  colspan="2" name="description" cols="50" rows="10"></textarea></td></tr>
				<tr><td colspan="2"><input type="checkbox" name="agreement" value=1>I have read and agree to the Terms & Conditions<br></td></tr>
				<tr><td><input type="submit" value="Submit Entry"></td>
	  		</table>
		</form>
	</div>
	<?php
		include 'footer.php';
	?>
</body>
</html>