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
        $translator = new Translator();
        $result = $translator->addTranslator($translatorName, $translatorBio);
        if ($result) {
            $message = "Thêm thành công";
            echo "<script type='text/javascript'>alert('$message');window.location.href='TranslatorList.php';</script>";
        } else {
            echo "<h1> Lỗi thêm dữ liệu</h1>";
        }
        ?>
        <h1><a href="TranslatorList.php">Danh sách nhóm dịch</a></h1>
    </body>
</html>
