<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../Header/Header.css?v=<?php echo time(); ?>">
    <script>
        function logout() {
        var xhr = new XMLHttpRequest();
        xhr.open("GET", "../Login/Logout.php", true);
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
            window.location.href = "../Login/Login.php"; 
            }
        };
        xhr.send();
        }
    </script>
</head>
<body>
    <?php
        require_once("../Login/LoggedinCheck.php");
    ?>
    <div class="header">
        <div class="wrapper">
            <ul class="topnavR">
                <li><a href="../Login/Login.php" onclick="logout()">Đăng xuất</a></li>
            </ul>
        </div>
        <div class="mednav">
            <div class="logo">
                <a href="/BookShop/homePage.php"><img src="../../img/logo.png" alt="Book Shop"> </a>
            </div>
        </div>
        <ul id="nav">
            <li><a href="../Author/AuthorList.php">Tác giả</a></li>
            <li><a href="../Translator/TranslatorList.php">Nhóm dịch</a></li>
            <li><a href="../Publisher/PublisherList.php">Nhà xuất bản</a></li>
            <li><a href="../Category/CategoryList.php">Nhóm sản phẩm</a></li>
            <li><a href="../Book/BookList.php">Sách</a></li>
        </ul>
    </div>
</body>
</html>