<?php
require_once("Models/clsUser.php");

$act = "";
$id = "";
$link_tieptuc ="?module=" . $module;
$thongbao ="";
//lấy các thông tin từ request nếu có
if(isset($_REQUEST["act"]))
	$act = $_REQUEST["act"];
$account = new clsUser();

if($act == "fixaccount"){
	$ketqua = $account->GetUserByUsername($_SESSION["user"]);
	require("ViewsHome/FixAccount.php");
}	
else if($act == "handlefixaccount"){
	require("ControllersHome/HandleFixAccount.php");
}
else if($act == "fixuserinfo"){
    $ketqua = $account->GetUserByUsername($_SESSION["user"]);
	require("ViewsHome/FixUserInfo.php");
}
else if($act == "handlefixuserinfo"){
	require("ControllersHome/HandleFixUserInfo.php");
}
else{
    $ketqua = $account->GetUserByUsername($_SESSION["user"]);
	require("ViewsHome/user.php");
}	
?>