<?php
    include "config.php";

    $sql = "SELECT TenDichVu FROM tbl_dichvu WHERE 1";
    $danhsach = $connect->query($sql);
    if(!$danhsach){
        die("Không thể thực hiện câu lệnh SQL: " . $connect->connect_error);
    }

    $sql = "SELECT * FROM phong WHERE idPhong = " .$_GET['id'];
    $danhsach_phong = $connect->query($sql);
    if(!$danhsach_phong){
        die("Không thể thực hiện câu lệnh SQL: " . $_GET['id']);
    }
    $row = $danhsach_phong->fetch_array(MYSQLI_ASSOC);
?>
<div class="box-content">
    <h3>Đặt Phòng</h3>
    <form action="index.php?do=bookingRoom_handle" method="post" enctype="multipart/form-data">
        <table align="center" class="Form">
            <tr>
                <td>Họ và tên:</td>
                <td><input class="w-200"  type="text" name="txtHoVaTen" /></td>
                <td>Mã phòng:</td>
                <td><input class="w-200"  type="text" name="txtMaPhong" value="<?php echo $row['MaPhong']?>"/></td>                
            </tr>
            <tr>
                <td>Năm sinh:</td>
                <td>
                    <select class="w-200"  name="cbNamSinh" id="">
                        <option value="ns">Năm sinh</option>
                        <script>
                            var today = new Date();
                            var nam = today.getFullYear();

                            for(var i = 1954; i <= nam; i++){
                                document.write("<option value = '" + i + "'>" + i + "</option>");
                            }
                        </script>
                    </select>
                </td>
                <td>Loại phòng</td>
                <td>
                    <select class="w-200"  name="cbLoaiPhong" id="">
                        <?php
                            if($row['ThietBi'] == "Vip"){
                                echo '<option selected = "selected" value="Vip">Vip</option>';
                                echo '<option value="NVip">None Vip</option>';
                            }
                            else{
                                echo '<option value="Vip">Vip</option>';
                                echo '<option selected = "selected" value="NVip">None Vip</option>';
                            }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Giới tính</td>
                <td>
                    <select class="w-200"  name="cbGender" id="">
                        <option value="Nam">Nam</option>
                        <option value="Nữ">Nữ</option>
                    </select>
                </td>
                <td>Tên dịch vụ</td>
                <td>
                    <select class="w-200" name="cbDichVu">
                        <option value="dv">Dịch vụ</option>
                        <?php
                            while($row=$danhsach->fetch_array(MYSQLI_ASSOC)){
                                echo "<option value='".$row['TenDichVu']."'>".$row['TenDichVu']."</option>";
                            }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>CCCD: </td>
                <td><input class="w-200"  type="text" name="txtCCCD" /></td>
            </tr>
            <tr>
                <td>Số điện thoại:</td>
                <td><input class="w-200"  type="text" name="txtDienThoai" /></td>
            </tr>
        </table>
        
        <div class="XN">
            <input class="regis" type="submit" value="Xác nhận"/>
        </div>
    </form>
</div>
<!--  -->