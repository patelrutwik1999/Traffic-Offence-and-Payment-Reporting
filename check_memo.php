<?php
	#AJAX request is processed here for checking new notifications returns new number of notifications 
	session_start();
	if(empty($_SESSION['logged']) || $_SESSION['logged'] == null){
		exit();
	}
	//echo $_SESSION['logged'];
	if(!empty($_SESSION['logged in type']) && $_SESSION['logged in type'] == "police"){
		exit();
	}
	if(!empty($_SESSION['logged']) && $_SESSION['logged'] == true && !empty($_SESSION['logged in type']) && $_SESSION['logged in type']=='user')
	{
		include 'connection/config.php';
		$arr_veh = array();
		$userid = $_SESSION['user id'];
		$cmsql2 = "select * from vehicle_details where user_id = '".$userid."'";
		$result1 = mysqli_query($conn,$cmsql2);
		$num = mysqli_num_rows($result1);
		if($num >= 1){
			while($cmres1 = mysqli_fetch_assoc($result1)){
				$arr_veh= array_merge($arr_veh,array($cmres1['vehicle_number']));
			}
		}
		else{
			echo "0";
		}	
		$count =0;
		$vehicle = $arr_veh;
		$vehicle_notif = $_SESSION['vehicle notification'];
		$length = count($vehicle);
		for ($x =0 ;$x < $length;$x++){
			$cmsql1 = "select * from memo_details where vehicle_number = '".$vehicle[$x]."' AND view_status ='0' AND pay_status='0'";
			$result = mysqli_query($conn,$cmsql1);
			$num = mysqli_num_rows($result);
			if($num == 1){
				$name = $vehicle[$x];
				$vehicle_notif  = array_merge($vehicle_notif,array($name=>"1"));
				$count++;
			}
		}
		$_SESSION['vehicle notification'] =$vehicle_notif; 
		mysqli_close($conn);
		echo $count;
	}
?>