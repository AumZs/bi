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
      <form action="addparent.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
        <table width="400" height="230" border="1" align="center">
          <tbody>
            <tr>
              <td colspan="2" align="center">เพิ่มข้อมูลผู้ปกครอง</td>
            </tr>
            <tr>
              <td width="200">เลขที่บัตรประจำตัวประชาชน</td>
              <td width="200"><label for="textfield"></label>
                <input type="text" name="pa_id" id="pa_id" />
              </td>
            </tr>
            <tr>
              <td>ชื่อ-สกุล</td>
              <td width="100"><label for="textfield2"></label>
                <input type="text" name="pa_name" id="pa_name" />
              </td>
            </tr>
            <tr>
              <td>อาชีพ</td>
              <td><label for="textfield3"></label>
                <input type="text" name="pa_occupation" id="pa_occupation" />
              </td>
            </tr>
            <tr>
              <td>เบอร์โทร</td>
              <td><label for="textfield4"></label>
                <input type="text" name="pa_tel" id="pa_tel" />
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