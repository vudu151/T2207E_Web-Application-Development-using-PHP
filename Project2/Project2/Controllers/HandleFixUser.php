<?php
$id = $_REQUEST["id"];
$password = $_REQUEST["password"];

$ketqua = $sanpham->FixUser($id,$password);
if($ketqua==FALSE)
	$thongbao="Lỗi sửa dữ liệu";
else
	$thongbao ="Sửa dữ liệu thành công";

require("ViewsHome/vKetqua.php");
?>