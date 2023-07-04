<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký</title>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300&subset=vietnamese' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="index.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="dang-ky.css?v=<?php echo time(); ?>">
    <script>
        function usernameCheck() {
            username = document.getElementById("username");
            error = document.getElementById("usernameError");
            invalid = ['!', '@', '#', '$', '%', '^', '&', '*', '(', ')', '+', '=', '[', ']', '{', '\\', '|', 
                        '\"', ';', ':', '<', '.', '>', '/', '?', '\'', '}'];
            if (username.value.length < 4) {
                error.innerHTML = "Username phải có ít nhất 4 ký tự";
                return false;
            }
            for (char of username.value.toString()) {
                if (invalid.includes(char)) {
                    error.innerHTML = "Username không được chứa ký tự đặc biệt";
                    return false;
                }
            }
            error.innerHTML = "";
            return true;
        }

        function passwordCheck() {
            password = document.getElementById("Password");
            error = document.getElementById("passError");
            if (password.value.length < 6) {
                error.innerHTML = "Mật khẩu phải có ít nhất 6 ký tự";
                return false;
            }
            error.innerHTML = "";
            return true;
        }

        function confirmPasswordCheck() {
            password = document.getElementById("Password");
            confirmPassword = document.getElementById("ConfirmPassword");
            error = document.getElementById("confirmPassError");
            if (password.value != confirmPassword.value) {
                error.innerHTML = "Mật khẩu không giống nhau";
                return false;
            }
            error.innerHTML = "";
            return true;
        }
    </script>
</head>
<body>
    <?php include_once("Header.php"); ?>
    <div class="container">
        <div class="bookdetailwrap">
            <header class="pageheader">
                <h1>Đăng ký</h1>
            </header>
            <article class="form">
                <form action="SignUpHandle.php" method="post">            
                    <p>
                        <label for="username">Username</label>
                        <input id="username" name="username" type="text" value="" required onkeyup="usernameCheck()"/>
                        <div class="error" id="usernameError"></div>
                    </p>
                    <p>
                        <label for="Password">Mật khẩu</label>
                        <input id="Password" name="Password" type="password" value="" required onkeyup="passwordCheck()"/>
                        <div class="error" id="passError"></div>
                    </p>
                    <p>
                        <label for="ConfirmPassword">Xác nhận mật khẩu</label>
                        <input id="ConfirmPassword" name="ConfirmPassword" type="password" value="" required onkeyup="confirmPasswordCheck()"/>
                        <div class="error" id="confirmPassError"></div>
                    </p>
                    <?php if (isset($_COOKIE["error"])) { ?>
                        <div class="error"><?php echo $_COOKIE["error"] ?></div>
                    <?php } ?>
                    <p>
                        <input type="submit" name="bSignUp" class="btn" value="Đăng ký" onclick="return passwordCheck() && confirmPasswordCheck() && usernameCheck();"/>
                    </p>
                    <p>
                        Bạn đã có tài khoản? Hãy 
                        <a href="" class="btn">
                            <strong>Đăng nhập</strong>
                        </a>
                    </p>
                </form>
            </article>
        </div>
    </div>
    <footer class="footer">
        Địa chỉ: Đường Nghiêm Xuân Yêm - Đại Kim - Hoàng Mai - Hà Nội</br>
        Hộ trợ kỹ thuật: 0123456789 (Nhóm dự án công nghệ thông tin)
    </footer>
</body>
</html>