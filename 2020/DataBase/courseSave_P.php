<?php
require("mysql/connect.php");

$cs_id = $_POST['cs_id'];
$cs_name = $_POST['cs_name'];
$degree = $_POST['degree'];
$year_type = $_POST['year_type'];
$semester = $_POST['semester'];
$cs_weight = $_POST['cs_weight'];
$lec_lab = $_POST['lec_lab'];
$cs_cond = $_POST['cs_cond'];
$cs_option = $_POST['cs_option'];
// $ = $_POST[''];


$sql = "INSERT INTO course(course_id, course_name, degree, year_type, 
semester, course_weight, lec_lab, course_cond, course_option) 
VALUES ('$cs_id', '$cs_name', '$degree', '$year_type', '$semester', 
'$cs_weight', '$lec_lab', '$cs_cond', '$cs_option')";
$result = mysqli_query($dbcon, $sql) or die("Query Unsuccessful");

//*****ไม่ได้แก้ port*****/ 
// header("Location: http://localhost/ScheduleChecking/course.php");
header("Location: http://localhost:81/ScheduleChecking/course.php");
mysqli_close($dbcon);
