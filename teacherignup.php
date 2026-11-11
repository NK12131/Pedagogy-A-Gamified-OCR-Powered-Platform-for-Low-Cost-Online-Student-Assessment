<?php
date_default_timezone_set('Africa/Dar_es_salaam');
include 'database/config.php';
include 'includes/uniques.php';

$user_id = mysqli_real_escape_string($conn, $_POST['user_id']);
$first_name = ucwords(mysqli_real_escape_string($conn, $_POST['first_name']));
$last_name = ucwords(mysqli_real_escape_string($conn, $_POST['last_name']));
$gender = mysqli_real_escape_string($conn, $_POST['gender']);
$dob = mysqli_real_escape_string($conn, $_POST['dob']);
$address = ucwords(mysqli_real_escape_string($conn, $_POST['address']));
$email = mysqli_real_escape_string($conn, $_POST['email']);
$phone = mysqli_real_escape_string($conn, $_POST['phone']);
$department = mysqli_real_escape_string($conn, $_POST['department']);
$category = mysqli_real_escape_string($conn, $_POST['category']);

$login= md5($conn, $_POST['login']);

$sql = "SELECT * FROM tbl_users WHERE email = '$email' OR phone = '$phone'";
$result = $conn->query($sql);


if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {
    $sem = $row['email'];
	$sph = $row['phone'];
	if ($sem == $email) {
	 header("location:signup-teacher.php?rp=1189");	
	}else{
	
	if ($sph == $phone) {
	 header("location:signup-teacher.php?rp=2074");	
	}else{
		
	}
	
	}
	
    }
} else {

$sql = "INSERT INTO tbl_users (user_id, first_name, last_name, gender, dob, address, email, phone, department, category, role, class , division, rollno )
VALUES ('$user_id', '$first_name', '$last_name', '$gender', '$dob', '$address', '$email', '$phone', '$department', '$category', 'teacher', 'staff', ' ', '999999 ')";

if ($conn->query($sql) === TRUE) {
  header("location:otp.php?rp=5116");
} else {
  header("location:signup-teacher.php?rp=5117");
}


}

$conn->close();
?>