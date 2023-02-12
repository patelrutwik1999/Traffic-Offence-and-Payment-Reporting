<?php 
	require '../../FPDF/fpdf.php';

	class PDF extends FPDF
	{
		// Page header
		function Header()
		{
	    	// Logo
	    	$this->Image('../../img/torp1.JPG',10,6,30);
	    	// Arial bold 15
	    	$this->SetFont('Arial','B',15);
	    	// Move to the right
	    	$this->Cell(80);
	    	// Title
	    	$this->Cell(30,10,'No Parking Zone Memo',1,0,'C');
	    	// Line break
	    	$this->Ln(20);
		}

		// Page footer
		function Footer()
		{
	    	// Position at 1.5 cm from bottom
	    	$this->SetY(-15);
	    	// Arial italic 8
	    	$this->SetFont('Arial','I',8);
	    	// Page number
	    	$this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
		}
	}


	include '../../connection/config.php';
	$m_id = $_SESSION['memo id']
	$p_id = $_SESSION['police id'];
	$sql = "select * from memo_details where memo_id = '$m_id'";
	$result = mysqli_query($conn,$sql);
	$num = mysqli_num_rows($result);
	$row = $result->mysqli_fetch_assoc();
	if ($num == 1) {
		$a_id = $row['area_id'];
		$sql1 = "select * from area_details where area_id = 'a_id'";
		$result1 = mysqli_query($conn,$sql1);
		$num1 = mysqli_num_rows($result1);
		$row1 = $result1->mysqli_fetch_assoc();
		if ($num1 == 1) {
			
			$pdf->Write(5,'Vehicle Number');
			$pdf -> Cell(40,12,'vehicle Number :-');





			$d_date = $row['due_date'];
			$amount = $row['$amount'];
			$date_time = $row['date_time'];
			$datetime =$all_data['datetime'];
	            $str1 = explode(" ", $datetime);
	            $date = $str1[0];
	            $time = $str1[1];
			$v_type= $row['vehicle_type'];
			$v_no = $row['vehicle_number'];	
		}
		else
		{

		}
	}
	else
	{

	}


	$pdf = new FPDF();
	$pdf->AddPage();
	$pdf->SetFont('Arial','B',16);
	$pdf->Cell(40,10,'Hello World!');
	$pdf->Output();

?>

$html = "<body class="animsition">
    		<div class="page-wrapper">

        
        <!-- PAGE CONTAINER-->
        <div class="page-container">
            
            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-header">
                                        <strong>Memo Details</strong>
                                    </div>
                                    <div class="card-body card-block">
    <?php

        include '../../connection/config.php';
        $sql = "select * from memo_details where memo_id = '$m_id'";
        $result = mysqli_query($conn,$sql);
		$num = mysqli_num_rows($result);
		$row = $result->mysqli_fetch_assoc();
		if ($num == 1) {
			$a_id = $row['area_id'];
			$sql1 = "select * from area_details where area_id = 'a_id'";
			$result1 = mysqli_query($conn,$sql1);
			$num1 = mysqli_num_rows($result1);
			$row1 = $result1->mysqli_fetch_assoc();
			if ($num1 == 1)
			{
	?> 
                                        <form action="parking/review_location/validate_location.php" method="post" enctype="multipart/form-data" class="form-horizontal">    
                                        <!-- Code to retrieve value from db-->
                                        
                                            <input type="hidden" name="serial" value="<?php echo $all_data['Sr_no'];?>">
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="select" class=" form-control-label">Vehicle Number</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <?php echo $row['vehicle_number'];  ?>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="textarea-input" class=" form-control-label">PickUp Location</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <?php echo $row1['pickup_area'];  ?>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Destination Address</label>
                                                </div>
                                                <div class="col-12 col-md-9"><?php echo $row1['destination_address'];  ?>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Photo</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                   <?php echo "<img src='main/towing_memo/no_parking_photo/'".$row['photo']."' width='255' height='200' />";
                                                   ?>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Date</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <?php  $datetime =$row['date_time'];
                                                        $str1 = explode(" ", $datetime);
                                                        echo $str1[0];    
                                                    ?>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Time</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <?php echo $str1[1]; 
                                                ?>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Penalty Amount</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <?php echo $row['amount']; ; 
                                                ?>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Vehicle Type</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <?php echo $row['vehicle_type']; ; 
                                                ?>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Due Date</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <?php echo $row['due_date']; ; 
                                                ?>
                                                </div>
                                            </div>

                                        <button type="submit" class="btn btn-primary btn-sm">
                                            <i class="fa fa-dot-circle-o"></i>Pay
                                        </button>
                                        
                                        <?php echo "<hr style='border-color: Blue; border-width: 5px'>";?>
                                       </form>
                                       <?php }
                                       
                                       ?>
                                    </div></div>

                            </div>
                        </div> 

 
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</body>';