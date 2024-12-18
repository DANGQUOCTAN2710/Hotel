<?php
    include "config.php";
    include "lib.php";

	$idNhanVien = $_POST['txtidNhanVien'];
    $HoVaTen = $_POST['HoVaTen'];
    $DienThoai = $_POST['DienThoai'];
    $CCCD = $_POST['CCCD'];
    $TenDangNhap = $_POST['TenDangNhap'];
	$QuyenHan = $_POST['cbQuyenHan'] == "Quản lý" ? 1 : 0;

    if(trim($HoVaTen) == "")
		ThongBaoLoi('Họ và tên không được bỏ trống!');
    elseif(trim($DienThoai) == "")
		ThongBaoLoi("Số điện thoại không được bỏ trống!");
    elseif(trim($CCCD) == "")
		ThongBaoLoi("CCCD không được bỏ trống!");
	elseif(trim($TenDangNhap) == "")
		ThongBaoLoi("Tên đăng nhập không được bỏ trống!");
	else
	{
		$sql = "UPDATE tbl_nhanvien
				SET 	HoVaTen = '$HoVaTen', 
						SoDienThoai = '$DienThoai', 
						CCCD = '$CCCD', 
						TenDangNhap = '$TenDangNhap',
						QuyenHan = $QuyenHan
				WHERE idNhanVien = $idNhanVien";

		$danhsach = $connect->query($sql);
		//Nếu kết quả kết nối không được thì xuất báo lỗi và thoát
		if (!$danhsach) {
			die("Không thể thực hiện câu lệnh SQL: " . $connect->connect_error);
		}
		else
		{	
			echo "<h3 style='color: green; vertical-align:center;'>Cập nhật thành công!</h3>";
			echo "<a style='display: inline-block;font-size: 16px; color: #f3b21d; margin-top: 20%' href='index.php?do=staffs'>Danh sách nhân viên</a>";
		}		
	}
?>