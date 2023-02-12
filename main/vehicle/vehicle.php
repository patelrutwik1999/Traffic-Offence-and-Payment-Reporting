<?php
	session_start();
	
	include '../../connection/config.php';
	$u_id = $_SESSION['user id'];
	// To check whether the user has added any vehicle
	$check = "select vehicle_number from vehicle_details where user_id = '$u_id'";
	$result = mysqli_query($conn,$check);
	$num = mysqli_num_rows($result);
	if ($num == 0){
		$_SESSION['is error'] = true;
		$_SESSION['error desc']='Vehicle Not Added';
		header("location:../../home.php");
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
                
                header("location:../../home.php");
            }
            else{
                if ($_SESSION['logged in type'] == "police") {
                    header("location:../../home.php");
                }
            }
            
            include '../../header.php';
    ?>
          
            
    ?>
    <!-- Title Page-->
    <title>My Vehicles</title>

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
                	
                    <h2 class="title">My Vehicles</h2>
                </div>
                <div class="card-body" style="width: 80px">
                    <form method="POST" action="main/vehicle/remove.php" enctype="multipart/form-data">
                        <table id="customers" style="width:980px; margin-left: -20px" >
                            <tr>
                                <th>Vehicle Number</th>
                                <th>Remove</th>   
                            </tr>
                <?php
                while ($row = mysqli_fetch_array($result)) 
                {
            ?>  
                <tr>
                    <td><input  type="text" value="<?php echo $row['vehicle_number'];?>"></td>
                    <td><a hrclass="btn btn--radius-2 btn--red" type="submit" href="main/vehicle/remove.php?no=<?php echo $row['vehicle_number'];?>">Remove</a></td>
                </tr><?php }?>
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
        include '../../footer.html';
    ?>
</footer>
</html>
<!-- end document-->