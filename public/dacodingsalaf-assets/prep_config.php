<?php
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$servernamet = "localhost";
$usernamet = "root";
$passwordt = "";
$dbnamet = "airtime-zone";

// Create connection
try{
$conn = new mysqli($servernamet, $usernamet, $passwordt, $dbnamet);
$conn->set_charset("utf8mb4");

$querysetting = "SELECT * FROM website_info";
                $resultsetting = mysqli_query($conn, $querysetting);
                $rowsetting = mysqli_fetch_assoc($resultsetting);
                $site_title=$rowsetting['site_title'];
                $admin_phone=$rowsetting['admin_phone'];
                 $mtn_airtime_switch=$rowsetting['mtn_airtime_switch'];
                $glo_airtime_switch=$rowsetting['glo_airtime_switch'];
                 $airtel_airtime_switch=$rowsetting['airtel_airtime_switch'];
                $mobile_airtime_switch=$rowsetting['9mobile_airtime_switch'];

             /*   $mtn_sme_switch=$rowsetting['mtn_sme_switch'];
                $mtn_cg_switch=$rowsetting['mtn_cg_switch'];
                $mtn_g_switch=$rowsetting['mtn_g_switch'];
                $airtel_c_switch=$rowsetting['airtel_c_switch'];
                $airtel_g_switch=$rowsetting['airtel_g_switch'];
                $glo_c_switch=$rowsetting['glo_c_switch'];
                $glo_g_switch=$rowsetting['glo_g_switch'];
                $mobile_c_switch=$rowsetting['mobile_c_switch'];
                $mobile_sme_switch=$rowsetting['mobile_sme_switch'];*/

                $site_url=$rowsetting['site_url'];
        $admin_phone=$rowsetting['admin_phone'];
        $admin_email=$rowsetting['admin_email'];
        $admin_address=$rowsetting['admin_address'];
        $admin_bank_name=$rowsetting['admin_bank_name'];
        $admin_bank_account_num=$rowsetting['admin_bank_account_num'];
        $admin_account_name=$rowsetting['admin_account_name'];
         $admin_whatsapp_number=$rowsetting['admin_whatsapp_number'];
                                                        




}
 catch (Exception $e) {
	error_log($e->getMessage());
	echo $e->getMessage().'1266.4.5.7.8';
	echo "<br>";
	exit("Error connecting to the database");	
	}



?>
