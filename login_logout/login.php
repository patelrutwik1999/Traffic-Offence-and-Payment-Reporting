<!DOCTYPE>
<html>
	<head>
		<title>Login Profiles</title>
		<?php
			include '../header.php';
		?>
		<link href="https://fonts.googleapis.com/css?family=Oswald&display=swap" rel="stylesheet">
		<style>
			.para{
				display:block;
				text-align: center;
				
				font-size: 20px;
				margin-left5px;
				color:#283044;
				border-radius: 7px;
				font-family: 'Oswald',sans-serif;
				font-weight: bold;
				width:270px;
			}
			.imag{
				margin-bottom:6px;
				border-radius: 6px;
				margin-left:13px;
				border:2px solid black;
				clear: left;
			}
		</style> 
	</head>
	<body>
		<div class="container">
			<br><br>
			<div class="row">
				<div class="col-lg-4"></div>
				<div class="col-lg-4" style="height: 50px;font-size: 30px;font-weight: bold;text-align: center;font-family: 'Oswald', sans-serif;;color:#78a1bb;background-color:#283044; border-radius: 7px;boredr:2px solid black">Select Your Profile</div>
				<div class="col-lg-4"></div>
			</div>
			<br><br>
			<div class="row" style="overflow-y:hidden;">
				<div class="col-lg-2"></div>
				<div class="col-lg-4" ><a href="police login/police_login.php"><p class="para">POLICE</p><img src="img/profile/police.jpeg" class="imag" ></a></div>
				<div class="col-lg-4"><a href="user login/login_user.php"><p class="para">USER</p><img src="img/profile/user.jpeg" class="imag" ></a></div>
				<div class="col"></div>
			</div>
			<br><br>
		</div>
	</body>
	<footer>
		<?php
			include '../footer.html';
		?>
	</footer>
</html>