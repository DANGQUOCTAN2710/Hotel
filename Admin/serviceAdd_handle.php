<?php
	include "config.php";
	include "lib.php";

	$TenDichVu = $_POST['txtTenDV'];
	$GiaDichVu = $_POST['txtGiaDV'];

	if(trim($TenDichVu)==""){
		ThongBao("Tên dịch vụ không được bỏ trống");
	}elseif(trim($GiaDichVu)==""){
		ThongBao("Giá dịch vụ không được bỏ trống");
	}
	else{
		$sql_kiemtra = "SELECT * FROM tbl_dichvu WHERE TenDichVu = '$TenDichVu'";
		
		$danhsach = $connect->query($sql_kiemtra);
		$dong = $danhsach->fetch_array(MYSQLI_ASSOC);

		if(!$dong)
		{
			$sql_them = "INSERT INTO tbl_dichvu(`TenDichVu`, `GiaDichVu`)
					VALUES ('$TenDichVu', $GiaDichVu)";
			$themnd = $connect->query($sql_them);
			
			if($themnd)
			{
                ThongBao("Thêm thành công!");
                header("Location: index.php?do=service");
            }	
		}
		else
		{
			ThongBao("Đã có dịch vụ này rồi!");
		}
	}
?>