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
        $translator = new Translator();
        $result = $translator->addTranslator($translatorName, $translatorBio);
        if ($result) {
            header('Location: TranslatorList.php');
            die();
        } else {
            echo "<h3> Lỗi thêm dữ liệu\n";
        }
        ?>
        <a href="TranslatorList.php">Danh sách nhóm dịch</a>
    </body>
</html>
