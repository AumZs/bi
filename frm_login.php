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
    <tr style="background-color: white;">
      <td>
        <p>&nbsp;</p>
        <form action="login.php" method="post" enctype="multipart/form-data" name="form1" id="form1">

          <table width="385" border="1" bordercolor="#84C1EA" align="center" cellpadding="5" cellspacing="0">
            <tbody>
              <tr>
                <td colspan="2" bgcolor="#84C1EA">
                  <div align="center">
                    <font color="#FFFFFF">เข้าสู่ระบบ</font>
                  </div>
                </td>
              </tr>
              <tr>
                <td width="221" class="style2">Name</td>
                <td width="203"><input name="login" type="text" />
              </tr>
              <tr>
                <td class="style2">Password</td>
                <td width="203"><input name="passwd" type="text" id="passwd"></td>
              </tr>
              <tr>
                <td class="stlye2">Status</td>
                <td><br>
                  <label>
                    <input type="radio" name="user_status" id="user_status_o" value="1" checked="checked" />
                    ครูอาจารย์ </label>
                  <br>
                  <label>
                    <input type="radio" name="user_status" id="user_status_2" value="0" />
                    ผู้ดูแลระบบ </label>
                  </br>
                  </p>
                </td>
              </tr>
          </table>
          <p align="center">
            <input name="submit" type="submit" value="เข้าสู่ระบบ" />
            &nbsp;&nbsp;
            <input type="reset" name="submit2" value="ยกเลิก">
          </p>
        </form>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
      </td>
    </tr>
    <?php
    include('foot.php');
    ?>
  </table>
</body>

</html>