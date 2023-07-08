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
    <script>
        function checkForm() {
            custName = document.getElementById("custName");
            custPhone = document.getElementById("custPhone");
            custEmail = document.getElementById("custEmail");
            count = 0;
            nameError = document.getElementById("nameError");
            phoneError = document.getElementById("phoneError");
            emailError = document.getElementById("emailError");
            addressError = document.getElementById("addressError");

            phoneRegex = /^0\d{9}$/;

            if (custName.value == "") {
                nameError = document.getElementById("nameError");
                nameError.innerHTML = "Hãy nhập họ và tên";
                count++;
            } else {
                nameError.innerHTML = "";
            }
            if (custPhone.value == "") {
                phoneError = document.getElementById("phoneError");
                phoneError.innerHTML = "Hãy nhập số điện thoại";
                count++;
            } else if (!phoneRegex.test(custPhone.value)) {
                phoneError.innerHTML = "Định dạng số điện thoại không đúng";
            } else {
                phoneError.innerHTML = "";
            }
            if (custEmail.value == "") {
                emailError = document.getElementById("emailError");
                emailError.innerHTML = "Hãy nhập email";
                count++;
            } else {
                emailError.innerHTML = "";
            }
            if (custAddress.value == "") {
                addressError = document.getElementById("addressError");
                addressError.innerHTML = "Hãy nhập địa chỉ";
                count++;
            } else {
                addressError = "";
            }
            if (count == 0) return true;
            return false;
        }
    </script>
</head>

<body>
    <?php 
        include_once("Header.php"); 
        if (!isset($_SESSION["cart"]) || count($_SESSION["cart"])==0) {
            die ("<h1 class='die-msg'> Giỏ hàng trống</h1>");
        }
    ?>
    <div class="order-wrap">
        <div class="title">XÁC NHẬN ĐẶT HÀNG</div>
        <div class="order-content">
            <div class="cart-wrap">
                <table class="cart-items">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th width="500px">Tiêu đề</th>
                            <th>Giá</th>
                            <th>Số lượng</th>
                            <th>Tổng cộng</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $i=1;
                            $totalPrice = 0;
                            foreach ($_SESSION["cart"] as $row) { 
                                $rowPrice = $row->unitPrice*$row->quantity;
                                $totalPrice += $rowPrice; ?>
                            <tr>
                                <td><?=$i++?></td>
                                <td><?=$row->title?></td>
                                <td><?=number_format($row->unitPrice, 0, '.', '.')?>đ</td>
                                <td><?=$row->quantity?></td>
                                <td><?=number_format($rowPrice, 0, '.', '.')?>đ</td>
                            </tr>
                        <?php } ?>
                        
                    </tbody>
                    <tr style="font-weight: bold">
                        <td colspan="4" align="right" >Tổng:</td>
                        <td align="center"><?=number_format($totalPrice, 0, '.', '.')?>đ</td>
                    </tr>
                </table>
            </div>

            <div style="margin-top: 30px">
                <form action="OrderHandle.php" method="post" class="form">
                    <fieldset>
                        <legend>Thông tin khách hàng</legend>
                        <table>
                            <tr>
                                <td>Họ và tên</td>
                                <td><input type="text" name="custName" id="custName" class="cust-input"></td>
                            </tr>
                            <tr><td></td><td id="nameError" class="errorMsg"></td></tr>
                            <tr>
                                <td>Số điện thoại</td>
                                <td><input type="text" name="custPhone" id="custPhone" class="cust-input"></td>
                            </tr>
                            <tr><td></td><td id="phoneError" class="errorMsg"></td></tr>
                            <tr>
                                <td>Email</td>
                                <td><input type="email" name="custEmail" id="custEmail" class="cust-input"></td>
                            </tr>
                            <tr><td></td><td id="emailError" class="errorMsg"></td></tr>
                            <tr>
                                <td>Địa chỉ</td>
                                <td><input type="text" name="custAddress" id="custAddress" class="cust-input"></td>
                            </tr>
                            <tr><td></td><td id="addressError" class="errorMsg"></td></tr>
                        </table>
                    </fieldset>
                    <div class="buttons" align="center">
                        <input type="submit" name="b1" id="b1" value="Đồng ý" class="button" onclick="return checkForm()">
                        &nbsp;&nbsp;
                        <input type="reset" name="b2" id="b2" value="Nhập lại" class="button">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <footer class="footer">
        Địa chỉ: Đường Nghiêm Xuân Yêm - Đại Kim - Hoàng Mai - Hà Nội</br>
        Hộ trợ kỹ thuật: 0123456789 (Nhóm dự án công nghệ thông tin)
    </footer>
</body>

</html>