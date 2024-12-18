<?php
    include "config.php";
?>

<h3>Danh sách dịch vụ</h3>
<table class="list">
    <tr>
        <th>STT</th>
        <th>Mã DV</th>
        <th>Tên dịch vụ</th>
        <th>Giá dịch vụ</th>
        <th colspan="2">Hành động</th>
    </tr>
    <?php
        $count = 1;
        $sql = "select * from tbl_dichvu";
        $danhsach = $connect->query($sql);


        while($row = $danhsach->fetch_array(MYSQLI_ASSOC)){
            echo "<tr>";
            echo "<td>".$count."</td>";
            echo "<td>".$row['MaDV']."</td>";
            echo "<td>".$row['TenDichVu']."</td>";
            echo "<td>".$row['GiaDichVu']."</td>";
            echo "<td><a href='index.php?do=serviceEdit&id=" . $row['MaDV'] . "'><img src='img/edit.png' /></a></td>";
            echo "<td><a href='index.php?do=serviceDelete&id=" . $row['MaDV'] . "' onclick='return confirm(\"Bạn có muốn xóa dịch vụ " . $row['TenDichVu'] . " không?\")'><img src='img/delete.png' /></a></td>";
            echo "</tr>";
            $count++;
        }
    ?>
</table>
<a href="index.php?do=serviceAdd" class="Add-Room">Thêm dịch vụ mới</a>