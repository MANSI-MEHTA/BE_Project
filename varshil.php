<?php
session_start();
session_unset();
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>EMR</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/bootstrap.min.css" />
    <link rel="stylesheet" href="./css/animate.min.css" />
    <link rel="stylesheet" href="./css/ionicons.min.css" />
    <link rel="stylesheet" href="./css/styles.css" />
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	
 
  </head>
 <script language="javascript" type="text/javascript">

$(document).ready(function() {
  $('#myCarousel_text1').carousel({
    pause: false,
  });
});

function close_myModalp(){	
	$('#myModalps').modal('toggle');
	$('#myModalps').modal('show');
	$('#myModalp').modal('hide');
	$("#patient_name_s").focus();
		
}
function close_myModalps(){	
	$('#myModalp').modal('toggle');
	$('#myModalp').modal('show');
	$('#myModalps').modal('hide');
	$("#patient_aadhaar_l").focus();
		
	}
function close_myModald(){	
	$('#myModalds').modal('toggle');
	$('#myModalds').modal('show');
	$('#myModald').modal('hide');
	
}
function close_myModalds(){	
	$('#myModald').modal('toggle');
	$('#myModald').modal('show');
	$('#myModalds').modal('hide');
	
}

$(document).ready(function () {
    $(anchorp1).click(function () {
		$("#anchorp1").css({"color":"red"});
		$("#anchorps1").css({"color":"white"});
		$("#anchorp1").css({"border-bottom-color":"red"});
		$("#anchorps1").css({"border-bottom-color":"none"});
		$("#anchorp1").css({"text-decoration":"underline"});
		$("#anchorps1").css({"text-decoration":"none"});
		$("#anchorp1").css({"text-decoration-position":"under"});
		
		});
});
$(document).ready(function () {
    $(anchorps1).click(function () {
		$("#anchorps2").css({"color":"red"});
		$("#anchorp2").css({"color":"white"});
		$("#anchorps2").css({"border-bottom-color":"red"});
		$("#anchorp2").css({"border-bottom-color":"none"});
		$("#anchorps2").css({"text-decoration":"underline"});
		$("#anchorp2").css({"text-decoration":"none"});
		$("#anchorps2").css({"text-decoration-position":"under"});
		$("#patient_name_s").focus();
			
		});
});
$(document).ready(function () {
    $(anchorp2).click(function () {
		$("#anchorp1").css({"color":"red"});
		$("#anchorps1").css({"color":"white"});
		$("#anchorp1").css({"border-bottom-color":"red"});
		$("#anchorps1").css({"border-bottom-color":"none"});
		$("#anchorp1").css({"text-decoration":"underline"});
		$("#anchorps1").css({"text-decoration":"none"});
		$("#anchorp1").css({"text-decoration-position":"under"});
		$("#patient_aadhaar_l").focus();
		
		});
});
$(document).ready(function () {
    $(anchorps2).click(function () {
		$("#anchorps2").css({"color":"red"});
		$("#anchorp2").css({"color":"white"});
		$("#anchorps2").css({"border-bottom-color":"red"});
		$("#anchorp2").css({"border-bottom-color":"none"});
		$("#anchorps2").css({"text-decoration":"underline"});
		$("#anchorp2").css({"text-decoration":"none"});
		$("#anchorps2").css({"text-decoration-position":"under"});
		$("#patient_name_s").focus();
		
		});
});

$(document).ready(function () {
    $(sendotp).click(function (e) {
		
	var errormsg1='PLEASE ENTER';
	if(($("#patient_name_s").val())=='')
	{	
		errormsg1=errormsg1+' \nThe full name';
		$("#patient_name_s").css({"border-color":"red"});
	}
	
	if(($("#patient_mobile").val())=='')
	{	
		errormsg1=errormsg1+'\nThe Mobile Number';
		$("#patient_mobile").css({"border-color":"red"});
	}
	if(($("#patient_aadhaar_s").val())=='')
	{	
		errormsg1=errormsg1+'\nThe aadhaar number';
		$("#patient_aadhaar_s").css({"border-color":"red"});
		
	}
	if(($("#patient_pswd_s").val())=='')
	{	
		errormsg1=errormsg1+'\nThe password';
		$("#patient_pswd_s").css({"border-color":"red"});
		
	}
	var res = errormsg1.replace("PLEASE ENTER","");
	if(res!='')
	{	
		alert(errormsg1);
		e.preventDefault();
		e.stopProgation();
	}	
	else{
			$("#patient_mobile").css({"border":"none"});
			$("#patient_name_s").css({"border":"none"});
			$("#patient_aadhaar_s").css({"border":"none"});
			$("#patient_pswd_s").css({"border":"none"});
	
	}
		$(textotp).show();
		$("label").show();
		$(patient_verifyotp).show();
		$(sendotp).hide();
		$(resendotp).show();
		var patient_mobile=$("#patient_mobile").val();
		$.ajax({
			type: 'POST',
			url: 'demo.php',
			data: {patient_mobile:patient_mobile},
			success: function(data) {
			alert(data);
			}
		});
	});
});
$(document).ready(function () {
    $(resendotp).click(function () {
		$(textotp).val('');
		$(textotp).focus();
		
		var patient_mobile=$("#patient_mobile").val();
		$.ajax({
			type: 'POST',
			url: 'demo.php',
			data: {patient_mobile:patient_mobile},
			success: function(data) {
			alert(data);
			}
		});
	});
});
$(document).ready(function () {
    $(patient_verifyotp).click(function (event) {
		if(($("#textotp").val())==''){	
			alert("PLEASE ENTER THE OTP");
			$("#textotp").focus();
			event.preventDefault();
			event.stopProgation();
		}
		var patient_mobile=$("#patient_mobile").val();
		var patient_aadhaar_s=$("#patient_aadhaar_s").val();
		var patient_name_s=$("#patient_name_s").val();
		var patient_pswd_s=$("#patient_pswd_s").val();
		var textotp=$("#textotp").val();
		
		$.ajax({
			type: 'POST',
			url: 'otp.php',
			data: {textotp:textotp,patient_aadhaar_s:patient_aadhaar_s,patient_mobile:patient_mobile,patient_name_s:patient_name_s,patient_pswd_s:patient_pswd_s},
			success: function(data) {
			var result=1;
			if(data==1){
				alert("you have successfully logged in");
				//patientpage();
				
			}
			else if(data==-1){
				alert("Already have account");
				/*$('#myModalp').modal('toggle');
				$("#myModalp").modal('show');
				$("#myModalps").modal('hide');
				$("#patient_aadhaar_l").val('');
				$("#patient_aadhaar_l").focus();
				$("#labelnewpswd").hide();
				$("#remember").show();
				event.preventDefault();
				event.stopProgation();
				*/
				
			}
			else if(data==2){
				alert("Error while inserting");
			
				
			}
			else{
				alert("Invalid otp");
				/*$("#myModalps").modal('toggle');
				$("#myModalps").modal('show');
				$("#textotp").val('');
				$("#textotp").focus();
				event.preventDefault();
				event.stopProgation();
		*/
				
			}
			}
		});
				
	});
});

/*
function patientvalidateform(){
	if(document.getElementById("patient_name_s").value=="")
	{	
		document.getElementById("patient_name_s").style.borderColor="red";
		
	}
	
	if(document.getElementById("patient_mobile").value=="")
	{	
		document.getElementById("patient_mobile").style.borderColor="red";
		
	}
	if(document.getElementById("patient_aadhaar_s").value=="")
	{	
		document.getElementById("patient_aadhaar_s").style.borderColor="red";
		
	}
	if(document.getElementById("patient_pswd_s").value=="")
	{	
		document.getElementById("patient_pswd_s").style.borderColor="red";
		
	}
	
	
	
}
*/
$(document).ready(function () {
    $(login).click(function (e4) {
		var errormsg1='PLEASE ENTER';
		if(($("#patient_aadhaar_l").val())=='')
		{	
			errormsg1=errormsg1+' \nThe Aadhaar number';
			$("#patient_aadhaar_l").css({"border-color":"red"});
		}
	
		if(($("#patient_pswd_l").val())=='')
		{	
			errormsg1=errormsg1+'\nThe password';
			$("#patient_pswd_l").css({"border-color":"red"});
		}
		var res = errormsg1.replace("PLEASE ENTER","");
		if(res!='')
		{	
			alert(errormsg1);
			e4.preventDefault();
			e4.stopProgation();
		}	
		else{
			$("#patient_aadhaar_l").css({"border":"none"});
			$("#patient_pswd_l").css({"border":"none"});
	
		}
		var patient_aadhaar_l=$("#patient_aadhaar_l").val()
		var patient_pswd_l=$("#patient_pswd_l").val();
		var use='authentication';
		$.ajax({
			type: 'POST',
			url: 'login.php',
			data: {patient_aadhaar_l:patient_aadhaar_l,patient_pswd_l:patient_pswd_l,use:use},
			success: function(data) {
				if(data==1){
					alert("You have successfully logged in");
					patientpage();
					
					
				}
				else{
					alert("Invalid password or aadhaar number.Please try again");
					$("#patient_aadhaar_l").val('');
					$("#patient_aadhaar_l").focus();
					$("#patient_pswd_l").val('');
					e4.preventDefault();
					e4.stopProgation();
					
					
				}
			}
	
		});
});
});

$(document).ready(function () {
    $(forgot).click(function (e1) {
		
		var patient_aadhaar_l=$("#patient_aadhaar_l").val().length;
		var patient_aadhaar=$("#patient_aadhaar_l").val();
		if(patient_aadhaar_l==0){
			alert("please enter aadhaar no.");
			$("#patient_aadhaar_l").focus();
			e1.preventDefault();
			e1.stopProgation();
		}
		$.ajax({
			type: 'POST',
			url: 'doctordemo.php',
			data: {patient_aadhaar:patient_aadhaar},
			success: function(data) {
				if(data==0){
					alert("Enter valid aadhaar number");
					$("#patient_aadhaar_l").val('');
					$("#patient_aadhaar_l").focus();
					e1.preventDefault();
					e1.stopProgation();
				
						
			}
			else {
				alert("THE OTP is sent to equivalent mobile number");
				$("#textpswd").show();
				$("label").show();
				$("#patient_verifypswd").show();
				$("#login").hide();
				$("#forgot").hide();
				$("#remember").hide();
				$("#resendpswd").show();
				$("#labelpswd").hide();
				$("#patient_pswd_l").hide();
				$("#labelnewpswd").hide();
				$("#patient_new_pswd").hide();
				$("#change").hide();
				$("#textpswd").focus();
				
		    }

			}
		});
	});
});

$(document).ready(function () {
    $(patient_verifypswd).click(function (e2) {
		if(($("#textpswd").val())==''){	
			alert("PLEASE ENTER THE OTP");
			$("#textpswd").focus();
			e2.preventDefault();
			e2.stopProgation();
		}
		var textpswd=$("#textpswd").val();
		
		$.ajax({
			type: 'POST',
			url: 'doctorotp.php',
			data: {textpswd:textpswd},
			success: function(data) {
			if(data==0){
				
				alert("Invalid OTP");
				//$("#myModalp").modal('toggle');
				//$("#myModalp").modal('show');
				$("#textpswd").val('');
				$("#textpswd").focus();
				e2.preventDefault();
				e2.stopProgation();
		
			}
			else{
				alert("now enter new password");
				$("#labelnewpswd").show();
				$("#patient_new_pswd").show();
				$("#patient_verifypswd").hide();
				$("#change").show();
				$("#resendpswd").hide();
				$("#patient_new_pswd").focus();
				
				
			}
			}
		});
				
	});
});
$(document).ready(function () {
    $(change).click(function (e3) {
		if(($("#patient_new_pswd").val())==''){	
			alert("PLEASE ENTER THE password");
			$("#patient_new_pswd").focus();
			e3.preventDefault();
			e3.stopProgation();
		}
		var patient_new_pswd=$("#patient_new_pswd").val();
		var patient_aadhaar_l=$("#patient_aadhaar_l").val();
		
		
		$.ajax({
			type: 'POST',
			url: 'insertpassword.php',
			data: {patient_new_pswd:patient_new_pswd,patient_aadhaar_l:patient_aadhaar_l},
			success: function(data) {
				alert(data);
				patientpage();
				
			}
		});
				
	});
});
function patientpage(){
	window.open("patient.php","_self",false);			
}
$(document).ready(function () {
    $(resendpswd).click(function () {
		$(textpswd).val('');
		$(textpswd).focus();
		
		var patient_aadhaar=$("#patient_aadhaar_l").val();
		$.ajax({
			type: 'POST',
			url: 'doctordemo.php',
			data: {patient_aadhaar:patient_aadhaar},
			success: function(data) {
			alert("otp is resend to you");
			}
		});
	});
});
function doctorvalidateform(){
	if(document.getElementById("doctor_name_s").value=="")
	{	
		document.getElementById("doctor_name_s").style.borderColor="red";
		
	}
	
	if(document.getElementById("doctor_mobile").value=="")
	{	
		document.getElementById("doctor_mobile").style.borderColor="red";
		
	}
	if(document.getElementById("doctor_aadhaar_s").value=="")
	{	
		document.getElementById("doctor_aadhaar_s").style.borderColor="red";
		
	}
	if(document.getElementById("doctor_pswd_s").value=="")
	{	
		document.getElementById("doctor_pswd_s").style.borderColor="red";
		
	}
}
function myfunction1() {
	var x=document.getElementById("patient_name_s");
	x.value=x.value.toUpperCase();
	
}
function myfunction2() {
	var x=document.getElementById("doctor_name_s");
	x.value=x.value.toUpperCase();
	
}
/*$(document).ready(function () {
    $(patient_mobile).blur(function () {
		var patient_mobile=$("#patient_mobile").val().length;
		if(patient_mobile!=10)
		{
			alert("please enter valid mobile number");
			$("#patient_mobile").val('');
			
		}
		
	});
});
$(document).ready(function () {
    $(patient_aadhaar_s).blur(function () {
		var patient_aadhaar_s=$("#patient_aadhaar_s").val().length;
		if(patient_aadhaar_s!=12)
		{
			alert("please enter valid aadhaar number");
			$("#patient_aadhaar_s").val('');
			//$("#patient_aadhaar_s").focus();
			
		}
		
	});
});
 function check_p_mobile_length(){
	var z=document.getElementById("patient_mobile").value
	if(z.length < "10")
	{
		window.alert("please enter valid number");
			document.getElementById("patient_mobile").value="";
	
	}	
	
}
function check_d_mobile_length(){
	var z=document.getElementById("doctor_mobile").value
	if(z.length < "10")
	{
		window.alert("please enter valid number");
		document.getElementById("doctor_mobile").value="";
	}	
}

 function check_p_aadhaar_length(){
	var z=document.getElementById("patient_aadhaar_s").value
	if(z.length < "12")
	{
		window.alert("please enter valid number");
		document.getElementById("patient_aadhaar_s").value="";
		return false;
	}	
}
function check_p_password_length(){
	var z=document.getElementById("patient_pswd_s").value
	if(z.length < "8")
	{
		window.alert("please enter minimum 8 character");
		document.getElementById("patient_pswd_s").value="";
	}	
}
function check_d_aadhaar_length(){
	var z=document.getElementById("doctor_aadhaar_s").value
	if(z.length < "12")
	{
		window.alert("please enter valid number");
		document.getElementById("doctor_aadhaar_s").value="";
	}	
}
function check_d_password_length(){
	var z=document.getElementById("doctor_pswd_s").value
	if(z.length < "8")
	{
		window.alert("please enter minimum 8 character");
		document.getElementById("doctor_pswd_s").value="";
	}	
} */
	 
</script>
  <body>

 <nav id="topNav" class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                
            </div>
            <div class="navbar-collapse collapse" id="bs-navbar">
                <ul class="nav navbar-nav">
					<li>
						<a class="page-scroll" href="#first">Access</a>
					</li>
                    <li>
                        <a class="page-scroll" href="#one">Login</a>
                    </li>
                   <li>
                        <a class="page-scroll" href="#four">Features</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#last">Contact</a>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a class="page-scroll" data-toggle="modal" title="A free Bootstrap video landing theme" href="#aboutModal">About</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <header class="bg-primary" id="first">
        <div class="header-content">
            <div class="inner">
						<h1 style="color: white;">Now you can Access  your Records from</h1>
						<div id="myCarousel_text1" class="carousel slide" data-ride="carousel" >
							<div class="carousel-inner" >
								<div class="item active"> 
									<h1 style="color: white;">Work</h1>
								</div>

								<div class="item" >
									<h1 style="color: white">home</h1>
								</div>
    
								<div class="item" >
									<h1 style="color:white">anywhere</h1>
								</div>
							</div>
						</div>
                <p style="font-size: 25px">
				<span>krfker kmfemkmfrmfmdsmkmkskm fkms</span>
				<span>klkflmksmgklgmg</span>
				<span>ofjlfemvjlenk;mk;mk;mc;kmk;mcfk;mmvk;mfvmfkvmdvfejn</span></p>
				&nbsp; 
				<a href="#one" class="btn btn-primary btn-xl page-scroll">Get Started</a>
            </div>
        </div>
        
    </header>
    <section class="bg-success" id="one">
        <div class="container">
            <div class="row" >
			<h2 class="text-center" style="color: green;">Choose Account Type</h2>
					<div class="col-xs-3"></div>
					<div class="col-xs-3">
						<div class="thumbnail"  >
							<a href="#myModald" class="text-center" data-toggle="modal" >
								<img src="doctor.jpg" alt="Doctor"  class="img-responsive" id="doctor_img" style="width:100%">
									<div class="caption">
										<p>Doctor</p>
									</div>
							</a>
						</div>
					</div>
					<div class="col-xs-3">	
						<div class="thumbnail" >
							<a href="#myModalp"  class="text-center" data-toggle="modal">
								<img src="patient.png" alt="patient"  class="img-responsive" id="patient_img" style="width:100%">
									<div class="caption">
										<p>Patient</p>
									</div>
							</a>
						</div>
					</div>
                
            </div>
        </div>
    </section>
    
	<div class="modal  fade" id="myModalp"  >
		
					<div class="modal-dialog">
						<div class="modal-content">
						<div class="modal-header"  style="max-height:12%">
						
							<button type="button" class="close" style="color:white" data-dismiss="modal">&times;</button>
							<ul class="list-inline">
							<li >
							<a href="javascript:close_myModalps()" data-toggle="modal" style="color:red;" id="anchorp1" class="btn" class="modal-title">login</a>
							</li>
							<li>/</li>
							<li >
							<a href="javascript:close_myModalp();" data-toggle="modal" style="color:white;" id="anchorps1" class="btn"  class="modal-title">signup</a>
							</li>
							</ul>
							
						</div>
						
						<div class="modal-body" >
						<form name="login_patient" class="form-group" method="post" id="login_patient">
							<label >Aadhaar No:</label><input type="number" name="patient_aadhaar_l" id="patient_aadhaar_l" class="form-control" placeholder=" Enter Aadhaar No." required autofocus autocomplete="on"><br>
							<label id="labelpswd">Password:</label><input type="password" name="patient_pswd_l" id="patient_pswd_l" class="form-control" placeholder=" Enter password" required><br>
							<div class="checkbox" id="remember">
								<label><input type="checkbox" name="remember" > Remember me</label>
								<input type="button" id="forgot" style="padding-bottom:5%;font-size:20px;background:none;border:none;color:purple;"  class="pull-right" value="forgot password?">
							</div>
							<input type="button" id="login" class="btn btn-default btn-lg btn-block" class="form-control" value="Login">
							<label style="display:none;">Enter OTP</label>
							<input type="number" name="textpswd" style="display:none;" id="textpswd" class="form-control" placeholder="please Enter 5 letter otp here to verify" required ><br>
							<label id="labelnewpswd" style="display:none;">Enter new Password:</label><input type="text" name="patient_new_pswd" id="patient_new_pswd" style="display:none;" class="form-control" placeholder=" Enter Aadhaar No." required autofocus autocomplete="on"><br>
							<a href="#" id="resendpswd"  style="display:none;padding-bottom:2%" class="pull-right">Resend?</a>
							<input type="submit" class="btn btn-default btn-lg btn-block" style="display:none;" id="patient_verifypswd" name="patient_verifypswd" value="verify">
							<input type="button" class="btn btn-default btn-lg btn-block" style="display:none;" id="change" value="change">
							
						</form>
						</div>
						
					</div>
      
				</div>
				
			</div>
			
	    <div class="modal modal-tall fade" id="myModalps" >
					<div class="modal-dialog">
						<div class="modal-content">
        				<div class="modal-header"  style="max-height:9%" >
							<button type="button" class="close" style="color:white" data-dismiss="modal">&times;</button>
							<ul class="list-inline">
							<li >
							<a href="javascript:close_myModalps();" dada-toggle="modal" class="btn" id="anchorp2" style="color:white;"  class="modal-title">login</a>
							</li>
							<li>/</li>
							<li >
							<a href="javascript:close_myModalp();" data-toggle="modal" class="btn" id="anchorps2" style="color:white;"  class="modal-title">signup</a>
							</li>
							</ul>
						</div>
					<div class="modal-body" >
						<form  name="register_patient" class="form-group" method="post"  >
							<label>Full Name</label>
							<input type="text" name="patient_name_s" id="patient_name_s" class="form-control" placeholder=" Enter Full name" onblur="myfunction1()" required autofocus autocomplete="on"><br>
							<label>Mobile No:</label>
							<input type="number" name="patient_mobile" id="patient_mobile" class="form-control" placeholder=" Enter mobile No."  required ><br>
							<label>Aadhaar No:</label>
							<input type="number" name="patient_aadhaar_s" id="patient_aadhaar_s" class="form-control" placeholder=" Enter Aadhaar No." required ><br>
							<label>Password:</label>
							<input type="password" name="patient_pswd_s" id="patient_pswd_s" class="form-control" placeholder=" Enter password" required><br>
							<input type="submit" class="btn btn-default btn-lg btn-block" name="sendotp" id="sendotp" value="SEND OTP">
							<label style="display:none;">Enter OTP</label>
							<input type="number" name="textotp" style="display:none;" id="textotp" class="form-control" placeholder="please Enter 5 digit otp here to verify" required ><br>
							<a href="#" id="resendotp"  style="display:none;padding-bottom:2%" class="pull-right">Resend?</a>
							<input type="submit" class="btn btn-default btn-lg btn-block" style="display:none;" id="patient_verifyotp" name="patient_verifyotp" value="verify">
																				
						</form>


						</div>
					</div>
				</div>
			</div>	
	    			
    <div class="modal  fade" id="myModald" style="max-height:70%">
					<div class="modal-dialog">
						<div class="modal-content">
        				<div class="modal-header" style="max-height:12%" >
							<button type="button" class="close" style="color:white" data-dismiss="modal">&times;</button>
							<ul class="list-inline">
							<li>
							<a href="javascript:close_myModalds()" data-toggle="modal" style="color:white;"  class="btn" class="modal-title">login</a>
							</li>
							<li>/</li>
							<li>
							<a href="javascript:close_myModald();" data-toggle="modal" style="color:white;" class="btn"  class="modal-title">signup</a>
							</li>
							</ul>
						</div>
						<div class="modal-body" >
						<form name="login_doctor" class="form-group" method="post">
							<label>Aadhaar No:</label><input type="number" name="doctor_aadhaar_l"  class="form-control" placeholder=" Enter Aadhaar No." autofocus required autocomplete="on"><br>
							<label>Password:</label><input type="password" name="doctor_pswd_l"  class="form-control" placeholder=" Enter password" required><br>
							<div class="checkbox">
								<label><input type="checkbox" name="remember"> Remember me</label>
							</div>
							<button type="submit" class="btn btn-default btn-lg btn-block">Login</button>
						</form>
						</div>
						
					</div>
      
				</div>
			</div>
			
	    <div class="modal modal-tall fade" id="myModalds" >
					<div class="modal-dialog">
						<div class="modal-content">
        				<div class="modal-header"  style="max-height:9%">
							<button type="button" class="close" style="color:white" data-dismiss="modal">&times;</button>
							<ul class="list-inline">
							<li>
							<a href="javascript:close_myModalds();" dada-toggle="modal" class="btn" style="color:white;"  class="modal-title">login</a>
							</li>
							<li>/</li>
							<li>
							<a href="javascript:close_myModald();" data-toggle="modal" class="btn" style="color:white;"  class="modal-title">signup</a>
							</li>
							</ul>
						</div>
						<div class="modal-body" >
						<form name="register_doctor" class="form-group" method="post" onSubmit=" return doctorvalidateform()">
							<label>Full Name</label><input type="text" name="doctor_name_s" id="doctor_name_s" class="form-control" placeholder=" Enter Full name" onblur="myfunction2()" required autofocus autocomplete="on"><br>
							<label>Mobile No:</label><input type="number" name="doctor_mobile" id="doctor_mobile" class="form-control" placeholder=" Enter mobile No."  required autocomplete="on"><br>
							<label>Aadhaar No:</label><input type="number" name="doctor_aadhaar_s" id="doctor_aadhaar_s" class="form-control" placeholder=" Enter Aadhaar No." required autocomplete="on"><br>
							<label>Password:</label><input type="password" name="doctor_pswd_s" id="doctor_pswd_s" class="form-control" placeholder=" Enter password" required><br>
							<label>confirmed password:</label><input type="password" name="doctor_cpswd_s" id="doctor_cpswd_s" class="form-control" placeholder="Re-enter password" required autocomplete="on"><br>
							
							<button type="submit" class="btn btn-default btn-lg btn-block">signup</button>
						</form>
						</div>
						
					</div>
      
				</div>
			</div>		
	
	
    <section class="container-fluid" id="four">
        <div class="row">
            <div class="col-xs-10 col-xs-offset-1 col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
                <h2 class="text-center text-primary">Features</h2>
                <hr>
                <div class="media wow fadeInRight">
                    <h3>Simple</h3>
                    <div class="media-body media-middle">
                        <p>What could be easier? upload file with just one click.</p>
                    </div>
                    <div class="media-right">
                        <i class="icon-lg ion-ios-bolt-outline"></i>
                    </div>
                </div>
                <hr>
                <div class="media wow fadeIn">
                    <h3>Free</h3>
                    <div class="media-left">
                        <a href="#alertModal" data-toggle="modal" data-target="#alertModal"><i class="icon-lg ion-ios-cloud-download-outline"></i></a>
                    </div>
                    <div class="media-body media-middle">
                        <p>Yes, whatever you upload download its completely free. </p>
                    </div>
                </div>
                <hr>
                <div class="media wow fadeInRight">
                    <h3>Unique</h3>
                    <div class="media-body media-middle">
                        <p>Your account is linked with Aadhaar number.This is the very unique and unpopular feature.</p>
                    </div>
                    <div class="media-right">
                        <i class="icon-lg ion-ios-snowy"></i>
                    </div>
                </div>
                <hr>
                <div class="media wow fadeIn">
                    <h3>Safe</h3>
                    <div class="media-left">
                        <i class="icon-lg ion-ios-heart-outline"></i>
                    </div>
                    <div class="media-body media-middle">
                        <p>Your files and credential are safely store in the database,keeping very very low chances of being hacked.</p>
                    </div>
                </div>
                <hr>
                <div class="media wow fadeInRight">
                    <h3>Tested</h3>
                    <div class="media-body media-middle">
                        <p>Tested by many Experienced people,now its time you use it. </p>
                    </div>
                    <div class="media-right">
                        <i class="icon-lg ion-ios-flask-outline"></i>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="last" class="bg-dark">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center">
                    <h2 class="margin-top-0 wow fadeIn">Get in Touch</h2>
                    <hr class="primary">
                    <p>We love feedback. Fill out the form below and we'll get back to you as soon as possible.</p>
                </div>
                <div class="col-lg-10 col-lg-offset-1 text-center">
                    <form class="contact-form row">
                        <div class="col-md-4">
                            <label></label>
                            <input type="text" class="form-control" placeholder="Name">
                        </div>
                        <div class="col-md-4">
                            <label></label>
                            <input type="text" class="form-control" placeholder="Email">
                        </div>
                        <div class="col-md-4">
                            <label></label>
                            <input type="text" class="form-control" placeholder="Phone">
                        </div>
                        <div class="col-md-12">
                            <label></label>
                            <textarea class="form-control" rows="9" placeholder="Your message here.."></textarea>
                        </div>
                        <div class="col-md-4 col-md-offset-4">
                            <label></label>
                            <button type="button" data-toggle="modal" data-target="#alertModal" class="btn btn-primary btn-block btn-lg">Send <i class="ion-android-arrow-forward"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <footer id="footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-6 col-sm-3 column">
                    <h4>Information</h4>
                    <ul class="list-unstyled">
                        <li><a href="">Services</a></li>
                        <li><a href="">Benefits</a></li>
                        <li><a href="">Developers</a></li>
                    </ul>
                </div>
                <div class="col-xs-6 col-sm-3 column">
                    <h4>About</h4>
                    <ul class="list-unstyled">
                        <li><a href="#">Contact Us</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a href="#">Terms &amp; Conditions</a></li>
                    </ul>
                </div>
                <div class="col-xs-12 col-sm-3 column">
                    <h4>Stay Posted</h4>
                    <form>
                        <div class="form-group">
                          <input type="text" class="form-control" title="No spam, we promise!" placeholder="Tell us your email">
                        </div>
                        
                    </form>
                </div>
                <div class="col-xs-12 col-sm-3 text-right">
                    <h4>Follow</h4>
                    <ul class="list-inline">
                      <li><a rel="nofollow" href="" title="Twitter"><i class="icon-lg ion-social-twitter-outline"></i></a>&nbsp;</li>
                      <li><a rel="nofollow" href="" title="Facebook"><i class="icon-lg ion-social-facebook-outline"></i></a>&nbsp;</li>
                    </ul>
                </div>
            </div>
            <br/>
            
        </div>
    </footer>
    
    <div id="aboutModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" style="max-height:60%">
        <div class="modal-dialog">
        <div class="modal-content">
        	<div class="modal-body">
        		<h2 class="text-center">EMR</h2>
        		<h5 class="text-center">
						Electronic Medical Healthcare Records.
					</h5>
        		<p class="text-justify">
				           dmesjdmlksrmfklmrklmfgdlmgmdmgm.
				             lkmgdmgmdmgdmfkmmdlkmdlmklmklmmkmgmlmlgmklmdmlmklg.
				         mgdmglmtgmmktmmkltmkglmkmgmkdgmkmmg.
				          gmlkgmkldmgmdtmgtklmgtrgmmtmgtrkm.
        		</p>
        		<br/>
        		<button class="btn btn-primary btn-lg center-block" data-dismiss="modal" aria-hidden="true"> OK </button>
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