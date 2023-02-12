<!DOCTYPE html>
<html>
<head>
	<title>Filters in page</title>
	<link rel="stylesheet" type="text/css" href="jquery-ui.css">
	<script type="text/javascript" src="jquery-1.12.4.js"></script>
	<script type="text/javascript" src="jquery-ui.js"></script>
	<script type="text/javascript">
		$( function() {
    		$( "#from" ).datepicker({
      		changeMonth: true,
      		changeYear: true
    		});
  		} );

  		$( function() {
    		$( "#to" ).datepicker({
      		changeMonth: true,
      		changeYear: true
    		});
  		} );
	</script>
</head>
<body>
	<div class="container">
		<div class="row">
			<form class="form-horizontal" action="index.php" method="post">
				<div class="form-group">
					<label class="col-lg-2 control-label">From</label>
					<div class="col-lg-4">
						<input type="text" name="from_date" id="from" class="form-control">
					</div>
				</div>
				<div class="form-group">
					<label class="col-lg-2 control-label">To</label>
					<div class="col-lg-4">
						<input type="text" name="to_date" id="to" class="form-control">
					</div>
				</div>
				<div class="form-group">
					<div class="col-lg-4">
						<input type="submit" class="btn btn-primary">
					</div>
				</div>
			</form>
		</div>
	</div>
</body>
</html>