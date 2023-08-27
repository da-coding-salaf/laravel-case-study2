<?php
require 'prep_config.php';

		function startsWith ($string, $startString) 
            { 
            $len = strlen($startString); 
            return (substr($string, 0, $len) === $startString); 
         
            } 


if(isset($_POST['register'])){
	
	$firstname=$_POST['firstname'];
	$lastname=$_POST['lastname'];
	$username=$_POST['username'];
	$phone_number=$_POST['phone_number'];
	$email=$_POST['email'];
	//$referral_username=$_POST['referral_username'];
	$password=$_POST['password'];
	$confirm_password=$_POST['confirm_password'];


if(!empty($firstname) && !empty($lastname) && !empty($username) && !empty($phone_number) && !empty($email) && !empty($password)&& !empty($confirm_password)){


	$firstname=filter_var ($firstname, FILTER_SANITIZE_STRING);
	$lastname=filter_var ($lastname, FILTER_SANITIZE_STRING);
	$username=filter_var ($username, FILTER_SANITIZE_STRING);
	$phone_number=filter_var ($phone_number, FILTER_SANITIZE_STRING);
	$email=filter_var ($email, FILTER_VALIDATE_EMAIL);
	//$referral_username=filter_var ($referral_username, FILTER_SANITIZE_STRING);
	$password=filter_var ($password, FILTER_SANITIZE_STRING);
	$confirm_password=filter_var ($confirm_password, FILTER_SANITIZE_STRING);
		
	if(ctype_alnum($username)){

		if(strlen($username)>=5){
			try {
$stmt = $conn->prepare("SELECT  username, email FROM user_registration WHERE username =? OR email=?");
$stmt->bind_param("ss", $username, $email);
$stmt->execute();
$result = $stmt->get_result();

		
		if($result->num_rows<1){



			if($password==$confirm_password){


				if(strlen($password)>=8){

					if(strlen($phone_number)==11){


						if(startsWith($phone_number,'070') || startsWith($phone_number,'090') ||startsWith($phone_number,'080')|| startsWith($phone_number,'091') || startsWith($phone_number,'081') ){

							if($username != $password){

								$token = openssl_random_pseudo_bytes(16);

								$token = bin2hex($token.$email);

								$hash = password_hash ($password, PASSWORD_DEFAULT);
								try {
							$stmt2 = $conn->prepare("INSERT INTO user_registration (user_token, firstname, lastname, username, phone, email, password) VALUES (?,?,?,?,?,?,?)");
							$stmt2->bind_param("sssssss",$token, $firstname, $lastname, $username, $phone_number, $email, $hash);
							$stmt2->execute();
							
							echo json_encode([
								'status'=> true,
								'message'=>"New Record inserted successfully"
								]);

								$stmt2->close();
							$conn->close();
									
								} catch (Exception $e) {
									//error_log($e->getMessage());
									exit("Probably Binding Error"); 
								}


							}else{
								echo json_encode([
								'status'=> false,
								'message'=>"Username and Password must not equal"
								]);
								exit;
							}



						}else{

						echo json_encode([
							'status'=> false,
							'message'=>"Enter valid Phone Number."
							]);
							exit;


						}




					}else{
						echo json_encode([
			'status'=> false,
			'message'=>"Incorrect phone number."
		]);
			exit;

					}








				}else{
					echo json_encode([
			'status'=> false,
			'message'=>'Password length must not less than 8'
		]);
			exit;

				}					






			}else{
				echo json_encode([
			'status'=> false,
			'message'=>'Password do not match.'
		]);
			exit;

			}






		}else{
			echo json_encode([
			'status'=> false,
			'message'=>'Username/Email already exist.'
		]);
			exit;

		}
$stmt->close();
}
catch (Exception $e) {
		exit('Unable to make select request');
}





		}else{
			echo json_encode([
			'status'=> false,
			'message'=>'Use a more secure username at least five (5) characters.'
		]);
			exit;

		}





	}else{
		echo json_encode([
			'status'=> false,
			'message'=>'Only text and number is allowed for username avoid using space in between.'
		]);
		exit;
	}






}else{

	

	echo json_encode([
			'status'=> false,
			'message'=>'Fill all the fields correctly.'
		]);
		exit;
}



}else{
	echo false;
}





?>