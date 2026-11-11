<?php
date_default_timezone_set('Africa/Dar_es_salaam');


error_reporting(0);
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "oes_db";


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
die("<h2>Database Connection Failure : " . $conn->connect_error . "</h2><hr>");
} 



include 'includes/uniques.php';
$user_id = mysqli_real_escape_string($conn, $_POST['user_id']);
$first_name = ucwords(mysqli_real_escape_string($conn, $_POST['first_name']));
$last_name = ucwords(mysqli_real_escape_string($conn, $_POST['last_name']));
$email = mysqli_real_escape_string($_POST['email']);
$phone = mysqli_real_escape_string($conn, $_POST['phone']);
$department = mysqli_real_escape_string($conn, $_POST['department']);
$category = mysqli_real_escape_string($conn, $_POST['category']);
$address = ucwords(mysqli_real_escape_string($conn, $_POST['address']));
$dob = mysqli_real_escape_string($conn, $_POST['dob']);
$gender = mysqli_real_escape_string($conn, $_POST['gender']);
$mentor = ucwords(mysqli_real_escape_string($conn, $_POST['mentor']));
$classname = ucwords(mysqli_real_escape_string($conn, $_POST['classname']));
$rollno = ucwords(mysqli_real_escape_string($conn, $_POST['rollno']));
$division = ucwords(mysqli_real_escape_string($conn, $_POST['division']));
$admission_year = ucwords(mysqli_real_escape_string($conn, $_POST['admission_year']));


$sql = "SELECT * FROM tbl_users WHERE email = '$email' OR phone = '$phone'";
$result = $conn->query($sql);
echo $sql;

if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {
    $sem = $row['email'];
	$sph = $row['phone'];
	if ($sem == $email) {
	 header("location:add_student.php?rp=1189");	
	}
    }


} else {


$sql = "INSERT INTO `tbl_users`('first_name`, `last_name`, `gender`, `dob`, `email`,`phone`, `department`, `category`,`mentor`, `classname`, `rollno`, `admission_year`, `division`)
VALUES(`$first_name`, `$last_name`, `$gender`, `$dob`,`$email`, `$phone`, `$department`, ` `,`$mentor`, `$classname`, `$rollno`, `$admission_year`, `$division`)";

if ($conn->query($sql) === TRUE) {
  header("location:Login.php?rp=6310");

  
} else {

  header("location:add_student.php?rp=9157");
}


}

$conn->close();
?>