<!DOCTYPE html>
<html>
	<head>
		<?php 
		if (session_status() == PHP_SESSION_NONE) {
    		session_start();
			}
			include 'header.php';
			if (isset($_SESSION['is error']) ) {
			$error = $_SESSION['error desc'];
			
		 	echo '<script>alert("Message : '.$error.'");</script>';

		 	$_SESSION['is error'] =null;
		 	$_SESSION['error desc']=null;
		} 
		
		?>
		<!-- traffic updates js-->
		<script type="text/javascript">
			function tdate(){

				var date= new Date();
				var info = date.getDate()+"/"+(date.getMonth()+1)+"/"+date.getFullYear();
				document.getElementById("markheading").innerHTML="Traffic Updates &nbsp&nbsp&nbsp&nbsp"+info;
				l();
			}
		</script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<!-- traffic updates js stop-->
			
		<style type="text/css">
			#markheading{
				width:100%;
				height:30px;
				background-color: #13315C;
				font-size: 20px;
				color:white;
				text-align: center;
				margin-bottom:0px;
			}
			.areas {
			  overflow: hidden;
			  position: relative;
			  box-sizing: border-box;
			}

			.marquee {
			  position: relative;
			  box-sizing: border-box;
			  animation: marquee 11s linear infinite;
			  color: white;
			}
			.marquee p,i{
				font-size: 20px;
			}

			/* Make it move! */

			@keyframes marquee {
			  0% {
			    top: 100%;
			  }
			  100% {
			    top: 0;
			    transform: translateY(-100%);
			  }
			}


			/* Make it look pretty */
			.microsoft{
				width:100%;
				height:200px;
				text-align: center;
				background-color: grey;
			}
			.microsoft .marquee {
			  font: 1em 'Segoe UI', Tahoma, Helvetica, Sans-Serif;
			}

			.microsoft:before,
			.microsoft::before,
			.microsoft:after,
			.microsoft::after {
			  z-index: 1;
			  content: '';
			  position: absolute;
			  pointer-events: none;
			  width: 100%;
			  background-image: linear-gradient(180deg, #FFF, rgba(255, 255, 255, 0));
			}

			.microsoft:after,
			.microsoft::after {
			  transform: rotate(180deg);
			}

			.microsoft:before,
			.microsoft::before {}

			.image_1
			{
				max-width: 1200px;
				height: auto;
				width: 1800px;
			}
			#features
			{
				background-color: blue;
			}
			.button {
				background-color: #4CAF50; /* Green */
				border: none;
				color: white;
				
				text-align: center;
				text-decoration: none;
				display: inline-block;
				font-size: 8px;
				/*margin: 4px 2px;*/
			    -webkit-transition-duration: 0.4s; /* Safari */
			    transition-duration: 0.4s;
				cursor: pointer;
			}

			.button1 {
  				background-color: white; 
  				color: black; 
  				border: 2px solid #008CBA;
  				border-left: 2px solid #008CBA;
  				text-align: center;
			}

			.button1:hover {
  				background-color: #008CBA;
  				color: white;
			}

		</style>



	
	</head>
	<body onload="tdate()">
		<!-- slider-traffic-images -->

		
		<div class="slider-area" style="padding: 30px"> 
			<div class="container">	
				<div class="row">
					<div class="col-lg-12" >
						<div id="slider" class="image_1">
							<img id="image_1" src="img/slider_new/image_1.jpg" alt="" title="#caption1" />
							<img src="img/slider_new/image_2.jpg" alt="" title="#caption2" />
							<img src="img/slider_new/image_3.jpg" alt="" title="#caption3" />
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- slider-images-end -->

		<!-- Traffic updates start here-->
		<div class="product-area ptb-50"  >
			<div class="container" >
				<div class="row">
					<div class="col-lg-12" >
						<p id="markheading" >Traffic updates </p>
						<div class="microsoft areas">
  								<p class="marquee">
  									<i>UPDATES</i>
  								</p>
  						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Traffic updates end here-->

		<!-- product-area-start -->
		<div class="product-area ptb-50">
			<div class="container" >
				<div class="row" >
					<div class="col-lg-12" >
						<!-- tab-menu-start -->
						<div class="tab-menu mb-30" >
							<ul>
								<li class="active"><a href="#BEST" data-toggle="tab">Be Road Smart</a></li>
								<li><a href="#FEATURED"  data-toggle="tab">Traffic Tips</a></li>
							</ul>
						</div>
						<!-- tab-menu-end -->
					</div>
				</div>
				<!-- tab-area-start -->

				<!-- Be Smart Road Start --> 
				<div class="tab-content">
					<div class="tab-pane active" id="BEST">
						<div class="row">
							<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
								<!-- single-product-start -->
								<div class="product-wrapper mb-30">
									<table style="width: 250px;">
										<tr>
											<td>
												<img src="img/features/Be_safe_1.jpg" alt="Be Safe">
											</td>
											<td>
												&nbsp&nbsp<a href="main/services/be_smart_road/be_safe.php">Be Safe</a>
											</td>	
										</tr>
										<tr>
											<td></td>
										</tr>
										<tr>
											<td>
												<img src="img/features/traffic_offence.jpg" alt="Traffic Offences">
											</td>
											<td>
												&nbsp&nbsp<a href="main/services/be_smart_road/traffic_offences.php">Traffic Offences</a>
											</td>
										</tr>
									</table>
								</div>
								<!-- single-table-end -->
							</div>
							<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
								<!-- single-table-start -->
								<div class="product-wrapper mb-30">
									<div class="product-img">
										<table style="width: 250px;">
										<tr>
											<td>
												<img src="img/features/wheel_clamp.jpg" alt="Wheel Clamping">
											</td>
											<td>
												&nbsp&nbsp<a href="main/services/be_smart_road/wheel_clamping.php">Wheel Clamping</a>
											</td>
										</tr>
										<tr>
											<td></td>
										</tr>
										<tr>
											<td>
												<img src="img/features/sentinals.jpg" alt="Traffic Sentinals">
											</td>

											<td>
												&nbsp&nbsp<a href="main/services/be_smart_road/traffic_sentinals.php">Traffic Sentinals</a>
											</td>
										</tr>
									</table>
										
									</div>
								</div>
								<!-- single-table-end -->
							</div>
							<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
								<!-- single-table-start -->
								<div class="product-wrapper mb-30">
									<table style="width: 200px;">
										<tr>
											<td>
												<img src="img/features/traffic_signal.jpg" alt="Traffic Signal">
											</td>
											<td>	
												&nbsp<a href="main/services/be_smart_road/traffic_signs.php">Traffic Signs</a>
											</td>
										</tr>
									</table>
								</div>
								<!-- single-table-end -->
							</div>
							<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
								<!-- single-table-start -->
								<div class="product-wrapper mb-30">
									<table style="width: 270px;">
										<tr>
											<td>
												<img src="img/features/doc_req.jpg" alt="Documents Required while Driving">
											</td>
											<td>
												&nbsp<a href="main/services/be_smart_road/doc_req.php">Documents Req. while &nbspDriving</a>
											</td>
										</tr>
									</table>
								</div>
								<!-- single-table-end -->
							</div>
							
						</div>
					</div>
					<!-- Be Smart Road End -->
					<!-- Traffic Tips Start -->

					<div class="tab-pane fade" id="FEATURED">
						<div class="row">
							<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
								<!-- single-table-start -->
								<div class="product-wrapper mb-30">
									<table style="width: 200px">
										<tr>
											<td>
												&nbsp>>&nbsp&nbsp&nbsp
													<a href="main/services/traffic_tips/online_payment_info.php">Online Payment</a>
												
											</td>
										</tr>
									</table>
								</div>
								<!-- single-table-end -->
							</div>
							<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
								<!-- single-table-start -->
								<div class="product-wrapper mb-30">
									<table style="width: 200px">
										<tr>
											<td>
												&nbsp>>&nbsp&nbsp&nbsp
													<a href="main/services/traffic_tips/obey_traffic_rules_info.php">Obey Traffic Rules</a>
												
											</td>
										</tr>
									</table>
								</div>
								<!-- single-table-end -->
							</div>
							<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
								<!-- single-table-start -->
								<div class="product-wrapper mb-30">
									<table style="width: 290px">
										<tr>
											<td>
												
													&nbsp>>&nbsp&nbsp&nbsp
													<a href="main/services/traffic_tips/don't_mix_drink_and_drive_info.php">Don't Mix Drink and Drive</a>
												
											</td>
										</tr>
									</table>
								</div>
								<!-- single-table-end -->
							</div>		
						</div>
					</div>

					<!-- Traffic Tips End -->


					<!-- Traffic Updates Starts --> 
					<div class="tab-pane fade" id="SALE">
						<div class="row">
							<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
								<!-- single-product-start -->
								<div class="product-wrapper mb-30">
									<table>
										<tr>
											<td>
												&nbsp>>&nbsp&nbsp&nbsp
													<a href="main/services/traffic_updates/follow_traffic_rules_info.php">Follow Traffic Rules</a>
												
											</td>
										</tr>
									</table>
								</div>
								<!-- single-product-end -->
							</div>
							<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
								<!-- single-product-start -->
								<div class="product-wrapper mb-30">
									<table>
										<tr>
											<td>
												&nbsp>>&nbsp&nbsp&nbsp
													<a href="main/services/traffic_updates/online_payment_info.php">Online Payment</a>
												
											</td>
										</tr>
									</table>
								</div>
								<!-- single-product-end -->
							</div>
							<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
								<!-- single-product-start -->
								<div class="product-wrapper mb-30">
									<table>
										<tr>
											<td>
												&nbsp>>&nbsp&nbsp&nbsp
													<a href="main/services/traffic_updates/obey_traffic_rules_info.php">Obey Traffic Rules</a>
												
											</td>
										</tr>
									</table>
								</div>
								<!-- single-product-end -->
							</div>
							<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
								<!-- single-product-start -->
								<div class="product-wrapper mb-30">
									<table>
										<tr>
											<td>
												&nbsp>>&nbsp&nbsp&nbsp
													<a href="main/services/traffic_updates/traffic_update.php">Do Not Drink and Drive</a>
												
											</td>
										</tr>
									</table> 	
								</div>
								<!-- single-product-end -->
							</div>
							
						</div>
					</div>
					<!-- Traffic Updates End -->
				</div>
				<!-- Entities-area-end -->
				
			</div>
		</div>
		<!-- features-area-end -->

		<!-- Important-Links-Area-Started-->
		<div class="product-area ptb-50">
			<div class="container" >
				<div class="row" >
					<div class="col-lg-12" >
						<!-- tab-menu-start -->
						<div class="tab-menu mb-30" >
							<ul>
								<li class="active"><a href="#BEST" data-toggle="tab">Important Links</a></li>
							</ul>
						</div>
					</div>
				</div>
				<div class="tab-content">
					<div class="tab-pane active" id="BEST">
						<div class="row">
							<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
								<!-- single-product-start -->
								<div class="product-wrapper mb-30">
									<table style="width: 150px; height: 130px;">
										<tr>
											<td>
											<a href="main/services/imp_links/.php">
											
												<button class="button button1">Offence Payment</button>
											</td>
											
										</tr>
										
									</table>
								</div>
								<!-- single-table-end -->
							</div>
							<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
								<!-- single-table-start -->
								<div class="product-wrapper mb-30">
									<div class="product-img">
										<table style="width: 150px;  height: 130px;">
										<tr>
											<td><a href="main/services/imp_links/Act_Rules.php">
												<button class="button button1">Acts and Rules</button></a>
											</td>
										</tr>
										
									</table>
										
									</div>
								</div>
								<!-- single-table-end -->
							</div>
							<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
								<!-- single-table-start -->
								<div class="product-wrapper mb-30">
									<table style="width: 150px;  height: 130px;">
										<tr>
											<td><a href="main/services/imp_links/.php">
											
												<button class="button button1" style=" text-align: center;">Helpline Numbers</button>
											</td>
											
										</tr>
									</table>
								</div>
								<!-- single-table-end -->
							</div>
							<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
								<!-- single-table-start -->
								<div class="product-wrapper mb-30">
									<table style="width: 150px;  height: 130px;">
										<tr>
											<td>
											<a href="main/services/imp_links/traffic_sentinals.php">
											
												<button class="button button1">Traffic Sentinals</button>
											</td>
											
										</tr>
									</table>
								</div>
								<!-- single-table-end -->
							</div>
							
						</div>
					</div>
				</div>
			</div>
		</div>

					<!-- Be Smart Road End -->
					<!-- Be Smart Road End -->
	<script type="text/javascript">
		function l(){
			var r = setInterval(function (){
			var xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function() {
	  			if (this.readyState == 4 && this.status == 200) {
	  				var t=this.responseText;
	    			var myObj = JSON.parse(t);
	    			if(myObj[0] == "none"){
	    			$(".marquee i").html("no new update");
	    			$('.marquee p').remove();
	    		}
	    		else{				
	    			var i;
	    			var l = myObj.length;
	    			$('.marquee p').remove();
	    			for (i=0;i<l;i++){
	    				var txt2 = "<p>"+myObj[i]+"</p>";
	    				$(".marquee i").after(txt2);
	    			}
    			}}};
			var d= new Date();
			da = d.getFullYear()+"-"+(d.getMonth()+1)+"-"+d.getDate();
			obj = { "date":da};
			dbParam = JSON.stringify(obj);
			xmlhttp.open("POST", "get_updates.php?x="+dbParam, true);
			xmlhttp.send();
			},1000);
			}
		</script>		
	</body>
	<footer>
		<?php
			include 'footer.html';
		?>	
	</footer>
</html>
