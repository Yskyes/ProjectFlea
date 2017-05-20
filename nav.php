<?php
	$loginregister = "http://localhost/projectflea/login.php";
	$userpage = "http://localhost/projectflea/userpage.php";
	$logout = "http://localhost/projectflea/logout.php";
?>
<nav>
	    <ul>
	    	<li><a href="http://localhost/projectflea/addentry.php"> Add Entry </a></li>
	    	<li><a href="http://localhost/projectflea/search.php"> Search </a></li>
    		<?php 
				if(isset($_SESSION["username"]) && $_SESSION["logged"] == True)
				{
					echo "<li><a href='".$userpage."'><b>".$_SESSION["username"]."</b></a></li>
					<li><a href='".$logout."'> Log out </a></li>";
				}
				else
				{
					echo "<a href='".$loginregister."'>Login/Register</a>";
				}
			?>
    	</ul>
</nav>