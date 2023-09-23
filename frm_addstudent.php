<?php
include "connect.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Home</title>
</head>


<table style="margin-top: 5%;" width="762" border="1" align="center" cellpadding="3" cellspacing="0" bordercolor="#0000FF">
  <?php
  include "head.php";

  ?>
  <?php
  include "admin_menu.php";
  ?>
  <tr style="background-color: white;">
    <td>
      <form action="addstudent.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
        <table width="500" height="230" border="1" align="center">
          <tbody>
            <tr>
              <td colspan="2">เพิ่มข้อมูลนักเรียน</td>
            </tr>
            <tr>
              <td width="180">ชื่อ-สกุล</td>
              <td width="250"><label for="textfield"></label>
                <input type="text" name="std_name" id="std_name" />
              </td>
            </tr>
            <tr>
              <td width="100">ที่อยู่</td>
              <td width="250"><label for="textarea"></label>
                <textarea name="std_address" id="std_address" cols="45" rows="2"></textarea>
              </td>
            </tr>
            <tr>
              <td width="100">เบอร์โทร</td>
              <td width="250"><label for="textfield2"></label>
                <input type="text" name="std_tel" id="std_tel" />
              </td>
            </tr>
            <tr>
              <td>รูป</td>
              <td><label for="textfield5"></label>
                <label for="fileField"></label>
                <input type="file" name="photo" id="photo" />
              </td>
            </tr>
            <tr>
              <td>ผู้ปกครอง</td>
              <td><label for="select1"></label>
                <select name="pa_id" id="pa_id">
                  <?php
                  $sql1 = "SELECT*FROM parent";
                  $result1 = mysqli_query($conn, $sql1);
                  while ($rs1 = mysqli_fetch_array($result1)) {
                    echo "<option value=$rs1[pa_id]>$rs1[pa_name]</option>";
                  }
                  ?>
                </select>
              </td>
            </tr>
            <tr>
              <td>ชั้นเรียน</td>
              <td><label for="select2"></label>
                <select name="c_id" id="c_id">
                  <?php
                  $sql1 = "SELECT*FROM classroom";
                  $result1 = mysqli_query($conn, $sql1);
                  while ($rs1 = mysqli_fetch_array($result1)) {
                    echo "<option value=$rs1[c_id]>$rs1[c_name]</option>";
                  }
                  ?>
                </select>
              </td>
            </tr>
            <tr>
              <td colspan="2" align="center"><input type="submit" name="button" id="button" value="บันทึก" />
                <input type="button" onclick=window.history.back() name="button2" id="button2" value="ยกเลิก" />
              </td>
            </tr>
          </tbody>
        </table>
      </form>
    </td>
  </tr>
  <tr>
    <?php
    include('foot.php');
    ?>
  </tr>
</table>

</html>