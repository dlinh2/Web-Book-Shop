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
    <?php 
        include_once("Header.php");
        require_once("../models/classBook.php");
        require_once("../models/classCategory.php");
    ?>
    <div class="slideshow-container">
        <div class="mySlides fade">
            <div class="numbertext">1 / 3</div>
                <img src="../img/anh1.jpg" style="width:100%">
                <div class="text">Sách hay tặng bé</div>
            </div>

            <div class="mySlides fade">
                <div class="numbertext">2 / 3</div>
                <img src="../img/anh2.jpg" style="width:100%">
                <div class="text">Sách mới</div>
            </div>

            <div class="mySlides fade">
                <div class="numbertext">3 / 3</div>
                <img src="../img/anh3.jpg" style="width:100%">
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
    $categoryObj = new Category();
    $result = $categoryObj->getCategoryList();
    if(!$result)
        die("<h1>Trouble connecting to database</h1>");
    $categoryObj->sortData();
    $categories = array_filter($categoryObj->data, function($category) {
        return $category["category_status"];
    });

    foreach ($categories as $category) {
    ?>
    <a href='Danh-muc.php?id=<?=$category["category_id"]?>'>
        <div class="category">
            <h2><?=$category["category_name"]?></h2>
        </div>
    </a>
    <?php
    $bookObj = new Book();
    $result = $bookObj->getBooksByCategory($category["category_id"]);
    if(!$result)
        die("<h1>Trouble connecting to database</h1>");
    $books = array_slice($bookObj->data, 0, 10);
    if (count($books) == 0) continue;
    $chunks = array_chunk($books, 5);
    foreach($chunks as $chunk)
    {
    ?>
    <div class="bookShelf">
    <?php
        foreach ($chunk as $book)
        {
    ?>
        <a href="BookDetail.php?id=<?=$book["book_id"]?>" class="book">
            <img src="../img/<?=$book["book_cover"]?>" alt="alt.png">
        </a>
    <?php } ?>
    </div>
    <?php }?>
    <?php }?>
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
         -->
    </div>
    <footer class="footer">
        Địa chỉ: Đường Nghiêm Xuân Yêm - Đại Kim - Hoàng Mai - Hà Nội</br>
        Hộ trợ kỹ thuật: 0123456789 (Nhóm dự án công nghệ thông tin)
    </footer>
</body>
</html>