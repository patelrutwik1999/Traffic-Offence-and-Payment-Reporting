<?php
	session_start(); 
	

	if ($_SERVER["REQUEST_METHOD"]=="POST") {
	 	$otp_number_police = test_input($_POST["otpnumber"]);
	} 
	
	function test_input($data)
	{
		$data = trim($data);
		$data = stripcslashes($data);
		$data = htmlspecialchars($data);
		return $data;	
	}

	$otp_number = $_SESSION['otp number police'];
	if ($otp_number == $otp_number_police) 
	{
		header("location:insert_value_police.php");
	}
	else
	{
		$_SESSION['is error'] = true;
		$_SESSION['error desc']='Incorrect OTP';
		header("location:enter_otp_police.php");
	}
?>