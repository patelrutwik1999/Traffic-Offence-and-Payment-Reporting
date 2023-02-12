<?php
	session_start();
	
		if ($_SERVER["REQUEST_METHOD"]=="POST") 
		{
			$v_number = test_input($_POST["vehicle_number"]); 			
		}
		else
		{
			$v_number = test_input($_GET["no"]);
		}

		function test_input($data)
		{
			$data = trim($data);
			$data = stripcslashes($data);
			$data = htmlspecialchars($data);
			return $data;	
		}	
	
	include '../../connection/config.php';
	$u_id = $_SESSION['user id'];
	$v_number = strtolower($v_number);
	$check = "select vehicle_id, user_id from vehicle_details where vehicle_number = '$v_number'";
	$result = mysqli_query($conn,$check);
	$num = mysqli_num_rows($result);
	if ($num == 1)
	{
		$rows = $result -> fetch_assoc();
		$v_id = $rows['vehicle_id'];
		$user_id = $rows['user_id'];
		if ($user_id == $u_id) 
		{
			$sql = "delete from vehicle_details where vehicle_id = '$v_id'";
			if (mysqli_query($conn,$sql)) {
				$_SESSION['updated'] = true;
				//$_SESSION['error desc']=$v_number . ' Removed Successfully';
				header("location:remove_vehicle.php");
			}
			else
			{
				$_SESSION['not updated'] = true;
				//$_SESSION['error desc']=$v_number . ' cannot be removed.';
				header("location:remove_vehicle.php");
			}	
		}
		else
		{
			$_SESSION['not updated desc'] = true;
			//$_SESSION['error desc']=$v_number . ' Not added.';
			header("location:remove_vehicle.php");
		}

		
	}
	else
	{
		$_SESSION['not exist'] = true;
		//$_SESSION['error desc']=$v_number . ' Doesnot Exist';
		header("location:remove_vehicle.php");
	}
		
	
?>