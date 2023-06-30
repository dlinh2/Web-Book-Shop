<html>
    <head>
        <link rel="stylesheet" href="AddBook.css">
        
    </head>
    <body>
        <?php
        include("../Header/Header.php");
        require_once("../../models/classBook.php");
        if (!isset($_POST["b1"])) {
            die("<h1>Chưa nhập form</h1>");
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
        
        if ($_FILES["fCover"]["name"] == "") {
            $cover = $_POST["cover"];
        } else {
            $cover = UploadFile("fCover", "../../img");
        }
        $description = $_POST["tDescription"];
        $id = $_REQUEST["id"];
        $book = new Book();
        $result = $book->updateBook($id, $bookName, $categoryId, $authorId, $translatorId, $publisherId, 
                                 $status, $pages, $sizes, $publishDate, $description, $price, $cover);
        if ($result) {
            $message = "Cập nhật thành công";
            echo "<script type='text/javascript'>alert('$message');window.location.href='BookList.php';</script>";
        } else {
            echo "<h1> Lỗi sửa dữ liệu</h1>";
        }
        ?>
        <h1><a href="BookList.php">Danh sách</a></h1>
    </body>
</html>
