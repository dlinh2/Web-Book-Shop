<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký</title>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300&subset=vietnamese' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="index.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="dang-ky.css?v=<?php echo time(); ?>">
</head>
<body>
    <?php include_once("Header.php"); ?>
    <div class="container">
        <div class="bookdetailwrap">
            <header class="pageheader">
                <h1>Đăng ký</h1>
            </header>
            <article class="form">
                <form action="SignUpHandle.php" method="post">            
                    <p>
                        <label for="username">Username</label>
                        <input id="username" name="username" type="text" value=""/>
                    </p>
                    <p>
                        <label for="Password">Mật khẩu</label>
                        <input id="Password" name="Password" type="password" value="" />
                    </p>
                    <p>
                        <label for="ConfirmPassword">Xác nhận mật khẩu</label>
                        <input id="ConfirmPassword" name="ConfirmPassword" type="password" value="" />
                    </p>
                    <?php if (isset($_COOKIE["error"])) { ?>
                        <div class="login_failed"><?php echo $_COOKIE["error"] ?></div>
                    <?php } ?>
                    <p>
                        <input type="submit" class="btn" value="Đăng ký" />
                    </p>
                    <p>
                        Bạn đã có tài khoản? Hãy 
                        <a href="" class="btn">
                            <strong>Đăng nhập</strong>
                        </a>
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