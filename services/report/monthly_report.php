<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- header -->
    <?php
            session_start();
            if($_SESSION["logged"] == false) 
            {
                header("location:../../home.php");
            }
            include '../../header.php';
            include '../../connection/config.php';
    ?>

    <style type="text/css">
        select{
            height: 30px;
        }
    </style>
    <!-- Title Page-->
    <title>Report</title>

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

    <!-- Verifying whether user is police or a citizen -->
    <?php 

     //   $user_type_url = $_GET['id'];
        $login_type = $_GET['loty'];
        
    ?>

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
            background-color: #4CAF50;
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
    </style>

    <!-- Filter js and css -->
    <link rel="stylesheet" type="text/css" href="services/report/jquery-ui.css">
    <script type="text/javascript" src="services/report/jquery-1.12.4.js"></script>
    <script type="text/javascript" src="services/report/jquery-ui.js"></script>
    <script type="text/javascript">
        $( function() {
            $( "#from" ).datepicker({
            changeMonth: true,
            changeYear: true
            });
        } );

        $( function() {
            $( "#to" ).datepicker({
            changeMonth: true,
            changeYear: true
            });
        } );
    </script>

    <style type="text/css">
        .parent {
            height:150px;
            width:100%;
        }
        .childA{
          float:left;
          width:40%;
          
          height:200px
        }
        .childB {
          float:right;
          width:60%;
          
          height:200px
        }    
    </style>
    

</head>

<body >
    <br>
    <br>
    <!-- Retrieving value from database -->
        <?php
            if ($login_type == '1') 
            {
                // for user a.k.a Citizen
                $u_id = $_SESSION['user id'];
                $sql = "select * from user_details where user_id = '$u_id'";
                $result = mysqli_query($conn,$sql);
                $num = mysqli_num_rows($result);
                $row = $result->fetch_assoc();
                if ($num == 1) 
                {
        ?>
    <div class="container">
    <div class="page-wrapper p-t-45 p-b-50" >
        <div class="wrapper" style="margin-left: 40px; width: 1100px; margin-right: 0px ">
            <div class="card card-5" style="background-image: linear-gradient(#FFFF00, #ADD8E6);">
                <div class="card-heading" >
                    <h2 class="title">Welcome &nbsp&nbsp<?php echo $_SESSION['user name']; ?>, here's your report</h2>
                </div>
                <div class="card-body">
                    <div class="parent">
                        <div class="childA">
                            <strong><span style="font-weight: bold;font-size: 36px">Memo Details:-</strong></span>
                        </div>
                        <div class="childB">
                            <span style="font-weight: bold;font-size: 25px">Filter Options</span>
                            <br>
                            <br>
                            <form action="services/report/monthly_report_user.php" method="post">
                            <div class="form-group">
                                <label class="col-sm-2 control-label" style="font-size: 15px">From</label>
                                <div class="col-lg-4">
                                    <input type="date" name="from_date" id="from">
                                </div>
                                <label class="col-sm-2 control-label" style="font-size: 15px">To</label>
                                <div class="col-lg-4">
                                    <input type="date" name="to_date" id="to" >
                                </div>
                                <div class="col-lg-4" style="align-content: center;float: right;">
                                    <br>
                                    <input type="submit" class="btn btn-primary">
                                </div>
                            </div>
                            </form>
                        </div>
                    </div> 
                    
                        
                        <table id="customers">
                            <tr>
                                <th>Vehicle Number</th>
                                <th>Memo Id</th>
                                <th>Memo Issued</th>
                                <th>Amount</th>
                                <th>Date</th>
                                <th>Due Date</th>
                                <th>Paid</th>
                            </tr>
                        <?php
                            $id = $_SESSION['user id'];
                            $sql = "select * from vehicle_details where user_id = '$id'";
                            $result = mysqli_query($conn,$sql);
                            $num = mysqli_num_rows($result);
        //Pagination Logic...

        //define How many results you want per page
        $results_per_page = 3;

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
        //echo $starting_limit_number;
        $sql1 = "select * from vehicle_details where user_id = '$id' LIMIT ".$starting_limit_number.",".$results_per_page;
        //echo $sql1;
        $result_sql1 = mysqli_query($conn,$sql1);
        $num_sql1 = mysqli_num_rows($result_sql1);
        //echo $num_sql1;
        //display links for page

                            if ($num_sql1 != 0) 
                            {
                                while($row = mysqli_fetch_array($result_sql1)) {
                                    $v_no = $row['vehicle_number'];
                                   // echo $v_no;
                                    $select1 = "select memo_id, pay_status, amount, date_time, due_date from memo_details where vehicle_number = '$v_no'";
                                    $result2 = mysqli_query($conn,$select1);
                                    $num2 = mysqli_num_rows($result2);
                                    if ($num2 != 0) 
                                    {
                                        while ($row1 = mysqli_fetch_array($result2))
                                        {
                        ?>
                            <tr>
                                <td><?php echo strtoupper($v_no); ?></td>
                                <td><?php echo $row1['memo_id']; ?></td>
                                <td><?php echo "YES"; ?></td>
                                <td><?php echo $row1['amount']; ?></td>
                        <?php
                            $date = explode(" ", $row1['date_time']);
                        ?>

                                <td><?php echo $date[0]; ?></td>
                                <td><?php echo $row1['due_date']; ?></td>
                        <?php
                            if ($row1['pay_status'] == true) {
                        ?>
                            <td><?php echo "YES"; ?></td>
                        <?php        
                            }
                            else
                            {
                        ?>
                            <td><?php echo "NO"; ?></td>
                        <?php
                            }
                        ?>
                            </tr>
                        <?php        
                                        }// while 2 ending
                                    }
                                    else
                                    {
                                        
                        ?>
                            <tr>
                                <td><?php echo strtoupper($v_no); ?></td>
                                <td><?php echo "NO"; ?></td>
                                <td><?php echo "NO"; ?></td>
                                <td><?php echo "NO"; ?></td>
                                <td><?php echo "NO"; ?></td>
                                <td><?php echo "NO"; ?></td>
                                <td><?php echo "NO"; ?></td>
                            </tr>
                        <?php 
                                    }
                                    ?>
                                    
                <?php
                                }// while 1 end
                            }
                            else
                            {
                                echo "No Vehicle Added";
                            }
                        ?>
                        
                        <?php
                        
                            }
                            else
                            {
                                echo "no record Found.";
                            }
                        ?>
                        </table>
                    </form>
                    <br>
            <div class="w3-bar w3-border w3-round" style="background-color:grey">
                <?php
                    $prev = $page-1; 
                    if($prev != 0){
                ?>
                <a class="w3-button w3-left previous" href=<?php echo "services/report/monthly_report.php?page=".($page-1);?>&loty=1 
                                 >&#10094; Previous</a>
                            <?php }
                            ?>
                            
                            <?php if($number_of_pages > 1 && $page != $number_of_pages){?>
                                <a class="w3-button w3-right next" href=<?php echo "services/report/monthly_report.php?page=".($page+1);?>&loty=1
                                 > Next &#10095;</a>
                            <?php }?>
                </div>
</div>

            </div>
        </div>
    </div>
</div>
                <?php
                    }
                    else 
                    {
                        $p_id = $_SESSION['police id'];
                        $sql = "select * from police_details where pid = '$p_id'";
                        $result = mysqli_query($conn,$sql);
                        $num = mysqli_num_rows($result);
                        $row = $result->fetch_assoc();
                        if ($num == 1) 
                        {
                ?>
<div class="container">
    <div class="page-wrapper p-t-45 p-b-50" >
        <div class="wrapper" style="margin-left: 40px; width: 1040px; margin-right: 0px ">
            <div class="card card-5" style="background-image: linear-gradient(#FFFF00, #ADD8E6);">
                <div class="card-heading" >
                    <h2 class="title">Welcome &nbsp&nbspCOP, here's your report</h2>
                </div>

                <div class="card-body">
                    <div class="parent">
                        <div class="childA">
                            <strong><span style="font-weight: bold;font-size: 36px">Memo Issued Details:-</strong></span>
                        </div>
                        <div class="childB">
                            <span style="font-weight: bold;font-size: 25px">Filter Options</span>
                            <br>
                            <br>
                            <form action="services/report/monthly_report_police.php" method="post">
                            <div class="form-group">
                                <label class="col-sm-2 control-label" style="font-size: 15px">From</label>
                                <div class="col-lg-4">
                                    <input type="date" name="from_date" id="from">
                                </div>
                                <label class="col-sm-2 control-label" style="font-size: 15px">To</label>
                                <div class="col-lg-4">
                                    <input type="date" name="to_date" id="to" >
                                </div>
                                <div class="col-lg-4" style="align-content: center;float: right;">
                                    <br>
                                    <input type="submit" class="btn btn-primary">
                                </div>
                            </div>
                            </form>
                        </div>
                    </div> 
                
                        <table id="customers">
                            <tr>
                                <th>Vehicle Number</th>
                                <th>Memo Id</th>
                                <th>Amount</th>
                                <th>Date</th>
                            </tr>
    <?php
        $sql = "select vehicle_number, memo_id, amount, date_time from memo_details where police_id = '$p_id'";
        $result = mysqli_query($conn,$sql);
        $num = mysqli_num_rows($result);
        //Pagination Logic...

        //define How many results you want per page
        $results_per_page = 7;

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
        //echo $starting_limit_number;
        $sql1 = "select vehicle_number, memo_id, amount, date_time from memo_details where police_id = '$p_id' LIMIT ".$starting_limit_number.",".$results_per_page;
        //echo $sql1;
        $result_sql1 = mysqli_query($conn,$sql1);
        $num_sql1 = mysqli_num_rows($result_sql1);
        //echo $num_sql1;
        //display links for page

                            if ($num_sql1 != 0) 
                            {
                                while($row = mysqli_fetch_array($result_sql1)) {
                        ?>
                            <tr>
                                <td><?php echo strtoupper($row['vehicle_number']); ?></td>
                                <td><?php echo $row['memo_id']; ?></td>
                                <td><?php echo $row['amount']; ?></td>
                        <?php
                            $date = explode(" ", $row['date_time']);
                        ?>

                                <td><?php echo $date[0]; ?></td>
                            </tr>
                        <?php        
                                    }
                                }
                                    else
                                    {
                                        
                        ?>
                            <tr>
                                <?php echo "No memo Issued.";?>
                            </tr>
                        <?php 
                                    }       
                                    ?>
                                    
                <?php
                    }
                
                ?>
                        
                        </table>
                    </form>
                    <br>
            <div class="w3-bar w3-border w3-round" style="background-color:grey">
                <?php
                    $prev = $page-1; 
                    if($prev != 0){
                ?>
                <a class="w3-button w3-left previous" href=<?php echo "services/report/monthly_report.php?page=".($page-1);?>&loty=2 
                                 >&#10094; Previous</a>
                            <?php }
                            ?>
                            
                            <?php if($number_of_pages > 1 && $page != $number_of_pages){?>
                                <a class="w3-button w3-right next" href=<?php echo "services/report/monthly_report.php?page=".($page+1);?>&loty=2
                                 > Next &#10095;</a>
                            <?php }}?>
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

    <br>
    <br>
    
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
<footer>
    <?php
            include '../../footer.html';
        ?>
</footer>
</html>
<!-- end document-->