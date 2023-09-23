<?php
include "connect.php";

$sql = "SELECT * FROM classroom";
$result = mysqli_query($conn, $sql);


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Untitled Document</title>
</head>

<body>
  <table style="margin-top: 5%;" width="694" border="1" bordercolor="#000000" align="center" cellspacing="0">
    <tr>
      <?php
      include "head.php";

      ?>
      <?php
      include "admin_menu.php";
      ?>
    </tr>
    <tr style="background-color: white;">
      <td height="143" align="center">
        <table width="670" border="0" align="center" cellpadding="5" cellspacing="0">
          <tr>
            <td width="350">รายงานข้อมูลชั้นเรียน</td>
            <td width="250">
              <table width="350" border="0" cellspacing="0" cellpadding="5">
                <tr>
                  <td width="350" align="right">[<a href="frm_addclass.php"> เพิ่มเพิ่มชั้นเรียน</a> ]</td>
                </tr>
              </table>
            </td>
          </tr>
        </table>
        <table width="670" border="1" align="center" cellpadding="5" cellspacing="0">
          <tr>
            <td align="center" width="114">รหัสชั้นเรียน</td>
            <td align="center" width="104">ชื่อชั้นเรียน</td>
            <td align="center" width="137">หัวหน้าชั้นเรียน</td>
            <td align="center" width="137">ครูประจำชั้น</td>
            <td width="48">&nbsp;</td>
          </tr>
          <?php
          while ($rs = mysqli_fetch_array($result)) {
            $c_id = $rs['c_id'];
            $c_name = $rs['c_name'];
            $std_id = $rs['std_id'];
            $t_id = $rs['t_id'];

            $std_name = "";
            $t_name = "";

            if (!empty($std_id)) {
              $stmt = mysqli_prepare($conn, "SELECT std_name FROM student WHERE std_id = ?");
              mysqli_stmt_bind_param($stmt, "s", $std_id);
              mysqli_stmt_execute($stmt);
              mysqli_stmt_bind_result($stmt, $std_name);
              mysqli_stmt_fetch($stmt);
              mysqli_stmt_close($stmt);
            }

            if (!empty($t_id)) {
              $stmt = mysqli_prepare($conn, "SELECT t_name FROM teacher WHERE t_id = ?");
              mysqli_stmt_bind_param($stmt, "s", $t_id);
              mysqli_stmt_execute($stmt);
              mysqli_stmt_bind_result($stmt, $t_name);
              mysqli_stmt_fetch($stmt);
              mysqli_stmt_close($stmt);
            }
          ?>
            <tr>
              <td width="80" align="center"><?php echo $c_id; ?></td>
              <td width="125" align="center"><?php echo $c_name; ?></td>
              <td width="160" align="center">
                <?php
                if (empty($std_id)) {
                  echo "<a href=\"frm_addclassdetail.php?c_id=$c_id\">";
                  echo "จัดการหัวหน้าชั้นเรียน";
                  echo "</a>";
                } else {
                  echo "<a href=\"frm_addclassdetail.php?c_id=$c_id\">";
                  echo $std_name;
                  echo "</a>";
                }
                ?></td>
              <td width="160" align="center">
                <?php
                if (empty($t_id)) {
                  echo "<a href=\"frm_addclassdetail.php?c_id=$c_id\">";
                  echo "จัดการครูประจำชั้น";
                  echo "</a>";
                } else {
                  echo "<a href=\"frm_addclassdetail.php?c_id=$c_id\">";
                  echo $t_name;
                  echo "</a>";
                }
                ?></td>
              <td align="center"><?php echo "<a href=\"frm_delclass.php?c_id=$rs[c_id]\">" ?> ลบ<?php echo "</a>"; ?></td>
            </tr>
          <?php
          }
          ?>
        </table>
      </td>
    </tr>
    <tr>
      <?php
      include('foot.php');
      ?>
    </tr>
  </table>
</body>

</html>