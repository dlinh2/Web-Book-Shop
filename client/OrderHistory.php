<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đơn hàng</title>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300&subset=vietnamese' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="index.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="OrderHistory.css?v=<?php echo time(); ?>">
</head>
<body>
    <?php include_once("Header.php"); ?>
    <div class="bodyP">
        <?php if (!isset($_SESSION["user"])) {?>
        <div class="pHeader">
            <h1>Vui lòng đăng nhập để sử dụng tính năng này</h1>
        </div>
        <?php } else { 
            require_once("../models/classInvoice.php");
            $invoiceObj = new Invoice();
            $result = $invoiceObj->getInvoicesByAccount($_SESSION["user"]);
            if (!$result) {
                echo "<h1>Trouble connecting to database</h1>";
            } else { 
                $invoices = $invoiceObj->data;
        ?>
            <div class="table-wrap">
                <h1>Lịch sử giao dịch</h1>
                <table width="100%">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Mã đơn hàng</th>
                            <th>Người mua</th>
                            <th>Địa chỉ</th>
                            <th>Ngày mua</th>
                            <th>Trạng thái</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i=1;foreach ($invoices as $invoice) { ?>
                            <tr>
                                <td><?=$i++?></td>
                                <td><?=$invoice["invoice_id"] ?></td>
                                <td><?=$invoice["customer_name"]?></td>
                                <td><?=$invoice["customer_address"]?></td>
                                <td><?=$invoice["invoice_datetime"]?></td>
                                <td><?=$invoice["invoice_status"]?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <?php }
        } ?>
    </div>

    </div>
    <footer class="footer">
        Địa chỉ: Đường Nghiêm Xuân Yêm - Đại Kim - Hoàng Mai - Hà Nội</br>
        Hộ trợ kỹ thuật: 0123456789 (Nhóm dự án công nghệ thông tin)
    </footer>
</body>
</html>