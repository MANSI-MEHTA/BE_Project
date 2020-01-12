<?php
session_start();
session_unset();

$patient_aadhaar_l=$_POST['patient_aadhaar_l'];

define('RDS_HOSTNAME', 'emr.c70lsjbmqhcp.us-east-2.rds.amazonaws.com');
define('RDS_DB_NAME', 'hospital');
define('RDS_USERNAME','phpmyadmin');
define('RDS_PASSWORD','phpmyadmin');
define('RDS_PORT','3306');

$link = mysqli_connect(RDS_HOSTNAME,RDS_USERNAME,RDS_PASSWORD,RDS_DB_NAME,RDS_PORT) or
die("Failed to connect to MySQL: " . mysql_error());

$sql = "SELECT mobile FROM patient1 WHERE aadhaar = 'patient_aadhaar_l'";
		$result1 = mysqli_query($link, $sql);
		$count1=mysqli_num_rows($result1); 
				if ($count1 == 0) {
					echo 'aadhaar number not found' ;
					
				}
				else{
					$row = mysqli_fetch_assoc($result1)) ;
					$patient_mobile=$row["mobile"];
					//$apiKey = urlencode('WUv6xj08PaA-ay8Te4Ow57w7cvblHK1nhS9kE4baTD'); 
	
					//$numbers = array($patient_mobile);
					//$sender = urlencode('TXTLCL');
					//$otp =mt_rand(10000,99999); 
					$otp=11111;                  //for try and error not important rest all important uncomment it later.
	
	
					//$message = rawurlencode($otp.' is your verfication code for EMR app. Please do not share this with anyone.');
					$_SESSION['OTP']=$otp;                 
					//$numbers = implode(',', $numbers); 
 

					/*	$data = array('apikey' => $apiKey, 'numbers' => $numbers, "sender" => $sender, "message" => $message);
					$ch = curl_init('https://api.textlocal.in/send/');
					curl_setopt($ch, CURLOPT_POST, true);
					curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
					curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
					$response = curl_exec($ch);
					curl_close($ch);
					*/
					echo 'THE OTP is sent to equivalent mobile number for'." ".$patient_aadhaar_l.' aadhaar number';


					
				}