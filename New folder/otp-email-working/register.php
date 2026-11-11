<?php
$success = "";
$error_message = "";
$conn = mysqli_connect("localhost","root","","demo");
if(!empty($_POST["register"])) {
$email=$_POST['email'];
$result = mysqli_query($conn,"INSERT INTO registered_users(email) VALUES ('$email')");

    echo "<script>
alert('Register success');
window.location.href='index.php';
</script>";

}

?>
<html>
<head>
<title>User Login</title>
<style>
body{
font-family: calibri;
}
.form_container {
    border: 1px solid rgba(0, 0, 0, .05);
    box-shadow: 15px 26px 30px rgba(0, 0, 0, .09);
    border-left: 1px solid rgba(0, 0, 0, .06);
border-radius: 4px;
max-width: 500px;
padding: 20px 30px 30px;
text-align: center;
margin:0 auto;
}
.sanhead { font-size: 20px; }
.san { padding:20px; }
.error_message {
color: #b12d2d;
text-align: center;
background-color: #ffd9d9;
}
.message {
width: 100%;
max-width: 300px;
padding: 10px 30px;
border-radius: 4px;
margin: 0 auto;
margin-bottom: 5px;    
text-align: center;
}
.inputclass{
border: #CCC 1px solid;
padding: 10px 20px;
border-radius:4px;
}
.submit_button {
padding: 10px 20px;
background: #a9961e;
border: #736615 1px solid;
color: #FFF;
border-radius:4px;
}
</style>
</head>
<body>


<form name="frmUser" method="post" action="">
<div class="form_container">

<div class="sanhead">Enter your email</div>
<div class="san"><input type="text" name="email" placeholder="Email" class="inputclass" required></div>
<div class="sanhead"><input type="submit" name="register" value="Submit" class="submit_button"></div>

</div>
</form>
</body>
</html>