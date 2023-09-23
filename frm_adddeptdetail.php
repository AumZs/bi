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
      <form action="adddeptdetail.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
        <table width="233" border="1" align="center">
          <tbody>
            <tr>
              <td colspan="2" align="center">จัดการหัวหน้ากลุ่มสาระ</td>
            </tr>
            <tr>
              <td width="84">กลุ่มสาระ</td>
              <td width="100"><?php echo "$rs[d_name] "; ?>
                <input type="hidden" name="d_id" id="d_id" value="<?php echo "$rs[d_id] "; ?>" />
              </td>
            </tr>
            <tr>
              <td>หัวหน้ากลุ่มสาระ</td>
              <td><select name="t_id" id="t_id">
                  <?php
                  $sql2 = "SELECT*FROM teacher WHERE d_id ='$d_id' ";
                  $result2 = mysqli_query($conn, $sql2);
                  while ($rs2 = mysqli_fetch_array($result2)) {
                    echo "<option value=\"$rs2[t_id]\"";
                    if ("rs1[t_id]" == "$rs2[t_id]") {
                      echo 'selected';
                    }
                    echo ">$rs2[t_name]</option>";
                  }
                  ?>
                </select></td>
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