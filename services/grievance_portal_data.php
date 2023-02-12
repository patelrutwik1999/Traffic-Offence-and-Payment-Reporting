<?php 
	session_start();

	if ($_SERVER["REQUEST_METHOD"]=="POST") {
		//$name = test_input($_POST["name"]);
	 	$email = test_input($_POST["email"]);
	 	//$contact_number = test_input($_POST["contact_number"]);
	 	$complain_title = test_input($_POST["complain_title"]);
	 	$description = test_input($_POST["description"]);
	 	$date = test_input($_POST["date"]);
	 	$time = test_input($_POST["time"]);
	}
	function test_input($data)
	{
		$data = trim($data);
		$data = stripcslashes($data);
		$data = htmlspecialchars($data);
		return $data;	
	}

	

	include '../connection/config.php';
	$u_id = $_SESSION['user id'];
	$retrieve = "select user_name, user_mobile_number from user_details where user_id = '$u_id'";
	
	$result = mysqli_query($conn,$retrieve);
	$num = mysqli_num_rows($result);
	if ($num != 0) {
		$rows = $result -> fetch_assoc();
		$u_name = $rows['user_name'];
		$u_number = $rows['user_mobile_number'];
		$date_time = $date." ".$time;
		$view_status = 0;

		$sql = "insert into grievance_portal(name , email, contact_number, complain_title, description, date_time, view_status, user_id) values ('$u_name','$email', '$u_number' , '$complain_title' , '$description' , '$date_time' , '$view_status' , '$u_id')";
		
	
		if (mysqli_query($conn,$sql)) {
			mysqli_close($conn);
			$_SESSION['is error'] = true;
			$_SESSION['error desc']='Grievance Reported Succesfully.';
			header("location:../home.php");
			
		}
		else
		{
			mysqli_close($conn);
			$_SESSION['is error'] = true;
			$_SESSION['error desc']='Grievance Not Reported Succesfully.';
			header("location:../home.php");
		}		

	}
	else
	{
		mysqli_close($conn);
		$_SESSION['is error'] = true;
		$_SESSION['error desc']='Grievance Not Reported Succesfully.';
		header("location:../home.php");
	}
	

?>