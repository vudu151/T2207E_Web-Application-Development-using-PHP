<?php
    session_start();
    require("KiemTraDangNhap.php");
?>
<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="UTF-8" />
        <title>Trang Admin - Cần đăng nhập</title>
    </head>
    <body>
        <h3>TRANG DÀNH CHO ADMIN</h3>
        <h3>Hello <?=$_SESSION["user"]?></h3>
        <a href="Logout.php">Đăng xuất</a>
    </body>
</html>