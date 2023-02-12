<?php
// Database Connection 
include 'connection/config.php';
//Check for connection error
$select = "SELECT * FROM user_details";
$result = $conn->query($select);
while($row = $result->fetch_object()){
  $pdf = $row->user_id;
  $path = $row->user_mobile_number;
  $date = $row->user_name;
  $file = $path.$pdf;
}

// Add header to load pdf file
header('Content-type: application/pdf'); 
header('Content-Disposition: inline; filename="' .$file. '"'); 
header('Content-Transfer-Encoding: binary'); 
header('Accept-Ranges: bytes'); 
@readfile($file); 
?>
	