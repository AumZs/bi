<?php
$server = "localhost:3306";
$user = "root";
$password = "";
$dbname = "db_eportfolio66";
$conn = mysqli_connect($server, $user, $password, $dbname);


if (!$conn)
	die("1. ไม่สามารถติดต่อกับ MySQL ได้" . mysqli_connect_error());


mysqli_set_charset($conn, "utf8");
