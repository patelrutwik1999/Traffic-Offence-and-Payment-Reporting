<!DOCTYPE html>
<html>
	<head>
		<title>Signup</title>
		<!--  Form Validation -->
		<script type="text/javascript">
			function validate(){
			var number=document.forms["login_form"]["mnumber"].value;
			
			pattern= /^([1-9]{1}[0-9]{9})$/;
			if(!(pattern.test(number))){
				alert("Enter a Valid Mobile Number.");
				return false;
			}
			
		</script>
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
				width:50%;
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
						<p class="top"><img style="margin-left:25%;" class="top" src="img/login.png"><span style="margin:20%;">Signup</span></p><br><br><br>
						<form name="login_form" method="POST" action="police login/police_otp_processing.php" onsubmit="return validate()">
							
							<label style="color:#141414;font-size:1.7rem;width:100%;">Police I.D</label>
							<input title="police identification number" id="input" type="text" name="police_id" required="true"><br><br>
							<label style="color:#141414;font-size:1.7rem;width:100%;">Mobile&nbspNumber</label>
							<input title="Enter Mobile Number Here" id="input" type="text" name="mnumber" maxlength="10" required="true">
							
							
							
							<br><br><br>
							<input id="button" type="submit" value="Send OTP">
						</form>
					</div>
				</div>
				<div class="col-md-4"> </div>
			</div>
		</div>
		<br><br><br><br>
</body>
	<footer>
		<?php
			include '../footer.html'; 
		?>
	</footer>
</html>

