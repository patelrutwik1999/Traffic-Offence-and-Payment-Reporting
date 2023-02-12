<?php
session_start();
header("Pragma: no-cache");
header("Cache-Control: no-cache");
header("Expires: 0");

// following files need to be included
require_once("./lib/config_paytm.php");
require_once("./lib/encdec_paytm.php");

$paytmChecksum = "";
$paramList = array();
$isValidChecksum = "FALSE";

$paramList = $_POST;
$paytmChecksum = isset($_POST["CHECKSUMHASH"]) ? $_POST["CHECKSUMHASH"] : ""; //Sent by Paytm pg

//Verify all parameters received from Paytm pg to your application. Like MID received from paytm pg is same as your application’s MID, TXN_AMOUNT and ORDER_ID are same as what was sent by you to Paytm PG for initiating transaction etc.
$isValidChecksum = verifychecksum_e($paramList, PAYTM_MERCHANT_KEY, $paytmChecksum); //will return TRUE or FALSE string.


if($isValidChecksum == "TRUE") {
	echo "<b>Checksum matched and following are the transaction details:</b>" . "<br/>";
	echo $_POST["STATUS"];
	if ($_POST["STATUS"] == "TXN_SUCCESS") {
		if (isset($_POST) && count($_POST)>0 )
		{ 
			$bank_name = $_POST["BANKNAME"];
			$trans_id = $_POST["TXNID"];			
			$memo_id = $_POST["ORDERID"];
			$bank_tran_id = $_POST["BANKTXNID"];
			$tran_date = $_POST["TXNDATE"];
			$tran_amount = $_POST["TXNAMOUNT"];
			$user_id = $_SESSION['user id'];
			// query to insert data into table.
			include '../../../../connection/config.php';
			$insert = "insert into payment_record (pay_id, memo_id, date_time, amount, user_id, bank_tran_id, bank_name) values ('$trans_id', '$memo_id', '$tran_date', '$tran_amount','$user_id', '$bank_tran_id', '$bank_name')";
			if (mysqli_query($conn,$insert)) {
				$update = "update memo_details set pay_status = '1' where memo_id = '$memo_id'";
				if ($conn->query($update) === TRUE) 
				{
				    $_SESSION['is error'] = true;
					$_SESSION['error desc']='Payment Done Successfully.';
					//echo "updated";
					header("location:../../../../home.php");
				} 
				else 
				{
					echo "Error updating record: " . $conn->error;
				}
			}
			else
			{
				$_SESSION['is error'] = true;
				$_SESSION['error desc']='Error in Payment';
				//echo "errro in insert";
				header("location:../../../../home.php");
			}
		}
		//Process your transaction here as success transaction.
		//Verify amount & order id received from Payment gateway with your application's order id and amount.
	}
	else {
		echo "<b>Transaction status is failure</b>" . "<br/>";
	}

	
	

}
else {
	echo "<b>Checksum mismatched.</b>";
	//Process transaction as suspicious.
}

?>