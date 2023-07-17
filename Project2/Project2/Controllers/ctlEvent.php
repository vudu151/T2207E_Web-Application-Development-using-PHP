<?php
require_once("Models/clsEvent.php");
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
$sanpham = new clsEvent();

if($act == "add"){
	require("Views/AddEvent.php");
}
else if($act == "fix"){
	$ketqua = $sanpham->GetEventById($id);
	require("Views/FixEvent.php");
}
else if($act == "delete"){
	require("HandleDeleteEvent.php");
}
else if($act == "handleadd"){
	require("HandleAddEvent.php");
}	
else if($act == "handlefix"){
	require("HandleFixEvent.php");
}
else if($act == "deletecomment"){
	require("HandleDeleteEventComment.php");
}
else{ 
	require("Views/event.php");
}	
?>