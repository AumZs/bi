<?php
include "connect.php";

if (isset($_POST['txt_search'])) {
    $txt_search = $_POST['txt_search'];
} else {
    $txt_search = "";
}
if ($txt_search != "") {
    $sql = "SELECT student.std_id, student.std_name,classroom.c_name FROM student,classroom WHERE student.c_id = '$txt_search' AND student.c_id = classroom.c_id";
} else {
    $sql = "SELECT student.std_id,student.std_name,classroom.c_name FROM student,classroom WHERE student.c_id = classroom.c_id";
}
$result = mysqli_query($conn, $sql)
    or die("3. ไม่สามารถประมวลผลค่าสั่งได้") . mysqli_error($conn);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Untitled Document</title>
</head>

<body>
    <table style="margin-top: 6%" width="800" border="1" align="center" bordercolor="#0066CC">
        <?php
        include "head.php";

        ?>
        <?php
        include "menu.php";
        ?>
        <tr style="background-color: white;">

            <td>
                <p>&nbsp;</p>
                <form id="form1" name="form1" method="post" action="indexstd.php">
                    <table width="620" border="0" align="center" cellpadding="5" cellspacing="0">
                        <tr>
                            <td><strong>ห้องเรียน</strong>
                                <label for="select">:</label>
                                <select name="txt_search" id="txt_search">
                                    <option value="" selected="selected">ทั้งหมด</option>
                                    <?php
                                    $sql2 = "SELECT*FROM classroom";
                                    $result2 = mysqli_query($conn, $sql2);
                                    while ($rs2 = mysqli_fetch_array($result2)) {
                                        echo "<option value=\"$rs2[c_id]\" ";
                                        if ("$txt_search" == "$rs2[c_id]") {
                                            echo 'selected';
                                        }
                                        echo ">$rs2[c_name]";
                                        echo "</option>\n";
                                    }
                                    ?>
                                </select>
                                <input type="submit" name="button" id="button" value="ค้นหา" />
                                <div align="right"></div>
                            </td>
                        </tr>
                    </table>
                </form>
                <p>&nbsp;</p>

                <table width="620" border="0" align="center" cellpadding="5" cellspacing="0">
                    <tr>
                        <td>ข้อมูลนักเรียนในชั้นเรียน</td>
                    </tr>
                </table>
                <table width="620" border="1" align="center" cellpadding="5" cellspacing="0" bordercolor="#5092CE">
                    <tr>
                        <td width="120">รหัสห้องเรียน</td>
                        <td width="170">ชื่อนักเรียน</td>
                        <td width="80">&nbsp;</td>
                    </tr>
                    <?php
                    while ($rs = mysqli_fetch_array($result)) {
                    ?>
                        <tr>
                            <td width="120"><?php echo "$rs[c_name]"; ?></td>
                            <td width="170"><?php echo "$rs[std_name]"; ?></td>
                            <td width="170"><?php echo "<a href=\"frm_detailstd.php?std_id=$rs[std_id]\">"; ?>รายละเอียด<?php echo "</a>"; ?></td>
                        </tr>

                    <?php
                    }
                    mysqli_close($conn);
                    ?>
                </table>
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