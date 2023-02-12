<?php
	session_start();
	
	if ($_SERVER["REQUEST_METHOD"]=="POST") 
	{
		$v_number = test_input($_POST["vehicle_number"]); 	
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
	$check = "select vehicle_number from vehicle_details where vehicle_number = '$v_number'";
	echo $check;
	$result = mysqli_query($conn,$check);
	$num = mysqli_num_rows($result);
	
	if ($num != 0){
		$_SESSION['is error'] = true;
		#$_SESSION['is error']='Vehicle Already Exist';
		header("location:add_vehicle.php");
	}
	else
	{
		$sql = "insert into vehicle_details(user_id,vehicle_number) values ('$u_id','$v_number')";
		echo $num;
		if (mysqli_query($conn,$sql)) {
			#$_SESSION['is error'] = true;
			$_SESSION['error desc insert']=true;
			header("location:add_vehicle.php");
		}
		else
		{
			$_SESSION['not upadated'] = true;
			header("location:add_vehicle.php.php");
		}
	}
?>