<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title>Parking Location</title>
    <?php include '../header.php'?>

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
    
</head>

<body >
    <div class="container">
    <div class="page-wrapper p-t-45 p-b-50" style="background-color:#F1E9DB;" >
        <div class="wrapper wrapper--w790">
            <div class="card card-5">
                <div class="card-heading">
                    <h2 class="title">Seach Parking Location</h2>
                </div>
                <div class="card-body">
                    <form method="POST" action="parking/parking_data.php" >
                        <div class="form-row">
                            <div class="name" style="font-weight: strong">Location</div>
                            <div class="value">
                                <div class="input-group">
                                    <div class="rs-select2 js-select-simple ">
                                        <select name="area">
                                            <option disabled="disabled" selected="selected">Choose Location</option>
                                            <option>Shahpur</option>
                                        <option value="dariapur">Dariapur</option>
                                        <option value="jamalpur">Jamalpur</option>
                                        <option value="khadia">Khadia</option>    
                                        <option value="asarva">Asarva</option>
                                        <option value="shaibaug">Shaibaug</option>
                                        <option value="gomtipur">Gomtipur</option>
                                        <option value="odhav">Odhav</option>
                                        <option value="vastral">Vastral</option>
                                        <option value="hatkeshwar">Hatkeshwar</option>
                                        <option value="amraiwadi">Amraiwadi</option>
                                        <option value="ramolhathijan">Ramol hathijan</option>
                                        <option value="nikol">Nikol</option>
                                        <option value="viratnagar">Viratnagar</option>
                                        <option value="bapunagar">Bapunagar</option>
                                        <option value="indiacolony">IndiaColony</option>
                                        <option value="thakkarbapanagar">Thakkarbapa nagar</option>
                                        <option value="saraspur">Saraspur</option>
                                        <option value="sardarnagar">Sardarnagar</option>
                                        <option value="naroda">Naroda</option>
                                        <option value="kubernagar">Kubernagar</option>
                                        <option value="saijpurbogha">Saijpur Bogha</option>
                                        <option value="gota">Gota</option>
                                        <option value="chandlodia">Chandlodia</option>
                                        <option value="gatlodia">Gatlodia</option>
                                        <option value="thaltej">Thaltej</option>
                                        <option value="bodakdev">Bodakdev</option>
                                        <option value="behrampura">Behrampura</option>
                                        <option value="indrapuri">Indrapuri</option>
                                        <option value="kokhara">Kokhara</option>
                                        <option value="maninagar">Maninagar</option>
                                        <option value="danilimda">Danilimda</option>
                                        <option value="lambha">Lambha</option>
                                        <option value="isanpur">Isanpur</option>
                                        <option value="vatva">Vatva</option>
                                        <option value="sarkhej">Sarkhej</option>
                                        <option value="jodhpur">Jodhpur</option>
                                        <option value="vejalpur">Vejalpur</option>
                                        <option value="maktampura">Maktampura</option>
                                        <option value="ranip">Ranip</option>
                                        <option value="chandkheda">Chandkheda</option>
                                        <option value="motera">Motera</option>
                                        <option value="sabarmati">Sabarmati</option>
                                        <option value="naranpura">Naranpura</option>
                                        <option value="navavadaj">Nava Vadaj</option>
                                        <option value="spStadium">SpStadium</option>
                                        <option value="navrangpura">Navrangpura</option>
                                        <option value="paldi">Paldi</option>
                                        <option value="vasna">Vasna</option>
                                        </select>
                                        <div class="select-dropdown"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="input-group">
                            <button class="btn btn--radius-2 btn--red" type="submit">Search</button>
                        </div>
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
    <?php include '../footer.html'?>
</footer>
</html>
<!-- end document-->