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
                header("location:../home.php");
            }
            include '../header.php';
            include '../connection/config.php';
    ?>

    <style type="text/css">
        select{
            height: 30px;
        }
    </style>
    <!-- Title Page-->
    <title>Dashboard</title>

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
        $user_type_url = $_GET['id'];
        $login_type = $_GET['loty'];
    ?>

</head>

<body >
    <br>
    <br>
    <!-- Retrieving value from database -->
        <?php
            if ($login_type == '1') 
            {
                // for user a.k.a Citizen
                $sql = "select * from user_details where user_id = '$user_type_url'";
                $result = mysqli_query($conn,$sql);
                $num = mysqli_num_rows($result);
                $row = $result->fetch_assoc();
                if ($num == 1) 
                {
        ?>
    <div class="container">
    <div class="page-wrapper p-t-45 p-b-50" >
        <div class="wrapper wrapper--w790" >
            <div class="card card-5" style="background-image: linear-gradient(#FFCCCB,  #FFEBCD);">
                <div class="card-heading" >
                    <h2 class="title">Welcome &nbsp&nbsp<?php echo $_SESSION['user name']; ?></h2>
                </div>
                <div class="card-body">
                    <form>

                        
                        <div class="form-row m-b-55">
                            <div class="name" style="font-weight: 10px"><span style="font-weight: 50px;font-size: 20px;color: black">Name</span></div>
                                <div class="value">
                                    <div class="row row-space">
                                        <div class="col-2">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" type="text" value="<?php echo $row['user_name']; ?>" readonly="true">
                                            <!--<label class="label--desc">first name</label>-->
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-row m-b-55">
                            <div class="name"> <span style="font-weight: 50px;font-size: 20px;color: black">Mobile Number</span></div>
                                <div class="value">
                                    <div class="row row-space">
                                        <div class="col-2">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" type="text" value="<?php echo $row['user_mobile_number']; ?>" readonly="true">
                                            <!--<label class="label--desc">first name</label>-->
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-row m-b-55">
                            <div class="name"><span style="font-weight: 50px;font-size: 20px;color: black">Verified</span></div>
                                <div class="value">
                                    <div class="row row-space">
                                        <div class="col-2">
                                        <div class="input-group-desc">
                                            <?php
                                            $yes_no = $row['status'];
                                            if ($yes_no == '1') {
                                                $yes_no_value = "Yes";
                                            }
                                            else
                                            {
                                                $yes_no_value = "No";
                                            }
                                            ?>
                                            <input class="input--style-5" type="text" value="<?php echo $yes_no_value; ?>" readonly="true">
                                            <!--<label class="label--desc">first name</label>-->
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        
                                    </div>
                                </div>
                            </div>
                        </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
                        <?php
                        
                            }
                            else
                            {
                                echo "no record Found.";
                            }
                        }
                        else
                        {
                            $sql = "select * from police_details where pid = '$user_type_url'";
                            $result = mysqli_query($conn,$sql);
                            $num = mysqli_num_rows($result);
                            $row = $result->fetch_assoc();
                            if ($num == 1) 
                            {
                        ?>
<div class="container">
    <div class="page-wrapper p-t-45 p-b-50" >
        <div class="wrapper wrapper--w790" >
            <div class="card card-5" style="background-image: linear-gradient(#FFCCCB, #00FFFF);">
                <div class="card-heading" >
                    <h2 class="title">Welcome &nbsp&nbsp<?php echo $_SESSION['first name']; ?></h2>
                </div>
                <div class="card-body">
                    <form>

                        
                        <div class="form-row m-b-55">
                            <div class="name" style="font-weight: 10px"><span style="font-weight: 50px;font-size: 20px;color: black">Name</span></div>
                                <div class="value">
                                    <div class="row row-space">
                                        <div class="col-2">
                                        <div class="input-group-desc">
                                            <?php $name = $row['first_name']." ".$row['middle_name']." ".$row['last_name'];
                                            ?>
                                            <input class="input--style-5" type="text" value="<?php echo strtoupper($name); ?>" readonly="true">
                                            <!--<label class="label--desc">first name</label>-->
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-row m-b-55">
                            <div class="name"> <span style="font-weight: 50px;font-size: 20px;color: black">Mobile Number</span></div>
                                <div class="value">
                                    <div class="row row-space">
                                        <div class="col-2">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" type="text" value="<?php echo $row['mobile_number']; ?>" readonly="true">
                                            <!--<label class="label--desc">first name</label>-->
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="form-row m-b-55">
                            <div class="name"> <span style="font-weight: 50px;font-size: 20px;color: black">Designation</span></div>
                                <div class="value">
                                    <div class="row row-space">
                                        <div class="col-2">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" type="text" value="<?php echo strtoupper($row['designation']); ?>" readonly="true">
                                            <!--<label class="label--desc">first name</label>-->
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-row m-b-55">
                            <div class="name"> <span style="font-weight: 50px;font-size: 20px;color: black">Police <br>Station</span></div>
                                <div class="value">
                                    <div class="row row-space">
                                        <div class="col-2">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" type="text" value="<?php echo strtoupper($row['police_station']); ?>" readonly="true">
                                            <!--<label class="label--desc">first name</label>-->
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="form-row m-b-55">
                            <div class="name"> <span style="font-weight: 50px;font-size: 20px;color: black">Police Type</span></div>
                                <div class="value">
                                    <div class="row row-space">
                                        <div class="col-2">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" type="text" value="<?php echo strtoupper($row['police_type']); ?>" readonly="true">
                                            <!--<label class="label--desc">first name</label>-->
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row m-b-55">
                            <div class="name"><span style="font-weight: 50px;font-size: 20px;color: black">Verified</span></div>
                                <div class="value">
                                    <div class="row row-space">
                                        <div class="col-2">
                                        <div class="input-group-desc">
                                            <?php
                                            $yes_no = $row['status'];
                                            if ($yes_no == '1') {
                                                $yes_no_value = "Yes";
                                            }
                                            else
                                            {
                                                $yes_no_value = "No";
                                            }
                                            ?>
                                            <input class="input--style-5" type="text" value="<?php echo $yes_no_value; ?>" readonly="true">
                                            <!--<label class="label--desc">first name</label>-->
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        
                                    </div>
                                </div>
                            </div>
                        </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
                        <?php
                                }
                                else
                                {
                                    echo "No Record Found.";
                                }
                            }
                        
                            
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
            include '../footer.html';
        ?>
</footer>
</html>
<!-- end document-->