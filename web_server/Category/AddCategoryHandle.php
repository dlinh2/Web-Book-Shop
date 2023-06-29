<html>
    <head>
        <link rel="stylesheet" href="AddCategory.css">
        
    </head>
    <body>
        <?php
        include("../Header/Header.php");
        require_once("../../models/classCategory.php");
        if (!isset($_POST["b1"])) {
            die("<h3>Chưa nhập form</h3>");
        }

        $categoryName = $_POST["tCategoryName"];
        $order = $_POST["tOrder"];
        $status = $_POST["rStatus"];
        $category = new Category();
        $result = $category->addCategory($categoryName, $order, $status);
        if ($result) {
            $message = "Thêm thành công";
            echo "<script type='text/javascript'>alert('$message');</script>";
            header('Location: CategoryList.php');
            die();
        } else {
            echo "<h3> Lỗi thêm dữ liệu";
        }
        ?>
        <a href="CategoryList.php">Danh sách nhóm</a>
    </body>
</html>
