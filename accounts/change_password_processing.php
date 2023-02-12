<?php
    session_start();
    if(!isset($_SESSION['logged']))
        {
            header("location:index.php");
        }

	if ($_SERVER["REQUEST_METHOD"]=="POST"){
		$curr_pass = sha1(test_input_1($_POST["c_pass"]));
		$new_pass = sha1(test_input_1($_POST["n_pass"]));
	} 
	
	function test_input_1($data)
	{
		$data = trim($data);
		$data = stripcslashes($data);
		$data = htmlspecialchars($data);
		return $data;	
	}
	if ($curr_pass == $new_pass){
		$_SESSION["error"]=true;
		$_SESSION["error msg"]="New Password cannot be same as old password";
		header("location:change_password.php");
	}
	else{
		$email = $_SESSION["user email"];
		$mysqli = new mysqli("localhost", "root", "root", "ahmedabadtrafficpoliceadmin");
		if ($mysqli->connect_errno) {
    		echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
		}
		if (!($stmt = $mysqli->prepare("UPDATE user_details SET pass=? WHERE email = ? AND pass=?"))) {
    		echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
		}
		else{
			$stmt->bind_param("sss",$new_pass,$email,$curr_pass);
			$stmt->execute();
			if($stmt->affected_rows == 1){
				$_SESSION["error"]=true;
				$_SESSION["error msg"]="New Password Updated";
				header("location:change_password.php");
			}
			$stmt->close();
		}
	}	
?>