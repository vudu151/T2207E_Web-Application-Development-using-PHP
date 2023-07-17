<?php
require_once("Models/clsBanner.php");
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
$banner = new clsBanner();
//gọi các view dựa trên biến act 
if($act == "add"){
	require("Views/AddBanner.php");
}
else if($act == "delete"){
	require("HandleDeleteBanner.php");
}
else if($act == "handleadd"){
	require("HandleAddBanner.php");
}
else{ 
	require("Views/banner.php");
}	
?>