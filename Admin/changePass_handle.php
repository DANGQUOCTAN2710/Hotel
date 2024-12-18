<?php
	
	include_once "config.php";
	$matkhau_cu = md5($_POST['txtOldPass']);
	$matkhau_moi= md5($_POST['txtNewPass']);
	$xacnhanmatkhaumoi = md5($_POST['txtNewPassAcp']);
	
	if(trim($matkhau_cu) == "")
		ThongBaoLoi("Mật khẩu cũ không được bỏ trống!");
	elseif(trim($matkhau_moi) == "")
		ThongBaoLoi("Mật khẩu mới không được bỏ trống!");
	elseif(trim($xacnhanmatkhaumoi) == "")
		ThongBaoLoi("Xác nhận mật khẩu mới không được bỏ trống!");
	else
	{
		$sql_kt= "SELECT * FROM tbl_nhanvien WHERE MatKhau = '$matkhau_cu'";
		$danhsachcu = $connect->query($sql_kt);
		
		if(!$danhsachcu){
			die("Không thể thực hiện câu lệnh SQL: " . $connect->connect_error);
		}
		elseif($matkhau_moi != $xacnhanmatkhaumoi){
			ThongBao("Mật khẩu mới không giống với mật khẩu xác nhận!");
		}
		else{
			$sql_moi="UPDATE tbl_nhanvien SET Matkhau = '$matkhau_moi' WHERE idNhanVien = " . $_SESSION['MaNV'] ;
			if($connect->query($sql_moi)){
				echo "<h3 style='color: green; vertical-align:center;'>Đổi mật khẩu thành công!</h3>";
				echo "<a style='display: inline-block;font-size: 16px; color: #f3b21d; margin-top: 20%' href='index.php?do=profile&id=".$_SESSION['MaNV']."'>Hồ sơ cá nhân</a>";
			}
			else{
				echo "<h3 style='color: red; vertical-align:center;'>Đổi mật khẩu không thành công!</h3>";
				echo "<a style='display: inline-block;font-size: 16px; color: #f3b21d; margin-top: 20%' href='index.php?do=changePass&id=".$idNhanVien."'>Đổi mật khẩu lại</a>";
			}
		}
	}
?>