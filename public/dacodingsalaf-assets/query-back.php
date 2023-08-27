<?php
require 'prep_config.php';
if(is_numeric($_POST['id'])){
	$id=$_POST['id'];

	try {
$stmt = $conn->prepare("SELECT *  from transactions where id=?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
//echo $result->num_rows;
$row = $result->fetch_assoc();
	$trx_id= $row['ref_id'];
	 $stmt1 = $conn->prepare("SELECT id from query_report where trx_id=?");
$stmt1->bind_param("s", $trx_id);
$stmt1->execute();
$result1 = $stmt1->get_result();

if($result1->num_rows>=1){
	echo "Query as already been sent before";
}else{
	$status_text="Reviewing by Admin";			
$stmt2 = $conn->prepare("INSERT INTO query_report (trx_id, status_text) VALUES(?,?)");
$stmt2->bind_param("ss",$trx_id, $status_text);
$stmt2->execute();
echo true;
$stmt2->close();
}   	       	
	
$stmt->close();
}
catch (Exception $e) {
		error_log($e);
		echo $e;
		exit('Unable to make select request');
}





}else{
	echo "Only numeric values are allowed";
}







?>