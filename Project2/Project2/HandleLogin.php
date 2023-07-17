<?php
session_start();//khai báo sử dụng $_SESSION[]
require("Models/clsLogin.php");
if(isset($_REQUEST["tUser"])==false)//nếu chưa chạy form Login.php
{
	//echo "<a href=\"Login.php\"> Mời đăng nhập</a>";
	$thongbao = "BẠN CHƯA ĐĂNG NHẬP";
	$link_tieptuc = "login.php";
	require("ViewsHome/vKetqua.php");
	die();//dừng trang web
}
$user = $_REQUEST["tUser"];
$pass= $_REQUEST["tPassword"];
$pass = md5($pass);//sử dụng hàm của php mã hóa md5() mật khẩu mà người dùng nhập
$people = new clsLogin();
$ketqua = $people->CheckUser($user,$pass);
if($ketqua==FALSE)
{
	$thongbao = "Lỗi TRUY VẤN CSDL";
	$link_tieptuc = "login.php";
	require("ViewsHome/vKetqua.php");;
	die();
}
$row = $people->data;
if($row!=NULL)
{

	$_SESSION["logined_h"] ="OK";
	$_SESSION["user"] = $row["Username"];
	$thongbao = "ĐĂNG NHẬP THÀNH CÔNG";
	$link_tieptuc = "index.php";
	require("ViewsHome/vKetqua.php");
	
}
else
{
	$thongbao = "ĐĂNG NHẬP SAI USER HOẶC PASSWORD";
	$link_tieptuc = "login.php";
	require("ViewsHome/vKetqua.php");;
}
?>