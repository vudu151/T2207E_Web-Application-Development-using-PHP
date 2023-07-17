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
if($act == "add"){
	require("Views/AddCategory.php");
}
else if($act == "fix"){//hiển thị form sửa nhóm sản phẩm
	$ketqua = $Nhomsanpham->GetCategoryById($id);
	require("Views/FixCategory.php");
}
else if($act == "delete"){
	require("HandleDeleteCategory.php");
}
else if($act == "handleadd"){
	require("HandleAddCategory.php");
}	
else if($act == "handlefix"){
	require("HandleFixCategory.php");}
else{ 
	$ketqua = $Nhomsanpham->GetCategoryList(1);
	require("Views/category.php");
}	
?>