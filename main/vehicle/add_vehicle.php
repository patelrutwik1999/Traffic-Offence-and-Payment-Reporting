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
            else{
                if ($_SESSION['logged in type'] == "police") {
                    header("location:../../home.php");
                }
            }
            
            include '../../header.php';
    ?>
    <!-- Title Page-->
    <title>Add Vehicle</title>

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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>  
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body onload="timeout();">
    <div class="container">
    <div class="page-wrapper p-t-45 p-b-50" style="background-color:#d2d4c8">
        <div class="wrapper wrapper--w790">
            <div class="card card-5">
                <div class="card-heading">
                    <h2 class="title">Add Vehicle &nbsp</h2>
                </div>
                <div class="card-body">
                    <form method="POST" action="main/vehicle/add.php" enctype="multipart/form-data" onsubmit="return validateNumber(this)">
                        <?php 
                            if (isset($_SESSION['is error'])) {
                        ?>
                        <div class="alert alert-success" id="alert" style="margin-right: 150 px">
                            <strong>Failure!</strong> Vehicle already exist..
                        </div>
                        <?php
                        unset($_SESSION['is error']);
                            }
                            elseif (isset($_SESSION['error desc insert']))
                            {
                                unset($_SESSION['error desc insert']);
                        ?>
                                <div class="alert alert-success" id="alert" style="margin-right: 150 px">
                                    <strong>Success!</strong>Vehicle added. 
                                </div>   
                        <?php
                            }
                            elseif (isset($_SESSION['not updated'])) 
                            {
                        ?>
                                <div class="alert alert-success" id="alert" style="margin-right: 150 px">
                                    <strong>Failure!</strong> Error in adding vehicle...
                                </div>    
                        <?php
                        unset($_SESSION['not updated']);
                            }
                        ?>
                        <div class="form-row m-b-55">
                            <div class="name">Vehicle Number</div>
                            <div class="value">
                                <div class="row row-space">
                                    <div class="col-2">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" type="text" name="vehicle_number" id="v_number" placeholder="gj00xxabcd" required="true">
                                            <!--<label class="label--desc">first name</label>-->
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <div class="input-group-desc">
                                            <button class="btn btn--radius-2 btn--red" style="height: 50px;" type="submit">Add</button>

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
    <script type="text/javascript" >
        function timeout(){
            var r=setTimeout(function(){

                 document.getElementById("alert").style.display="none";
            },2000);
                
        }  

    </script>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
<footer>
    <?php
            include '../../footer.html';
        ?>
</footer>
</html>
<!-- end document-->