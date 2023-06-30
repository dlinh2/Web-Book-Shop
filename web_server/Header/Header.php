<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../Header/Header.css?v=<?php echo time(); ?>">
    
</head>
<body>
    <?php
        require_once("../Login/LoggedinCheck.php");
    ?>
    <div class="header">
        <div class="wrapper">
            <ul class="topnav">
                <a href="/BookShop/kiem-tra-don-hang.php">Kiểm tra đơn hàng</a>
            </ul>
            <ul class="topnavR">
                <li><a href="../Login/Login.php">Đăng xuất</a></li>
            </ul>
        </div>
        <div class="mednav">
            <div class="logo">
                <a href="/BookShop/homePage.php"><img src="../../img/logo.png" alt="Book Shop"> </a>
            </div>
        </div>
        <ul id="nav">
            <li><a href="../Author/AuthorList.php">Tác giả</a></li>
            <li><a href="../Translator/TranslatorList.php">Nhóm dịch</a></li>
            <li><a href="../Publisher/PublisherList.php">Nhà xuất bản</a></li>
            <li><a href="../Category/CategoryList.php">Nhóm sản phẩm</a></li>
            <li><a href="../Book/BookList.php">Sách</a></li>
        </ul>
    </div>
</body>
</html>