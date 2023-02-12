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
    <title>Search Memo</title>

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
    <script type="text/javascript">
        function validateNumber(form) {
            var number = document.getElementById('v_number').value;
            pattern = /^[A-Za-z]{2}[0-9]{1,2}([A-Za-z])?([A-Za-z]){1,2}[0-9]{1,4}$/;
            /*
                ^ means start of the string
                [A-Z]{2} means 2 characters in the range of A through Z
                [0-9]{2} means 2 characters in the range of 0 through 9
                [A-Z]{2} means 2 characters in the range of A through Z
                [0-9]{4} means 4 characters in the range of 0 through 9
                $ means end of string
            */
            if (!(pattern.test(number))) 
            {
                alert("Enter Vehicle Number in specified format : gj00xxabcd ");
                return false;
            }         
        }
    </script>
</head>

<body onload="gtime()">
    <br><br>
    <div class="container">
    <div class="page-wrapper p-t-45 p-b-50" >
        <div class="wrapper wrapper--w790" >
            <div class="card card-5" style="background-color:#d2d4c8">
                <div class="card-heading">
                    <h2 class="title">Enter Vehicle Number&nbsp</h2>
                </div>
                <div class="card-body">
                    <form method="POST" action="main/towing_memo/view_memo/view_memo.php" enctype="multipart/form-data" onsubmit="return validateNumber(this)">
                        
                        <div class="form-row m-b-55">
                            <div class="name">Vehicle Number</div>
                            <div class="value">
                                <div class="row row-space">
                                    <div class="col-4" style="margin-top: 0px">
                                        <div class="input-group-desc">
                                            <select  name="v_number" class="input--style-5" cols="15" rows="2" required="true" style="width:180px; height: 50px">
                                        <option disabled="disabled" selected=" selected" >Select Your Vehicle</option>
                                        
                    <?php
                        include '../../../connection/config.php';
                        $u_id = $_SESSION['user id'];
                        
                        $sql = "select vehicle_number from vehicle_details where user_id = '$u_id'";
                        $result = mysqli_query($conn, $sql);
                        $num = mysqli_num_rows($result);
                        if ($num != 0) {
                            while ($row = mysqli_fetch_array($result)) {
                            
                    ?>

                        <option><?php echo $row['vehicle_number'];?></option>

                                    
                <?php
                            
                        }
                    }
                    else
                    {
                ?>
                        <option><?php echo "No Vehicle Added.";?></option>
                <?php  
                    }
                ?>
                    </select>
                        </div>
                    </div>
                
                                    <div class="col-2">
                                        <div class="input-group-desc">
                                            <button class="btn btn--radius-2 btn--red" style="height: 50px;" type="submit">Search</button>

                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div><span style="color: red; font-size: 18px">* Please enter vehicle number without space</span>
                        </div>
                    </form>
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