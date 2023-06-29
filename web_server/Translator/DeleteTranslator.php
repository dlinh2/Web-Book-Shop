<html>
    <head>
        <link rel="stylesheet" href="AddTranslator.css">
        
    </head>
    <body>
        <?php
        include("../Header/Header.php");
        if (!isset($_REQUEST["id"])) {
            die("<h1>Chưa chọn dịch giả</h1>");
        }
        $id = $_REQUEST["id"];
        require_once("../../models/classTranslator.php");
        $translatorObj = new Translator();
        $result = $translatorObj->deleteTranslator($id);
        
        if ($result) {
            $message = "Xóa thành công";
            echo "<script type='text/javascript'>alert('$message');window.location.href='TranslatorList.php';</script>";
        } else {
            echo "<h1> Lỗi xóa dữ liệu</h1>";
        }
        ?>
        <a href="TranslatorList.php">Danh sách dịch giả</a>
    </body>
</html>
