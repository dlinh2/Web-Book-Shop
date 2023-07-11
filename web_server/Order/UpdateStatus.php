<?php 
require_once("../../models/classInvoice.php");

if (isset($_POST["id"]) && isset($_POST["status"])) {
    $invoiceObj = new Invoice();
    $result = $invoiceObj->updateInvoiceStatus($_POST["id"], $_POST["status"]);
    if ($result) {
        $invoiceObj->getInvoiceDetails($_POST["id"]);
        $invoice = $invoiceObj->data;
        $to = $invoice["customer_email"];
        $subject = "Cập nhật trạng thái đơn hàng";
        $message = "Xin chào " . $invoice["customer_name"] . ", \r\n";
        if ($_POST["status"] == "Đã xác nhận")
            $message .= "Đơn hàng mã " . $result . " của bạn đã được xác nhận. Đơn hàng sẽ sớm xuất kho và được giao.";
        elseif ($_POST["status"] == "Đang giao")
            $message .= "Đơn hàng mã " . $result . " của bạn đang được giao. Vui lòng để ý điện thoại để có liên lạc với người giao hàng.";
        elseif ($_POST["status"] == "Đã thanh toán")
            $message .= "Cảm ơn vì đã mua hàng của BookShop. Hãy theo dõi trang chủ để biết thêm chi tiết về sản phẩm mới nhé!";
        $headers = "From: agenthanh0210@gmail.com\r\n";
        $headers .= "Content-Type: text/plain; charset=utf-8\r\n";

        mail($to, $subject, $message, $headers);
    }
    unset($invoiceObj);
}