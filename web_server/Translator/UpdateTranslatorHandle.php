<html>
    <head>
        <link rel="stylesheet" href="AddTranslator.css">
        
    </head>
    <body>
        <?php
        include("../Header/Header.php");
        require_once("../../models/classTranslator.php");
        if (!isset($_POST["b1"])) {
            die("<h3>Chưa nhập form</h3>");
        }

        $translatorName = $_POST["tTranslatorName"];
        $translatorBio = $_POST["tTranslatorBio"];
        $translatorId = $_REQUEST["id"];
        $translator = new Translator();
        $result = $translator->updateTranslator($translatorId, $translatorName, $translatorBio);
        if ($result) {
            $message = "Cập nhật thành công";
            echo "<script type='text/javascript'>alert('$message');</script>window.location.href='TranslatorList.php';";
        } else {
            echo "<h3> Lỗi sửa dữ liệu";
        }
        ?>
        <a href="TranslatorList.php">Danh sách nhóm dịch</a>
    </body>
</html>
