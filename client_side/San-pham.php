<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ</title>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300&subset=vietnamese' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="index.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="San-pham.css?v=<?php echo time(); ?>">
</head>
<body>
    <?php include_once("Header.php"); ?>
    <div class="pageBody">
        <?php
            require_once("../models/classBook.php");
        ?>
        <div class="category">
            <h1>Sản Phẩm</h1>
        </div>
        <?php
        $bookObj = new Book();
        $result = $bookObj->getBookList();
        if(!$result)
            die("<h1>Trouble connecting to database</h1>");
        $books = array_filter($bookObj->data, function($book) {
            return $book["book_status"];
        });
        
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
                <img src="../img/<?=$book["book_cover"]?>" alt="alt.jpg">
            </a>
        <?php } ?>
        </div>
        <?php }?>
    </div>
    <footer class="footer">
        Địa chỉ: Đường Nghiêm Xuân Yêm - Đại Kim - Hoàng Mai - Hà Nội</br>
        Hộ trợ kỹ thuật: 0123456789 (Nhóm dự án công nghệ thông tin)
    </footer>
</body>
</html>