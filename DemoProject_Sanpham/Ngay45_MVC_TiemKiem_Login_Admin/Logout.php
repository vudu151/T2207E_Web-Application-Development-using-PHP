<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Đăng xuất</title>
</head>

<body>
<?php
session_start();
//unset($_SESSION["logined"]);//hủy 1 biến $_SESSION["logined"]
session_destroy();//hủy toàn bộ các biến session
$thongbao = "ĐÃ ĐĂNG XUẤT THÀNH CÔNG";
$link_tieptuc = "login.php";
require("Views/vKetqua.php");
?>
</body>
</html>