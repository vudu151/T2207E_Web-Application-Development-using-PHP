<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Xử lý đăng nhập</title>
    </head>
    <body>
        <h2>Xử lý đăng nhập</h2>
        <?php
            session_start();
            $user = $_REQUEST["tUser"];
            $pass = $_REQUEST["tPassword"];
            if($user=="admin" && $pass=="123456")
            {
                $_SESSION["logined"] = "OK";
                $_SESSION["user"] = $user;
                echo "<h3>Đăng nhập thành công</h3>";
                echo "<a href=\"Admin.php\">Vào trang Admin</a>";
            }
            else
            {
                $_SESSION["logined"] = "";
                echo "<h3>Đằn nhập sai tài khoản</h3>";
                echo "<a href=\"Login.php\">Mời đăng nhập</a>";
            }
        ?>
    </body>
</html>