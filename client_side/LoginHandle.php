<?php
if (!isset($_REQUEST["bSubmit"])) {
    echo "Chưa " . "<a href='Login.php'>đăng nhập</a>";
    die();
}

require_once("../models/classDatabase.php");

$user = $_REQUEST["username"];
$pass = $_REQUEST["Password"];

$db = new DatabaseConnection();
$query = "select * from account where username=? and password=? and type='user'";
$result = $db->executeSQL($query, [$user, $pass]);
if (!$result) {
    die("<h1>Trouble connecting to database</h1>");
}
$row = $db->pdo_statement->fetch();

if ($row == NULL) {
    header("Location: dang-nhap.php");
    setcookie("error", "Sai tài khoản hoặc mật khẩu.", time()+1, "/", "", 0);
} else {
    session_start();
    $_SESSION["loggedin"] = true;
    $_SESSION["user"] = $user;
    if (isset($_POST["RememberMe"])) {
        setcookie('username', $user, time() + (86400 * 30), '/');
        setcookie('password', $pass, time() + (86400 * 30), '/');
    }
    header("Location: HomePage.php");
    setcookie("success", "Đăng nhập thành công.", time()+1, "/", "", 0);
}