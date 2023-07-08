
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi tiết đơn hàng</title>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300&subset=vietnamese' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="viewDetailOrder.css?v=<?php echo time(); ?>">

</head>
<body>

    <?php
        include("../Header/Header.php");
        if (!isset($_REQUEST["id"])) {
            die("<h1>Chưa chọn đơn hàng</h1>");
        }
        require_once("../../models/classInvoice.php");
        $id = $_REQUEST["id"];
        $invoiceObj = new Invoice();

        $result = $invoiceObj->getInvoiceDetails($id);
        if (!$result) {
            die("<h1>Trouble connecting to database</h1>");
        }
        $invoice = $invoiceObj->data;
        unset($invoiceObj);
    ?>

    <div class="body-content">
        <fieldset class="cust-info">
            <legend>Thông tin đơn hàng</legend>
            <table>
                <tr>
                    <td width="200px">Họ và tên</td>
                    <td><?=$invoice["customer_name"]?></td>
                    <td width="150px">Thời gian</td>
                    <td><?=$invoice["invoice_datetime"]?></td>
                </tr>
                <tr>
                    <td>Số điện thoại</td>
                    <td><?=$invoice["customer_phone"] ?></td>
                    <td>Trạng thái</td>
                    <td><?=$invoice["invoice_status"] ?></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td><?=$invoice["customer_email"] ?></td>
                    <td>Tài khoản</td>
                    <td><?=isset($invoice["username"])?$invoice["username"]:"(Không có)"?></td>
                </tr>
                <tr>
                    <td>Địa chỉ</td>
                    <td width="400px"><?=$invoice["customer_address"] ?></td>
                </tr>
            </table>
    </fieldset>
    <div class="items-wrap">
        <table class="order-items">
            <thead>
                <tr>
                    <th>STT</th>
                    <th width="500px">Tiêu đề</th>
                    <th>Số lượng</th>
                    <th>Giá</th>
                    <th>Tổng cộng</th>
                </tr>
            </thead>
            <tbody>
            <?php $totalAmount = 0;$i=1;foreach ($invoice["rows"] as $row) { 
                $subtotal = $row["quantity"] * $row["unit_price"];
                $totalAmount += $subtotal;?>
                <tr>
                    <td><?=$i++?></td>
                    <td><?=$row["book_name"]?></td>
                    <td><?=$row["quantity"]?></td>
                    <td><?=number_format($row["unit_price"], 0, '.', '.') ?>đ</td>
                    <td><?=number_format($subtotal, 0, '.', '.')?>đ</td>
                </tr>
            <?php } ?>
            </tbody>
            <tr style="font-weight: bold">
                <td colspan="4" align="right" >Tổng:</td>
                <td align="center"><?=number_format($totalAmount, 0, '.', '.')?>đ</td>
            </tr>

        </table>
    </div>
    <div class="table_wrap">
        
        <br>
        <div class="add_link">
            <p><a href="ShowOrder.php">Quay lại danh sách đơn hàng</a></p>
        </div>
    </div>
    

</body>
</html>
