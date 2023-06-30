<html>
    <head>
        <link rel="stylesheet" href="../Login/Login.css">
    </head>
    <body>
        <?php
            session_start();
            if (!(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true)) {
                echo "<h1 align='center'>Chưa " . "<a href='../Login/Login.php'>đăng nhập</a></h1>";
                die();
            }
        ?>
    </body>
</html>