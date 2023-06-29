<html>
    <head>
        <link rel="stylesheet" href="AddAuthor.css">
        
    </head>
    <body>
        <?php
        include("../Header/Header.php");
        require_once("../../models/classAuthor.php");
        if (!isset($_POST["b1"])) {
            die("<h3>Chưa nhập form</h3>");
        }

        $authorName = $_POST["tAuthorName"];
        $authorBio = $_POST["tAuthorBio"];
        $authorId = $_REQUEST["id"];
        $author = new Author();
        $result = $author->updateAuthor($authorId, $authorName, $authorBio);
        if ($result) {
            $message = "Cập nhật thành công";
            echo "<script type='text/javascript'>alert('$message');</script>";
            header('Location: AuthorList.php');
            die();
        } else {
            echo "<h3> Lỗi sửa dữ liệu";
        }
        ?>
        <a href="AuthorList.php">Danh sách tác giả</a>
    </body>
</html>
