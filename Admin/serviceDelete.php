<?php
	$MaDV = $_GET['id'];

	$sql = "DELETE FROM tbl_dichvu WHERE MaDV = $MaDV";
	$danhsach = $connect->query($sql);
	if(!$danhsach){
		die("Không thể thực hiện câu lệnh SQL: " . $connect->connect_error);
	}
	else
	{
		header("Location: index.php?do=service");
	}
?>
