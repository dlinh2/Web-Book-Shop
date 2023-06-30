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
                <form action="/dang-ky" method="post">            
                    <p>
                        <label for="Email">Email</label>
                        <input class="text-box single-line" data-val="true" data-val-regex="Hãy nhập đúng định dạng Email" data-val-regex-pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}" data-val-required="*" id="Email" name="Email" type="text" value="" />
                        <span class="field-validation-valid" data-valmsg-for="Email" data-valmsg-replace="true"></span>
                    </p>
                    <p>
                        <label for="Password">Mật khẩu</label>
                        <input class="text-box single-line password" data-val="true" data-val-length="Mật khẩu Có độ dài từ 6 - 20 ký tự." data-val-length-max="20" data-val-length-min="6" data-val-required="*" id="Password" name="Password" type="password" value="" />
                        <span class="field-validation-valid" data-valmsg-for="Password" data-valmsg-replace="true"></span>
                    </p>
                    <p>
                        <label for="ConfirmPassword">Xác nhận mật khẩu</label>
                        <input class="text-box single-line password" data-val="true" data-val-length="Xác nhận mật khẩu Có độ dài từ 6 - 20 ký tự." data-val-length-max="20" data-val-length-min="6" data-val-required="*" id="ConfirmPassword" name="ConfirmPassword" type="password" value="" />
                        <span class="field-validation-valid" data-valmsg-for="ConfirmPassword" data-valmsg-replace="true"></span>
                    </p>
                    <p>
                        <label for="FullName">Tên hiển thị</label>
                        <input class="text-box single-line" id="FullName" name="FullName" type="text" value="" />
                        <span class="field-validation-valid" data-valmsg-for="FullName" data-valmsg-replace="true"></span>
                    </p>
                    <p>
                        <input type="submit" class="btn" value="Đăng ký" />
                    </p>
                    <p>
                        Bạn đã có tài khoản? Hãy 
                        <a href="dang-nhap.php" class="btn">
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