<?php
session_start();
define('RDS_HOSTNAME', 'emr.c70lsjbmqhcp.us-east-2.rds.amazonaws.com');
define('RDS_DB_NAME', 'hospital');
define('RDS_USERNAME','phpmyadmin');
define('RDS_PASSWORD','phpmyadmin');
define('RDS_PORT','3306');
$link = mysqli_connect(RDS_HOSTNAME,RDS_USERNAME,RDS_PASSWORD,RDS_DB_NAME,RDS_PORT) or
die("Failed to connect to MySQL: " . mysql_error());
	
$use=$_POST['use'];
if($use=='authentication'){
	$patient_pswd_l=$_POST['patient_pswd_l'];
	$patient_aadhaar_l=$_POST['patient_aadhaar_l'];
	$query = "SELECT * FROM patient1 WHERE aadhaar = '$patient_aadhaar_l' AND password = '$patient_pswd_l'";
	$result1 = mysqli_query($link, $query);
	$count1=mysqli_num_rows($result1); 
	if ($count1 == 1) {
		$row1=mysqli_fetch_assoc($result1);
		$_SESSION['username']=$row1["name"];
		$_SESSION['aadhaar']=$row1["aadhaar"];
		
		echo '1';
	}
	else{
		echo '0';
	}
	mysqli_close($link);
}
else if($use=='diseasedropdown'){
	$aadhaar=$_SESSION['aadhaar'];
	$i='0';
	$a=array();
	$query = "SELECT DISTINCT disease FROM patientrecords WHERE aadhaar = '$aadhaar'";
	$result1 = mysqli_query($link, $query);
	while($row1 =$result1->fetch_assoc()){
		$a[$i]=$row1['disease'];
	//	echo $a[$i];
		$i++;
	}
	echo json_encode($a);
	//exit($a);
	
	
mysqli_close($link);
}
else if($use=='specialistdropdown'){
	//$aadhaar=$_SESSION['aadhaar'];
	$i='0';
	$a=array();
	$query = "SELECT DISTINCT specialist FROM patientrecords WHERE aadhaar ='$aadhaar'";
	$result1 = mysqli_query($link, $query);
	while($row1 =$result1->fetch_assoc()){
		$a[$i]=$row1['specialist'];
		$i++;
	}
	echo json_encode($a);
	
	
mysqli_close($link);
}

?>