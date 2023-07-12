
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ</title>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300&subset=vietnamese' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="CategoryList.css?v=<?php echo time(); ?>">

</head>
<body>
    <?php
        include("../Header/Header.php");
        require_once("../../models/classCategory.php");
        $categoryObj = new Category();
        $result = $categoryObj->getCategoryList();
        if (!$result)
            die("<p>Trouble connecting to database");
        $categories = $categoryObj->data;
        unset($categoryObj);
    ?>
    
    <div class="table_wrap">
        <div class="add_link">
            <p><a href="AddCategory.php">Thêm nhóm</a></p>
        </div>
        <table>
            <tr>
                <th width="80px">ID</th>
                <th>Category name</th>
                <th>Display order</th>
                <th>Status</th>
                <th width="100px">Action</th>
            </tr>
            <?php foreach ($categories as $category) { ?>
                <tr>
                    <td><?=$category["category_id"] ?></td>
                    <td><?=$category["category_name"] ?></td>
                    <td><?=$category["category_order"] ?></td>
                    <td><?=$category["category_status"] ? "Có" : "Không" ?></td>
                    <td><a href="UpdateCategory.php?id=<?=$category["category_id"]?>">Sửa</a></span> - <span><a href="DeleteCategory.php?id=<?=$category["category_id"]?>" onclick="return confirm('Chắc chắn xóa?')">Xóa</a></td>
                </tr>
            <?php } ?>
        </table>
    </div>
    
</body>
</html>
