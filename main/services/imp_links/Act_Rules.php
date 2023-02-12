<!DOCTYPE html>
<html>
	<head>
		<title>ACTS & RULES</title>
		<?php
		session_start();
			include '../../../header.php';
		?>
		<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
		<style type="text/css">
			.heading{
				color:#1566e8;
			}
			.mySlides {display:none;}
			.table{
				font-size:2rem;
				border-style: solid;
				background-color:#e6ebf0;
				border:2px;
				margin-left: 10px;
			}
			a{
				text-decoration: underline;
			}
		</style>
	</head>
	<body>
		<br>
		<div class="container">
				<h1 class="heading">Acts&nbsp&&nbspRules</h1>
				<hr style="border-width:4px;">
				<table class="table" border="1" style="width:60%;border-top: solid; border: ">
					<th width="15%" style="border-style: solid ;background-color:#c2bcac;">Sr. No</th><th style="border-style: solid;background-color:#c2bcac" width="85%">Acts &amp; Rules</th>
					<tr>
							<td>01</td>
							<td><a href="acts/mva1988.pdf">Motor Vehicle Act, 1988</a></td>
					</tr>
					<tr>
							<td>02</td>
							<td><a href="acts/cmvr1989.pdf">Central Motor Vehicles Rules, 1989</a></td>
					</tr>
					<tr>
							<td>03</td>
							<td><a href="">Gujarat Motor Vehicles Rules,1989</a></td>
					</tr>
					<tr>
							<td>04</td>
							<td><a href="">Bombay Motor Vehicles Tax Act, 1958</a></td>
					</tr>
					<tr>
							<td>05</td>
							<td><a href="">Bombay Motor Vehicles Tax Rules, 1959</a></td>
					</tr>
					<tr>
							<td>06</td>
							<td><a href="">Gujarat Passenger Tax Act</a></td>
					</tr>
				</table>
				</div>
				<br>
	</body>
	<footer>
	<?php
			include '../../../footer.html';
	?>
	</footer>
</html>