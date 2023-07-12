<html>
    <head>
        <link rel="stylesheet" href="AddBook.css">
        
    </head>
    <body>
        <?php
        include("../Header/Header.php");
        if (!isset($_REQUEST["id"])) {
            die("<h1>Chưa chọn sách</h1>");
        }
        $id = $_REQUEST["id"];
        require_once("../../models/classBook.php");
        $bookObj = new Book();
        $result = $bookObj->deleteBook($id);
        
        if ($result) {
            $message = "Xóa thành công";
            echo "<script type='text/javascript'>alert('$message');window.location.href='BookList.php';</script>";
        } else {
            echo "<h1> Lỗi xóa dữ liệu</h1>";
        }
        ?>
        <h1><a href="BookList.php">Danh sách</a></h1>
    </body>
</html>
