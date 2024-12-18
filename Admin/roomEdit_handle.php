<?php
    include "config.php";
    include "lib.php";

    $IdPhong = $_POST['txtIdPhong'];
    $LoaiPhong = $_POST['cbLoaiPhong'];
    $SoGiuong = $_POST['txtSoGiuong'];
    $TrangThai = $_POST['txtTrangThai'];
    $GiaPhong = $_POST['txtGiaPhong'];
    $ThietBi = $_POST['cbThietBi'];
    $SucChua = $_POST['txtSucChua'];

    if(trim($SoGiuong) == "")
        ThongBao("Số giường không được bỏ trống!");
    elseif(trim($GiaPhong) == "")
        ThongBao("Giá phòng không được bỏ trống!");
    else{
        $sql = "UPDATE `phong` 
                SET     `LoaiPhong`= '$LoaiPhong',
                        `SoGiuong`= $SoGiuong,
                        `SucChua`= $SucChua,
                        `TrangThai`= '$TrangThai',
                        `GiaPhong`= $GiaPhong,
                        `ThietBi`= '$ThietBi'
                WHERE idPhong = $IdPhong";

        $themnd = $connect->query($sql);
        if (!$themnd) {
			die("Không thể thực hiện câu lệnh SQL: " . $connect->connect_error);
		}
		else
		{	
			echo "<h3 style='color: green; vertical-align:center;'>Cập nhật thành công!</h3>";
			echo "<a style='display: inline-block;font-size: 16px; color: #f3b21d; margin-top: 20%' href='index.php?do=rooms'>Danh sách phòng</a>";
		}	
    }
?>