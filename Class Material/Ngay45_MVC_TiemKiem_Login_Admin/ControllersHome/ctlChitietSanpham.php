<?php
require_once("Models/clsSanpham.php");
//biến $link_tieptuc và $thongbao dùng cho Views/vKetqua.php
$link_tieptuc ="?module=" . $module;
$thongbao ="";

$manhom = 0;
$masp = 0;
//lấy các thông tin từ request nếu có
if(isset($_REQUEST["manhom"]))
	$manhom = $_REQUEST["manhom"];
if(isset($_REQUEST["masp"]))
	$masp = $_REQUEST["masp"];
//tạo đối tượng clsSanpham
$sanpham = new clsSanpham();

if($masp > 0)
{
	$ketqua = $sanpham->TimTheoIDSanpham($masp,1);//tìm sp có $masp và status=1
	require("ViewsHome/v_ChitietSanpham.php");
}
else
{
	$link_tieptuc="index.php";
	$thongbao = "id sản phẩm không hợp lệ";
	require("Views/vKetqua.php");
}
?>