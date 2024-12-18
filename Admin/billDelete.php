<?php
    $sql = "DELETE FROM tbl_hoadon WHERE MaHD = ".$_GET['id'];
    $danhsach = $connect->query($sql);
    if($danhsach){
        header("Location: index.php?do=bill");
    }
?>