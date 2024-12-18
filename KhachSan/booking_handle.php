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
    $LoaiPhong = $_POST['cbLoaiPhong'];
    $ThietBi = $_POST['cbThietBi'];
    $SoGiuong = $_POST['txtSoGiuong'];
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
    elseif(trim($LoaiPhong) == "lb"){
        ThongBao("Loại phòng không được bỏ trống!");
    }elseif(trim($SoGiuong) == ""){
        ThongBao("Số giường không được bỏ trống!");
    }elseif(trim($ThietBi) == "tb"){
        ThongBao("Thiết bị không được bỏ trống!");
    }
    else{
        $sql_KiemTraPhong = "SELECT MaPhong, LanDat FROM phong WHERE LoaiPhong = '$LoaiPhong' AND SoGiuong = $SoGiuong AND ThietBi = '$ThietBi' AND TrangThai = 'Trống'";

        $danhsach_phong = $connect->query($sql_KiemTraPhong);
        if(!$danhsach_phong){
            echo "<h3>Hết phòng!</h3>";
        }
        else{
            $MaPhong = ($danhsach_phong->fetch_array(MYSQLI_ASSOC))['MaPhong'];
            $LanDat = ($danhsach_phong->fetch_array(MYSQLI_ASSOC))['LanDat'];
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
                echo "<h3>Thêm không thành công</h3>";
            }
            else{
                $sql = "UPDATE phong
                        SET TrangThai = 'Đã đặt',
                            LanDat = $LanDat
                        WHERE  MaPhong = '$MaPhong'";
                $danhsach = $connect->query($sql);
                if($danhsach){

                    ThongBao("Thêm thành công!");
                    header("Location: index.php?do=home");
                }
            }
        }
    }
?>