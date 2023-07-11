
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách đơn hàng</title>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300&subset=vietnamese' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="ShowOrder.css?v=<?php echo time(); ?>">
    <script>
        

        function updateStatus(option, invoiceId) {
            var status = option.value;
            if (confirm('Bạn có muốn cập nhật trạng thái? (Sau khi cập nhật sẽ gửi mail cho khách hàng)')) {
                var xhr = new XMLHttpRequest();
                xhr.open("POST", "UpdateStatus.php", true);
                xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                params = "id=" + invoiceId + "&status=" + option.value;
                xhr.onreadystatechange = function() {
                    if (xhr.readyState === 4 && xhr.status === 200) {
                        var response = xhr.responseText;
                        console.log(response);
                        window.location.reload();
                    }
                };
                xhr.send(params);
                
            } else {
                if (option.value == "Đã xác nhận") 
                    option.value = "Chờ xử lý";
                else if (option.value == "Đang giao")
                    option.value = "Đã xác nhận";
                else if (option.value == "Đã thanh toán")
                    option.value = "Đang giao";
            }
        }
    </script>
</head>
<body>
    <?php
        include("../Header/Header.php");
        require_once("../../models/classInvoice.php");
        $invoiceObj = new Invoice();
        $result = $invoiceObj->getInvoiceList();
        if (!$result)
            die("<p>Trouble connecting to database");
        $invoices = $invoiceObj->data;
        unset($invoiceObj);
    ?>

    <div class="body-content">
        <h1>DANH SÁCH ĐƠN HÀNG</h1>
        <br>
        <table>
            <tr>
                <th width="50px">ID</th>
                <th width="100px">Thời gian</th>
                <th width="100px">Người dùng</th>
                <th>Tên khách hàng</th>
                <th width="100px">Số điện thoại</th>
                <th>Email</th>
                <th width="120px">Trạng thái</th>
                <th width="80px">Quản lý</th>
            </tr>

            <?php foreach ($invoices as $invoice) { ?>
                <tr>
                    <td><?=$invoice["invoice_id"]?></td>
                    <td><?=$invoice["invoice_datetime"]?></td>
                    <td><?=$invoice["username"]?></td>
                    <td><?=$invoice["customer_name"]?></td>
                    <td><?=$invoice["customer_phone"]?></td>
                    <td><?=$invoice["customer_email"] ?></td>
                    <td>
                        <select name="status" id="status" onchange="updateStatus(this, <?=$invoice['invoice_id']?>);">
                            <option value="Chờ xử lý" <?php if ($invoice["invoice_status"]=="Chờ xử lý") echo "selected" ?>>Chờ xử lý</option>
                            <option value="Đã xác nhận" <?php if ($invoice["invoice_status"]=="Đã xác nhận") echo "selected" ?>>Đã xác nhận</option>
                            <option value="Đang giao" <?php if ($invoice["invoice_status"]=="Đang giao") echo "selected" ?>>Đang giao</option>
                            <option value="Đã thanh toán" <?php if ($invoice["invoice_status"]=="Đã thanh toán") echo "selected" ?>>Đã thanh toán</option>
                        </select>
                    </td>
                    <td><a href="viewDetailOrder.php?id=<?=$invoice['invoice_id']?>">Xem</a> - <a href="DeleteInvoice.php?id=<?=$invoice['invoice_id']?>" onclick="return confirm('Có chắc là bạn muốn xóa? (Đơn hàng sẽ không thể khôi phục)')">Xóa</a></td>
                </tr>
            <?php } ?>

        </table>
    </div>

</body>
</html>
