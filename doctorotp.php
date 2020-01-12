<?php
 session_start();
 
$textpswd=$_POST['textpswd'];
	if($textpswd==$_SESSION['OTP']){
		$result=1;
	}
	else{
		$result=0;
	}
	echo $result;
?>