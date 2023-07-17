<?php
require_once("Models/clsEvent.php");
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
$event = new clsEvent();

if($act=="addcomment")
{	
	require("CheckLoginHome.php");


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
    $ketqua = $cmt->AddEventComment($description,$masp,$rowU["Id"]);
    if($ketqua==FALSE){
        $thongbao = "Lỗi thêm đánh giá";
    }
    else
        $thongbao = "Thêm đánh giá thành công";
    require("ViewsHome/vKetqua.php");
}
else if($act=="deletecomment")
{
	$user_cmt = new clsUser();
	$ketqua = $user_cmt->GetIdByUsername($_SESSION["user"]);
	$rowU = $user_cmt->data;
	$cmt = new clsComment();
	$ketqua = $cmt->DeleteEventCommentByEventIdAndUserId($masp,$rowU["Id"]);
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
		$ketqua = $event->GetEventById($masp);//tìm sp có $masp và status=1
		require("ViewsHome/event_detail.php");
	}
	else
	{
		$link_tieptuc="index.php";
		$thongbao = "id sản phẩm không hợp lệ";
		require("ViewsHome/vKetqua.php");
	}
}
?>