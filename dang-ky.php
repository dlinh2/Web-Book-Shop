<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký</title>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300&subset=vietnamese' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="dang-ky.css">
</head>
<body>
    <div class="header">
        <div class="wrapper">
            <ul class= "topnav">
                <a href="kiem-tra-don-hang.php">Kiểm tra đơn hàng</a>
            </ul>
            <ul class="topnavR">
                <li><a href="dang-ky.php">Đăng ký</a></li>
                <li><a href="dang-nhap.php">Đăng nhập</a></li>
            </ul>
        </div>
        <div class="mednav">
            <a href="HomePage.php">
                <div class="logo">
                    <img src="img/logo.png" alt="Book Shop">
                </div>
            </a>
            <div class="search">
                <form action="/tim-kiem" method="GET">
                    <input type="text" name="q" placeholder="Tìm kiếm sách..." class="text" />
                    <input type="submit" value="Tìm kiếm" class="submit" />
                </form>
            </div>
            <div class="cart" id="cart">
                Giỏ hàng (<span id="cartcount">0</span>)
            </div>
        </div>
            <ul id="nav">
                <li><a href="Gioi-thieu.php">Giới thiệu</a></li>
                <li>
                    <a href="">Danh mục sách</a>
                    <ul class="subnav">
                        <li><a href="Danh-muc.php?id=van-hoc-viet-nam">Văn học Việt Nam</a></li>
                        <li><a href="Danh-muc.php?id=van-hoc-nuoc-ngoai">Văn học Nước Ngoài</a></li>
                        <li><a href="Danh-muc.php?id=thieu-nhi">Thiếu nhi</a></li>
                    </ul>
                </li>
                <li><a href="San-pham.php">Sản phẩm</a></li>
            </ul>
    </div>
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