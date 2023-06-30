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