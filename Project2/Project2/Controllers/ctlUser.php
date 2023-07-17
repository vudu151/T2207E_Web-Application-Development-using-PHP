<?php
require_once("Models/clsUser.php");

$act = "";
$id = "";
$link_tieptuc ="?module=" . $module;
$thongbao ="";
//lấy các thông tin từ request nếu có
if(isset($_REQUEST["act"]))
	$act = $_REQUEST["act"];
if(isset($_REQUEST["id"]))
	$id = $_REQUEST["id"];
$sanpham = new clsUser();

if($act == "fix"){
	$ketqua = $sanpham->GetUserById($id);
	require("Views/FixUser.php");
}	
else if($act == "handlefix"){
	require("HandleFixUser.php");
}
else if($act == "deleteproductcomment"){
	require("HandleDeleteProductComment.php");
}
else if($act == "deleteeventcomment"){
	require("HandleDeleteEventComment.php");
}
else{ 
	require("Views/user.php");
}	
?>