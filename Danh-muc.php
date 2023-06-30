<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ</title>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300&subset=vietnamese' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="Danh-muc.css?v=<?php echo time(); ?>">
</head>
<body>
    <?php
        include_once("Header.php");
          $id = "";
          if(isset($_REQUEST["id"]))
              $id = $_REQUEST["id"];
    ?>
    
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
            <div class="category">
                <h1>Văn Học Việt Nam</h1>
            </div>
            <div class="bookShelf">
            <div class="listImg">
                <a href="BookDetail.php?id=" class="book"><img src="images/<?=$bImg?>"></a>
                
            </div>
        </div>
        <?php } ?>
    </div>
    <footer class="footer">
        Địa chỉ: Đường Nghiêm Xuân Yêm - Đại Kim - Hoàng Mai - Hà Nội</br>
        Hộ trợ kỹ thuật: 0123456789 (Nhóm dự án công nghệ thông tin)
    </footer>
</body>
</html>