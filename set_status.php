<?php
//Ajax file to set view_status to 1 so notification is not show again
	session_start();
	$v= explode("/",$_GET['x']);
	$v_num = $v[0];
	$v_date= $v[1];
	$mysqli = new mysqli("localhost","root","root","ahmedabadtrafficpolice");
	if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;}
    if (!($stmt = $mysqli->prepare("update memo_details set view_status =? where vehicle_number= ? AND view_status='0' AND due_date=?"))) {
    echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
	}
	$id =1;
	if (!$stmt->bind_param("iss", $id,$v_num,$v_date)) {
    	echo "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
	}

	if (!$stmt->execute()) {
    	echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
	}
	if($stmt->affected_rows != 1){
		echo $stmt->affected_rows;
	}
	else{
		echo "success";
	}
	$stmt->close();
	$mysqli->close();
?>