<?php
    include "config.php";
?>

<h3>Danh sách phòng</h3>
<table class="list">
    <tr>
        <th>Mã phòng</th>
        <th>Loại phòng</th>
        <th>Số giường</th>
        <th>Sức chứa</th>
        <th>Trạng thái</th>
        <th>Giá phòng</th>  
        <th>Thiết bị</th>
        <th>Hình ảnh</th>
        <th>Lần đặt phòng</th>
        <th colspan="2">Hành động</th>
    </tr>
        <?php
            $sql = "select * from phong";
            $danhsach = $connect->query($sql);

            while($row = $danhsach->fetch_array(MYSQLI_ASSOC)){
                echo "<tr>";
                    echo "<td>".$row['MaPhong']."</td>";
                    echo "<td>".$row['LoaiPhong']."</td>";
                    echo "<td>".$row['SoGiuong']."</td>";
                    echo "<td>".$row['SucChua']."</td>";
                    echo "<td>".$row['TrangThai']."</td>";
                    echo "<td>".$row['GiaPhong']."</td>";
                    echo "<td>".$row['ThietBi']."</td>";
                    echo "<td><img src='".$row['HinhAnh']."' width='100'/></td>";
                    echo "<td>".$row['LanDat']."</td>";
                    echo "<td><a href='index.php?do=roomEdit&id=" . $row['idPhong'] . "'><img src='img/edit.png' /></a></td>";
                    echo "<td><a href='index.php?do=roomDelete&id=" . $row['idPhong'] . "' onclick='return confirm(\"Bạn có muốn xóa phòng " . $row['MaPhong'] . " không?\")'><img src='img/delete.png' /></a></td>";
                echo "</tr>";
            }
        ?>
    </table>
<a href="index.php?do=roomAdd" class="Add-Room">Thêm phòng mới</a>