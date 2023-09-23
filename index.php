<?php
include "connect.php";

if (isset($_POST['txt_search'])) {
	$txt_search = $_POST['txt_search'];
} else {
	$txt_search = "";
}
if ($txt_search != "") {
	$sql = "SELECT teacher.t_id, teacher.t_name,department.d_name FROM teacher,department WHERE teacher.d_id = '$txt_search' AND teacher.d_id = department.d_id";
} else {
	$sql = "SELECT teacher.t_id,teacher.t_name,department.d_name FROM teacher,department WHERE teacher.d_id = department.d_id";
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
				<form id="form1" name="form1" method="post" action="index.php">
					<table width="620" border="0" align="center" cellpadding="5" cellspacing="0">
						<tr>
							<td><strong>ชื่อกลุ่มสาระ</strong>
								<label for="select">:</label>
								<select name="txt_search" id="txt_search">
									<option value="" selected="selected">ทั้งหมด</option>
									<?php
									$sql2 = "SELECT*FROM department";
									$result2 = mysqli_query($conn, $sql2);
									while ($rs2 = mysqli_fetch_array($result2)) {
										echo "<option value=\"$rs2[d_id]\" ";
										if ("$txt_search" == "$rs2[d_id]") {
											echo 'selected';
										}
										echo ">$rs2[d_name]";
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
						<td>รายงานข้อมูลครู</td>
					</tr>
				</table>
				<table width="620" border="1" align="center" cellpadding="5" cellspacing="0" bordercolor="#5092CE">
					<tr>
						<td width="120">รหัสกลุ่มสาระ</td>
						<td width="170">ชื่อกลุ่มสาระ</td>
						<td width="80">&nbsp;</td>
					</tr>
					<?php
					while ($rs = mysqli_fetch_array($result)) {
					?>
						<tr>
							<td width="120"><?php echo "$rs[t_name]"; ?></td>
							<td width="170"><?php echo "$rs[d_name]"; ?></td>
							<td width="170"><?php echo "<a href=\"frm_detailteacher.php?t_id=$rs[t_id]\">"; ?>รายละเอียด<?php echo "</a>"; ?></td>
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