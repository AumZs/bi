<?php
include "connect.php";

$t_name = $_POST['t_name'];
$t_address = $_POST['t_address'];
$t_tel = $_POST['t_tel'];
$t_username = $_POST['t_username'];
$t_password = $_POST['t_password'];
$po_id = $_POST['po_id'];
$d_id = $_POST['d_id'];

$fileupload = $_FILES['photo']['tmp_name'];
$fileupload_name = $_FILES['photo']['name'];

if ($t_name != "" && $t_username != "") {
	$sql = "SELECT * FROM teacher WHERE t_username = '$t_username' ";
	$result = mysqli_query($conn, $sql);
	$total = mysqli_num_rows($result);
	if ($total == 0) {
		if ($fileupload != "") {
			$fileExtension = pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION);
			$timestamp = time();
			$newfilename = "{$t_username}_{$timestamp}.{$fileExtension}";
			copy($fileupload, "picture/" . $newfilename);
			$sql = "INSERT INTO teacher (t_username, t_password, t_name, t_address, t_tel, po_id, d_id, t_pic) VALUES ('$t_username', '$t_password', '$t_name', '$t_address', '$t_tel', '$po_id', '$d_id', '$newfilename')";
		} else {
			$sql = "INSERT INTO teacher (t_username, t_password, t_name, t_address, t_tel, po_id, d_id) VALUES ('$t_username', '$t_password', '$t_name', '$t_address', '$t_tel', '$po_id', '$d_id')";
		}
		mysqli_query($conn, $sql)
			or die("Can't query sql");

		mysqli_close($conn);

		echo "<script language=\"javascript\">";
		echo "alert('บันทึกข้อมูลเรียบร้อยแล้ว');";
		echo "window.location = 'showteacher.php';";
		echo "</script>	";
	} else {
		echo "<script language=\"javascript\">";
		echo "alert('Username ซ้ำ');";
		echo "window.history.back();";
		echo "</script>	";
	}
} else {
	echo "<script language=\"javascript\">";
	echo "alert('กรุณาป้อน ชื่อ-สกุลและ Username');";
	echo "window.history.back();";
	echo "</script>	";
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