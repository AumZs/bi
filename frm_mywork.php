<?php
	include "connect.php";
?>
  <?php
  session_start();
  if(isset($_SESSION["valid_uname"]) && isset($_SESSION["valid_pwd"]) && isset($_SESSION["valid_teacher"])){

  $valid_uname = $_SESSION["valid_uname"];
    $sql = "SELECT * FROM teacher WHERE t_username = '$valid_uname'";
    $result = mysqli_query($conn, $sql);
    $rs = mysqli_fetch_array($result);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<table style="margin-top: 5%;" width="800" border="1" align="center" bordercolor="#0066CC">
  <?php
  	include "head.php";
	
  ?>
  <?php
  	include "teacher_menu.php";
  ?>
  <tr style="background-color: white;">
    <td><p>&nbsp;</p>
      <table width="620" border="0" align="center" cellpadding="5" cellspacing="0">
        <tr>
          <td> อาจารย์ <input type="hidden" name="hidden" id="hidden" value = "<?php echo "$rs[t_id]";?>"/></td>
          <td><div align="right">[ <a href="frm_addmywork.php">เพิ่มผลงาน</a> ]</div></td>
        </tr>
      </table>
           <table width="620" border="1" align="center" cellpadding="5" cellspacing="0" bordercolor="#5092CE">
        <tr>
          <td width="190">ชื่อผลงาน</td>
		  <td width="80">ปีที่ได้รับ</td>
          <td width="150">หน่วยงานที่มอบ</td>
          <td width="80">&nbsp;</td>
        </tr>
<?php
	while ($rs = mysqli_fetch_array($result)) {
?>        
        <tr>
          <td><?php echo "$rs[w_name]"; ?></td>
          <td align="center"><?php echo "$rs[w_year]"; ?></td>
          <td align="left"><?php echo"$rs[w_org]";?></td>
          <td align="center"><?php echo"<a href=\"frm_delmywork.php?w_id=$rs[w_id]\" >";?>ลบ<?php echo "</a>";?></td>
        </tr>
<?php
	}
	mysqli_close($conn); 
?>       
      </table>
      <p>&nbsp;</p>
    <p>&nbsp;</p></td>
  </tr>
<?php
		include ('foot.php');
?>
</table>
</body>
</html>