<?php
if (!isset($_POST["bSignUp"])) {
    die("<h1>Chưa nhập form</h1>");
}

require_once("../models/classDatabase.php");

$username = $_REQUEST["username"];
$password = $_REQUEST["Password"];

$db = new DatabaseConnection();

$query = "select * from account where username=? and type='user'";
$result = $db->executeSQL($query, [$username]);
if (!$result) {
    die("<h1 class='die-msg'>Trouble connecting to database</h1>");
}
$row = $db->pdo_statement->fetch();
if ($row != NULL) {
    header("Location: dang-ky.php");
    setcookie("error", "Username đã được sử dụng", time()+1, "/", "", 0);
} else {
    $query = "insert into account values (NULL,?,?,'user')";
    $result = $db->executeSQL($query, [$username, $password]);
    if (!$result) {
        die("<h1>Trouble connecting to database</h1>");
    }
    header("Location: dang-nhap.php");
    setcookie("success", "Tạo tài khoản thành công", time()+1, "/", "", 0);
}

