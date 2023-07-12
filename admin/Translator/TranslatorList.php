
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ</title>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300&subset=vietnamese' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="TranslatorList.css?v=<?php echo time(); ?>">

</head>
<body>
    <?php
        include("../Header/Header.php");
        require_once("../../models/classTranslator.php");
        $translatorObj = new Translator();
        $result = $translatorObj->getTranslatorList();
        if (!$result)
            die("<p>Trouble connecting to database");
        $translators = $translatorObj->data;
        unset($translatorObj);
    ?>
    
    <div class="table_wrap">
        <div class="add_link">
            <p><a href="AddTranslator.php">Thêm dịch giả</a></p>
        </div>
        <table>
            <tr>
                <th width="80px">ID</th>
                <th>Translator name</th>
                <th width="100px">Action</th>
            </tr>
            <?php foreach ($translators as $translator) { ?>
                <tr>
                    <td><?=$translator["translator_id"] ?></td>
                    <td><?=$translator["translator_name"] ?></td>
                    <td><a href="UpdateTranslator.php?id=<?=$translator["translator_id"]?>">Sửa</a></span> - <span><a href="DeleteTranslator.php?id=<?=$translator["translator_id"]?>" onclick="return confirm('Chắc chắn xóa?')">Xóa</a></td>
                </tr>
            <?php } ?>
        </table>
    </div>
    
</body>
</html>
