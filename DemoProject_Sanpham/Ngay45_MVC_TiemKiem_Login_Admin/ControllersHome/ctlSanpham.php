<?php
require_once("Models/clsSanpham.php");
require_once("Models/clsCategory.php");
//biến $link_tieptuc và $thongbao dùng cho Views/vKetqua.php
$link_tieptuc ="?module=" . $module;
$thongbao ="";
//lấy các thông tin từ request nếu có
$act = isset($_REQUEST["act"])?$_REQUEST["act"]:"";
$tukhoa = isset($_REQUEST["tTukhoa"])? $_REQUEST["tTukhoa"]:"";
$manhom = isset($_REQUEST["manhom"])?$_REQUEST["manhom"]:0;
//tạo đối tượng clsSanpham
$sanpham = new clsSanpham();
$soketqua =0;
$tennhom = "";
if($act=="timkiem")
{
	$ketqua = $sanpham->LayDanhSachSanpham(1,$manhom,$tukhoa);
	if($ketqua)
		$soketqua = $sanpham->db->pdo_stm->rowCount();
}
else 
{
	if($manhom >0){
		$ketqua = $sanpham->LayDanhSachSanpham(1,$manhom);//lấy các sp có status=1 và cat_id=$manhom
		$cat =  new clsCategory();
		$cat->TimTheoIDNhomSanpham($manhom);
		$tennhom = $cat->data["cat_name"];
	}
	else{ //hiển thị tất cả sản phẩm
		$ketqua = $sanpham->LayDanhSachSanpham(1,0);//lấy tất cả các sp có status=1 
	}	
}
require("ViewsHome/v_DSSanpham.php");
?>