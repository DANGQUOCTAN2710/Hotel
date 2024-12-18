<?php
    include "config.php";
    include "lib.php";
     
    $sql = "SELECT * FROM tbl_dichvu";
    $danhsach = $connect->query($sql);
    if(!$danhsach){
        die("Khong the thuc hien SQL");
    }
?>

<div class="box-content">
    <div class="row">
        <i style="float: left;" class="fa fa-bell"></i>
        <p style="margin-top: 22px;margin-left: 10px; font-size: 24px; float: left; letter-spacing: -1.5px; color: #000;">Dịch vụ dự kiến</p>
    </div>
    <div class="row">
        <div class="service-content">
            <div class="col-half">
                <img src="img/ks1.jpg" alt="" class="img-service">
                <div class="content-container">
                    <h2 class="service-title">Dịch vụ tour du lịch</h2>
                    <p class="service-decs">
                    Ở dịch vụ này tùy theo khách hạng lựa chọn tour du lịch theo ý của mình và ở khách sạn chúng tôi sẽ có hướng dẫn viên du lịch đi theo để có thể giới thiệu những địa điểm du lịch và hướng dẫn theo đúng yêu cầu của quý du khách.
                    </p>
                </div>
            </div>
            <div class="col-half">
                <img src="img/ks2.jpg" class="img-service" alt="">
                <div class="content-container">
                    <h2 class="service-title">Dịch vụ cho thuê xe</h2>
                    <p class="service-decs">
                    Khách sạn chúng tôi sẽ có tất cả các loại xe tự lái như xe moto, xe hơi và kể cả là xe điện với mục đích có thể giúp cho khách hàng thoải mái khi đi cùng người thân và gia đình nên chúng tôi đã nghĩ ra dịch vụ này để cho khách hàng cảm thấy khi đến với TonHank HoTel sẽ cực kì thoải mái và chỉ cần có giấy phép lái xe và CCCD khách hàng có thể lấy xe đi bất cứ lúc nào vì nhân viên của khách sạn bên khâu xe sẽ thay phiên nhau trực 24/24.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="content-room">
    <div class="row">
        <i style="float: left;" class="fa fa-bell"></i>
        <p style="margin-top: 22px;margin-left: 10px; font-size: 24px; float: left; letter-spacing: -1.5px; color: #fff;">Dịch vụ chính</p>
    </div>
    <div class="content-flex">
        <?php
            while($row = $danhsach->fetch_array(MYSQLI_ASSOC)){
                echo '<div class="container-room">';
                    echo '<div class="card">';
                        echo '<table style="font-size: 16px; text-align: center;">';
                            echo "<tr><td>Dịch vụ: ".$row['TenDichVu']."</td></tr>";
                            echo "<tr><td>Giá : ".$row['GiaDichVu']."</td></tr>";
                        echo '</table>';
                    echo "</div>";
                echo '</div>';
            }
        ?>
    </div>
</div>