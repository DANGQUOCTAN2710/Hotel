<?php
    include "config.php";
    include "lib.php";
    // khach hang
    $HoVaTen = $_POST['txtHoVaTen'];
    $NamSinh = $_POST['cbNamSinh'];
    $gioiTinh = $_POST['cbGender'] == "Nam" ? 1 : 0;
    $CCCD = $_POST['txtCCCD'];
    $DienThoai = $_POST['txtDienThoai'];
    // phong
    $MaPhong = $_POST['txtMaPhong'];
    // Dich vu
    $TenDichVu = $_POST['cbDichVu'];

    if(trim($HoVaTen) == ""){
        ThongBao("Họ và tên không được bỏ trống!");
    }
    elseif(trim($NamSinh) == "ns"){
        ThongBao("Năm sinh không được bỏ trống!");
    }elseif(trim($CCCD) == ""){
        ThongBao("CCCD không được bỏ trống!");
    }elseif(trim($DienThoai) == ""){
        ThongBao("Số điện thoại không được bỏ trống!");
    }
    else{
        $sql_KiemTraPhong = "SELECT LanDat FROM phong WHERE MaPhong = '$MaPhong'";
        $danhsach_phong = $connect->query($sql_KiemTraPhong);
        $LanDat = $danhsach_phong->fetch_array(MYSQLI_ASSOC)['LanDat'];
        $LanDat = $LanDat + 1;
        $sql_dichvu = "SELECT MaDV FROM tbl_dichvu WHERE TenDichVu = '$TenDichVu'";
        $danhsach_dichvu = $connect->query($sql_dichvu);
        if(!$danhsach_dichvu){
            die("Khong the thuc hien cau lenh SQL cua dich vu: " . $connect->connect_error);
        }
        $MaDichVu = ($danhsach_dichvu->fetch_array(MYSQLI_ASSOC)['MaDV']);

        $sql = "INSERT INTO `khachhang`( `HoVaTen`, `NamSinh`, `GioiTinh`, `CCCD`, `SoDienThoai`, `MaDV`, `MaPhong`) VALUES ('$HoVaTen', '$NamSinh', $gioiTinh,'$CCCD','$DienThoai', $MaDichVu, '$MaPhong')";
        $danhsach = $connect->query($sql);

        if(!$danhsach){
            echo "<h3>Đặt phòng không thành công</h3>";
        }
        else{
            $sql = "UPDATE phong
                    SET TrangThai = 'Đã đặt',
                        LanDat = $LanDat
                    WHERE  MaPhong = '$MaPhong'";
            $danhsach = $connect->query($sql);
            if($danhsach){

                ThongBao("Đặt phòng thành công!");
                header("Location: index.php?do=home");
            }
        }
    }
?>