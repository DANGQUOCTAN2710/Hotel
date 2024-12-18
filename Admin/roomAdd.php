<h3>Thêm Phòng Mới</h3>
<form action="index.php?do=roomAdd_handle" method="post" enctype="multipart/form-data">
	<table align="center" class="Form">
		<tr>
			<td>Mã phòng</td>
			<td><input class="w-500"  type="text" name="txtMaPhong" /></td>
		</tr>
        <tr>
			<td>Loại phòng</td>
			<td>
                <select class="w-500"  name="cbLoaiPhong" id="">
                    <option value="lp">Loại phòng</option>
                    <option value="Vip">Vip</option>
                    <option value="NVip">NVip</option>
                </select>
            </td>
		</tr>
        <tr>
			<td>Số giường:</td>
			<td><input class="w-500"  type="text" name="txtSoGiuong" /></td>
		</tr>
        <tr>
			<td>Sức chứa:</td>
			<td><input class="w-500"  type="text" name="txtSucChua" /></td>
		</tr>
		<tr>
			<td>Giá phòng:</td>
			<td><input class="w-500"  type="text" name="txtGiaPhong" /></td>
		</tr>
		<tr>
			<td>Thiết bị:</td>
			<td>
                <select class="w-500"  name="cbThietBi" id="">
                    <option value="tb">Thiết bị</option>
                    <option value="Có máy lạnh">Có máy lạnh</option>
                    <option value="Không máy lạnh">Không máy lạnh</option>
            </select>
        </td>
		</tr>
        <tr>
            <td>Tải lên ảnh:</td>
            <td>
                <input class="w-500" type="file" name="txtHinhAnh" id = "fileSelect">
            </td>
        </tr>
	</table>
	
	<div class="XN">
        <input class="regis" type="submit" value="Xác nhận"/>
    </div>
</form>