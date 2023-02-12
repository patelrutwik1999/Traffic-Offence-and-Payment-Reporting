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
                if ($_SESSION['logged in type'] == "user") {
                    header("location:../../home.php");
                }
            }
            include '../../header.php';
            if (isset($_SESSION['is error']) ) {
            $error = $_SESSION['error desc'];
            
            echo '<script>alert("Message : '.$error.'");</script>';

            $_SESSION['is error'] =null;
            $_SESSION['error desc']=null;
        } 
            
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
    <br>
    <br>
    <div class="container" id="load">
      <div class="page-wrapper p-t-45 p-b-50" style="background-color: #598fe3">
        <div class="wrapper wrapper--w790">
          <div class="card card-5">
            <div class="card-heading">
              <h2 class="title">Generate Memo</h2>
            </div>
            <div class="card-body">
              <form method="POST" action="main/towing_memo/generate_memo_processing.php" enctype="multipart/form-data" onsubmit="return validateNumber(this)">
                <div class="form-row" id="content">  
                  <div class="name">Vehicle No.</div>
                    <div class="value">
                      
                        <div class="input-group">
                          
                              <input class="input--style-5" type="text" name="vehicle_number" required="true" id="v_number" placeholder="gj00xxabcd">
                          
                        </div>
                          </span>
                      </div>
                        <span style="color: red; font-size: 18px;">
                            * Please enter vehicle number without space
                        </span>
                  </div>
                  
                      
                  <div class="form-row">
                    <div class="name">
                      Vehicle Photo
                    </div>
                    <div class="value">
                      <div class="input-group">
                          <input class="input--style-5" type="file" name="v-pic" accept="image/*" required="true">
                      </div>
                    </div>
                  </div>
                        
                  <div class="form-row">
                    <div class="name">
                      Vehicle Type
                    </div>
                    <div class="value">
                      <div class="input-group">
                        <div class="rs-select2 js-select-simple">
                          <div class="select-dropdown">
                          <select name="vehicle_type" required="true">
                            <option disabled="disabled" selected="selected">Choose option</option>
                            <option>2-wheeler</option>
                            <option>3-wheeler</option>
                            <option>4-wheeler</option>
                          </select>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                        
                  <div class="form-row m-b-55">
                    <div class="name">
                      Time & date
                    </div>
                    <div class="value">
                      <div class="row row-space">
                        <div class="col-4">
                          <div class="input-group-desc">
                            <input id="time" class="input--style-5" type="text" name="time" readonly="true" value="time">        
                          </div>
                        </div>
                        <div class="col-4">
                          <div class="input-group-desc">
                              <input  id="date" class="input--style-5" type="text" name="date" readonly="true" value="date">
                          </div>
                        </div>
                        <div class="col-4">
                          <div class="input-group-desc">
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  
                  <button class="btn btn--radius-2 btn--red" type="submit">Generate Memo</button>
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