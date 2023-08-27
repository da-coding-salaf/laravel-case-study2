<?php
//require 'session_file.php';
//$site_title="Abass";
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link rel="shortcut icon" href="{{asset('dacodingsalaf-assets/dashboard-assets/img/icons/icon-48x48.png')}}" />
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
	<title> <?php if(isset($page_name)){
		echo $page_name;
	}else{
		echo "dashboard";
	} ?> | <?php echo $website_info[0]->site_title?></title>
	 <script src="https://use.fontawesome.com/41db31bc4a.js"></script>
	 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
	<link href="{{asset('dacodingsalaf-assets/dashboard-assets/css/app.css')}}" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
</head>

 <style>
   .swal-modal .swal-text {
    text-align: center;
						  }
   </style>
 
	<style type="text/css">
	.swal-modal .swal-text {
	text-align: center;
	}

	#form-cont{
	max-width:400px;
	}.form-group{
	margin-top: 13px;
	margin-bottom: 13px
	}label{
	margin-top: 2px;
	margin-bottom: 2px
	}.btn{
	width: 100%;
	margin-top:5px;
	background-color: #025ce3;
	border:red;
	padding-top: 8px;
	padding-bottom: 8px
	}.btn:hover{
	width: 100%;
	margin-top:5px;
	background-color: #025ce3 !important;
	outline: #025ce3 !important;
	border:#025ce3 !important;
	}
	.btn:active{
	width: 100%;
	margin-top:5px;
	background-color: #025ce3 !important;
	outline: #025ce3 !important;
	border:#025ce3 !important;
	}

	.card-title{
	margin-bottom: 0px;
	padding: 0px;
	height: 0px;
	}

	.cont-form{
	max-width:500px;
	padding: 15px
	}
	.form-control,.btn-block{
	padding: 10px;
	margin-top: 5px;
	margin-bottom: 5px
	}.btn-block{
	width: 100%;
	background-color: #025ce3;
	border-color: #025ce3;
	}.btn-block:hover {
	background-color: #025ce3;
	border-color: #025ce3;
	}

	</style>

<body>
	