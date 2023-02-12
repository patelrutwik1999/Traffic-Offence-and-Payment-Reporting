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
            else{
                if ($_SESSION['logged in type'] == "police") {
                    header("location:../home.php");
                }
            }
                include '../header.php';

       
            
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

    <script type="text/javascript">
        function validateNumber(form) {
            var number = document.getElementById('m_number').value;
            pattern = /^([1-9]{1}[0-9]{9})$/;
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
                alert("Enter Valid Mobile Number.");
                return false;
            }          
        }
    </script>
</head>

<body onload="gtime()">
    <br>
    <br>
    
    <div class="container">
    <div class="page-wrapper p-t-45 p-b-50" style="background-color: #598fe3">
        <div class="wrapper wrapper--w790">
            <div class="card card-5">
                <div class="card-heading">
                    <h2 class="title">Add Parking Location</h2>
                </div>
                <div class="card-body">
                    <form method="POST" action="parking/add_parking_location_entrydb.php" enctype="multipart/form-data" onsubmit="return validateNumber(this)">
                        <div class="form-row">
                            <div class="name">Location</div>
                            <div class="value">
                                <div class="input-group">
                                    <div class="rs-select2 js-select-simple">
                                        <select name="area" id="select" class="form-control" required="true">
                                                            <option value="shahpur" >Shahpur</option>
                                                            <option value="dariapur" >Dariapur</option>
                                                            <option value="jamalpur">Jamalpur</option>
                                                            <option value="khadia">Khadia</option>    
                                                            <option value="asarva">Asarva</option>
                                                            <option value="shaibaug">Shaibaug</option>
                                                            <option value="gomtipur">Gomtipur</option>
                                                            <option value="odhav">Odhav</option>
                                                            <option value="Vastral">Vastral</option>
                                                            <option value="hatkeshwar">hatkeshwar</option>
                                                            <option value="amraiwadi">Amraiwadi</option>
                                                            <option value="ramol">Ramol hathijan</option>
                                                            <option value="nikol">Nikol</option>
                                                            <option value="viratnagar">Viratnagar</option>
                                                            <option value="bapunagar">Bapunagar</option>
                                                            <option value="india_colony">India Colony</option>
                                                            <option value="thakkarbapa_nagar">Thakkarbapa nagar</option>
                                                            <option value="saraspur">Saraspur</option>
                                                            <option value="sardarnagar">Sardarnagar</option>
                                                            <option value="naroda">Naroda</option>
                                                            <option value="kubernagar">Kubernagar</option>
                                                            <option value="saijpur">Saijpur Bogha</option>
                                                            <option value="gota">Gota</option>
                                                            <option value="chandlodia">Chandlodia</option>
                                                            <option value="gatloddia">Gatlodia</option>
                                                            <option value="thaltej">Thaltej</option>
                                                            <option value="bodakdev">Bodakdev</option>
                                                            <option value="behrampura">Behrampura</option>
                                                            <option value="inndrapuri">Indrapuri</option>
                                                        ^([1-9]{1}[0-9]{9})$    <option value="kokhra">Kokhara</option>
                                                            <option value="maninagar">Maninagar</option>
                                                            <option value="danilimda">Danilimda</option>
                                                            <option value="lambha">lambha</option>
                                                            <option value="isanpur">Isanpur</option>
                                                            <option value="vatva">Vatva</option>
                                                            <option value="sarkhej">Sarkhej</option>
                                                            <option value="jodhpur">Jodhpur</option>
                                                            <option value="vejalpur">Vejalpur</option>
                                                            <option value="maktampura">Maktampura</option>
                                                            <option value="ranip">Ranip</option>
                                                            <option value="chandkedha">Chandkheda</option>
                                                            <option value="motera">Motera</option>
                                                            <option value="sabarmati">Sabarmati</option>
                                                            <option value="naranpura">Naranpura</option>
                                                            <option value="nava_vadaj">Nava Vadaj</option>
                                                            <option value="sp_stadium">Sp Stadium</option>
                                                            <option value="navrangpura">Navrangpura</option>
                                                            <option value="paldi">Paldi</option>
                                                            <option value="Vasna">Vasna</option>
                                                    </select>
                                        <div class="select-dropdown"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row m-b-55">
                            <div class="name">Address</div>
                            <div class="value">
                                <div class=" row-space">
                                    <div class="col-2">
                                        <div class="input-group-desc">
                                            <textarea name="address"  rows="2" cols="20" placeholder="Enter Address..." class="input--style-5" required="true"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row m-b-55">
                            <div class="name">Mobile Number</div>
                            <div class="value">
                                <div class="row row-space">
                                    <div class="col-2">
                                        <div class="input-group-desc">
                                            <input type="text" id="m_number" name="mobile_number" placeholder="Enter Contact Detail" class="input--style-5">
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <!--<div class="input-group-desc">
                                            <input class="input--style-5" type="text" name="last_name">
                                            <label class="label--desc">last name</label>
                                        </div>-->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Location Photo</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="file" name="location_photo" accept="image/*">
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-row m-b-55">
                            <div class="name">Time & date</div>
                            <div class="value">
                                <div class="row row-space">
                                    <div class="col-4">
                                        <div class="input-group-desc">
                                            <input id="time" class="input--style-5" type="text" name="time" readonly="true" value="time">
                                            <!--<label class="label--desc">first name</label>-->
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="input-group-desc">
                                            <input  id="date" class="input--style-5" type="text" name="date" readonly="true" value="date">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="input-group-desc">
                                            
                                            <!--<label class="label--desc">first name</label>-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                            <button class="btn btn--radius-2 btn--red" type="submit">ADD Location</button>
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
