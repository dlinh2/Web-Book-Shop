<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ</title>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300&subset=vietnamese' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="San-pham.css">
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
    <div class="pageBody">
        <?php
            require_once("models/classBook.php");
        ?>
        <?php
        $book = new Book();
        $ketqua_B = $book->getBookList();
        if($ketqua_B==FALSE)
            die("<p>LỖI TRUY VẤN DỮ LIỆU BOOK</p>");
        $rows = $book->data;
        if($rows==NULL)
            die("<p> KHÔNG CÓ DỮ LIỆU </p>");
        ?>
        <div class="category">
            <h1>Sản Phẩm</h1>
        </div>
        <?php
        foreach($rows as $row)
        {
            $bImg = $row["book_cover"]==""?"no-image.png":$row["book_cover"];
        ?>
            <div class="bookShelf">
            <div class="listImg">
                <a href="BookDetail.php?id=" class="book"><img src="img/<?=$bImg?>"></a>
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
                </div>   -->
            </div>
        </div>
        <?php
        }//đóng foreach
        ?>
        <!-- <div class="category">
            <h1>Sản phẩm</h1>
        </div>
        <div class="bookShelf" id="san-pham">
            <div class="listImg">
                <a href='BookDetail.php'><img src="img/lang-nghe-gio-hat.jpg"></a>
                <a href='BookDetail.php'><img src="img/khoa-hoc-chay-bo.jpg"></a>
                <a href='BookDetail.php'><img src="img/bau-troi-va-mat-dat.jpg"></a>
                <a href='BookDetail.php'><img src="img/ngoi-thu-nhat.jpg"></a>
                <a href='BookDetail.php'><img src="img/khan-goi-len-sao-hoa.jpg"><a>
                <a href='BookDetail.php'><img src="img/quy-luat.jpg"></a>
                <a href='BookDetail.php'><img src="img/hanh-trinh-yeu.jpg"><a>
            </div>
        </div> -->
    </div>
    <footer class="footer">
        Địa chỉ: Đường Nghiêm Xuân Yêm - Đại Kim - Hoàng Mai - Hà Nội</br>
        Hộ trợ kỹ thuật: 0123456789 (Nhóm dự án công nghệ thông tin)
    </footer>
</body>
</html>