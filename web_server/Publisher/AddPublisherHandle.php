<html>
    <head>
        <link rel="stylesheet" href="AddPublisher.css">
        
    </head>
    <body>
        <?php
        include("../Header/Header.php");
        require_once("../../models/classPublisher.php");
        if (!isset($_POST["b1"])) {
            die("<h1>Chưa nhập form</h1>");
        }

        $publisherName = $_POST["tPublisherName"];
        $publisherDescription = $_POST["tPublisherDescription"];
        $publisher = new Publisher();
        $result = $publisher->addPublisher($publisherName, $publisherDescription);
        if ($result) {
            $message = "Thêm thành công";
            echo "<script type='text/javascript'>alert('$message');window.location.href='PublisherList.php';</script>";
        } else {
            echo "<h1> Lỗi thêm dữ liệu</h1>";
        }
        ?>
        <h1><a href="PublisherList.php">Danh sách nhà xuất bản</a></h1>
    </body>
</html>
