<?php 
	session_start();
	
	
	if ($_SERVER["REQUEST_METHOD"]=="POST") {
		$name = test_input($_POST["name"]);
	 	$email = test_input($_POST["email"]);
	 	$title = test_input($_POST["suggestion_title"]);
	 	$description = test_input($_POST["suggestion"]);
	 	$date = test_input($_POST['date']);
	 	$time = test_input($_POST['time']);
	 	
	}
	function test_input($data)
	{
		$data = trim($data);
		$data = stripcslashes($data);
		$data = htmlspecialchars($data);
		return $data;	
	}

	

	include '../../connection/config.php';
	$u_id = $_SESSION['user id'];
	$date_time = $date." ".$time;
	$view_status = 0;
	$sql = "insert into feedback_form(name , email, suggestion_title , description, date_time, user_id, view_status) values ('$name','$email', '$title' , '$description', '$date_time', '$u_id' ,'$view_status')";

		if (mysqli_query($conn,$sql)) {
			mysqli_close($conn);
			
			

			require '../../mailer/PHPMailerAutoload.php';
			require '../../mailer/credential.php';

			$mail = new PHPMailer;

			//$mail->SMTPDebug = 4; //conversation between server and client and  Enable verbose debug output

			$mail->isSMTP();                                      // Set mailer to use SMTP
			$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
			$mail->SMTPAuth = true;                               // Enable SMTP authentication
			$mail->Username = EMAIL;                 // SMTP username
			$mail->Password = PASS;                           // SMTP password
			$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
			$mail->Port = 587;                                    // TCP port to connect to

			$mail->setFrom(EMAIL, 'Ahmedabad City Police');
			$mail->addAddress($email);     // Add a recipient
			//$mail->addAddress('ellen@example.com');               // Name is optional
			$mail->addReplyTo(EMAIL);
			/*
				$mail->addCC('cc@example.com');
				$mail->addBCC('bcc@example.com');

				$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
				$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
			*/
			$mail->isHTML(true);                                  // Set email format to HTML

			$mail->Subject = 'Notification: Feedback Form Recieved.';
			$mail->Body = "Thanks for sending feedback and we will try to consider your feedback. If it is glitch, will try to solve that as soon as possible<br><br>Regards,<br>Ahmedabad City Police";


			if(!$mail->send()) {
			    
			    echo 'Mailer Error: ' . $mail->ErrorInfo;
			} 
			else 
			{
				$_SESSION['is error'] = true;
				$_SESSION['error desc']='Form Submitted Succesfully.';
				header("location:../../home.php") ;   
			}
			
		}
		else
		{
			mysqli_close($conn);
			$_SESSION['is error'] = true;
			$_SESSION['error desc']='Form Not SUbmitted Succesfully.';
			header("location:feedback.php");
		}		
?>