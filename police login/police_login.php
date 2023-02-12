<!DOCTYPE html>
<html>
	<head>
		<title>Login</title>
		<!--  Form Validation -->
		<?php
		session_start();
		include '../header.php';
		if (isset($_SESSION['is error']) ) {
			$error = $_SESSION['error desc'];
			
		 	echo '<script>alert("Error : '.$error.'");</script>';

		 	$_SESSION['is error'] =null;
		 	$_SESSION['error desc']=null;
		} 
		?>
		<style type="text/css">
			@import url('https://fonts.googleapis.com/css?family=Roboto+Slab&display=swap');
			#login{
				width:48%;
				border:1px solid white;
				margin-left:30%;
				
				height:400px;
			}
			.top{
				height:70px;
				display:block;
				color:#141414;
				font-family: 'Roboto Slab', serif;
				font-weight: bolder;
				font-size: 3rem;
			}
			#input{
				border:none;
				border-bottom: 2px solid black;
				width:98%;
			}
			#button{
				width:100%;
				height:35px;
				background-color:#aebdb2;
				text-decoration: none;
				font-weight: bolder;
				border:none;
				font-size: 15px;
			}
		</style>
	</head>
	<body>
		<br>
		<div class="container">
			<div class="row">
				<div class="col-md-4"> </div>
				<div class="col-md-4">
					<div id="login">
						<p class="top"><img style="margin-left:25%;" class="top" src="img/login.png"><span style="margin:23%;">Login</span></p><br><br><br>
						<form name="login_form" method="POST" action="police login/validate_police_password.php" onsubmit="return validate()">
							<label style="color:#141414;font-size:1.7rem;width:100%;">Police I.D.</label>
							<input title="Enter police id" id="input" type="text" name="police_id" autofocus required="true">
							<br><br>
							<label style="color:#141414;font-size:1.7rem;width:100%;">Password</label>
							<input title="Enter password" id="input" type="password" name="pass" autofocus required="true"><br><br> 
							<input type="checkbox" name="remember_me" value="1" style="height:15px;width: 15px;"><span style="color:black;font-size: 15px;font-weight: bold;">&nbsp&nbspRemember Me</span>
							<br><br>
							<input id="button" type="submit" value="Login">
						</form>
						<br><p style="color: black;font-size: 15px;font-weight: bold;">Not Registered? <a href="police login/police_signup.php">Sign Up</a></p>
						<p style="color: black;font-size: 15px;font-weight: bold;"><a href="police login/forgot_password.php">Forgot Password<a>?</p>
					</div>

				</div>
				<div class="col-md-4"> </div>
			</div>
		</div>
		<br><br><br>
	</body>
	<footer>
		<?php
			include '../footer.html'; 
		?>
	</footer>
</html>

