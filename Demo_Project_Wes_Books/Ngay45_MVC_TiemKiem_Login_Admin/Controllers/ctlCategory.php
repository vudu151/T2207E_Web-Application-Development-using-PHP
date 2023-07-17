<?php
require_once("Models/clsCategory.php");
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
$Nhomsanpham = new clsCategory();
//gọi các view dựa trên biến act 
if($act == "them"){
	require("Views/vThemNhomSP.php");
}
else if($act == "sua"){//hiển thị form sửa nhóm sản phẩm
	$ketqua = $Nhomsanpham->TimTheoIDNhomSanpham($id);
	require("Views/vSuaNhomSP.php");
}
else if($act == "xoa"){
	require("xulyXoaNhomSP.php");
}
else if($act == "xulythem"){
	require("xulyThemNhomSP.php");
}	
else if($act == "xulysua"){
	require("xulySuaNhomSP.php");}
else{ //hiển thị tất cả nhóm sản phẩm
	 //$trangthai =2, $order =0 LayDanhSachNhomSanpham(2,0)
	$ketqua = $Nhomsanpham->LayDanhSachNhomSanpham(2,1);
	require("Views/vDanhSachNhomSP.php");
}	
?>