<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script> 
    <link rel="stylesheet" href="accountType.css">
	<link rel="stylesheet" href="signup.css">
    <title>Account Type</title>
	<style>

	a {
	  color: white;
	}
	</style>
</head>
<body>
    <div class="container">
        <div class="text-center heading">
            <h1><b>Choose your Account Type</b></h1>
        </div>
        <div class="row row-cols-1 row-cols-md-2 card-style">
            <div class="col-md-2"></div>

  <div class="col-md-4 mb-4">
                <div class="card">
                <div class="card-body text-center">
                    <img src="assets/images/teacher.svg" class="card-img-top" alt="teacher">
                </div>
                <div class="card-footer text-center">
                    <a href="signup-teacher.php" class="btn btn-primary">Teacher</a>
                </div>
                </div>
            </div>
<div class="col-md-4 mb-4">
                <div class="card">
                <div class="card-body text-center">
                    <img src="assets/images/student.png" class="card-img-top" alt="student">
                </div>
                <div class="card-footer text-center">
                    <a href="signup-student.php" class="btn btn-primary">Student</a>
                </div>
                </div>
            </div>
	<div class="col-md-2"></div>	  
        </div>
		<div class="hint-text"> <pre>              						 Already have an account? <a href="otp.php">Login here</a></div>
    </div>
	
</body>
</html>




