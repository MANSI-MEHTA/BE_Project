
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


/*
$sql = "CREATE TABLE images (
id int(255) UNSIGNED AUTO_INCREMENT  PRIMARY KEy,
name VARCHAR(50),
image longblob
)";
	
if (mysqli_query($link, $sql)) {
    echo " Table patient created successfully";
} else {
    echo "Error creating table: " . mysqli_error($link);
}*/
/*
$filename = $_FILES['file']['name'];
$tmpname = $_FILES['file']['tmp_name'];
$filetype = $_FILES['file']['type'];
for($i=0; $i<=count($tmpname)-1; $i++){
	$name = addslashes($filename[$i]);
	$tmp = addslashes(file_get_contents($tmpname[$i]));
$query = "INSERT INTO images(name,image)VALUES('$name','$tmp')";
$result = mysqli_query($link,$query);
	if($result)
	{	
		echo "you have successfully uploaded the image";
	

	}
	else
	{
	 //die('Error: '.mysql_error($link));
	 echo "die";
	}
}
*/
/*
$select= "SELECT * FROM images";
$result1 = mysqli_query($link, $select);

while($row =$result1->fetch_assoc()){
	echo '<img src="data:image/jpg;base64,'.base64_encode($row['image']).'" width="250" height="250">';
	
}*/
}
mysqli_close($link);
?>