<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css" type="text/css" media="all">
    <link rel="stylesheet" href="css/login_signup.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>TH Hotel</title>
</head>
<body>
    <div class="bg1">
        <div class="bg2">
            <div id="main">
                <div class="signup">
                    <div class="signup__container">
                        <h1>Đăng Ký</h1>
                        <form action="signup_handle.php" method="post">
                            <h5>Họ và tên</h5>
                            <input type="text" name="txtHoVaTen"/>
                            <h5>Số điện thoại</h5>
                            <input type="text" name="txtDienThoai"/>
                            <h5>CCCD</h5>
                            <input type="text" name="txtCCCD"/>
                            <h5>Tên đăng nhập</h5>
                            <input type="text" name="txtTenDangNhap"/>
                            <h5>Mật khẩu</h5>
                            <input type="password" name="txtMatKhau"/>
                            <h5>Xác nhận mật khẩu</h5>
                            <input type="password" name="txtXacNhanMatKhau"/>
                            <input type="submit" class="signup__signInButton" value="Đăng ký">x
                        </form>
                        <a href="login.php" class="signup__registerButton">Đăng nhập</a>
                    </div>
                </div>
            </div>    
        </div>
    </div>
</body>
</html>