<?php
    session_start();
    require("KiemtraDangnhap.php");
?>
<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="UTF-8" />
        <title>Trang Admin - Cần đăng nhập</title>
    </head>
    <body>
        <h2>Trang dành cho Admin</h2>
        <h3>Tài khoản: <?=$_SESSION["user"]?></h3>
        <h3>Xin chào: <?=$_SESSION["hoten"]?></h3>
        <h3><a href="Logout.php">Thoát</a></h3>
    </body>
</html>