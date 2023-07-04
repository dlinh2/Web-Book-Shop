<html>
    <head>
        <link rel="stylesheet" href="../Login/Login.css">
    </head>
    <body>
        <?php
            session_start();
            if (!(isset($_SESSION["adminloggedin"]) && $_SESSION["adminloggedin"] == true)) {
                echo "<h1 align='center'>Chưa " . "<a href='../Login/Login.php'>đăng nhập</a></h1>";
                die();
            }
        ?>
    </body>
</html>