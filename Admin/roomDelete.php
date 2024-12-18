<?php
	$sql = "delete from `phong` where idPhong = " . $_GET['id'];
	$danhsach = $connect->query($sql);
	//Nếu kết quả kết nối không được thì xuất báo lỗi và thoát
	if (!$danhsach) {
		die("Không thể thực hiện câu lệnh SQL: " . $connect->connect_error);
	}
	else
	{
		header("Location: index.php?do=rooms");
	}
?>