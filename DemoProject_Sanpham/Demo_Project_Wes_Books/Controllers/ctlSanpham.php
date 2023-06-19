<?php
require_once("Models/clsSanpham.php");
//biến $link_tieptuc và $thongbao dùng cho Views/vKetqua.php
$link_tieptuc ="?module=" . $module;
$thongbao ="";
//lấy các thông tin từ request nếu có
$id = isset($_REQUEST["id"])?$_REQUEST["id"]:"";
$act = isset($_REQUEST["act"])?$_REQUEST["act"]:"";
$tukhoa = isset($_REQUEST["tTukhoa"])? $_REQUEST["tTukhoa"]:"";
$manhom = isset($_REQUEST["manhom"])?$_REQUEST["manhom"]:0;
//tạo đối tượng clsSanpham
$sanpham = new clsSanpham();
//gọi các view dựa trên biến act 
if($act == "them"){
	require("Views/vThemSP.php");
}
else if($act == "sua"){//hiển thị form sửa sản phẩm
	$ketqua = $sanpham->TimTheoIDSanpham($id);
	require("Views/vSuaSP.php");
}
else if($act == "xoa"){
	require("xulyXoaSP.php");
}
else if($act == "xulythem"){
	require("xulyThemSP.php");
}	
else if($act == "xulysua"){
	require("xulySuaSP.php");}
else{ //tìm kiếm sản phẩm sản phẩm
	$ketqua = $sanpham->LayDanhSachSanpham(2,$manhom,$tukhoa);
	require("Views/vDanhSachSP.php");
}	
?>