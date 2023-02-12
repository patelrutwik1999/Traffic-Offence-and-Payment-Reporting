<?php 
	session_start();
	
	
	if ($_SERVER["REQUEST_METHOD"]=="POST") {
		$police_id = test_input($_POST["police_id"]);
	 	$password_user = test_input($_POST["pass"]);
	 	
	}
	function test_input($data)
	{
		$data = trim($data);
		$data = stripcslashes($data);
		$data = htmlspecialchars($data);
		return $data;	
	}

	$pid = $pass = "";
echo "123";
	include '../connection/config.php';
	$sql = "select password,first_name from police_details where pid = '$police_id'";
	$result = mysqli_query($conn,$sql);
	#echo $result;

	$num = mysqli_num_rows($result);
 	$row = $result->fetch_assoc();
 	$pass = $row["password"];
 	$_SESSION['first name']=$row["first_name"];
	
	if($num == 1)
	{
		
		#password decyption....
		$ciphering = "AES-128-CTR"; 
		$options = 0;

		// Non-NULL Initialization Vector for decryption 
		$decryption_iv = '1234567891011121'; 
  
		// Store the decryption key 
		$decryption_key = "torpatljiet"; 
  
		// Use openssl_decrypt() function to decrypt the data 
		$decryption=openssl_decrypt ($pass, $ciphering,  
        $decryption_key, $options, $decryption_iv); 
  		
		
		if ($password_user == $decryption) {
			$_SESSION['logged'] = true;
			$_SESSION['logged in type'] = "police"; // true is for police and false for layman
			$_SESSION['police id'] = $police_id;
			if (isset($_POST['remember_me'])){
				
				$rem_me= $_POST['remember_me'];
				$user_hash = hash('sha1','torpatljiet'.$police_id);
				$sql2 = "insert into remember_me(pid,hash,status) values ('$police_id','$user_hash','$rem_me')";
				$_SESSION['rem_me']=$rem_me;
				$result2 = mysqli_query($conn,$sql2);
				if($result2){
					$id = 'hash';
					$value = $user_hash;
					setcookie($id,$value,time() + (86400 * 30),"/");
				}
			}	
			mysqli_close($conn);
			header('location:../home.php');	
		}
		else
		{
			$_SESSION['logged'] = null;
			$_SESSION['is error'] = true;
			$_SESSION['error desc']='Wrong Password';
			mysqli_close($conn);
			header("location:police_login.php");
		}
		
	}
	else
	{
		$_SESSION['is error'] = true;
		$_SESSION['error desc']='Wrong Police ID';
		mysqli_close($conn);
		header("location:police_login.php");
	}
	
?>