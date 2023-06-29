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
        $publisher = new Publisher();
        $result = $publisher->addPublisher($publisherName, $publisherDescription);
        if ($result) {
            $message = "Thêm thành công";
            echo "<script type='text/javascript'>alert('$message');</script>";
            header('Location: PublisherList.php');
            die();
        } else {
            echo "<h3> Lỗi thêm dữ liệu\n";
        }
        ?>
        <a href="PublisherList.php">Danh sách nhà xuất bản</a>
    </body>
</html>
