<?php
    session_start();
    if(!isset($_SESSION['logged']))
        {
            header("location:../index.php");
            exit();
        }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include'../header.php';?>
</head>

<body class="animsition">
    <div class="page-wrapper">

        
        <!-- PAGE CONTAINER-->
        <div class="page-container">
            
            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-header">
                                        <strong>Change Password</strong>
                                    </div>
                                    <div class="card-body card-block">
                                        <form action="change_password_processing.php" method="post" enctype="multipart/form-data" class="form-horizontal">      
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Current Password</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="password" id="text-input" name="c_pass" class="form-control">
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">New Password</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="password" id="text-input" name="n_pass" class="form-control">
                                                </div>
                                            </div>
                                        <button type="submit" class="btn btn-primary btn-sm">
                                            <i class="fa fa-dot-circle-o"></i> Submit
                                        </button>
                                        <button type="reset" class="btn btn-danger btn-sm">
                                            <i class="fa fa-ban"></i> Reset
                                        </button></form>
                                    </div></div>
                            </div>
                        </div> 
                        <?php include '../footer.php'; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</body>

</html>
<!-- end document-->
