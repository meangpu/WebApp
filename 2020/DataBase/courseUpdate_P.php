<?php
require("mysql/connect.php");

$cs_index = $_POST['cs_index'];
$cs_id = $_POST['cs_id'];
$cs_name = $_POST['cs_name'];
$degree = $_POST['degree'];
$year_type = $_POST['year_type'];
$semester = $_POST['semester'];
$cs_weight = $_POST['cs_weight'];
$lec_lab = $_POST['lec_lab'];
$cs_cond = $_POST['cs_cond'];
$cs_option = $_POST['cs_option'];

$sql = "UPDATE course SET course_id='$cs_id', course_name= '$cs_name', 
degree='$degree', year_type='$year_type', semester='$semester', 
course_weight='$cs_weight', lec_lab='$lec_lab', course_cond='$cs_cond', 
course_option='$cs_option' 
WHERE course_index = $cs_index";

$result = mysqli_query($dbcon, $sql) or die("Query Unsuccessful");

//*****ไม่ได้แก้ port*****/ 
// header("Location: http://localhost/ScheduleChecking/course.php");
header("Location: http://localhost:81/ScheduleChecking/course.php");
mysqli_close($dbcon);
