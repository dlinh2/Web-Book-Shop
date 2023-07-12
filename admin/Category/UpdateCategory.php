
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ</title>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300&subset=vietnamese' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="AddCategory.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.bootstrap3.min.css" integrity="sha256-ze/OEYGcFbPRmvCnrSeKbRTtjG4vGLHXgOqsyLFTRjg=" crossorigin="anonymous" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js" integrity="sha256-+C0A5Ilqmu4QcSPxrlGpaZxJ04VjsRjKu+G82kl5UJk=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function () {
            $('select').selectize({
                sortField: 'text'
            });
        });
    </script>
</head>
<body>
    <?php
        include("../Header/Header.php");
        if (!isset($_REQUEST["id"])) {
            die("<p>Chưa chọn nhóm</p>");
        }
        $id = $_REQUEST["id"];
        require_once("../../models/classCategory.php");
        $categoryObj = new Category();
        $result = $categoryObj->getCategoryById($id);
        if (!$result) {
            die("<h3> Lỗi lấy dữ liệu từ database");
        }
        $category = $categoryObj->data;
    ?>
    <form name="form1" method="post" action="UpdateCategoryHandle.php" enctype="multipart/form-data">
        <input type="hidden" name="id" id="id" value="<?=$category["category_id"]?>">
        <table  border="0" align="center" cellpadding="5" cellspacing="0">
            <tr>
                <td width="155">ID nhóm</td>
                <td width="300"><p><?=$category["category_id"]?></p></td>
            </tr>
            <tr>
                <td width="155">Tên nhóm</td>
                <td width="300"><input type="text" name="tCategoryName" id="tCategoryName" value="<?=$category["category_name"] ?>"></td>
            </tr>
            <tr>
                <td width="155">Thứ tự</td>
                <td width="300"><input type="text" name="tOrder" id="tOrder" value="<?=$category["category_order"] ?>"></td>
            </tr>
            <tr>
                <td>Tình trạng</td>
                <td>
                    <label for="r1">Có</label>
                    <input type="radio" name="rStatus" id="r1" value="1" <?php if ($category["category_status"]) echo "checked" ?>>
                    <label for="r2">Không</label>
                    <input type="radio" name="rStatus" id="r2" value="0" <?php if (!$category["category_status"]) echo "checked" ?>>
                </td>
            </tr>
            
            <tr>
                <td colspan="2" align="center">
                    <input type="submit" name="b1" id="b1" value="Đồng ý">
                    &nbsp;&nbsp;
                    <input type="reset" name="b2" id="b2" value="Nhập lại">
                </td>
            </tr>
        </table>
    </form>
</body>
</html>
