
<?php
include "connect.php";

$pa_id = $_POST['pa_id'];
$pa_name = $_POST['pa_name'];
$pa_occupation= $_POST['pa_occupation'];
$pa_tel = $_POST['pa_tel'];


if(!empty($pa_id)){
	$sql = "SELECT  * FROM parent WHERE pa_id ='$pa_id'";
	$result=mysqli_query($conn, $sql);
	$total=mysqli_num_rows($result);
	if($total==0){
		$sql = "INSERT INTO parent (pa_id,pa_name,pa_occupation,pa_tel) VALUES ('$pa_id','$pa_name','$pa_occupation','$pa_tel')";
		mysqli_query($conn, $sql)
			or die("Can't query sql");
	
		mysqli_close($conn);
		echo"<script languege=\"javascript\">";
		echo"alert('บันทึกข้อมูลเรียบร้อยแล้ว');";
		echo"window.location='showparent.php';";
		echo"</script>";
	}
	else{
		echo"<script languege=\"javascript\">";
		echo"alert('เลขที่บัตรประจำตัวประชาชนซ้ำ');";
		echo"window.history.back();";
		echo"</script>";
	}
}
else{
echo"<script languege=\"javascript\">";
echo"alert('กรุณาป้อนข้อมูล');";
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