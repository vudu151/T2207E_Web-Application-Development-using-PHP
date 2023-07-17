<?php
require_once("Models/clsAuthor.php");
$act = "";
$id = "";
//biến $link_tieptuc và $thongbao dùng cho Views/vKetqua.php
$link_tieptuc ="?module=" . $module;
$thongbao ="";
//lấy các thông tin từ request nếu có
if(isset($_REQUEST["act"]))
	$act = $_REQUEST["act"];
if(isset($_REQUEST["id"]))
	$id = $_REQUEST["id"];
//tạo đối tượng clsCategory
$sanpham = new clsAuthor();
//gọi các view dựa trên biến act 
if($act == "add"){
	require("Views/AddAuthor.php");
}
else if($act == "fix"){//hiển thị form sửa nhóm sản phẩm
	$ketqua = $sanpham->GetAuthorById($id);
	require("Views/FixAuthor.php");
}
else if($act == "delete"){
	require("HandleDeleteAuthor.php");
}
else if($act == "handleadd"){
	require("HandleAddAuthor.php");
}	
else if($act == "handlefix"){
	require("HandleFixAuthor.php");}
else{ 
	$ketqua = $sanpham->GetAuthorList(1);
	require("Views/author.php");
}	
?>