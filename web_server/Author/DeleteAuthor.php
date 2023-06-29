<html>
    <head>
        <link rel="stylesheet" href="AddAuthor.css">
        
    </head>
    <body>
        <?php
        include("../Header/Header.php");
        if (!isset($_REQUEST["id"])) {
            die("<h1>Chưa chọn tác giả</h1>");
        }
        $id = $_REQUEST["id"];
        require_once("../../models/classAuthor.php");
        $authorObj = new Author();
        $result = $authorObj->deleteAuthor($id);
        
        if ($result) {
            $message = "Xóa thành công";
            echo "<script type='text/javascript'>alert('$message');window.location.href='AuthorList.php';</script>";
        } else {
            echo "<h1> Lỗi xóa dữ liệu</h1>";
        }
        ?>
        <h1><a href="AuthorList.php">Danh sách tác giả</a></h1>
    </body>
</html>
