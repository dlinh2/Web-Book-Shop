
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ</title>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300&subset=vietnamese' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="PublisherList.css?v=<?php echo time(); ?>">

</head>
<body>
    <?php
        include("../Header/Header.php");
        require_once("../../models/classPublisher.php");
        $publisherObj = new Publisher();
        $result = $publisherObj->getPublisherList();
        if (!$result)
            die("<p>Trouble connecting to database");
        $publishers = $publisherObj->data;
        unset($publisherObj);
    ?>
    
    <div class="table_wrap">
        <div class="add_link">
            <p><a href="AddPublisher.php">Thêm nhà xuất bản</a></p>
        </div>
        <table>
            <tr>
                <th width="80px">ID</th>
                <th>Publisher name</th>
                <th width="100px">Action</th>
            </tr>
            <?php foreach ($publishers as $publisher) { ?>
                <tr>
                    <td><?=$publisher["publisher_id"] ?></td>
                    <td><?=$publisher["publisher_name"] ?></td>
                    <td><a href="UpdatePublisher.php?id=<?=$publisher["publisher_id"]?>">Sửa</a></span> - <span><a href="DeletePublisher.php?id=<?=$publisher["publisher_id"]?>" onclick="return confirm('Chắc chắn xóa?')">Xóa</a></td>
                </tr>
            <?php } ?>
        </table>
    </div>
    
</body>
</html>
