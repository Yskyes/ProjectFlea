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
	<script type="text/javascript">
			function validateRegister()
			{

				var nameformat = RegExp (/^[a-zA-ZÄäÖöÅå0-9_]{5,14}$/);
				var username = document.getElementById("username").value;
				if (!(nameformat.test(username))) //username check
				{
					document.getElementById("username").style.borderColor = "red";
					alert("Username must be 5 to 14 characters long or has illegal characters.");
					return false;
				}

				var fullnameformat = RegExp (/^[a-zA-ZÄäÖöÅå'-\s]{5,40}$/);
				var fullname = document.getElementById("fullname").value;
				if (!(fullnameformat.test(fullname))) //username check
				{
					document.getElementById("fullname").style.borderColor = "red";
					alert("Full name is shorter than 5 digits, is missing, or has illegal characters.");
					return false;
				}

				if (document.getElementById('fullname').value=="") //full name check
				{
					document.getElementById("fullname").style.borderColor = "red";
					alert("Full name is required");
					return false;
				}

				// checks that the phone number is in the correct format, eg. european or with country code
				var phoneno =RegExp(/\+?\d{1,4}?[-.\s]?\(?\d{1,3}?\)?[-.\s]?\d{1,4}[-.\s]?\d{1,4}[-.\s]?\d{1,9}/);
				var number = document.getElementById("telephone").value;  
			  	if(!(phoneno.test(number)))  
			    {  
			    	document.getElementById("telephone").style.borderColor = "red";
			      	alert("phonenumber did not meet the given form");  
			  		return false;  
			    }  
			  	
				//check that the email contains a proper domain name 
				var mailformat = RegExp(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/);
				var address = document.getElementById("email").value;
				if(!(mailformat.test(address)))
				{   
					document.getElementById("email").style.borderColor = "red";
					alert("You have entered an invalid email address.");  
					return false; 
				}  
				
				//check that password is long enough and that the two passwords match
				var passw= RegExp(/^[a-zA-Z0-9_]{7,32}$/);
				var inputtxt1 = document.getElementById("password1").value;
				var inputtxt2 = document.getElementById("password2").value;
				
				if(passw.test(inputtxt1))   
				{   
					if (!(inputtxt1 == inputtxt2))
					{
						document.getElementById("password1").style.borderColor = "red";
						document.getElementById("password2").style.borderColor = "red";
						alert("The two passwords you entered do not match.");
						return false;
					} 
				}  
				else  
				{ 
				document.getElementById("password1").style.borderColor = "red";
				document.getElementById("password2").style.borderColor = "red";  
				alert("Password must be 7-32 characters long and only include letters, numbers or underscores.");
				return false;  
				}
				
			}
			function ValidateLogin()
			{
				var nameformat = RegExp (/^[a-zA-Z0-9_]{5,14}$/);
				var username = document.getElementById("loginusername").value;
				
				if (!(nameformat.test(username))) //username check
				{
					alert("Username must be 5 to 14 characters long or has illegal characters.");
					return false;
				}

				var passw= RegExp(/^[a-zA-Z0-9_]{7,32}$/);
				var inputtxt1 = document.getElementById("loginpassword").value;

				if(!(passw.test(inputtxt1))) 
				{   
					alert("Password must be 7 to 32 characters long or has illegal characters.");
					return false;
				}  
	
			}

  
	</script>
</head>

<body>
	<?php
		include 'header.php';
	?>
	<?php
		include 'nav.php';
	?>
	<br>
	<p id="error">  </p>
	<div class=entrydiv><h4 class=entrydivheader>Register:</h4>
		<form name="register" action="registerscript.php" method="POST" onsubmit="return validateRegister()"  autocomplete="on"  >
		<!--  -->
			<table>
<!-- An answer on Stack Overflow by a W3School employee suggested using tables for this on particular purpose -->
				<tr><td>Username: </td><td><input type="text" name="username" id="username"></tr>
				<?php
					if (isset($_SESSION["registeruser"]))
					{
						echo ("<tr><td>" .  $_SESSION["registeruser"]. " </tr></td>");
						unset($_SESSION["registeruser"]);
					}
					
				?>
				<tr><td>Full name: </td><td><input type="text" name="fullname" id="fullname"></tr>
				<?php
					if (isset($_SESSION["registerfull"]))
					{
						echo ("<tr><td>" .  $_SESSION["registerfull"]. " </tr></td>");
						unset($_SESSION["registerfull"]);
					}
					
				?>
				<tr><td>Telephone number: </td><td><input type="text" name="telephone" id="telephone"></tr>
				<?php
					if (isset($_SESSION["registerphone"]))
					{
						echo ("<tr><td>" .  $_SESSION["registerphone"]. " </tr></td>");
						unset($_SESSION["registerphone"]);
					}
					
				?>
				<tr><td>Email Address: </td><td><input type="text" name="email" id="email"></tr>
				<?php
					if (isset($_SESSION["registeremail"]))
					{
						echo ("<tr><td>" .  $_SESSION["registeremail"]. " </tr></td>");
						unset($_SESSION["registeremail"]);
					}
					
				?>
				<tr><td>Password: </td><td><input type="password" name="password1" id="password1"></tr>
				<tr><td>Confirm password: </td><td><input type="password" name="password2" id="password2"></tr>
				<?php
					if (isset($_SESSION["registerpassword"]))
					{
						echo ("<tr><td>" .  $_SESSION["registerpassword"]. " </tr></td>");
						unset($_SESSION["registerpassword"]);
					}
					
				?>
				<tr><td colspan="2"><input type="checkbox" name="agreement" value=1 required  >I have read and agree to the Terms and Conditions<br></td></tr>
				<tr><td><input type="submit" value="Register" name="submit_userinfo"></tr>
			</table>
			<?php
					if (isset($_SESSION["registermsg"]))
					{
						echo ("<p>". $_SESSION["registermsg"]."</p>");
						unset($_SESSION["registermsg"]);
					}
			?>
		</form>
		<h4 class=entrydivheader>Already registered? Login:</h4>

		<form name="login" method="POST" action="loginscript.php"  autocomplete="on" onsubmit="return ValidateLogin()" >
			<table>
				<tr><td>Username: </td><td><input type="text" name="loginusername" id="loginusername"></tr>
				<tr><td>Password: </td><td><input type="password" name="loginpassword" id="loginpassword"></tr>
				<?php
					if (isset($_SESSION["logged"]) && $_SESSION["logged"] == False)
					{
						unset($_SESSION["logged"]);
					}
					if(isset($_SESSION["loginerror"]))
					{
						echo ("<tr><td>" .  $_SESSION["loginerror"]. " </tr></td>");
					}
				?>
				<tr><td><input type="submit" value="login" name="submit_login"></tr>
			</table>
		</form>
	</div>
	<?php
		include 'footer.php';
	?>
</body>
</html>