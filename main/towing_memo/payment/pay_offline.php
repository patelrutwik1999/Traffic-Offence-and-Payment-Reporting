<?php
	session_start();
	$id = $_GET['id'];
	include '../../../connection/config.php';
	///query to update the status...

	$sql = "update memo_details set pay_status = '1' where memo_id = '$id'";
	if (mysqli_query($conn, $sql)) {
		$_SESSION['is error'] = true;
		$_SESSION['error desc'] = 'Payment Done(Offline).';
		
		header("location:show_memo_police.php");
	}
	else
	{
		$_SESSION['is error'] = true;
		$_SESSION['error desc'] = 'Error in Payment.';
		echo $sql;
		#header("location:show_memo_police.php");	
	}
?>