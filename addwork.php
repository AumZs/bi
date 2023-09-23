<?php
include "connect.php";

$w_id = $_POST['w_id'];
$w_name = $_POST['w_name'];
$w_year = $_POST['w_year'];
$w_org = $_POST['w_org'];

if (!empty($w_name)) {
	$sql = "SELECT  * FROM work WHERE w_name ='$w_name'";
	$result = mysqli_query($conn, $sql);
	$total = mysqli_num_rows($result);
	if ($total == 0) {
		$sql = "INSERT INTO work (w_name,w_year,w_org) VALUES ('$w_name','$w_year','$w_org')";
		mysqli_query($conn, $sql)
			or die("Can't query sql");

		mysqli_close($conn);
		echo "<script languege=\"javascript\">";
		echo "alert('บันทึกข้อมูลเรียบร้อยแล้ว');";
		echo "window.location='showwork.php';";
		echo "</script>";
	}
} else {
	echo "<script languege=\"javascript\">";
	echo "alert('กรุณาป้อนชื่อผลงาน');";
	echo "window.history.back();";
	echo "</script>";
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Untitled Document</title>
</head>

<body>
</body>

</html>