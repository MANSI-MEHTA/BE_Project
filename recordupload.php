
<?php	
session_start();

define('RDS_HOSTNAME', 'emr.c70lsjbmqhcp.us-east-2.rds.amazonaws.com');
define('RDS_DB_NAME', 'hospital');
define('RDS_USERNAME','phpmyadmin');
define('RDS_PASSWORD','phpmyadmin');
define('RDS_PORT','3306');
if(isset($_POST['submit']))
{
$link = mysqli_connect(RDS_HOSTNAME,RDS_USERNAME,RDS_PASSWORD,RDS_DB_NAME,RDS_PORT) or
die("Failed to connect to MySQL: " . mysql_error());

/*
$sql = "CREATE TABLE patientrecords (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
aadhaar BIGINT(12) NOT NULL,
disease VARCHAR(50) NOT NULL,
specialist VARCHAR(50),
doctorname VARCHAR(50) NOT NULL,
date date NOT NULL,
medicine varchar(100) NOT NULL,
hospital varchar(100)NOT NULL,
city varchar(20),
image longblob
)";
	
if (mysqli_query($link, $sql)) {
    echo " Table patientrecords created successfully";
} else {
    echo "Error creating table: " . mysqli_error($link);
}
*/

$aadhaar=$_SESSION['aadhaar'];
$disease= $_POST['disease'];
$specialist = $_POST['specialist'];
$doctor_name = $_POST['doctor_name'];
$date = date("y m j");
$medicine_name= $_POST['medicine_name'];
$hospital_name = $_POST['hospital_name'];
$city_name = $_POST['city_name'];


$filename = $_FILES['file']['name'];
$tmpname = $_FILES['file']['tmp_name'];
$filetype = $_FILES['file']['type'];
for($i=0; $i<=count($tmpname)-1; $i++){
	$name = addslashes($filename[$i]);
	$tmp = addslashes(file_get_contents($tmpname[$i]));
$query = "INSERT INTO patientrecords(aadhaar,disease,specialist,doctorname,date,medicine,hospital,city,image)VALUES('$aadhaar','$disease','$specialist','$doctor_name',curdate(),'$medicine_name','$hospital_name','$city_name','$tmp')";
$result = mysqli_query($link,$query);
}
	if($result)
	{	
		echo "you have successfully uploaded the image";
	

	}
	else
	{
	 //die('Error: '.mysql_error($link));
	 echo "die";
	}




/*	
$select= "SELECT * FROM patientrecords";
$result1 = mysqli_query($link, $select);

while($row =$result1->fetch_assoc()){
	echo '<img src="data:image/jpg;base64,'.base64_encode($row['image']).'" width="250" height="250">';
	echo '<br>';
	echo $row["aadhaar"]. " " . $row["disease"]. " " .$row["doctorname"]. " " . $row["specialist"]." " .$row["date"]. " ".$row["medicine"]." ". $row["hospital"]. " ".$row["city"];
}*/
}
mysqli_close($link);
?>