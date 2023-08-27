<?php
require '../dashboard/session_file.php';
	$current_password=$_POST['current_password'];
	$new_password=$_POST['new_password'];
	$confirm_password=$_POST['confirm_password'];



	if(!empty($current_password)&& !empty($new_password) && !empty($confirm_password)){
		try {
$stmt = $conn->prepare("SELECT * from user_registration where user_token=?");
$stmt->bind_param("s", $user_token);
$stmt->execute();
$result = $stmt->get_result();
//echo $result->num_rows;
$row = $result->fetch_assoc();

	 if (password_verify($current_password, $row['password']) == 1 ) {
	 		

	 	}else{

	 		echo json_encode([
			'status'=> false,
			'message'=>'Incorrect Current Password'
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
								'message'=>"Fill out all those fields correctly"
								]);
		exit;

	}









		if($new_password==$confirm_password){


				if(strlen($new_password)>=8){
								$hash = password_hash ($new_password, PASSWORD_DEFAULT);
							try{
						$stmt = $conn->prepare("UPDATE user_registration SET password = ?  where user_token=?");
						$stmt->bind_param("ss", $hash, $user_token);
						$exec=$stmt->execute();
						if($exec){
							echo json_encode([
								'status'=>true,
								'message'=>"User Password Update  Successful"
							]);
						}else{
							echo json_encode([
								'status'=>false,
								'message'=>"User Update not Successful"
							]);
						}
						$stmt->close();	
							}catch(Exception $e){
								error_log($e->getMessage());
								exit("Error in the Update");
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



/*	*/


//echo $_SESSION['user_token'];


?>