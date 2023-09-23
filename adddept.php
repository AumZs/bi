
<?php
include "connect.php";

$d_name = $_POST['d_name'];

if(!empty($d_name)){
	$sql = "SELECT  * FROM department WHERE d_name ='$d_name'";
	$result=mysqli_query($conn, $sql);
	$total=mysqli_num_rows($result);
	if($total==0){
		$sql = "INSERT INTO department (d_name) VALUES ('$d_name')";
		mysqli_query($conn, $sql)
			or die("Can't query sql");
	
		mysqli_close($conn);
		echo"<script languege=\"javascript\">";
		echo"alert('บันทึกข้อมูลเรียบร้อยแล้ว');";
		echo"window.location='showdept.php';";
		echo"</script>";
	}
	else{
		echo"<script languege=\"javascript\">";
		echo"alert('ชื่อกลุ่มสาระซ้ำ');";
		echo"window.location='showdept.php';";
		echo"</script>";
	}
}
else{
echo"<script languege=\"javascript\">";
echo"alert('กรุณาป้อนชื่อกลุ่มสาระ');";
echo"window.location='showdept.php';";
echo"</script>";
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