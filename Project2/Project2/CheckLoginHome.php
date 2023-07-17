<?php

if(isset($_SESSION["logined_h"])==false || $_SESSION["logined_h"]=="")
{
	$thongbao = "BẠN CHƯA ĐĂNG NHẬP";
	$link_tieptuc = "Login.php";
	require("ViewsHome/vKetqua.php");
	die();
}
?>