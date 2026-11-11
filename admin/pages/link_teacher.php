<?php
date_default_timezone_set('Africa/Dar_es_salaam');
include '../../database/config.php';
include '../../includes/uniques.php';
include '../includes/check_user.php'; 

$user_id = mysqli_real_escape_string($conn, $_POST['user_id']);
$category = mysqli_real_escape_string($conn, $_POST['name']);
if ($category)
$sql = "UPDATE `tbl_users` SET category= CONCAT(category,',$category') WHERE user_id = '$user_id'";

if ($conn->query($sql) === TRUE) {
  header("location:../teacher.php?rp=5118");
} else {
  header("location:../teacher.php?rp=5119");
}

$conn->close();
?>