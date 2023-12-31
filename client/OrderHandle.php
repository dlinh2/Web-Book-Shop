<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xác nhận đặt hàng</title>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300&subset=vietnamese' rel='stylesheet'
        type='text/css'>
    <link rel="stylesheet" href="index.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="Order.css?v=<?php echo time(); ?>">
</head>
<body>
    <?php 
        include_once("Header.php"); 
        if (!isset($_SESSION["cart"]) || count($_SESSION["cart"])==0) {
            die ("<h1 class='die-msg'> Giỏ hàng trống</h1>");
        }
    ?>
    <div class="order-wrap">
        <?php
        require_once("../models/classInvoice.php");
        $invoiceObj = new Invoice();
        $result = $invoiceObj->addInvoice($_SESSION["cart"], isset($_SESSION["user"]) ? $_SESSION["user"] : NULL, $_POST["custName"], $_POST["custPhone"], $_POST["custEmail"], $_POST["custAddress"], "Chờ xử lý");
        if ($result != NULL) {
            $_SESSION["cart"] = array();
            echo "<div>Đơn hàng đã được đặt thành công. ";
            $to = $_POST["custEmail"];
            $subject = "Đơn hàng được đặt thành công";
            $message = "Xin chào " . $_POST["custName"] . ", \r\n";
            $message .= "Cảm ơn vì đã đặt hàng. Mã đơn hàng của bạn là " . $result["id"];
            $message .= ". Trạng thái đơn hàng: Chờ xử lý. Bạn sẽ nhận được mail mỗi khi trạng thái đơn hàng được cập nhật";
            $headers = "From: bookshop@gmail.com\r\n";
            $headers .= "Content-Type: text/plain; charset=utf-8\r\n";

            $mailSent = mail($to, $subject, $message, $headers);

            if ($mailSent) {
                echo "Vui lòng kiểm tra mail để xem tình trạng đơn hàng.";
            } else {
                echo "Gửi mail thất bại.";
            }
            echo "<a href='HomePage.php'>Quay lại trang chủ</a></div>";
        } else {
            echo "Có lỗi xảy ra. Đặt hàng không thành công";
        }
        ?>
    </div>
    <footer class="footer">
        Địa chỉ: Đường Nghiêm Xuân Yêm - Đại Kim - Hoàng Mai - Hà Nội</br>
        Hộ trợ kỹ thuật: 0123456789 (Nhóm dự án công nghệ thông tin)
    </footer>
</body>

</html>