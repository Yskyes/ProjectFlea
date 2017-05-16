<?php
	$loginregister = "http://localhost/projectflea/login.php";
	$userpage = "http://localhost/projectflea/user.php";
?>
<nav>
	    <ul>
	    	<li><a href="http://localhost/projectflea/addentry.php"> Add Entry </a></li>
	    	<li><a href="http://localhost/projectflea/search.php"> Search </a></li>
    		<?php 
				if(isset($_SESSION["username"]) && $_SESSION["logged"] == True)
				{
					echo "<a href='".$userpage."'><b>".$_SESSION["username"]."</b></a>";
				}
				else
				{
					echo "<a href='".$loginregister."'>Login/Register</a>";
				}
			?>
    	</ul>
</nav>