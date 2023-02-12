<!DOCTYPE html>
<html>
	<head>
		<title>Login</title>
		<!--  Form Validation -->
		<script type="text/javascript">
			function validate(){
			var number=document.forms["login_form"]["mnumber"].value;
			var name=document.forms["login_form"]["user_name"].value;

			pattern=/^([1-9]{1}[0-9]{9})$/;
			if(!(pattern.test(number))){
				alert("Enter Valid Mobile Number.");
				return false;
			}
			pattern1 = /^[A-Za-z ]+$/;
			if (!(pattern1.test(name))) 
            {
                alert("No Special Character or Numbers allowed in Name field.");
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
				width:45%;
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
		<br><br><br>
		<div class="container">
			<div class="row">
				<div class="col-md-4"> </div>
				<div class="col-md-4">
					<div id="login">
						<p class="top"><img style="margin-left:25%;" class="top" src="img/login.png"><span style="margin:23%;">Login</span></p><br><br><br>
						<form name="login_form" method="POST" action="user login/otp_processing.php" onsubmit="return validate()">
							<label style="color:#141414;font-size:1.7rem;width:100%;">Name</label>
							<input title="Enter Your Name Here" id="input" type="text" name="user_name" autofocus required="true">
							<br><br>
							<label style="color:#141414;font-size:1.7rem;width:100%;">Mobile&nbspNumber</label>
							<input title="Enter Mobile Number Here" id="input" type="text" name="mnumber" autofocus maxlength="10" required="true">
							<br><br>
							<input id="button" type="submit" value="Send OTP">
						</form>
					</div>
				</div>
				<div class="col-md-4"> </div>
			</div>
		</div>
		<br>
	</body>
	<footer>
		<?php
			include '../footer.html'; 
		?>
	</footer>
</html>

