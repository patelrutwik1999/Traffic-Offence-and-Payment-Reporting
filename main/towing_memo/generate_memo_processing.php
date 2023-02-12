

<?php 
	session_start();

	
	
	if ($_SERVER["REQUEST_METHOD"]=="POST") 
	{
		$vehicle_number = test_input($_POST["vehicle_number"]); 	
	 	$vehicle_type = test_input($_POST["vehicle_type"]);
		$time = test_input($_POST["time"]);
		$date = test_input($_POST["date"]);


		// photo upload => This will be save on server....

		$target_dir = "../../main/towing_memo/no_parking_photo/";
    	$target_file = $target_dir . basename($_FILES["v-pic"]["name"]);
    	//$uploadOk = 1;
    	$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
    	move_uploaded_file($_FILES["v-pic"]["tmp_name"], $target_file);      
		$image=basename( $_FILES["v-pic"]["name"],$imageFileType); // used to store the filename in a variable
		$imageFileType = strtolower($imageFileType);
		if($imageFileType != "jpg" && $imageFileType != "jpeg" && $imageFileType != "png" )
		{
			echo $imageFileType;
    		echo "File Format Not Suppoted";
		}
		else
		{
			$status = 0; // 0 = not viewed by user and 1 = user has viewed the notification
			$paid = 0; // 0=unpaid and 1=paid 

			include '../../connection/config.php';
	

			//Get Amount
			if ($vehicle_type == '2-wheeler') {
				$amount = 500;
			}
			elseif ($vehicle_type == '3-wheeler') {
				$amount = 750;
			}
			else
			{
				$amount = 900;
			}

			// To get drop area
			$p_id = $_SESSION['police id'];
			$sql1 = "select area_id,pickup_area from area_details where police_id = '$p_id'";
			$result = mysqli_query($conn,$sql1);
			$num = mysqli_num_rows($result);
			$row = $result->fetch_assoc();
			if ($num == 1) 
			{
				$a_id = $row["area_id"];
				$p_area = $row["pickup_area"];
				$memo_id = uniqid();
				$date_time = $date." ".$time;
				
				$due_date = date('Y-m-d',strtotime($date . "5 days"));
				$vehicle_number = strtolower($vehicle_number);
				$sql = "insert into memo_details(memo_id , vehicle_number, police_id, area_id, amount, due_date, date_time, photo, vehicle_type, view_status, pay_status) values ('$memo_id','$vehicle_number', '$p_id', '$a_id', '$amount', '$due_date','$date_time','$target_file','$vehicle_type', '$status','$paid')";

				$count = 0;
				if (mysqli_query($conn,$sql)) 
				{
					mysqli_close($conn);
					
					$_SESSION['memo id'] = $memo_id;
					$_SESSION['vehicle number'] = $vehicle_number;
					header("location:send_message.php");
				}
				else
				{
					mysqli_close($conn);
					$_SESSION['is error'] = true;
					$_SESSION['error desc']='Ohh, some field might remained empty. Please fill the form again';
					header("location:generate_memo.php");
				}	
			}
			else
			{
				$_SESSION['is error'] = true;
				$_SESSION['error desc']='Area Id Doesnot exist.';
				header("location:generate_memo.php");		
			}
		}
	}
	else
	{
		$_SESSION['is error'] = true;
		$_SESSION['error desc']='Post method not used';
		header("location:generate_memo.php");
	}

	function test_input($data)
	{
		$data = trim($data);
		$data = stripcslashes($data);
		$data = htmlspecialchars($data);
		return $data;	
	}
?>
