<?php
		#for signup.....
		session_start();
		$mobile_number  = $status  =$designation = "";
		
		#for login details
	
			$mobile_number = $_SESSION['mobile number'];
			$status = $_SESSION['status'];
			$pid = $_SESSION['police id'];

		include '../connection/config.php';
			
		$sql = "update police_details SET mobile_number = '$mobile_number' , status = '$status' where pid = '$pid' ";
		
		$count = 0;
		if (mysqli_query($conn,$sql)) {
			mysqli_close($conn);
			header("location:send_password.php");
			
		}
		else
		{
			$_SESSION['is error'] = true;
			$_SESSION['error desc']='Incorrect police Id';
			mysqli_close($conn);
			header("location:police_signup.php");
		}		
	
	
?>