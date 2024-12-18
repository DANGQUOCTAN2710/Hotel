<?php
    include "config.php";
    include "lib.php";
     
    $sql = "SELECT * FROM phong WHERE TrangThai = 'Trống'";
    $danhsach = $connect->query($sql);

    $sql = "SELECT * FROM phong WHERE TrangThai = 'Trống' AND LoaiPhong = 'Vip'";
    $danhsach_vip = $connect->query($sql);

    $sql = "SELECT * FROM phong WHERE TrangThai = 'Trống' AND LoaiPhong = 'NVip'";
    $danhsach_none = $connect->query($sql);
?>

<div class="box-content">
    <div class="row">
        <i style="float: left;" class="fa fa-bell"></i>
        <p style="margin-top: 22px;margin-left: 10px; font-size: 24px; float: left; letter-spacing: -1.5px; color: #000;">Đề xuất tốt nhất</p>
    </div>
    <div class="row">
        <div class="service-content">
            <?php
                $row = $danhsach_vip->fetch_array(MYSQLI_ASSOC);
                $max = $row['LanDat'];
                $maPhong_Vip = $row['MaPhong'];
                while($row = $danhsach_vip->fetch_array(MYSQLI_ASSOC)){
                    if($max < $row['LanDat']){
                        $max = $row['LanDat'];
                        $maPhong_Vip = $row['MaPhong'];
                    }
                }

                $sql_vip = "SELECT * FROM phong WHERE MaPhong = '$maPhong_Vip'";
                $danhsach_vip = $connect->query($sql_vip);
                $row_vip = $danhsach_vip->fetch_array(MYSQLI_ASSOC);
                echo '<div class="col-half">';
                    echo '<img src='.$row_vip['HinhAnh'].' class="img-service" alt="">';
                    echo '<div class="content-container">';
                        echo '<h2 class="service-title">Phòng VIP được đặt nhiều nhất</h2>';
                        echo '<ul class="list">';
                            echo '<li>';
                                echo '<span>'.$row_vip['MaPhong'].'</span>';
                                echo 'Mã phòng';
                            echo '</li>';
                            echo '<li>';
                                echo '<span>'.$row_vip['SoGiuong'].'</span>';
                                echo 'Số giường';
                            echo '</li>';
                        echo '</ul>';
                        echo "<a class='content-detail' href='index.php?do=bookingRoom&id=".$row_vip['idPhong']."'>Đặt phòng</a>";
                    echo '</div>';
                echo '</div>';

                $row = $danhsach_none->fetch_array(MYSQLI_ASSOC);
                $min = $row['LanDat'];
                $maPhong_none = $row['MaPhong'];
                while($row = $danhsach_none->fetch_array(MYSQLI_ASSOC)){
                    if($min > $row['LanDat']){
                        $min = $row['LanDat'];
                        $maPhong = $row['MaPhong'];
                    }
                }

                $sql_none= "SELECT * FROM phong WHERE MaPhong = '$maPhong_none'";
                $danhsach_none = $connect->query($sql_none);
                $row_none = $danhsach_none->fetch_array(MYSQLI_ASSOC);

                echo '<div class="col-half">';
                    echo "<img src='".$row_none['HinhAnh']."' class='img-service' alt=''>";
                    echo '<div class="content-container">';
                        echo '<h2 class="service-title">Phòng NONE VIP được đặt nhiều nhất</h2>';
                        echo '<ul class="list">';
                            echo '<li>';
                                echo '<span>'.$row_none['MaPhong'].'</span>';
                                echo 'Mã phòng';
                            echo '</li>';
                            echo '<li>';
                                echo '<span>'.$row_none['SoGiuong'].'</span>';
                                echo 'Số giường';
                            echo '</li>';
                        echo '</ul>';
                        echo "<a class='content-detail' href='index.php?do=bookingRoom&id=".$row_none['idPhong']."'>Đặt phòng</a>";
                    echo '</div>';
                echo '</div>';
            ?>
        </div>
    </div>
</div>
<!-- code php    -->
<div class="content-room">
    <div class="row">
        <i style="float: left;" class="fa fa-bell"></i>
        <p style="margin-top: 22px;margin-left: 10px; font-size: 24px; float: left; letter-spacing: -1.5px; color: #fff;">Danh sách phòng trống</p>
    </div>
    <div class="content-flex">
        <?php
            while($row = $danhsach->fetch_array(MYSQLI_ASSOC)){
                echo '<div class="container-room">';
                    echo '<div class="card">';
                        echo '<table>';
                            echo "<tr><td><img src='".$row['HinhAnh']."'/></td>";
                            echo "<tr><td>Mã phòng: ".$row['MaPhong']."</td></tr>";
                            echo "<tr><td>Loại phòng: ".$row['LoaiPhong']."</td></tr>";
                            echo "<tr><td>Số giường: ".$row['SoGiuong']."</td></tr>";
                            echo "<tr><td>Sức chứa: ".$row['SucChua']."</td></tr>";
                            echo "<tr><td>Thiết bị: ".$row['ThietBi']."</td></tr>";
                            echo "<tr><td>Giá phòng: ".$row['GiaPhong']."</td></tr>";
                            echo "<tr><td class='booking_room'><a href='index.php?do=bookingRoom&id=".$row['idPhong']."'>Đặt phòng</a></td></tr>";
                        echo '</table>';
                    echo "</div>";
                echo '</div>';
            }
        ?>
    </div>
</div>