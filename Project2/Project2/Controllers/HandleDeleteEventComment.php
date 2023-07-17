<?php
require_once("Models/clsComment.php");

$idcmt = $_REQUEST["id"];

$deletecmt = new clsComment(); 

$ketqua = $deletecmt->DeleteEventComment($idcmt);
if($ketqua==FALSE)
	$thongbao="Lỗi xóa dữ liệu";
else
	$thongbao ="Xóa dữ liệu thành công";

require("ViewsHome/vKetqua.php");
?>