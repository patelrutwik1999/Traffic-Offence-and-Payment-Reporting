<?php
	session_start();
	
	include '../../../connection/config.php';
	$u_id = $_SESSION['user id'];
	// To check whether the user has added any vehicle
	$check = "select vehicle_number from vehicle_details where user_id = '$u_id'";
	$result = mysqli_query($conn,$check);
	$num = mysqli_num_rows($result);
	if ($num == 0){
		$_SESSION['is error'] = true;
		$_SESSION['error desc']='Vehicle Not Added';
		header("location:../../../home.php");
	}
	else
	{
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- header -->
    <?php
        <?php
        
        if($_SESSION["logged"] == false) 
            {
                
                header("location:../../../home.php");
            }
            else{
                if ($_SESSION['logged in type'] == "police") {
                    header("location:../../../home.php");
                }
            }
            
            include '../../../header.php';
    ?>
          
            
    ?>

    <script type="text/javascript">
        function gtime(){
            var today = new Date();
            var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
            var date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
            document.getElementById("time").value=time;
            document.getElementById("date").value=date;
        }
    </script>
    <!-- Title Page-->
    <title>Generate Towing Memo</title>

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
    <br>
    <br>
    <div class="container">
    <div class="page-wrapper p-t-45 p-b-50" style="background-color: #798fe3">
        <div class="wrapper wrapper--w790">
            <div class="card card-5">
                <div class="card-heading">
                	<?php
                        $row = $result -> fetch_assoc();
						$v_no = $row['vehicle_number'];
						
						$sql = "select * from memo_details where vehicle_number = '$v_no'";
						
                        $result1 = mysqli_query($conn,$sql);
                        while ($all_data = mysqli_fetch_array($result1)) 
               	        { 
                    ?>
                    <h2 class="title">Vehicle Number &nbsp <?php echo $all_data['vehicle_number']; ?></h2>
                </div>
                <div class="card-body">
                    <form method="POST" action="main/towing_memo/generate_memo_processing.php" enctype="multipart/form-data">
                        <div class="form-row">
                            <div class="name">Memo Id</div>
                            <div class="value">
                                <div class="">
                                    <div class="col-2">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" type="text" value="<?php echo $all_data['memo_id'];?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Pickup Location</div>
                            <div class="value">
                                <div class="">
                                    <div class="col-2">
                                        <div class="input-group-desc">
                                        	<?php
                                                	$a_id = $all_data['area_id'];
                                                	$area_check = "select * from area_details where area_id = '$a_id'";
                                                	$result2 = mysqli_query($conn,$area_check);
													$num2 = mysqli_num_rows($result2);
													$row1 = $result2 -> fetch_assoc();
													if ($num2 == 1) 
													{
												
                                                ?>
                                            <input class="input--style-5" type="text" value="<?php echo $row1['pickup_area'];  ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Destination Address</div>
                            <div class="value">
                                <div class="">
                                    <div class="col-2">
                                        <div class="input-group-desc">
                                            <textarea class="input--style-5" type="text" cols="50" rows="1.5"> <?php echo $row1['destination_address'];?>
                                            </textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Contact Number</div>
                            <div class="value">
                                <div class="">
                                    <div class="col-2">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" type="text" value="<?php echo $row1['contact_number'];?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php 
                          	$p_name = "select police_details.first_name, police_details.middle_name, police_details.last_name from area_details inner join police_details on area_details.police_id = police_details.pid";
                            $result3 = mysqli_query($conn,$p_name);
							$num3 = mysqli_num_rows($result3);
							$row2 = $result3 -> fetch_assoc();
							if ($num3 == 1) 
							{
								$fname = $row2['first_name'];
                          		$mname = $row2['middle_name'];
                                $lname = $row2['last_name'];
                  				$name = $fname." ".$mname." ".$lname;
                                        			
                          	?>
                        <div class="form-row">
                            <div class="name">Officer Name</div>
                            <div class="value">
                                <div class="">
                                    <div class="col-2">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" type="text" value="<?php echo $name;?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                            	}
                            	else
                            	{
                                	echo "error in join query";
                  				}
                           	}
                            else
                            {
                       			echo "area doesnot exist";
                            }
                        ?>
                        <div class="form-row">
                            <div class="name">Amount</div>
                            <div class="value">
                                <div class="">
                                    <div class="col-2">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" type="text" value="<?php echo $all_data['amount'];?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Due_Date</div>
                            <div class="value">
                                <div class="">
                                    <div class="col-2">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" type="text" value="<?php echo $all_data['due_date'];?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Photo</div>
                            <div class="value">
                                <div class="input-group">
                                    <?php echo "<img src='TORP".$all_data['photo']."' width='255' height='200' />"; ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Vehicle Type</div>
                            <div class="value">
                                <div class="">
                                    <div class="col-2">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" type="text" value="<?php echo $all_data['vehicle_type'];?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Date</div>
                            <div class="value">
                                <div class="">
                                    <div class="col-2">
                                        <div class="input-group-desc">
                                        	<?php 
                                            	$datetime =$all_data['date_time'];
                                                $str1 = explode(" " , $datetime);
                                            ?>       
                                            <input class="input--style-5" type="text" value="<?php echo $str1[0]; ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Time</div>
                            <div class="value">
                                <div class="">
                                    <div class="col-2">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" type="text" value="<?php echo $str1[1]; ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                        	$pay = $all_data['pay_status'];
                        	if ($pay == 0) {
                        ?>
						<button class="btn btn--radius-2 btn--red" type="submit">Pay</button>
                        </div>
                        <?php 
                        	}
                        	else
                        	{
                       	?>
                        <button class="btn btn--radius-2 btn--red" type="submit">View Transaction</button>
                        <?php
                        	}
                        }
                        ?>
                    </form>
                    <?php echo "<hr style='border-color: Black; border-width: 5px'>";?>
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

    <br>
    <br>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
<footer>
    <?php

		}
        include '../../../footer.html';
    ?>
</footer>
</html>
<!-- end document-->