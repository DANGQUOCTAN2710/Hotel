<?php
    include "config.php";
?>

<h3>Danh sách khách hàng</h3>
<table class="list">
    <tr>
        <th>STT</th>
        <th>Mã KH</th>
        <th>Họ và tên</th>
        <th>Năm sinh</th>
        <th>Giới tính</th>
        <th>CCCD</th>
        <th>Số điện thoại</th>
        <th>Mã phòng</th>
        <th>Mã dịch vụ</th>
        <th colspan="3">Hành động</th>
    </tr>
    <?php
            $count = 1;
            $sql = "select * from khachhang";
            $danhsach = $connect->query($sql);


            while($row = $danhsach->fetch_array(MYSQLI_ASSOC)){
                echo "<tr>";
                    echo "<td>".$count."</td>";
                    echo "<td>".$row['MaKH']."</td>";
                    echo "<td>".$row['HoVaTen']."</td>";
                    echo "<td>".$row['NamSinh']."</td>";
                    echo "<td>".$row['GioiTinh']."</td>";
                    echo "<td>".$row['CCCD']."</td>";
                    echo "<td>".$row['SoDienThoai']."</td>";
                    echo "<td>".$row['MaPhong']."</td>";
                    echo "<td>".$row['MaDV']."</td>";
                    echo "<td><a href='index.php?do=billCreate&id=" . $row['MaKH'] . "'><img src='img/bill.jpg' width= 20px; /></a></td>";
                    echo "<td><a href='index.php?do=customerEdit&id=" . $row['MaKH'] . "'><img src='img/edit.png' /></a></td>";
                    echo "<td><a href='index.php?do=customerDelete&id=" . $row['MaKH'] . "' onclick='return confirm(\"Bạn có muốn xóa khách hàng " . $row['HoVaTen'] . " không?\")'><img src='img/delete.png' /></a></td>";
                echo "</tr>";
                $count++;
            }
        ?>
    </tr>
</table>