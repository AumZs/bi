<?php
include "connect.php";

$c_id = $_GET['c_id'];
$sql = "SELECT * FROM classroom WHERE c_id = '$c_id' ";
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
  <table style="margin-top: 5%;" width="800" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#333366">
    <?php
    include "head.php";
    include "admin_menu.php";
    ?>
    <tr style="background-color: white;">
      <td>
        <p>&nbsp;</p>
        <form action="addclassdetail.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
          <table width="455" border="1" bordercolor="#333366" align="center" cellpadding="5" cellspacing="0">
            <tbody>
              <tr bgcolor="#84C1EA">
                <td colspan="2" bgcolor="#84C1EA">
                  <div align="center">แก้ไขข้อมูลนักเรียน</div>
                </td>
              </tr>
              <tr>
                <td width="206">ชั้นเรียน</td>
                <td width="218"><input name="c_name" type="text" id="c_name" value="<?php echo "$rs[c_name]"; ?>" readonly="readonly">
                  <input name="c_id" type="hidden" id="c_id" value="<?php echo "$rs[c_id]"; ?>" />
                </td>
              </tr>
              <tr>
                <td width="206">ครูประจำชั้น</td>
                <td width="218"><select name="t_id" id="t_id">
                    <?php
                    $sql1 = "SELECT * FROM teacher";
                    $result1 = mysqli_query($conn, $sql1);
                    while ($rs1 = mysqli_fetch_array($result1)) {
                      echo "<option value=\"$rs1[t_id]\" ";
                      if ("$rs[t_id]" == "$rs1[t_id]") {
                        echo 'selected';
                      }
                      echo ">$rs1[t_name]";
                      echo "</option>\n";
                    }
                    ?>
                  </select></td>
              </tr>
              <tr>
                <td width="206">หัวหน้าชั้นเรียน</td>
                <td width="218"><select name="std_id" id="std_id">
                    <?php
                    $sql2 = "SELECT * FROM student";
                    $result2 = mysqli_query($conn, $sql2);
                    while ($rs2 = mysqli_fetch_array($result2)) {
                      echo "<option value=\"$rs2[std_id]\" ";
                      if ("$rs[std_id]" == "$rs2[std_id]") {
                        echo 'selected';
                      }
                      echo ">$rs2[std_name]";
                      echo "</option>\n";
                    }
                    ?> </select></td>
              </tr>
              <tr>
                <td colspan="2">
                  <div align="center">
                    <input type="submit" name="button" id="button" value="บันทึก">
                    <input type="reset" onclick=window.history.back() name="button2" id="button2" value="ยกเลิก">
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
    include "foot.php";
    ?>
  </table>
</body>

</html>