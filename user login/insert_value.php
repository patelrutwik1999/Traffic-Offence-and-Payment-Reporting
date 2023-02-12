<?php 
	session_start();
	include '../connection/config.php';
	
	$mobile_number = $user_name = $status = "";

	
	
	#for login details
	
	$mobile_number = $_SESSION['mobile number'];
	$user_name = $_SESSION['user name'];	 	
	$status = $_SESSION['status'];
	
	#for checking, whether user is logged in or not.... 

	$sql1 = "select user_name,user_id from user_details where user_mobile_number = '$mobile_number'";
	$result = mysqli_query($conn,$sql1);
	#echo $result;
	$num = mysqli_num_rows($result);
 	$row = $result->fetch_assoc();
 	echo $num;
 	$name = $row["user_name"];
 	$u_id = $row["user_id"];
	if($num == 1)
	{
		mysqli_close($conn);
		#echo $num;
		$_SESSION["logged"] = true;
		$_SESSION['logged in type'] = 'user';
		$_SESSION['user name'] = $name;		
		$_SESSION['user id'] = $u_id;
		$_SESSION['vehicle number']=array();//for adding vehicle in session
		$_SESSION['vehicle notification']=array();//an associative array containing vehicle number as key and value 1 to indicate vehicle towed and 0 to indicate no towed
		header('location:send_welcome.php');
	}
	else
	{
		#for signup.....
	
		$user_unique_id = uniqid();
		$_SESSION['user id'] = $user_unique_id;		
		$sql = "insert into user_details(user_name , user_mobile_number , status , user_id) values ('$user_name','$mobile_number','$status','$user_unique_id')";
		
		$count = 0;
		if (mysqli_query($conn,$sql)) {
			mysqli_close($conn);
			$_SESSION['logged'] = true;
			$_SESSION['logged in type']='user';
			echo $sql;
			header('location:send_welcome.php');
			
		}
		else
		{
			mysqli_close($conn);
			$_SESSION['logged'] = false;
			$_SESSION['is error'] = true;
			$_SESSION['error desc']='Ohh, some field remained empty....';
			echo $sql;
			header("location:login_user.php");
		}		
	}
?>