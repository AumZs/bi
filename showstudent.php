<?php
include "connect.php";

$sql = "SELECT student.std_id,student.std_name,classroom.c_id,classroom.c_name FROM student,classroom WHERE student.c_id = classroom.c_id";
$result = mysqli_query($conn, $sql);

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
    include "admin_menu.php";
    ?>
    <tr style="background-color: white;">
      <td>
        <table width="620" border="0" align="center" cellpadding="5" cellspacing="0">
          <tr>
            <td width="353">รายงานข้อมูลนักเรียน</td>
            <td width="350">
              <div align="right">[ <a href="frm_addstudent.php">เพิ่มข้อมูลนักเรียน</a> | <a href="showparent.php">จัดการข้อมูลผู้ปกครอง</a> ]</div>
            </td>
          </tr>
        </table>
        <table width="706" height="38" border="1" align="center">
          <tbody>
            <tr>
              <td width="68">รหัสนักเรียน</td>
              <td width="180">ชื่อนักเรียน</td>
              <td width="150">ชั้นเรียน</td>
              <td width="68">&nbsp;</td>
              <td width="68">&nbsp;</td>
            </tr>
            <?php
            while ($rs = mysqli_fetch_array($result)) {
            ?>
              <tr>
                <td width="180"><?php echo "$rs[std_id]"; ?></td>
                <td width="70"><?php echo "$rs[std_name]"; ?></td>
                <td width="150"><?php echo "$rs[c_name]"; ?></td>
                <td width="68" align="center"><?php echo "<a href=\"frm_editstudent.php?std_id=$rs[std_id]\" >"; ?>แก้ไข<?php echo "</a>"; ?></td>
                <td width="68" align="center"><?php echo "<a href=\"frm_delstudent.php?std_id=$rs[std_id]\" >"; ?>ลบ<?php echo "</a>"; ?></td>
              </tr>
            <?php
            }
            mysqli_close($conn);
            ?>
          </tbody>
        </table>
        <p>&nbsp;</p>
      </td>
    </tr>
    <?php
    include('foot.php');
    ?>
  </table>
</body>

</html>