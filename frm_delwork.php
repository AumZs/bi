<?php
include "connect.php";

$w_id = $_GET['w_id'];
$sql = "SELECT * FROM work WHERE w_id = '$w_id' ";
$result = mysqli_query($conn, $sql)
  or die("Can't query sql");
$rs = mysqli_fetch_array($result);

?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>ลบข้อมูลผลงาน</title>
</head>

<body>
  <table style="margin-top: 5%;" width="800" border="1" align="center" bordercolor="#84C1EA" cellpadding="1" cellspacing="0">
    <tr>
      <<?php
        include "head.php";

        ?> <?php
            include "admin_menu.php";
            ?> <tr style="background-color: white;">
        <td>
          <p>&nbsp;</p>
          <form action="delwork.php" method="post" enctype="multipart/form-data" name="form1" id="form1">

            <table width="385" border="1" bordercolor="#84C1EA" align="center" cellpadding="5" cellspacing="0">
              <tbody>
                <tr>
                  <td colspan="2" bgcolor="#84C1EA">
                    <div align="center">
                      <font color="#FFFFFF">ลบข้อมูลผลงาน</font>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td width="221">ชื่อผลงาน</td>
                  <td width="203"><input name="w_name" type="text" id="w_name" value="<?php echo "$rs[w_name]"; ?>" readonly="readonly" />
                    <input type="hidden" name="w_id" id="w_id" value="<?php echo "$rs[w_id]"; ?>" />
                  </td>
                </tr>
                <tr>
                  <td width="221">ปีที่ได้รับ</td>
                  <td width="203"><input name="w_year" type="text" id="w_year" value="<?php echo "$rs[w_year]"; ?>" readonly="readonly"></td>
                </tr>
                <tr>
                  <td width="221">หน่วยงานที่มอบ</td>
                  <td width="203"><input name="w_org" type="text" id="w_org" value="<?php echo "$rs[w_org]"; ?>" readonly="readonly"></td>
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