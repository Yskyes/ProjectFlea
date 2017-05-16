<nav>
	    <ul>
	    	<li><a href="http://localhost/projectflea/addentry.php"> Add Entry </a></li>
	    	<li><a href="http://localhost/projectflea/search.php"> Search </a></li>
    		<li><a href="http://localhost/projectflea/user.php"> Userpage </a></li>
    		<li><a href="http://localhost/projectflea/login.php">Login/Register</a></li>
    		<?php 
				if(isset($_SESSION["username"]))
				{
					echo "<li>Logged in as ".$_SESSION["username"]."</li>";
				}
			?>
    	</ul>
    	<?php 
				if(isset($_SESSION["username"]))
				{
					echo "<li>Logged in as ".$_SESSION["username"]."</li>";
				}
			?>
</nav>