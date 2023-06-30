<?php
if (!isset($_REQUEST["bSubmit"])) {
    echo "Chưa " . "<a href='Login.php'>đăng nhập</a>";
    die();
}

require_once("../../models/classDatabase.php");

$user = $_REQUEST["username"];
$pass = $_REQUEST["password"];

$db = new DatabaseConnection();
$query = "select * from account where username=? and password=? and type='admin'";
$result = $db->executeSQL($query, [$user, $pass]);
if (!$result) {
    die("<h1>Trouble connecting to database</h1>");
}
$row = $db->pdo_statement->fetch();

if ($row == NULL) {
    header("Location: Login.php");
    setcookie("error", "Sai tài khoản hoặc mật khẩu.", time()+1, "/", "", 0);
} else {
    session_start();
    $_SESSION["loggedin"] = true;
    $_SESSION["username"] = $user;
    header("Location: ../Book/BookList.php");
    setcookie("success", "Đăng nhập thành công.", time()+1, "/", "", 0);
}