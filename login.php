<?php
	ob_start();
	include "connect.php";

	$login = $_POST['login'];
	$passwd = $_POST['passwd'];
	$user_status = $_POST['user_status'];
if(!empty($login) && !empty($passwd)){
	if($user_status == '1'){
		$sql ="select * from teacher where (t_username='$login' and t_password='$passwd')";
		$result=mysqli_query($conn,$sql);
		$total=mysqli_num_rows($result);
		if($total > 0){
			session_start();
			$_SESSION["valid_uname"]=$login;
			$_SESSION["valid_pwd"]=$passwd;
			$_SESSION["valid_teacher"]=$user_status;
			mysqli_close($conn);
			echo "<script> alert('Welcome User'); window.location='frm_editme.php';</script> ";
			exit();
		}
		else{
			echo "<script> alert('Not found this User'); window.history.go(-1);</script> ";
			exit();
		}
	}
	else {
		if ($login == "Admin" && $passwd == "Admin"){
			session_start();
			$_SESSION["valid_uname"]=$login;
			$_SESSION["valid_pwd"]=$passwd;
			$_SESSION["valid_admin"]=$user_status;
			mysqli_close($conn);
			echo "<script> alert('Welcome Admin');
			window.location='showdept.php';</script> ";
		}
	}
}
else{
	echo "<script> alert('ขออภัย...!! . กรุณากรอกข้อมูลให้ครบ');
	window.history.go(-1);</script>";
	exit();
}
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
</body>
</html>