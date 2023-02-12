<?php
//Opens when user clicks on bell icon
    session_start();
    if(empty($_SESSION['logged']) || empty($_SESSION['logged in type'])){
        header("location:home.php");
        exit();
    }
    if($_SESSION['logged in type'] == "police"){
        header("location:home.php");
        exit();
    }
    include 'connection/config.php';
    $arr_veh = array();
    $userid = $_SESSION['user id'];
    $cmsql2 = "select * from vehicle_details where user_id = '".$userid."'";
    $result1 = mysqli_query($conn,$cmsql2);
    $num = mysqli_num_rows($result1);
    if($num >= 1){
        while($cmres1 = mysqli_fetch_assoc($result1)){
            $arr_veh= array_merge($arr_veh,array($cmres1['vehicle_number']));
        }
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="jquery-3.4.1.min.js"></script>
    <!-- header -->
    <!-- Title Page-->
    <title>Notifications</title>

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
     <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> 
     <?php include 'header.php'?>
</head>

<body>
    <div class="container">
    <div class="page-wrapper p-t-45 p-b-50" style="background-color:#d2d4c8">
        <div class="wrapper wrapper--w790">
            <div class="card card-5">
                <div class="card-heading">
                    <h2 class="title">Memo Notifications</h2>
                </div>
                <div class="card-body">
                    <div class="w3-responsive"> 
                        <table class="w3-table-all w3-card-4 w3-hoverable">
                            <tr class="w3-red">
                                <th>Vehicle Number</th>
                                <th>Status</th>
                                <th>Remove</th>
                            </tr>
                        <?php
                            for($e=0;$e<count($arr_veh);$e++){
                                $cmsql1 = "select * from memo_details where vehicle_number = '".$arr_veh[$e]."' AND view_status ='0' AND pay_status='0'";
                                $result = mysqli_query($conn,$cmsql1);
                                $ress = mysqli_fetch_assoc($result);
                                $num = mysqli_num_rows($result);
                                if($num == 1){
                                    echo "<tr>";
                                    echo "<td>".strtoupper($arr_veh[$e])."</td>";
                                    echo "<td>TOWED</td>";
                                    echo "<td onclick='remove_entry(this)'><button class='w3-btn w3-black'  id='".$arr_veh[$e]."/".$ress['due_date']."'>X</button></td>";
                                    echo "</tr>";
                                }
                            }
                        ?>
                    </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    <!--Javascript to validate number  start-->
    <script type="text/javascript" src="validate.js">    
    </script>
    <!--Javascript to validate number  end-->
    <!-- Jquery JS-->
    <script src="external_theme/vendor/jquery/jquery.min.js"></script>
    <script type="text/javascript">
        function remove_entry(e){
            var num = $(e).children().attr('id');
            var xmlhttp2 = new XMLHttpRequest();
            xmlhttp2.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    $(e).parent().remove();
                }
            };
                xmlhttp2.open("GET","set_status.php?x="+num, true);
                xmlhttp2.send();
            
        }
    </script>()
    <!-- Vendor JS-->
    <script src="external_theme/vendor/select2/select2.min.js"></script>
    <script src="external_theme/vendor/datepicker/moment.min.js"></script>
    <script src="external_theme/vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="external_theme/js/global.js"></script>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
<footer>
    <?php
            include 'footer.html';
        ?>
</footer>
</html>
<!-- end document-->
    
