<?php
	session_start();

	#for login details

	if ($_SERVER["REQUEST_METHOD"]=="POST") {
	 	$mobile_number = test_input_1($_POST["mnumber"]);
	 	$user_name = test_input_1($_POST["user_name"]);

	} 
	
	function test_input_1($data)
	{
		$data = trim($data);
		$data = stripcslashes($data);
		$data = htmlspecialchars($data);
		return $data;	
	}

	#random number
	$random_number = rand(1000,9999);

	$field = array(
	    "sender_id" => "FSTSMS",
	    "language" => "english",
	    "route" => "qt",
	    "numbers" => $mobile_number, // number will be entered.
	    "message" => "24376",
	    "variables" => "{#BB#}",
	    "variables_values" => $random_number
	);

	/* 
	  For 5 characters: 5 = {#AA#}
	For 10 characters: 10 ={#BB#}
	For 15 characters: 15 ={#CC#}
	For 20 characters: 20 ={#DD#}
	For 25 characters: 25 ={#EE#}
	For 30 characters: 30 ={#FF#}

	*/

	$curl = curl_init();

	curl_setopt_array($curl, array(
	CURLOPT_URL => "https://www.fast2sms.com/dev/bulk",
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_ENCODING => "",
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 30,
	CURLOPT_SSL_VERIFYHOST => 0,
	CURLOPT_SSL_VERIFYPEER => 0,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => "POST",
	CURLOPT_POSTFIELDS => json_encode($field),
	CURLOPT_HTTPHEADER => array(
	   "authorization: FLMnx910uSBmCcwAYg45vpjJialIfdKk6REsO2UeQZb3oGPyqrimCa6bJscSp358Tzlh9UnAOtIRFxBV",
	   "cache-control: no-cache",
	   "accept: */*",
	   "content-type: application/json"
	 ),
	));

	$response = curl_exec($curl);
	$err = curl_error($curl);

	curl_close($curl);

	if ($err) {
  		echo "cURL Error #:" . $err;
  		$_SESSION['is error'] = true;
		$_SESSION['error desc']='Incorrect Mobile Number';
		header("location:login_user.php");
	} else {
  		$_SESSION['mobile number'] = $mobile_number ;
		$_SESSION['otp number'] = $random_number;
		$_SESSION['user name'] = $user_name;
		$status = True;
		$_SESSION['status'] = $status;
		#include 'enter_otp.php';
		header("location: enter_otp.php");
	}
/*Quick Transactional Route Success Response:
{
    "return": true,
    "request_id": "drhgp7cjyqxvfe9",
    "message": [
        "Message sent successfully"
    ]
}*/

?>