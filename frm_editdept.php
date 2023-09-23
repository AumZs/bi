<?php
include "connect.php";

$d_id = $_GET['d_id'];
$sql = "SELECT * FROM department WHERE d_id = '$d_id' ";
$result = mysqli_query($conn, $sql)
  or die("Can't query sql");
$rs = mysqli_fetch_array($result);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Untitled Document</title>
  <style type="text/css">
    body,
    td,
    th {
      font-size: 14px;
    }
  </style>
</head>

<body>
  <table style="margin-top: 5%;" width="800" border="1" bordercolor="#6699FF" align="center">
    <?php
    include "head.php";

    ?>
    <?php
    include "admin_menu.php";
    ?>
    <tr style="background-color: white;">
      <td>
        <form id="form1" name="form1" method="post" action="editdept.php">
          <p>&nbsp;</p>
          <table width="600" border="1" bordercolor="#FF6633" align="center" cellpadding="3">
            <tr>
              <td colspan="2" align="center" bgcolor="#0099FF">แก้ไขกลุ่มสาระ</td>
            </tr>
            <tr>
              <td bgcolor="#00CCFF">ชื่อกลุ่มสาระ</td>
              <td bgcolor="#00CCFF"><input type="text" name="d_name" id="d_dame" value="<?php echo "$rs[d_name]"; ?>" />
                <input type="hidden" name="d_id" id="d_id" value="<?php echo "$rs[d_id]"; ?>" />
              </td>
            </tr>
            <tr bgcolor="#3399FF">
              <td colspan="2" align="center"><input type="submit" name="button" id="button" value="บันทึก" />
                <input type="button" onclick=window.history.back() name="button2" id="button2" value="ยกเลิก" />
              </td>
            </tr>
          </table>
          <p>&nbsp;</p>
        </form>
      </td>
    </tr>
    <tr>
      <?php
      include('foot.php');
      ?>
  </table>
</body>

</html>