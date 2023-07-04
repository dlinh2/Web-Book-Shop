<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300&subset=vietnamese' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="index.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="dang-nhap.css?v=<?php echo time(); ?>">
</head>
<body>
    <?php 
        include_once("Header.php"); 
        if (isset($_COOKIE['username']) && isset($_COOKIE['password'])) {
            $username = $_COOKIE['username'];
            $password = $_COOKIE['password'];
        }
        if (isset($_COOKIE["success"])) { ?>
        <script>alert("<?=$_COOKIE["success"] ?>")</script>
        
    <?php } ?>
    <div class="container">
        <div class="bookdetailwrap">
            <header class="pageheader">
                <h1>Đăng nhập</h1>
            </header>
            <article class="form">
                <form action="LoginHandle.php" method="post">
                    <p>
                        <label for="Username">Username</label>
                        <input id="username" name="username" type="text" value="<?php echo isset($username) ? $username : "" ?>" />
                    </p>
                    <p>
                        <label for="Password">Mật khẩu</label>
                        <input id="Password" name="Password" type="password" value="<?php echo isset($password) ? $password : "" ?>"/>
                    <p>
                    <label>
                        <input class="check-box" id="RememberMe" name="RememberMe" type="checkbox" checked/>
                        Ghi nhớ
                    </label>
                    </p>
                    <p>
                        <input type="submit" name="bSubmit" class="btn" value="Đăng nhập" />
                    </p>
                    <p>
                        Chưa có tài khoản? Hãy <a href="dang-ky.php" class="btn"><strong>Đăng ký</strong></a>
                    </p>
                </form>
            </article>
        </div>
    </div>
    <footer class="footer">
        Địa chỉ: Đường Nghiêm Xuân Yêm - Đại Kim - Hoàng Mai - Hà Nội</br>
        Hộ trợ kỹ thuật: 0123456789 (Nhóm dự án công nghệ thông tin)
    </footer>
</body>
</html>