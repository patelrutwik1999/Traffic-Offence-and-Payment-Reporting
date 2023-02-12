<?php 
	session_start();
	include '../../connection/config.php';
	$v_no = $_SESSION['vehicle number'];
	$check = "select user_id from vehicle_details where vehicle_number = '$v_no'";
	$result = mysqli_query($conn,$check);
	$num = mysqli_num_rows($result);
	$rows = $result -> fetch_assoc();
	if ($num == 1) 
	{	
		$u_id = $rows['user_id'];
		$sql = "select user_details.user_mobile_number from vehicle_details inner join user_details on user_details.user_id = '$u_id'";
		$result1 = mysqli_query($conn,$sql);
		$num1 = mysqli_num_rows($result1);
		$rows1 = $result1 -> fetch_assoc();
		if ($num1 != 0) 
		{
			$mobile_number = $rows1['user_mobile_number'];
			

			$p_id = $_SESSION['police id'];
			
			$retrieve_area = "select area_details.pickup_area, area_details.destination_address from memo_details inner join area_details on area_details.police_id = '$p_id'";
			
			$result2 = mysqli_query($conn,$retrieve_area);
			$num2 = mysqli_num_rows($result2);
			$rows2 = $result2 -> fetch_assoc();
			if ($num2 != 0) 
			{
				$p_area = $rows2['pickup_area'];
				$d_area = $rows2['destination_address'];
			}	
			else
			{	echo $num2;
				echo "error in Join Query.";
			}


			// Sending Message
			
			$field = array(
			    "sender_id" => "FSTSMS",
			    "language" => "english",
			    "route" => "qt",
			    "numbers" => $mobile_number, // number will be entered.
			    "message" => "24382",
			    "variables" => "{#BB#}|{#CC#}|{#FF#}",
			    "variables_values" => "$v_no|$p_area|$d_area"
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
				$_SESSION['error desc']='Error in Memo Issusing';
				echo "Message not sent";
				header("location:generate_memo.php");
			} else {
				$_SESSION['is error'] = true;
				$_SESSION['error desc']='Memo Issued.';
				echo $p_area;
				echo $d_area;
				echo "sent";
				header("location:generate_memo.php");
			}
		}
		else
		{
			echo $sql;	
			echo $num1;
			echo $rows1['user_mobile_number'];
			echo " ".$rows1['user_mobile_number'];

		}	
	}
	else
	{ // if entry not found
		$_SESSION['is error'] = true;
		$_SESSION['error desc']='Memo Issued.';
		echo "niche";
		header("location:generate_memo.php");
	}
?>