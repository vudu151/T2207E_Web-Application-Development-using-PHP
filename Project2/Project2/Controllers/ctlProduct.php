<?php
require_once("Models/clsProduct.php");
//biến $link_tieptuc và $thongbao dùng cho Views/vKetqua.php
$link_tieptuc ="?module=" . $module;
$thongbao ="";
//lấy các thông tin từ request nếu có
$id = isset($_REQUEST["id"])?$_REQUEST["id"]:"";
$act = isset($_REQUEST["act"])?$_REQUEST["act"]:"";
$keyword = isset($_REQUEST["keyword"])? $_REQUEST["keyword"]:"";
$categoryid = isset($_REQUEST["categoryid"])?$_REQUEST["categoryid"]:0;
//tạo đối tượng clsSanpham
$sanpham = new clsProduct();
//gọi các view dựa trên biến act 
if($act == "add"){
	require("Views/AddProduct.php");
}
else if($act == "fix"){//hiển thị form sửa sản phẩm
	$ketqua = $sanpham->GetProductById($id);
	require("Views/FixProduct.php");
}
else if($act == "delete"){
	require("HandleDeleteProduct.php");
}
else if($act == "handleadd"){
	require("HandleAddProduct.php");
}	
else if($act == "handlefix"){
	require("HandleFixProduct.php");
}
else if($act == "addProductImage"){
	require("Views/AddProductImage.php");
}
else if($act == "HandleAddProductImage"){
	require("HandleAddProductImage.php");
}
else if($act == "deleteProductImage"){
	require("HandleDeleteProductImage.php");
}
else if($act == "deletecomment"){
	require("HandleDeleteProductComment.php");
}
else{ //tìm kiếm sản phẩm sản phẩm
	require("Views/product.php");
}	
?>