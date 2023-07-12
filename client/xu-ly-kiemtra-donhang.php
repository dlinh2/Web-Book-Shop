<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kiểm tra đơn hàng</title>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300&subset=vietnamese' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="index.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="xu-ly-kiemtra-donhang.css?v=<?php echo time(); ?>">
</head>
<body>
    <?php
        require_once("header.php");
        if (!isset($_REQUEST["orderid"])) {
            die("<h1>Chưa nhập mã đơn hàng</h1>");
        }

        require_once("../models/classInvoice.php");
        $id = $_REQUEST["orderid"];
        $invoiceObj = new Invoice();
        
        $result = $invoiceObj->getInvoiceDetails($id);
        if (!$result) {
            die("<h1>Trouble connecting to database</h1>");
        }
        $invoice = $invoiceObj->data;
        unset($invoiceObj);
    ?>

    <div class = "bodyP">
        <div class="pHeader">
            <h1>Kiểm tra đơn hàng</h1>
        </div>
        <br>
        <div class="checkorder">
            <div class="form">
                <form action="xu-ly-kiemtra-donhang.php",method="REQUEST">
                    <input name="orderid" placeholder="Nhập mã đơn hàng của bạn" class="text" />
                    <input type="submit" value="Tìm mã" class="submit" />
                </form>
            </div>
        </div>
        <div class="body-content">
            <?php if ($invoice != NULL && count($invoice) > 1) { ?>
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
            <?php } else { 
                echo "<h3 style='color: red'>Không tìm thấy đơn hàng</h3>";
            }?>
        </div>
    </div>


    <footer class="footer">
        Địa chỉ: Đường Nghiêm Xuân Yêm - Đại Kim - Hoàng Mai - Hà Nội</br>
        Hộ trợ kỹ thuật: 0123456789 (Nhóm dự án công nghệ thông tin)
    </footer>

</body>
</html>
