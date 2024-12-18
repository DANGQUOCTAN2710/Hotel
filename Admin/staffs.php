<?php
    include "config.php";
?>

<h3>Danh sách nhân viên</h3>
<table class="list">
    <tr>
        <th>STT</th>
        <th>Mẫ nhân viên</th>
        <th>Họ và tên</th>
        <th>Số điện thoại</th>
        <th>CCCD</th>  
        <th>Tên đăng nhập</th>
        <th>Quyền hạn</th>
        <th colspan="2">Hành động</th>
    </tr>
    <?php
        $count = 1;
        $sql = "select * from tbl_nhanvien";
        $danhsach = $connect->query($sql);

        
        while($row = $danhsach->fetch_array(MYSQLI_ASSOC)){
            echo "<tr>";
                echo "<td>".$count."</td>";
                echo "<td>".$row['idNhanVien']."</td>";
                echo "<td>".$row['HoVaTen']."</td>";
                echo "<td>".$row['SoDienThoai']."</td>";
                echo "<td>".$row['CCCD']."</td>";
                echo "<td>".$row['TenDangNhap']."</td>";
                $qh = $row['QuyenHan'] == 1 ? "Quản lý" : "Nhân viên";
                echo "<td>".$qh."</td>";
                echo "<td><a href='index.php?do=staffEdit&id=" . $row['idNhanVien'] . "'><img src='img/edit.png' /></a></td>";
                echo "<td><a href='index.php?do=staffDelete_handle&id=" . $row['idNhanVien'] . "' onclick='return confirm(\"Bạn có muốn xóa nhân viên " . $row['HoVaTen'] . " không?\")'><img src='img/delete.png' /></a></td>";
            echo "</tr>";
            $count++;
        }
    ?>
</table>
<a href="index.php?do=staffAdd" class="Add-Room">Thêm nhân viên mới</a>