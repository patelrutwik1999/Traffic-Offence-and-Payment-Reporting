<?php
 	session_start();
	include 'header.php';
	if(isset($_SESSION['logged'])){
		$logged_type  = $_SESSION['logged in type'];
		$var1  = "user";
		$var2 = "police";
		if($logged_type == $var1)
		{
			echo  $_SESSION['user name'].',<h1>You are not eligible to access this page.</h1>' ;
			echo '<h2><a href="home.php">GO TO HOME</a></h2>';
		}
		elseif ($logged_type == $var2) {
			
			header("location:")
		}
	}
	else
	{
		echo '<a href="login_logout/login.php"><span>Log in / Register</span></a></li>';
	}		
?>
<body>
	
</body>