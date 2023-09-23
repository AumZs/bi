
<?php
include "connect.php";

$c_name = $_POST['c_name'];


if(!empty($c_name)){
	$sql = "SELECT  * FROM classroom WHERE c_name ='$c_name'";
	$result=mysqli_query($conn, $sql);
	$total=mysqli_num_rows($result);
	if($total==0){
		$sql = "INSERT INTO classroom (c_name) VALUES ('$c_name')";
		mysqli_query($conn, $sql)
			or die("Can't query sql");
	
		mysqli_close($conn);
		echo"<script languege=\"javascript\">";
		echo"alert('บันทึกข้อมูลเรียบร้อยแล้ว');";
		echo"window.location='showclass.php';";
		echo"</script>";
	}
	else{
		echo"<script languege=\"javascript\">";
		echo"alert('ชื่อชั้นเรียนซ้ำ');";
		echo"window.history.back();";
		echo"</script>";
	}
}
else{
echo"<script languege=\"javascript\">";
echo"alert('กรุณาป้อนชื่อชั้นเรียน');";
echo"window.history.back();";
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