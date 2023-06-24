<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300&subset=vietnamese' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="dang-nhap.css">
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
                <h1>Đăng nhập</h1>
            </header>
            <article class="form">
                <form action="/dang-nhap" method="post">
                    <div class="validation-summary-errors">
                        <ul>
                            <li style="display:none"></li>
                        </ul>
                    </div>
                    <p>
                        <label for="Email">Email</label>
                        <input class="input-validation-error" data-val="true" data-val-email="Sai định dạng Email" data-val-required="*" id="Email" name="Email" type="text" value="" />
                        <span class="field-validation-error" data-valmsg-for="Email" data-valmsg-replace="true">*</span>
                    </p>
                    <p>
                        <label for="Password">Mật khẩu</label>
                        <input class="input-validation-error" data-val="true" data-val-required="*" id="Password" name="Password" type="password" />
                        <span class="field-validation-error" data-valmsg-for="Password" data-valmsg-replace="true">*</span>
                    </p>
                    <p>
                    <label>
                        <input class="check-box" data-val="true" data-val-required="The Ghi nhớ field is required." id="RememberMe" name="RememberMe" type="checkbox" value="true" />
                        <input name="RememberMe" type="hidden" value="false" />  Ghi nhớ
                    </label>
                    </p>
                    <p>
                        <input type="submit" class="btn" value="Đăng nhập" />
                    </p>
                    <p>
                        Chưa có tài khoản? Hãy <a href="dang-ky.php" class="btn"><strong>Đăng ký</strong></a>
                    </p>
                </form>
            </article>
            <fieldset style="margin-top: 40px">
                <legend>Quên mật khẩu?</legend>
                <form action="/Account/ForgotPassword" method="POST" class="form">
                    <p>
                        <label>Email</label>
                        <input type="text" name="email" value="" />
                    </p>
                    <p>
                        <input type="submit" class="btn" value="Tìm lại mật khẩu" />
                    </p>
                </form>
            </fieldset>
        </div>
    </div>
    <footer class="footer">
        Địa chỉ: Đường Nghiêm Xuân Yêm - Đại Kim - Hoàng Mai - Hà Nội</br>
        Hộ trợ kỹ thuật: 0123456789 (Nhóm dự án công nghệ thông tin)
    </footer>
</body>
</html>