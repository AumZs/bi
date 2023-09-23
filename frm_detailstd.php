<?php
include "connect.php";

$std_id = $_GET['std_id'];
$sql = "SELECT * FROM student WHERE std_id = '$std_id' ";
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
                <form action="showstudent.php" method="post" enctype="multipart/form-data" name="form1" id="form1">

                    <table width="385" border="1" bordercolor="#84C1EA" align="center" cellpadding="5" cellspacing="0">
                        <tbody>
                            <tr>
                                <td colspan="2" bgcolor="#84C1EA">
                                    <div align="center">
                                        <font color="#FFFFFF">ข้อมูลนักเรียน</font>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2" align="center">
                                    <?php
                                    if ("$rs[std_pic]" != "") {
                                    ?>
                                        <img src="<?php echo "./picture/$rs[std_pic]"; ?>" width="50%" height="50%" />
                                    <?php
                                    }
                                    ?>
                            </tr>
                            <tr>
                                <td width="100">ชื่อ-สกุล</td>
                                <td><label> <?php echo "$rs[std_name]"; ?></label></td>
                            </tr>
                            <tr>
                                <td width="100">ที่อยู่</td>
                                <td><label> <?php echo "$rs[std_address]"; ?></label></td>
                            </tr>
                            <tr>
                                <td width="100">เบอร์</td>
                                <td><label> <?php echo "$rs[std_tel]"; ?></label></td>
                            </tr>
                            <tr>
                                <td width="221">ชื่อผู้ปกครอง</td>
                                <td><?php
                                    $sql1 = "SELECT*FROM parent WHERE pa_id = '$rs[pa_id]' ";
                                    $result1 = mysqli_query($conn, $sql1);
                                    $rs1 = mysqli_fetch_array($result1);
                                    echo "$rs1[pa_name]";
                                    ?></td>
                            </tr>
                            <tr>
                                <td width="221">เบอร์ผู้ปกครอง</td>
                                <td><?php
                                    $sql1 = "SELECT*FROM parent WHERE pa_id = '$rs[pa_id]' ";
                                    $result1 = mysqli_query($conn, $sql1);
                                    $rs1 = mysqli_fetch_array($result1);
                                    echo "$rs1[pa_tel]";
                                    ?></td>
                            </tr>
                            <tr>
                                <td width="221">ห้องเรียน</td>
                                <td><?php
                                    $sql1 = "SELECT*FROM classroom WHERE c_id = '$rs[c_id]' ";
                                    $result1 = mysqli_query($conn, $sql1);
                                    $rs1 = mysqli_fetch_array($result1);
                                    echo "$rs1[c_name]";
                                    ?></td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <div align="center">
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