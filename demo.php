<?php
session_start();
session_unset();
	$patient_mobile=$_POST['patient_mobile'];
	
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
	echo 'THE OTP is sent to'." ".$patient_mobile;


?>
