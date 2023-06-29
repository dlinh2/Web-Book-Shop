<html>
    <head>
        <link rel="stylesheet" href="AddTranslator.css">
        
    </head>
    <body>
        <?php
        include("../Header/Header.php");
        if (!isset($_REQUEST["id"])) {
            die("<p>Chưa chọn dịch giả</p>");
        }
        $id = $_REQUEST["id"];
        require_once("../../models/classTranslator.php");
        $translatorObj = new Translator();
        $result = $translatorObj->deleteTranslator($id);
        
        if ($result) {
            $message = "Xóa thành công";
            echo "<script type='text/javascript'>alert('$message');</script>";
            header('Location: TranslatorList.php');
            die();
        } else {
            echo "<h3> Lỗi xóa dữ liệu";
        }
        ?>
        <a href="TranslatorList.php">Danh sách dịch giả</a>
    </body>
</html>
