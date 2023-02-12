<?php
    session_start();
    if(!isset($_SESSION['logged']))
        {
            header("location:index.php");
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
                                        <strong>Account Details</strong>
                                    </div>
                                    <div class="card-body card-block">
                                        <form action=".php" method="post" enctype="multipart/form-data" class="form-horizontal">      
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Username</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="text-input" value="<?php echo $_SESSION["user name"];?>" readonly="true" class="form-control' size="10">
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Email</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="text-input" value="<?php echo $_SESSION["user email"];?>" readonly="true" class="form-control" size="10">
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">User Role</label>
                                                </div>
                                                <?php $r_arr = array("tm"=>"Towing Manager","pm"=>"Parking Manager","pim"=>"Police Information Manager","tum"=>"Traffic Updates Manager","admin"=>"Administrator");?>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="text-input" value= "<?php echo $r_arr[$_SESSION['role']];?>"" class="form-control" size="10" readonly="true">
                                                </div>
                                            </div>
                                        <a href="accounts/change_password.php"><button class="btn btn-primary btn-sm">
                                            <i class="fa fa-dot-circle-o"></i>Change Password
                                        </button></a>
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
