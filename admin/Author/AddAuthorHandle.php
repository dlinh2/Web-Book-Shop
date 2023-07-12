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
        $author = new Author();
        $result = $author->addAuthor($authorName, $authorBio);
        if ($result) {
            $message = "Thêm thành công";
            echo "<script type='text/javascript'>alert('$message');window.location.href='AuthorList.php';</script>";
        } else {
            echo "<h1> Lỗi thêm dữ liệu</h1>";
        }
        ?>
        <h1><a href="AuthorList.php">Danh sách tác giả</a></h1>
    </body>
</html>
