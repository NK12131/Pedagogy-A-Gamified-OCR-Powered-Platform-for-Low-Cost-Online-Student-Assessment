<!DOCTYPE html>
<?php include 'includes/check_reply.php'; ?>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<link href="assets/css/snack.css" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" href="login.css">
<title>OES | Login</title>
</head>
<body <?php if ($ms == "1") { print 'onload="myFunction()"'; }?>  class="page-login">
<div class="login-form">
    <div class="container">
        <form action="pages/authentication.php" method="post">
            <h2 class="text-center">Login</h2>
            <div class="avatar"><i class="fa fa-user-circle-o" aria-hidden="true"></i></div>   
            <div class="form-group has-error">
                <input type="text" class="form-control" name="user" placeholder="Username" required="required">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="login" placeholder="Password" required="required">
            </div>        
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-lg btn-block">Login</button>
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
</body>
</html>