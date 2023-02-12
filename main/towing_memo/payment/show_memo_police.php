<?php
    session_start();
    
    include '../../../connection/config.php';
    $p_id = $_SESSION['police id'];
      
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
                if ($_SESSION['logged in type'] == "user") {
                    header("location:../../../home.php");
                }
            }
            
            include '../../../header.php';

            if (isset($_SESSION['is error']) ) {
            $error = $_SESSION['error desc'];
            
            echo '<script>alert("Message : '.$error.'");</script>';

            $_SESSION['is error'] =null;
            $_SESSION['error desc']=null;
        } 
    ?>
          
            
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

    <script>
    function myFunction() {
      var input, filter, table, tr, td, i, txtValue;
      input = document.getElementById("myInput");
      filter = input.value.toUpperCase();
      table = document.getElementById("customers");
      tr = table.getElementsByTagName("tr");
      for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[0];
        if (td) {
          txtValue = td.textContent || td.innerText;
          if (txtValue.toUpperCase().indexOf(filter) > -1) {
            tr[i].style.display = "";
          } else {
            tr[i].style.display = "none";
          }
        }       
      }
    }
    </script>

</head>

<body>
    
    <body>

<div class="container">
    <div class="page-wrapper p-t-45 p-b-50" >
        <div class="wrapper" style="margin-left: 40px; width: 1100px; margin-right: 0px ">
            <div class="card card-5" style="background-image: linear-gradient(to right, #ff6e7f 0%, #bfe9ff 51%, #ff6e7f 100%);">
                <div class="card-heading" >
                    <h2 class="title">Pay Memo Offline</h2>
                </div>
                <div class="card-body">
                    <div class="parent">
                        <div class="childA">
                            <strong><span style="font-weight: bold;font-size: 36px">Memo Details:-</strong></span>
                        </div>
                        <br>
                    </div> 
                        
                        <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for Vehicle Number.." title="Type in a name">
                                    
                        <table id="customers">
                            
                            <tr>
                                <th>Vehicle Number</th>
                                <th>Memo Id</th>
                                <th>Amount</th>
                                <th>Vehicle Type</th>
                                <th>Date</th>
                                <th>Due Date</th>
                                <th>Paid</th>
                            </tr>
                            
                             <?php
        $track = 0;
        $sql = "select * from memo_details where police_id = '$p_id' and pay_status = '0'";
        $result1 = mysqli_query($conn,$sql);
        # start of 2nd while
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

        $sql1 = "select * from memo_details where police_id = '$p_id' and pay_status = '0' LIMIT ".$starting_limit_number.",".$results_per_page;
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
                            <td><?php echo strtoupper($all_data['vehicle_number']); ?></td>
                            <td><?php echo $all_data['memo_id']; ?></td>
                            <td><?php echo $all_data['amount']; ?></td>
                            <td><?php echo $all_data['vehicle_type']; ?></td>
                        <?php
                            $date = explode(" ", $all_data['date_time']);
                        ?>

                                <td><?php echo $date[0]; ?></td>
                                <td><?php echo $all_data['due_date']; ?></td>
                        <?php
                            if ($all_data['pay_status'] == False) {
                        ?>
                            <td><a href="main/towing_memo/payment/pay_offline.php?id=<?php echo $all_data['memo_id'];?>">Pay</a></td>
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
                                }    
                            }
                            else
                            {
                                echo "No Record Found.";
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
                    <a class="w3-button w3-left previous" href=<?php echo "main/towing_memo/payment/show_memo_police.php?page=".($page-1);?> 
                                     >&#10094; Previous</a>
                                <?php }
                                ?>
                                
                                <?php if($number_of_pages > 1 && $page != $number_of_pages){?>
                                    <a class="w3-button w3-right next" href=<?php echo "main/towing_memo/payment/show_memo_police.php?page=".($page+1);?>
                                     > Next &#10095;</a>
                                <?php }?>
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

        
    
        include '../../../footer.html';
    ?>
</footer>
</html>
<!-- end document-->