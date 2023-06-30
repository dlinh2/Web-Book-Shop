<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ</title>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300&subset=vietnamese' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="index.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="HomePage.css?v=<?php echo time(); ?>">
    <script>
            function showSlides() {
                let slides = document.getElementsByClassName("mySlides");
                for (i = 0; i < slides.length; i++) {
                    slides[i].style.display = "none";
                }
                if (slideIndex >= slides.length) {slideIndex = 0}
                slides[slideIndex].style.display = "block";
                slideIndex++;
                setTimeout(showSlides, 4000); 
            }

            function currentSlide(slide) {
                let slides = document.getElementsByClassName("mySlides");
                for (i = 0; i < slides.length; i++) {
                    slides[i].style.display = "none";
                }
                slides[slide].style.display = "block";
                slideIndex = slide;
            }
        </script>
</head>
<body>
    <?php include_once("Header.php"); ?>
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
                <span class="dot" onclick="currentSlide(0)"></span>
                <span class="dot" onclick="currentSlide(1)"></span>
                <span class="dot" onclick="currentSlide(2)"></span>
            </div>

        </div>
        <script>
            let slideIndex = 0;
            showSlides();
        </script>
        <br>
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
    foreach($rows as $row)
    {
        $bImg = $row["book_cover"]==""?"no-image.png":$row["book_cover"];
    ?>
        <a href='Danh-muc.php?id=sach-moi'>
            <div class="category">
                <h1>Sách Mới</h1>
            </div>
        </a>
        <div class="bookShelf">
            <div class="listImg">
                <a href="BookDetail.php?id=" class="book"><img src="images/<?=$bImg?>"></a>
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
        <a href='Danh-muc.php?id=sach-ban-chay'>
            <div class="category">
                <h1>Sách Bán Chạy</h1>
            </div>
            <div class="bookShelf">
            <div class="listImg">
                <a href="BookDetail.php?id=>" class="book"><img src="images/<?=$bImg?>"></a>
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
        </a>
    <?php
    }//đóng foreach
    ?>
        <!-- <a href='/BookShop/Danh-muc.php'>
            <div class="category">
                <h1>Sách Mới</h1>
            </div>
        </a>
        <div class="bookShelf" id="sach-moi">
            <div class="listImg">
                <a href="/BookShop/BookDetail.php" class="book"><img src="img/lang-nghe-gio-hat.jpg"></a>
                <div class="popup" style="left:5px;  ">
                    <h1 class="name">Tắt đèn</h1>
                    <div class="description">
                        <ul>
                            <li>Số trang: 231</li>
                            <li>Kích thước: 14x20.5 cm </li>
                            <li>Ngày phát hành: 30-07-2018</li>
                        </ul>
                    </div>
                    <p class="price">48.000đ</p>
                </div>
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
         -->
    </div>
    <footer class="footer">
        Địa chỉ: Đường Nghiêm Xuân Yêm - Đại Kim - Hoàng Mai - Hà Nội</br>
        Hộ trợ kỹ thuật: 0123456789 (Nhóm dự án công nghệ thông tin)
    </footer>
</body>
</html>