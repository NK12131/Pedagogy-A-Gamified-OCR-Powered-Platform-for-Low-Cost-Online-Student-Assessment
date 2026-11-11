<?php
date_default_timezone_set('Africa/Dar_es_salaam');
include '../../database/config.php';
include '../../includes/uniques.php';
include '../includes/check_user.php';
$subject_id =  mysqli_real_escape_string($conn, $_POST['subject_id']);
$subject_name =   ucwords(mysqli_real_escape_string($conn, $_POST['subject']));
$department_name = $mydepartment;
$category_name = ucwords(mysqli_real_escape_string($conn, $_POST['category']));
$date_registered = date('d-m-Y');

$sql = "SELECT * FROM tbl_subjects WHERE name = '$subject_name' AND department = '$department_name' AND category = '$category_name'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {
    header("location:../subject.php?rp=1185");
    }
} else {

$sql = "INSERT INTO tbl_subjects (subject_id, name, department, category, date_registered)
VALUES ('$subject_id', '$subject_name', '$department_name', '$category_name', '$date_registered')";

if ($conn->query($sql) === TRUE) {
    header("location:../subject.php?rp=3598");
} else {
    header("location:../subject.php?rp=1925");
}


}
$conn->close();
?>


