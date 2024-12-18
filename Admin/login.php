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
                <div class="login">
                    <div class="login__container">
                        <h1>Đăng Nhập</h1>
                        <form action="login_handle.php" method="post">
                            <h5>Tên đăng nhập</h5>
                            <input type="text" class="input-login-username" name="txtTenDangNhap"/>
                            <h5>Mật khẩu</h5>
                            <input type="password" class="input-login-password" name="txtMatKhau"/>
                            <input type="submit" class="login__signInButton" value="Đăng nhập">
                        </form>
                        <a href="signup.php" class="login__registerButton"
                        >Tạo tài khoản mới</a>
                    </div>
                </div>
            </div>    
        </div>
    </div>
</body>
</html>