<html>
    <head>
        <link rel="stylesheet" href="AddAuthor.css">
        
    </head>
    <body>
        <?php
        include("../Header/Header.php");
        require_once("../../models/classAuthor.php");
        if (!isset($_POST["b1"])) {
            die("<h1>Chưa nhập form</h1>");
        }

        $authorName = $_POST["tAuthorName"];
        $authorBio = $_POST["tAuthorBio"];
        $authorId = $_REQUEST["id"];
        $author = new Author();
        $result = $author->updateAuthor($authorId, $authorName, $authorBio);
        if ($result) {
            $message = "Cập nhật thành công";
            echo "<script type='text/javascript'>alert('$message');window.location.href='AuthorList.php';</script>";
        } else {
            echo "<h1> Lỗi sửa dữ liệu</h1>";
        }
        ?>
        <h1><a href="AuthorList.php">Danh sách tác giả</a></h1>
    </body>
</html>
