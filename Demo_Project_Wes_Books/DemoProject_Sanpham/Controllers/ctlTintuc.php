<?php
require_once("Models/clsTintuc.php");
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
//tạo đối tượng clsTintuc
$tintuc = new clsTintuc();
//gọi các view dựa trên biến act 
if($act == "them"){
	require("Views/vThemTintuc.php");
}
else if($act == "sua"){//hiển thị form sửa 
	$ketqua = $tintuc->TimTheoIDTintuc($id);
	require("Views/vSuaTintuc.php");
}
else if($act == "xoa"){
	require("xulyXoaTintuc.php");
}
else if($act == "xulythem"){
	require("xulyThemTintuc.php");
}	
else if($act == "xulysua"){
	require("xulySuaTintuc.php");}
else{ //hiển thị tất cả tin tức
	$ketqua = $tintuc->LayDanhSachTintuc();
	require("Views/vDanhSachTintuc.php");
}	
?>