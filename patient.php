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
</head>


<script language="javascript" type="text/javascript">

$(document).ready(function () {
    $(submit).click(function (e) {
	var errormsg1='PLEASE ENTER';
	if(($("#disease").val())=='')
	{	
		errormsg1=errormsg1+' \nThe disease name';
		$("#disease").css({"border-color":"red"});
	}
	
	if(($("#doctor_name").val())=='')
	{	
		errormsg1=errormsg1+'\nThe doctor_name';
		$("#doctor_name").css({"border-color":"red"});
	}
	if(($("#medicine_name").val())=='')
	{	
		errormsg1=errormsg1+'\nThe medicine_name';
		$("#medicine_name").css({"border-color":"red"});
		
	}
	if(($("#hospital_name").val())=='')
	{	
		errormsg1=errormsg1+'\nThe hospital';
		$("#hospital_name").css({"border-color":"red"});
		
	}
	if(($("#city_name").val())=='')
	{	
		errormsg1=errormsg1+'\nThe city_name';
		$("#city_name").css({"border-color":"red"});
		
	}
	if(($("#files").val())=='')
	{	
		errormsg1=errormsg1+'\nselect the reports';
		//$("#files").css({"border-color":"red"});
		$("p").show();
	}
	
	var res = errormsg1.replace("PLEASE ENTER","");
	if(res!='')
	{	
		alert(errormsg1);
		e.preventDefault();
		e.stopProgation();
	}	
	else{
			$("#disease").css({"border":"none"});
			$("#doctor_name").css({"border":"none"});
			$("#medicine_name").css({"border":"none"});
			$("#hospital_name").css({"border":"none"});
			$("#city_name").css({"border":"none"});
			
	}
		
		
	});
});


</script>
  
<body class="fixed-nav sticky-footer bg-dark" id="page-top">
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
			<li class="nav-item" data-toggle="tooltip" data-placement="right">
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
        
			<li class="nav-item" data-toggle="tooltip" data-placement="top" title="upload">
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
          <a class="nav-link" href="varshil.php">
            <i class="fa fa-fw fa-sign-out"></i>Logout</a>
        </li>
		</ul>
     </div>
</nav>
  <div class="content-wrapper" >
    <div class="container-fluid">
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">upload</li>
      </ol>
      <hr>
	   <h6>Note:</h6>
		<blockquote>
			<ul class="fa-ul">
				<li><i class="fa-li fa fa-check"></i>Please enter all details.</li>
				<li><i class="fa-li fa fa-check"></i>Mention all medicine names you are taking,for which you want to upload reports.</li>
				<li><i class="fa-li fa fa-check"></i>You can select multiple files.</li>
				<li><i class="fa-li fa fa-check"></i>Upload all reports of 1 particular disease.</li>
				<li><i class="fa-li fa fa-check"></i>Upload prescription given by the doctor.</li>
			</ul>
		</blockquote>
	  <form action="recordupload.php" class="form-group " method="post"  enctype="multipart/form-data">
		<label><b>Disease:</b></label><input type="text" id="disease" name="disease" class="form-control" placeholder=" Enter one disease name" required autofocus autocomplete="off"><br>
		<label><b>Specialist:</b></label><input type="text" id="specialist" name="specialist" class="form-control" placeholder="if any specialist then write type of specialist" autocomplete="off" ><br>
		<label><b>Doctor Name:</b></label><input type="text" class="form-control" id="doctor_name" name="doctor_name" placeholder=" Enter name of doctor from which you are consulting" required autocomplete="off"><br>
		<label><b>Medicine:</b></label><textarea class="form-control" rows="3" id="medicine_name" name="medicine_name" placeholder=" Enter medicine names" required></textarea><br>
		<label><b>Hospital/Clinic Name:</b></label><input type="text" class="form-control" id="hospital_name" name="hospital_name" placeholder=" Enter hospital or clinic name" required autocomplete="off"><br>
		<label><b>City</b></label><input type="text" class="form-control" id="city_name" name="city_name" placeholder=" Enter city of hospital or clinic " required autocomplete="off"><br>
		<label><b>Select files:</b></label><br><input type="file" id="files"  multiple="multiple" name="file[]" accept="image/jpeg" required><br>
		<p class="text-danger">The file has to be in the jpg format.</p>
		<p class="text-danger" style="display:none">please select the files.</p>
		<input type="submit" style="color:black" class="btn btn-default btn-lg btn-block" name="submit" id="submit" value="Submit">
		</form>
						
	</div>
 </div>
   <script src="./js/jquery.min.js"></script>
    <script src="./js/bootstrap.min.js"></script>
    <script src="./js/jquery.easing.min.js"></script>
    <script src="./js/wow.js"></script>
    <script src="./js/scripts.js"></script>
 
</body>

</html>
