<?php
	include "config.php";

	$sql = "SELECT * FROM khachhang WHERE MaKH = " .$_GET['id'];
	$danhsach = $connect->query($sql);
	if(!$danhsach){
		die("Khong the thuc hien cau lenh SQL");
	}
	$dong = $danhsach->fetch_array(MYSQLI_ASSOC);
?>

<h3>Sửa Thông Tin Khách Hàng</h3>
<form action="index.php?do=customerEdit_handle" method="post">
	<table align="center" class="Form">
		<input type="hidden" name="txtMaKH" value="<?php echo $dong['MaKH']; ?>" />
		<tr>
			<td>Họ và tên:</td>
			<td><input type="text" name="txtHoVaTen" value="<?php echo $dong['HoVaTen'];?>"/></td>
		</tr>
		<tr>
			<td>Năm sinh</td>
			<td>
				<select class="w-200"  name="cbNamSinh" id="">
					<option value="<?php echo $dong['NamSinh'];?>"><?php echo $dong['NamSinh'];?></option>
					<?php
						echo '<script>';
						echo 'var today = new Date();';
						echo 'var nam = today.getFullYear();';

						echo 'for(var i = 1954; i <= nam; i++){';
							echo 'if(i != ' .$dong['NamSinh'] . ')';
								echo 'document.write("<option value = '."+i+".'>" + i + "</option>");';
						echo '}';
						echo '</script>';
					?>
				</select>
			</td>
		</tr>

		<tr>
			<td>Giới tính:</td>
			<td>
				<select name="cbGender" id="">
					<?php
						if($dong['GioiTinh'] == 1)
						{
							echo "<option selected='selected' value='".$dong['GioiTinh']."'>Nam</option>";
							echo "<option value='".$dong['GioiTinh']."'>Nữ</option>";
						}
						else{
							echo "<option  value='".$dong['GioiTinh']."'>Nam</option>";
							echo "<option selected='selected' value='".$dong['GioiTinh']."'>Nữ</option>";
						}	
					?>
				</select>
			</td>
		</tr>
        <tr>
			<td>Số điện thoại:</td>
			<td><input type="text" name="txtDienThoai" value="<?php echo $dong['SoDienThoai'];?>"/></td>
		</tr>
        <tr>
			<td>CCCD:</td>
			<td><input type="text" name="txtCCCD" value="<?php echo $dong['CCCD'];?>"/></td>
		</tr>
		
	</table>
	
	<div class="XN">
        <input class="regis" type="submit" value="Xác nhận"/>
    </div>
</form>