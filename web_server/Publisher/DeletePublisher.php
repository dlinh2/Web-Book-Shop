<html>
    <head>
        <link rel="stylesheet" href="AddPublisher.css">
        
    </head>
    <body>
        <?php
        include("../Header/Header.php");
        if (!isset($_REQUEST["id"])) {
            die("<h1>Chưa chọn nhà xuất bản</h1>");
        }
        $id = $_REQUEST["id"];
        require_once("../../models/classPublisher.php");
        $publisherObj = new Publisher();
        $result = $publisherObj->deletePublisher($id);
        
        if ($result) {
            $message = "Xóa thành công";
            echo "<script type='text/javascript'>alert('$message');window.location.href='PublisherList.php';</script>";
        } else {
            echo "<h1> Lỗi xóa dữ liệu</h1>";
        }
        ?>
        <a href="PublisherList.php">Danh sách nhà xuất bản</a>
    </body>
</html>
