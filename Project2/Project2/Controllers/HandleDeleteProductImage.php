<?php
$id = $_REQUEST["id"];

$ketqua = $sanpham->DeleteProductImage($id);
if($ketqua==FALSE)
	$thongbao="Lỗi xóa dữ liệu";
else
	$thongbao ="Xóa dữ liệu thành công";

require("ViewsHome/vKetqua.php");
?>