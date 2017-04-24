<?php

	// variables used in script

	$username = isset($_POST["username"]) ? $_POST["username"]:"";
	$fullname = isset($_POST["fullname"]) ? $_POST["fullname"]:"";
	$email = isset($_POST["email"]) ? $_POST["email"]:"";
	$password = isset($_POST["password"]) ? $_POST["password"]:"";
	$telephone = isset($_POST["telephone"]) ? $_POST["telephone"]:"";
	
	$iserror = false;
	$formerrors = 
	array("usernameerror"=>false, "fullnameerror"=>false, "emailerror"=>false, "passworderror"=>false, "telephoneerror"=>false);
	
	$inputlist = array ("username"=>"Username", "fullname"=>"Full Name", "email"=>"Email", "password"=>"Password", "telephone"=>"Telephone");
	// form normalisation

	if (isset($_POST["submit"]))
	{

		if ($username=="")
		{
			$formerrors["usernameerror"] = true;
			$iserror = true;
		}

		if ($fullname=="")
		{
			$formerrors["fullnameerror"] = true;
			$iserror = true;
		}

		if ($password=="")
		{
			$formerrors["passworderror"] = true;
			$iserror = true;
		}

		if ($email=="")
		{
			$formerrors["emailerror"] = true;
			$iserror = true;
		}

		if(!preg_match (" /^\([0-9]{3}\) [0-9]{3} - [0-9]{4}$/", $telephone))
		{
			$formerrors["telephoneerror"] = true;
			$iserror = true;
		}

		if (!$iserror)
		{
			//build INSERT query
			$query = "INSERT INTO users"."(username, fullname, password, email, telephone)"."VALUES ('$username','$fullname','$password','$email',"."'".mysqli_real_escape_string($telephone)."')";

			// Connect to DB
			(if !($database = mysqli_connect("localhost", "user", "", "fleadb"))
			{
				die("<p>Could not connect to the database</p>");
			}
			
			(if !mysqli_select_db("fleadb", $database))
			{
				die("<p>Could not open the users database</p>");
			}

			//execute query
			if (!($result = mysqli_query($query, $database)))
			{
				print ("<p>Could not execute query!</p>");
				die (mysqli_error());
			}

			mysqli_close($databse);

			print ( "<p>Hello $username. Your registration has been completed.</p>
			<p class="head">The following information has been saved to our database:</p>
			<p>username: $username</p>
			<p>Name: $fullname</p>
			<p>(Password you hopefulyl remember yourself)</p>
			<p>Email: $email</p>
			<p>Telephone: $telephone</p></body></html>" );
			die(); //finish the page
		}
	}
		print("<h1>Registration form</h1>")

		if (!$iserror)
		{
			print "<p class="error">Fields with * need to filled in properly</p>")
		}
		print("<!--post form data to dynamicform.php -->
			<form  method="post" action="dynamicform.php">
			<h2>User Informaton</h2>
			<!-- create text boxes for user input -->");
		foreach ($inputlist as $inputname => $inputalt)
		{
			print(<div><label>$inputalt:</label><input type="text" name ='$inputname' value='".$$inputname."'>");

			if ($formerrors[($inputname)."error"] ==true)
				print ("<span class ="error">*</span>")

			print("</div>")
		}

		if ($formerorrors["phoneerror"])
			print("<p class="error"> Must be in the form (555)555-5555</p>");

		print("<!--create submit button-->
		<p class="head"><input type="submit" name="submit" value="register"></p></form></body></html>");
		