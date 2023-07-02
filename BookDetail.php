<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ</title>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300&subset=vietnamese' rel='stylesheet'
        type='text/css'>
        <link rel="stylesheet" href="index.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="BookDetail.css?v=<?php echo time(); ?>">
</head>

<body>
    <?php 
        include_once("Header.php"); 
        if (!isset($_REQUEST["id"])) {
            die("Chưa chọn sản phẩm");
        }
        $id = $_REQUEST["id"];
        require_once("models/classBook.php");
        require_once("models/classAuthor.php");
        require_once("models/classPublisher.php");

        $bookObj = new Book();
        $result = $bookObj->getBookById($id);
        if (!$result) die("<h1>Trouble connecting to database</h1>");
        $book = $bookObj->data;

        $authorObj = new Author();
        $result = $authorObj->getAuthorById($book["book_author_id"]);
        if (!$result) die("<h1>Trouble connecting to database</h1>");
        $author = $authorObj->data;

        $publisherObj = new Publisher();
        $result = $publisherObj->getPublisherById($book["book_publisher_id"]);
        if (!$result) die("<h1>Trouble connecting to database</h1>");
        $publisher = $publisherObj->data;

        if ($book["book_translator_id"] != NULL) {
            require_once("models/classTranslator.php");
            $translatorObj = new Translator();
            $result = $translatorObj->getTranslatorById($book["book_translator_id"]);
            if (!$result) die("<h1>Trouble connecting to database</h1>");
            $translator = $translatorObj->data;
        }
    ?>
    <div class="bookdetailwrap">
        <div class="bookdetail clearfix">
            <a class="image image0" href="/sach/19271/nha-gia-kim">
                
                <img src="img/<?=$book["book_cover"] ?>" alt="Nhà giả kim">
                
                <span class="overlay"></span>
            </a>
    
            <div class="info">
                <h1>
                    <a href="/sach/19271/nha-gia-kim"><?=$book["book_name"]?></a>
                </h1>
                <div class="intro clearfix">
                    <div class="attributes">
                        <ul>
                            <li class="dataattr">
                                <span>Mã sản phẩm:</span>
                                <a href=""><?=$book["book_id"]?></a>
                            </li>
                            <li class="dataattr">
                                <span>Tác giả: </span>
                                <a href=""><?=$author["author_name"]?></a>
                            </li>
                            <?php 
                            if (isset($translator)) { ?>
                            <li class="dataattr">
                                <span>Dịch giả: </span>
                                <a href=""><?=$translator["translator_name"]?></a>
                            </li>
                            <?php } ?>
                            <li class="dataattr">
                                <span>Nhà xuất bản: </span>
                                <a href=""><?=$publisher["publisher_name"] ?></a>
                            </li>
                        </ul>
                        <ul>
                            <li>Số trang: <?=$book["book_pages"] ?></li>
                            <li>Kích thước: <?=$book["book_sizes"] ?></li>
                            <li>Ngày phát hành: <?=date("d-m-Y",strtotime($book["book_publish_date"])) ?></li>
                        </ul>
                    </div>

                    <div class="action">
                        <div class="price">
                            <p>Giá BookShop: <span><?=$book["book_price"] ?></span></p>
                        </div>
                        <div class="quantitytext">
                            Số lượng:
                        </div>
    
                        <div class="quantity">
                            <input type="text" value="1" onkeypress="return KeyPressQty(event)" class="tbQty" name="qty" id="quantity" style="color: red;">
                            <span class="arrowBlock">
                                <a class="upQty" href="javascript: upQtyClick();"></a>
                                <a class="downQty" href="javascript: downQtyClick();"></a>
                            </span>
    
                        </div>
    
    
                        <a href="" class="addtocart" data-id="19271" data-state="0">Thêm vào giỏ hàng</a>
                        <a href="" class="buynow" data-id="19271" data-state="0">Mua ngay</a>

                    </div>
                </div>
            </div>
        </div>
        <div class="bookdetailblockcontent">
            <h1> Giới thiệu sách</h1>
            <article>
                <?=$book["book_description"] ?>
            </article>
        </div>
    </div>
    <footer class="footer">
        Địa chỉ: Đường Nghiêm Xuân Yêm - Đại Kim - Hoàng Mai - Hà Nội</br>
        Hộ trợ kỹ thuật: 0123456789 (Nhóm dự án công nghệ thông tin)
    </footer>
</body>

</html>