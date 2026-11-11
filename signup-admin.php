<!DOCTYPE html>
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
<link rel="stylesheet" href="signup.css">
<title>Signup Form</title>
</head>
<body>
<div class="signup-form">
    <div class="container">
        <form action="/examples/actions/confirmation.php" method="post">
            <h2 class="text-center">Sign Up</h2>
            <p class="text-center">Please fill in this form to create an account!</p>
            <hr>
	<div class="form-group">
                <input type="text" class="form-control" name="smart_card_no" placeholder="Smart card No" required="required">
            </div>
          
<div class="form-group">
                <div class="row">
                    <div class="col"><input type="text" class="form-control" name="first_name" placeholder="First Name" required="required"></div>
                    <div class="col"><input type="text" class="form-control" name="last_name" placeholder="Last Name" required="required"></div>
                </div>        	
            </div>
          
                
            <div class="form-group">
                <input type="email" class="form-control" name="email" placeholder="Email" required="required">
            </div>
			
			<div class="form-group">
                <input type="tel" class="form-control" name="s_phone" placeholder="Your Phone number" required="required">
            </div> 
			
			<div class="form-group">
			<div class="form-group">
               <select class="form-control" name="department" required>
			   <option value="" selected disabled>-Select department-</option>
				<?php
				include '../database/config.php';
				include 'includes/check_user.php'; 
				include 'includes/check_reply.php';
				$sql = "SELECT * FROM tbl_departments WHERE status = 'Active' ORDER BY name";
				$result = $conn->query($sql);

				if ($result->num_rows > 0) {

				while($row = $result->fetch_assoc()) {
				print '<option value="'.$row['name'].'">'.$row['name'].'</option>';
				}
			   } else {

				}
				 $conn->close();
				 ?>
				
				</select>
			</div>
			

            <div class="form-group">
                <input type="password" class="form-control" name="password" placeholder="Password" required="required">
            </div>

            <div class="form-group">
                <input type="password" class="form-control" name="confirm_password" placeholder="Confirm Password" required="required">
            </div>


                      
            <div class="form-group">
                <center><button type="submit" class="btn btn-primary btn-lg">Sign Up</button></center>
            </div>
        </form>
        <div class="hint-text">Already have an account? <a href="login.php">Login here</a></div>
    </div>
</div>
</body>
</html>