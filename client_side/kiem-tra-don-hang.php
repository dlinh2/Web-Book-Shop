<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ</title>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300&subset=vietnamese' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="index.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="kiem-tra-don-hang.css?v=<?php echo time(); ?>">
</head>
<body>
    <?php include_once("Header.php"); ?>
    <div class="bodyP">
        <div class="pHeader">
            <h1>Kiểm tra đơn hàng</h1>
        </div>
        <div class="checkorder">
            <div class="form">
                <form action="/kiem-tra-don-hang" method="GET">
                    <input name="orderid" placeholder="Nhập mã đơn hàng của bạn" class="text" />
                    <input type="submit" value="Tìm mã" class="submit" />
                </form>

            </div>
        </div>

    </div>

    </div>
    <footer class="footer">
        Địa chỉ: Đường Nghiêm Xuân Yêm - Đại Kim - Hoàng Mai - Hà Nội</br>
        Hộ trợ kỹ thuật: 0123456789 (Nhóm dự án công nghệ thông tin)
    </footer>
</body>
</html>