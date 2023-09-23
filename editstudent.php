<?php
include "connect.php";


$std_id = $_POST['std_id'];
$std_name = $_POST['std_name'];
$std_address = $_POST['std_address'];
$std_tel = $_POST['std_tel'];
$std_pic = $_POST['std_pic'];

$pa_id = $_POST['pa_id'];
$c_id = $_POST['c_id'];

$fileupload = $_FILES['photo']['tmp_name'];
$fileupload_name = $_FILES['photo']['name'];

if ($fileupload != "") {
    if ($std_pic != "") {
        unlink("picture/$std_pic");
    }
    $fileExtension = pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION);
    $timestamp = time();
    $newfilename = "{$std_name}_{$timestamp}.{$fileExtension}";
    copy($fileupload, "picture/" . $newfilename);
    $sql = "UPDATE student SET std_name='$std_name',std_address='$std_address',std_tel='$std_tel',pa_id='$pa_id',
        c_id='$c_id',std_pic='$newfilename' WHERE std_id='$std_id' ";
} else {
    $sql = "UPDATE student SET std_name='$std_name',std_address='$std_address',std_tel='$std_tel',pa_id='$pa_id',
        c_id='$c_id' WHERE std_id='$std_id' ";
}
mysqli_query($conn, $sql)
    or die("Can't query sql");
mysqli_close($conn);

echo "<script languege='javascript'>";
echo "alert('แก้ไขข้อมูลเรียบร้อยแล้ว');";
echo "window.location='showstudent.php';";
echo "</script>";
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