<?php
 session_start();
 
$textotp=$_POST['textotp'];
$patient_aadhaar_s= $_POST['patient_aadhaar_s'];
$patient_mobile = $_POST['patient_mobile'];
$patient_name_s = $_POST['patient_name_s'];
$patient_pswd_s = $_POST['patient_pswd_s'];

	if($textotp==$_SESSION['OTP']){
		define('RDS_HOSTNAME', 'emr.c70lsjbmqhcp.us-east-2.rds.amazonaws.com');
		define('RDS_DB_NAME', 'hospital');
		define('RDS_USERNAME','phpmyadmin');
		define('RDS_PASSWORD','phpmyadmin');
		define('RDS_PORT','3306');
	
		$link = mysqli_connect(RDS_HOSTNAME,RDS_USERNAME,RDS_PASSWORD,RDS_DB_NAME,RDS_PORT) or
		die("Failed to connect to MySQL: " . mysql_error());

/*
$sql = "CREATE TABLE patient1 (
aadhaar BIGINT(12) UNSIGNED PRIMARY KEy,
name VARCHAR(50),
mobile VARCHAR(30),
password VARCHAR(30)

)";
	
if (mysqli_query($link, $sql)) {
    echo " Table patient created successfully";
} else {
    echo "Error creating table: " . mysqli_error($link);
}
*/

		$sql = "SELECT * FROM patient1 WHERE aadhaar = '$patient_aadhaar_s' AND mobile = '$patient_mobile'";
		$result1 = mysqli_query($link, $sql);
		$count1=mysqli_num_rows($result1); 
				if ($count1 == 1) {
					$result=-1;
					
				}
				else{
					$query = "INSERT INTO patient1(aadhaar,name,mobile,password)VALUES('$patient_aadhaar_s','$patient_name_s','$patient_mobile','$patient_pswd_s')";
					
					if(mysqli_query($link,$query))
					{	
						$result=1;
						$row1=mysqli_fetch_assoc($result1);
						$_SESSION['username']=$row1["name"];
						$_SESSION['aadhaar']=$row1["aadhaar"];
						
						//echo "you have successfully register";
						//echo "<br><br>";
					}
					else
					{
						$result=2;
						
						/*die('Error: '.mysql_error($link));*/
						//echo "die";
					}	
		
		
				}
	
	
	}
	else{
		$result=0;
	}
	
	/*
$select= "SELECT * FROM patient1";
$result = mysqli_query($link, $select);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo $row["aadhaar"]. " " . $row["name"]. " " . $row["mobile"]." " .$row["password"].  "<br>";
    }
} else {
    echo "0 results";
}
*/
	mysqli_close($link);	


		
		
	
	
	echo $result;
?>
