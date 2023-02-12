<!DOCTYPE html>
<html>
	<head>
		<title>Maps</title>
		<?php 
		session_start();
			include '../header.php';
		?>
		
		<meta charset="utf-8">
	</head>
	<body>
		<div class="container">
			<br>
			<h1 style="color:purple;font-weight:bold;">Maps</h1>
			<hr style="border-width: 5px;border-color: grey;">
			<ul>
				<li><h2 style="font-weight: bold;">Ahmedabad District</h2></li><br>
				<li><img src="map/amd-district.gif" alt="amd-district" title="Ahmedabad District" width="510" height="391"></li><br>
				<hr style="border-width: 5px;border-color: grey;">
				<li><h2 style="font-weight: bold;">Ahmedabad City</h2></li><br>
				<li><img src="map/ahmedabad-city.jpg" alt="amd-city" title="Ahmedabad City" width="800" height="810"></li><br>
				<hr style="border-width: 5px;border-color: grey;">
				<li><h2 style="font-weight: bold;">Ahmedabad City Zones</h2></li><br>
				<li><img src="map/zones.jpg" alt="amd-zones" title="Ahmedabad City Zones" width="638" height="479"></li>
				<hr style="border-width: 5px;border-color: grey;">
				<br><li><h2 style="font-weight: bold;">Ahmedabad City Road Network</h2></li><br>
				<li><img src="map/road-network2.jpg" alt="amd-road-network" title="Ahmedabad City Road Network" width="1437" height="1015"></li><br>
				<hr style="border-width: 5px;border-color: grey;">
				<li><h2 style="font-weight: bold;">Ahmedabad City BRTS</h2></li><br>
				<li><img src="map/brts.jpg" alt="amd-brts" title="Ahmedabad City BRTS" width="2492" height="1812"></li><br>
				<hr style="border-width: 5px;border-color: grey;">
				<li><h2 style="font-weight: bold;">Ahmedabad City METRO</h2></li><br>
				<li><img src="map/metro.jpg" alt="amd-metro" title="Ahmedabad City Metro" width="1170" height="1719"></li><br>
			</ul>
		</div>
	</body>
	<footer>
		<?php
			include '../footer.html';
		?>	
	</footer>
</html>