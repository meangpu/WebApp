<?php
require("mysql/connect.php");


$lc_id = $_GET['id'];
$sql = "DELETE FROM lec_course WHERE lc_index=$lc_id";
$result = mysqli_query($dbcon, $sql) or die("Query Unsuccessful");

//*****ไม่ได้แก้ port*****/ 
header("Location: http://localhost/ScheduleChecking/lecture_course_add.php");
//header("Location: http://localhost:81/ScheduleChecking/lecture_course_add.php");
mysqli_close($dbcon);
