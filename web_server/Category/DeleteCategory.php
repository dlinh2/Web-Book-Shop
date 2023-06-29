<html>
    <head>
        <link rel="stylesheet" href="AddCategory.css">
        
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
        $result = $categoryObj->deleteCategory($id);
        
        if ($result) {
            $message = "Xóa thành công";
            echo "<script type='text/javascript'>alert('$message');window.location.href='CategoryList.php';</script>";
        } else {
            echo "<h3> Lỗi xóa dữ liệu";
        }
        ?>
        <a href="CategoryList.php">Danh sách nhóm</a>
    </body>
</html>
