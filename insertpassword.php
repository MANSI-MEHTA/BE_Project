<?php
session_start();
session_unset();

$patient_new_pswd=$_POST['patient_new_pswd'];
$patient_aadhaar_l=$_POST['patient_aadhaar_l'];
define('RDS_HOSTNAME', 'emr.c70lsjbmqhcp.us-east-2.rds.amazonaws.com');
define('RDS_DB_NAME', 'hospital');
define('RDS_USERNAME','phpmyadmin');
define('RDS_PASSWORD','phpmyadmin');
define('RDS_PORT','3306');

$link = mysqli_connect(RDS_HOSTNAME,RDS_USERNAME,RDS_PASSWORD,RDS_DB_NAME,RDS_PORT) or
die("Failed to connect to MySQL: " . mysql_error());
$sql = "UPDATE patient1 SET password='$patient_new_pswd' WHERE aadhaar='$patient_aadhaar_l'";

if (mysqli_query($link, $sql)) {
	$query = "SELECT * FROM patient1 WHERE aadhaar = '$patient_aadhaar_l' AND password = '$patient_new_pswd'";
	$result1 = mysqli_query($link, $query);
	$row1=mysqli_fetch_assoc($result1);
	$_SESSION['username']=$row1["name"];
	$_SESSION['aadhaar']=$row1["aadhaar"];
	
    echo "Record updated successfully";
	
} else {
    echo "Error updating record: ";
}

mysqli_close($link);
?>