<?php 

		session_start();
		#$_POST =  array();
		include '../connection/config.php';
		
		if(isset($_SESSION['rem_me'])){
		// deleting cookie from  database and user laptop
		$pid = $_SESSION['police id'];
		$sql = "delete from remember_me where pid ='$pid'";
		echo $pid;
		echo $sql;
		
		if(mysqli_query($conn,$sql)){
			setcookie('hash', '', time() - 3600, "/");
		}
		mysqli_close($conn);
		// deleting cookie stopp here
	}
		 

		//session_unset();
		$_SESSION = array();
		session_destroy();
		
		header("location:../home.php");
?>