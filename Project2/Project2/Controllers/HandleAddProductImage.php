<?php
require_once("Function/Function.php");
$productid = $_REQUEST["id"];
$image = UploadFile("f1", "images");

$ketqua = $sanpham->AddProductImage($image,$productid);
if($ketqua==FALSE)
	$thongbao="Lỗi thêm dữ liệu";
else
	$thongbao ="Thêm dữ liệu thành công";

require("ViewsHome/vKetqua.php");
?>