<?php
require("mysql/connect.php");
$lec_id = $_POST['lectureID'];
$course_id =  $_POST['cs_idName'];

$sql = "INSERT INTO lec_course(lec_id, course_id) VALUES ('$lec_id', '$course_id')";
$result = mysqli_query($dbcon, $sql) or die("Query Unsuccessful");

//*****ไม่ได้แก้ port*****/ 
header("Location: http://localhost/ScheduleChecking/lecture_course_add.php");
//header("Location: http://localhost:81/ScheduleChecking/lecture_course_add.php");
mysqli_close($dbcon);
