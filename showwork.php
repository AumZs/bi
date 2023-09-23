<?php
include "connect.php";

$sql = "SELECT*FROM work";
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
            <td width="353">รายงานข้อมูลผลงาน</td>
            <td width="247">
              <div align="right">[ <a href="frm_addwork.php">เพิ่มผลงาน</a> ]</div>
            </td>
          </tr>
        </table>
        <table width="706" height="50" border="1" align="center">
          <tbody>
            <tr>
              <td width="180">ชื่อผลงาน</td>
              <td width="70">ปี่ที่ได้รับ</td>
              <td width="150">หน่อยงานที่มอบ</td>
              <td width="68">&nbsp;</td>
              <td width="68">&nbsp;</td>
            </tr>
            <?php
            while ($rs = mysqli_fetch_array($result)) {
            ?>
              <tr>
                <td width="180"><?php echo "$rs[w_name]"; ?></td>
                <td width="70"><?php echo "$rs[w_year]"; ?></td>
                <td width="150"><?php echo "$rs[w_org]"; ?></td>
                <td width="68" align="center"><?php echo "<a href=\"frm_editwork.php?w_id=$rs[w_id]\" >"; ?>แก้ไข<?php echo "</a>"; ?></td>
                <td width="68" align="center"><?php echo "<a href=\"frm_delwork.php?w_id=$rs[w_id]\" >"; ?>ลบ<?php echo "</a>"; ?></td>
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