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
    <title>Feedback Form</title>

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
        function validateForm(form) {
            var name = document.getElementById('name').value;
            var email = document.getElementById('email').value;
            regex = /^[A-Za-z ]+$/;
            if (!(regex.test(name))) 
            {
                alert("No Special Character or Numbers allowed in Name field.");
                return false;
            }
            pattern = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            if(!(pattern.test(email))){
                alert("Enter a Valid Email Address.");
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
                    <h2 class="title">Feedback Form</h2>
                </div>
                <div class="card-body">
                    <form method="POST" action="services/admin/feedback_processing.php">


                        <div class="form-row m-b-55">
                            <div class="name" >Name</div>
                            <div class="value">


                                <div class="row row-space">
                                    <div class="col-2">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" type="text" name="name" placeholder="Enter Your Name" id="name" required="true">
                                            <!--<label class="label--desc">first name</label>-->
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
                            <div class="name" >Email</div>
                            <div class="value">
                                <div class="row row-space">
                                    <div class="col-2">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" type="email" name="email" placeholder="Enter Your Email" id="email" required="true">
                                            <!--<label class="label--desc">first name</label>-->
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        
                                    </div>
                                </div>
                            </div>
                        </div>


                             <div class="form-row m-b-55">
                            <div class="name" >Suggestion Title</div>
                            <div class="value">


                                <div class="row row-space">
                                    <div class="col-2">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" type="text" name="suggestion_title" placeholder="Enter Your Suggestion Title" required="true">
                                            <!--<label class="label--desc">first name</label>-->
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        
                                    </div>
                                </div>
                            </div>
                        </div>

                        

                         <div class="form-row m-b-55">
                            <div class="name" >Description</div>
                            <div class="value">


                                <div class="row row-space">
                                    <div class="col-2">
                                        <div class="input-group-desc">
                                          <!--  <input class="input--style-5" type="text" name="your_suggestion_title" placeholder="Enter Your Suggestion Title" >-->
                                            <!--<label class="label--desc">first name</label>-->
                                            <textarea class="input--style-5" id="massage" cols="35" rows="3" placeholder="Enter Suggestion" required="true" name="suggestion"></textarea>
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
                        
                            <button class="btn btn--radius-2 btn--red" type="submit">Send Suggestion</button>
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
            include '../../footer.html';
        ?>
</footer>
</html>
<!-- end document-->