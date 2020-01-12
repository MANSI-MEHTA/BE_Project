<?php
	session_start();
	
	
$_session['patient_aadhaar']= $_POST['patient_aadhaar_s'];
$_session['patient_mobile'] = $_POST['patient_mobile'];
$_session['patient_name'] = $_POST['patient_name_s'];
$_session['patient_password'] = $_POST['patient_cpswd_s'];
header("location:varshil.php?otp=true");	

?>