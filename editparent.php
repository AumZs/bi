<?php
	include "connect.php";
	$pa_id = $_POST['pa_id'];
	$pa_name = $_POST['pa_name'];
	$pa_occupation = $_POST['pa_occupation'];
	$pa_tel = $_POST['pa_tel'];
	$sql = "UPDATE parent SET pa_name = '$pa_name',pa_occupation = '$pa_occupation',pa_tel = '$pa_tel' WHERE pa_id ='$pa_id' ";
	mysqli_query($conn, $sql)
		or die ("Can't query sql");

mysqli_close($conn);
?>
<script language="javascript">
	alert('แก้ไขข้อมูลเรียบร้อยแล้ว');
	window.location='showparent.php';
</script>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
</body>
</html>