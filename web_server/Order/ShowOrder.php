
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
        $orderObj = new Order();
        $result = $orderObj->getOrderList();
        if (!$result)
            die("<p>Trouble connecting to database");
        $orders = $orderObj->data;
        unset($orderObj);
    ?>

    <div class="table_wrap">
        <h1>DANH SÁCH ĐƠN HÀNG</h1>
        <br>
        <table>
            <tr>
                <th width="150px">ID đơn hàng</th>
                <th width="250px">Thời gian đặt hàng</th>
                <th width="100px">ID account</th>
                <th width="250px">Tên khách hàng</th>
                <th width="150px">Số điện thoại</th>
                <th width="250px">Địa chỉ</th>
                <th width="250px">Trạng thái</th>
                <th width="150px">Quản lý</th>
            </tr>

            <?php foreach ($orders as $invoice) { ?>
                <tr>
                    <td><?=$invoice["invoice_id"]?></td>
                    <td><?=$invoice["invoice_datetime"]?></td>
                    <td><?=$invoice["account_id"]?></td>
                    <td><?=$invoice["customer_name"]?></td>
                    <td><?=$invoice["customer_phone"]?></td>
                    <td><?=$invoice["customer_address"] ?></td>
                    <td>
                        <select>
                            <option value="">Chọn trạng thái</option>
                            <option value="confirmed" label="Đã xác nhận">Đã xác nhận</option>
                            <option value="not-delivered" label="Chưa giao">Chưa giao</option>
                            <option value="delivered" label="Đã giao">Đã giao</option>
                        </select>
                    </td>
                    <td><a href="viewDetailOrder.php?invoice_id=<?=$invoice['invoice_id']?>">Xem</a></td>

                </tr>
            <?php } ?>

        </table>
    </div>

</body>
</html>
