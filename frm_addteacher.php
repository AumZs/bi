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
      <form action="addteacher.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
        <table width="233" height="230" border="1" align="center">
          <tbody>
            <tr>
              <td colspan="2">เพิ่มข้อมูลอาจารย์</td>
            </tr>
            <tr>
              <td width="84">ชื่อ-สกุล</td>
              <td width="100"><label for="textfield"></label>
                <input type="text" name="t_name" id="t_name" />
              </td>
            </tr>
            <tr>
              <td width="84">ที่อยู่</td>
              <td width="100"><label for="textfield2"></label>
                <input type="text" name="t_address" id="t_address" />
              </td>
            </tr>
            <tr>
              <td>เบอร์โทร</td>
              <td><label for="textarea"></label>
                <textarea name="t_tel" id="t_tel" cols="45" rows="2"></textarea>
              </td>
            </tr>
            <tr>
              <td>Username</td>
              <td><label for="textfield3"></label>
                <input type="text" name="t_username" id="t_username" />
              </td>
            </tr>
            <tr>
              <td>Password</td>
              <td><label for="textfield4"></label>
                <input type="text" name="t_password" id="t_password" />
              </td>
            </tr>
            <tr>
              <td>รูป</td>
              <td><label for="textfield5"></label>
                <label for="fileField"></label>
                <input type="file" name="photo" id="photo" height="180px" />
              </td>
            </tr>
            <tr>
              <td>ตำเเหน่ง</td>
              <td><label for="po_id"></label>
                <select name="po_id" id="po_id">
                  <?php
                  $sql1 = "SELECT*FROM position";
                  $result1 = mysqli_query($conn, $sql1);
                  while ($rs1 = mysqli_fetch_array($result1)) {
                    echo "<option value=$rs1[po_id]>$rs1[po_name]</option>";
                  }
                  ?>
                </select>
              </td>
            </tr>
            <tr>
              <td>กลุ่มสาระ</td>
              <td><label for="select2"></label>
                <select name="d_id" id="d_id">
                  <?php
                  $sql1 = "SELECT*FROM department";
                  $result1 = mysqli_query($conn, $sql1);
                  while ($rs1 = mysqli_fetch_array($result1)) {
                    echo "<option value=$rs1[d_id]>$rs1[d_name]</option>";
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