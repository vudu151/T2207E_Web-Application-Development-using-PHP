<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Đăng Xuất</title>
</head>
<body>
<?php
session_start();
//unset($_SESSION["logined"]);//hủy 1 biến $_SESSION["logined"]
session_destroy();//hủy toàn bộ SESSION
?>
<h3 style="color:BLUE"> ĐÃ ĐĂNG XUẤT </h3>
<a href="admin.php"> Về Trang Admin</a>
</body>
</html>