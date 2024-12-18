<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css" media="all">
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
                </header>
                <!-- body -->
                <div class="box">
                    <nav>
                        <ul id="menu">
                            <li>
                                <a href="index.php?do=home">Về Chúng Tôi</a>
                            </li>
                            <li >
                                <a href="index.php?do=services">Dịch Vụ</a>
                            </li>
                            <li>
                                <a href="index.php?do=rooms">Phòng</a>
                            </li>
                            <li>
                                <a href="index.php?do=booking">Đặt Phòng</a>
                            </li>
                        </ul>
                    </nav>
                    <!-- ket thuc header -->
                    <!-- content -->
                    <article id="content">
                        <?php
                            $do = isset($_GET['do']) ? $_GET['do'] : "home";
                            include $do . ".php";
                        ?>
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
                                <li class="active bor_r-bgb">
                                    <a href="index.html">Về Chúng Tôi</a>
                                </li>
                                <li class="bor_r-bgb">
                                    <a href="services.html">Dịch Vụ</a>
                                </li>
                                <li class="bor_r-bgb">
                                    <a href="booking.html">Đặt Phòng</a>
                                </li>
                                <li class="bor_r-bgb">
                                    <a href="rooms.html">Phòng</a>
                                </li>
                                <li >
                                    <a href="locations.html">Vị Trí</a>
                                </li>
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