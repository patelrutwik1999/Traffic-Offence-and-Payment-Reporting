<?php
	session_start();
	include '../../../connection/config.php';
	require_once '../../../vendor/autoload.php';
	$m = $_GET['m_id'];
	$mpdf = new \Mpdf\Mpdf();
	
	$gpsql1 = "select * from memo_details where memo_id = '$m' AND pay_status='1'";
	$result1 =  mysqli_query($conn,$gpsql1);
	$num = mysqli_num_rows($result1);
	if($num != 1)
	{
		echo "console.log('query failed');";
		header("view_records.php");
		exit();
	}
	else{
		while($res1 = mysqli_fetch_assoc($result1)){
			$m_id = $res1['memo_id'];
			$v_num = $res1['vehicle_number'];
			$amount = $res1['amount'];
			$d_t = $res1['date_time'];
			$v_type = $res1['vehicle_type'];
			$img = $res1['photo'];
				if($res1['pay_status'] == '1'){
					$pay_status = "paid";
				}
				//finding oickup area
				$area_id = $res1['area_id'];
				$gpsql2 = "select * from area_details where area_id = '$area_id'";
				$result2 = mysqli_query($conn,$gpsql2);
				$num1 = mysqli_num_rows($result2);
				if($num1 != 1){
					echo "console.log('query failed');";
					header("view_record.php");
					exit();
				}
				else{
					while($res2=mysqli_fetch_assoc($result2)){
						$pickup = $res2['pickup_area'];
					}
				}
				// finding payment Information
				$gpsql3 = "select * from payment_record where memo_id = '$m_id'";
				$result3 = mysqli_query($conn,$gpsql3);
				$num2 = mysqli_num_rows($result3);
				if($num2 != 1){
					echo "console.log('query failed');";
					header("view_records.php");
					exit();
				}
				else{
					while($res3=mysqli_fetch_assoc($result3)){
						$transaction_id = $res3['pay_id'];
						$t_date_time = $res3['date_time'];
					}
				}

		}
		$data ="";
		$data .= "<html><head><style>
		table,td{
			border:1px solid black;
			border-collapse:collapse;
			ont-family: 'Times New Roman', Times, serif;
			text-align:center;
		}
		td{
			height:40px;
		}
		.c1{
			font-weight:bold;

		}
		#table{
			padding-left:20%;
		}
		</style></head><body>
		<div><img src='../../../img/torp1.jpg' style='padding-left:20%;display:inline;'></div><h1 style='margin:0px;' align='center'>MEMO RECEIPT</h1><hr style='border:2px solid black;'>
		<div id='table'>";
		$data .= "<table>";
		$data .= "
		<tr><td class='c1'>Memo Id</td><td>".$m_id."</td></tr>
	    <tr><td class='c1' style='overfloe:scroll;'>Transaction Id</td><td>".$transaction_id."</td></tr>
	    <tr><td class='c1'>Vehicle Number</td><td>".strtoupper($v_num)."</td></tr>
	   	<tr><td class='c1'>Vehicle Type</td><td>".$v_type."</td></tr>
	   	<tr><td class='c1'>Pickup Location</td><td>".$pickup."</td></tr>
	    <tr><td class='c1'>Pickup Date Time</td><td>".$d_t."</td></tr>
	    <tr><td class='c1'>Amount</td><td>".$amount."</td></tr>
	    <tr><td class='c1'>Payment Date</td><td>".$t_date_time."</td></tr>
	    <tr><td class='c1'>Payment Status</td><td>".$pay_status."</td></tr>
		";
		$data .="</table></div><br><br>
		<h3><i>Photographic Evidence</i></h3>
		<div><img src='../".$img."'width='255' height='200' style='padding-left:20%;display:inline;'>
		<p style='width:100% margin-bottom:0px;'><strong>Contact</strong> - <i>99999999999</i></p><p><strong>E-Mail</strong> - <i>contact@ahmedabadcitytraffic.com</i></p><hr style='width:100%;border:2px solid black;'>
		</body></html>";
		$mpdf->writeHTML($data);
		$mpdf->Output("memo".$m_id.".pdf","d");
			
	}
	
	header("location:view_records.php");		
	exit();
?>

                                                   ?>