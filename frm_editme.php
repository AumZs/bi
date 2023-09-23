<?php
session_start();
if (isset($_SESSION["valid_uname"]) && isset($_SESSION["valid_pwd"]) && isset($_SESSION["valid_teacher"])) {
  include "connect.php";

  $t_username = $_SESSION["valid_uname"];
  $sql = "SELECT * FROM teacher WHERE t_username = '$t_username' ";
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
        include "teacher_menu.php";
        ?>
      <tr style="background-color: white;">
        <td>
          <p>&nbsp;</p>
          <form action="editme.php" method="post" enctype="multipart/form-data" name="form1" id="form1">

            <table width="385" border="1" bordercolor="#84C1EA" align="center" cellpadding="5" cellspacing="0">
              <tbody>
                <tr>
                  <td colspan="2" bgcolor="#84C1EA">
                    <div align="center">
                      <font color="#FFFFFF">แก้ไขข้อมูลอาจารย์</font>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td width="221">Username</td>
                  <td width="203"><input name="t_username" type="text" id="t_username" value="<?php echo "$rs[t_username]"; ?>" readonly="readonly" />
                    <input type="hidden" name="t_id" id="t_id" value="<?php echo "$rs[t_id]"; ?>" />
                    <input type="hidden" name="t_pic" id="t_pic" value="<?php echo "$rs[t_pic]"; ?>" />
                  </td>

                </tr>
                <tr>
                  <td width="221">Password</td>
                  <td width="203"><input name="t_password" type="text" id="t_password" value="<?php echo "$rs[t_password]"; ?>"></td>
                </tr>
                <tr>
                  <td width="221">ชื่อ-สกุล</td>
                  <td width="203"><input name="t_name" type="text" id="t_name" value="<?php echo "$rs[t_name]"; ?>"></td>
                </tr>
                <tr>
                  <td width="221">ที่อยู่</td>
                  <td width="203"><textarea name="t_address" rows="2" id="t_address" value="<?php echo "$rs[t_address]"; ?> "><?php echo "$rs[t_address]"; ?></textarea></td>
                </tr>
                <tr>
                  <td width="221">เบอร์โทร</td>
                  <td width="203"><input name="t_tel" type="text" id="t_tel" value="<?php echo "$rs[t_tel]"; ?>"></td>
                </tr>
                <tr>
                  <td width="221">รูป</td>
                  <td width="203">
                    <?php
                    if ("$rs[t_pic]" != "") {
                    ?>
                      <img src="<?php echo "./picture/$rs[t_pic]"; ?>" width="100" height="130" />
                    <?php
                    }
                    ?>
                    <input type="file" name="photo" id="photo">
                  </td>
                </tr>
                <tr>
                  <td width="221">ตำแหน่ง</td>
                  <td width="203"><select name="po_id" id="po_id">
                      <?php
                      $sql1 = "SELECT * FROM position";
                      $result1 = mysqli_query($conn, $sql1);

                      while ($rs1 = mysqli_fetch_array($result1)) {
                        echo "<option value=\"$rs1[po_id]\"";

                        if ($rs['po_id'] == $rs1['po_id']) {
                          echo ' selected="selected"';
                        }

                        echo ">$rs1[po_name]</option>\n";
                      }
                      ?>

                    </select></td>
                </tr>
                <tr>
                  <td width="221">กลุ่มสาระ</td>
                  <td width="203"><select name="d_id" id="d_id">
                      <?php
                      $sql1 = "SELECT * FROM department";
                      $result1 = mysqli_query($conn, $sql1);

                      while ($rs1 = mysqli_fetch_array($result1)) {
                        echo "<option value=\"$rs1[d_id]\"";

                        if ($rs['d_id'] == $rs1['d_id']) {
                          echo ' selected="selected"';
                        }

                        echo ">$rs1[d_name]</option>\n";
                      }
                      ?>
                    </select></td>
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
<?php
} else {
  echo "<script> alert('Please Login'); window.location='frm_login.php';</script> ";
  exit();
}
?>