<?php
	session_start();

    include "lib.php";
    include "config.php";
	// Lấy thông tin từ FORM
	$TenDangNhap = $_POST['txtTenDangNhap'];
	$mk = $_POST['txtMatKhau'];
	
	// Kiểm tra
	if(trim($TenDangNhap) == "")
		ThongBaoLoi("Tên đăng nhập không được bỏ trống!");
	elseif(trim($mk) == "")
		ThongBaoLoi("Mật khẩu không được bỏ trống!");
	else
	{
		// Mã hóa mật khẩu
		$mk = md5($mk);
		
		// Kiểm tra người dùng có tồn tại không
		$sql_kiemtra = "SELECT * from tbl_nhanvien WHERE TenDangNhap = '".$TenDangNhap."' AND MatKhau = '".$mk."'";

        $danhsach = $connect->query($sql_kiemtra);
        if (!$danhsach) {
			die("Không thể thực hiện câu lệnh SQL: " . $connect->connect_error);
		}
		$dong = $danhsach->fetch_array(MYSQLI_ASSOC);
		
		if($dong)
		{
			$_SESSION['MaNV'] = $dong['idNhanVien'];
			$_SESSION['HoVaTen'] = $dong['HoVaTen'];
			$_SESSION['QuyenHan'] = $dong['QuyenHan'];
            header("Location: index.php");
		}
		else
		{
            header("Location: login.php");
			ThongBaoLoi("Tên đăng nhập hoặc mật khẩu không chính xác!");
		}
	}
?>