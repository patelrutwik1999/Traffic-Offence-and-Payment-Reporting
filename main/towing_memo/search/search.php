<?php
	
	session_start();
	include '../../../header.php';
	if ($_SERVER["REQUEST_METHOD"]=="POST") 
	{
		$v_number = test_input($_POST["vehicle_number"]); 	
		
	}

	function test_input($data)
	{
		$data = trim($data);
		$data = stripcslashes($data);
		$data = htmlspecialchars($data);
		return $data;	
	}	

	include '../../../connection/config.php';
	$v_number = strtolower($v_number);
	$check = "select vehicle_number from memo_details where vehicle_number = '$v_number'";
	
	$result = mysqli_query($conn,$check);
	$num = mysqli_num_rows($result);
	?>
	<!-- Code to show the output -->
		<!DOCTYPE html>
		<html lang="en">

		<head>
		    <!-- Required meta tags-->
		    <meta charset="UTF-8">
		    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		    <!-- Title Page-->
		    <title>Memo Details</title>

		    <!-- Icons font CSS-->
		    <link href="external_theme/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
		    <link href="external_theme/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
		    <!-- Font special for pages-->
		    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">

		    <!-- Vendor CSS-->
		    <link href="external_theme/vendor/select2/select2.min.css" rel="stylesheet" media="all">
		    <link href="external_theme/vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

		    <!-- Main CSS-->
		    <link href="external_theme/css/main.css" rel="stylesheet" media="all">
</head>

<body onload="gtime()">
    <div class="container">
    	<div class="page-wrapper p-t-45 p-b-50" style="background-color:#d2d4c8">
        	<div class="wrapper wrapper--w790">
            	<div class="card card-5">
                	<div class="card-heading">
                    	<h2 class="title">Memo Details &nbsp</h2>
                	</div>
        			
                	<div class="card-body">
                        <div class="form-row m-b-55">
                            <div class="name">Vehicle Number</div>
                            <div class="value">
                                <div class="row row-space">
                                    <div class="col-2">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" type="text" value="<?php echo $v_number; ?>" readonly="true">
                                            <!--<label class="label--desc">first name</label>-->
                                        </div>
                                    </div>
                                </div>
                            </div> 
                        </div>
                        <div class="form-row m-b-55">
                        	<div class="name">Status</div>
                            	<div class="value">
                            		<div class="row row-space">
                            			<div class="col-2">
                            				<div class="input-group-desc">
                            					<?php	
													if ($num == 0)
													{	
												?>
                            					<input class="input--style-5" type="readonly" value="<?php echo 'No memo has been issued on the entered number.' ?>">
                            					<?php
                            						}
													else
													{
												?>
												<input class="input--style-5" type="readonly" value="<?php echo 'Yes memo has been issued on the entered number.' ?>">
												<?php 								
													}
                            					?>
                            				</div>
                            			</div>
                            		</div>

                            	</div>
                            </div>
                            <marquee width="100%" direction="left" height="50px" style="font-size: 25px">
							For further information regarding your memo, Please login.
							</marquee>
                       	</div>
            		</div>
            		
            		
                </div>
            </div>    
        </div>
    </div>

    <!-- Jquery JS-->
    <script src="external_theme/vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="external_theme/vendor/select2/select2.min.js"></script>
    <script src="external_theme/vendor/datepicker/moment.min.js"></script>
    <script src="external_theme/vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="external_theme/js/global.js"></script>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
<footer>
    <?php
            include '../../../footer.html';
        ?>
</footer>
</html>
<!-- end document-->

	