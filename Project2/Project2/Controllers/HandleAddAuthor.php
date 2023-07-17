<?php
require_once("Function/Function.php");
$name = $_REQUEST["name"];
$image = UploadFile("f1", "images");
$description = $_REQUEST["description"];

$ketqua = $sanpham->AddAuthor($name,$image,$description);
if($ketqua==FALSE)
	$thongbao="Lỗi thêm dữ liệu";
else
	$thongbao ="Thêm dữ liệu thành công";

require("ViewsHome/vKetqua.php");
?>