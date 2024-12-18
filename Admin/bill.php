<?php
    include "config.php";
?>

<h3>Danh sách hóa đơn</h3>
<table class="list">
    <tr>
        <th>STT</th>
        <th>Mã hóa đơn</th>
        <th>Tên khách hàng</th>
        <th>Tên phòng</th>
        <th>Tên dịch vụ</th>
        <th>Tên nhân viên lập</th>
        <th>Tổng tiền</th>
        <th colspan="2">Hành động</th>
    </tr>
    <tr>
        <?php
            $count = 1;
            $sql = "select * from tbl_hoadon";
            $danhsach = $connect->query($sql);


            while($row = $danhsach->fetch_array(MYSQLI_ASSOC)){
                echo "<td>".$count."</td>";
                echo "<td>".$row['MaHD']."</td>";
                echo "<td>".$row['TenKhachHang']."</td>";
                echo "<td>".$row['TenNhanVien']."</td>";
                echo "<td>".$row['TenDichVu']."</td>";
                echo "<td>".$row['TenNhanVien']."</td>";
                echo "<td>".$row['TongTien']."</td>";
				echo "<td><a href='index.php?do=billDelete&id=" . $row['MaHD'] . "' onclick='return confirm(\"Bạn có muốn xóa hóa đơn của khách hàng " . $row['TenKhachHang'] . " không?\")'><img src='img/delete.png' /></a></td>";
                $count++;
            }
        ?>
    </tr>
</table>