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
            header('Location: PublisherList.php');
            die();
        } else {
            echo "<h3> Lỗi sửa dữ liệu";
        }
        ?>
        <a href="PublisherList.php">Danh sách nhà xuất bản</a>
    </body>
</html>
