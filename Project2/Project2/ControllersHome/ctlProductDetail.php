<?php
require_once("Models/clsProduct.php");
require_once("Models/clsUser.php");
require_once("Models/clsComment.php");
//biến $link_tieptuc và $thongbao dùng cho Views/vKetqua.php

$thongbao ="";

$masp = 0;
$act = "";
//lấy các thông tin từ request nếu có
if(isset($_REQUEST["id"]))
	$masp = $_REQUEST["id"];
if(isset($_REQUEST["act"]))
	$act = $_REQUEST["act"];

$link_tieptuc ="?module=" . $module . "&id=" . $masp;
//tạo đối tượng clsSanpham
$sanpham = new clsProduct();

if($act=="addcomment")
{	
	require("CheckLoginHome.php");

	$rating = isset($_POST["rating"])?$_REQUEST["rating"]:0;

	if($rating==0){
		$thongbao = "Bạn chưa đánh giá";
		require("ViewsHome/vKetqua.php");
	}
	else
	{
		$description = isset($_REQUEST["description"])?$_REQUEST["description"]:"";

		
		$user_cmt = new clsUser();
		if(isset($_SESSION["user"]))
		{
			$ketqua = $user_cmt->GetIdByUsername($_SESSION["user"]);
			if($ketqua==FALSE){
				$thongbao = "Lỗi lấy id người dùng";
				require("ViewsHome/vKetqua.php");
			}
		}
		$rowU = $user_cmt->data;
		
		$cmt = new clsComment();
		$ketqua = $cmt->AddProductComment($rating,$description,$masp,$rowU["Id"]);
		if($ketqua==FALSE){
			$thongbao = "Lỗi thêm đánh giá";
		}
		else
			$thongbao = "Thêm đánh giá thành công";
		require("ViewsHome/vKetqua.php");
	}
}
else if($act=="deletecomment")
{
	$user_cmt = new clsUser();
	$ketqua = $user_cmt->GetIdByUsername($_SESSION["user"]);
	$rowU = $user_cmt->data;
	$cmt = new clsComment();
	$ketqua = $cmt->DeleteProductCommentByProductIdAndUserId($masp,$rowU["Id"]);
	if($ketqua==FALSE){
		$thongbao = "Lỗi xóa đánh giá";
	}
	else
		$thongbao = "Xóa đánh giá thành công";
	require("ViewsHome/vKetqua.php");
}
else
{
	if($masp > 0)
	{
		$ketqua = $sanpham->GetProductById($masp);//tìm sp có $masp và status=1
		require("ViewsHome/product_details.php");
	}
	else
	{
		$link_tieptuc="index.php";
		$thongbao = "id sản phẩm không hợp lệ";
		require("ViewsHome/vKetqua.php");
	}
}
?>