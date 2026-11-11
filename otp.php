<!DOCTYPE html>
<?php include 'includes/check_reply.php'; ?>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>OES OTP Login Form</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link href="assets/css/snack.css" rel="stylesheet" type="text/css"/>
<style type="text/css">
	.login-form {
		width: 340px;
    	margin: 100px auto;
		border-radius: 10px;
	}
    .login-form form {
    	margin-bottom: 15px;
        background: #f7f7f7;
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        padding: 30px;
    }
    .login-form h2 {
        margin: 0 0 15px;
    }
    .form-control, .btn {
        min-height: 38px;
        border-radius: 2px;
    }
    .btn {        
        font-size: 15px;
        font-weight: bold;
    }
body {
  background-image: url('color.png');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: cover;
}
}
</style>
</head>
<body  <?php if ($ms == "1") { print 'onload="myFunction()"'; }?>>

<div class="login-form">
	
    <form  method="post">
        <h2 class="text-center"><b>OTP Verification</b></h2>       
        <div class="form-group text1">
            <input type="text" id="email" class="form-control" placeholder="Email" required="required">			<span id="email_error" class="field_error"></span>
        </div>
        <div class="form-group btn1" >
            <button type="button" class="btn btn-primary btn-block" onclick="send_otp()">Send OTP</button>
        </div>
        <div class="form-group text2" >
            <input type="text" id="otp" class="form-control" placeholder="OTP" required="required">			<span id="otp_error" class="field_error"></span>
        </div>
        <div class="form-group btn2" >
            <button type="button" class="btn btn-primary btn-block" onclick="submit_otp()">Submit OTP</button>
        </div>       
    </form>
</div><script>function send_otp(){	var email=jQuery('#email').val();	jQuery.ajax({		url:'send_otp.php',		type:'post',		data:'email='+email,		success:function(result){			if(result=='yes'){;
				jquery(".btn1").hide();
				jQuery(".text1").hide();
				jQuery(".btn2").show();
				jQuery(".text2").show();										}			if(result=='not_exist'){
				jQuery('#email_error').html('Please enter valid email');
			}		}	});}function submit_otp(){
	var otp=jQuery('#otp').val();
	var email=jQuery('#email').val();
	jQuery.ajax({
		url:'check_otp.php',
		type:'post',
		data:'otp='+otp,
		success:function(result){
			if(result=='yes'){
				window.location='login.php';
			}
			if(result=='not_exist'){
				jQuery('#otp_error').html('Please enter valid otp');
			}
		}
	});
}</script><style>.second_box{display:none;}.field_error{color:red;}</style>
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
</body>
</html>                                		                            