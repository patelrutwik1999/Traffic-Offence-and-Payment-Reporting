<?php
	session_start(); 
	

	if ($_SERVER["REQUEST_METHOD"]=="POST") {
	 	$otp_number_user = test_input($_POST["otpnumber"]);
	} 
	
	function test_input($data)
	{
		$data = trim($data);
		$data = stripcslashes($data);
		$data = htmlspecialchars($data);
		return $data;	
	}

	$otp_number = $_SESSION['otp number'];
	
	if ($otp_number == $otp_number_user) 
	{
		
		header("location:insert_value.php");
	}
	else
	{
		$_SESSION['is error'] = true;
		$_SESSION['error desc']='Wrong OTP';
		header("location:enter_otp.php");
	}
?>