<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<link rel="stylesheet" href="imageposition.css" />
	<script language="javascript" type="text/javascript">
</script>
</head>
<body>
<h2 style="font-size: 25px;padding-left:50px">Gallery</h2>
<hr>
<div class="main" >
<div class="row">
<?php	
session_start();
define('RDS_HOSTNAME', 'emr.c70lsjbmqhcp.us-east-2.rds.amazonaws.com');
define('RDS_DB_NAME', 'hospital');
define('RDS_USERNAME','phpmyadmin');
define('RDS_PASSWORD','phpmyadmin');
define('RDS_PORT','3306');
if(isset($_POST['search']))
{
$link = mysqli_connect(RDS_HOSTNAME,RDS_USERNAME,RDS_PASSWORD,RDS_DB_NAME,RDS_PORT) or
die("Failed to connect to MySQL: " . mysql_error());

$specialist=$_POST['specialist'];
$disease=$_POST['disease'];
$aadhaar=$_SESSION['aadhaar'];

$a=array();
$i=0;
$j=0;
$b=array();
$c=array();
$d=array();
		
	if($specialist=='' && $disease!=''){
		$select= "SELECT * FROM patientrecords WHERE aadhaar='$aadhaar' AND disease='$disease'";
		$result1 = mysqli_query($link, $select);
		while($row =$result1->fetch_assoc()){	
			$a[$i]=base64_encode($row['image']);
			$b[$i]=$row["disease"];
			$c[$i]=$row["specialist"];
			$d[$i]=$row["date"];
			$i++;
			echo '<div class="column">
					<div class="content">
						<a target="_blank" href="data:image/jpg;base64,'.$a[$j].'">	
							<img src="data:image/jpg;base64,'.$a[$j].'"  style="width:100%;">
						</a>
							<h3>Disease Name:'.$b[$j].'</h3>
							<p>Record uploaded on:'.$d[$j].'</p>
							<p>specialist:'.$c[$j].'</p>
							<button><a href="data:image/jpg;base64,'.$a[$j].'" download="'.$b[$j].'reports.jpg">download </a></button>
					
					</div>
				</div>';
			$j++;
		}
		
	}
	else {
		$select= "SELECT * FROM patientrecords WHERE aadhaar='$aadhaar' AND disease='$disease' AND specialist='$specialist'";
		$result1 = mysqli_query($link, $select);
		if (mysqli_num_rows($result1) > 0) {
			while($row =$result1->fetch_assoc()){	
				$a[$i]=base64_encode($row['image']);
				$b[$i]=$row["disease"];
				$c[$i]=$row["specialist"];
				$d[$i]=$row["date"];
				$i++;
				echo '<div class="column">
						<div class="content">
							<a target="_blank" href="data:image/jpg;base64,'.$a[$j].'">	
								<img src="data:image/jpg;base64,'.$a[$j].'"  style="width:100%">
							</a>
							<h3>Disease Name:'.$b[$j].'</h3>
							<p>Record uploaded on:'.$d[$j].'</p>
							<p>specialist:'.$c[$j].'</p>
							<button><a  href="data:image/jpg;base64,'.$a[$j].'" download="'.$b[$j].'reports.jpg">download </a></button>
					
						</div>
					</div>';
				$j++;
		
			}
		
		}
		else{
			header("location:retrieve.php?temp1=true");
		}
	}
		
mysqli_close($link);
}
?>
</div>
</div>
</body>
</html>


