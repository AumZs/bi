<?php
include "connect.php";

$sql = "SELECT*FROM position";
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
            <td>รายงานข้อมูลตำแหน่ง</td>
            <td>
              <div align="right">[ <a href="frm_addpot.php">เพิ่มตำแหน่ง</a> ]</div>
            </td>
          </tr>
        </table>
        <table width="620" border="1" align="center" cellpadding="5" cellspacing="0" bordercolor="#5092CE">
          <tr>
            <td width="120">รหัสตำแหน่ง</td>
            <td>ชื่อตำแหน่ง</td>
            <td width="80">&nbsp;</td>
            <td width="80">&nbsp;</td>
          </tr>
          <?php
          while ($rs = mysqli_fetch_array($result)) {
          ?>
            <tr>
              <td width="120"><?php echo "$rs[po_id]"; ?></td>
              <td><?php echo "$rs[po_name]"; ?></td>
              <td width="80" align="center"><?php echo "<a href=\"frm_editpot.php?po_id=$rs[po_id]\" >"; ?>แก้ไข<?php echo "</a>"; ?></td>
              <td width="80" align="center"><?php echo "<a href=\"frm_delpot.php?po_id=$rs[po_id]\" >"; ?>ลบ<?php echo "</a>"; ?></td>
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
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>

</html>