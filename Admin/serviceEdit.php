<?php
	$MaDV = $_GET['id'];

	$sql = "SELECT * FROM tbl_dichvu WHERE MaDV = $MaDV";
	$danhsach = $connect->query($sql);
	if(!$danhsach){
		die("Không thể thực hiện câu lệnh SQL: " . $connect->connect_error);
	}
	$dong = $danhsach->fetch_array(MYSQLI_ASSOC);
?>

<h3>Sửa dịch vụ</h3>
<form action="index.php?do=serviceEdit_handle" method="post">
	<table align="center" class="Form">
		<input type="hidden" name="txtMaDV" value="<?php echo $dong['MaDV']; ?>" />
		<tr>
			<td>Tên dịch vụ:</td>
			<td><input type="text" name="txtTenDV" value="<?php echo $dong['TenDichVu'];?>"/></td>
		</tr>
        <tr>
			<td>Giá dịch vụ:</td>
			<td><input type="text" name="txtGiaDV" value="<?php echo $dong['GiaDichVu'];?>"/></td>
		</tr>
	</table>
	
	<div class="XN">
        <input class="regis" type="submit" value="Cập nhật"/>
    </div>
</form>