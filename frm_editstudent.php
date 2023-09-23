<?php
include "connect.php";

$std_id = $_GET['std_id'];
$sql = "SELECT * FROM student WHERE std_id = '$std_id' ";
$result = mysqli_query($conn, $sql)
  or die("Can't query sql");
$rs = mysqli_fetch_array($result);

?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Untitled Document</title>
</head>

<body>
  <table style="margin-top: 5%;" width="800" border="1" align="center" bordercolor="#84C1EA" cellpadding="1" cellspacing="0">
    <tr>
      <?php
      include "head.php";

      ?>
      <?php
      include "admin_menu.php";
      ?>
    <tr style="background-color: white;">
      <td>
        <p>&nbsp;</p>
        <form action="editstudent.php" method="post" enctype="multipart/form-data" name="form1" id="form1">

          <table width="385" border="1" bordercolor="#84C1EA" align="center" cellpadding="5" cellspacing="0">
            <tbody>
              <tr>
                <td colspan="2" bgcolor="#84C1EA">
                  <div align="center">
                    <font color="#FFFFFF">แก้ไขข้อมูลนักเรียน</font>
                  </div>
                </td>
              </tr>
              <tr>
                <td width="221">ชื่อ-สกุล</td>
                <td width="203"><input name="std_name" type="text" id="std_name" value="<?php echo "$rs[std_name]"; ?>" />
                  <input type="hidden" name="std_id" id="std_id" value="<?php echo "$rs[std_id]"; ?>" />
                  <input type="hidden" name="std_pic" id="std_pic" value="<?php echo "$rs[std_pic]"; ?>" />
                </td>
              <tr>
                <td width="221">ที่อยู่</td>
                <td width="203"><textarea name="std_address" rows="2" id="std_address" value="<?php echo "$rs[std_address]"; ?> "><?php echo "$rs[std_address]"; ?></textarea></td>
              </tr>
              <tr>
                <td width="221">เบอร์โทร</td>
                <td width="203"><input name="std_tel" type="text" id="std_tel" value="<?php echo "$rs[std_tel]"; ?>"></td>
              </tr>
              <tr>
                <td width="221">รูป</td>
                <td width="203">
                  <?php
                  if ("$rs[std_pic]" != "") {
                  ?>
                    <img src="<?php echo "./picture/$rs[std_pic]"; ?>" width="100" height="130" />
                  <?php
                  }
                  ?>
                  <input type="file" name="photo" id="photo">
                </td>
              </tr>
              <tr>
                <td width="221">ผู้ปกครอง</td>
                <td width="203"><select name="pa_id" id="pa_id">
                    <?php
                    $sql1 = "SELECT*FROM parent";
                    $result1 = mysqli_query($conn, $sql1);
                    while ($rs1 = mysqli_fetch_array($result1)) {
                      echo "<option value=\"$rs1[pa_id]\"";
                      if ("rs[pa_id]" == "$rs1[pa_id]") {
                        echo 'selected';
                      }
                      echo ">$rs1[pa_name]";
                      echo "</option>\n";
                    }
                    ?>
                  </select></td>
              </tr>
              <tr>
                <td width="221">ชั้นเรียน</td>
                <td width="203"><select name="c_id" id="c_id">
                    <?php
                    $sql1 = "SELECT*FROM classroom";
                    $result1 = mysqli_query($conn, $sql1);
                    while ($rs1 = mysqli_fetch_array($result1)) {
                      echo "<option value=\"$rs1[c_id]\"";
                      if ("rs[c_id]" == "$rs1[c_id]") {
                        echo 'selected';
                      }
                      echo ">$rs1[c_name]";
                      echo "</option>\n";
                    }
                    ?>
                  </select></td>
              </tr>
              <tr>
                <td colspan="2">
                  <div align="center">
                    <input name="button" type="submit" id="button" value="บันทึก">
                    <input type="button" onclick="window.history.back()" name="button2" id="button2" value="ยกเลิก">
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
        </form>
        <p>&nbsp;</p>
      </td>
    </tr>
    <?php
    include('foot.php');
    ?>
  </table>
</body>

</html>