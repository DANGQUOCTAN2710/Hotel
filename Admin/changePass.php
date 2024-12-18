<?php
    $MaNV = $_GET['id'];

    $sql = "SELECT * from tbl_nhanvien WHERE idNhanVien = " . $MaNV;
    $danhsach = $connect->query($sql);

    if (!$danhsach) {
		die("Không thể thực hiện câu lệnh SQL: " . $connect->connect_error);
	}
	
	$dong = $danhsach->fetch_array(MYSQLI_ASSOC)
?>


<h3>Đổi mật khẩu</h3>
<form action="index.php?do=changePass_handle" method="post">
	<table align="center" class="Form">
		<tr>
			<td>Nhập mật khẩu cũ: </td>
			<td><input type="password" name="txtOldPass" /></td>
		</tr>
        <tr>
			<td>Nhập mật khẩu mới:</td>
			<td><input type="password" name="txtNewPass" /></td>
		</tr>
        <tr>
			<td>Xác nhận mật khẩu mới:</td>
			<td><input type="password" name="txtNewPassAcp" /></td>
		</tr>
	</table>
	
	<div class="XN">
        <input class="regis" type="submit" value="Xác nhận"/>
    </div>
</form>