<?php
require 'prep_config.php';
session_start();

		function startsWith ($string, $startString) 
            { 
            $len = strlen($startString); 
            return (substr($string, 0, $len) === $startString); 
         
            } 

       if(isset($_POST['login'])){
			$email=$_POST['email'];
			$password=$_POST['password'];

			if(!empty($email) && !empty($password)){
					$email=filter_var ($email, FILTER_VALIDATE_EMAIL);
					$password=filter_var ($password, FILTER_SANITIZE_STRING);

			try {
			$stmt = $conn->prepare("SELECT  email, password, user_token, user_status FROM user_registration WHERE email =? limit 1");
			$stmt->bind_param("s", $email);
			$stmt->execute();
			$result = $stmt->get_result();
			//echo ;

			if($result->num_rows>0){

				$row = $result->fetch_assoc();
					$hashed_pass = $row['password'];
						$user_token = $row['user_token'];
						$user_status = $row['user_status'];
					 if (password_verify($password, $hashed_pass) == 1 ) {
					 		 if ($user_status != 'blocked') {
						$_SESSION['user_token'] = $user_token ;
							echo json_encode([
								'status'=> true,
								'message'=>"Good"
								]);
								exit;
				
						}else{

								echo json_encode([
								'status'=> false,
								'message'=>"Oops! Your account has been temporarily disabled call ".$admin_phone." for re-activation."
								]);
								exit;

						}


					 }else{
					 	echo json_encode([
								'status'=> false,
								'message'=>"Incorrect login details."
								]);
								exit;
					 }
			}else{

					echo json_encode([
								'status'=> false,
								'message'=>"Incorrect login details."
								]);
								exit;

			}

			$stmt->close();
			}
			catch (Exception $e) {
					error_log($e);
					echo $e;
					exit('Unable to make select request');
			}




			}else{
				echo json_encode([
								'status'=> false,
								'message'=>"Fill all the fields correctly."
								]);
								exit;


			}


       }     

?>