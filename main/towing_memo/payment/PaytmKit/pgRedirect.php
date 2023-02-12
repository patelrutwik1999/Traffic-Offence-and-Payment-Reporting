<?php
session_start();
header("Pragma: no-cache");
header("Cache-Control: no-cache");
header("Expires: 0");
// following files need to be included
require_once("./lib/config_paytm.php");
require_once("./lib/encdec_paytm.php");

$checkSum = "";
$paramList = array();


$ORDER_ID = $_GET["mid"];
include '../../../../connection/config.php';
$sql = "select amount from memo_details where memo_id = '$ORDER_ID'";
	$result1 = mysqli_query($conn,$sql);	
	$num = mysqli_num_rows($result1);
	$rows = $result1 -> fetch_assoc();
	if ($num == 1)
	{
		$TXN_AMOUNT = $rows["amount"];		
	}
	else
	{	
		echo "error";
	}	
$CUST_ID = $_SESSION["user id"];
$INDUSTRY_TYPE_ID = "Retail";
$CHANNEL_ID = "WEB";


// Create an array having all required parameters for creating checksum.
$paramList["MID"] = PAYTM_MERCHANT_MID;
$paramList["ORDER_ID"] = $ORDER_ID;
$paramList["CUST_ID"] = $CUST_ID;
$paramList["WEBSITE"] = PAYTM_MERCHANT_WEBSITE;
$paramList["INDUSTRY_TYPE_ID"] = $INDUSTRY_TYPE_ID;
$paramList["CHANNEL_ID"] = $CHANNEL_ID;
$paramList["TXN_AMOUNT"] = $TXN_AMOUNT;




$paramList["CALLBACK_URL"] = "http://localhost/TORP/main/towing_memo/payment/PaytmKit/pgResponse.php";

/*
$paramList["MSISDN"] = $MSISDN; //Mobile number of customer
$paramList["EMAIL"] = $EMAIL; //Email ID of customer
$paramList["VERIFIED_BY"] = "EMAIL"; //
$paramList["IS_USER_VERIFIED"] = "YES"; //

*/

//Here checksum string will return by getChecksumFromArray() function.
$checkSum = getChecksumFromArray($paramList,PAYTM_MERCHANT_KEY);

?>

<html>
<head>
<title>Merchant Check Out Page</title>
</head>
<body>
	<center><h1>Please do not refresh this page...</h1></center>
		<form method="post" action="<?php echo PAYTM_TXN_URL ?>" name="f1">
		<table border="1">
			<tbody>
			<?php
			foreach($paramList as $name => $value) {
				echo '<input type="hidden" name="' . $name .'" value="' . $value . '">';
			}
			?>
			<input type="hidden" name="CHECKSUMHASH" value="<?php echo $checkSum ?>">
			</tbody>
		</table>
		<script type="text/javascript">
			document.f1.submit();
		</script>
	</form>
</body>
</html>