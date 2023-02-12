<?php

//index.php

$message = '';

include '../../connection/config.php';

function fetch_customer_data($connect)
{
 $query = "select * from memo_details where memo_id = '5e3a4fa427c9a'";
 $result = mysqli_query($query);
 $num = mysqli_num_row($result);
 $row = $result->fetch_assoc();
 $output = '
 <div class="table-responsive">
  <table class="table table-striped table-bordered">
   <tr>
    <th>Name</th>
    <th>Address</th>
    <th>City</th>
    
   </tr>
 ';
 
  $output .= '
   <tr>
    <td>'.$row["vehicle_number"].'</td>
    <td>'.$row["vehicle_type"].'</td>
    <td>'.$row["amount"].'</td>
    
   </tr>
  ';
 
 $output .= '
  </table>
 </div>
 ';
 return $output;
}

if(isset($_POST["action"]))
{
 include('pdf.php');
 $file_name = md5(rand()) . '.pdf';
 $html_code = '<link rel="stylesheet" href="bootstrap.min.css">';
 $html_code .= fetch_customer_data($connect);
 $pdf = new Pdf();
 $pdf->load_html($html_code);
 $pdf->render();
 $file = $pdf->output();
 file_put_contents($file_name, $file);
 }



?>
<!DOCTYPE html>
<html>
 <head>
  <title>Create Dynamic PDF Send As Attachment with Email in PHP</title>
  <script src="jquery.min.js"></script>
  <link rel="stylesheet" href="bootstrap.min.css" />
  <script src="bootstrap.min.js"></script>
 </head>
 <body>
  <br />
  <div class="container">
   <h3 align="center">Create Dynamic PDF Send As Attachment with Email in PHP</h3>
   <br />
   <form method="post">
    <input type="submit" name="action" class="btn btn-danger" value="PDF Send" /><?php echo $message; ?>
   </form>
   <br />
   <?php
   echo fetch_customer_data($connect);
   ?>   
  </div>
  <br />
  <br />
 </body>
</html>