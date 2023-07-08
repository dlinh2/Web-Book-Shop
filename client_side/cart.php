<?php
session_start();
function addToCart($row) {
    if (!isset($_SESSION["cart"])) {
        $_SESSION["cart"] = array();
    }
    foreach($_SESSION["cart"] as $crow) {
        if ($crow->id == $row->id) {
            $crow->quantity += $row->quantity;
            return;
        }
    }
    $_SESSION["cart"][] = $row;
}

function getCartItems() {
    if (!isset($_SESSION["cart"]) || count($_SESSION["cart"]) == 0) {
        $cartContent = 'Không có sản phẩm nào trong giỏ';
    } else {
        $cartContent = '<table class="items-table">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th width="500px">Tiêu đề</th>
                                    <th>Giá</th>
                                    <th>Số lượng</th>
                                    <th>Tổng cộng</th>  
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>';
        $totalPrice = 0;
        $i = 0;
        foreach ($_SESSION["cart"] as $row) {
            $totalPrice += $row->unitPrice*$row->quantity;
            $cartContent .= '<tr class="items-row">';
            $cartContent .= '<td>'.++$i.'</td>';
            $cartContent .= '<td class="book-title">'.$row->title.'</td>';
            $cartContent .= '<td>'.number_format($row->unitPrice, 0, '.', '.').'đ</td>';
            $cartContent .= '<td>'.$row->quantity.'</td>';
            $cartContent .= '<td>'.number_format($row->unitPrice*$row->quantity, 0, '.', '.').'đ</td>';
            $cartContent .= '<td><button onclick="deleteFromCart('.$row->id.')">Xóa</button></td>';
            $cartContent .= '</tr>';
        }
        $cartContent .= '<tr><td colspan="5" style="border-bottom: 1px solid black;"></td></tr>';
        $cartContent .= '<tr><td/><td/><td/><td/><td>'.number_format($totalPrice, 0, '.', '.').'đ</td></tr>';
        $cartContent .= '</tbody></table>';
        $cartContent .= '<div class="modal-action">';
        $cartContent .= '<a href="Order.php" class="next">Xác nhận đặt hàng</a>';
        $cartContent .= '</div>';
    }
    echo $cartContent;
}

function deleteFromCart($id) {
    $_SESSION["cart"] = array_filter($_SESSION["cart"], function($row) use ($id) {
        return $row->id != $id;
    });
}

function clearCart() {
    $_SESSION["cart"] = array();
}

if (isset($_GET["function"])) {
    $function = $_GET["function"];
    if ($function == "getCartItems") {
        getCartItems();
    } elseif ($function == "deleteFromCart" && isset($_GET["id"])) {
        deleteFromCart($_GET["id"]);
    } elseif ($function == "addToCart" && isset($_GET["row"])) {
        $row = json_decode($_GET["row"]);
        addToCart($row);
    }
}

if (isset($_POST["function"])) {
    $function = $_POST["function"];
    if ($function == "deleteFromCart" && isset($_GET["id"])) {
        deleteFromCart($_GET["id"]);
    } elseif ($function == "addToCart" && isset($_GET["row"])) {
        $row = json_decode($_GET["row"]);
        addToCart($row);
    }
}