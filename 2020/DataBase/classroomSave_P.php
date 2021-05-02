<?php
require("mysql/connect.php");
$room_name = $_POST['room_name'];

$sql = "INSERT INTO room(room_name) VALUES ('$room_name')";
$result = mysqli_query($dbcon, $sql) or die("Query Unsuccessful");

//*****ไม่ได้แก้ port*****/ 
// header("Location: http://localhost/ScheduleChecking/classroom.php");
header("Location: http://localhost:81/ScheduleChecking/classroom.php");
mysqli_close($dbcon);
