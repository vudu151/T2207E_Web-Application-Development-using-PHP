<?php
require_once("Models/clsUser.php");

$link_tieptuc="Login.php";
$thongbao="";

$user = new clsUser();

$username = $_REQUEST["tUser"];
$password = $_REQUEST["tPassword"];
$firstname = $_REQUEST["firstname"];
$lastname = $_REQUEST["lastname"];
$address = $_REQUEST["address"];
$phone = $_REQUEST["phone"];
$email = $_REQUEST["email"];


$ketqua = $user->AddUser($firstname,$lastname,$address,$email,$phone,$username,$password);
if($ketqua==FALSE)
	$thongbao="Lỗi thêm dữ liệu (có thể tên tài khoản hoặc email đã tồn tại)";
else
	$thongbao ="Thêm dữ liệu thành công";

require("ViewsHome/vKetqua.php");
?>