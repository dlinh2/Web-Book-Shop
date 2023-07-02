<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Header.css?v=<?php echo time(); ?>">
    <script>
        function openCart() {
            console.log(1);
            cart = document.getElementById("cart-modal");
            cart.style.display = "block";
        }

        function closeCart() {
            cart = document.getElementById("cart-modal");
            cart.style.display = "none";
        }
    </script>
</head>
<body>
    <?php 
        require_once("../models/classCategory.php");

        $categoryObj = new Category();
        $result = $categoryObj->getCategoryList();
        if (!$result) {
            die("<h1>Trouble connecting to database</h1>");
        }
        $categoryObj->sortData();
        $categories = array_filter($categoryObj->data, function($category) {
            return $category["category_status"];
        });
    ?>
    <div class="header">
        <div class="wrapper">
            <ul class= "topnav">
                <a href="kiem-tra-don-hang.php">Kiểm tra đơn hàng</a>
            </ul>
            <ul class="topnavR">
                <li><a href="dang-ky.php">Đăng ký</a></li>
                <li><a href="dang-nhap.php">Đăng nhập</a></li>
            </ul>
        </div>
        <div class="mednav">
            <a href="HomePage.php">
                <div class="logo">
                    <img src="../img/logo.png" alt="Book Shop">
                </div>
            </a>
            <div class="search">
                <form action="/tim-kiem" method="GET">
                    <input type="text" name="q" placeholder="Tìm kiếm sách..." class="text" />
                    <input type="submit" value="Tìm kiếm" class="submit" />
                </form>
            </div>
            <div class="cart" id="cart" onclick="openCart()">
                
            </div>
        </div>
        <ul id="nav">
            <li><a href="Gioi-thieu.php">Giới thiệu</a></li>
            <li>
                <a action="">Danh mục sách</a>
                
                <ul class="subnav">
                    <?php
                        foreach ($categories as $category) {
                    ?>
                    <li><a href="Danh-muc.php?type=category&id=<?=$category["category_id"]?>&name=<?=$category["category_name"]?>"><?=$category["category_name"]?></a></li>
                    <?php } ?>
                </ul>
            </li>
            <li><a href="San-Pham.php">Sản phẩm</a></li>
        </ul>
        <div id="cart-modal">
                <div class="modal-wrap">
                    <div class="modal-title">
                        Giỏ hàng 
                        <span class="close" onclick="closeCart()">&times;</span>
                    </div>
                    <div class="modal-content">
                        <div id="cart-items">
                        <?php
                        if (!isset($_SESSION["cart"]) || count($_SESSION["cart"]))  {
                            echo "Không có sản phẩm nào trong giỏ";
                        } else {
                        ?>

                        <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>