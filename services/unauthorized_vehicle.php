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
    <style type="text/css">
        select{
            height: 30px;
        }
    </style>
    <!-- Title Page-->
    <title>Unauthorized Vechile</title>

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
            var vnumber = document.getElementById('v_number').value;
            var mnumber = document.getElementById('m_number').value;
            pattern = /^[A-Za-z]{2}[0-9]{1,2}([A-Za-z])?([A-Za-z]){1,2}[0-9]{1,4}$/;
            /*
                ^ means start of the string
                [A-Z]{2} means 2 characters in the range of A through Z
                [0-9]{2} means 2 characters in the range of 0 through 9
                [A-Z]{2} means 2 characters in the range of A through Z
                [0-9]{4} means 4 characters in the range of 0 through 9
                $ means end of string
            */
            if (!(pattern.test(vnumber))) 
            {
                alert("Enter Vehicle Number in specified format : gj00xxabcd ");
                return false;
            } 
            pattern1 = /^([1-9]{1}[0-9]{9})$/;
            if(!(pattern1.test(mnumber))){
                alert("Enter a Valid Mobile Number.");
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
                    <h2 class="title">Unauthorized Vehicle Form</h2>
                </div>
                <div class="card-body">
                    <form method="POST" action="services/unauthorized_vehicle_data.php" enctype="multipart/form-data"
                    onsubmit="return validateNumber(this)">


                        <div class="form-row m-b-55">
                            <div class="name" >Location</div>
                            <div class="value">


                                <div class="row row-space">
                                    <div class="col-2">
                                        <div class="input-group-desc">
                                                 
                                    
                                             <select name="area" class="input--style-5" cols="15" rows="2" required="true">
                                        <option disabled="disabled" selected=" selected" >Select Area</option>
                                        <option>Shahpur</option>
                                        <option>Dariapur</option>
                                        <option>Jamalpur</option>
                                        <option>Khadia</option>    
                                        <option>Asarva</option>
                                        <option>Shaibaug</option>
                                        <option>Gomtipur</option>
                                        <option>Odhav</option>
                                        <option>Vastral</option>
                                        <option>hatkeshwar</option>
                                        <option>Amraiwadi</option>
                                        <option>Ramol hathijan</option>
                                        <option>Nikol</option>
                                        <option>Viratnagar</option>
                                        <option>Bapunagar</option>
                                        <option>India Colony</option>
                                        <option>Thakkarbapa nagar</option>
                                        <option>Saraspur</option>
                                        <option>Sardarnagar</option>
                                        <option>Naroda</option>
                                        <option>Kubernagar</option>
                                        <option>Saijpur Bogha</option>
                                        <option>Gota</option>
                                        <option>Chandlodia</option>
                                        <option>Gatlodia</option>
                                        <option>Thaltej</option>
                                        <option>Bodakdev</option>
                                        <option>Behrampura</option>
                                        <option>Indrapuri</option>
                                        <option>Kokhara</option>
                                        <option>Maninagar</option>
                                        <option>Danilimda</option>
                                        <option>lambha</option>
                                        <option>Isanpur</option>
                                        <option>Vatva</option>
                                        <option>Sarkhej</option>
                                        <option>Jodhpur</option>
                                        <option>Vejalpur</option>
                                        <option>Maktampura</option>
                                        <option>Ranip</option>
                                        <option>Chandkheda</option>
                                        <option>Motera</option>
                                        <option>Sabarmati</option>
                                        <option>Naranpura</option>
                                        <option>Nava Vadaj</option>
                                        <option>Sp Stadium</option>
                                        <option>Navrangpura</option>
                                        <option>Paldi</option>
                                        <option>Vasna</option>
                                    </select>
                                            <!--<input type="text" id="vat" placeholder="Ahmedabad" class="form-control">-->
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

                        <div class="form-row m-b-55">
                            <div class="name" >Vehicle Type</div>
                            <div class="value">
                                <div class="row row-space">
                                    <div class="col-2">
                                        <div class="input-group-desc">
                                           <select name="v-type" class="input--style-5" cols="15" rows="2" required="true">
                                             <option disabled="disabled" selected=" selected">Select Vehicle</option>
                                             <option>2 Wheeler</option>  
                                             <option>3 Wheeler</option>
                                             <option>4 Wheeler</option>
                                             <option>H.M.V</option>


                                           </select>
                                            <!--<label class="label--desc">first name</label>-->
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        
                                    </div>
                                </div>
                            </div>
                        </div>


                            <div class="form-row m-b-55">
                            <div class="name" >Vehicle Number</div>
                            <div class="value">
                                <div class="row row-space">
                                    <div class="col-2">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" type="text" name="vehicle_number" id="v_number" placeholder="Enter Vehicle Number" required="true">
                                            <!--<label class="label--desc">first name</label>-->
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        
                                    </div>
                                </div>
                            </div>
                        </div>

                        

                         <div class="form-row m-b-55">
                            <div class="name" >Photo</div>
                            <div class="value">
                                <div class="row row-space">
                                    <div class="col-2">
                                        <div class="input-group-desc">
                                           <!-- <input class="input--style-5" type="text" 
                                            name="vehicle_number" placeholder="Enter Vehicle Number">-->
                                            <!--<label class="label--desc">first name</label>-->
                                            <input type="file" name="photo" class="input--style-5" style="width: 260px;" accept="image/*" required="true">
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        
                                    </div>
                                </div>
                            </div>
                        </div>


                       

                         <div class="form-row m-b-55">
                            <div class="name" >Adress</div>
                            <div class="value">


                                <div class="row row-space">
                                    <div class="col-2">
                                        <div class="input-group-desc">
                                          <!--  <input class="input--style-5" type="text" name="your_suggestion_title" placeholder="Enter Your Suggestion Title" >-->
                                            <!--<label class="label--desc">first name</label>-->
                                            <textarea class="input--style-5" name="address" id="massage" cols="35" rows="2" placeholder="Enter Adress" required="true"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        
                                    </div>
                                </div>
                            </div>
                        </div>


                         <div class="form-row m-b-55">
                            <div class="name" >Phone Number</div>
                            <div class="value">
                                <div class="row row-space">
                                    <div class="col-2">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" type="text" name="phone_number" id="m_number"placeholder="Enter Phone Number" required="true">
                                            <!--<label class="label--desc">first name</label>-->
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        
                                    </div>
                                </div>
                            </div>
                        </div>

                      <div class="form-row m-b-55">
                            <div class="name">Time & date</div>
                            <div class="value">
                                <div class="row row-space">
                                    <div class="col-2">
                                        <div class="input-group-desc">
                                            <input id="time" class="input--style-5" type="text" name="time" readonly="true" value="time">
                                            <!--<label class="label--desc">first name</label>-->
                                        </div>
                                    </div>
                                    <div class="col-2">
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

                            <button class="btn btn--radius-2 btn--red" type="submit">SUBMIT </button>
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