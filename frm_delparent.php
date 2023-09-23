<?php
include "connect.php";

$pa_id = $_GET['pa_id'];
$sql = "SELECT * FROM parent WHERE pa_id = '$pa_id' ";
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
        <form action="delparent.php" method="post" enctype="multipart/form-data" name="form1" id="form1">

          <table width="385" border="1" bordercolor="#84C1EA" align="center" cellpadding="5" cellspacing="0">
            <tbody>
              <tr>
                <td colspan="2" bgcolor="#84C1EA">
                  <div align="center">
                    <font color="#FFFFFF">ลบข้อมูลผู้ปกครอง</font>
                  </div>
                </td>
              </tr>
              <tr>
                <td width="221">รหัสผู้ปกครอง</td>
                <td width="203"><input name="pa_id" type="text" id="pa_id" value="<?php echo "$rs[pa_id]"; ?>" readonly="readonly" />
                  <input type="hidden" name="pa_id" id="pa_id" value="<?php echo "$rs[pa_id]"; ?>" />
                </td>
              </tr>
              <tr>
                <td width="221">ชื่อผู้ปกครอง</td>
                <td width="203"><input name="pa_name" type="text" id="pa_name" value="<?php echo "$rs[pa_name]"; ?>" readonly="readonly"></td>
              </tr>
              <tr>
                <td width="221">อาชีพ</td>
                <td width="203"><input name="pa_occupation" type="text" id="pa_occupation" value="<?php echo "$rs[pa_occupation]"; ?>" readonly="readonly"></td>
              </tr>
              <tr>
                <td width="221">เบอร์โทร</td>
                <td width="203"><input name="pa_tel" type="text" id="pa_tel" value="<?php echo "$rs[pa_tel]"; ?>" readonly="readonly"></td>
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