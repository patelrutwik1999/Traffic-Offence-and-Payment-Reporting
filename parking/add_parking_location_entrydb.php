<?php
	session_start();
	$location = $address  = $contact_detail = $date = $time = "";

	if ($_SERVER["REQUEST_METHOD"]=="POST") {
	 	$location = test_input($_POST["area"]);
		$address = test_input($_POST["address"]);
		$contact_detail = test_input($_POST["mobile_number"]);
		$date = test_input($_POST["date"]);
		$time = test_input($_POST["time"]);
		
		// photo upload => it will be save on server....

		$target_dir = "../parking/uploaded_parking_location/";
    	$target_file = $target_dir . basename($_FILES["location_photo"]["name"]);
    	//$uploadOk = 1;
    	$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
    	move_uploaded_file($_FILES["location_photo"]["tmp_name"], $target_file);      
		$image=basename( $_FILES["location_photo"]["name"],$imageFileType); // used to store the filename in a variable
		$imageFileType = strtolower($imageFileType);
		if($imageFileType != "jpg" && $imageFileType != "jpeg" && $imageFileType != "png" )
		{
			echo $imageFileType;
    		echo "File Format Not Suppoted";
		}
		else
		{
			//echo $imageFileType;
			$date_time = $date." ".$time;
			include '../connection/config.php';

			
			$user_mobile_number = $_SESSION["mobile number"]; 
			$user_id = $_SESSION["user id"];
			$status = 0; // 0 = not verified.

			$sql = "insert into parking_details_user(user_no, user_id, location, address, mobile_number, status, photo, datetime) values ('$user_mobile_number', '$user_id', '$location', '$address', '$contact_detail', '$status', '$target_file', '$date_time')";
			echo $sql;
			if (mysqli_query($conn,$sql)) {
				mysqli_close($conn);
				$_SESSION['is error'] = true;
				$_SESSION['error desc']='Location Added Successfully';
				//echo "data entered";
				header("location:../home.php");
			
			}
			else
			{
				mysqli_close($conn);
				$_SESSION['is error'] = true;
				$_SESSION['error desc']='Location Not added';
				//echo "data not entered";
				header("location:../home.php");
			}	
		}

	} 
	
	function test_input($data)
	{
		$data = trim($data);
		$data = stripcslashes($data);
		$data = htmlspecialchars($data);
		return $data;	
	}

		
?>