<?php
include "connect.php";

$t_id = $_GET['t_id'];
$sql = "SELECT * FROM teacher WHERE t_id = '$t_id' ";
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
      include "menu.php";
      ?>
    <tr style="background-color: white;">
      <td>
        <p>&nbsp;</p>
        <form action="showteacher.php" method="post" enctype="multipart/form-data" name="form1" id="form1">

          <table width="385" border="1" bordercolor="#84C1EA" align="center" cellpadding="5" cellspacing="0">
            <tbody>
              <tr>
                <td colspan="2" bgcolor="#84C1EA">
                  <div align="center">
                    <font color="#FFFFFF">ข้อมูลอาจารย์</font>
                  </div>
                </td>
              </tr>
              <tr>
                <td colspan="2" align="center">
                  <?php
                  if ("$rs[t_pic]" != "") {
                  ?>
                    <img src="<?php echo "./picture/$rs[t_pic]"; ?>" width="50%" height="50%" />
                  <?php
                  }
                  ?>
              </tr>
              <tr>
                <td width="100">ชื่อ-สกุล</td>
                <td><label> <?php echo "$rs[t_name]"; ?></label></td>
              </tr>
              <tr>
                <td width="100">ที่อยู่</td>
                <td><label> <?php echo "$rs[t_address]"; ?></label></td>
              </tr>
              <tr>
                <td width="100">เบอร์</td>
                <td><label> <?php echo "$rs[t_tel]"; ?></label></td>
              </tr>
              <tr>
                <td width="100">Username</td>
                <td><label> <?php echo "$rs[t_username]"; ?></label></td>
              </tr>
              <!-- <tr>
                <td width="100">Password</td>
                <td><label> <?php echo "$rs[t_password]"; ?></label></td>
              </tr> -->
              <tr>
                <td width="221">ตำแหน่ง</td>
                <td><?php
                    $sql1 = "SELECT*FROM position WHERE po_id = '$rs[po_id]' ";
                    $result1 = mysqli_query($conn, $sql1);
                    $rs1 = mysqli_fetch_array($result1);
                    echo "$rs1[po_name]";
                    ?></td>
              </tr>
              <tr>
                <td width="221">กลุ่มสาระ</td>
                <td><?php
                    $sql1 = "SELECT*FROM department WHERE d_id = '$rs[d_id]' ";
                    $result1 = mysqli_query($conn, $sql1);
                    $rs1 = mysqli_fetch_array($result1);
                    echo "$rs1[d_name]";
                    ?></td>
              </tr>
              <tr>
                <td colspan="2">
                  <div width="100%" align="center">
                    <input type="button" onclick=window.history.back(); name="button2" id="button2" value="Back" />
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