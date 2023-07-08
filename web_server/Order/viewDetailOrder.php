
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ</title>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300&subset=vietnamese' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="ShowOrder.css?v=<?php echo time(); ?>">

</head>
<body>

    <?php
        include("../Header/Header.php");
        require_once("../../models/classOrder.php");
        $detailObj = new Detail();
        $invoiceObj = new Invoice();
        $invoiceId = $_GET['invoice_id'];
        unset($invoiceObj);

        $result = $detailObj->getDetailListByInvoiceId($invoiceId);
        if (!$result) {
            die("<p>Trouble connecting to database");
        }

        $details = $detailObj->data;
        unset($detailObj);

    ?>


    <div class="table_wrap">
        <table>
            <tr>
                <th width="150px">ID đơn hàng</th>
                <th width="150px">Tên sách</th>
                <th width="100px">Số lượng</th>
                <th width="250px">Đơn giá</th>
                <th width="250px">Thành tiền</th>
            </tr>

            <?php foreach ($details as $book_order) { ?>
                <tr>
                    <td><?=$book_order["invoice_id"]?></td>
                    <td><?=$book_order["book_name"]?></td>
                    <td><?=$book_order["quantity"]?></td>
                    <td><?=$book_order["unit_price"] ?></td>
                    <td><?=$book_order["quantity"]*$book_order["unit_price"]?></td>
                </tr>
            <?php } ?>

            <?php
                $totalAmount = 0;
                foreach ($details as $book_order) {
                        $subtotal = $book_order["quantity"] * $book_order["unit_price"];
                        $totalAmount += $subtotal;
            } ?>

            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>
                    Tổng tiền = <?=$totalAmount ?>
                </td>
            </tr>

        </table>
        <br>
        <div class="add_link">
            <p><a href="ShowOrder.php">Quay lại danh sách đơn hàng</a></p>
        </div>
    </div>
    

</body>
</html>
