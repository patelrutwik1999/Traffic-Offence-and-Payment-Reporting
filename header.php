<?php
	if(isset($_COOKIE['hash']))
	{
		if (session_status() == PHP_SESSION_NONE) {
    		session_start();
		}
		$u_hash=$_COOKIE['hash'];
		
		include 'connection/config.php';
	  	$sql3= "select pid from remember_me where hash = '$u_hash'";
	  	$result3 = mysqli_query($conn,$sql3);
	  	$row1 = $result3->fetch_assoc();
	  	$t_pid= $row1['pid']; // police id from remember me table
	  	$num = mysqli_num_rows($result3);
	  	if($num == 1){
	  		$sql4 = "select first_name from police_details where pid = '$t_pid'";
	  		
	  		$result4 = mysqli_query($conn,$sql4);
	  		$row2=$result4->fetch_assoc();
	  		$_SESSION['logged'] = true;
			$_SESSION['logged in type'] = "police";
			$_SESSION['first name']=$row2['first_name'];
	  	}
	}
	
?><!--<!doctype html>
    <head>-->
    	<link rel="stylesheet" type="text/css" href="notification_bell.css">
    	<script type="text/javascript">
    		window.addEventListener("load", myInit, true); function myInit(){ 
    			start_check();gtime();tdate();
    		};
 </script>
    	<style type="text/css">
    		#traffic_image
    		{
    			max-width: 420px;
    			height: auto;
    		}	
    	</style>
        <base href="http://localhost/TORP/">
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Ahmedabad City Police</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		
        <!-- Favicon -->
		<link rel="shortcut icon" type="image/x-icon" href="img/torp_logo.jpg">
		
		<!-- all css here -->
		<!-- bootstrap v3.3.6 css -->
        <link rel="stylesheet" href="css/bootstrap.min.css">
		<!-- animate css -->
        <link rel="stylesheet" href="css/animate.css">
		<!-- jquery-ui.min css -->
        <link rel="stylesheet" href="css/jquery-ui.min.css">
		<!-- meanmenu css -->
        <link rel="stylesheet" href="css/meanmenu.min.css">
		<!-- nivo-slider.css -->
        <link rel="stylesheet" href="css/nivo-slider.css">
		<!-- owl.carousel css -->
        <link rel="stylesheet" href="css/owl.carousel.css">
		<!-- font-awesome css -->
        <link rel="stylesheet" href="css/font-awesome.min.css">
		<!-- pe-icon-7-stroke.css -->
        <link rel="stylesheet" href="css/pe-icon-7-stroke.css">
		<!-- magnific-popup.css -->
        <link rel="stylesheet" href="css/magnific-popup.css">
		<!-- chosen.min.css -->
        <link rel="stylesheet" href="css/chosen.min.css">
		<!-- style css -->
		<link rel="stylesheet" href="style.css">
		<!-- responsive css -->
        <link rel="stylesheet" href="css/responsive.css">
		<!-- modernizr css -->
        <script src="js/vendor/modernizr-2.8.3.min.js"></script>
    
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

        <style type="text/css">
        	.dropdown {
			  position: relative;
			  display: inline-block;
			}

			.dropdown-content {
			  display: none;
			  position: absolute;
			  background-color: #f9f9f9;
			  min-width: 160px;
			  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
			  z-index: 1;
			}

			.dropdown-content a {
			  color: black;
			  padding: 12px 16px;
			  text-decoration: none;
			  display: block;
			}

			.dropdown-content a:hover {background-color: #f1f1f1}

			.dropdown:hover .dropdown-content {
			  display: block;
			}

			.dropdown:hover .dropbtn {
			  background-color: #3e8e41;
			}
		</style>
<header>
        <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <!-- Add your site or application content here -->
		<!-- header-area-start -->
	
			<!-- fixed-header-area-start -->
			<div class="fixed-header-area" id="sticky-header">
				<div class="container">
					<table width="1800px" style="height: 100px" cellspacing="-2px">
						<tr>
							<td style="padding:0px;margin:0px;">
						<div >
							
								
									<div >
								<!-- logo-start -->
									<div class="logo">
										<a href="home.php">
											<img src="img/torp_logo.jpg" id="logo_img" alt="logo" style="height: 90px;width: 90px" />
										</a>
									</div>
							<!-- logo-end -->
								</div>
							

						</div>			
							</td>	
					
						
							<td>
								<div class="col-lg-8 col-md-7">
							<!-- mean-menu-area-start -->
							<div class="mean-menu-area">
								<div class="mean-menu text-center">
									<nav>
										<ul>
											<li><a href="home.php">Home</a>
												
											</li>
											<li><a href="#">Towing Memo<i class="fa fa-angle-down"></i></a>
												<ul class="sub-menu text-left">
												<li><a href="main/towing_memo/generate_memo.php">Generate Towing Memo</a></li>
												<li><a href="main/towing_memo/search/search_memo.php">Search Your Memo</a></li>
												<li><a href="main/towing_memo/view_memo/enter_number.php">View Your Memo</a></li>
												<?php
													if (isset($_SESSION['user id']))
													{
												?>
														<li><a href="main/towing_memo/payment/show_memo.php">Pay Memo</a></li>
												<?php		
													}
													else{				
												?>
												<li><a href="main/towing_memo/payment/show_memo_police.php">Pay Memo</a></li>
												<?php
												} 
												?>
												<li><a href="main/towing_memo/records/view_records.php">Records</a></li>
											</ul>
											</li>
											<li><a href="https://payahmedabadechallan.org/">E-Challan<i class="fa fa-angle-down"></i></a>
												<ul class="sub-menu text-left">
													<li><a href="https://payahmedabadechallan.org/">Pay E-Challan</a></li>
                                                	
												</ul>
											</li>

										<li ><a>Manage Vechile<i class="fa fa-angle-down"></i></a>
											<ul class="sub-menu text-left">
												<li><a href="main/vehicle/vehicle.php">My Vehicle</a></li>
												<li><a href="main/vehicle/add_vehicle.php">Add Vehicle</a></li>
                                            	<li><a href="main/vehicle/remove_vehicle.php">Remove Vehicle</a></li>
                                            </ul>
										</li>

										<li ><a>Parking Location<i class="fa fa-angle-down"></i></a>
											<ul class="sub-menu text-left">
												<li><a href="parking/parking.php">Search Parking Area</a></li>
                                            	<li><a href="parking/add_parking_location.php">Add Location</a></li>
                                            </ul>
										</li>


											<li><a href="">Report<i class="fa fa-angle-down"></i></a>
												<ul class="sub-menu text-left">
													<li>
														<a href="services/unauthorized_vehicle.php">Unauthorized Vehicle</a>
													</li>
                                            		<li>
                                            			<a href="services/grievance_portal.php">Grievance Portal</a>
                                            		</li>
                                            	</ul>
											</li>	
										</ul>
									</nav>
								</div>
							</div>
							<!-- mean-menu-area-end -->
							</div>	
							</td>
						</tr>
						
							
						</table>
					</div>
				</div>

				
			</div>
			<!-- fixed-header-area-end -->
			<!-- header-top-area-start -->
			<div class="header-top-area ptb-15">
				<div class="container">
					<div class="row" style="padding-top: 7px">
						<!-- header-top-left-start -->
						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
							<div class="header-account">
								<ul>

				<?php 
					/*$_SESSION['logged'] == true*/		
					if(isset($_SESSION['logged']))
					{
						$logged_type  = $_SESSION['logged in type'];
						$var1  = "user";
						$var2 = "police";
						if($logged_type == $var1)
						{	
							$name = strtolower($_SESSION['user name']);
				?>

					<span style="font-family: verdana; font-size: 18px;">
						<li>
							<div class="dropdown">
								<button style="cursor: pointer" class="w3-button w3-indigo w3-border w3-round-xxlarge"><?php echo ucfirst($name); ?>&nbsp<i class="fa fa-caret-down"></i></button>
								<div class="dropdown-content">
									<a href="dashboard/account.php?id=<?php echo $_SESSION['user id']; ?>&loty=1">Profile</a>
									<a href="login_logout/logout.php">Logout</a>
								</div>
							</div>
						</span>
							
						<?php 
							$_SESSION['pages'] = $var1;					
							}
							elseif ($logged_type == $var2) 
							{	
								$name = strtolower($_SESSION['first name']); 
							
						?>

					
					<span style="font-family: verdana; font-size: 18px;">
						<li>
							<div class="dropdown">
								<button style="cursor: pointer" class="w3-button w3-indigo w3-border w3-round-xxlarge"><?php echo ucfirst($name); ?>&nbsp<i class="fa fa-caret-down"></i></button>
								<div class="dropdown-content">
									<a href="dashboard/account.php?id=<?php echo $_SESSION['police id']; ?>&loty=2">Profile</a>
									<a href="login_logout/logout.php">Logout</a>
								</div>
							</div>
						</span>

						<?php 
							$_SESSION['pages'] = $var2;

							}
						}
							else
							{
								
						?>	
						<span style="font-family: courier; font-size: 21px;">				
							<li><a href="login_logout/login.php"><span>
							<button class="w3-button w3-red w3-border w3-round-xxlarge">Log in / Sign Up</button></span></a></li>
						</span>
					<?php 
						}
					
					?>
								</ul>
							</div>
						</div>
						<!-- header-top-left-end -->
							<!-- header-top-right-start -->
							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
								<!-- social-icon-start -->
								
								<div class="social-icon" style="padding-left: 150px">
									<ul>
										<li>
											<?php
													if(!empty($_SESSION['logged']) && $_SESSION["logged"] == true && !empty($_SESSION['logged in type']) && $_SESSION['logged in type']=="user"){
											?>
												<div class="dropdown">
		    										<a href="show_notification.php" role="button" style="float: right" aria-expanded="true">
									        			<i class="fa fa-bell-o" style="font-size: 24px; float: left; color:blue">
									        			</i>
		    										</a>
		    										<span id ="notification_bell" class="badge badge-danger"></span>
		    									</div>
		    							<?php } ?>
										</li>
									</ul>
								</div>
								<!-- social-icon-end -->
								
							</div>
							<!-- header-top-right-end -->
					</div>
				</div>
			</div>
			<!-- header-top-area-end -->
			<!-- header-mid-area-start -->
			<div class="header-mid-area ptb-50" style="padding: 9px">
				<div class="container">
					<div class="row">
						
						<!-- logo-start -->
						<div class="col-lg-12">
							<div class="logo text-center">
								<a href="home.php"><img id="traffic_image" src="img/torp1.jpg" alt="logo" align="left" /></a>
							
							</div>
						</div>
						<!-- logo-end -->
						
					</div>
				</div>
			</div>
			<!-- header-mid-area-end -->
			<!-- mean-menu-area-start -->
			<div class="mean-menu-area hidden-sm hidden-xs">
				<div class="container">
					<div class="row">
						<div class="col-lg-12">
							<div class="mean-menu text-center">
								<nav>
									<ul>
										<li><a href="home.php">Home</a>
											
										</li>
										<li><a>Towing Memo <i class="fa fa-angle-down"></i></a>
											<ul class="sub-menu text-left">
												<li><a href="main/towing_memo/generate_memo.php">Generate Towing Memo</a></li>
												<li><a href="main/towing_memo/search/search_memo.php">Search Your Memo</a></li>
												<li><a href="main/towing_memo/view_memo/enter_number.php">View Your Memo</a></li>
												<?php
													if (isset($_SESSION['user id']))
													{
												?>
														<li><a href="main/towing_memo/payment/show_memo.php">Pay Memo</a></li>
												<?php		
													}
													else{				
												?>
												<li><a href="main/towing_memo/payment/show_memo_police.php">Pay Memo</a></li>
												<?php
												} 
												?>
												<li><a href="main/towing_memo/records/view_records.php">Records</a></li>
											</ul>
										</li>
										
										<li><a>E-Challan<i class="fa fa-angle-down"></i></a>
											<ul class="sub-menu text-left">
												
												<li><a href="https://payahmedabadechallan.org/">Pay E-Challan</a></li>
                                               
                                                
											</ul>
										</li>

										<li ><a>Manage Vechile<i class="fa fa-angle-down"></i></a>
											<ul class="sub-menu text-left">
												<li><a href="main/vehicle/vehicle.php">My Vehicle</a></li>
												<li><a href="main/vehicle/add_vehicle.php">Add Vehicle</a></li>
                                            	<li><a href="main/vehicle/remove_vehicle.php">Remove Vehicle</a></li>
                                            </ul>
										</li>


										<li ><a>Parking Location<i class="fa fa-angle-down"></i></a>
											<ul class="sub-menu text-left">
											<li><a href="parking/parking.php">Search Parking Area</a></li>
                                            <li><a href="parking/add_parking_location.php">Add Location</a></li>
                                            </ul>
										</li>
										
												<li><a href="">Report<i class="fa fa-angle-down"></i></a>
												<ul class="sub-menu text-left">
													<li>
														<a href="services/unauthorized_vehicle.php">Unauthorized Vehicle</a>
													</li>
                                            		<li>
                                            			
                                        <?php
                                        	if (isset($_SESSION['logged'])) 
                                        	{
                                        		if ($_SESSION['logged in type'] == 'user') 
                                        		{
                                        ?>
                                        			<a href="services/report/monthly_report.php?id=<?php echo $_SESSION['user id'];?>&loty=1">Monthly Report</a>
                                            		</li>
                                        <?php	
                                        		}
                                        		else
                                        		{
                                        ?>
                                        			<a href="services/report/monthly_report.php?id=<?php echo $_SESSION['police id']; ?>&loty=2">Monthly Report</a>
                                            		</li>
                                        <?php	
                                        		}
                                        	}
                                        ?>
                                            			
                                            	</ul>
											</li>
									</ul>
								</nav>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- mean-menu-area-end -->
			<!-- mobile-menu-area-start -->
			<div class="mobile-menu-area hidden-md hidden-lg">
				<div class="container">
					<div class="row">
						<div class="col-lg-12">
							<div class="mobile-menu">
								<nav id="mobile-menu-active">
									<ul id="nav">
										<li><a href="home.php">Home</a>
											
										</li>
										<li><a>Towing Memo</a>
											<ul>
												<li><a href="main/towing_memo/generate_memo.php">Generate Towing Memo</a></li>
												<li><a href="main/towing_memo/search/search_memo.php">Search Your Memo</a></li>
												<li><a href="main/towing_memo/view_memo/enter_number.php">View Your Memo</a></li>
												<<?php
													if (isset($_SESSION['user id']))
													{
												?>
														<li><a href="main/towing_memo/payment/show_memo.php">Pay Memo</a></li>
												<?php		
													}
													else{				
												?>
												<li><a href="main/towing_memo/payment/show_memo_police.php">Pay Memo</a></li>
												<?php
												} 
												?>
												<li><a href="main/towing_memo/records/view_records.php">Pay Memo</a></li>
											</ul>
										</li>
										<li><a>E-Challan</a>
											<ul>
												<li><a href="https://payahmedabadechallan.org/">Pay E-Challan</a></li>
                                                
											</ul>
										</li>


										<li><a>Manage Vehicle</a>
												<ul>
												<li><a href="main/vehicle/vehicle.php">My Vehicle</a></li>
												<li><a href="main/vehicle/add_vehicle.php">Add Vehicle</a></li>
                                            	<li><a href="main/vehicle/remove_vehicle.php">Remove Vehicle</a></li>
                                            </ul>
											</li>


										<li><a>Parking Location</a>
											<ul>
												<li><a href="parking/parking.php">Search Parking Area</a></li>
                                            <li><a href="parking/add_parking_location.php">Add Location</a></li>
											</ul>
										</li>
										

												<li><a href="">Report<i class="fa fa-angle-down"></i></a>
												<ul class="sub-menu text-left">
													<li>
														<a href="services/unauthorized_vehicle.php">Unauthorized Vehicle</a>
													</li>
                                            		<li>
                                            			<a href="services/grievance_portal.php">Grievance Portal</a>
                                            		</li>
                                            	</ul>
											</li>
									</ul>
								</nav>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- mobile-menu-area-end -->

		<!-- header-area-end -->
		<script type="text/javascript">
			function start_check(){}
			{
				var df = setInterval(function (){
				var xmlhttp1 = new XMLHttpRequest();
				xmlhttp1.onreadystatechange = function() {
	  			if (this.readyState == 4 && this.status == 200) {
	  				document.getElementById("notification_bell").innerHTML = this.responseText;
	  			}
	  		};
	  			xmlhttp1.open("GET","check_memo.php", true);
				xmlhttp1.send();
				},15000);
			}
			function detectmob() { 
				 if( navigator.userAgent.match(/Android/i)
				 || navigator.userAgent.match(/webOS/i)
				 || navigator.userAgent.match(/iPhone/i)
				 || navigator.userAgent.match(/iPad/i)
				 || navigator.userAgent.match(/iPod/i)
				 || navigator.userAgent.match(/BlackBerry/i)
				 || navigator.userAgent.match(/Windows Phone/i)
				 ){
				    return true;
				  }
				 else {
				    return false;
				  }
			}
			if(detectmob()){
				document.getElementById("traffic_image").src="img/torp2.jpg";
			}
			else{
				document.getElementById("traffic_image").src="img/torp1.jpg";
			}
		</script>
		</header>

