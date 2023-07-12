<html>
    <head>
        <link rel="stylesheet" href="AddTranslator.css">
        
    </head>
    <body>
        <?php
        include("../Header/Header.php");
        require_once("../../models/classTranslator.php");
        if (!isset($_POST["b1"])) {
            die("<h1>Chưa nhập form</h1>");
        }

        $translatorName = $_POST["tTranslatorName"];
        $translatorBio = $_POST["tTranslatorBio"];
        $translatorId = $_REQUEST["id"];
        $translator = new Translator();
        $result = $translator->updateTranslator($translatorId, $translatorName, $translatorBio);
        if ($result) {
            $message = "Cập nhật thành công";
            echo "<script type='text/javascript'>alert('$message');window.location.href='TranslatorList.php';</script>";
        } else {
            echo "<h1> Lỗi sửa dữ liệu</h1>";
        }
        ?>
        <h1><a href="TranslatorList.php">Danh sách nhóm dịch</a></h1>
    </body>
</html>
