<?php
	include "config.php";

	$sql = "SELECT * FROM tbl_nhanvien WHERE idNhanVien = ". $_SESSION['MaNV'];
	$danhsach_nhanvien = $connect->query($sql);
	if(!$danhsach_nhanvien){
		die("Khong the thuc hien cau lenh SQL". $_SESSION['MaNV']);
	}

	$dong_nhanvien = $danhsach_nhanvien->fetch_array(MYSQLI_ASSOC);

	$MaNV = $dong_nhanvien['idNhanVien'];
	$TenNV = $dong_nhanvien['HoVaTen'];
	// khachhang
    $MaKH = $_POST['txtMaKH'];
    $TenKhachHang = $_POST['txtHoVaTen'];
	// phong
	$MaPhong = $_POST['txtMaPhong'];
	// dichvu
	$MaDV = $_POST['txtMaDV'];
	$TenDichVu = $_POST['txtTenDichVu'];

	$TongTien = $_POST['txtTongTien'];

	$sql = "INSERT 
	INTO `tbl_hoadon`(`MaPhong`, `MaDV`, `MaKH`, `MaNV`, `TongTien`, `TenKhachHang`, `TenNhanVien`, `TenDichVu`) 
	VALUES ('$MaPhong',$MaDV, $MaKH, $MaNV, $TongTien,'$TenKhachHang','$TenNV','$TenDichVu')";
	$danhsach = $connect->query($sql);
	if(!$danhsach){
		echo "<h3>$TenNV</h3>";
	}
?>
