<?php
$d = json_decode($_GET["x"], false);
$date = $d->date;
$conn = mysqli_connect("localhost","root","root");
if(!$conn){die("connection failed".mysqli_connect_error());}
mysqli_select_db($conn,"ahmedabadtrafficpoliceadmin");
$gusql = "select updates from trafficupdates where date ='$date'";
$result = mysqli_query($conn,$gusql);
$num = mysqli_num_rows($result);
if ($num > 0){
	// setting displayed to 0 so next time read update is not added
	$send = array();
	$i=0;
	while($rec = mysqli_fetch_assoc($result)){
		$send[$i]=$rec['updates'];
		$i++;
	}
	echo json_encode($send);
}
else {
	$send = array("none");
	echo json_encode($send);
}
?>
