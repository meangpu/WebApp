<?php
require("mysql/connect.php");
$edited_name = $_POST['room_name'];
$room_id = $_POST['room_id'];

$sql = "UPDATE room SET room_name = '$edited_name' WHERE room_id=$room_id";
$result = mysqli_query($dbcon, $sql) or die("Query Unsuccessful");

//*****ไม่ได้แก้ port*****/ 
// header("Location: http://localhost/ScheduleChecking/classroom.php");
header("Location: http://localhost:81/ScheduleChecking/classroom.php");
mysqli_close($dbcon);
