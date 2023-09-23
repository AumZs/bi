<?php
include "connect.php";

$sql = "SELECT*FROM parent";
$result = mysqli_query($conn, $sql);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Untitled Document</title>
</head>

<body>
  <table style="margin-top: 5%;" width="900" border="1" align="center" bordercolor="#0066CC">
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
            <td width="353">รายงานข้อมูลผู้ปกครอง</td>
            <td width="247">
              <div align="right">[ <a href="frm_addparent.php">เพิ่มข้อมูลผู้ปกครอง</a> ]</div>
            </td>
          </tr>
        </table>
        <table width="789" height="26" border="1" align="center">
          <tbody>
            <tr>
              <td width="200">เลขที่บัตรประจำตัวประชาชน</td>
              <td width="138">ชื่อผู้ปกครอง</td>
              <td width="106">อาชีพ</td>
              <td width="114">เบอร์โทร</td>
              <td width="68">&nbsp;</td>
              <td width="64">&nbsp;</td>
            </tr>
            <?php
            while ($rs = mysqli_fetch_array($result)) {
            ?>
              <tr>
                <td width="50"><?php echo "$rs[pa_id]"; ?></td>
                <td width="170"><?php echo "$rs[pa_name]"; ?></td>
                <td width="120"><?php echo "$rs[pa_occupation]"; ?></td>
                <td width="150"><?php echo "$rs[pa_tel]"; ?></td>
                <td width="68" align="center"><?php echo "<a href=\"frm_editparent.php?pa_id=$rs[pa_id]\" >"; ?>แก้ไข<?php echo "</a>"; ?></td>
                <td width="64" align="center"><?php echo "<a href=\"frm_delparent.php?pa_id=$rs[pa_id]\" >"; ?>ลบ<?php echo "</a>"; ?></td>
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