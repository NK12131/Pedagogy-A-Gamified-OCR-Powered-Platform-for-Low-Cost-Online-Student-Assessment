<?php
error_reporting(0);
$total_questions = $_POST['tq'];
$starting_mark = 1;
$mytotal_marks = 0;
$exam_id = $_POST['eid'];
$record = $_POST['ri'];
$qsid = $row['question_id'];
$ans = $row['answer'];
$exam_id = $_SESSION['current_examid'];	
$student_id =  $_SESSION['$myid'];
$correct_ans = 0;
					
while ($starting_mark <= $total_questions) {
if (strtoupper(base64_decode($_POST['ran'.$starting_mark.''])) == strtoupper($_POST['an'.$starting_mark.''])) {
	
$mytotal_marks = $mytotal_marks + 1;	
}else{
	
}
$starting_mark++;
}
$correct_ans =$mytotal_marks ;
$percent_score = ($mytotal_marks / $total_questions) * 100;
$percent_score = floor($percent_score);
$passmark = $_POST['pm'];

if ($percent_score >= $passmark) {
$status = "PASS";	
}else{
$status = "FAIL";	
}

session_start();
$_SESSION['record_id'] = $record;
include '../../database/config.php';
$sql = "UPDATE tbl_assessment_records SET score='$percent_score', status='$status', correct_ans ='$mytotal_marks'  WHERE record_id='$record'";

if ($conn->query($sql) === TRUE) {

	
   header("location:../assessment-info.php");
} else {
   header("location:../assessment-info.php");
}

$conn->close();
?>
