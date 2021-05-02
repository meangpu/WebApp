<?php
require("mysql/connect.php");
$edited_name = $_POST['lecture_name'];
$lec_id = $_POST['lec_id'];

$sql = "UPDATE lecture SET lecture_name = '$edited_name' WHERE lec_id=$lec_id";
$result = mysqli_query($dbcon, $sql) or die("Query Unsuccessful");

//*****ไม่ได้แก้ port*****/ 
header("Location: http://localhost/ScheduleChecking/lecture.php");
//header("Location: http://localhost:81/ScheduleChecking/lecture.php");
mysqli_close($dbcon);
