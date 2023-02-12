<!DOCTYPE html>
<html>
	<head>
		<title>Login</title>
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
		<script type="text/javascript">
			function resend_otp(){
				var xmlhttp = new XMLHttpRequest();
				xmlhttp.onreadystatechange = function() {
            	if (this.readyState == 4 && this.status == 200) 
            	{
                document.getElementById("time").innerHTML= "otp sent";
            	}
        		};
        		xmlhttp.open("POST","resend_otp_police.php", true);
        		xmlhttp.send();	
        	}
        	//implementing timer for resend otp
			function start_timer()
			{
				var x = setInterval(function() {
				var num=0;
				var p_e=document.getElementById("time").innerHTML;
				var s = p_e.replace("s",'');
				s= s.replace(":",'');	
  					num = Number(s);
  					num=num-100;
  					num =num/100;

				document.getElementById("time").innerHTML =num+":"+ "00s "; 
  				if (num==0) {
    				clearInterval(x);
    				document.getElementById("time").innerHTML="resend";
    				document.getElementById("time").addEventListener("click",resend_otp);
  				}
				},1000);
			}
			function validate(){
				
			var number=document.forms["login_form"]["otpnumber"].value;
			
			if(number == ""){
			alert("Number cannot be empty");
			return false;
			}
			var pattern=/^[0-9]*$/;/*/^[0]?[789]\d{9}$/;*/
			if(pattern.test(number)){
				return;
			}
			else{ alert("Enter only digits");}
			}
		</script>
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
	<body onload="start_timer()">
		<br><br><br>
		<div class="container">
			<div class="row">
				<div class="col-md-4"> </div>
				<div class="col-md-4">
					<div id="login">
						<p class="top"><img style="margin-left:25%;" class="top" src="img/login.png"><span style="margin:20%;">Signup</span></p><br><br><br>
						<form name="login_form" method="POST" action="police login/
						validate_police_login.php" onsubmit="return validate()">
							<label style="color:#141414;font-size:1.7rem;width:100%;">Enter&nbspOTP</label>
							<input title="Enter One Time Password Here" id="input" type="text" name="otpnumber" autofocus maxlength="4" required="true">
							<br><br>
							<input id="button" type="submit" value="Submit">
						</form>
						<button id="time" style="font-weight:bold;color:blue;margin-top:5px;margin-bottom:5px;font-size:1.5rem;width:100%;"> 5:00s</button>
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

