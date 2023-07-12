<html>
    <head>
        <link rel="stylesheet" href="ShowOrder.css">
        
    </head>
    <body>
        <?php
        include("../Header/Header.php");
        if (!isset($_REQUEST["id"])) {
            die("<h1>Chưa chọn đơn hàng</h1>");
        }
        $id = $_REQUEST["id"];
        require_once("../../models/classInvoice.php");
        $invoiceObj = new Invoice();
        $result = $invoiceObj->deleteInvoice($id);
        
        if ($result) {
            $message = "Xóa thành công";
            echo "<script type='text/javascript'>alert('$message');window.location.href='ShowOrder.php';</script>";
        } else {
            echo "<h1> Lỗi xóa dữ liệu</h1>";
        }
        ?>
        <h1><a href="ShowOrder.php">Danh sách đơn hàng</a></h1>
    </body>
</html>