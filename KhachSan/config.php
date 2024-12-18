<?php
	$servername = "localhost";
	$username = "root";
	$password = "vertrigo";
	$dbname = "quanly_khachsan";	
	
	$connect = new mysqli($servername, $username, $password, $dbname);	
	mysqli_set_charset($connect, 'UTF8');
	if ($connect->connect_error) {
	    die("Không kết nối :" . $conn->connect_error);
	}	
?>