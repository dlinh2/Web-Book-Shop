<html>
    <head>
        <link rel="stylesheet" href="AddAuthor.css">
        
    </head>
    <body>
        <?php
        include("../Header/Header.php");
        if (!isset($_REQUEST["id"])) {
            die("<p>Chưa chọn tác giả</p>");
        }
        $id = $_REQUEST["id"];
        require_once("../../models/classAuthor.php");
        $authorObj = new Author();
        $result = $authorObj->deleteAuthor($id);
        
        if ($result) {
            header('Location: AuthorList.php');
            die();
        } else {
            echo "<h3> Lỗi xóa dữ liệu";
        }
        ?>
        <a href="AuthorList.php">Danh sách tác giả</a>
    </body>
</html>
