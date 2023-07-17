<?php
require_once("Function/Function.php");
$id = $_REQUEST["id"];
$name = $_REQUEST["name"];
$date =$_REQUEST["date"];
$image = UploadFile("f1", "images");
if($image=="")//nếu không chọn ảnh mới thì lấy ảnh hiện taij
	$image = $_REQUEST["anhHientai"];
$description = $_REQUEST["description"];

$ketqua = $sanpham->FixEvent($id,$name,$date,$image,$description);
if($ketqua==FALSE)
	$thongbao="Lỗi sửa dữ liệu";
else
	$thongbao ="Sửa dữ liệu thành công";

require("ViewsHome/vKetqua.php");
?>