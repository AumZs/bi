<?php
include "connect.php";
$d_id = $_GET['d_id'];
$sql = "SELECT*FROM department WHERE d_id = '$d_id'";
$result = mysqli_query($conn, $sql)
  or die("Can't query sql");
$rs = mysqli_fetch_array($result);

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Home</title>
</head>

<body>
  <table style="margin-top: 5%;" width="762" border="1" align="center" cellpadding="3" cellspacing="0" bordercolor="#0000FF">
    <?php
    include "head.php";

    ?>
    <?php
    include "admin_menu.php";
    ?>
    <tr style="background-color: white;">
      <td>
        <form id="form1" name="form1" method="post" action="deldept.php">
          <table width="344" border="1" align="center" cellpadding="5" cellspacing="0">
            <tr>
              <td colspan="2" align="center">ลบกลุ่มสาระ</td>
            </tr>
            <tr>
              <td width="82">ชื่อกลุ่มสาระ</td>
              <td width="236"><input name="d_name" type="text" id="d_name" value="<?php echo "$rs[d_name]"; ?>" />
                <input name="d_id" type="hidden" id="d_id" value="<?php echo "$rs[d_id]"; ?>" />
              </td>
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
</body>

</html>