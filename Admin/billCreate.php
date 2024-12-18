<?php
	include "config.php";

	$sql = "SELECT * FROM khachhang WHERE MaKH = ".$_GET['id'];
	$danhsach = $connect->query($sql);
	if(!$danhsach){
		die("Khong the thuc hien cau lenh SQL");
	}
	$dong = $danhsach->fetch_array(MYSQLI_ASSOC);

    $sql = "SELECT MaPhong, GiaPhong FROM Phong WHERE MaPhong = '".$dong['MaPhong']."'";
	$danhsach_phong = $connect->query($sql);
    $dong_phong = $danhsach_phong->fetch_array(MYSQLI_ASSOC);

    $sql = "SELECT TenDichVu, GiaDichVu FROM tbl_dichvu WHERE MaDV = ".$dong['MaDV'];
	$danhsach_dichvu = $connect->query($sql);
    $dong_dichvu = $danhsach_dichvu->fetch_array(MYSQLI_ASSOC);
?>

<h3>Lập hóa đơn</h3>
<form action="index.php?do=billCreate_handle" method="post">
	<table align="center" class="Form">
		<input type="hidden" name="txtMaKH" value="<?php echo $dong['MaKH']; ?>" />
		<input type="hidden" name="txtMaDV" value="<?php echo $dong['MaDV']; ?>" />
		<tr>
			<td>Họ và tên:</td>
			<td><input type="text" name="txtHoVaTen" value="<?php echo $dong['HoVaTen'];?>"/></td>
            <td>Mã phòng:</td>
			<td><input type="text" name="txtMaPhong" value="<?php echo $dong_phong['MaPhong'];?>"/></td>
            
		</tr>
		<tr>
			<td>Năm sinh</td>
			<td>
				<select style = "width: 168px;" name="cbNamSinh" id="">
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
            <td>Giá phòng:</td>
			<td><input type="text" name="txtGiaPhong" value="<?php echo $dong_phong['GiaPhong'];?>"/></td>
		</tr>

		<tr>
			<td>Giới tính:</td>
			<td>
				<select style = "width: 168px;" name="cbGender" id="">
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
            <td>Tên dịch vụ:</td>
			<td><input type="text" name="txtTenDichVu" value="<?php echo $dong_dichvu['TenDichVu'];?>"/></td>
		</tr>
        <tr>
			<td>Số điện thoại:</td>
			<td><input type="text" name="txtDienThoai" value="<?php echo $dong['SoDienThoai'];?>"/></td>
            <td>Giá dịch vụ:</td>
			<td><input type="text" name="txtGiaDichVu" value="<?php echo $dong_dichvu['GiaDichVu'];?>"/></td>
		</tr>
        <tr>
			<td>CCCD:</td>
			<td><input type="text" name="txtCCCD" value="<?php echo $dong['CCCD'];?>"/></td>
            <td>Tổng tiền:</td>
			<td><input type="text" name="txtTongTien" value="<?php echo $dong_dichvu['GiaDichVu'] + $dong_phong['GiaPhong'];?>"/></td>
		</tr>
		
	</table>
	
	<div class="XN">
        <input class="regis" type="submit" value="Xác nhận"/>
    </div>
</form>