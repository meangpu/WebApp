<?php
require("mysql/connect.php");

$lc_id = $_POST['lc_id'];
$edited_course = $_POST['cs_idName'];
$edited_lec = $_POST['lectureID'];


$sql = "UPDATE lec_course SET lec_id = '$edited_lec',course_id = '$edited_course' WHERE lc_index=$lc_id";
$result = mysqli_query($dbcon, $sql) or die("Query Unsuccessful");

//*****ไม่ได้แก้ port*****/ 
header("Location: http://localhost/ScheduleChecking/lecture_course_add.php");
//header("Location: http://localhost:81/ScheduleChecking/lecture_course_add.php");
mysqli_close($dbcon);
