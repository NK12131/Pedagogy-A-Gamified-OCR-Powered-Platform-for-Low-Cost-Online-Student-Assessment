<!DOCTYPE html>
<?php 
include 'includes/check_reply.php'; 
include 'database/config.php';
?>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>


<link rel="stylesheet" href="login.css">
<title>OES | Login</title>
</head>
<body <?php if ($ms == "1") { print 'onload="myFunction()"'; }?>  class="page-login">
<div class="login-form">
    <div class="container">
        <form  method="post">
            <h2 class="text-center">Login</h2>
            <div class="avatar"><i class="fa fa-user-circle-o" aria-hidden="true"></i></div>   
            <div class="form-group text1">
            <input type="text" id="email" class="form-control" placeholder="Email" name="email" required="required">
			<span id="email_error" class="field_error"></span>
			</div>
            <div class="form-group">
                <input type="password" class="form-control" name="login" placeholder="Password" required="required">
            </div>        

		
			<div class="form-group btn1" >
				<button type="button" class="btn btn-primary btn-block" onclick="send_otp()">Send OTP</button>
			</div>
			<div class="form-group text2" >
				<input type="text" id="otp" class="form-control" placeholder="OTP" required="required">
				<span id="otp_error" class="field_error"></span>
			</div>
			<div class="form-group btn2" >
				<button type="button" class="btn btn-primary btn-block" onclick="submit_otp()">Submit OTP</button>
			</div>       
				<p><a href="forgot_pw.php">Forgot Password?</a></p>
			</form>
        
    </div>
</div>
<?php if ($ms == "1") {
?> <div class="alert alert-success" id="snackbar"><?php echo "$description"; ?></div> <?php	
}else{
	
}
?>
        		<script>
function myFunction() {
    var x = document.getElementById("snackbar")
    x.className = "show";
    setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
}
</script>
<script>
function send_otp(){
	var email=jQuery('#email').val();
	jQuery.ajax({
		url:'send_otp.php',
		type:'post',
		data:'email='+email,
		success:function(result){
			if(result=='yes'){;
				jquery(".btn1").hide();
				jQuery(".text1").hide();
				jQuery(".btn2").show();
				jQuery(".text2").show();							
			}
			if(result=='not_exist'){
				jQuery('#email_error').html('Please enter valid email');
			}
		}
	});
}

function submit_otp(){
	var otp=jQuery('#otp').val();
	jQuery.ajax({
		url:'check_otp.php',
		type:'post',
		data:'otp='+otp,
		success:function(result){
			if(result=='yes'){
				window.location='authentication.php'
			}
			if(result=='not_exist'){
				jQuery('#otp_error').html('Please enter valid otp');
			}
		}
	});
}
</script>
<style>
.second_box{display:none;}
.field_error{color:red;}
</style>
</body>
</html>