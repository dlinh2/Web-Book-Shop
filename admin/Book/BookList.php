
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ</title>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300&subset=vietnamese' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="BookList.css?v=<?php echo time(); ?>">

</head>
<body>
    <?php
        include("../Header/Header.php");
        require_once("../../models/classBook.php");
        require_once("../../models/classAuthor.php");
        require_once("../../models/classPublisher.php");
        require_once("../../models/classTranslator.php");
        
        $bookObj = new Book();
        $result = $bookObj->getBookList();
        if (!$result)
            die("<p>Trouble connecting to database");
        $books = $bookObj->data;
        unset($bookObj);

    
    ?>
    <div class="table_wrap">
    <div class="add_link">
            <p><a href="AddBook.php">Thêm sách</a></p>
        </div>
        <table>
            <tr>
                <th width="50px">ID</th>
                <th width="180px">Title</th>
                <th width="150px">Cover</th>
                <th>Pages</th>
                <th>Sizes</th>
                <th>Publish date</th>
                <th width="120px">Price</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
            <?php foreach ($books as $book) { ?>
                <tr>
                    <td><?=$book["book_id"]?></td>
                    <td><?=$book["book_name"]?></td>
                    <td><img class="book_cover" src="<?="../../img/".$book["book_cover"]?>" alt=""></td>
                    <td><?=$book["book_pages"]?></td>
                    <td><?=$book["book_sizes"]?></td>
                    <td><?=$book["book_publish_date"]?></td>
                    <td><?=$book["book_price"] ?></td>
                    <td><?=$book["book_status"] ? "Có" : "Không" ?></td>
                    <td><a href="UpdateBook.php?id=<?=$book["book_id"]?>">Sửa</a> - <a href="DeleteBook.php?id=<?=$book["book_id"]?>" onclick="return confirm('Có chắc là bạn muốn xóa?')">Xóa</a></td>
                </tr>
            <?php } ?>
        </table>
    </div>

</body>
</html>
