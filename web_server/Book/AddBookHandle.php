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

        $bookName = $_POST["tBookName"];

        $book = new Book();
        $result = $book->addBook();
        if ($result) {
            header('Location: BookList.php');
            die();
        } else {
            echo "<h3> Lỗi thêm dữ liệu";
        }
        ?>
        <a href="BookList.php">Danh sách</a>
    </body>
</html>
