<?php
    session_start();

    include "config.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css" type="text/css" media="all">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>TH Hotel</title>
</head>
<body>
    <div class="bg1">
        <div class="bg2">
            <div id="main">
                <!-- header -->
                <header>
                    <h1><a href="index.html" id="logo">LoungeHotel</a></h1>
                    <div class="department">
                        22A, Tran Hung Dao Road, TP. Long Xuyen
                        <br>
                        <span>Freephone: &nbsp;  +84 916 703 651</span>
                    </div>
                    <div class="login">
                    <?php
                        if(isset($_SESSION['MaNV']) && isset($_SESSION['HoVaTen']))
                        {
                            echo "Xin chào ".$_SESSION['HoVaTen']." &nbsp;&nbsp;|| &nbsp;&nbsp;";
                            echo '<a href="index.php?do=logout">Đăng xuất</a>'."&nbsp;&nbsp;";
                        }
                        else{
                            echo '<a href="login.php" class="btnDangNhap">Đăng nhập</a>';
                            echo '<a href="signup.php" class="btnDangKy">Đăng ký</a>';
                        }
				    ?>
                    </div>
                </header>
                <!-- body -->
                <div class="box">
                    <div id="notify">
                        <p class="title">web quản lí khách sạn</p>
                    </div>
                    <nav id="menu">
                        <?php
                            if(!isset($_SESSION['MaNV']))
                            {
                                echo '<h3>Quản lý</h3>';
                                    echo '<ul>';
                                        echo '<li><a href="login.php">Đăng nhập</a></li>';
                                        echo '<li><a href="signup.php">Đăng ký</a></li>';
                                echo '</ul>';
                            }
                            else{
                                if($_SESSION['QuyenHan'] == 1){
                                    echo '<h3>Quản lý</h3>';
                                    echo '<ul>';
                                        echo "<li><a href='index.php?do=profile&id=" . $_SESSION['MaNV'] . "'>Hồ sơ cá nhân</a></li>";
                                        echo "<li><a href='index.php?do=changePass&id= ".$_SESSION['MaNV']."'>Đổi mật khẩu</a></li>";
                                    echo '</ul>';
                                    echo '<h3>Xem danh sách</h3>';
                                    echo '<ul>';
                                        echo '<li>';
                                            echo '<a href="index.php?do=staffs">Danh sách nhân viên</a>';
                                        echo '</li>';
                                        echo '<li>';
                                            echo '<a href="index.php?do=customer">Danh sách khách hàng</a>';
                                        echo '</li>';
                                        echo '<li>';
                                            echo '<a href="index.php?do=rooms">Danh sách phòng</a>';
                                        echo '</li>';
                                        echo '<li>';
                                            echo '<a href="index.php?do=service">Danh sách dịch vụ</a>';
                                        echo '</li>';
                                        echo '<li>';
                                            echo '<a href="index.php?do=bill">Danh sách hóa đơn</a>';
                                        echo '</li>';
                                    echo '</ul>';
                                }else{
                                    echo '<h3>Quản lý</h3>';
                                    echo '<ul>';
                                        echo "<li><a href='index.php?do=profile&id=" . $_SESSION['MaNV'] . "'>Hồ sơ cá nhân</a></li>";
                                        echo "<li><a href='index.php?do=changePass&id= ".$_SESSION['MaNV']."'>Đổi mật khẩu</a></li>";
                                    echo '</ul>';
                                }
                            }
                        ?>
                        
                        
                    </nav>
                    <!-- ket thuc header -->
                    <!-- content -->
                    <article id="content">
                        <div class="box-content">
                            <?php
                                $do = isset($_GET['do']) ? $_GET['do'] : "home";
                                include $do . ".php";
                            ?>
                        </div>  
                    </article>
                    <!-- ketthuc content -->
                </div>
            </div>
            <footer>
               <div id="main"> 
                    <div style="padding-right: 35px;" class="col-half">
                        <div class="footer-decs">Lounge Hotel © 2011 Website Template by www.templatemonster.com
                        </div>
                        <nav >
                            <ul id="footer-menu" style="list-style: none;">
                            </ul>
                        </nav>
                    </div>  
                    <div class="col-third pad-l">
                        <ul id="icon">
                            <li><a href="" title=""><img src="img/icon1.jpg" alt=""></a></li>
                            <li><a href="" title=""><img src="img/icon2.jpg" alt=""></a></li>
                            <li><a href="" title=""><img src="img/icon3.jpg" alt=""></a></li>
                            <li><a href="" title=""><img src="img/icon4.jpg" alt=""></a></li>
                        </ul>
                    </div>
                </div>
            </footer>
        </div>
    </div>
</body>
</html>