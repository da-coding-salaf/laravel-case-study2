<?php
require '../dashboard/session_file.php';
	$id=1;
	
	foreach ($_POST as $key => $value) {
		if(empty($value)){
				echo json_encode([
		'status'=>false,
		'message'=> $key." cannot be empty"
	]);
				exit;
		}	
	}

	$network=$_POST['network'];
	try {
$stmt = $conn->prepare("SELECT * from network_locks where id=?");
$stmt->bind_param("s", $id);
$stmt->execute();
$result = $stmt->get_result();
//echo $result->num_rows;
$row = $result->fetch_assoc();
	if(isset($row[strtolower($network)])&&$row[strtolower($network)]=='ON'){

$stmt3 = $conn->prepare("SELECT * from networks_phone_number where id=?");
$stmt3->bind_param("s", $id);
$stmt3->execute();
$result3 = $stmt3->get_result();
$row3 = $result3->fetch_assoc();

$stmt4 = $conn->prepare("SELECT * from network_discounts where id=?");
$stmt4->bind_param("s", $id);
$stmt4->execute();
$result4 = $stmt4->get_result();
$row4 = $result4->fetch_assoc();


 $dateTime = new DateTime('now', new DateTimeZone('Africa/Lagos')); 
    $time=$dateTime->format("d-M-y  h:i A");
    $trr=$dateTime->format("dyhi");
    $tr=rand(100, 900);
    $trx=$tr.$trr;

$amount=$_POST['amount'];
$desc="";
$status='received';

$receiver_number=$row3[strtolower($network)];
$discount=$row4[strtolower($network)];
$bank_name=$_POST['bank-name'];
$account_number=$_POST['account-number'];
$account_name=$_POST['account-name'];
$sending_number=$_POST['sending-number'];


$stmt2 = $conn->prepare("INSERT INTO `transactions`( `email`, `ref_id`, `amount`, `description`, `date`, `status`, `network`, `discount`, `bank_name`, `account_number`, `account_name`, `receiver_number`, `sending_number`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)");
$stmt2->bind_param("sssssssssssss",$email, $trx, $amount, $desc,$time,$status,$network,$discount,$bank_name,$account_number,$account_name,$receiver_number,$sending_number);
$stmt2->execute();


    $subject = "Airtime Order AIRTIME-ZONE";
    $body ='<p>Hello! Admin</p>';
    $body .='<p>Ref ID: '.$trx.'</p>';
    $body .='<p>Full Name: '.$firstname.' '.$lastname.'</p>';
    $body .='<p>Username: '.$username.'</p>';
    $body .='<p>Email: '.$email.'</p>';
    $body .='<p>Network: '.$network.'</p>';
    $body .='<p>Amount: '.$amount.'</p>';


     $email_to =$admin_email;


    $headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    $headers .= "From: AIRTIME ZONE"."\r\n".
    'X-Mailer: PHP/' . phpversion();
   // mail($email_to, $subject, $body, $headers);


	echo json_encode([
		'status'=>true,
		'message'=>"Your order has successfully been received. \n Check your your transactions page in other of more detail about your order "
	]);
		exit;





	}else{
		echo json_encode([
		'status'=>false,
		'message'=>"Network was OFF. you try"
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