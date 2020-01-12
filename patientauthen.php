
<?php


define('RDS_HOSTNAME', 'emr.c70lsjbmqhcp.us-east-2.rds.amazonaws.com');
define('RDS_DB_NAME', 'hospital');
define('RDS_USERNAME','phpmyadmin');
define('RDS_PASSWORD','phpmyadmin');
define('RDS_PORT','3306');
if(isset($_POST['submit']))
{
$link = mysqli_connect(RDS_HOSTNAME,RDS_USERNAME,RDS_PASSWORD,RDS_DB_NAME,RDS_PORT) or
die("Failed to connect to MySQL: " . mysql_error());
/*$sql = "DELETE FROM patientrecords WHERE aadhaar=0";

if (mysqli_query($link, $sql)) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}
*/
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
/*
$patient_aadhaar= $_POST['patient_aadhaar_s'];
$patient_mobile = $_POST['patient_mobile'];
$patient_name = $_POST['patient_name_s'];
$patient_password = $_POST['patient_pswd_s'];


$query = "INSERT INTO patient1(aadhaar,name,mobile,password)VALUES('$patient_aadhaar','$patient_name','$patient_mobile','$patient_password')";
$result = mysqli_query($link,$query);
	if($result)
	{	
		echo "you have successfully register";
		echo "<br><br>";

	}
	else
	{
	// die('Error: '.mysql_error($link));
	 echo "die";
	}
*/

$select= "SELECT * FROM patient1";
$result = mysqli_query($link, $select);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_array($result)) {
        echo $row["aadhaar"]. " " . $row["name"]. " " . $row["mobile"]." " .$row["password"].  "<br>";
    }
} else {
    echo "0 results";
}

	mysqli_close($link);	
}
?>