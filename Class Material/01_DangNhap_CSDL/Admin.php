<?php
session_start();
require("KiemtraDangNhap.php");
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Trang Admin - Cần đăng nhập</title>
</head>
<body>
<h2> TRANG DÀNH CHO ADMIN</h2>
<h3>Tài khoản :<?=$_SESSION["user"]?> </h3>
<h3>Xin chào :<?=$_SESSION["hoten"]?> </h3>
<h3><a href="Logout.php"> THOÁT</a></h3>
</body>
</html>