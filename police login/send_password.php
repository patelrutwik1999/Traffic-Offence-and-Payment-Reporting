<?php
	session_start();

	$mobile_number = $_SESSION['mobile number'];
	$pid = $_SESSION['police id'];
	$lname = $_SESSION['lname'];
	#random number
	$password1 = rand(10000,99999);
	
	$field = array(
			    "sender_id" => "FSTSMS",
			    "language" => "english",
			    "route" => "qt",
			    "numbers" => $mobile_number, // number will be entered.
			    "message" => "24378",
			    "variables" => "{#CC#}|{#BB#}",
			    "variables_values" => "$lname|$password1"
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
				header("location:police_signup.php");
			} 
			else 
			{
				include '../connection/config.php';  

				// Store the cipher method 
				$ciphering = "AES-128-CTR"; 

				// Use OpenSSl Encryption method 
				$iv_length = openssl_cipher_iv_length($ciphering); 
				$options = 0; 

				// Non-NULL Initialization Vector for encryption 
				$encryption_iv = '1234567891011121'; 

				// Store the encryption key 
				$encryption_key = "torpatljiet"; 

				// Use openssl_encrypt() function to encrypt the data 
				$encryption = openssl_encrypt($password1, $ciphering, 
							$encryption_key, $options, $encryption_iv);
				
				$sql = "update police_details set password = '$encryption' where pid = '$pid'";

				if (mysqli_query($conn,$sql)) 
				{
					mysqli_close($conn);	
					header("location: police_login.php");
				}
						
			}


?>