<html>
    <head>
        <link rel="stylesheet" href="AddPublisher.css">
        
    </head>
    <body>
        <?php
        include("../Header/Header.php");
        require_once("../../models/classPublisher.php");
        if (!isset($_POST["b1"])) {
            die("<h3>Chưa nhập form</h3>");
        }

        $publisherName = $_POST["tPublisherName"];
        $publisherDescription = $_POST["tPublisherDescription"];
        $publisherId = $_REQUEST["id"];
        $publisher = new Publisher();
        $result = $publisher->updatePublisher($publisherId, $publisherName, $publisherDescription);
        if ($result) {
            $message = "Cập nhật thành công";
            echo "<script type='text/javascript'>alert('$message');window.location.href='PublisherList.php';</script>";
        } else {
            echo "<h3> Lỗi sửa dữ liệu";
        }
        ?>
        <a href="PublisherList.php">Danh sách nhà xuất bản</a>
    </body>
</html>
