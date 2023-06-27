<html>
    <head>
        <link rel="stylesheet" href="AddPublisher.css">
        
    </head>
    <body>
        <?php
        include("../Header/Header.php");
        if (!isset($_REQUEST["id"])) {
            die("<p>Chưa chọn nhà xuất bản</p>");
        }
        $id = $_REQUEST["id"];
        require_once("../../models/classPublisher.php");
        $publisherObj = new Publisher();
        $result = $publisherObj->deletePublisher($id);
        
        if ($result) {
            header('Location: PublisherList.php');
            die();
        } else {
            echo "<h3> Lỗi xóa dữ liệu";
        }
        ?>
        <a href="PublisherList.php">Danh sách nhà xuất bản</a>
    </body>
</html>
