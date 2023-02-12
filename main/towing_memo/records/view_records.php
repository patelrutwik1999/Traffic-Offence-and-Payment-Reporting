<?php
	session_start();
	
	include '../../../connection/config.php';
	$u_id = $_SESSION['user id'];
	// To check whether the user has added any vehicle
	$check = "select * from payment_record where user_id = '$u_id' ";
	$result = mysqli_query($conn,$check);
	$num = mysqli_num_rows($result);
    
	if ($num == 0){
		$_SESSION['is error'] = true;
		$_SESSION['error desc']='No payment records found!';
		#echo $u_id;
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
    <!-- Title Page-->
    <title>Payed Memo Details</title>

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
    <style>
        #customers {
          font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
          border-collapse: collapse;
          width: 100px;
        }

        #customers td, #customers th {
          border: 1px solid #ddd;
           padding: 8px;
        }

        #customers tr:nth-child(even){background-color: #f2f2f2;}

        #customers tr:hover {background-color: #ddd;}

        #customers th {
          padding-top: 12px;
          padding-bottom: 12px;
          text-align: left;
          background-color: #4CAF50;
          color: white;
        }
    </style>
</head>

<body>
    
    <div class="container" style="width: 90%">
    <div class="page-wrapper p-t-45 p-b-50" >
        <div class="wrapper" style="margin-left: 40px; width: 1100px; margin-right: 0px ">
            <div class="card card-5" >
                <div class="card-heading">
                	
                    <h2 class="title">Payed Memo Details</h2>
                </div>
                <div class="card-body" style="width: 80px">
                
                    <form method="POST" action="#" enctype="multipart/form-data">
                         
                        <table id="customers" style="width:980px; margin-left: -20px" >
                            <tr>
                                <th>Memo Id</th>
                                <th>Vehicle Number</th>
                                <th>Transaction Id</th>
                                <th>Amount</th>
                                <th>Vehicle Type</th>
                                <th>Date</th>
                                <th>Payment Date</th>
                                <th>Location</th>
                                <th>Download</th>
                              </tr>
                         
            <?php
                while ($row = mysqli_fetch_array($result)) 
                {
                    $m_id = $row['memo_id'];
                    $sql = "select * from memo_details where memo_id = '$m_id'";
                    $result1 = mysqli_query($conn,$sql);
                    while ($all_data = mysqli_fetch_array($result1)) 
                    { 
            ?>          
                              <tr>
                                <td><input  type="text"  value="<?php echo $m_id;?>" readonly="true"></td>
                                <td><input  type="text"  value="<?php echo $all_data['vehicle_number'];?>" readonly="true"></td>
                                <td><input  type="text"  value="<?php echo $row['pay_id'];?>" readonly="true"></td>
                                <td><input  type="text"  value="<?php echo $all_data['amount'];?>" readonly="true"></td>
                                <td><input type="text"  value="<?php echo $all_data['vehicle_type'];?>" readonly="true"></td>
                                
                                <?php 
                                    // Date, when memo issued
                                    $datetime =$all_data['date_time'];
                                    $str2 = explode(" " , $datetime);
                                ?>
                                <td><input  type="text"  readonly="true" value="<?php echo $str2[0];?>"></td>

                                <?php
                                    // Payment DAte 
                                    $datetime =$row['date_time'];
                                    $str1 = explode(" " , $datetime);
                                ?>
                                <td><input  type="text"  readonly="true" value="<?php echo $str1[0]; ?>"></td>

                                <?php
                                    $rto = $all_data['view_status'];
                                    if ($rto == 0) 
                                    {
                                        $a_id = $all_data['area_id'];
                                        $area_check = "select * from area_details where area_id = '$a_id'";
                                        $result2 = mysqli_query($conn,$area_check);
                                        $num2 = mysqli_num_rows($result2);
                                        $row1 = $result2 -> fetch_assoc();
                                        if ($num2 == 1) 
                                        {
                                ?>
                                <td><input type="text" readonly="true" value="<?php echo $row1['pickup_area'];?>"></td>
                                <?php
                                        }
                                        else
                                        {
                                            echo "error in area query";
                                        }
                                    }
                                    else
                                    {
                                ?>
                                <td>At RTO</td>
                                <?php 
                                    }
                                ?>
                                <td><a class="btn btn--radius-2 btn--red" type="submit" href="main/towing_memo/records/generate_pdf.php?m_id=<?php echo $all_data['memo_id'];?>">PDF</a></td>
                              </tr>
                           

                        
                        <?php
                        	}
                         
                        
                        }                         
                        ?>
                         </table>
                    </form>
              </div>

        </div>
        <hr style='border-color: Black; border-width: 5px'>"
        </div>
    </div>
</div>
<?php 
		
		
	
?>      
       
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