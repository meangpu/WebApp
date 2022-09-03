<?php
// require 'mysql\config.php';
// $dbcon = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname) or die('Error connect ' . mysqli_connect_error());
$dbcon = mysqli_connect("127.0.0.1", "root", "", "schedulechecking") or die('Error connect ' . mysqli_connect_error());
// echo "eieie";
mysqli_set_charset($dbcon, 'utf8');
