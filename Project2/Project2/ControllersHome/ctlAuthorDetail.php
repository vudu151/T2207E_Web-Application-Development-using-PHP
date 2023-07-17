<?php
require_once("Models/clsAuthor.php");
//biến $link_tieptuc và $thongbao dùng cho Views/vKetqua.php

$thongbao ="";

$masp = 0;
//lấy các thông tin từ request nếu có
if(isset($_REQUEST["id"]))
	$masp = $_REQUEST["id"];

//tạo đối tượng clsSanpham
$author = new clsAuthor();

if($masp > 0)
{
	$ketqua = $author->GetAuthorById($masp);//tìm sp có $masp và status=1
	require("ViewsHome/author_detail.php");
}
else
{
	$link_tieptuc="index.php";
	$thongbao = "id sản phẩm không hợp lệ";
	require("ViewsHome/vKetqua.php");
}