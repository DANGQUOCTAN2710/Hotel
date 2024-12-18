<?php
    include "config.php";
    include "lib.php";

    $HoVaTen = $_POST['txtHoVaTen'];
    $DienThoai = $_POST['txtDienThoai'];
    $CCCD = $_POST['txtCCCD'];
    $TenDangNhap = $_POST['txtTenDangNhap'];
    $MatKhau = md5($_POST['txtMatKhau']);
    $XacNhanMatKhau = md5($_POST['txtXacNhanMatKhau']);

    if(trim($HoVaTen) == "")
		ThongBaoLoi('Họ và tên không được bỏ trống!');
    elseif(trim($DienThoai) == "")
		ThongBaoLoi("Số điện thoại không được bỏ trống!");
    elseif(trim($CCCD) == "")
		ThongBaoLoi("CCCD không được bỏ trống!");
	elseif(trim($TenDangNhap) == "")
		ThongBaoLoi("Tên đăng nhập không được bỏ trống!");
	elseif(trim($MatKhau) == "")
		ThongBaoLoi("Mật khẩu không được bỏ trống!");
    elseif(trim($XacNhanMatKhau == ""))
        ThongBaoLoi("Xác nhận mật khẩu không được bỏ trống");
	elseif($MatKhau != $XacNhanMatKhau)
		ThongBaoLoi("Xác nhận mật khẩu không đúng!");
	else
	{
		// Kiểm tra người dùng đã tồn tại chưa
		$sql_kiemtra = "SELECT * FROM tbl_nhanvien WHERE TenDangNhap = '$TenDangNhap'";
		
		$danhsach = $connect->query($sql_kiemtra);
		$dong = $danhsach->fetch_array(MYSQLI_ASSOC);

		if(!$dong)
		{
			$sql_them = "INSERT INTO tbl_nhanvien(`HoVaTen`, `SoDienThoai`, `CCCD`, `TenDangNhap`, `MatKhau`)
					VALUES ('$HoVaTen', '$DienThoai', '$CCCD', '$TenDangNhap', '$MatKhau')";
			$themnd = $connect->query($sql_them);
			
			if($themnd)
			{
                ThongBao("Thêm thành công!");
                header("Location: index.php?do=staffs");
            }	
		}
		else
		{
			ThongBao("Người dùng với tên đăng nhập đã được sử dụng!");
		}
	}
?>