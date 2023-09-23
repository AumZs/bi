<?php
include "connect.php";
$w_id = $_POST['w_id'];
$w_name = $_POST['w_name'];
$w_year = $_POST['w_year'];
$w_org = $_POST['w_org'];
$sql = "UPDATE work SET w_name = '$w_name', w_year = '$w_year',w_org = '$w_org' 
   WHERE w_id = '$w_id'";
mysqli_query($conn, $sql) 
    or die("Can't query sql");

mysqli_close($conn);
?>

<script language="javascript">
    alert('แก้ไขข้อมูลผลงานเรียบร้อยแล้ว');
    window.location = 'showwork.php';
</script>


<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml%22%3E ">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Untitled Document</title>
</head>
<body>
</body>
</html>