<?php
include "connect.php";

$po_id = $_GET['po_id'];
$sql = "SELECT * FROM position WHERE po_id = '$po_id' ";
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
        <form id="form1" name="form1" method="post" action="editpot.php">
          <p>&nbsp;</p>
          <table width="600" border="1" bordercolor="#FF6633" align="center" cellpadding="3">
            <tr>
              <td colspan="2" align="center" bgcolor="#0099FF">แก้ไขตำแหน่ง</td>
            </tr>
            <tr>
              <td bgcolor="#00CCFF">ชื่อตำแหน่ง</td>
              <td bgcolor="#00CCFF"><input type="text" name="po_name" id="po_name" value="<?php echo "$rs[po_name]"; ?>" />
                <input type="hidden" name="po_id" id="po_id" value="<?php echo "$rs[po_id]"; ?>" />
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