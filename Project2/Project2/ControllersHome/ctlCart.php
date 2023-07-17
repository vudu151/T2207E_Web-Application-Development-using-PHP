<?php
require_once("Models/clsProduct.php");
$act = "";
$masp = "";
$quantity = "";
$btn = "";
if(isset($_REQUEST["act"]))
	$act = $_REQUEST["act"];
if(isset($_REQUEST["id"]))
	$masp = $_REQUEST["id"];
if(isset($_REQUEST["quantity"]))
	$quantity = $_REQUEST["quantity"];
if(isset($_REQUEST["button"]))
	$btn = $_REQUEST["button"];
$link_tieptuc ="?module=" . $module;
$thongbao ="";

if($act == "add"){
	if($masp=="" || is_numeric($masp)==false)
		$thongbao = "id sản phẩm không hợp lệ";
	else
	{
		if(isset($_SESSION["cart"][$masp])==true)//nếu sản phẩm có trong giỏ hàng
		{
			$soluong = $_SESSION["cart"][$masp];
			//tăng số lượng của sản phẩm trong mảng lên 1 đv và gán cho masp cũ
			$_SESSION["cart"][$masp] = $soluong + $quantity; 
		}
		else//masp phẩm chưa có trong giỏ hàng (mua sản phẩm mới)
		{
			//thêm 1 phần tử có key là $masp và giá trị là 1 vào mảng cart
			$_SESSION["cart"][$masp] = $quantity;
		}
		$thongbao ="Đã thêm sản phẩm vào giỏ hàng";
		if($btn=="Mua ngay"){
			$thongbao ="Đến trang thanh toán";
			$link_tieptuc = "?module=checkout";
		}
	}
	require_once("ViewsHome/cart.php");
	require("ViewsHome/vKetqua.php");
}
else if($act == "del"){
	if($masp=="" || is_numeric($masp)==false)
		$thongbao = "id sản phẩm không hợp lệ";
	else
	{
		if($masp==0)//xóa toàn bộ giỏ hàng
		{
			unset($_SESSION["cart"]);
		}
		else//xóa sản phẩm có masp chọn
		{
			unset($_SESSION["cart"][$masp]);
		}
		$thongbao ="Đã xóa sản phẩm khỏi giỏ hàng";
	}
	require_once("ViewsHome/cart.php");
	require("ViewsHome/vKetqua.php");
}
else if($act == "update"){
	if(isset($_REQUEST["btnupdate"])==false)
		$thongbao = "LỖI FORM UPDATE CART";
	else
	{
		$qty = $_REQUEST["qty"];//lấy mảng các input có name="qty[x]"
		foreach($qty as $masp=>$soluong)
		{
			if($soluong==0 || is_numeric($soluong)==false)
				unset($_SESSION["cart"][$masp]);
			else	
				$_SESSION["cart"][$masp] = $soluong;
		}
		$thongbao ="Đã cập nhật số lượng sản phẩm trong giỏ hàng";
	}
	require_once("ViewsHome/cart.php");
	require("ViewsHome/vKetqua.php");
}
else
{
	require_once("ViewsHome/cart.php");
}

?>