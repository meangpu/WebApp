<?php
require("mysql/connect.php");

$roomID = $_GET['id'];
$sql = "DELETE FROM room WHERE room_id = $roomID";
$result = mysqli_query($dbcon, $sql) or die("Query Unsuccessful");

//*****ไม่ได้แก้ port*****/ 
// header("Location: http://localhost/ScheduleChecking/classroom.php");
header("Location: http://localhost:81/ScheduleChecking/classroom.php");
mysqli_close($dbcon);
