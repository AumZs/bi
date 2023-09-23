<?php
include('connect.php');
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
      <form id="form1" name="form1" method="post" action="addwork.php"><input type="hidden" name="w_id" id="w_id" />
        <table width="344" border="1" align="center" cellpadding="5" cellspacing="0">
          <tr>
            <td colspan="2" align="center">เพิ่มผลงาน</td>
          </tr>
          <tr>
            <td width="273">ชื่อผลงาน</td>
            <td width="45"><input type="text" name="w_name" id="w_name" /></td>
          </tr>
          <tr>
            <td width="273">ปีที่ได้รับ</td>
            <td width="45"><input type="text" name="w_year" id="w_year" /></td>
          </tr>
          <tr>
            <td width="273">หน่วยงานที่มอบ</td>
            <td width="45"><input type="text" name="w_org" id="w_org" /></td>
          </tr>
          <tr>
            <td colspan="2" align="center"><input type="submit" name="button" id="button" value="บันทึก" />
              <input type="reset" onclick=window.history.back() name="button2" id="button2" value="ยกเลิก" />
            </td>
          </tr>
        </table>
      </form>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
    </td>
  </tr>
  <tr>
    <?php
    include('foot.php');
    ?>
  </tr>
</table>

</html>