<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ</title>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300&subset=vietnamese' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="kiem-tra-don-hang.css">
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
    <div class="bodyP">
        <div class="pHeader">
            <h1>Kiểm tra đơn hàng</h1>
        </div>
        <div class="checkorder">
            <div class="form">
                <form action="/kiem-tra-don-hang" method="GET">
                    <input name="orderid" placeholder="Nhập mã đơn hàng của bạn" class="text" />
                    <input type="submit" value="Tìm mã" class="submit" />
                </form>

            </div>
        </div>

    </div>

    </div>
    <footer class="footer">
        Địa chỉ: Đường Nghiêm Xuân Yêm - Đại Kim - Hoàng Mai - Hà Nội</br>
        Hộ trợ kỹ thuật: 0123456789 (Nhóm dự án công nghệ thông tin)
    </footer>
</body>
</html>