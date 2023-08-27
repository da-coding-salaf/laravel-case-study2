<?php
require '../dashboard/session_file.php';
	$id=1;
	$network=$_POST['network'];
	try {
$stmt = $conn->prepare("SELECT * from networks_phone_number where id=?");
$stmt->bind_param("s", $id);
$stmt->execute();
$result = $stmt->get_result();
//echo $result->num_rows;
$row = $result->fetch_assoc();
	if(isset($row[strtolower($network)])){
			echo json_encode([
		'status'=>true,
		'message'=>$row[strtolower($network)]
	]);
			exit;

	}else{
		echo json_encode([
		'status'=>false,
		'message'=>"Incorrect network name"
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


//echo $_SESSION['user_token'];


?>