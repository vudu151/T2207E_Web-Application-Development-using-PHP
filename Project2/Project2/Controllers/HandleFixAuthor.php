<?php
require_once("Function/Function.php");
$id = $_REQUEST["id"];
$name = $_REQUEST["name"];
$image = UploadFile("f1", "images");
if($image=="")//nếu không chọn ảnh mới thì lấy ảnh hiện taij
	$image = $_REQUEST["anhHientai"];
$description = $_REQUEST["description"];

$ketqua = $sanpham->FixAuthor($id,$name,$image,$description);
if($ketqua==FALSE)
	$thongbao="Lỗi sửa dữ liệu";
else
	$thongbao ="Sửa dữ liệu thành công";

require("ViewsHome/vKetqua.php");
?>