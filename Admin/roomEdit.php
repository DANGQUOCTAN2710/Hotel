<?php
    $MaPhong = $_GET['id'];

    $sql = "SELECT * FROM phong WHERE idPhong = $MaPhong";
    $danhsach = $connect->query($sql);
    if(!$danhsach){
        die("Không thể thực hiện câu lệnh SQL: " . $connect->connect_error);
    }

    $dong = $danhsach->fetch_array(MYSQLI_ASSOC);
?>

<h3>Sửa thông tin phòng</h3>
<form action="index.php?do=roomEdit_handle" method="post" enctype="multipart/form-data">
	<input type="hidden" name="txtIdPhong" value="<?php echo $dong['idPhong']; ?>" />
	<table align="center" class="Form">
        <tr>
			<td>Loại phòng</td>
			<td>
                <select class="w-500"  name="cbLoaiPhong" id="">
                    <?php
                        if($dong['LoaiPhong'] == "Vip"){
                            echo '<option selected = "selected" value="Vip">Vip</option>';
                            echo '<option value="NVip">NVip</option>';
                        }
                        else{
                            echo '<option value="Vip">Vip</option>';
                            echo '<option selected = "selected" value="NVip">NVip</option>';
                        }
                    ?>
                </select>
            </td>
		</tr>
        <tr>
			<td>Số giường:</td>
			<td><input class="w-500"  type="text" name="txtSoGiuong" value="<?php echo $dong['SoGiuong'];?>" /></td>
		</tr>
        <tr>
			<td>Sức chứa:</td>
			<td><input class="w-500"  type="text" name="txtSucChua" value="<?php echo $dong['SucChua'];?>" /></td>
		</tr>
        <tr>
			<td>Trạng thái:</td>
			<td><input class="w-500"  type="text" name="txtTrangThai" value="<?php echo $dong['TrangThai'];?>" /></td>
		</tr>
		<tr>
			<td>Giá phòng:</td>
			<td><input class="w-500"  type="text" name="txtGiaPhong" value="<?php echo $dong['GiaPhong'];?>"/></td>
		</tr>
		<tr>
			<td>Thiết bị:</td>
			<td>
                <select class="w-500"  name="cbThietBi" id="">
                    <?php
                        if($dong['ThietBi'] == "Có máy lạnh"){
                            echo '<option selected = "selected" value="Có máy lạnh">Có máy lạnh</option>';
                            echo '<option value="Không máy lạnh">Không máy lạnh</option>';
                        }
                        else{
                            echo '<option value="Có máy lạnh">Có máy lạnh</option>';
                            echo '<option selected = "selected" value="Không máy lạnh">Không máy lạnh</option>';
                        }
                    ?>
                </select>
            </td>
		</tr>
       
	</table>
	
	<div class="XN">
        <input class="regis" type="submit" value="Cập nhật"/>
    </div>
</form>