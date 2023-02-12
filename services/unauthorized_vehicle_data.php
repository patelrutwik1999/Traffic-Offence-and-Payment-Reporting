<?php 
	session_start();
	
	
	if ($_SERVER["REQUEST_METHOD"]=="POST") {
		$area = test_input($_POST["area"]);
	 	$vehicle_type = test_input($_POST["v-type"]);
	 	$vehicle_number = test_input($_POST["vehicle_number"]);
	 	$address = test_input($_POST["address"]);	
	 	$phone_number = test_input($_POST["phone_number"]);	
	 	$time = test_input($_POST["time"]);
		$date = test_input($_POST["date"]);
		


		// photo upload => This will be save on server....

		$target_dir = "../services/unauthorized_photo_vehicle/";
    	$target_file = $target_dir . basename($_FILES["photo"]["name"]);
    	//$uploadOk = 1;
    	$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
    	move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file);      
		$image=basename( $_FILES["photo"]["name"],$imageFileType); // used to store the filename in a variable
		$imageFileType = strtolower($imageFileType);
		if($imageFileType != "jpg" && $imageFileType != "jpeg" && $imageFileType != "png" )
		{
			echo $imageFileType;
    		echo "File Format Not Suppoted";
		}
		else
		{
			include '../connection/config.php';
			$check = "select * from unauthorized_vehicle where vehicle_number = '$vehicle_number'";
			$result = mysqli_query($conn,$check);
			$num = mysqli_num_rows($result);
			$rows = $result -> fetch_assoc();
			if($num == 1)
			{
				$d_t = $rows['date_time'];
				$date_db = explode(" ",$d_t);
				$upload_date = $date_db[0];
				$created_date = date_create($upload_date);
				$today_date = date('Y-m-d');
				$t_date = date_create($today_date);
				
				
				
				//$next_complain = date('Y-m-d',strtotime($date_db . "2 days"));*/
				$diff = date_diff($created_date,$t_date);
				$days = $diff->Format('%a');
				$sign = $diff->Format('%R');
				if ($sign == '+' && $days < 2) // if the days will be less than 2 then new entry of the same vehicle will not be inserted.
				{
					$_SESSION['is error'] = true;
					$_SESSION['error desc']='Vehicle already been marked';
					header("location:../home.php"); 
				}

				$area_db = $rows['area'];
				$status_db = $rows['view_status'];

				if ($area_db == $area && $status_db == "0") {
					$_SESSION['is error'] = true;
					$_SESSION['error desc']='Vehicle already been marked';
					header("location:../home.php"); 	
				}
				else
				{
					$u_id = $_SESSION['user id'];
					
					$date_time = $date." ".$time;
					$view_status = 0;
					$vehicle_number = strtolower($vehicle_number);
					$sql = "insert into unauthorized_vehicle(u_id, vehicle_number, area, destination_address, photo, vehicle_type, phone_number, date_time, view_status) values ('$u_id','$vehicle_number', '$area', '$address', '$target_file', '$vehicle_type', '$phone_number', '$date_time', '$view_status')";
					
					if (mysqli_query($conn,$sql))
					{
						mysqli_close($conn);
						$_SESSION['is error'] = true;
						$_SESSION['error desc']='Vehicle Marked Successfully.';
						header("location:../home.php"); 
					}	
					else
					{
						mysqli_close($conn);
						$_SESSION['is error'] = true;
						$_SESSION['error desc']='Vehicle Not marked Successfully.';
						header("location:../home.php"); 
					} 
				}
			}
			else
			{
				$u_id = $_SESSION['user id'];
				$date_time = $date." ".$time;
				$view_status = 0;
				$sql = "insert into unauthorized_vehicle(u_id, vehicle_number, area, destination_address, photo, vehicle_type, phone_number, date_time, view_status) values ('$u_id','$vehicle_number', '$area', '$address', '$target_file', '$vehicle_type', '$phone_number', '$date_time', '$view_status')";
				echo $sql;
				if (mysqli_query($conn,$sql))
				{
					mysqli_close($conn);
					$_SESSION['is error'] = true;
					$_SESSION['error desc']='Vehicle already been marked.';
					header("location:../home.php"); 
				}	
				else
				{
					mysqli_close($conn);
					$_SESSION['is error'] = true;
					$_SESSION['error desc']='Vehicle Not marked Successfully.';
					header("location:../home.php"); 
				} 
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