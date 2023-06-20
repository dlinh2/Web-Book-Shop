<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ</title>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300&subset=vietnamese' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="HomePage.css">
</head>
<body>
    <div class="header">
        <div class="wrapper">
            <ul class= "topnav">
                <a href="/BookShop/kiem-tra-don-hang.php">Kiểm tra đơn hàng</a>
            </ul>
            <ul class="topnavR">
                <li><a href="/dang-ky">Đăng ký</a></li>
                <li><a href="/dang-nhap">Đăng nhập</a></li>
            </ul>
        </div>
        <div class="mednav">
            <div class="logo">
                <img src="img/logo.png" alt="Book Shop">
            </div>
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
                    <a action="">Danh mục sách</a>
                    <ul class="subnav">
                        <li><a href="/BookShop/Danh-muc.php" id="van-hoc-viet-nam">Văn học Việt Nam</a></li>
                        <li><a href="/BookShop/Danh-muc.php" id="van-hoc-nuoc-ngoai">Văn học Nước Ngoài</a></li>
                        <li><a href="/BookShop/Danh-muc.php" id="thieu-nhi">Thiếu nhi</a></li>
                    </ul>
                </li>
                <li><a href="/BookShop/San-Pham.php">Sản phẩm</a></li>
            </ul>
    </div>
    <div class="slideshow-container">
        <div class="mySlides fade">
            <div class="numbertext">1 / 3</div>
                <img src="img/anh1.jpg" style="width:100%">
                <div class="text">Sách hay tặng bé</div>
            </div>

            <div class="mySlides fade">
                <div class="numbertext">2 / 3</div>
                <img src="img/anh2.jpg" style="width:100%">
                <div class="text">Sách mới</div>
            </div>

            <div class="mySlides fade">
                <div class="numbertext">3 / 3</div>
                <img src="img/anh3.jpg" style="width:100%">
                <div class="text">Sách tái bản</div>
            </div>
            <div style="text-align:center">
                <span class="dot" onclick="currentSlide(1)"></span>
                <span class="dot" onclick="currentSlide(2)"></span>
                <span class="dot" onclick="currentSlide(3)"></span>
            </div>

        </div>
        <script>
            let slideIndex = 0;
            showSlides();

            function showSlides() {
                let i;
                let slides = document.getElementsByClassName("mySlides");
                for (i = 0; i < slides.length; i++) {
                    slides[i].style.display = "none";
                }
                slideIndex++;
                if (slideIndex > slides.length) {slideIndex = 1}
                slides[slideIndex-1].style.display = "block";
                setTimeout(showSlides, 4000); // Change image every 2 seconds
            }
        </script>
        <br>
    <div class="pageBody">
        <a href='/BookShop/Danh-muc.php'>
            <div class="category">
                <h1>Sách Mới</h1>
            </div>
        </a>
        <div class="bookShelf" id="sach-moi">
            <div class="listImg">
                <a href="/BookShop/BookDetail.php" class="book"><img src="img/lang-nghe-gio-hat.jpg"></a>
                <!-- <div class="popup" style="left:5px;  ">
                    <h1 class="name">Tắt đèn</h1>
                    <div class="description">
                        <ul>
                            <li>Số trang: 231</li>
                            <li>Kích thước: 14x20.5 cm </li>
                            <li>Ngày phát hành: 30-07-2018</li>
                        </ul>
                    </div>
                    <p class="price">48.000đ</p>
                </div> -->
                <a href='/BookShop/BookDetail.php'><img src="img/khoa-hoc-chay-bo.jpg"></a>
                <a href='/BookShop/BookDetail.php'><img src="img/bau-troi-va-mat-dat.jpg"></a>
                <a href='/BookShop/BookDetail.php'><img src="img/ngoi-thu-nhat.jpg"></a>
                <a href='/BookShop/BookDetail.php'><img src="img/khan-goi-len-sao-hoa.jpg"><a>
                <a href='/BookShop/BookDetail.php'><img src="img/quy-luat.jpg"></a>
                <a href='/BookShop/BookDetail.php'><img src="img/hanh-trinh-yeu.jpg"><a>
            </div>
        </div>
        <a href='/BookShop/Danh-muc.php'>
            <div class="category">
                <h1>Sách bán chạy</h1>
            </div>
        </a>
        <div class="bookShelf" id="sach-ban-chay">
            <div class="listImg">
                <a href='/BookShop/BookDetail.php'><img src="img/ngoi-thu-nhat.jpg"></a>
                <a href='/BookShop/BookDetail.php'><img src="img/hoang-tu-be.jpg"></a>
                <a href='/BookShop/BookDetail.php'><img src="img/ngay-moi.jpg"></a>
                <a href='/BookShop/BookDetail.php'><img src="img/di-tim-dora.jpg"></a>
                <a href='/BookShop/BookDetail.php'><img src="img/mot-lit-nuoc-mat.jpg"></a>
                <a href='/BookShop/BookDetail.php'><img src="img/nha-gia-kim.jpg"></a>
            </div>
            <p class="shelf"></p>
        </div>
        
    </div>
    <footer class="footer">
        Địa chỉ: Đường Nghiêm Xuân Yêm - Đại Kim - Hoàng Mai - Hà Nội</br>
        Hộ trợ kỹ thuật: 0123456789 (Nhóm dự án công nghệ thông tin)
    </footer>
</body>
</html>