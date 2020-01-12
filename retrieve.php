<?php	
session_start();
?>

<!DOCTYPE html>

<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link href="bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="main.css" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<link rel="stylesheet" href="imageposition.css" />
	
	</head>


<script language="javascript" type="text/javascript">
/*selectValues = { "1": "test 1", "2": "test 2" };
$.each(selectValues, function(key, value) {   
     $('#disease')
         .append($("<option></option>")
                    .attr("value",key)
                    .text(value)); 
});*/

$(document).ready(function () {
	var use='diseasedropdown';
	$.ajax({
			type: 'POST',
			url: 'login.php',
			data: {use:use},
			dataType :'json',	
			success: function(data) {
				addintodropdown(data);
				function addintodropdown(data) {
					for(var i=0;i<data.length;i++)
					{
						$("#disease").append($('<option value="' + data[i]+ '">' +data[i]+'</option>'));
					}
				}
			}
		});
var use='specialistdropdown';
	$.ajax({
			type: 'POST',
			url: 'login.php',
			data: {use:use},
			dataType :'json',	
			success: function(data) {
				addintodropdown(data);
				function addintodropdown(data) {
					for(var i=0;i<data.length;i++)
					{
						$("#specialist").append($('<option value="' + data[i]+ '">' +data[i]+'</option>'));
					}
				}
			}
		}); 
});
/*$(document).ready(function () {
    $(search).click(function () {
		var disease= $("#disease1").val();
		var specialist= $("#specialist1").val();
		var use='displayrecords';
		$.ajax({
			type: 'POST',
			url: 'login.php',
			data: {use:use,specialist:specialist,disease:disease},
			dataType:'html',
			success: function(response) {
				alert(response);
				("html").html(response);
				//console.log(data);
			}
		});
		
	});
	
});*/
</script>
  
<body class="fixed-nav sticky-footer bg-dark" id="page-top">
<?php
if(isset($_GET['temp1'])){
	echo '<script>window.alert("NO match found");</script>';
	//echo 'no match found';
	//echo '<script>("#para").css({"display":"block"});</script>';
}


?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
	<a class="navbar-brand" href="index.html">EMR</a>
    <div class="collapse navbar-collapse" id="navbarResponsive">
		<ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
			<li class="nav-item" data-toggle="tooltip" data-placement="right">
				<a class="nav-link" href="index.html">
					<i class="fa fa-fw fa-dashboard"></i>
					<span class="nav-link-text">Dashboard</span>
				</a>
			</li>
			<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Charts">
				<a class="nav-link" href="charts.html">
					<i class="fa fa-fw fa-area-chart"></i>
					<span class="nav-link-text">Charts</span>
				</a>
			</li>
			<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Tables">
				<a class="nav-link" href="table.html">
					<i class="fa fa-fw fa-table"></i>
					<span class="nav-link-text">Tables</span>
				</a>
			</li> 
        
			<li class="nav-item" data-toggle="tooltip" data-placement="right" title="upload">
				<a class="nav-link" href="patient.php">
					<i class="fa fa-fw fa-cloud-upload"></i>
					<span class="nav-link-text">upload</span>
				</a>
			</li>
			<li class="nav-item" data-toggle="tooltip" data-placement="top" title="Retrieve">
				<a class="nav-link" href="retrieve.php">
					<i class="fa fa-fw fa-cloud-download"></i>
					<span class="nav-link-text">Retrieve</span>
				</a>
			</li>
		</ul>
		<ul class="navbar-nav sidenav-toggler">
			<li class="nav-item">
				<a class="nav-link text-center" id="sidenavToggler">
					<i class="fa fa-fw fa-angle-left"></i>
				</a>
			</li>
		</ul>
		<ul class="navbar-nav ml-auto">
		<li>
		<p style="color:grey;padding-top:8px;">Hello <?php echo $_SESSION['username'] ?></p>
		</li>
		
		<li class="nav-item">
          <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
            <i class="fa fa-fw fa-sign-out"></i>Logout</a>
        </li>
		</ul>
     </div>
</nav>
  <div class="content-wrapper"   >
    <div class="container-fluid">
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">retrieve</li>
      </ol>
	<hr>
		<form  action="recordretrieve.php" class="form-group" method="post" enctype="multipart/form-data" >
		<div class="row">
		<div class="col-lg-6">
			<label><b>Select Disease*:</b></label>
			<input type="text" list="disease" name="disease" id="disease1" placeholder="disease name" class="form-control" required autocomplete="off">
				<datalist id="disease">	</datalist>
		</div>
		<div class="col-lg-6">	
			<label><b>Select specialist(optional):</b></label>
			<input list="specialist" name="specialist" id="specialist1" placeholder="specialist name" class="form-control" autocomplete="off">
				<datalist id="specialist"></datalist>
		</div>
		
	</div><br>
		<input type="submit" style="color:black" id="search" class="btn btn-default btn-lg btn-block" class="form-control" name="search" value="Search">
	
	</form>
	<h1>Recent records</h1>
	<div class="main" >
		<div class="row">

	<?php
	define('RDS_HOSTNAME', 'emr.c70lsjbmqhcp.us-east-2.rds.amazonaws.com');
	define('RDS_DB_NAME', 'hospital');
	define('RDS_USERNAME','phpmyadmin');
	define('RDS_PASSWORD','phpmyadmin');
	define('RDS_PORT','3306');
	$link = mysqli_connect(RDS_HOSTNAME,RDS_USERNAME,RDS_PASSWORD,RDS_DB_NAME,RDS_PORT) or
	die("Failed to connect to MySQL: " . mysql_error());
	$aadhaar=$_SESSION['aadhaar'];
	$recent='';
	$a=array();
	$i=0;
	$j=0;
	$b=array();
	$c=array();
	$d=array();

	$select= "SELECT MAX(date) As recent FROM patientrecords WHERE aadhaar='$aadhaar'";
	$result1 = mysqli_query($link, $select);	
	while($row1 =$result1->fetch_assoc()){	
		$recent=$row1['recent'];
	}	
	
	$select1= "SELECT * FROM patientrecords WHERE aadhaar='$aadhaar' AND date='$recent'";
		$result2 = mysqli_query($link, $select1);
		while($row =$result2->fetch_assoc()){	
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
							<h5>Disease Name:'.$b[$j].'</h5>
							<p>Record uploaded on:'.$d[$j].'</p>
							<p>specialist:'.$c[$j].'</p>
							<button id="button1"><a href="data:image/jpg;base64,'.$a[$j].'" download="'.$b[$j].'reports.jpg">download </a></button>
							
					</div>
				</div>';
			$j++;
		}
		
	
	?>
	</div>
 </div>
 
 </div>
 </div>
   <script src="./js/jquery.min.js"></script>
    <script src="./js/bootstrap.min.js"></script>
    <script src="./js/jquery.easing.min.js"></script>
    <script src="./js/wow.js"></script>
    <script src="./js/scripts.js"></script>
 
</body>

</html>
