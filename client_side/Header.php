<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Header.css?v=<?php echo time(); ?>">
    <script>
        function updateCart() {
            var xhr = new XMLHttpRequest();
            xhr.open("GET", "cart.php?function=getCartItems", true);
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    var response = xhr.responseText;
                    document.getElementById("cart-items").innerHTML = response;
                } else {
                    console.log(xhr.statusText);
                }
            };
            xhr.send();
        }
        function openCart() {
            updateCart();
            cart = document.getElementById("cart-modal");
            cart.style.display = "block";
        }

        function closeCart() {
            cart = document.getElementById("cart-modal");
            cart.style.display = "none";
        }

        function deleteFromCart(id) {
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "cart.php", true);
            xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            params = "function=deleteFromCart&id=" + id;
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    var response = xhr.responseText;
                    console.log(response);
                }
            };
            xhr.send(params);
            updateCart();
        }

        function logout() {
            var xhr = new XMLHttpRequest();
            xhr.open("GET", "Logout.php", true);
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                window.location.href = "HomePage.php"; 
                }
            };
            xhr.send();
        }
    </script>
</head>
<body>
    <?php 
        require_once("../models/classCategory.php");
        $categoryObj = new Category();
        $result = $categoryObj->getCategoryList();
        if (!$result) {
            die("<h1 class='die-msg'>Trouble connecting to database</h1>");
        }
        $categoryObj->sortData();
        $categories = array_filter($categoryObj->data, function($category) {
            return $category["category_status"];
        });
    ?>
    <div class="header">
        <div class="wrapper">
            <ul class= "topnav">     
                <a href="OrderHistory.php">Lịch sử mua hàng</a>
            </ul>
            <ul class="topnavR">
                <?php 
                    
                    if (isset($_SESSION["user"])) { ?>
                        <li>Xin chào <?=$_SESSION["user"] ?></li>
                        <li><a href="HomePage.php" onclick="logout()">ĐĂNG XUẤT</a></li>
                <?php
                    } else {
                ?>
                    <li><a href="dang-ky.php">ĐĂNG KÝ</a></li>
                    <li><a href="dang-nhap.php">ĐĂNG NHẬP</a></li>
                <?php } ?>
            </ul>
        </div>
        <div class="mednav">
            <a href="HomePage.php">
                <div class="logo">
                    <img src="../img/logo.png" alt="Book Shop">
                </div>
            </a>
            <div class="search">
                <form action="tim-kiem.php" method="GET">
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
                        <div id="cart-items"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>