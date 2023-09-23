<?php
include "connect.php";

$sql = "SELECT teacher.t_id,teacher.t_name,department.d_name,position.po_name FROM teacher,department,position WHERE teacher.d_id = department.d_id AND teacher.po_id =position.po_id";
$result = mysqli_query($conn, $sql)
  or die("Can't query sql");

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
            <td width="353">รายงานข้อมูลอาจารย์</td>
            <td width="247">
              <div align="right">[ <a href="frm_addteacher.php">เพิ่มข้อมูลอาจารย์</a> ]</div>
            </td>
          </tr>
        </table>
        <table width="706" height="50" border="1" align="center">
          <tbody>
            <tr>
              <td width="100" style="white-space: nowrap;">รหัสอาจารย์</td>
              <td width="138">ชื่ออาจารย์</td>
              <td width="106">ตำแหน่ง</td>
              <td width="114">กลุ่มสาระ</td>
              <td width="68">&nbsp;</td>
              <td width="64">&nbsp;</td>
            </tr>
            <?php
            while ($rs = mysqli_fetch_array($result)) {
            ?>
              <tr>
                <td width="50"><?php echo "$rs[t_id]"; ?></td>
                <td width="170"><?php echo "<a href=\"frm_detailteacher.php?t_id=$rs[t_id]\">"; ?><?php echo "$rs[t_name]"; ?><?php echo "</a>"; ?></td>
                <td width="120"><?php echo "$rs[po_name]"; ?></td>
                <td width="150"><?php echo "$rs[d_name]"; ?></td>
                <td width="68" align="center"><?php echo "<a href=\"frm_editteacher.php?t_id=$rs[t_id]\" >"; ?>แก้ไข<?php echo "</a>"; ?></td>
                <td width="64" align="center"><?php echo "<a href=\"frm_delteacher.php?t_id=$rs[t_id]\" >"; ?>ลบ<?php echo "</a>"; ?></td>
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