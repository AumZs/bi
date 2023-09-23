<?php
include "connect.php";
$sql = "SELECT*FROM department";
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
        <p>&nbsp;</p>
        <table width="620" border="0" align="center" cellpadding="5" cellspacing="0">
          <tr>
            <td>รายงานข้อมูลกลุ่มสาระ</td>
            <td>
              <div align="right">[ <a href="frm_adddept.php">เพิ่มกลุ่มสาระ</a> ]</div>
            </td>
          </tr>
        </table>
        <table width="620" border="1" align="center" cellpadding="5" cellspacing="0" bordercolor="#5092CE">
          <tr>
            <td width="120">รหัสกลุ่มสาระ</td>
            <td width="170">ชื่อกลุ่มสาระ</td>
            <td width="170">หัวหน้ากลุ่มสาระ</td>
            <td width="80">&nbsp;</td>
            <td width="80">&nbsp;</td>
          </tr>
          <?php
          while ($rs = mysqli_fetch_array($result)) {
          ?>
            <tr>
              <td width="120"><?php echo "$rs[d_id]"; ?></td>
              <td width="170"><?php echo "$rs[d_name]"; ?></td>
              <td width="170">
                <?php
                if ("$rs[t_id]" == null) {
                  echo "<a href=\"frm_adddeptdetail.php?d_id=$rs[d_id]\">";
                  echo "จัดการหัวหน้ากลุ่มสาระ";
                  echo "</a>";
                } else {
                  $sql1 = "SELECT*FROM teacher WHERE t_id = '$rs[t_id]' ";
                  $result1 = mysqli_query($conn, $sql1)
                    or die("Can't query sql");
                  $rs1 = mysqli_fetch_array($result1);
                  echo "<a href=\"frm_adddeptdetail.php?d_id=$rs[d_id]\">";
                  echo "$rs1[t_name]";
                  echo "</a>";
                }
                ?>
              </td>
              <td width="80" align="center"><?php echo "<a href=\"frm_editdept.php?d_id=$rs[d_id]\" >"; ?>แก้ไข<?php echo "</a>"; ?></td>
              <td width="80" align="center"><?php echo "<a href=\"frm_deldept.php?d_id=$rs[d_id]\" >"; ?>ลบ<?php echo "</a>"; ?></td>
            </tr>
          <?php
          }
          mysqli_close($conn);
          ?>
        </table>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
      </td>
    </tr>
    <?php
    include('foot.php');
    ?>
  </table>
</body>

</html>