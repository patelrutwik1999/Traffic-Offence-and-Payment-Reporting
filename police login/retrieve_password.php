<?php 
	session_start();
	
	
	if ($_SERVER["REQUEST_METHOD"]=="POST") {
		$police_id = test_input($_POST["police_id"]);
	 	$mobile_number = test_input($_POST["mnumber"]);
	} 
	
	function test_input($data)
	{
		$data = trim($data);
		$data = stripcslashes($data);
		$data = htmlspecialchars($data);
		return $data;	
	}



	include '../connection/config.php';
	$sql = "select password from police_details where pid = '$police_id'";
	$result = mysqli_query($conn,$sql);
	#echo $result;

	$num = mysqli_num_rows($result);
 	$row = $result->fetch_assoc();
 	$pass = $row["password"];
	mysqli_close($conn);
	if($num == 1)
	{
		#password decyption....
		$ciphering = "AES-128-CTR"; 
		$options = 0;

		// Non-NULL Initialization Vector for decryption 
		$decryption_iv = '1234567891011121'; 
  
		// Store the decryption key 
		$decryption_key = "torpatljiet"; 
  
		// Use openssl_decrypt() function to decrypt the data 
		$decryption=openssl_decrypt ($pass, $ciphering,  
        $decryption_key, $options, $decryption_iv); 
  
		$field = array(
			    "sender_id" => "FSTSMS",
			    "language" => "english",
			    "route" => "qt",
			    "numbers" => $mobile_number, // number will be entered.
			    "message" => "24378",
			    "variables" => "{#CC#}|{#BB#}",
			    "variables_values" => "$lname|$decryption"
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
				header("location: forgot_password.php");
			} 
			else 
			{
				$_SESSION['is error'] = true;
				$_SESSION['error desc']='Password Has been Send';
				header("location: police_login.php");	
			}
	}
	else
	{
		echo 'Wrong Police id';
	}
	
?>