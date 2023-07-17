<?php
session_start();//khai báo sử dụng $_SESSION[]
require("Models/clsAdmin.php");
if(isset($_REQUEST["tUser"])==false)//nếu chưa chạy form Login.php
{
	//echo "<a href=\"Login.php\"> Mời đăng nhập</a>";
	$thongbao = "BẠN CHƯA ĐĂNG NHẬP";
	$link_tieptuc = "login.php";
	require("Views/vKetqua.php");
	die();//dừng trang web
}
$user = $_REQUEST["tUser"];
$pass= $_REQUEST["tPassword"];
$pass = md5($pass);//sử dụng hàm của php mã hóa md5() mật khẩu mà người dùng nhập
$admin = new clsAdmin();
$ketqua = $admin->KiemTraTaiKhoan($user,$pass);
if($ketqua==FALSE)
{
	$thongbao = "Lỗi TRUY VẤN CSDL";
	$link_tieptuc = "login.php";
	require("Views/vKetqua.php");;
	die();
}
$row = $admin->data;
if($row!=NULL)//đăng nhập thành công
{
	if($row["trangthai"]==1)
	{
		//khởi tạo biến $_SESSION["logined"] để vượt quả KiemtraDangnhap.php
		$_SESSION["logined"] ="OK";
		$_SESSION["user"] = $row["username"];
		$_SESSION["quyen"] = $row["quyen"];
		//header("location:index_admin.php");
		$thongbao = "ĐĂNG NHẬP THÀNH CÔNG";
		$link_tieptuc = "index_admin.php";
	require("Views/vKetqua.php");
	}
	else
	{
		$thongbao = "TÀI KHOẢN ĐÃ BỊ KHÓA";
		$link_tieptuc = "login.php";
		require("Views/vKetqua.php");;
	}
}
else
{
	$thongbao = "ĐĂNG NHẬP SAI USER HOẶC PASSWORD";
	$link_tieptuc = "login.php";
	require("Views/vKetqua.php");;
}
?>