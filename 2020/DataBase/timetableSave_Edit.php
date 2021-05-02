<?php
require("mysql/connect.php");

$timetable_id = $_POST['timetable_id'];

//$room_id = $_POST['room_id'];
//$cs_idName = $_POST['cs_idName'];
//$lectureID = $_POST['lectureID'];
$day = $_POST['day'];
$start_hour = $_POST['start_hour'];
$start_min = $_POST['start_min'];
$end_hour = $_POST['end_hour'];
$end_min = $_POST['end_min'];
//$semester = $_POST['semester'];
//$year =  $_POST['year'];

$sql = "UPDATE `timetable` SET `day` = '$day', `start_hour` = '$start_hour', `start_min` = '$start_min', `end_hour` = '$end_hour', `end_min` = '$end_min' WHERE `timetable`.`timetable_id` = $timetable_id";
/*	$sql = "INSERT INTO timetable(room_id, course_id, lec_id, day, start_hour, start_min, end_hour, end_min,semester,year) 
	VALUES ('$room_id', '$cs_idName', '$lectureID','$day', '$start_hour', '$start_min', 
	'$end_hour', '$end_min','$semester','$year ')";
*/
$result = mysqli_query($dbcon, $sql) or die("Query Unsuccessful");

//****Need to VERIFY result ****//

//*****ไม่ได้แก้ port*****/ 
header("Location: http://localhost/ScheduleChecking/lecture.php");
//header("Location: http://localhost:81/ScheduleChecking/timetable.php");
mysqli_close($dbcon);
