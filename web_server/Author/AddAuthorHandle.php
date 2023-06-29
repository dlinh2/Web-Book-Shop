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
        $author = new Author();
        $result = $author->addAuthor($authorName, $authorBio);
        if ($result) {
            $message = "Thêm thành công";
            echo "<script type='text/javascript'>alert('$message');</script>";
            header('Location: AuthorList.php');
            die();
        } else {
            echo "<h3> Lỗi thêm dữ liệu";
        }
        ?>
        <a href="AuthorList.php">Danh sách tác giả</a>
    </body>
</html>
