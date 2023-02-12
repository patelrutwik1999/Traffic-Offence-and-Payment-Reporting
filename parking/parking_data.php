<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <style type="text/css">

        #tb td {
        border: 3px solid black;
        text-align: center;
        font-weight: bolder;
       
        }
        #tb th{
        border: 3px solid black;
        text-align: center;
        font-weight: bolder;
        
        }
        #tb table{
            border-collapse: collapse;
            overflow-x:auto;
            overflow-y:auto;
        border: 3px solid black;
        text-align: center;
        font-weight: bolder;
        
        }
    </style>
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

<body style="font-size: 5px">
    <br><br>
    <div class="container">
    <div class="page-wrapper p-t-45 p-b-50" style="background-color:#F1E9DB;" >
        <div class="wrapper wrapper--w960">
            <div class="card card-5">
                <div class="card-heading">
                    <div class="title"><?php echo $_POST['area']?></div>
                </div>
                <div class="card-body">
                    <table width="100%" id="tb">
                        <tr>
                            <td >Sr No.</td>
                            <td style="width: 40%">Address</td>
                            <td>Phone No.</td>
                            <td>Map</td>
                        </tr>
                        <!-- fetching data from db to check rows-->
                        <?php
                        include '../connection/config.php';
                            $area=$_POST['area'];
                            $pdsql = "select * from parking_details where area='$area'";
                            $result =mysqli_query($conn,$pdsql);

                            $num = mysqli_num_rows($result);
                            if($num != 0){
                                $i=0;
                                while($rec = mysqli_fetch_assoc($result)){
                                    $i++;
                                    $address=$rec['address'];
                                    $lat=$rec['lat'];
                                    $lng=$rec['lng'];
                                    $m_number=$rec['m_number'];
                                    echo '<tr>';
                                    echo "<td>$i</td>";
                                    echo "<td>$address</td>";
                                    echo "<td>$m_number</td>";
                                    echo "<td><a href='https://www.google.com/maps/search/?api=1&query=".$lat.",".$lng."' target='_blank'>View</td>";
                                }
                                mysqli_close($conn);
                            }
                            else{
                                echo '<tr>';
                                echo "<td"."colspan='4'>no record found</td>"   ;
                                echo '</tr>';
                                mysqli_close($conn);
                            }

                        ?>
                <!-- fetching data from db to check rows ends here...-->
                    </table>
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