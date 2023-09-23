<?php
include "connect.php";
$c_id = $_GET['c_id'];
$sql = "SELECT * FROM classroom WHERE c_id = '$c_id'";
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
  <table style="margin-top: 5%;" width="694" border="1" bordercolor="#000000" align="center" cellspacing="0">
    <?php
    include "head.php";

    ?>
    <?php
    include "admin_menu.php";
    ?>
    <tr style="background-color: white;">
      <td height="143">
        <form id="form1" name="form1" method="post" action="delclass.php">
          <table width="300" border="1" align="center" cellpadding="5" cellspacing="0">
            <tr align="center" valign="middle">
              <td colspan="2" bgcolor="#45E0EC">ลบชั้นเรียน</td>
            </tr>
            <tr>
              <td width="200">ชื่อชั้นเรียน</td>
              <td width="274">
                <input type="text" name="c_name" id="c_name" value="<?php echo "$rs[c_name]"; ?>" />
                <input name="c_id" type="hidden" id="c_id" value="<?php echo "$rs[c_id]"; ?>" />
              </td>
            </tr>
            <tr>
              <td colspan="2" align="center"><input type="submit" name="button" id="button" value="ลบข้อมูล" />
                <input type="reset" onclick=window.history.back() name="button2" id="button2" value="ยกเลิก" />
              </td>
            </tr>
          </table>
        </form>
      </td>
    </tr>
    <?php
    include('foot.php');
    ?>
  </table>
</body>

</html>