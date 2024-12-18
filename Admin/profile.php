<?php
	include "config.php";

	$MaNV = $_GET['id'];
	
	$sql = "select * from `tbl_nhanvien` where idNhanVien = '$MaNV'";
	
	$danhsach = $connect->query($sql);
	//Nếu kết quả kết nối không được thì xuất báo lỗi và thoát
	if (!$danhsach) {
		die("Không thể thực hiện câu lệnh SQL: " . $connect->connect_error);
	}
	
	$dong = $danhsach->fetch_array(MYSQLI_ASSOC)
?>

<h3> Thông tin cá nhân</h3>
<form action="index.php?do=profileEdit_handle" method="post">
	<table align="center" class="Form">
		<input type="hidden" name="txtidNhanVien" value="<?php echo $dong['idNhanVien']; ?>" />
		<tr>
			<td>Họ và tên:</td>
			<td><input style="width: 500px;" type="text" name="HoVaTen" value="<?php echo $dong['HoVaTen']; ?>"/></td>
		</tr>
        <tr>
			<td>Số điện thoại:</td>
			<td><input style="width: 500px;" type="text" name="DienThoai" value="<?php echo $dong['SoDienThoai']; ?>"/></td>
		</tr>
        <tr>
			<td>CCCD:</td>
			<td><input style="width: 500px;" type="text" name="CCCD" value="<?php echo $dong['CCCD']; ?>"/></td>
		</tr>
		<tr>
			<td>Tên đăng nhập:</td>
			<td><input style="width: 500px;" type="text" name="TenDangNhap" value="<?php echo $dong['TenDangNhap']; ?>"/></td>
		</tr>
	</table>
	
	<div class="XN">
        <input class="regis" type="submit" value="Cập nhật"/>
    </div>
</form>

<!-- 
	
 -->


