<?php
	session_start();
	
	include '../../../connection/config.php';
	$u_id = $_SESSION['user id'];
	// To check whether the user has added any vehicle
    $check = "select vehicle_number from vehicle_details where user_id = '$u_id'";
	$result = mysqli_query($conn,$check);
	$num = mysqli_num_rows($result);
	#start of 1st if
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


    <style>
        #customers {
            font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
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
            background-color: olive;
            color: white;
        }
        .previous {
            background-color: #FF0000;
            color: black;
        }

        .next {
          background-color: #0000FF;
          color: white;
        }

        #myInput {
          background-image: url('/css/searchicon.png');
          background-position: 10px 10px;
          background-repeat: no-repeat;
          width: 100%;
          font-size: 16px;
          padding: 12px 20px 12px 40px;
          border: 1px solid #ddd;
          margin-bottom: 12px;
        }

    </style>

</head>

<body>
    <?php
        $track = 0;
        $array_records = array();
        # start of 1 while
        while ($row = mysqli_fetch_array($result)) 
		{
            $array_records[] = $row['vehicle_number'];
        }
        if (isset($_POST["v_number"])) {
            $v_no_derived = $_POST["v_number"];   
        }
        else
        {
            $v_no_derived = $_GET["vno"];
        }
         
        if (in_array($v_no_derived, $array_records)) {
            $sql = "select * from memo_details where vehicle_number = '$v_no_derived'";
        ?>
<div class="container">
    <div class="page-wrapper p-t-45 p-b-50" >
        <div class="wrapper" >
            <div class="card card-5" style="background-image: linear-gradient(to bottom left, #33ccff 0%, #ccffff 100%);">
                <div class="card-heading">       
                    <h2 class="title">Memo Description</h2>
                </div>
                <div class="card-body">
                    
                    <table id="customers">    
                            <tr>
                                <th>Vehicle Number</th>
                                <th>Pickup Location</th>
                                <th>Destination Address</th>
                                <th>Contact Number</th>
                                <th>Officer Name</th>
                                <th>Amount</th>             
                                <th>Photo</th>
                                <th>Vehicle Type</th>
                                <th>Date</th>
                                <th>Due Date</th>
                                <th>Paid</th>
                            </tr>
        <?php
            $result1 = mysqli_query($conn,$sql);
            $num = mysqli_num_rows($result1);
            //Pagination Logic...

            //define How many results you want per page
            $results_per_page = 5;

            //Find out number of results stored in database
            $number_of_results = $num;

            //Determine number of total pages available
            $number_of_pages = ceil($number_of_results/$results_per_page);
         
            //determine page number visitor is currently on
            if(!isset($_GET['page'])){
                $page =1 ;
            }
            else{
            if($_GET['page']>$number_of_pages){
                #header("location:monthly_report.php");
                exit();
            }
            else{
                $page = $_GET['page'];
            }
        }

        //determine the sql LIMIT starting number for results on the displaying page
        $starting_limit_number = ($page - 1)*$results_per_page;
        //echo $starting_limit_number;*/

        $sql1 = "select * from memo_details where vehicle_number = '$v_no_derived' LIMIT ".$starting_limit_number.",".$results_per_page;
        //echo $sql1;
        $result_sql1 = mysqli_query($conn,$sql1);
        $num_sql1 = mysqli_num_rows($result_sql1);
        //echo $num_sql1;
        //display links for page

                if ($num_sql1 != 0) {
            
                while ($all_data = mysqli_fetch_array($result_sql1)) 
                {
            ?>
                <tr>
                    <td><?php echo strtoupper($all_data['vehicle_number']);?></td>
                    <!--<td><?php //echo $all_data['memo_id'];?></td>-->
            <?php
                $a_id = $all_data['area_id'];
                $area_check = "select * from area_details where area_id = '$a_id'";
                $result2 = mysqli_query($conn,$area_check);
                $num2 = mysqli_num_rows($result2);
                $row1 = $result2 -> fetch_assoc();
                # start of 3rd if
                if ($num2 == 1) 
                {                                
            ?>
                    <td><?php echo $row1['pickup_area'];?></td>
                    <td><?php echo $row1['destination_address'];?></td>
                    <td><?php echo $row1['contact_number'];?></td>
            <?php 
                $p_id = $all_data['police_id'];            
                $p_name = "select police_details.first_name, police_details.middle_name, police_details.last_name from area_details inner join police_details on police_details.pid = '$p_id'";            
                $result3 = mysqli_query($conn,$p_name);
                $num3 = mysqli_num_rows($result3);
                $row2 = $result3 -> fetch_assoc();
                if ($num3 != 0) 
                {
                    $fname = $row2['first_name'];
                    $mname = $row2['middle_name'];
                    $lname = $row2['last_name'];
                    $name = $fname." ".$mname." ".$lname;                         
                ?>
                    <td><?php echo $name;?></td>
                <?php
                        }
                        # end of 3rd if
                        else
                        {
                            echo "error in join query";
                        }
                    }
                    # end of 2nd if
                    else
                    {
                        echo "area doesnot exist";
                    }
                ?>
                    <td><?php echo $all_data['amount'];?></td>
                    <td><?php echo "<img src='TORP".$all_data['photo']."' width='255' height='200' />"; ?></td>
                    <td><?php echo $all_data['vehicle_type'];?></td>
                    <?php 
                        $datetime =$all_data['date_time'];
                        $str1 = explode(" " , $datetime);
                    ?>
                    <td><?php echo $str1[0];?></td>
                    <td><?php echo $all_data['due_date'];?></td>
                    <?php
                        $pay = $all_data['pay_status'];
                        if ($pay == 0) {
                    ?>
                    <td><a href="main/towing_memo/payment/show_memo.php">Not Paid</a></td>
                    <?php
                        }
                        else
                        {
                    ?>
                        <td><a href="main/towing_memo/records/view_records.php">Paid</a></td>
                    <?php
                        }
                    }}
                    else
                    {
                    ?>
                        <td colspan="11">No Record Found</td>
                    <?php
                    }
                    ?>
                </tr>
            </table>
            <br>
            <div style="width: 1006px;background-color:grey " class="w3-bar w3-border w3-round" >
                <?php
                    $prev = $page-1; 
                    if($prev != 0){
                ?>
                <a class="w3-button w3-left previous" href=<?php echo "main/towing_memo/view_memo/view_memo.php?page=".($page-1);?>&vno=<?php echo $v_no_derived;?> 
                                 >&#10094; Previous</a>
                            <?php }
                            ?>
                            
                            <?php if($number_of_pages > 1 && $page != $number_of_pages){?>
                                <a class="w3-button w3-right next" href=<?php echo "main/towing_memo/view_memo/view_memo.php?page=".($page+1);?>&vno=<?php echo $v_no_derived;?>
                                 > Next &#10095;</a>
                            <?php }?>
                </div>
      
        <?php
                    
            }
        else
        {
            echo "Illegal Vehicle Number Entry";
            print_r($array_records);
        }
    
	?>
    </div>
  </div></div></div></div>
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
<?php
        }
?>