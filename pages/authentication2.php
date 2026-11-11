<?php
session_start();
include 'database/config.php';
$con=mysqli_connect('localhost','root','','oes_db');

$email=$_POST['EMAIL'];
$res=mysqli_query($con,"select * from tbl_users where email='$email'");

if ($res->num_rows > 0) {
	$accstat = $row['acc_stat'];
	if ($accstat == "0") {
	 header("location:../?rp=5732");	
	}else{
		$location = strtolower($row['role']);
	header("location:../$location/");	
	}

    }
 else {
    header("location:../index.php?rp=0912");
}
$conn->close();

?>