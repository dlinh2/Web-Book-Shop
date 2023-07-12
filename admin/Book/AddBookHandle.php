<html>
    <head>
        <link rel="stylesheet" href="AddBook.css">
        
    </head>
    <body>
        <?php
        include("../Header/Header.php");
        require_once("../../models/classBook.php");
        if (!isset($_POST["b1"])) {
            die("<h3>Chưa nhập form</h3>");
        }
        require_once("UploadFile.php");

        $bookName = $_POST["tBookName"];
        $authorId = $_POST["sAuthor"];
        $publisherId = $_POST["sPublisher"];
        $translatorId = isset($_POST["sTranslator"]) ? $_POST["sTranslator"] : NULL;
        $categoryId = isset($_POST["sCategory"]) ? $_POST["sCategory"] : NULL;
        $status = $_POST["rStatus"];
        $pages = $_POST["tPages"];
        $sizes = $_POST["tSizes"];
        $publishDate = $_POST["dPublishDate"];
        $price = $_POST["tPrice"];
        $cover = UploadFile("fCover", "img");
        $description = $_POST["tDescription"];

        $book = new Book();
        $result = $book->addBook($bookName, $categoryId, $authorId, $translatorId, $publisherId, 
                                 $status, $pages, $sizes, $publishDate, $description, $price, $cover);
        if ($result) {
            $message = "Thêm thành công";
            echo "<script type='text/javascript'>alert('$message');window.location.href='BookList.php';</script>";
            //header('Location: BookList.php');
            die();
        } else {
            echo "<h1> Lỗi thêm dữ liệu</h1>";
        }
        ?>
        <h1><a href="BookList.php">Danh sách</a></h1>
    </body>
</html>
