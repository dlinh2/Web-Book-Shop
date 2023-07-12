<html>
    <head>
        <link rel="stylesheet" href="AddCategory.css">
        
    </head>
    <body>
        <?php
        include("../Header/Header.php");
        require_once("../../models/classCategory.php");
        if (!isset($_POST["b1"])) {
            die("<h1>Chưa nhập form</h1>");
        }

        $categoryName = $_POST["tCategoryName"];
        $order = $_POST["tOrder"];
        $status = $_POST["rStatus"];
        $categoryId = $_REQUEST["id"];
        $category = new Category();
        $result = $category->updateCategory($categoryId, $categoryName, $order, $status);
        if ($result) {
            $message = "Cập nhật thành công";
            echo "<script type='text/javascript'>alert('$message');window.location.href='CategoryList.php';</script>";
        } else {
            echo "<h1> Lỗi sửa dữ liệu</h1>";
        }
        ?>
        <h1><a href="CategoryList.php">Danh sách nhóm</a></h1>
    </body>
</html>
