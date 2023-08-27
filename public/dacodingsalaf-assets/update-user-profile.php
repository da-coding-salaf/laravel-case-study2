<?php
require '../dashboard/session_file.php';

	
	$firstname=$_POST['firstname'];
	$lastname=$_POST['lastname'];
	$phone=$_POST['phone'];
	


	try{
$stmt = $conn->prepare("UPDATE user_registration SET firstname = ?, lastname = ?, phone=?  where user_token=?");
$stmt->bind_param("ssss", $firstname, $lastname, $phone, $user_token);
$exec=$stmt->execute();
if($exec){
	echo json_encode([
		'status'=>true,
		'message'=>"User Update  Successful"
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


//echo $_SESSION['user_token'];


?>