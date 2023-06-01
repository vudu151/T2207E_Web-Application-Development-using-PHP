<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Xử lý đăng nhập</title>
</head>

<body>
<h2> Xử lý đăng nhập</h2>
<?php
session_start();
$user = $_REQUEST["tUser"];
$pass = $_REQUEST["tPassword"];
if($user=="admin" && $pass=="123456")//thành công
{
	$_SESSION["logined"] = "OK";
	$_SESSION["user"] = $user;
	echo "<h3> ĐĂNG NHẬP THÀNH CÔNG</h3>";
	echo "<a href=\"Admin.php\"> Vào Trang Admin</a>";
}
else
{
	$_SESSION["logined"] = "";
	echo "<h3> ĐĂNG NHẬP SAI TÀI KHOẢN</h3>";
	echo "<a href=\"Login.php\"> Mời Đăng nhập</a>";
}
?>
</body>
</html>