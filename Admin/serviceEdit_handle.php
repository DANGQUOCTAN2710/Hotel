<?php
	include "config.php";
	include "lib.php";


	$MaDV = $_POST['txtMaDV'];
	$TenDichVu = $_POST['txtTenDV'];
	$GiaDichVu = $_POST['txtGiaDV'];

	if(trim($TenDichVu)==""){
		ThongBao("Tên dịch vụ không được bỏ trống");
	}elseif(trim($GiaDichVu)==""){
		ThongBao("Giá dịch vụ không được bỏ trống");
	}
	else{

		$sql_them = "UPDATE tbl_dichvu
					SET 	TenDichVu = '$TenDichVu', 
							GiaDiChVu = $GiaDichVu
					WHERE 	MaDV = $MaDV";
		$themnd = $connect->query($sql_them);
		
		if (!$themnd) {
			die("Không thể thực hiện câu lệnh SQL: " . $connect->connect_error);
		}
		else
		{	
			echo "<h3 style='color: green; vertical-align:center;'>Cập nhật thành công!</h3>";
			echo "<a style='display: inline-block;font-size: 16px; color: #f3b21d; margin-top: 20%' href='index.php?do=service'>Danh sách dịch vụ</a>";
		}	
	}
?>