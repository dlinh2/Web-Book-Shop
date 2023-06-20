<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ</title>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300&subset=vietnamese' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="Danh-muc.css">
</head>
<body>
    <div class="header">
        <div class="wrapper">
            <ul class= "topnav">
                <a href="/BookShop/kiem-tra-don-hang.php">Kiểm tra đơn hàng</a>
            </ul>
            <ul class="topnavR">
                <li><a href="/BookShop/dang-ky.php">Đăng ký</a></li>
                <li><a href="/BookShop/dang-nhap.php">Đăng nhập</a></li>
            </ul>
        </div>
        <div class="mednav">
            <a href="/BookShop/homePage.php">
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
                <li><a href="/BookShop/Gioi-thieu.php">Giới thiệu</a></li>
                <li>
                    <a href="">Danh mục sách</a>
                    <ul class="subnav">
                        <li><a href="/BookShop/Danh-muc.php">Văn học Việt Nam</a></li>
                        <li><a href="/BookShop/Danh-muc.php">Văn học Nước Ngoài</a></li>
                        <li><a href="/BookShop/Danh-muc.php">Thiếu nhi</a></li>
                    </ul>
                </li>
                <li><a href="/BookShop/San-pham.php">Sản phẩm</a></li>
            </ul>
    </div>
    <div class="pageBody">
        <a href='/BookShop/Danh-muc.php'>
            <div class="category">
                <h1>Sách Mới</h1>
            </div>
        </a>
        <div class="bookShelf" id="sach-moi">
            <div class="listImg">
                <a href='/BookShop/BookDetail.php'><img src="img/lang-nghe-gio-hat.jpg"></a>
                <a href='/BookShop/BookDetail.php'><img src="img/khoa-hoc-chay-bo.jpg"></a>
                <a href='/BookShop/BookDetail.php'><img src="img/bau-troi-va-mat-dat.jpg"></a>
                <a href='/BookShop/BookDetail.php'><img src="img/ngoi-thu-nhat.jpg"></a>
                <a href='/BookShop/BookDetail.php'><img src="img/khan-goi-len-sao-hoa.jpg"><a>
                <a href='/BookShop/BookDetail.php'><img src="img/quy-luat.jpg"></a>
                <a href='/BookShop/BookDetail.php'><img src="img/hanh-trinh-yeu.jpg"><a>
            </div>
        </div>
    </div>
    <footer class="footer">
        Địa chỉ: Đường Nghiêm Xuân Yêm - Đại Kim - Hoàng Mai - Hà Nội</br>
        Hộ trợ kỹ thuật: 0123456789 (Nhóm dự án công nghệ thông tin)
    </footer>
</body>
</html>