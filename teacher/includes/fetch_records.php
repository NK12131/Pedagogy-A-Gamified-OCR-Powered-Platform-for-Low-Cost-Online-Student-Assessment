<?php
include '../database/config.php';
if (isset($_SESSION['login']) && $_SESSION['login'] == true) {
	$myfname = $_SESSION['first_name'];
	$mylname = $_SESSION['last_name'];
	$mygender = $_SESSION['gender'];
	$mydob = $_SESSION['dob'];
	$myaddress = $_SESSION['address'];
	$myemail = $_SESSION['email'];
	$myphone = $_SESSION['phone'];
	$mydepartment = $_SESSION['department'];
	$myrole = $_SESSION['role'];
	$myavatar = $_SESSION['avatar'];
		$myid = $_SESSION['myid'];
	$mycategory = $_SESSION['mycategory'];
	if ($myrole == "teacher") {
		
	}else{
	header("location:../?rp=9135");	
	}
}else{
	header("location:../?rp=9422");
}

$departments = 0;
$students = 0;
$examination = 0;
$subjects = 0;
$categories = 0;
$notice = 0;
$questions = 0;
$banned_students = 0;
$std_fails = 0;
$std_pass = 0;

$sql = "SELECT * FROM tbl_departments";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
   
    while($row = $result->fetch_assoc()) {
     $departments++;
    }
} else {

}

$sql = "SELECT * FROM tbl_users WHERE role = 'student' AND department = '$mydepartment'  ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
   
    while($row = $result->fetch_assoc()) {
     $students++;
    }
} else {

}


$sql = "SELECT * FROM tbl_examinations WHERE category ='$mycategory'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
   
    while($row = $result->fetch_assoc()) {
     $examination++;
    }
} else {

}

$sql = "SELECT * FROM tbl_subjects";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
   
    while($row = $result->fetch_assoc()) {
     $subjects++;
    }
} else {

}

$sql = "SELECT category FROM tbl_users WHERE user_id ='$myid'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
   
  
			while($row = mysqli_fetch_array($result))
			{
			$marks=$row['category'];
			$exp=explode(",",$marks);
			}

			foreach($exp as $out)
			{
     $categories++;
    }
} else {

}


$sql = "SELECT * FROM tbl_notice";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
   
    while($row = $result->fetch_assoc()) {
     $notice++;
    }
} else {

}

$sql = "SELECT *  FROM tbl_examinations JOIN tbl_questions ON tbl_examinations.exam_id = tbl_questions.exam_id  WHERE category ='$mycategory'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
   
    while($row = $result->fetch_assoc()) {
     $questions++;
    }
} else {

}

$sql = "SELECT * FROM tbl_users WHERE role = 'student' AND acc_stat = '0' AND department = '$mydepartment'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
   
    while($row = $result->fetch_assoc()) {
     $banned_students++;
    }
} else {

}

$sql = "SELECT * FROM tbl_assessment_records";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
   
    while($row = $result->fetch_assoc()) {
     $status = $row['status'];
	 if ($status == "PASS"){
		 $std_pass++;
	 }else{
		$std_fails++; 
		 
	 }
	 
    }
} else {

}



$conn->close();
?>