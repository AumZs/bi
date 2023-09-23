<?php
	session_start();
	unset($_SESSION['valid_uname']);
	unset($_SESSION['valid_pwd']);
	unset($_SESSION['valid_teacher']);
	unset($_SESSION['valid_admin']);
	session_destroy();
?>
<script language="javascript">
window.location ='index.php';
</script>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
</body>
</html>