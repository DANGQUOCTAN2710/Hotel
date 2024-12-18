<?php
	// Hủy SESSION
	unset($_SESSION['MaNV']);
	unset($_SESSION['HoVaTen']);
	unset($_SESSION['QuyenHan']);
	
	// Chuyển hướng về trang index.php
	header("Location: index.php");
?>