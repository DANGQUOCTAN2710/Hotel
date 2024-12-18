<?php
    include "config.php";
    include "lib.php";

    $MaPhong = $_POST['txtMaPhong'];
    $LoaiPhong = $_POST['cbLoaiPhong'];
    $SoGiuong = $_POST['txtSoGiuong'];
    $GiaPhong = $_POST['txtGiaPhong'];
    $ThietBi = $_POST['cbThietBi'];
    $SucChua = $_POST['txtSucChua'];
    $HinhAnh = "img/";
    $HinhAnh = $HinhAnh . basename($_FILES['txtHinhAnh']['name']);

    if(trim($MaPhong) == "")
        ThongBao("Mã phòng không được bỏ trống!");
    elseif(trim($LoaiPhong) == "lb")
        ThongBao("Loại phòng không được bỏ trống!");
    elseif(trim($SoGiuong) == "")
        ThongBao("Số giường không được bỏ trống!");
    elseif(trim($GiaPhong) == "")
        ThongBao("Giá phòng không được bỏ trống!");
    elseif(trim($ThietBi) == "tb")
        ThongBao("Thiết bị không được bỏ trống!");
    elseif(trim($HinhAnh) == ""){
        ThongBao("Hãy chọn hình ảnh phòng!");
    }
    else{
        $sql_kiemtra = "SELECT * FROM phong WHERE MaPhong = $MaPhong";
        $danhsach = $connect->query($sql_kiemtra);

        if(!$danhsach){
            $sql = "INSERT INTO `phong`(`MaPhong`, `LoaiPhong`, `SoGiuong`, `GiaPhong`, `ThietBi`, `HinhAnh`,`SucChua`) VALUES ('$MaPhong','$LoaiPhong', $SoGiuong, $GiaPhong, '$ThietBi', '$HinhAnh', $SucChua)";

            $themnd = $connect->query($sql);
            if($themnd){
                ThongBao("Thêm phòng mới thành công");
                header("Location: index.php?do=rooms");
            }
            else{
                echo "<h3>Thêm không thành công</h3>";
            }
        }
        else{
            ThongBao("Mã phòng bị trùng!");
        }
    }
?>