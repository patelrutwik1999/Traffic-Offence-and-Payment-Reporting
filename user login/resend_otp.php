<?php
	session_start();

	$random_number = rand(1000,9999);
		$sender = 'TSTSMS' ;
		$mob = $_SESSION['mobile number'];
		$auth= 'D!~1984lSLyarbMWz';
		$msg = urlencode("Your OTP is : ". $random_number); 
		$url = 'https://global.datagenit.com/API/sms-api.php?auth='.$auth.'&msisdn='.$mob.'&senderid='.$sender.'&message='.$msg.'';  // API URL
	
		$result=SendSMS($url);
		function SendSMS($hostUrl){
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $hostUrl);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_POST, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0); // change to 1 to verify cert
curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
//curl_setopt($ch, CURLOPT_USERPWD, "$username:$password");
$result = curl_exec($ch);
	return $result;
}
		
	if(strpos($result, 'success') !== false)
	{
		$_SESSION['otp number'] = $random_number;
		$status = True;
		$_SESSION['status'] = $status;
		
	}
	else
	{
		$_SESSION['is error'] = true;
		$_SESSION['error desc']='Incorrect Mobile Number';
	}
}
?>