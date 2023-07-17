<?php

if(isset($_SESSION["logined_admin"])==false || $_SESSION["logined_admin"]=="")
{
	$thongbao = "BẠN CHƯA ĐĂNG NHẬP";
	$link_tieptuc = "LoginAdmin.php";
	require("ViewsHome/vKetqua.php");
	die();
}
?>