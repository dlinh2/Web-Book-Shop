<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300&subset=vietnamese' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="Login.css?v=<?php echo time(); ?>">
</head>
<body>
    <div class="container">
        <div class="bookdetailwrap">
            <header class="pageheader">
                <h1>Đăng nhập</h1>
            </header>
            <article class="form">
                <form action="LoginHandle.php" method="post">
                    <p>
                        <label for="Username">Username</label>
                        <input id="username" name="username" type="text" />
                    </p>
                    <p>
                        <label for="Password">Mật khẩu</label>
                        <input id="password" name="password" type="password" />
                    </p>
                    <?php if (isset($_COOKIE["error"])) { ?>
                        <div class="login_failed"><?php echo $_COOKIE["error"] ?></div>
                    <?php } ?>
                    <p>
                        <input type="submit" class="btn" name="bSubmit" value="Đăng nhập" onclick="return passwordCheck() && confirmPasswordCheck() && usernameCheck();"/>
                    </p>
                </form>
            </article>
        </div>
    </div>
</body>
</html>